
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
    /////////////contador convocatoria//////////
    $cont = 0;
    $consulta = pg_query("select max(id_concurso) from concursos");
    while ($row = pg_fetch_row($consulta)) {
        $cont = $row[0];
    }
    $cont++;

    $sql = "insert into concursos values ('$cont','" .$_POST['convocatoria']. "','" .$_POST['tribunal']. "','" .$_POST['cargo_concurso']. "','" .$_POST['detalle_cargo']. "','1','$fecha')";
    $guardar = guardarSql($conexion, $sql);
    pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se creó un nuevo Concurso: '.strtoupper($_POST['cargo_concurso']). "','Concurso','$cliente','$cont')");
    $data = "1";//guardado
} else {
    $sql = "update concursos set id_convocatoria = '" .strtoupper($_POST['convocatoria']). "', id_tribunal = '" .strtoupper($_POST['tribunal']). "', cargo_concurso = '" .strtoupper($_POST['cargo_concurso']). "', detalle_cargo = '" .strtoupper($_POST['detalle_cargo']). "', fecha_creacion = '$fecha' where id_concurso = '$_POST[id_concurso]'";
    $guardar = guardarSql($conexion, $sql);
    pg_query("insert into auditoria values('$id_auditoria','$id_user','$fecha','" .'Se Modificó el Concurso: '.strtoupper($_POST['cargo_concurso']). "','Concurso','$cliente','$_POST[id_concurso]')");
    $data = "2";
    }
}
echo $data;
?>