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
																	<a data-toggle="tab" href="#ingreso">
																	<i class="purple ace-icon fa fa-key bigger-120"></i>
																		Ingreso Cuenta
																	</a>
																</li>
															</ul>

															<div class="tab-content">
																<div id="ingreso" class="tab-pane fade in active">
																	<div class="col-sm-10 col-sm-offset-1">
																		<div class="login-container">
																			<div class="space-6"></div>
																			<div class="position-relative">
																				<div id="login-box" class="login-box visible widget-box no-border">
																					<div class="widget-body">
																						<div class="widget-main">
																							<h4 class="header blue lighter bigger">
																								Datos Personales
																							</h4>
																							<div class="space-6"></div>
																							<form role="form" name="form_ingreso" id="form_ingreso">
																								<fieldset>
																									<label class="block clearfix">
																										<span class="block input-icon input-icon-right">
																											<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" />
																											<i class="ace-icon fa fa-user"></i>
																										</span>
																									</label>

																									<label class="block clearfix">
																										<span class="block input-icon input-icon-right">
																											<input type="password" name="clave" id="clave" class="form-control" placeholder="Password" />
																											<i class="ace-icon fa fa-lock"></i>
																										</span>
																									</label>
																									<div class="space"></div>
																									<div class="space-4"></div>
																								</fieldset>
																							</form>

																							<div class="clearfix">
																								<label class="inline">
																									<input type="checkbox" class="ace" />
																									<span class="lbl"> Recuérdame</span>
																								</label>

																								<button type="submit" name="btn_Ingresar" id="btn_Ingresar" class="width-35 pull-right btn btn-sm btn-primary">
																									<i class="ace-icon fa fa-key"></i>
																									<span class="bigger-110">Enviar</span>
																								</button>
																							</div>

																							<div class="social-or-login center">
																								<span class="bigger-110"></span>
																							</div>

																							<div class="space-6"></div>
																						</div><!-- /.widget-main -->

																						<div class="toolbar clearfix">
																							<div>
																								<a href="#" data-target="#forgot-box" class="forgot-password-link">
																									<i class="ace-icon fa fa-arrow-left"></i>
																									Olvidé mi contraseña
																								</a>
																							</div>

																							<div>
																								<a href="registro.php" data-target="#signup-box" class="user-signup-link">
																									Quiero registrarme
																									<i class="ace-icon fa fa-arrow-right"></i>
																								</a>
																							</div>
																						</div>
																					</div><!-- /.widget-body -->
																				</div><!-- /.login-box -->
																			</div><!-- /.position-relative -->
																		</div>
																	</div>
																</div>s
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

