<?php
include '../formularios/conexion.php';
$conexion = conectarse();
	if(!isset($_SESSION)){
		session_start();		
	}

	if (isset($_POST['g'])) {
		$user = $_POST['txt_1'];
		$pass = $_POST['txt_2'];		
		$acu=0;				
		$result = pg_query("SELECT * FROM USUARIOS WHERE USUARIO='$user' AND CLAVE='$pass'");
		while ($row = pg_fetch_row($result)) {			
			$_SESSION['id']=$row[0]; 
			$_SESSION['nombrescompletos']=$row[2] . "  " . $row[3] ;
			$_SESSION['usuario']=$row[8];			
			$acu=1;
		}

		if ($acu==0) {
			print(0);
		}else print(1);
	}

?>