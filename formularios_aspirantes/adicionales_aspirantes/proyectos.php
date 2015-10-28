
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
    /////////////contador proyectos//////////
    $cont = 0;
    $consulta = pg_query("select max(id_proyecto) from proyectos");
    while ($row = pg_fetch_row($consulta)) {
        $cont = $row[0];
    }
    $cont++;

    $sql = "insert into proyectos values ('$cont','" .strtoupper($_POST['nombre_proyecto']). "','" .$_POST['cargo_proyecto']. "','" .$_POST['tiempo_proyecto']. "','1','$fecha','".$id_user."')";
    $guardar = guardarSql($conexion, $sql);
    pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se creó un nuevo Proyecto : '.strtoupper($_POST['nombre_proyecto']). "','Proyectos','$cliente','$cont')");
    $data = "1";//guardado
     
} else {
    if ($_POST['oper'] == "edit") {
        $sql = "update proyectos set nombre_proyecto = '" .strtoupper($_POST['nombre_proyecto']). "', cargo_proyecto = '" .$_POST['cargo_proyecto']. "', tiempo_proyecto = '" .$_POST['tiempo_proyecto']. "', fecha_creacion = '$fecha' where id_proyecto = '$_POST[id_proyecto]' and id_aspirante = '$id_user'";
        $guardar = guardarSql($conexion, $sql);
        pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se Modificó un Proyecto : '.strtoupper($_POST['nombre_proyecto']). "','Proyectos','$cliente','$_POST[id_proyecto]')");
        $data = "2";//modificado
    }
}

echo $data;
?>