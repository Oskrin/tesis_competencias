
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
    /////////////contador publicaciones//////////
    $cont = 0;
    $consulta = pg_query("select max(id_publicacion) from publicaciones");
    while ($row = pg_fetch_row($consulta)) {
        $cont = $row[0];
    }
    $cont++;

    $sql = "insert into publicaciones values ('$cont','" .strtoupper($_POST['nombre_publicacion']). "','" .$_POST['tipo_publicacion']. "','" .$_POST['lugar_publicacion']. "','" .$_POST['fecha_publicacion']. "','1','$fecha','".$id_user."')";
    $guardar = guardarSql($conexion, $sql);
    pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se creó una nueva Publicación : '.strtoupper($_POST['nombre_publicacion']). "','Publicaciones','$cliente','$cont')");
    $data = "1";//guardado
     
} else {
    if ($_POST['oper'] == "edit") {
        $sql = "update publicaciones set nombre_publicacion = '" .strtoupper($_POST['nombre_publicacion']). "', tipo_publicacion = '" .$_POST['tipo_publicacion']. "', lugar_publicacion = '" .$_POST['lugar_publicacion']. "', fecha_publicacion = '" .$_POST['fecha_publicacion']. "', fecha_creacion = '$fecha' where id_publicacion = '$_POST[id_publicacion]' and id_aspirante = '$id_user'";
        $guardar = guardarSql($conexion, $sql);
        pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se Modificó una Publicación : '.strtoupper($_POST['nombre_publicacion']). "','Publicaciones','$cliente','$_POST[id_publicacion]')");
        $data = "2";//modificado
    }
}

echo $data;
?>