<?php

 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		
		<link rel="shortcut icon" href="../../dist/images/logo.fw.png">
		<title>.::UNIANDES.:</title>

		<meta name="description" content="Dynamic tables and grids using jqGrid plugin" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="dist/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="dist/css/jquery-ui.min.css" />
        <link rel="stylesheet" href="dist/css/datepicker.min.css" />
        <link rel="stylesheet" href="dist/css/ui.jqgrid.min.css" />
        <link rel="stylesheet" href="dist/css/animate.min.css" />
        <link rel="stylesheet" href="dist/css/jquery.gritter.min.css" />
        <link rel="stylesheet" href="dist/css/alertify.core.css" />
    	<link rel="stylesheet" href="dist/css/alertify.default.css" id="toggleCSS" />

        <!-- text fonts -->
        <link rel="stylesheet" href="dist/css/fontdc.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="dist/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <link type="text/css" rel="stylesheet" id="ace-skins-stylesheet" href="dist/css/ace-skins.min.css">
        <link type="text/css" rel="stylesheet" id="ace-rtl-stylesheet" href="dist/css/ace-rtl.min.css">
        <script src="dist/js/ace-extra.min.js"></script>
    </head>

    <body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="" class="navbar-brand">
						<small>
							<img src="dist/images/UNIANDES-Logo.png">
							SELECCIÓN DEL TALENTO HUMANO BASADO EN COMPETENCIAS
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="dist/avatars/user.jpg" alt="" />
								<span class="user-info">

									Uniandes
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="index2.php">
										<i class="ace-icon fa fa-user"></i>
										Ingreso Sistema
									</a>
								</li>

								<li class="divider"></li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			 <div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="">Principal</a>
                            </li>
                        </ul>
                    </div>
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<div class="widget-body">
									<div class="widget-main">
										<div class="row">
											
												<div class="row">
													<div class="col-xs-12">
														<div class="tabbable">
															<ul class="nav nav-tabs" id="myTab">
																<li class="active">
																	<a data-toggle="tab" href="#info_pro">
																		<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
																		Nuevo Aspirante
																	</a>
																</li>
															</ul>

															<div class="tab-content">
																<div id="info_pro" class="tab-pane fade in active">
																	<div class="alert alert-block alert-success">
																		<button type="button" class="close" data-dismiss="alert">
																			<i class="ace-icon fa fa-times"></i>
																		</button>
																		<i class="ace-icon fa fa-check green"></i>
																		Bienvenido, Su usuario y Contraseña seran su número de identificación.
																	</div>
																	<form class="form-horizontal" role="form" name="form_aspirantes" id="form_aspirantes">
																		<div class="col-sm-4">
																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="tipo_documento"> Tipo Documento:</label>
																				<div class="col-sm-8">
																					<select class="chosen-select form-control" id="tipo_documento" name="tipo_documento" data-placeholder="Tipo Documento">
																						<option value="Cedula">Cédula</option>	
																						<!-- <option value="RUC">RUC</option>	 -->
																						<option value="Pasaporte">Pasaporte</option>																				
																					</select>						
																					<input type="hidden" id="id_aspirante" name="id_aspirante" />
																					<input type="hidden" id="comprobante" name="comprobante" value="<?php echo $cont ?>" />											
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="nombres_aspirantes"> Nombres: <font color="red">*</font></label>
																				<div class="col-sm-8">
																					<input type="text" id="nombres_aspirantes" name="nombres_aspirantes"  placeholder="Nombres Completos" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{10,10}"/>																																																						
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="telf_aspirante"> Teléfono:</label>
																				<div class="col-sm-8">
																					<span class="block input-icon input-icon-right">
																						<input type="text" id="telf_aspirante" name="telf_aspirante" placeholder="Teléfono Aspirante" class="form-control"/>
																						<i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
									                                                </span>
																				</div>
																			</div>

																			<div class="form-group">																	
																				<label class="col-sm-4 control-label no-padding-right" for="fnac_aspirante">Fecha Nacimiento: <font color="red">*</font></label>
																				<div class="col-sm-8">
																					<div class="input-group">
																						<input class="form-control date-picker" id="fnac_aspirante" name="fnac_aspirante" readonly type="text" data-date-format="yyyy-mm-dd" />
																						<span class="input-group-addon">
																							<i class="fa fa-calendar bigger-110"></i>
																						</span>
																					</div>
																				</div>																														
																			</div>

																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="mail_aspirante"> Correo:</label>
																				<div class="col-sm-8">
																					<span class="block input-icon input-icon-right">
																						<input type="text" id="mail_aspirante" name="mail_aspirante" placeholder="Correo Aspirante" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" />
																						<i class="ace-icon fa fa-envelope fa-flip-horizontal"></i>
									                                                </span>
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="ciudad_aspirante"> Ciudad: <font color="red">*</font></label>
																				<div class="col-sm-8">
																					<input type="text" id="ciudad_aspirante" name="ciudad_aspirante"  placeholder="Ciudad Aspirante" class="form-control" data-toggle="tooltip" data-original-title=""  />																																																						
																				</div>
																			</div>

																			<div class="form-group">
											                                  <label class="col-sm-4 control-label no-padding-right" for="archivo"> Foto:</label>
											                                  <div class="col-sm-8">
											                                  	<input type="file" name="archivo" id="archivo" onchange='Test.UpdatePreview(this)' accept="image/*">
											                                  </div>
											                                </div>
																		</div>

																		<div class="col-sm-4">
																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="ruc_ci"> RUC/C.I.: <font color="red">*</font></label>
																				<div class="col-sm-8">
																					<input type="text" id="ruc_ci" name="ruc_ci"  placeholder="Identificación Aspirante" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" />																																																						
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="apellidos_aspirantes"> Apellidos: <font color="red">*</font></label>
																				<div class="col-sm-8">
																					<input type="text" id="apellidos_aspirantes" name="apellidos_aspirantes"  placeholder="Apellidos Completos" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{10,10}" />																																																						
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="movil_aspirante"> Celular: </label>																	
																				<div class="col-sm-8">
																					<span class="block input-icon input-icon-right">
																						<input type="text" id="movil_aspirante" name="movil_aspirante" placeholder="Celular Aspirante" class="form-control" />
																						<i class="ace-icon fa fa-mobile fa-flip-horizontal"></i>
									                                                </span>
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="genero_aspirante"> Genero: </label>
																				<div class="col-sm-8">
																					<select class="chosen-select form-control" id="genero_aspirante" name="genero_aspirante" data-placeholder="Genero">
																						<option value="Masculino">Masculino</option>	
																						<option value="Femenino">Femenino</option>	
																					</select>						
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="pais_aspirante"> País: <font color="red">*</font></label>
																				<div class="col-sm-8">
																					<input type="text" id="pais_aspirante" name="pais_aspirante"  placeholder="País Aspirante" class="form-control" data-toggle="tooltip" data-original-title=""  />																																																						
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="direccion_aspirante"> Dirección: <font color="red">*</font></label>
																				<div class="col-sm-8">
																					<input type="text" id="direccion_aspirante" name="direccion_aspirante"  placeholder="Dirección Aspirante" class="form-control" data-toggle="tooltip" data-original-title=""  />																																																						
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-sm-4 control-label no-padding-right" for="comentarios"> Comentarios:</label>
																				<div class="col-sm-8">	
																					<textarea id="comentarios" name="comentarios" placeholder="" class="form-control" ></textarea>
																				</div>
																			</div>
																		</div>

																		<div class="col-sm-4">
																			<div class="form-group">
											                                	<label class="col-sm-4 control-label no-padding-right" for=""></label>
											                                	<div class="col-sm-8" style="width: 180px; height: 180px; align="center" " title="LOGO">
											                                      <img id="foto" name="foto" style="width: 100%; height: 100%"  />
											                                  </div>
											                                </div>	
																		</div>
																	</form>	

																	

																	<div class="col-sm-12">
																		<div class="space-10"></div>
																		<div class="clearfix form-actions center">
																			<button type="submit" class="btn btn-primary" id="btn_Retornar"><i class="ace-icon fa fa-arrow-left"></i>
																				Retornar
																			</button>
																			<button type="submit" class="btn btn-primary" id="btn_Guardar"><i class="ace-icon fa fa-floppy-o bigger-120 white"></i>
																				Registar
																			</button>
																		</div>
																	</div>
																</div>
													       </div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Uniandes </span>
							Aplicación Web &copy; 2015-2016
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='dist/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='dist/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="dist/js/bootstrap.min.js"></script>
		<script src="dist/js/jquery-ui.custom.min.js"></script>
		<script src="dist/js/jquery.ui.touch-punch.min.js"></script>
		<script src="dist/js/jquery.easypiechart.min.js"></script>
		<script src="dist/js/jquery.sparkline.min.js"></script>
		<script src="dist/js/flot/jquery.flot.min.js"></script>
		<script src="dist/js/flot/jquery.flot.pie.min.js"></script>
		<script src="dist/js/flot/jquery.flot.resize.min.js"></script>
		<script src="dist/js/chosen.jquery.min.js"></script>
		<script src="dist/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="dist/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="dist/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="dist/js/x-editable/bootstrap-editable.min.js"></script>
		<script src="dist/js/x-editable/ace-editable.min.js"></script>
		<script src="dist/js/jquery.gritter.min.js"></script>
		<script src="dist/js/jquery.maskedinput.min.js"></script>
		<script src="dist/js/alertify.min.js"></script>

		<!-- ace scripts -->		
		<script src="dist/js/ace-elements.min.js"></script>
		<script src="dist/js/ace.min.js"></script>
		<script src="dist/js/jqGrid/jquery.jqGrid.min.js"></script>
        <script src="dist/js/jqGrid/i18n/grid.locale-en.js"></script>

        <script src="formularios/generales.js"></script>
        <script src="aspirante/aspirantes.js"></script>
	</body>
</html>  

