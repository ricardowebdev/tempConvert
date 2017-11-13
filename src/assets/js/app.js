$(document).ready(function(){	
	$('#table').DataTable({
	    "language": {
	        "url": "src/assets/js/datatable_pt.json"
	    },
	    "pageLength": 50
	});		  

	$('#temperatura_entrada').change(function(){
		prepareAjax();
	});

	$('#tipo_entrada').change(function(){
		prepareAjax();
	});	
});

function prepareAjax() {
	if ($('#temperatura_entrada').val() != "" && $('#tipo_entrada').val() != "") {

		//Setando os Dados corretos
		if ($('#tipo_entrada').val() == "C") {
			var form_data = {
				"Celsius": $('#temperatura_entrada').val()
			};		

			sendAjax('CelsiusToFahrenheit', form_data);			
					
		} else if ($('#tipo_entrada').val() == "F") {
			var form_data = {
				"Fahrenheit": $('#temperatura_entrada').val()
			};	

			sendAjax('FahrenheitToCelsius', form_data);			
							
		}		
	} else {
		$('#temperatura_resposta').val("");
	}	
}

function sendAjax(route, form_data) {	
	//Disparando o AJAX
    $.ajax({
        type : "POST",    
        url  : 'index.php?route='+route, 
        dataType: 'json', 
        data : form_data  
    }).done(function(data) {
        if(data != "false"){
        	if (route == 'CelsiusToFahrenheit') {
        		var celsius = parseFloat(data.CelsiusToFahrenheitResult).toFixed(2);
        		$('#temperatura_resposta').val(data.CelsiusToFahrenheitResult);
        	} else {
        		var farenheit = parseFloat(data.FahrenheitToCelsiusResult).toFixed(2);
				$('#temperatura_resposta').val(farenheit);
        	}
        }
    }).fail(function(error) {
        console.log(error);
        alert('Ocorreram erros durante a solicitação');
    }); 
}

