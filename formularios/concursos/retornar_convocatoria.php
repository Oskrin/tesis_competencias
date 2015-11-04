<?php

session_start();
include '../conexion.php';
$conexion = conectarse();
error_reporting(0);

$consulta = pg_query("select * from convocatoria order by id_convocatoria asc");
$response = '<select>';
//echo '<option>fgdfh</option>';
while ($row = pg_fetch_row($consulta)) {
    $response .= "<option value='$row[0]' id='$row[0]'> $row[1]</option>";
}
$response .= '</select>';
echo $response;
?>s