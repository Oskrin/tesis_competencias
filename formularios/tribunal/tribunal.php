
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
    /////////////contador convocatoria//////////
    $cont = 0;
    $consulta = pg_query("select max(id_tribunal) from tribunal");
    while ($row = pg_fetch_row($consulta)) {
        $cont = $row[0];
    }
    $cont++;

    $repetidos = repetidos($conexion, "area_tribunal", strtoupper($_POST['area_tribunal']), "tribunal", "g", "", "");
    if ($repetidos == 'true') {
        $data = "3"; /// este dato ya existe;
    } else {
        $sql = "insert into tribunal values ('$cont','" .strtoupper($_POST['area_tribunal']). "','" .strtoupper($_POST['tribunal1']). "','" .strtoupper($_POST['tribunal2']). "','" .strtoupper($_POST['tribunal3']). "','1','$fecha')";
        $guardar = guardarSql($conexion, $sql);
        pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se creó una nuevo Tribunal: '.strtoupper($_POST['area_tribunal']). "','Tribunal','$cliente','$cont')");
        $data = "1";//guardado
        }
} else {
    if ($_POST['oper'] == "edit") {
        $repetidos = repetidos($conexion, "area_tribunal", strtoupper($_POST['area_tribunal']), "tribunal", "m", $_POST['id'], "id_tribunal");
        if ($repetidos == 'true') {
            $data = "3"; /// este dato ya existe;
        } else {
            $sql = "update tribunal set area_tribunal = '" .strtoupper($_POST['area_tribunal']). "', tribunal1 = '" .strtoupper($_POST['tribunal1']). "', tribunal2 = '" .strtoupper($_POST['tribunal2']). "', tribunal3 = '" .strtoupper($_POST['tribunal3']). "', fecha_creacion = '$fecha' where id_tribunal = '$_POST[id_tribunal]'";
            $guardar = guardarSql($conexion, $sql);
            pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se Modificó el Tribunal: '.strtoupper($_POST['area_tribunal']). "','Tribunal','$cliente','$_POST[id_tribunal]')");
            $data = "2";
        }
    }
}
echo $data;
?>