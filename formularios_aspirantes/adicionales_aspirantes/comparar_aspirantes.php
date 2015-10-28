<?php

session_start();
include '../conexion.php';
include '../funciones_generales.php';       
$conexion = conectarse();

error_reporting(0);
$data = 0;
$cont = 0;

$consulta = pg_query("select * from aspirantes where identificacion_aspirante ='$_POST[cedula]' and estado = '1'");
while ($row = pg_fetch_row($consulta)) {
    $cont++;
}

if ($cont == 0) {
    $data = 0;
} else {
    $data = 1;
}
echo $data;
?>