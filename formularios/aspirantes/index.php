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
                            <li class="active">Aspirantes</li>
                        </ul>
                    </div>
					<div class="page-content">
						<div class="row">
							<div class="widget-body">
								<div class="widget-main">
									<div class="row">
										<form class="form-horizontal" role="form" name="form_aspirantes" id="form_aspirantes">
											<div class="row">
												<div class="col-xs-12">
													<div class="tabbable">
														<ul class="nav nav-tabs" id="myTab">
															<li class="active">
																<a data-toggle="tab" href="#info_pro">
																	<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
																	Información Aspirante
																</a>
															</li>

															<!-- <li>
																<a data-toggle="tab" href="#deta_adici">
																<i class="purple ace-icon fa fa-cubes bigger-120"></i>
																	Detalles Adicionales
																</a>
															</li> -->
														</ul>

														<div class="tab-content">
															<div id="info_pro" class="tab-pane fade in active">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label class="col-sm-4 control-label no-padding-right" for="tipo_documento"> Tipo Documento:</label>
																		<div class="col-sm-8">
																			<select class="chosen-select form-control" id="tipo_documento" name="tipo_documento" data-placeholder="Tipo Documento">
																				<option value="Cedula">Cédula</option>	
																				<option value="RUC">RUC</option>	
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

									                                <div class="form-group">
									                                	<label class="col-sm-4 control-label no-padding-right" for=""></label>
									                                	<div class="col-sm-8" style="width: 180px; height: 180px; align="center" " title="LOGO">
									                                      <img id="foto" name="foto" style="width: 100%; height: 100%"  />
									                                  </div>
									                                </div>
																</div>

																<div class="col-sm-6">
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
															</div>
															<!-- <div id="deta_adici" class="tab-pane fade ">
																Seguir........
															</div> -->
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
											<button type="button" id="btn_Atras" class="btn btn-primary"><i class="ace-icon fa fa-arrow-circle-left bigger-120 white"></i>
												Atras
											</button>
											<button type="button" id="btn_Adelante" class="btn btn-primary"><i class="ace-icon fa fa fa-arrow-circle-right bigger-120 white"></i>
												Adelante
											</button>
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
		<script src="aspirantes.js"></script>
	</body>
</html>  

