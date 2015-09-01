<?php

include '../conexion.php';
include '../funciones_generales.php';       
$conexion = conectarse();
date_default_timezone_set('America/Guayaquil');
$fecha=date('Y-m-d H:i:s', time()); 
$fecha_larga = date('His', time()); 
$sql = "";      
$id = unique($fecha_larga);

///////////////valores imagen//////////
$extension = explode(".", $_FILES["archivo"]["name"]);
$extension = end($extension);
$type = $_FILES["archivo"]["type"];
$tmp_name = $_FILES["archivo"]["tmp_name"];
$size = $_FILES["archivo"]["size"];
$nombre = basename($_FILES["archivo"]["name"], "." . $extension);
//////////////////////////

/////////////////modificar aspirantes///////
if ($nombre == "") {
    $sql = "Update aspirantes Set tipo_documento = '$_POST[tipo_documento]', identificacion_aspirante = '$_POST[ruc_ci]', nombres_aspirante = '".strtoupper($_POST['nombres_aspirantes'])."', apellidos_aspirante = '".strtoupper($_POST['apellidos_aspirantes'])."', telf_aspirante = '$_POST[telf_aspirante]', movil_aspirante = '$_POST[movil_aspirante]', fnac_aspirante = '$_POST[fnac_aspirante]', genero_aspirante = '$_POST[genero_aspirante]', mail_aspirante = '$_POST[mail_aspirante]', pais_aspirante = '".strtoupper($_POST['pais_aspirante'])."', ciudad_aspirante = '".strtoupper($_POST['ciudad_aspirante'])."', direccion_aspirante = '$_POST[direccion_aspirante]', comentarios = '$_POST[comentarios]', fecha_creacion = '$fecha' where id_aspirante = '$_POST[id_aspirante]'";         
    $guardar = guardarSql($conexion,$sql);
} else {
	$foto = $_POST['id_aspirante'] . '.' . $extension;
    move_uploaded_file($_FILES["archivo"]["tmp_name"], "fotos/" . $foto);
    $sql = "Update aspirantes Set tipo_documento = '$_POST[tipo_documento]', identificacion_aspirante = '$_POST[ruc_ci]', nombres_aspirante = '".strtoupper($_POST['nombres_aspirantes'])."', apellidos_aspirante = '".strtoupper($_POST['apellidos_aspirantes'])."', telf_aspirante = '$_POST[telf_aspirante]', movil_aspirante = '$_POST[movil_aspirante]', fnac_aspirante = '$_POST[fnac_aspirante]', genero_aspirante = '$_POST[genero_aspirante]', mail_aspirante = '$_POST[mail_aspirante]', pais_aspirante = '".strtoupper($_POST['pais_aspirante'])."', ciudad_aspirante = '".strtoupper($_POST['ciudad_aspirante'])."', direccion_aspirante = '$_POST[direccion_aspirante]', foto_aspirante = '$foto', comentarios = '$_POST[comentarios]', fecha_creacion = '$fecha' where id_aspirante = '$_POST[id_aspirante]'";         
    $guardar = guardarSql($conexion,$sql);
}

$data = 1;
echo $data;
?>
