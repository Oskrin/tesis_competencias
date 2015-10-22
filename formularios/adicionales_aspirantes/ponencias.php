
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
    /////////////contador ponencias//////////
    $cont = 0;
    $consulta = pg_query("select max(id_ponencia) from ponencias");
    while ($row = pg_fetch_row($consulta)) {
        $cont = $row[0];
    }
    $cont++;

    $sql = "insert into ponencias values ('$cont','" .strtoupper($_POST['nombre_ponencia']). "','" .$_POST['lugar_ponencia']. "','" .$_POST['fecha_ponencia']. "','1','$fecha')";
    $guardar = guardarSql($conexion, $sql);
    pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se creó una nueva Ponencia: '.strtoupper($_POST['nombre_ponencia']). "','Ponencia','$cliente','$cont')");
    $data = "1";//guardado
} else {
    if ($_POST['oper'] == "edit") {
        $sql = "update ponencias set nombre_ponencia = '" .strtoupper($_POST['nombre_ponencia']). "', lugar_ponencia = '" .$_POST['lugar_ponencia']. "', fecha_ponencia = '" .$_POST['fecha_ponencia']. "', fecha_creacion = '$fecha' where id_ponencia = '$_POST[id_ponencia]'";
        $guardar = guardarSql($conexion, $sql);
        pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se Modificó la Ponencia: '.strtoupper($_POST['nombre_ponencia']). "','Ponencia','$cliente','$_POST[id_ponencia]')");
        $data = "2";//modificado
    }
}

echo $data;
?>