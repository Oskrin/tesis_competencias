<?php

include '../conexion.php';
include '../funciones_generales.php';       
$conexion = conectarse();
date_default_timezone_set('America/Guayaquil');
$fecha=date('Y-m-d H:i:s', time()); 
$fecha_larga = date('His', time()); 
$sql = "";      
$id = unique($fecha_larga);


$sql = "Update docentes Set tipo_documento = '$_POST[tipo_documento]', identificacion = '$_POST[ruc_ci]', nombres = '".strtoupper($_POST['nombres'])."', apellidos = '".strtoupper($_POST['apellidos'])."', telf = '$_POST[telf]', movil = '$_POST[movil]', mail = '$_POST[mail]', pais = '".strtoupper($_POST['pais'])."', ciudad = '".strtoupper($_POST['ciudad'])."', direccion = '$_POST[direccion]', comentario = '$_POST[comentarios]', fecha_creacion = '$fecha' where id_docente = '$_POST[id_docente]'";         
$guardar = guardarSql($conexion,$sql);


$data = 1;
echo $data;
?>
