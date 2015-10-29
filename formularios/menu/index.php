<?php
//verificacion si esta iniciada la variable se ssesion 
//error_reporting(0);
if(!isset($_SESSION)) {
	session_start();		
}

if (empty($_SESSION['id'])) {
	header('Location: ../../');
}

//Menu banner arriba usuario perfil dependientes del nivel de usuario
function menu_arriba() {	
	print'
	<div id="navbar" class="navbar navbar-default navbar-collapse h-navbar">
			<script type="text/javascript">
				try{ace.settings.check("navbar" , "fixed")}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="../inici/" class="navbar-brand">
						<small>
							<img src="../../dist/images/UNIANDES-Logo.png">
							SELECCIÓN DEL TALENTO HUMANO BASADO EN COMPETENCIAS 
						</small>
					</a>

					<button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
						<span class="sr-only">Toggle user menu</span>

						<img src="../../dist/avatars/user.jpg" alt="" />
					</button>

					<button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
						<span class="sr-only">Toggle sidebar</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>
					</button>
				</div>

				<nav role="navigation" class="navbar-menu pull-right collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Opciones &nbsp;
								<i class="ace-icon fa fa-angle-down bigger-110"></i>
							</a>

							<ul class="dropdown-menu dropdown-light-blue dropdown-caret">
								<li>
									<a href="">
										<i class="ace-icon fa fa-cog"></i>
										Configuración
									</a>
								</li>

								<li>
									<a href="">
										<i class="ace-icon fa fa-user"></i>
										Perfil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="../../">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a>
								<i class="ace-icon fa fa-user"></i>
								Bienvenido: 
								<span class="badge badge-warning">'.$_SESSION['nombrescompletos'].'</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	';
}

