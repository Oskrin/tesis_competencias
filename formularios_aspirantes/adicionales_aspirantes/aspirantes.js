$(document).on("ready",inicio);

var id_aspiraste = "";


function inicio () {
    // valida si ya existe
    $("#ruc_ci").keyup(function() {
        $.ajax({
            type: "POST",
            url: "comparar_aspirantes.php",
            data: "cedula=" + $("#ruc_ci").val(),
            success: function(data) {
                var val = data;
                if (val == 1) {
                    $("#ruc_ci").val("");
                    $("#ruc_ci").focus();
                    alert("Error... El Aspirante ya esta registrado");
                }else{
                    var numero = $("#ruc_ci").val();
                    var suma = 0;      
                    var residuo = 0;      
                    var pri = false;      
                    var pub = false;            
                    var nat = false;                     
                    var modulo = 11;
                    var p1;
                    var p2;
                    var p3;
                    var p4;
                    var p5;
                    var p6;
                    var p7;
                    var p8;            
                    var p9; 
                    var d1  = numero.substr(0,1);         
                    var d2  = numero.substr(1,1);         
                    var d3  = numero.substr(2,1);         
                    var d4  = numero.substr(3,1);         
                    var d5  = numero.substr(4,1);         
                    var d6  = numero.substr(5,1);         
                    var d7  = numero.substr(6,1);         
                    var d8  = numero.substr(7,1);         
                    var d9  = numero.substr(8,1);         
                    var d10 = numero.substr(9,1);  

                    if (d3 < 6){           
                        nat = true;            
                        p1 = d1 * 2;
                        if (p1 >= 10) p1 -= 9;
                        p2 = d2 * 1;
                        if (p2 >= 10) p2 -= 9;
                        p3 = d3 * 2;
                        if (p3 >= 10) p3 -= 9;
                        p4 = d4 * 1;
                        if (p4 >= 10) p4 -= 9;
                        p5 = d5 * 2;
                        if (p5 >= 10) p5 -= 9;
                        p6 = d6 * 1;
                        if (p6 >= 10) p6 -= 9; 
                        p7 = d7 * 2;
                        if (p7 >= 10) p7 -= 9;
                        p8 = d8 * 1;
                        if (p8 >= 10) p8 -= 9;
                        p9 = d9 * 2;
                        if (p9 >= 10) p9 -= 9;             
                        modulo = 10;
                    } else if(d3 == 6){           
                        pub = true;             
                        p1 = d1 * 3;
                        p2 = d2 * 2;
                        p3 = d3 * 7;
                        p4 = d4 * 6;
                        p5 = d5 * 5;
                        p6 = d6 * 4;
                        p7 = d7 * 3;
                        p8 = d8 * 2;            
                        p9 = 0;            
                    } else if(d3 == 9) {          
                        pri = true;                                   
                        p1 = d1 * 4;
                        p2 = d2 * 3;
                        p3 = d3 * 2;
                        p4 = d4 * 7;
                        p5 = d5 * 6;
                        p6 = d6 * 5;
                        p7 = d7 * 4;
                        p8 = d8 * 3;
                        p9 = d9 * 2;            
                    }
                
                    suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;                
                    residuo = suma % modulo;                                         

                    var digitoVerificador = residuo==0 ? 0: modulo - residuo; 
                    ////////////verificamos validacioncedula////////////////////
                    if (numero.length === 10) {
                        if(nat == true){
                            if (digitoVerificador != d10){                          
                                alert('El número de cédula es incorrecto.');
                                $("#ruc_ci").val("");
                            }else{
                                alert('El número de cédula es correcto.');
                            }
                        }
                    }
                }
            }
        });
    });
    // fin

    // carga_idiomas("idioma");


    $('[data-rel=tooltip]').tooltip();

    $('#fecha_nacimiento').datepicker({
        autoclose: true,
        format:'yyyy-mm-dd',
        startView:0     
    });   
         
    $(".select2").css('width','200px').select2({allowClear:true})
    .on('change', function(){
        $(this).closest('form').validate().element($(this));
    }); 
    var $validation = true;
    $('#fuelux-wizard-container')
    .ace_wizard({
        //step: 2 //optional argument. wizard will jump to step "2" at first
        //buttons: '.wizard-actions:eq(0)'
    })
    .on('actionclicked.fu.wizard' , function(e, info){
        if(info.step == 1 && $validation) {
            if(!$('#validation-form').valid()) e.preventDefault();
        }
    })
    .on('finished.fu.wizard', function(e) {
        bootbox.dialog({
            message: "Thank you! Your information was successfully saved!", 
            buttons: {
                "success" : {
                    "label" : "OK",
                    "className" : "btn-sm btn-primary"
                }
            }
        });
    }).on('stepclick.fu.wizard', function(e){
        //e.preventDefault();//this will prevent clicking and selecting steps
    });

    $.mask.definitions['~']='[+-]';
    $('#telefono').mask('(999) 999-999');
    $('#celular').mask('(99) 9999-9999');
    $('#fecha_nacimiento').mask('9999-99-99');

    jQuery.validator.addMethod("telefono", function (value, element) {
        return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{3}( x\d{1,6})?$/.test(value);
    }, "Ingrese un número válido");

    jQuery.validator.addMethod("celular", function (value, element) {
        return this.optional(element) || /^\(\d{2}\) \d{4}\-\d{4}( x\d{1,6})?$/.test(value);
    }, "Ingrese un número válido");

    jQuery.validator.addMethod("fecha_nacimiento", function (value, element) {
        return this.optional(element) || /^\d{4}\-\d{2}\-\d{2}( x\d{1,6})?$/.test(value);
    }, "Ingrese un fecha válida");

    // $('#validation-form').validate({
    //     errorElement: 'div',
    //     errorClass: 'help-block',
    //     focusInvalid: false,
    //     ignore: "",
    //     rules: {
           // email: {
           //      required: true,
           //      email:true
           //  },                      
            // id_aspirante: {
            //     required: true
            // },
            // telefono: {
            //     required: true,
            //     telefono: 'required'
            // },
        // },
        // messages: {
        //     id_aspirante: {
        //         required: "Seleccione un Aspirante.",                           
        //     },  
        //     genero: "Seleccione un género",                                           
        //     correo: {
        //         required: "Ingrese un correo válido.",
        //         email: "Ingrese un correo válido.",
        //     },  
        //     pais: {
        //         required: "Ingrese un país",                
        //     },                                                 
        // },

    //     highlight: function (e) {
    //         $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
    //     },

    //     success: function (e) {
    //         $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
    //         $(e).remove();
    //     },

    //     errorPlacement: function (error, element) {         
    //         if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
    //             var controls = element.closest('div[class*="col-"]');
    //             if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
    //             else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));                
    //         }
    //         else if(element.is('.select2')) {                
    //             error.insertAfter(element.parent());
    //         }
    //         else if(element.is('.chosen-select')) {
    //             error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
    //         }
    //         else error.insertAfter(element.parent());
    //     },

    //     submitHandler: function (form) {
    //     },
    //     invalidHandler: function (form) {
    //     }
    // });            
    // $('#modal-wizard-container').ace_wizard();
    // $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
     
    // $(document).one('ajaxloadstart.page', function(e) {
    //     $('[class*=select2]').remove();
    // });

    // tabla idiomas
    jQuery(function($) {
        var grid_selector = "#table_idioma";
        var pager_selector = "#pager_idioma";
        
        //cambiar el tamaño para ajustarse al tamaño de la página
        $(window).on('resize.jqGrid', function () {
            $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() -40);
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
            url: 'xmlIdiomas.php',
            datatype: "xml",
            height: 250,
            colNames:['ID','NOMBRE IDIOMA','NIVEL LECTURA','NIVEL ESCRITURA','FECHA CREACIÓN'],
            colModel:[
                {name:'id_idioma',index:'id_idioma', width:50, sorttype:"int", editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
                {name:'nombre_idioma',index:'nombre_idioma', width:150,editable: true,editoptions:{size:"20"}, editrules: {required: true}},                
                {name:'nivel_lectura',index:'nivel_lectura', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true},edittype:"select",editoptions:{value:"Básico:Básico;Intermedio:Intermedio;Experto:Experto"}},
                {name:'nivel_escritura',index:'nivel_escritura', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true},edittype:"select",editoptions:{value:"Básico:Básico;Intermedio:Intermedio;Experto:Experto"}},
                {name:'fecha_creacion',index:'fecha_creacion', width:100, editable: true, editoptions:{size:"20",maxlength:"30",readonly: 'readonly'}, editrules: {required: false}},
            ], 
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            sortname: 'id_idioma',
            sortorder: 'asc',
            altRows: true,
            multiselect: false,
            multiboxonly: false,
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

            editurl: 'idiomas.php',
            caption: "IDIOMAS"
        });
        $(window).triggerHandler('resize.jqGrid');//cambiar el tamaño para hacer la rejilla conseguir el tamaño correcto

        function aceSwitch( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
            }, 0);
        }
        //enable datepicker
        function pickDate( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=text]')
                .datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
            }, 0);
        }

        //navButtons
        jQuery(grid_selector).jqGrid('navGrid',pager_selector,
        {   //navbar options
            edit: true,
            editicon : 'ace-icon fa fa-pencil blue',
            add: true,
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
            closeAfterEdit: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 2) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 1) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            //delete record form
            recreateForm: true,
            overlay:false,
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
              overlay:false,
            afterShowSearch: function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function(){
                style_search_filters($(this));
            }
            ,
            multipleSearch: false,
          },
        {
            //view record form
            recreateForm: true,
            overlay:false,
            beforeShowForm: function(e){
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            }
        })

        function style_edit_form(form) {
            form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
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
        function styleCheckbox(table) {
        }
        function updateActionIcons(table) {
        }
            
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
    // Fin tabla idiomas

    // tabla proyectos realizados
    jQuery(function($) {
        var grid_selector = "#table_proyectos";
        var pager_selector = "#pager_proyectos";
        
        //cambiar el tamaño para ajustarse al tamaño de la página
        $(window).on('resize.jqGrid', function () {
            $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() -40);
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
            url: 'xmlProyectos.php',
            datatype: "xml",
            height: 250,
            colNames:['ID','NOMBRE PROYECTO','CARGO PROYECTO','TIEMPO PROYECTO','FECHA CREACIÓN'],
            colModel:[
                {name:'id_proyecto',index:'id_proyecto', width:50, sorttype:"int", editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
                {name:'nombre_proyecto',index:'nombre_proyecto', width:150,editable: true,editoptions:{size:"20"}, editrules: {required: true}},                
                {name:'cargo_proyecto',index:'cargo_proyecto', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'tiempo_proyecto',index:'tiempo_proyecto', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'fecha_creacion',index:'fecha_creacion', width:100, editable: true, editoptions:{size:"20",maxlength:"30",readonly: 'readonly'}, editrules: {required: false}},
            ], 
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            sortname: 'id_proyecto',
            sortorder: 'asc',
            altRows: true,
            multiselect: false,
            multiboxonly: false,
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

            editurl: 'proyectos.php',
            caption: "PROYECTOS"
        });
        $(window).triggerHandler('resize.jqGrid');//cambiar el tamaño para hacer la rejilla conseguir el tamaño correcto

        function aceSwitch( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
            }, 0);
        }
        //enable datepicker
        function pickDate( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=text]')
                .datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
            }, 0);
        }

        //navButtons
        jQuery(grid_selector).jqGrid('navGrid',pager_selector,
        {   //navbar options
            edit: true,
            editicon : 'ace-icon fa fa-pencil blue',
            add: true,
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
            closeAfterEdit: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 2) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 1) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            //delete record form
            recreateForm: true,
            overlay:false,
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
              overlay:false,
            afterShowSearch: function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function(){
                style_search_filters($(this));
            }
            ,
            multipleSearch: false,
          },
        {
            //view record form
            recreateForm: true,
            overlay:false,
            beforeShowForm: function(e){
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            }
        })

        function style_edit_form(form) {
            form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
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
        function styleCheckbox(table) {
        }
        function updateActionIcons(table) {
        }
            
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
    // Fin tabla proyectos

    // tabla cursos realizados
    jQuery(function($) {
        var grid_selector = "#table_cursos";
        var pager_selector = "#pager_cursos";
        
        //cambiar el tamaño para ajustarse al tamaño de la página
        $(window).on('resize.jqGrid', function () {
            $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() -40);
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
            url: 'xmlCursos.php',
            datatype: "xml",
            height: 250,
            colNames:['ID','TIPO CURSO','NOMBRE CURSO','LUGAR CURSO','DURACIÓN','FECHA CREACIÓN'],
            colModel:[
                {name:'id_curso',index:'id_curso', width:50, sorttype:"int", editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
                {name:'tipo_curso',index:'tipo_curso', width:150,editable: true,editoptions:{size:"20"}, editrules: {required: true}},                
                {name:'nombre_curso',index:'nombre_curso', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'inst_curso',index:'inst_curso', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'time_curso',index:'time_curso', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'fecha_creacion',index:'fecha_creacion', width:100, editable: true, editoptions:{size:"20",maxlength:"30",readonly: 'readonly'}, editrules: {required: false}},
            ], 
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            sortname: 'id_curso',
            sortorder: 'asc',
            altRows: true,
            multiselect: false,
            multiboxonly: false,
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

            editurl: 'cursos.php',
            caption: "CURSOS"
        });
        $(window).triggerHandler('resize.jqGrid');//cambiar el tamaño para hacer la rejilla conseguir el tamaño correcto

        function aceSwitch( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
            }, 0);
        }
        //enable datepicker
        function pickDate( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=text]')
                .datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
            }, 0);
        }

        //navButtons
        jQuery(grid_selector).jqGrid('navGrid',pager_selector,
        {   //navbar options
            edit: true,
            editicon : 'ace-icon fa fa-pencil blue',
            add: true,
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
            closeAfterEdit: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 2) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 1) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            //delete record form
            recreateForm: true,
            overlay:false,
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
              overlay:false,
            afterShowSearch: function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function(){
                style_search_filters($(this));
            }
            ,
            multipleSearch: false,
          },
        {
            //view record form
            recreateForm: true,
            overlay:false,
            beforeShowForm: function(e){
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            }
        })

        function style_edit_form(form) {
            form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
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
        function styleCheckbox(table) {
        }
        function updateActionIcons(table) {
        }
            
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
    // Fin tabla cursos

    // tabla ponencias realizadas
    jQuery(function($) {
        var grid_selector = "#table_ponencias";
        var pager_selector = "#pager_ponencias";
        
        //cambiar el tamaño para ajustarse al tamaño de la página
        $(window).on('resize.jqGrid', function () {
            $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() -40);
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
            url: 'xmlPonencias.php',
            datatype: "xml",
            height: 250,
            colNames:['ID','NOMBRE PONENCIA','LUGAR PONENCIA','FECHA PONENCIA','FECHA CREACIÓN'],
            colModel:[
                {name:'id_ponencia',index:'id_ponencia', width:50, sorttype:"int", editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
                {name:'nombre_ponencia',index:'nombre_ponencia', width:150,editable: true,editoptions:{size:"20"}, editrules: {required: true}},                
                {name:'lugar_ponencia',index:'lugar_ponencia', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'fecha_ponencia',index:'fecha_ponencia',width:90, editable:true, sorttype:"date",unformat: pickDate},
                {name:'fecha_creacion',index:'fecha_creacion', width:100, editable: true, editoptions:{size:"20",maxlength:"30",readonly: 'readonly'}, editrules: {required: false}},
            ], 
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            sortname: 'id_ponencia',
            sortorder: 'asc',
            altRows: true,
            multiselect: false,
            multiboxonly: false,
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

            editurl: 'ponencias.php',
            caption: "PONENCIAS"
        });
        $(window).triggerHandler('resize.jqGrid');//cambiar el tamaño para hacer la rejilla conseguir el tamaño correcto

        function aceSwitch( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
            }, 0);
        }
        //enable datepicker
        function pickDate( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=text]')
                .datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
            }, 0);
        }

        //navButtons
        jQuery(grid_selector).jqGrid('navGrid',pager_selector,
        {   //navbar options
            edit: true,
            editicon : 'ace-icon fa fa-pencil blue',
            add: true,
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
            closeAfterEdit: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 2) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 1) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            //delete record form
            recreateForm: true,
            overlay:false,
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
              overlay:false,
            afterShowSearch: function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function(){
                style_search_filters($(this));
            }
            ,
            multipleSearch: false,
          },
        {
            //view record form
            recreateForm: true,
            overlay:false,
            beforeShowForm: function(e){
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            }
        })

        function style_edit_form(form) {
            form.find('input[name=fecha_ponencia]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
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
        function styleCheckbox(table) {
        }
        function updateActionIcons(table) {
        }
            
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
    // Fin tabla ponencias

    // tabla premios obtenidos
    jQuery(function($) {
        var grid_selector = "#table_premios";
        var pager_selector = "#pager_premios";
        
        //cambiar el tamaño para ajustarse al tamaño de la página
        $(window).on('resize.jqGrid', function () {
            $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() -40);
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
            url: 'xmlPremios.php',
            datatype: "xml",
            height: 250,
            colNames:['ID','NOMBRE PREMIO','TIPO PREMIO','MOTIVO PREMIO','FECHA CREACIÓN'],
            colModel:[
                {name:'id_premio',index:'id_premio', width:50, sorttype:"int", editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
                {name:'nombre_premio',index:'nombre_premio', width:150,editable: true,editoptions:{size:"20"}, editrules: {required: true}},                
                {name:'tipo_premio',index:'tipo_premio', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'motivo_premio',index:'motivo_premio', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'fecha_creacion',index:'fecha_creacion', width:100, editable: true, editoptions:{size:"20",maxlength:"30",readonly: 'readonly'}, editrules: {required: false}},
            ], 
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            sortname: 'id_premio',
            sortorder: 'asc',
            altRows: true,
            multiselect: false,
            multiboxonly: false,
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

            editurl: 'premios.php',
            caption: "PREMIOS"
        });
        $(window).triggerHandler('resize.jqGrid');//cambiar el tamaño para hacer la rejilla conseguir el tamaño correcto

        function aceSwitch( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
            }, 0);
        }
        //enable datepicker
        function pickDate( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=text]')
                .datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
            }, 0);
        }

        //navButtons
        jQuery(grid_selector).jqGrid('navGrid',pager_selector,
        {   //navbar options
            edit: true,
            editicon : 'ace-icon fa fa-pencil blue',
            add: true,
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
            closeAfterEdit: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 2) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 1) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            //delete record form
            recreateForm: true,
            overlay:false,
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
              overlay:false,
            afterShowSearch: function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function(){
                style_search_filters($(this));
            }
            ,
            multipleSearch: false,
          },
        {
            //view record form
            recreateForm: true,
            overlay:false,
            beforeShowForm: function(e){
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            }
        })

        function style_edit_form(form) {
            form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
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
        function styleCheckbox(table) {
        }
        function updateActionIcons(table) {
        }
            
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
    // Fin tabla premios

    // tabla publicaciones obtenidos
    jQuery(function($) {
        var grid_selector = "#table_publicaciones";
        var pager_selector = "#pager_publicaciones";
        
        //cambiar el tamaño para ajustarse al tamaño de la página
        $(window).on('resize.jqGrid', function () {
            $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() -40);
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
            url: 'xmlPublicaciones.php',
            datatype: "xml",
            height: 250,
            colNames:['ID','NOMBRE PUBLI.','TIPO PUBLI.','LUGAR PUBLI.','FECHA PUBLI.','FECHA CREACIÓN'],
            colModel:[
                {name:'id_publicacion',index:'id_publicacion', width:50, sorttype:"int", editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
                {name:'nombre_publicacion',index:'nombre_publicacion', width:150,editable: true,editoptions:{size:"20"}, editrules: {required: true}},                
                {name:'tipo_publicacion',index:'tipo_publicacion', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'lugar_publicacion',index:'lugar_publicacion', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'fecha_publicacion',index:'fecha_publicacion',width:90, editable:true, sorttype:"date",unformat: pickDate},
                {name:'fecha_creacion',index:'fecha_creacion', width:100, editable: true, editoptions:{size:"20",maxlength:"30",readonly: 'readonly'}, editrules: {required: false}},
            ], 
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            sortname: 'id_publicacion',
            sortorder: 'asc',
            altRows: true,
            multiselect: false,
            multiboxonly: false,
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

            editurl: 'publicaciones.php',
            caption: "PUBLICACIONES"
        });
        $(window).triggerHandler('resize.jqGrid');//cambiar el tamaño para hacer la rejilla conseguir el tamaño correcto

        function aceSwitch( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
            }, 0);
        }
        //enable datepicker
        function pickDate( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=text]')
                .datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
            }, 0);
        }

        //navButtons
        jQuery(grid_selector).jqGrid('navGrid',pager_selector,
        {   //navbar options
            edit: true,
            editicon : 'ace-icon fa fa-pencil blue',
            add: true,
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
            closeAfterEdit: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 2) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 1) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            //delete record form
            recreateForm: true,
            overlay:false,
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
              overlay:false,
            afterShowSearch: function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function(){
                style_search_filters($(this));
            }
            ,
            multipleSearch: false,
          },
        {
            //view record form
            recreateForm: true,
            overlay:false,
            beforeShowForm: function(e){
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            }
        })

        function style_edit_form(form) {
            form.find('input[name=fecha_publicacion]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
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
        function styleCheckbox(table) {
        }
        function updateActionIcons(table) {
        }
            
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
    // Fin tabla premios

    // tabla experiencia
    jQuery(function($) {
        var grid_selector = "#table_experiencia";
        var pager_selector = "#pager_experiencia";
        
        //cambiar el tamaño para ajustarse al tamaño de la página
        $(window).on('resize.jqGrid', function () {
            $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() -40);
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
            url: 'xmlExperiencia.php',
            datatype: "xml",
            height: 250,
            colNames:['ID','NOMBRE EMPRESA','CARGO','TIEMPO','CONTACTO','REFERENCIA','FECHA CREACIÓN'],
            colModel:[
                {name:'id_experiencia',index:'id_experiencia', width:50, sorttype:"int", editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
                {name:'nombre_empresa',index:'nombre_empresa', width:150,editable: true,editoptions:{size:"20"}, editrules: {required: true}},                
                {name:'cargo_empresa',index:'cargo_empresa', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'tiempo_empresa',index:'tiempo_empresa', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'contacto_empresa',index:'contacto_empresa', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'referencia',index:'referencia', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'fecha_creacion',index:'fecha_creacion', width:100, editable: true, editoptions:{size:"20",maxlength:"30",readonly: 'readonly'}, editrules: {required: false}},
            ], 
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            sortname: 'id_experiencia',
            sortorder: 'asc',
            altRows: true,
            multiselect: false,
            multiboxonly: false,
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

            editurl: 'experiencia.php',
            caption: "EXPERIENCIA"
        });
        $(window).triggerHandler('resize.jqGrid');//cambiar el tamaño para hacer la rejilla conseguir el tamaño correcto

        function aceSwitch( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
            }, 0);
        }
        //enable datepicker
        function pickDate( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=text]')
                .datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
            }, 0);
        }

        //navButtons
        jQuery(grid_selector).jqGrid('navGrid',pager_selector,
        {   //navbar options
            edit: true,
            editicon : 'ace-icon fa fa-pencil blue',
            add: true,
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
            closeAfterEdit: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 2) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 1) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            //delete record form
            recreateForm: true,
            overlay:false,
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
              overlay:false,
            afterShowSearch: function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function(){
                style_search_filters($(this));
            }
            ,
            multipleSearch: false,
          },
        {
            //view record form
            recreateForm: true,
            overlay:false,
            beforeShowForm: function(e){
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            }
        })

        function style_edit_form(form) {
            form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
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
        function styleCheckbox(table) {
        }
        function updateActionIcons(table) {
        }
            
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
    // Fin tabla premios

    // tabla experiencia
    jQuery(function($) {
        var grid_selector = "#table_titulos";
        var pager_selector = "#pager_titulos";
        
        //cambiar el tamaño para ajustarse al tamaño de la página
        $(window).on('resize.jqGrid', function () {
            $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() -40);
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
            url: 'xmlTitulos.php',
            datatype: "xml",
            height: 250,
            colNames:['ID','NOMBRE TITULO','NIVEL','UBICACIÓN','FECHA TITULO','PAÍS','AREA','REG. TITULO','FECHA CREACIÓN'],
            colModel:[
                {name:'id_titulo',index:'id_titulo', width:50, sorttype:"int", editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
                {name:'nombre_titulo',index:'nombre_titulo', width:150,editable: true,editoptions:{size:"20"}, editrules: {required: true}},                
                {name:'nivel_titulo',index:'nivel_titulo', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'univ_titulo',index:'univ_titulo', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'fecha_titulo',index:'fecha_titulo',width:90, editable:true, sorttype:"date",unformat: pickDate},
                {name:'pais_titulo',index:'pais_titulo', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'area_titulo',index:'area_titulo', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'reg_titulo',index:'reg_titulo', width:100,editable: true,editoptions:{size:"20"}, editrules: {required: true}},
                {name:'fecha_creacion',index:'fecha_creacion', width:100, editable: true, editoptions:{size:"20",maxlength:"30",readonly: 'readonly'}, editrules: {required: false}},
            ], 
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            sortname: 'id_titulo',
            sortorder: 'asc',
            altRows: true,
            multiselect: false,
            multiboxonly: false,
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

            editurl: 'titulos.php',
            caption: "TITULOS"
        });
        $(window).triggerHandler('resize.jqGrid');//cambiar el tamaño para hacer la rejilla conseguir el tamaño correcto

        function aceSwitch( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
            }, 0);
        }
        //enable datepicker
        function pickDate( cellvalue, options, cell ) {
            setTimeout(function(){
                $(cell) .find('input[type=text]')
                .datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
            }, 0);
        }

        //navButtons
        jQuery(grid_selector).jqGrid('navGrid',pager_selector,
        {   //navbar options
            edit: true,
            editicon : 'ace-icon fa fa-pencil blue',
            add: true,
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
            closeAfterEdit: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 2) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            // afterSubmit: function (response) {
            // if(response.responseText == 1) {
            //         $.gritter.add({
            //             title: 'Mensaje',
            //             text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
            //             time: 1000              
            //         });
            //         return true;
            //     } else {
            //         if(response.responseText == 3) { 
            //             $("#nombre_idioma").val("");
            //             return [false,"Error.. El idioma ya existe"];
            //         }   
            //     }
            // },
        },
        {
            //delete record form
            recreateForm: true,
            overlay:false,
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
              overlay:false,
            afterShowSearch: function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function(){
                style_search_filters($(this));
            }
            ,
            multipleSearch: false,
          },
        {
            //view record form
            recreateForm: true,
            overlay:false,
            beforeShowForm: function(e){
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            }
        })

        function style_edit_form(form) {
            form.find('input[name=fecha_titulo]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
            form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
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
        function styleCheckbox(table) {
        }
        function updateActionIcons(table) {
        }
            
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
    // Fin tabla premios
}