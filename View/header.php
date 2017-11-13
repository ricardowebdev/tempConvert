<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consumo de Conversão de Temperaturas</title>
	<link rel="stylesheet" href="src/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="src/assets/css/datatables.min.css">
	<link rel="stylesheet" href="src/assets/css/style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">

				<nav class="navbar navbar-default">
				    <div class="container-fluid">				    
					    <div class="navbar-header">
					        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
					        </button>
					    </div>

					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					        <ul class="nav navbar-nav">
						        <li class=""><a href="index.php?route=listConsultas"><b>Consultas</b></a></li>
   						        <li class=""><a href="index.php?route=newConsulta"><b>Nova Consulta</b></a></li>
					        </ul>		
					    </div>
				    </div>
				</nav>				
			</div>
		</div>		
	</div>
	<?php 
		use src\Traits\MensagemTrait;
		MensagemTrait::get(); 
	?>	