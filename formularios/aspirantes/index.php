<?php
 include('../menu/index.php'); 
 include '../conexion.php';
 $conexion = conectarse();

 /////////////contador aspirantes//////////
$consulta = pg_query("select max(id_aspirante) from aspirantes");
while ($row = pg_fetch_row($consulta)) {
    $cont = $row[0];
}
$cont++;
////////////////////////////////////////

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
										<h4 class="widget-title lighter">DATOS ASPIRANTE</h4>										
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
														<h3 class="lighter block green">Datos Personales</h3>														
														<form class="form-horizontal " id="validation-form" method="get">																														
															<div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_1">C.I.:</label>
																	<div class="col-xs-5 col-sm-5">																		
																		<input type="text" name="txt_1" id="txt_1" class="col-xs-12 col-sm-12" />																		
																	</div>
																</div>								                            	
								                            </div>														
								                            <div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_2">Apellidos:</label>
																	<div class="col-xs-5 col-sm-5">																		
																		<input type="text" name="txt_2" id="txt_2" class="col-xs-12 col-sm-12" />																		
																	</div>
																</div>								                            	
								                            </div>														
								                            <div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_3">Nombres :</label>
																	<div class="col-xs-5 col-sm-5">																		
																		<input type="text" name="txt_3" id="txt_3" class="col-xs-12 col-sm-12" />																		
																	</div>
																</div>								                            	
								                            </div>			
								                            <div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_4">Teléfono:</label>
																	<div class="col-xs-5 col-sm-5">																		
																		<input type="text" name="txt_4" id="txt_4" class="col-xs-12 col-sm-12" />																		
																	</div>
																</div>								                            	
								                            </div>		
								                            <div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_5">Celular:</label>
																	<div class="col-xs-5 col-sm-5">																		
																		<input type="text" name="txt_5" id="txt_5" class="col-xs-12 col-sm-12" />																		
																	</div>
																</div>								                            	
								                            </div>		
								                            <div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_6">F. Nacimiento:</label>
																	<div class="col-xs-5 col-sm-5">																		
																		<input type="text" name="txt_6" id="txt_6" class="col-xs-12 col-sm-12" />																		
																	</div>
																</div>								                            	
								                            </div>		
								                            <div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_7">Genero:</label>
																	<div class="col-xs-5 col-sm-5">																																				
																		<select name="txt_7" id="txt_7" class="select2" data-placeholder="Seleccione un Genero">
																		<option value="">&nbsp;</option>
																		<option value="M">Masculino</option>
																		<option value="F">Femenino</option>																		
																	</select>																		
																	</div>
																</div>								                            	
								                            </div>
								                            <div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_8">E-mail:</label>
																	<div class="col-xs-5 col-sm-5">																		
																		<input type="text" name="txt_8" id="txt_8" class="col-xs-12 col-sm-12" />																		
																	</div>
																</div>								                            	
								                            </div>	
								                            <div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_9">País:</label>
																	<div class="col-xs-5 col-sm-5">																																				
																		<select name="txt_9" id="txt_9" class="select2" data-placeholder="Seleccione un País">
																		<option value="">&nbsp;</option>
																		
																	</select>																																			
																	</div>
																</div>								                            	
								                            </div>		
								                            <div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_10">Ciudad:</label>
																	<div class="col-xs-5 col-sm-5">																																				
																		<select name="txt_10" id="txt_10" class="select2" data-placeholder="Seleccione una ciudad">
																		<option value="">&nbsp;</option>	
																																																														
																	</select>																		
																	</div>
																</div>								                            	
								                            </div>			
								                            <div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_11">Dirección:</label>
																	<div class="col-xs-5 col-sm-5">																		
																		<input type="text" name="txt_11" id="txt_11" class="col-xs-12 col-sm-12" />																		
																	</div>
																</div>								                            	
								                            </div>		
								                            <div class="col-md-6">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_12">Observaciones:</label>
																	<div class="col-xs-5 col-sm-5">																												
																		<textarea type="text" name="txt_12" id="txt_12" class="col-xs-12 col-sm-12" /></textarea>	
																	</div>
																</div>								                            	
								                            </div>											                           
								                            
														</form>															
													</div>

													<div class="step-pane" data-step="2">														
														<form class="form-horizontal " id="validation-form-2" method="get">	
															<div class="col-md-4">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_1">Idioma:</label>
																	<div class="col-xs-5 col-sm-5">																		
																		<input type="text" name="txt_idioma" id="txt_idioma"/>																		
																	</div>
																</div>								                            	
								                            </div>

								                            <div class="col-md-4">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_1">Nivel Lectura:</label>
																	<div class="col-xs-5 col-sm-5">																		
																		<input type="text" name="txt_lectura" id="txt_lectura"/>																		
																	</div>
																</div>								                            	
								                            </div>

								                            <div class="col-md-4">																
																<div class="form-group">
																	<label class="control-label col-xs-3 col-sm-3 no-padding-right" for="txt_1">Nivel Escritura:</label>
																	<div class="col-xs-5 col-sm-5">																		
																		<input type="text" name="txt_escritura" id="txt_escritura"/>																		
																	</div>
																</div>								                            	
								                            </div>

															<div class="form-group">
																<div class="row">
																	<div class="col-xs-12">
																		<table id="grid-table"></table>
											                            <div id="grid-pager"></div>
										                            </div>								
																</div>
								                            </div>	
														</form>
														
													</div>

													<div class="step-pane" data-step="3">
														<div class="center">
															<h3 class="blue lighter">This is step 3</h3>
														</div>
													</div>

													<div class="step-pane" data-step="4">
														<div class="center">
															<h3 class="green">Congrats!</h3>
															Your product is ready to ship! Click finish to continue!
														</div>
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

		  <!-- Modal -->
		  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h4 class="modal-title">BUSCAR ASPIRANTES</h4>
		        </div>
		        <div class="modal-body">
		            <table id="table"></table>
					<div id="pager"></div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
		        </div>
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->

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

