$(document).on("ready",inicio);

function guardar_aspirante() {
    var iden = $("#ruc_ci").val();
    
    if ($("#tipo_documento").val() === "") {
        $("#tipo_documento").focus();
        alertify.error("Seleccione un tipo de documento ");
    } else {
        if ($("#tipo_documento").val() === "Cedula" && iden.length < 10) {
            $("#ruc_ci").focus();
            alertify.error("Error.. Minimo 10 digitos ");
        } else {
            if ($("#tipo_documento").val() === "Ruc" && iden.length < 13) {
                $("#ruc_ci").focus();
                alertify.error("Error.. Minimo 13 digitos ");
            } else {
                if ($("#nombres_aspirantes").val() === "") {
                    $("#nombres_aspirantes").focus();
                    alertify.error("Ingrese Nombres completos");
                } else {
                    if ($("#apellidos_aspirantes").val() === "") {
                        $("#apellidos_aspirantes").focus();
                         alertify.error("Ingrese Apellidos completos");
                    } else {
                        if ($("#fnac_aspirante").val() === "") {
                            $("#fnac_aspirante").focus();
                            alertify.error("Ingrese Fecha Nacimiento");
                        } else {
                            if ($("#pais_aspirante").val() === "") {
                                $("#pais_aspirante").focus();
                                alertify.error("Ingrese un País");
                            } else {
                                if ($("#ciudad_aspirante").val() === "") {
                                    $("#ciudad_aspirante").focus();
                                    alertify.error("Ingrese una Ciudad");
                                } else {
                                    if ($("#direccion_aspirante").val() === "") {
                                        $("#direccion_aspirante").focus();
                                        alertify.error("Ingrese la Dirección");
                                    }else{
                                    	$("#btn_Guardar").attr("disabled", true);
                                        $("#form_aspirantes").submit(function(e) {
                                            var formObj = $(this);
                                            var formURL = formObj.attr("action");
                                            if(window.FormData !== undefined) {	
                                                var formData = new FormData(this);   
                                                formURL=formURL; 
                                                $.ajax({
                                                    url: "guardar_aspirantes.php",
                                                    type: "POST",
                                                    data:  formData,
                                                    mimeType:"multipart/form-data",
                                                    contentType: false,
                                                    cache: false,
                                                    processData:false,
                                                    success: function(data, textStatus, jqXHR) {
                                                        var res = data;
                                                        if(res == 1){
                                                        	$.gritter.add({
																title: 'Información Mensaje',
																text: '</span><br><span class="fa fa-paw"></span> Registro Guardado Correctamente <span class="text-succes fa fa-spinner fa-spin"></span>',
																sticky: false,
															});
															setTimeout(function() {
                                                                location.reload();
                                                            }, 1000);
                                                        } else{
                                                        }
                                                    },
                                                    error: function(jqXHR, textStatus, errorThrown) 
                                                    {
                                                    } 	        
                                                });
                                                e.preventDefault();
                                            } else {
                                                var  iframeId = "unique" + (new Date().getTime());
                                                var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');
                                                iframe.hide();
                                                formObj.attr("target",iframeId);
                                                iframe.appendTo("body");
                                                iframe.load(function(e)
                                                {
                                                    var doc = getDoc(iframe[0]);
                                                    var docRoot = doc.body ? doc.body : doc.documentElement;
                                                    var data = docRoot.innerHTML;
                                                });
                                            }
                                        });
                                        $("#form_aspirantes").submit();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

function modificar_aspirante() {
    var iden = $("#ruc_ci").val();

    if ($("#id_aspirante").val() === "") {
            alertify.error("Seleccione un Aspirante ");
        } else {
        if ($("#tipo_documento").val() === "") {
            $("#tipo_documento").focus();
            alertify.error("Seleccione un tipo de documento ");
        } else {
            if ($("#tipo_documento").val() === "Cedula" && iden.length < 10) {
                $("#ruc_ci").focus();
                alertify.error("Error.. Minimo 10 digitos ");
            } else {
                if ($("#tipo_documento").val() === "Ruc" && iden.length < 13) {
                    $("#ruc_ci").focus();
                    alertify.error("Error.. Minimo 13 digitos ");
                } else {
                    if ($("#nombres_aspirantes").val() === "") {
                        $("#nombres_aspirantes").focus();
                        alertify.error("Ingrese Nombres completos");
                    } else {
                        if ($("#apellidos_aspirantes").val() === "") {
                            $("#apellidos_aspirantes").focus();
                             alertify.error("Ingrese Apellidos completos");
                        } else {
                            if ($("#fnac_aspirante").val() === "") {
                                $("#fnac_aspirante").focus();
                                alertify.error("Ingrese Fecha Nacimiento");
                            } else {
                                if ($("#pais_aspirante").val() === "") {
                                    $("#pais_aspirante").focus();
                                    alertify.error("Ingrese un País");
                                } else {
                                    if ($("#ciudad_aspirante").val() === "") {
                                        $("#ciudad_aspirante").focus();
                                        alertify.error("Ingrese una Ciudad");
                                    } else {
                                        if ($("#direccion_aspirante").val() === "") {
                                            $("#direccion_aspirante").focus();
                                            alertify.error("Ingrese la Dirección");
                                        }else{
                                        	$("#btn_Modificar").attr("disabled", true);
                                            $("#form_aspirantes").submit(function(e) {
                                                var formObj = $(this);
                                                var formURL = formObj.attr("action");
                                                if(window.FormData !== undefined) {	
                                                    var formData = new FormData(this);   
                                                    formURL=formURL; 
                                                    $.ajax({
                                                        url: "modificar_aspirantes.php",
                                                        type: "POST",
                                                        data:  formData,
                                                        mimeType:"multipart/form-data",
                                                        contentType: false,
                                                        cache: false,
                                                        processData:false,
                                                        success: function(data, textStatus, jqXHR) {
                                                            var res = data;
                                                            if(res == 1){
                                                            	$.gritter.add({
    																title: 'Información Mensaje',
    																text: '</span><br><span class="fa fa-paw"></span> Registro Modificado Correctamente <span class="text-succes fa fa-spinner fa-spin"></span>',
    																sticky: false,
    															});
    															setTimeout(function() {
                                                                    location.reload();
                                                                }, 1000);
                                                            } else{
                                                            }
                                                        },
                                                        error: function(jqXHR, textStatus, errorThrown) 
                                                        {
                                                        } 	        
                                                    });
                                                    e.preventDefault();
                                                } else {
                                                    var  iframeId = "unique" + (new Date().getTime());
                                                    var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');
                                                    iframe.hide();
                                                    formObj.attr("target",iframeId);
                                                    iframe.appendTo("body");
                                                    iframe.load(function(e)
                                                    {
                                                        var doc = getDoc(iframe[0]);
                                                        var docRoot = doc.body ? doc.body : doc.documentElement;
                                                        var data = docRoot.innerHTML;
                                                    });
                                                }
                                            });
                                            $("#form_aspirantes").submit();
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

function limpiar(){
$("#btn_Guardar").attr("disabled", true);
$("#id_aspirante").val("");
$("#tipo_documento").val("");
$("#ruc_ci").val("");
$("#nombres_aspirantes").val("");
$("#apellidos_aspirantes").val("");
$("#telf_aspirante").val("");
$("#movil_aspirante").val("");
$("#fnac_aspirante").val("");
$("#genero_aspirante").val("");
$("#mail_aspirante").val("");
$("#pais_aspirante").val("");
$("#ciudad_aspirante").val("");
$("#direccion_aspirante").val("");
$("#comentarios").val("");    
}

function flecha_atras(){
    $.ajax({
       type: "POST",
       url: "../procesos/flechas.php",
       data: "comprobante=" + $("#comprobante").val() + "&tabla=" + "aspirantes" + "&id_tabla=" + "id_aspirante" + "&tipo=" + 1,
       success: function(data) {
           var val = data;
           if(val != ""){
                $("#comprobante").val(val);
                var valor = $("#comprobante").val();
                
                ///////////////////llamar flechas primera parte/////
                limpiar();
                $.getJSON('retornar.php?com=' + valor, function(data) {
                    var tama = data.length;
                    if (tama !== 0) {
                        for (var i = 0; i < tama; i = i + 15) {
                            $("#id_aspirante").val(data[i]);
                            $("#tipo_documento").val(data[i + 1]);
                            $("#ruc_ci").val(data[i + 2 ]);
                            $("#nombres_aspirantes").val(data[i + 3]);
                            $("#apellidos_aspirantes").val(data[i + 4]);
                            $("#telf_aspirante").val(data[i + 5]);
                            $("#movil_aspirante").val(data[i + 6]);
                            $("#fnac_aspirante").val(data[i + 7]);
                            $("#genero_aspirante").val(data[i + 8]);
                            $("#mail_aspirante").val(data[i + 9]);
                            $("#pais_aspirante").val(data[i + 10]);
                            $("#ciudad_aspirante").val(data[i + 11]);
                            $("#direccion_aspirante").val(data[i + 12]);
                            $("#foto").attr("src", "fotos/"+ data[i + 13]);
                            $("#comentarios").val(data[i + 14]);
                        }
                    }
                });
           }else{
               alertify.alert("No hay mas registros posteriores!!");
           }
       }
   }); 
}


function flecha_adelante(){
    $.ajax({
       type: "POST",
       url: "../procesos/flechas.php",
       data: "comprobante=" + $("#comprobante").val() + "&tabla=" + "aspirantes" + "&id_tabla=" + "id_aspirante" + "&tipo=" + 2,
       success: function(data) {
           var val = data;
           if(val != ""){
                $("#comprobante").val(val);
                var valor = $("#comprobante").val();
                ///////////////////llamar flechas primera parte/////
                limpiar();
                $.getJSON('retornar.php?com=' + valor, function(data) {
                    var tama = data.length;
                    if (tama !== 0) {
                        for (var i = 0; i < tama; i = i + 15) {
                            $("#id_aspirante").val(data[i]);
                            $("#tipo_documento").val(data[i + 1]);
                            $("#ruc_ci").val(data[i + 2 ]);
                            $("#nombres_aspirantes").val(data[i + 3]);
                            $("#apellidos_aspirantes").val(data[i + 4]);
                            $("#telf_aspirante").val(data[i + 5]);
                            $("#movil_aspirante").val(data[i + 6]);
                            $("#fnac_aspirante").val(data[i + 7]);
                            $("#genero_aspirante").val(data[i + 8]);
                            $("#mail_aspirante").val(data[i + 9]);
                            $("#pais_aspirante").val(data[i + 10]);
                            $("#ciudad_aspirante").val(data[i + 11]);
                            $("#direccion_aspirante").val(data[i + 12]);
                            $("#foto").attr("src", "fotos/"+ data[i + 13]);
                            $("#comentarios").val(data[i + 14]);
                        }
                    }
                });
           }else{
               alertify.alert("No hay mas registros superiores!!");
           }
       }
   }); 
}

function inicio (){	
	/*funcion inicial de la imagen y  buscadores del select no topar plz*/
	$('.modal.aside').ace_aside();
	$('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});
	
	// tooltips 
	$('[data-rel=tooltip]').tooltip();
	var f = new Date();
	$('.date-picker').datepicker({
		autoclose: true,
		format:'yyyy-mm-dd',
		startView:0		
	});

	alertify.set({ delay: 1000 });
	$('#ruc_ci').focus();	
	$('#telf_aspirante').mask('(999) 999-999');
	$('#movil_aspirante').mask('(999) 999-9999');

	/*----procesos ci ruc pass-----*/
	$("#tipo_documento").change(function (){
		documentos("0");
	});
	$("#ruc_ci").keyup(function(){
		ci_ruc_pass("ruc_ci",$("#ruc_ci").val(),$("#tipo_documento").val())
	});

    /*procesos de guardar buscar modificar limpiar actualizar*/    		
	$("#btn_Guardar").on("click",guardar_aspirante);
	$("#btn_Modificar").on("click",modificar_aspirante);
	$("#btn_Limpiar").on("click",actualizar_form);
    $("#btn_Atras").on("click",flecha_atras);
    $("#btn_Adelante").on("click",flecha_adelante);

    /*------*/
    jQuery(function($) {
	    var grid_selector = "#table";
	    var pager_selector = "#pager";
	    
	    //cambiar el tamaño para ajustarse al tamaño de la página
	    $(window).on('resize.jqGrid', function () {
	        //$(grid_selector).jqGrid( 'setGridWidth', $("#myModal").width());	        
	        $(grid_selector).jqGrid( 'setGridWidth', $("#myModal .modal-dialog").width()-30);
	        
	    })
	    //cambiar el tamaño de la barra lateral collapse/expand
	    var parent_column = $(grid_selector).closest('[class*="col-"]');
	    $(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
	        if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
	            //para dar tiempo a los cambios de DOM y luego volver a dibujar!!!
	            setTimeout(function() {
	                $(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );
	            }, 0);
	        }
	    })

	    jQuery(grid_selector).jqGrid({	        
	        datatype: "xml",
	        url: 'xmlAspirante.php',        
	        colNames: ['ID','DOCUMENTO','IDENTIFICACIÓN','NOMBRES','APELLIDOS','TELÉFONO','CELULAR','FECHA NACIMINETO','GENERO','CORREO','PAIS','CIUDAD','DIRECCIÓN','FOTO','COMENTARIO'],
	        colModel:[      
	            {name:'id_aspirante',index:'id_aspirante',frozen:true,align:'left',search:false},
	            {name:'tipo_documento',index:'tipo_documento',frozen : true,align:'left',search:false},
	            {name:'ruc_ci',index:'ruc_ci',frozen : true,align:'left',search:true},
	            {name:'nombres_aspirantes',index:'nombres_aspirantes',frozen : true,align:'left',search:true},
	            {name:'apellidos_aspirantes',index:'apellidos_aspirantes',frozen : true,align:'left',search:true},
	            {name:'telf_aspirante',index:'telf_aspirante',frozen : true,align:'left',search:false},            
	            {name:'movil_aspirante',index:'movil_aspirante',frozen : true,align:'left',search:false},
				{name:'fnac_aspirante',index:'fnac_aspirante',frozen : true,align:'left',search:false},	            
	            {name:'genero_aspirante',index:'genero_aspirante',frozen : true,align:'left',search:false},
	            {name:'mail_aspirante',index:'mail_aspirante',frozen : true,align:'left',search:false},
	            {name:'pais_aspirante',index:'pais_aspirante',frozen : true,align:'left',search:false},
	            {name:'ciudad_aspirante',index:'ciudad_aspirante',frozen : true,align:'left',search:false},
	            {name:'direccion_aspirante',index:'direccion_aspirante',frozen : true,align:'left',search:false},
                {name:'imagen',index:'imagen',frozen : true,align:'left',search:false},
                {name:'comentarios',index:'comentarios',frozen : true,align:'left',search:false},
	        ],          
	        rowNum: 10,       
	        width:600,
	        shrinkToFit: false,
	        height:200,
	        rowList: [10,20,30],
	        pager: pager_selector,        
	        sortname: 'id_aspirante',
	        sortorder: 'asc',
	        caption: 'LISTA DE ASPIRANTES',	        
	        altRows: true,
	        multiselect: false,
	        multiboxonly: true,
	        viewrecords : true,
	        loadComplete : function() {
	            var table = this;
	            setTimeout(function(){
	                styleCheckbox(table);
	                updateActionIcons(table);
	                updatePagerIcons(table);
	                enableTooltips(table);
	            }, 0);
	        },
	        ondblClickRow: function(rowid) { 
	            var gsr = jQuery(grid_selector).jqGrid('getGridParam','selrow');                                              
            	var ret = jQuery(grid_selector).jqGrid('getRowData',gsr);

                $("#id_aspirante").val(ret.id_aspirante);
                $("#tipo_documento").val(ret.tipo_documento);
                $("#ruc_ci").val(ret.ruc_ci);
                $("#nombres_aspirantes").val(ret.nombres_aspirantes);
                $("#apellidos_aspirantes").val(ret.apellidos_aspirantes);
                $("#telf_aspirante").val(ret.telf_aspirante);
                $("#movil_aspirante").val(ret.movil_aspirante);
                $("#fnac_aspirante").val(ret.fnac_aspirante);
                $("#genero_aspirante").val(ret.genero_aspirante);
                $("#mail_aspirante").val(ret.mail_aspirante);
                $("#pais_aspirante").val(ret.pais_aspirante);
                $("#ciudad_aspirante").val(ret.ciudad_aspirante);
                $("#direccion_aspirante").val(ret.direccion_aspirante);
                $("#foto").attr("src", "fotos/"+ ret.imagen);
                $("#comentarios").val(ret.comentarios);

	            $('#myModal').modal('hide');
                $("#btn_Guardar").attr("disabled", true);
	            // $("#btn_0").append("<span class='glyphicon glyphicon-log-in'></span> Modificar");     	            
	        },
	        
	        caption: "LISTA ASPIRANTES"
	    });

		jQuery(grid_selector).jqGrid('hideCol', "txt_0");
		jQuery(grid_selector).jqGrid('hideCol', "txt_11");		

	    $(window).triggerHandler('resize.jqGrid');//cambiar el tamaño para hacer la rejilla conseguir el tamaño correcto

	    function aceSwitch( cellvalue, options, cell ) {
	        setTimeout(function(){
	            $(cell) .find('input[type=checkbox]')
	            .addClass('ace ace-switch ace-switch-5')
	            .after('<span class="lbl"></span>');
	        }, 0);
	    }	    	   
	    //navButtons
	    jQuery(grid_selector).jqGrid('navGrid',pager_selector,
	    {   //navbar options
	        edit: false,
	        editicon : 'ace-icon fa fa-pencil blue',
	        add: false,
	        addicon : 'ace-icon fa fa-plus-circle purple',
	        del: false,
	        delicon : 'ace-icon fa fa-trash-o red',
	        search: true,
	        searchicon : 'ace-icon fa fa-search orange',
	        refresh: true,
	        refreshicon : 'ace-icon fa fa-refresh green',
	        view: true,
	        viewicon : 'ace-icon fa fa-search-plus grey'
	    },
	    {	        
	        recreateForm: true,
	        beforeShowForm : function(e) {
	            var form = $(e[0]);
	            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
	            style_edit_form(form);
	        }
	    },
	    {
	        //new record form
	        //width: 700,
	        closeAfterAdd: true,
	        recreateForm: true,
	        viewPagerButtons: false,
	        beforeShowForm : function(e) {
	            var form = $(e[0]);
	            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
	            .wrapInner('<div class="widget-header" />')
	            style_edit_form(form);
	        }
	    },
	    {
	        //delete record form
	        recreateForm: true,
	        beforeShowForm : function(e) {
	            var form = $(e[0]);
	            if(form.data('styled')) return false;
	                
	            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
	            style_delete_form(form);
	                
	            form.data('styled', true);
	        },
	        onClick : function(e) {
	            //alert(1);
	        }
	    },
	    {
	          recreateForm: true,
	        afterShowSearch: function(e){
	            var form = $(e[0]);
	            form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
	            style_search_form(form);
	        },
	        afterRedraw: function(){
	            style_search_filters($(this));
	        }
	        ,
	        //multipleSearch: true
	        overlay: false,
	        sopt: ['eq', 'cn'],
            defaultSearch: 'eq',            	       
	      },
	    {
	        //view record form
	        recreateForm: true,
	        beforeShowForm: function(e){
	            var form = $(e[0]);
	            form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
	        }
	    })	    
	    function style_edit_form(form) {
	        //enable datepicker on "sdate" field and switches for "stock" field
	        form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
	        
	        form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
	        //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
	        //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');

	                
	        //update buttons classes
	        var buttons = form.next().find('.EditButton .fm-button');
	        buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
	        buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
	        buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')
	        
	        buttons = form.next().find('.navButton a');
	        buttons.find('.ui-icon').hide();
	        buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
	        buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');       
	    }

	    function style_delete_form(form) {
	        var buttons = form.next().find('.EditButton .fm-button');
	        buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
	        buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
	        buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
	    }
	    
	    function style_search_filters(form) {
	        form.find('.delete-rule').val('X');
	        form.find('.add-rule').addClass('btn btn-xs btn-primary');
	        form.find('.add-group').addClass('btn btn-xs btn-success');
	        form.find('.delete-group').addClass('btn btn-xs btn-danger');
	    }
	    function style_search_form(form) {
	        var dialog = form.closest('.ui-jqdialog');
	        var buttons = dialog.find('.EditTable')
	        buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
	        buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
	        buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
	    }
	    
	    function beforeDeleteCallback(e) {
	        var form = $(e[0]);
	        if(form.data('styled')) return false;
	        
	        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
	        style_delete_form(form);
	        
	        form.data('styled', true);
	    }
	    
	    function beforeEditCallback(e) {
	        var form = $(e[0]);
	        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
	        style_edit_form(form);
	    }



	    //it causes some flicker when reloading or navigating grid
	    //it may be possible to have some custom formatter to do this as the grid is being created to prevent this
	    //or go back to default browser checkbox styles for the grid
	    function styleCheckbox(table) {
	        /**
	                    $(table).find('input:checkbox').addClass('ace')
	                    .wrap('<label />')
	                    .after('<span class="lbl align-top" />')


	                    $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
	                    .find('input.cbox[type=checkbox]').addClass('ace')
	                    .wrap('<label />').after('<span class="lbl align-top" />');
	         */
	    }
	    

	    //unlike navButtons icons, action icons in rows seem to be hard-coded
	    //you can change them like this in here if you want
	    function updateActionIcons(table) {
	        /**
	                    var replacement = 
	                    {
	                            'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
	                            'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
	                            'ui-icon-disk' : 'ace-icon fa fa-check green',
	                            'ui-icon-cancel' : 'ace-icon fa fa-times red'
	                    };
	                    $(table).find('.ui-pg-div span.ui-icon').each(function(){
	                            var icon = $(this);
	                            var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
	                            if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
	                    })
	         */
	    }
	    
	    //replace icons with FontAwesome icons like above
	    function updatePagerIcons(table) {
	        var replacement = 
	            {
	            'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
	            'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
	            'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
	            'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
	        };
	        $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
	            var icon = $(this);
	            var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
	            
	            if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
	        })
	    }

	    function enableTooltips(table) {
	        $('.navtable .ui-pg-button').tooltip({container:'body'});
	        $(table).find('.ui-pg-div').tooltip({container:'body'});
	    }

	    //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');

	    $(document).one('ajaxloadstart.page', function(e) {
	        $(grid_selector).jqGrid('GridUnload');
	        $('.ui-jqdialog').remove();
	    });
	});

}