<?php
include '../conexion.php';
include '../funciones_generales.php';		
$conexion = conectarse();
$lista = array();
$sql = "select * from aspirantes order by id_aspirante asc";
$sql = carga_json($conexion,$sql);
while($row = pg_fetch_row($sql)){
	$lista[]=array($row[0],$row[2],$row[3],$row[4],$row[6],$row[9],$row[12],$row[14]); 
}
echo $lista = json_encode($lista);

?>