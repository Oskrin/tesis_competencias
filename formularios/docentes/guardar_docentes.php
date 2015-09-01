<?php

include '../conexion.php';
include '../funciones_generales.php';       
$conexion = conectarse();
date_default_timezone_set('America/Guayaquil');
$fecha=date('Y-m-d H:i:s', time()); 
$fecha_larga = date('His', time()); 
$sql = "";      
$id = unique($fecha_larga);


/////////////contador docentes//////////
$cont = 0;
$consulta = pg_query("select max(id_docente) from docentes");
while ($row = pg_fetch_row($consulta)) {
    $cont = $row[0];
}
$cont++;
////////////////////////////////////////

$sql = "insert into docentes values ('$cont','$_POST[tipo_documento]','$_POST[ruc_ci]','".strtoupper($_POST['nombres'])."','".strtoupper($_POST['apellidos'])."','$_POST[telf]','$_POST[movil]','$_POST[mail]','".strtoupper($_POST['pais'])."','".strtoupper($_POST['ciudad'])."','$_POST[direccion]','$_POST[comentarios]','1','$fecha')";         
$guardar = guardarSql($conexion,$sql);

$data = 1;
echo $data;
?>
