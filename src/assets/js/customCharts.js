if($('#barChart').html() !== undefined) {
    $.ajax({
        type : "GET",    
        url  : 'src/ajax/ajax.php', 
        dataType: 'json'	        
    }).done(function(data) {
    	console.log(data);
    	//return false;

		var ctx = document.getElementById("barChart");
		var barChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: ["Clientes", "Banners", "Funcionalidades", "Funcionarios", "Serviços"],
		        datasets: [{
		            label: 'Dados Cadastrados',
		            data: [data.clientes, 
		            	   data.banners,
		            	   data.funcionalidades,
		            	   data.funcionarios,
		            	   data.servicos],
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255,99,132,1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});     

		var ctx2 = document.getElementById("pieChart");

		var pieChart = new Chart(ctx2, {
		    type: 'pie',
			data: {
				labels: ['Administradores', 'Usuários'],
	    		datasets: [{
	        		data: [data.administradores, 
		            	   data.usuarios],		    	
		            backgroundColor: [
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)'
		            ],
		            borderColor: [
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)'
		            ],	            
		            label: 'Dataset 1'
	    		}],            
			}	    
		});   	

		var ctx3 = document.getElementById("doughnutChart");

		var doughnutChart = new Chart(ctx3, {
		    type: 'doughnut',
			data: {
				labels: ['Servicos', 'Funcionalidades'],
	    		datasets: [{
	        		data: [data.servicos, 		            	   
		            	   data.funcionalidades],		    	
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(75, 192, 192, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(75, 192, 192, 1)'
		            ],	            
		            label: 'Dataset 1'
	    		}],            
			}	    
		});	    	    	   	
    });	    
}
