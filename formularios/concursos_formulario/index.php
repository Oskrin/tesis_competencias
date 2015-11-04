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
		<title>.:UNIANDES:.</title>

		<meta name="description" content="Dynamic tables and grids using jqGrid plugin" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../../dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../dist/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="../../dist/css/jquery-ui.min.css" />
        <link rel="stylesheet" href="../../dist/css/datepicker.min.css" />
        <link rel="stylesheet" href="../../dist/css/ui.jqgrid.min.css" />
        <link rel="stylesheet" href="../../dist/css/bootstrap-editable.min.css" />
        <link rel="stylesheet" href="../../dist/css/chosen.min.css" />
        <link rel="stylesheet" href="../../dist/css/jquery.gritter.min.css" />
        <link rel="stylesheet" href="../../dist/css/alertify.core.css" />
    	<link rel="stylesheet" href="../../dist/css/alertify.default.css" id="toggleCSS" />

        <!-- text fonts -->
        <link rel="stylesheet" href="../../dist/css/fontdc.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="../../dist/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <link type="text/css" rel="stylesheet" id="ace-skins-stylesheet" href="../../dist/css/ace-skins.min.css">
        <link type="text/css" rel="stylesheet" id="ace-rtl-stylesheet" href="../../dist/css/ace-rtl.min.css">
        <script src="../../dist/js/ace-extra.min.js"></script>
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
                            <li class="active">Concursos</li>
                        </ul>
                    </div>
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12 col-sm-12 widget-container-col">
								<div class="widget-box">
									<div class="widget-header">
										<h5 class="widget-title"><i class="ace-icon fa fa-user"></i> CONCURSOS</h5>
										<div class="widget-toolbar">
											<a href="" data-action="fullscreen" class="orange2">
												<i class="ace-icon fa fa-expand"></i>
											</a>
											<a href="" data-action="reload">
												<i class="ace-icon fa fa-refresh"></i>
											</a>
										</div>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div class="row">
												<form class="form-horizontal" role="form" name="form_docentes" id="form_docentes">
													<div class="row">
														<div class="col-xs-12">
															<div class="col-sm-6">
																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="tipo_documento">Convocatoria: <font color="red">*</font></label>
																	<div class="col-sm-8">
																		<select class="chosen-select form-control" id="convocatoria" name="convocatoria" data-placeholder="Convocatoria">																						
																			
																		</select>								
																		<input type="hidden" id="id_convocatoria" name="id_convocatoria" />										
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="cargo_concurso"> Cargo del Concurso: <font color="red">*</font></label>
																	<div class="col-sm-8">
																		<input type="text" id="cargo_concurso" name="cargo_concurso"  placeholder="Cargo Concurso" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{10,10}"/>																																																						
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="telf"> Teléfono:</label>
																	<div class="col-sm-8">
																		<span class="block input-icon input-icon-right">
																			<input type="text" id="telf" name="telf" placeholder="Teléfono Docente" class="form-control"/>
																			<i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
						                                                </span>
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="mail"> Correo:</label>
																	<div class="col-sm-8">
																		<span class="block input-icon input-icon-right">
																			<input type="text" id="mail" name="mail" placeholder="Correo Docente" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" />
																			<i class="ace-icon fa fa-envelope fa-flip-horizontal"></i>
						                                                </span>
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="ciudad"> Ciudad: <font color="red">*</font></label>
																	<div class="col-sm-8">
																		<input type="text" id="ciudad" name="ciudad"  placeholder="Ciudad Docente" class="form-control" data-toggle="tooltip" data-original-title=""  />																																																						
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="comentarios"> Comentarios:</label>
																	<div class="col-sm-8">	
																		<textarea id="comentarios" name="comentarios" placeholder="" class="form-control" ></textarea>
																	</div>
																</div>
															</div>

															<div class="col-sm-6">
																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="ruc_ci">Tribunal: <font color="red">*</font></label>
																	<div class="col-sm-8">
																		<select class="chosen-select form-control" id="tribunal" name="tribunal" data-placeholder="Tribunal">																						
																			
																		</select>
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="apellidos"> Apellidos: <font color="red">*</font></label>
																	<div class="col-sm-8">
																		<input type="text" id="apellidos" name="apellidos"  placeholder="Apellidos Completos" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{10,10}" />																																																						
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="movil"> Celular: </label>																	
																	<div class="col-sm-8">
																		<span class="block input-icon input-icon-right">
																			<input type="text" id="movil" name="movil" placeholder="Celular Docente" class="form-control" />
																			<i class="ace-icon fa fa-mobile fa-flip-horizontal"></i>
						                                                </span>
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="pais"> País: <font color="red">*</font></label>
																	<div class="col-sm-8">
																		<input type="text" id="pais" name="pais"  placeholder="País Docente" class="form-control" data-toggle="tooltip" data-original-title=""  />																																																						
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="direccion"> Dirección: <font color="red">*</font></label>
																	<div class="col-sm-8">
																		<input type="text" id="direccion" name="direccion"  placeholder="Dirección Docente" class="form-control" data-toggle="tooltip" data-original-title=""  />																																																						
																	</div>
																</div>
															</div>
														</div>
													</div>
												</form>

												<div class="clearfix form-actions center">
													<button type="submit" class="btn btn-primary" id="btn_Guardar"><i class="ace-icon fa fa-floppy-o bigger-120 white"></i>
														Guardar
													</button>
													<button type="button" id="btn_Modificar" class="btn btn-primary"><i class="ace-icon fa fa-refresh bigger-120 white"></i>
														Modificar
													</button>
													<button type="button" id="btn_Limpiar" class="btn btn-primary"><i class="ace-icon fa fa-file-o bigger-120 white"></i>
														Nuevo
													</button>
													<button data-toggle="modal" href="#myModal" type="button" id="btn_Buscar" class="btn btn-primary"><i class="ace-icon fa fa-search bigger-120 white"></i>
														Buscar
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>							
						</div>
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
		          <h4 class="modal-title">BUSCAR CONCURSOS</h4>
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
		<script src="../../dist/js/jquery.easypiechart.min.js"></script>
		<script src="../../dist/js/jquery.sparkline.min.js"></script>
		<script src="../../dist/js/flot/jquery.flot.min.js"></script>
		<script src="../../dist/js/flot/jquery.flot.pie.min.js"></script>
		<script src="../../dist/js/flot/jquery.flot.resize.min.js"></script>
		<script src="../../dist/js/chosen.jquery.min.js"></script>
		<script src="../../dist/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="../../dist/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="../../dist/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="../../dist/js/x-editable/bootstrap-editable.min.js"></script>
		<script src="../../dist/js/x-editable/ace-editable.min.js"></script>
		<script src="../../dist/js/jquery.gritter.min.js"></script>
		<script src="../../dist/js/jquery.maskedinput.min.js"></script>
		<script src="../../dist/js/alertify.min.js"></script>

		<!-- ace scripts -->		
		<script src="../../dist/js/ace-elements.min.js"></script>
		<script src="../../dist/js/ace.min.js"></script>
		<script src="../../dist/js/jqGrid/jquery.jqGrid.min.js"></script>
        <script src="../../dist/js/jqGrid/i18n/grid.locale-en.js"></script>

        <script src="../generales.js"></script>
		<script src="concursos.js"></script>
	</body>
</html>  

