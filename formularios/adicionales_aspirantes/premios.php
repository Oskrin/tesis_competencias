
<?php
include '../conexion.php';
include '../funciones_generales.php';
$conexion = conectarse();
date_default_timezone_set('America/Guayaquil');
$fecha = date('Y-m-d H:i:s', time());
$fecha_larga = date('His', time());
$sql = "";
error_reporting(0);
// $id = unique($fecha_larga);
$id_user = sesion_activa();

$id_auditoria = 0;
$consulta = pg_query("select max(id_auditoria) from auditoria");
while ($row = pg_fetch_row($consulta)) {
    $id_auditoria = $row[0];
}
$id_auditoria++;

if ($_POST['oper'] == "add") {
    /////////////contador premios//////////
    $cont = 0;
    $consulta = pg_query("select max(id_premio) from premios");
    while ($row = pg_fetch_row($consulta)) {
        $cont = $row[0];
    }
    $cont++;

    $sql = "insert into premios values ('$cont','" .strtoupper($_POST['nombre_premio']). "','" .$_POST['tipo_premio']. "','" .$_POST['motivo_premio']. "','1','$fecha')";
    $guardar = guardarSql($conexion, $sql);
    pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se creó un nuevo Premio : '.strtoupper($_POST['motivo_premio']). "','Premios','$cliente','$cont')");
    $data = "1";//guardado
     
} else {
    if ($_POST['oper'] == "edit") {
        $sql = "update premios set nombre_premio = '" .strtoupper($_POST['nombre_premio']). "', tipo_premio = '" .$_POST['tipo_premio']. "', motivo_premio = '" .$_POST['motivo_premio']. "', fecha_creacion = '$fecha' where id_premio = '$_POST[id_premio]'";
        $guardar = guardarSql($conexion, $sql);
        pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se Modificó un Premio : '.strtoupper($_POST['nombre_premio']). "','Premios','$cliente','$_POST[id_premio]')");
        $data = "2";//modificado
    }
}

echo $data;
?>