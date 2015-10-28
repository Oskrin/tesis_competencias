
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
$id_auditoria ++;

if ($_POST['oper'] == "add") {
    /////////////contador experiencia//////////
    $cont = 0;
    $consulta = pg_query("select max(id_experiencia) from experiencia");
    while ($row = pg_fetch_row($consulta)) {
        $cont = $row[0];
    }
    $cont++;

    $sql = "insert into experiencia values ('$cont','" .strtoupper($_POST['nombre_empresa']). "','" .$_POST['cargo_empresa']. "','" .$_POST['tiempo_empresa']. "','" .$_POST['contacto_empresa']. "','" .$_POST['referencia']. "','1','$fecha','".$id_user."')";
    $guardar = guardarSql($conexion, $sql);
    pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se creó una nueva Experencia: '.strtoupper($_POST['nombre_empresa']). "','Experencia','$cliente','$cont')");
    $data = "1";//guardado
} else {
    if ($_POST['oper'] == "edit") {
        $sql = "update experiencia set nombre_empresa = '" .strtoupper($_POST['nombre_empresa']). "', cargo_empresa = '" .$_POST['cargo_empresa']. "', tiempo_empresa = '" .$_POST['tiempo_empresa']. "', contacto_empresa = '" .$_POST['contacto_empresa']. "', referencia = '" .$_POST['referencia']. "', fecha_creacion = '$fecha' where id_experiencia = '$_POST[id_experiencia]' and id_aspirante = '$id_user'";
        $guardar = guardarSql($conexion, $sql);
        pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se Modificó la Experiencia: '.strtoupper($_POST['nombre_empresa']). "','Experencia','$cliente','$_POST[id_experiencia]')");
        $data = "2";//modificado
    }
}

echo $data;
?>