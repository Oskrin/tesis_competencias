$(document).on("ready",inicio);

function cargar_cuentas(){		
	var dataTable = $('#td_aspirantes').dataTable();
    $("#dynamic-table tbody").empty(); 
    $.ajax({
        type: "POST",
        url: "lista.php",          
        dataType: 'json',
        success: function(response) {   
        	dataTable.fnClearTable();
			for(var i = 0; i < response.length; i++) {

				dataTable.fnAddData([
					response[i][0],
					response[i][1],
					response[i][2],					
					response[i][3],
					response[i][4],
					response[i][5],
					response[i][6],
					response[i][7],				
				]);
			}
		},
		error: function(e){
			console.log(e.responseText);
		}              	
                                
   	});      
}

function inicio (){
cargar_cuentas();
}