<?php
	session_start();
	date_default_timezone_set("Brazil/East"); 

	include "autoload.php";

	// Use dos Src
	use src\Conexao\Conexao;	
	use src\View\View;


	use Controller\Clientes\ClienteController;
	use Controller\Consultas\ConsultaController;

	$pdo   = Conexao::getInstance();
	$route = !isset($_GET['route']) ? 'listConsultas' : $_GET['route'];

	switch ($route) {
		case 'listConsultas':
			ConsultaController::listConsulta($pdo);
			break;
		case 'newConsulta':
			ConsultaController::newConsulta($pdo);
			break;
		case 'insertConsulta':
			ConsultaController::insertConsulta($pdo, $_POST);
			break;			
		case 'CelsiusToFahrenheit':
			echo ConsultaController::celsiusToFahrenheit();
			break;
		case 'FahrenheitToCelsius':
			echo ConsultaController::fahrenheitToCelsius();
			break;
		default:
			ConsultaController::notFound();
			break;
	}