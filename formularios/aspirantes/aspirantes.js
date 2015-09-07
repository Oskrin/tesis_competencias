$(document).on("ready",inicio);


function inicio (){	    

    $('[data-rel=tooltip]').tooltip();
    var f = new Date();
    $('#txt_6').datepicker({
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
    //documentation : http://docs.jquery.com/Plugins/Validation/validate


    $.mask.definitions['~']='[+-]';
    $('#txt_4').mask('(999) 999-999');
    $('#txt_5').mask('(99) 9999-9999');
    $('#txt_6').mask('9999-99-99');

    jQuery.validator.addMethod("txt_4", function (value, element) {
        return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{3}( x\d{1,6})?$/.test(value);
    }, "Ingrese un número válido");

    jQuery.validator.addMethod("txt_5", function (value, element) {
        return this.optional(element) || /^\(\d{2}\) \d{4}\-\d{4}( x\d{1,6})?$/.test(value);
    }, "Ingrese un número válido");

    jQuery.validator.addMethod("txt_6", function (value, element) {
        return this.optional(element) || /^\d{4}\-\d{2}\-\d{2}( x\d{1,6})?$/.test(value);
    }, "Ingrese un fecha válida");


    $('#validation-form').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        ignore: "",
        rules: {
           /* email: {
                required: true,
                email:true
            },                      
            txt_1: {
                required: true
            },
            txt_2: {
                required: true
            }, 
            txt_3: {
                required: true
            },                      
            txt_4: {
                required: true,
                txt_4: 'required'
            },
            txt_5: {
                required: true,
                txt_5: 'required'
            },
            txt_6: {
                required: true,
                txt_6: 'required'
            },
            txt_7: {
                required: true
            },
            txt_8: {
                required: true,
                email:true
            },
            txt_9: {
                required: true
            },
            txt_10: {
                required: true
            },
            txt_11: {
                required: true
            },*/
        },
        messages: {
            txt_1: {
                required: "Este campo es requerido.",                           
            },
            txt_2: {
                required: "Este campo es requerido.",                           
            },
            txt_3: {
                required: "Este campo es requerido.",                           
            },
            txt_4: {
                required: "Este campo es requerido",                
            },     
            txt_5: {
                required: "Este campo es requerido",                
            }, 
            txt_6: {
                required: "Este campo es requerido",                
            },     
            txt_7: "Seleccione un género",                                           
            txt_8: {
                required: "Ingrese un correo válido.",
                email: "Ingrese un correo válido.",
            },  
            txt_9: {
                required: "Seleccione un país",                
            },   
            txt_10: {
                required: "Seleccione una ciudad",                
            },
            txt_11: {
                required: "Este campo es requerido",                
            },                                               
        },


        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },

        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
            $(e).remove();
        },

        errorPlacement: function (error, element) {         
            if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                var controls = element.closest('div[class*="col-"]');
                if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));                
            }
            else if(element.is('.select2')) {                
                //console.log(element.siblings('[class*="select2-container"]:eq(0)'))
                error.insertAfter(element.parent());
            }
            else if(element.is('.chosen-select')) {
                error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            }
            else error.insertAfter(element.parent());
        },

        submitHandler: function (form) {
        },
        invalidHandler: function (form) {
        }
    });            
    $('#modal-wizard-container').ace_wizard();
    $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
    
    
    /**
    $('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
        $(this).closest('form').validate().element($(this));
    });
    
    $('#mychosen').chosen().on('change', function(ev) {
        $(this).closest('form').validate().element($(this));
    });
    */        
    $(document).one('ajaxloadstart.page', function(e) {
        //in ajax mode, remove remaining elements before leaving page
        $('[class*=select2]').remove();
    });
    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";
        
        //cambiar el tamaño para ajustarse al tamaño de la página
        $(window).on('resize.jqGrid', function () {
            //console.log($(".step-pane").width())
            $(grid_selector).jqGrid( 'setGridWidth', $(".step-content").width() );
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
            //for this example we are using local data
            subGridRowExpanded: function (subgridDivId, rowId) {              
            },

            url: '',
            datatype: "xml",
            height: 200,
            colNames:['ID','NOMBRE IDIOMA','NIVEL LECTURA', 'NIVEL ESCRITURA'],
            colModel:[
                {name:'id_idioma',index:'id_idioma', width:60, sorttype:"int", editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
                {name:'nombre_idioma',index:'nombre_idioma', width:150,editable: true,editoptions:{size:"20"}, editrules: {required: true}},                
                {name:'nivel_lectura',index:'nivel_lectura', width:150,editable: true,editoptions:{size:"20"}, editrules: {required: true},edittype:"select",editoptions:{value:"1:Básico;2:Intermedio;3:Experto"}},
                {name:'nivel_escritura',index:'nivel_escritura', width:150,editable: true,editoptions:{size:"20"}, editrules: {required: true},edittype:"select",editoptions:{value:"1:Básico;2:Intermedio;3:Experto"}},                
            ], 
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            sortname: 'id_idioma',
            sortorder: 'asc',
            altRows: true,

            //shrinktofit:false,
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

            editurl: "clientArray",
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
            afterSubmit: function (response){
            if(response.responseText == 2){
                    $.gritter.add({
                        title: 'Mensaje',
                        text: 'Registro Modificado correctamente <i class="ace-icon fa fa-spinner fa-spin green bigger-125"></i>',
                        time: 1000              
                    });
                    return true;
                }else{
                    // if(response.responseText == 3){  
                    //  // $("#nombre_categoria").val("");
                    //  // return [false,"Error.. La Categoria ya existe"];
                    // }    
                }
            },
        },
        {
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            overlay:false,    
            reloadAfterSubmit:false,
            //zIndex:9999999999,        
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
                .wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },           
            
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
            afterShowSearch: function(e){
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