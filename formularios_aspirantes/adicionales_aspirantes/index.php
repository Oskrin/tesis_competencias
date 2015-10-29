<?php
include('../menu/index.php'); 
include '../conexion.php';
include '../funciones_generales.php';
$conexion = conectarse();
error_reporting(0);
$id_user = sesion_activa();

// cargar informacion 
$consulta = pg_query("select * from aspirantes where id_aspirante = '".$id_user."'");
while ($row = pg_fetch_row($consulta)) {
 	$nombres_aspirante = $row[3];
 	$apellidos_aspirante = $row[4];
 	$identificacion_aspirante = $row[2];
 	$telf_aspirante = $row[5];
 	$movil_aspirante = $row[6];
 	$mail_aspirante = $row[9];
 	$direccion_aspirante = $row[12];
 	$imagen_aspirante = $row[13];
}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		
		<link rel="shortcut icon" href="../../dist/images/logo.fw.png">
		<title>.::UNIANDES.</title>

		<meta name="description" content="Dynamic tables and grids using jqGrid plugin" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../../dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../dist/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="../../dist/css/jquery-ui.min.css" />
        <link rel="stylesheet" href="../../dist/css/datepicker.min.css" />
        <link rel="stylesheet" href="../../dist/css/ui.jqgrid.min.css" />
        <link rel="stylesheet" href="../../dist/css/jquery.gritter.min.css" />
        <link rel="stylesheet" href="../../dist/css/alertify.core.css" />
    	<link rel="stylesheet" href="../../dist/css/alertify.default.css" id="toggleCSS" />

		<link rel="stylesheet" href="../../dist/css/select2.min.css" />
        <!-- text fonts -->
        <link rel="stylesheet" href="../../dist/css/fontdc.css" />
        <!-- ace styles -->
        <link rel="stylesheet" href="../../dist/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <link type="text/css" rel="stylesheet" id="ace-skins-stylesheet" href="../../dist/css/ace-skins.min.css">
        <link type="text/css" rel="stylesheet" id="ace-rtl-stylesheet" href="../../dist/css/ace-rtl.min.css">
        <script src="../../dist/js/ace-extra.min.js"></script>
        <link type="text/css" rel="stylesheet" href="../../dist/css/system.css">
    </head>

    <body class="no-skin">
		<?php menu_arriba(); ?>
		<div class="main-container" id="main-container">
			<?php menu_lateral(); ?>
			 <div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="../inicio/">Inicio</a>
                            </li>
                            <li class="active">Ingresos</li>
                            <li class="active">Aspirantes</li>
                        </ul>
                    </div>
					<div class="page-content">						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->								
								<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">INFORMACIÓN ASPIRANTE</h4>										
									</div>
									<div class="widget-body">
										<div class="widget-main">
											<div id="fuelux-wizard-container">
												<div>
													<ul class="steps">
														<li data-step="1" class="active">
															<span class="step">1</span>
															<span class="title">Datos Personales</span>
														</li>

														<li data-step="2">
															<span class="step">2</span>
															<span class="title">Idiomas</span>
														</li>

														<li data-step="3">
															<span class="step">3</span>
															<span class="title">Proyectos Realizados</span>
														</li>

														<li data-step="4">
															<span class="step">4</span>
															<span class="title">Cursos Realizados</span>
														</li>

														<li data-step="5">
															<span class="step">4</span>
															<span class="title">Ponencias Realizadas</span>
														</li>

														<li data-step="6">
															<span class="step">6</span>
															<span class="title">Premios Obtenidos</span>
														</li>

														<li data-step="7">
															<span class="step">7</span>
															<span class="title">Publicaciones Obtenidas</span>
														</li>

														<li data-step="8">
															<span class="step">8</span>
															<span class="title">Experiencia Obtenida</span>
														</li>

														<li data-step="9">
															<span class="step">9</span>
															<span class="title">Títulos Obtenidos</span>
														</li>
													</ul>
												</div>

												<hr />

												<div class="step-content pos-rel">
													<div class="step-pane active" data-step="1">

														<h3 class="lighter block green">Datos Aspirante</h3>														
														<form class="form-horizontal " id="validation-form" method="get">
															<div class="row">
																<div class="col-xs-12 col-sm-3 center">
																	<span class="profile-picture">
																		<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" <?php echo 'src=../../aspirante/fotos/'.$imagen_aspirante.''?> />
																	</span>
																	<div class="space space-4"></div>
																</div><!-- /.col -->

																<div class="col-xs-12 col-sm-9">
																	<div class="profile-user-info">
																		<div class="profile-info-row">
																			<div class="profile-info-name"> Nombres: </div>

																			<div class="profile-info-value">
																				<span id="nombres"><?php echo $nombres_aspirante?></span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Apellidos: </div>

																			<div class="profile-info-value">
																				<span id="apellidos"><?php echo $apellidos_aspirante?></span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Identificación: </div>

																			<div class="profile-info-value">
																				<span id="identificacion"><?php echo $identificacion_aspirante?></span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Teléfono: </div>

																			<div class="profile-info-value">
																				<span id="telefono"><?php echo $telf_aspirante?></span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Celular: </div>

																			<div class="profile-info-value">
																				<span id="celular"><?php echo $movil_aspirante?></span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Correo:</div>

																			<div class="profile-info-value">
																				<span id="correo"><?php echo $mail_aspirante?></span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Dirección: </div>

																			<div class="profile-info-value">
																				<i class="fa fa-map-marker light-orange bigger-110"></i>
																				<span id="direccion"><?php echo $direccion_aspirante?></span>
																				
																			</div>
																		</div>
																	</div>
																</div>	
															</div>										                           
														</form>															
													</div>

													<div class="step-pane" data-step="2">														
														<form class="form-horizontal " id="validation-form-2" method="get">	
															<div class="row">
																<div class="col-xs-12">
																	<table id="table_idioma"></table>
										                            <div id="pager_idioma"></div>
										                        </div>    
															</div> 
														</form>
													</div>

													<div class="step-pane" data-step="3">
														<form class="form-horizontal " id="validation-form-3" method="get">
															<div class="row">
																<div class="col-xs-12">
																	<table id="table_proyectos"></table>
										                            <div id="pager_proyectos"></div>
										                        </div>	
															</div>	
														</form>
													</div>

													<div class="step-pane" data-step="4">
														<form class="form-horizontal " id="validation-form-4" method="get">
															<div class="row">
																<div class="col-xs-12">
																	<table id="table_cursos"></table>
										                            <div id="pager_cursos"></div>
										                        </div>	
															</div>	
														</form>
													</div>

													<div class="step-pane" data-step="5">
														<form class="form-horizontal " id="validation-form-5" method="get">
															<div class="row">
																<div class="col-xs-12">
																	<table id="table_ponencias"></table>
										                            <div id="pager_ponencias"></div>
										                        </div>	
															</div>	
														</form>
													</div>

													<div class="step-pane" data-step="6">
														<form class="form-horizontal " id="validation-form-6" method="get">
															<div class="row">
																<div class="col-xs-12">
																	<table id="table_premios"></table>
										                            <div id="pager_premios"></div>
										                        </div>	
															</div>	
														</form>
													</div>

													<div class="step-pane" data-step="7">
														<form class="form-horizontal " id="validation-form-7" method="get">
															<div class="row">
																<div class="col-xs-12">
																	<table id="table_publicaciones"></table>
										                            <div id="pager_publicaciones"></div>
										                        </div>	
															</div>	
														</form>
													</div>

													<div class="step-pane" data-step="8">
														<form class="form-horizontal " id="validation-form-8" method="get">
															<div class="row">
																<div class="col-xs-12">
																	<table id="table_experiencia"></table>
										                            <div id="pager_experiencia"></div>
										                        </div>	
															</div>	
														</form>
													</div>

													<div class="step-pane" data-step="9">
														<form class="form-horizontal " id="validation-form-9" method="get">
															<div class="row">
																<div class="col-xs-12">
																	<table id="table_titulos"></table>
										                            <div id="pager_titulos"></div>
										                        </div>	
															</div>	
														</form>
													</div>
												</div>
											</div>

											<hr />
											<div class="wizard-actions">
												<button class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Atras
												</button>

												<button class="btn btn-success btn-next" data-last="Finalizar">
													Siguiente
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>

								<div id="modal-wizard" class="modal">
									<div class="modal-dialog">
										<div class="modal-content">
											<div id="modal-wizard-container">
												<div class="modal-header">
													<ul class="steps">
														<li data-step="1" class="active">
															<span class="step">1</span>
															<span class="title">Datos Personales</span>
														</li>

														<li data-step="2">
															<span class="step">2</span>
															<span class="title">Alerts</span>
														</li>

														<li data-step="3">
															<span class="step">3</span>
															<span class="title">Payment Info</span>
														</li>

														<li data-step="4">
															<span class="step">4</span>
															<span class="title">Other Info</span>
														</li>
													</ul>
												</div>

												<div class="modal-body step-content">
													<div class="step-pane active" data-step="1">
														<div class="center">
															<h4 class="blue">Step 1</h4>
														</div>
													</div>

													<div class="step-pane" data-step="2">
														<div class="center">
															<h4 class="blue">Step 2</h4>
														</div>
													</div>

													<div class="step-pane" data-step="3">
														<div class="center">
															<h4 class="blue">Step 3</h4>
														</div>
													</div>

													<div class="step-pane" data-step="4">
														<div class="center">
															<h4 class="blue">Step 4</h4>
														</div>
													</div>
												</div>
											</div>

											<div class="modal-footer wizard-actions">
												<button class="btn btn-sm btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Prev
												</button>

												<button class="btn btn-success btn-sm btn-next" data-last="Finish">
													Next
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>

												<button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Cancel
												</button>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
				</div>
			</div><!-- /.main-content -->

			<?php footer(); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='../../dist/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../../dist/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../../dist/js/bootstrap.min.js"></script>
		<script src="../../dist/js/jquery-ui.custom.min.js"></script>
		<script src="../../dist/js/jquery.ui.touch-punch.min.js"></script>						
		<script src="../../dist/js/chosen.jquery.min.js"></script>
		<script src="../../dist/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="../../dist/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="../../dist/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="../../dist/js/x-editable/bootstrap-editable.min.js"></script>
		<script src="../../dist/js/x-editable/ace-editable.min.js"></script>
		<script src="../../dist/js/jquery.gritter.min.js"></script>
		<script src="../../dist/js/jquery.maskedinput.min.js"></script>
		<script src="../../dist/js/alertify.min.js"></script>
		<script src="../../dist/js/jqGrid/jquery.jqGrid.min.js"></script>
        <script src="../../dist/js/jqGrid/i18n/grid.locale-en.js"></script>
        <script src="../../dist/js/select2.min.js"></script>

        <script src="../../dist/js/fuelux/fuelux.wizard.min.js"></script>
		<script src="../../dist/js/jquery.validate.min.js"></script>
		<script src="../../dist/js/additional-methods.min.js"></script>
		<script src="../../dist/js/bootbox.min.js"></script>
		<!-- ace scripts -->		
		<script src="../../dist/js/ace-elements.min.js"></script>
		<script src="../../dist/js/ace.min.js"></script>
		
		

        <script src="../generales.js"></script>
		<script src="aspirantes.js"></script>
		
	</body>
</html>  

