
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
    /////////////contador cursos//////////
    $cont = 0;
    $consulta = pg_query("select max(id_curso) from cursos");
    while ($row = pg_fetch_row($consulta)) {
        $cont = $row[0];
    }
    $cont++;

    $sql = "insert into cursos values ('$cont','" .$_POST['tipo_curso']. "','" .strtoupper($_POST['nombre_curso']). "','" .$_POST['inst_curso']. "','" .$_POST['time_curso']. "','1','$fecha')";
    $guardar = guardarSql($conexion, $sql);
    pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se creó un nuevo Curso : '.strtoupper($_POST['nombre_curso']). "','Cursos','$cliente','$cont')");
    $data = "1";//guardado
     
} else {
    if ($_POST['oper'] == "edit") {
        $sql = "update cursos set tipo_curso = '" .strtoupper($_POST['tipo_curso']). "', nombre_curso = '" .strtoupper($_POST['nombre_curso']). "', inst_curso = '" .$_POST['inst_curso']. "', time_curso = '" .$_POST['time_curso']. "', fecha_creacion = '$fecha' where id_curso = '$_POST[id_curso]'";
        $guardar = guardarSql($conexion, $sql);
        pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se Modificó un Curso : '.strtoupper($_POST['nombre_curso']). "','Cursos','$cliente','$_POST[id_curso]')");
        $data = "2";//modificado
    }
}

echo $data;
?>