function menu_lateral(){	
	error_reporting(0);
	$url = $_SERVER['PHP_SELF'];
	$acus = parse_url($url, PHP_URL_PATH);
	$acus = split ('/', $acus);
	
	print'<div id="sidebar" class="sidebar responsive">
		<script type="text/javascript">
			try{ace.settings.check("sidebar" , "fixed")}catch(e){}
		</script>
	<ul class="nav nav-list">';	
	print '<li>
		<a href="../inicio/">
			<i class="menu-icon fa fa-home"></i>
			<span class="menu-text"> Inicio </span>
		</a>
		<b class="arrow"></b>
	</li>';		
	print '<li ';if ($acus[3]=='usuarios' || $acus[3]=='convocatoria' || $acus[3]=='aspirantes') {
		print('class="active open"');
	}print'>
	<a href="#" class="dropdown-toggle">
		<i class="menu-icon fa fa-desktop"></i>
		<span class="menu-text">
			Ingresos
		</span>
		<b class="arrow fa fa-angle-down red"></b>
	</a>
	<b class="arrow"></b>';
	print'<ul class="submenu">
		</li>';
						
		print '<li ';if ($acus[3]=='usuarios') {
			print('class="active"');
		}print'>
			<a href="../usuarios/">
				<i class="menu-icon fa fa-caret-right"></i>
				Usuario
			</a>
			<b class="arrow"></b>
		</li>';	

		print '<li ';if ($acus[3]=='convocatoria') {
			print('class="active"');
		}print'>
			<a href="../convocatoria/">
				<i class="menu-icon fa fa-caret-right"></i>
				Convocatoria
			</a>
			<b class="arrow"></b>
		</li>';	

		print '<li ';if ($acus[3]=='aspirantes') {
			print('class="active"');
		}print'>
			<a href="../aspirantes/">
				<i class="menu-icon fa fa-caret-right"></i>
				Aspirantes
			</a>
			<b class="arrow"></b>
		</li>';	

		print '<li ';if ($acus[3]=='tribunal') {
			print('class="active"');
		}print'>
			<a href="../titulos/">
				<i class="menu-icon fa fa-caret-right"></i>
				Tribunal
			</a>
			<b class="arrow"></b>
		</li>';					
			print '</ul>
		</li>';
				
		print '<li ';if ($acus[3]=='lista_aspirantes' || $acus[3]=='ponencia' || $acus[3]=='otro'|| $acus[3]=='sub') {
			print('class="active open"');
			}print'>
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-cubes ranger"></i>
				<span class="menu-text">
					Procesos
				</span>
				<b class="arrow fa fa-angle-down red"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">';			
			print '<li ';if ($acus[3]=='lista_aspirantes') {
				print('class="active"');
				}print'>
				<a href="../lista_aspirantes/">
					<i class="menu-icon fa fa-caret-right"></i>
					Lista Aspirante
				</a>
				<b class="arrow"></b>
			</li>';						
			print '<li ';if ($acus[3]=='ponencia'||$acus[3]=='otro') {
				print('class="active open"');
				}print'>
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					Asignar
					<b class="arrow fa fa-angle-down"></b>
				</a>
				<b class="arrow"></b>
				<ul class="submenu">';					
				print '<li ';if ($acus[3]=='ponencia') {
				print('class="active"');
				}print'>
					<a href="">
						<i class="menu-icon fa fa-caret-right"></i>
						Ponencia
					</a>
					<b class="arrow"></b>
				</li>';									
				print '<li ';if ($acus[3]=='otro') {
					print('class="active"');
				}print'>
					<a href="../otro/">
						<i class="menu-icon fa fa-caret-right"></i>
						Otro
					</a>
					<b class="arrow"></b>
				</li>';										
				print '</ul>
			</li>';	

			print '<li ';if ($acus[3]=='sub') {
			print('class="active open"');
			}print'>
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					Mas
					<b class="arrow fa fa-angle-down"></b>
				</a>
				<b class="arrow"></b>
				<ul class="submenu">';					
				print '<li ';if ($acus[3]=='sub') {
				print('class="active"');
				}print'>
					<a href="">
						<i class="menu-icon fa fa-caret-right"></i>
						Sub menu
					</a>
					<b class="arrow"></b>
				</li>';																													
				print '</ul>
			</li>';												
														
		print '</ul>
		</li>';
		
		print '<li ';if ($acus[3]=='r_estadistico' || $acus[3]=='r_simple') {
		print('class="active open"');
		}print'>
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-print ranger"></i>
				<span class="menu-text">
					Reportes
				</span>
				<b class="arrow fa fa-angle-down red"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">';			
			print '<li ';if ($acus[3]=='r_estadistico') {
				print('class="active"');
			}print'>
				<a href="../r_estadistico/">
					<i class="menu-icon fa fa-caret-right"></i>
					Estadisticos
				</a>
				<b class="arrow"></b>
			</li>';					
			print '<li ';if ($acus[3]=='r_simple') {
				print('class="active"');
				}print'>
				<a href="../r_simple/">
					<i class="menu-icon fa fa-caret-right"></i>
					Simples
				</a>
				<b class="arrow"></b>
			</li>';			
			print '</ul>
		</li>';			
	
		print '<li ';if ($acus[3]=='privilegios') {
		print('class="active open"');
		}print'>
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-user"></i>
				<span class="menu-text">
					Parametros
				</span>
				<b class="arrow fa fa-angle-down red"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">';			
			print '<li ';if ($acus[3]=='privilegios') {				
				print('class="active"');
			}print'>
				<a href="../privilegios/">
					<i class="menu-icon fa fa-caret-right"></i>
					Privilegios
				</a>
				<b class="arrow"></b>
			</li>';								
									
					
			print '</ul>
		</li>';				
	
	print '</ul><!-- /.nav-list -->
		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
		</div>
		<script type="text/javascript">
			try{ace.settings.check("sidebar" , "collapsed")}catch(e){}
		</script>
	</div>
	';
}

//pie de Pagina Footer proceso desarrolladores empresa y datos adicionales de la misma
function footer() {
	print'<div class="footer">
		<div class="footer-inner">
			<div class="footer-content">
				<span class="bigger-120">
				<span class="blue bolder">Uniandes</span>
					Aplicación Web&copy; 2015-2016
				</span>
				&nbsp; &nbsp;
				<span class="action-buttons">
				<a href="">
					<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
				</a>
				<a href="">
					<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
				</a>
				<a href="">
					<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
				</a>
				</span>
			</div>
		</div>
	</div>';
} 

?>
