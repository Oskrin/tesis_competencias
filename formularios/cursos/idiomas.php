
<?php

include '../conexion.php';
include '../funciones_generales.php';
$conexion = conectarse();
date_default_timezone_set('America/Guayaquil');
$fecha = date('Y-m-d H:i:s', time());
$fecha_larga = date('His', time());
$sql = "";
$id = unique($fecha_larga);

if ($_POST['oper'] == "add") {
        /////////////contador aspirantes//////////
        $cont = 0;
        $consulta = pg_query("select max(id_usuario) from usuarios");
        while ($row = pg_fetch_row($consulta)) {
            $cont = $row[0];
        }
        $cont++;
        ////////////////////////////////////////

        $sql = "insert into usuarios values ('$cont','$_POST[identificacion_usuario]','" . strtoupper($_POST['nombres_usuario']) . "','" . strtoupper($_POST['apellidos_usuario']) . "','$_POST[telf_usuario]','$_POST[cell_usuario]','$_POST[mail_usuario]','$_POST[direccion_usuario]','$_POST[usuario]','$_POST[clave]','$_POST[cargo]','1','$fecha')";
        $guardar = guardarSql($conexion, $sql);
        $data = "1";
} else {
    if ($_POST['oper'] == "edit") {
        $sql = "update usuarios set identificacion_usuario = '$_POST[identificacion_usuario]', nombres_usuarios = '" . strtoupper($_POST['nombres_usuario']) . "', apellidos_usuario = '" . strtoupper($_POST['apellidos_usuario']) . "', telf_usuario = '$_POST[telf_usuario]', cell_usuario = '$_POST[cell_usuario]', mail_usuario = '$_POST[mail_usuario]', direccion_usuario = '$_POST[direccion_usuario]', usuario = '$_POST[usuario]', clave = '$_POST[clave]', cargo = '$_POST[cargo]', fecha_creacion = '$fecha' where id_usuario = '$_POST[id_usuario]'";
        // $sql = "update categoria set nombre_categoria = '" . strtoupper($_POST['nombre_categoria']) . "', fecha_creacion = '$fecha' where id_categoria = '$_POST[id]'";
        $guardar = guardarSql($conexion, $sql);
        $data = "2";
    }
}
echo $data;
?>