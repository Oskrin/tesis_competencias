<?php

include '../conexion.php';
include '../funciones_generales.php';       
$conexion = conectarse();
date_default_timezone_set('America/Guayaquil');
$fecha=date('Y-m-d H:i:s', time()); 
$fecha_larga = date('His', time()); 
$sql = "";      
$id = unique($fecha_larga);


/////////////contador aspirantes//////////
$cont = 0;
$consulta = pg_query("select max(id_aspirante) from aspirantes");
while ($row = pg_fetch_row($consulta)) {
    $cont = $row[0];
}
$cont++;
////////////////////////////////////////

///////////////valores imagen//////////
$extension = explode(".", $_FILES["archivo"]["name"]);
$extension = end($extension);
$type = $_FILES["archivo"]["type"];
$tmp_name = $_FILES["archivo"]["tmp_name"];
$size = $_FILES["archivo"]["size"];
$nombre = basename($_FILES["archivo"]["name"], "." . $extension);
//////////////////////////
/////////////////guardar aspirantes///////
if ($nombre == "") {
    $sql = "insert into aspirantes values ('$cont','$_POST[tipo_documento]','$_POST[ruc_ci]','".strtoupper($_POST['nombres_aspirantes'])."','".strtoupper($_POST['apellidos_aspirantes'])."','$_POST[telf_aspirante]','$_POST[movil_aspirante]','$_POST[fnac_aspirante]','$_POST[genero_aspirante]','$_POST[mail_aspirante]','".strtoupper($_POST['pais_aspirante'])."','".strtoupper($_POST['ciudad_aspirante'])."','$_POST[direccion_aspirante]','','$_POST[comentarios]','1','$fecha')";         
    $guardar = guardarSql($conexion,$sql);
} else {
    $foto = $cont . '.' . $extension;
    move_uploaded_file($_FILES["archivo"]["tmp_name"], "fotos/" . $foto);
    $sql = "insert into aspirantes values ('$cont','$_POST[tipo_documento]','$_POST[ruc_ci]','".strtoupper($_POST['nombres_aspirantes'])."','".strtoupper($_POST['apellidos_aspirantes'])."','$_POST[telf_aspirante]','$_POST[movil_aspirante]','$_POST[fnac_aspirante]','$_POST[genero_aspirante]','$_POST[mail_aspirante]','".strtoupper($_POST['pais_aspirante'])."','".strtoupper($_POST['ciudad_aspirante'])."','$_POST[direccion_aspirante]','$foto','$_POST[comentarios]','1','$fecha')";         
    $guardar = guardarSql($conexion,$sql);
}

$data = 1;
echo $data;
?>
