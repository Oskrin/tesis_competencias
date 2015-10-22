
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
    /////////////contador titulos//////////
    $cont = 0;
    $consulta = pg_query("select max(id_titulo) from titulos");
    while ($row = pg_fetch_row($consulta)) {
        $cont = $row[0];
    }
    $cont++;

    $sql = "insert into titulos values ('$cont','" .strtoupper($_POST['nombre_titulo']). "','" .$_POST['nivel_titulo']. "','" .$_POST['univ_titulo']. "','" .$_POST['fecha_titulo']. "','" .strtoupper($_POST['pais_titulo']). "','" .$_POST['area_titulo']. "','" .$_POST['reg_titulo']. "','1','$fecha')";
    $guardar = guardarSql($conexion, $sql);
    pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se creó un nuevo Titulo: '.strtoupper($_POST['nombre_titulo']). "','Titulos','$cliente','$cont')");
    $data = "1";//guardado
} else {
    if ($_POST['oper'] == "edit") {
        $sql = "update titulos set nombre_titulo = '" .strtoupper($_POST['nombre_titulo']). "', nivel_titulo = '" .$_POST['nivel_titulo']. "', univ_titulo = '" .$_POST['univ_titulo']. "', fecha_titulo = '" .$_POST['fecha_titulo']. "', pais_titulo = '" .strtoupper($_POST['pais_titulo']). "', area_titulo = '" .$_POST['area_titulo']. "', reg_titulo = '" .$_POST['reg_titulo']. "', fecha_creacion = '$fecha' where id_titulo = '$_POST[id_titulo]'";
        $guardar = guardarSql($conexion, $sql);
        pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se Modificó el Tituloa: '.strtoupper($_POST['nombre_titulo']). "','Titulos','$cliente','$_POST[id_titulo]')");
        $data = "2";//modificado
    }
}

echo $data;
?>