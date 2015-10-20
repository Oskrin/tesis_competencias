
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
    /////////////contador idiomas//////////
    $cont = 0;
    $consulta = pg_query("select max(id_idioma) from idiomas");
    while ($row = pg_fetch_row($consulta)) {
        $cont = $row[0];
    }
    $cont++;

    $sql = "insert into idiomas values ('$cont','" . strtoupper($_POST['nombre_idioma']) . "','". $_POST['nivel_lectura']. "','". $_POST['nivel_escritura']. "','1','$fecha','1')";
    $guardar = guardarSql($conexion, $sql);
    pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se creó un nuevo Idioma : '.strtoupper($_POST['nombre_idioma']). "','Idiomas','$cliente','$cont')");
    $data = "1";//guardado
     
} else {
    if ($_POST['oper'] == "edit") {
        $sql = "update idiomas set nombre_idioma = '" . strtoupper($_POST['nombre_idioma']) . "', nivel_lectura = '". $_POST['nivel_lectura']. "', nivel_escritura = '". $_POST['nivel_escritura']. "', fecha_creacion = '$fecha' where id_idioma = '$_POST[id_idioma]'";
        $guardar = guardarSql($conexion, $sql);
        pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se Modificó un Idioma : '.strtoupper($_POST['nombre_idioma']). "','Idiomas','$cliente','$_POST[id_idioma]')");
        $data = "2";
    }
}

echo $data;
?>