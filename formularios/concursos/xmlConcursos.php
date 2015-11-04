<?php

include '../conexion.php';
$conexion = conectarse();
$page = $_GET['page'];
$limit = $_GET['rows'];
$sidx = $_GET['sidx'];
$sord = $_GET['sord'];
$search = $_GET['_search'];


if (!$sidx)
    $sidx = 1;
$result = pg_query("SELECT COUNT(*) AS count FROM concursos C");
$row = pg_fetch_row($result);
$count = $row[0];
if ($count > 0 && $limit > 0) {
    $total_pages = ceil($count / $limit);
} else {
    $total_pages = 0;
}
if ($page > $total_pages)
    $page = $total_pages;
$start = $limit * $page - $limit;
if ($start < 0)
    $start = 0;
if ($search == 'false') {
    $SQL = "select C.id_concurso, C.nombre_concurso, V.id_convocatoria, V.descripcion_convocatoria, T.id_tribunal, T.area_tribunal, C.cargo_concurso, C.detalle_cargo, C.fecha_creacion from concursos C, convocatoria V, tribunal T where C.id_convocatoria = V.id_convocatoria and C.id_tribunal = T.id_tribunal ORDER BY  $sidx $sord offset $start limit $limit";
} else {
    $campo = $_GET['searchField'];
  
    if ($_GET['searchOper'] == 'eq') {
        $SQL = "select C.id_concurso, C.nombre_concurso, V.id_convocatoria, V.descripcion_convocatoria, T.id_tribunal, T.area_tribunal, C.cargo_concurso, C.detalle_cargo, C.fecha_creacion from concursos C, convocatoria V, tribunal T where C.id_convocatoria = V.id_convocatoria and C.id_tribunal = T.id_tribunal and $campo = '$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";
    }
    if ($_GET['searchOper'] == 'ne') {
        $SQL = "select C.id_concurso, C.nombre_concurso, V.id_convocatoria, V.descripcion_convocatoria, T.id_tribunal, T.area_tribunal, C.cargo_concurso, C.detalle_cargo, C.fecha_creacion from concursos C, convocatoria V, tribunal T where C.id_convocatoria = V.id_convocatoria and C.id_tribunal = T.id_tribunal and $campo != '$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";
    }
    if ($_GET['searchOper'] == 'bw') {
        $SQL = "select C.id_concurso, C.nombre_concurso, V.id_convocatoria, V.descripcion_convocatoria, T.id_tribunal, T.area_tribunal, C.cargo_concurso, C.detalle_cargo, C.fecha_creacion from concursos C, convocatoria V, tribunal T where C.id_convocatoria = V.id_convocatoria and C.id_tribunal = T.id_tribunal and $campo like '$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";
    }
    if ($_GET['searchOper'] == 'bn') {
        $SQL = "select C.id_concurso, C.nombre_concurso, V.id_convocatoria, V.descripcion_convocatoria, T.id_tribunal, T.area_tribunal, C.cargo_concurso, C.detalle_cargo, C.fecha_creacion from concursos C, convocatoria V, tribunal T where C.id_convocatoria = V.id_convocatoria and C.id_tribunal = T.id_tribunal and $campo not like '$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";
    }
    if ($_GET['searchOper'] == 'ew') {
        $SQL = "select C.id_concurso, C.nombre_concurso, V.id_convocatoria, V.descripcion_convocatoria, T.id_tribunal, T.area_tribunal, C.cargo_concurso, C.detalle_cargo, C.fecha_creacion from concursos C, convocatoria V, tribunal T where C.id_convocatoria = V.id_convocatoria and C.id_tribunal = T.id_tribunal and $campo like '%$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";
    }
    if ($_GET['searchOper'] == 'en') {
        $SQL = "select C.id_concurso, C.nombre_concurso, V.id_convocatoria, V.descripcion_convocatoria, T.id_tribunal, T.area_tribunal, C.cargo_concurso, C.detalle_cargo, C.fecha_creacion from concursos C, convocatoria V, tribunal T where C.id_convocatoria = V.id_convocatoria and C.id_tribunal = T.id_tribunal and $campo not like '%$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";
    }
    if ($_GET['searchOper'] == 'cn') {
        $SQL = "select C.id_concurso, C.nombre_concurso, V.id_convocatoria, V.descripcion_convocatoria, T.id_tribunal, T.area_tribunal, C.cargo_concurso, C.detalle_cargo, C.fecha_creacion from concursos C, convocatoria V, tribunal T where C.id_convocatoria = V.id_convocatoria and C.id_tribunal = T.id_tribunal and $campo like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";
    }
    if ($_GET['searchOper'] == 'nc') {
        $SQL = "select C.id_concurso, C.nombre_concurso, V.id_convocatoria, V.descripcion_convocatoria, T.id_tribunal, T.area_tribunal, C.cargo_concurso, C.detalle_cargo, C.fecha_creacion from concursos C, convocatoria V, tribunal T where C.id_convocatoria = V.id_convocatoria and C.id_tribunal = T.id_tribunal and $campo not like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";
    }
    if ($_GET['searchOper'] == 'in') {
        $SQL = "select C.id_concurso, C.nombre_concurso, V.id_convocatoria, V.descripcion_convocatoria, T.id_tribunal, T.area_tribunal, C.cargo_concurso, C.detalle_cargo, C.fecha_creacion from concursos C, convocatoria V, tribunal T where C.id_convocatoria = V.id_convocatoria and C.id_tribunal = T.id_tribunal and $campo like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";
    }
    if ($_GET['searchOper'] == 'ni') {
        $SQL = "select C.id_concurso, C.nombre_concurso, V.id_convocatoria, V.descripcion_convocatoria, T.id_tribunal, T.area_tribunal, C.cargo_concurso, C.detalle_cargo, C.fecha_creacion from concursos C, convocatoria V, tribunal T where C.id_convocatoria = V.id_convocatoria and C.id_tribunal = T.id_tribunal and $campo not like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";
    }
}

$result = pg_query($SQL);
header("Content-type: text/xml;charset=utf-8");
$s = "<?xml version='1.0' encoding='utf-8'?>";
$s .= "<rows>";
$s .= "<page>" . $page . "</page>";
$s .= "<total>" . $total_pages . "</total>";
$s .= "<records>" . $count . "</records>";
while ($row = pg_fetch_row($result)) {
    $s .= "<row id='" . $row[0] . "'>";
    $s .= "<cell>" . $row[0] . "</cell>";
    $s .= "<cell>" . $row[1] . "</cell>";
    $s .= "<cell>" . $row[2] . "</cell>";
    $s .= "<cell>" . $row[3] . "</cell>";
    $s .= "<cell>" . $row[4] . "</cell>";
    $s .= "<cell>" . $row[5] . "</cell>";
    $s .= "<cell>" . $row[6] . "</cell>";
    $s .= "<cell>" . $row[7] . "</cell>";
    $s .= "<cell>" . $row[8] . "</cell>";
    $s .= "</row>";
}
$s .= "</rows>";
echo $s;
?>
