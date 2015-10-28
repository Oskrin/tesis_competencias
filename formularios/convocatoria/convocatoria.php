
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
    $consulta = pg_query("select max(id_convocatoria) from convocatoria");
    while ($row = pg_fetch_row($consulta)) {
        $cont = $row[0];
    }
    $cont++;

    $repetidos = repetidos($conexion, "descripcion_convocatoria", strtoupper($_POST['descripcion_convocatoria']), "convocatoria", "g", "", "");
    if ($repetidos == 'true') {
        $data = "3"; /// este dato ya existe;
    } else {
        $sql = "insert into convocatoria values ('$cont','" . strtoupper($_POST['descripcion_convocatoria']) . "','$_POST[fecha_inicio]','$_POST[fecha_fin]','1','$fecha')";
        $guardar = guardarSql($conexion, $sql);
        pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se creó una nueva Convocatoria : '.strtoupper($_POST['descripcion_convocatoria']). "','Convocatoria','$cliente','$cont')");
        $data = "1";//guardado
        }
} else {
    if ($_POST['oper'] == "edit") {
        $repetidos = repetidos($conexion, "descripcion_convocatoria", strtoupper($_POST['descripcion_convocatoria']), "convocatoria", "m", $_POST['id'], "id_convocatoria");
        if ($repetidos == 'true') {
            $data = "3"; /// este dato ya existe;
        } else {
            $sql = "update convocatoria set descripcion_convocatoria = '" . strtoupper($_POST['descripcion_convocatoria']) . "', fecha_inicio = '$_POST[fecha_inicio]', fecha_fin = '$_POST[fecha_fin]', fecha_creacion = '$fecha' where id_convocatoria = '$_POST[id_convocatoria]'";
            $guardar = guardarSql($conexion, $sql);
            pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se Modificó la Convocatoria : '.strtoupper($_POST['descripcion_convocatoria']). "','Convocatoria','$cliente','$_POST[id_convocatoria]')");
            $data = "2";
        }
    }
}
echo $data;
?>