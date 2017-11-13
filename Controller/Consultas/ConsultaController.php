<?php
	namespace Controller\Consultas;

	use src\Conexao\Conexao as Conexao;
	use Model\Consultas\Consulta as Consulta;
	use src\Traits\MensagemTrait;
	use src\View\View;	

	class ConsultaController
	{
		CONST WSDL = 'https://www.w3schools.com/xml/tempconvert.asmx?WSDL';
		CONST ASMX = 'https://www.w3schools.com/xml/tempconvert.asmx';

		public static function listConsulta($pdo)
		{
			$prepare = $pdo->prepare("SELECT id_consulta,
											 temperatura_entrada,
											 tipo_entrada,
											 temperatura_resposta,
											 DATE_FORMAT(datahora_consulta,'%d/%m/%Y %h:%i:%s') AS datahora_consulta
									  FROM consultas");
			$prepare->execute();
			$result = $prepare->fetchAll(\PDO::FETCH_ASSOC);
			$consultas = [];

			foreach ($result as $dados) {
				$consulta = new Consulta();
				$consulta->setId($dados['id_consulta']);
				$consulta->setTempEntrada($dados['temperatura_entrada']);
				$consulta->setTipoEntrada($dados['tipo_entrada']);
				$consulta->setTempResposta($dados['temperatura_resposta']);
				$consulta->setDataHora($dados['datahora_consulta']);			

				$consultas[] = $consulta;
			}

			View::mountPage('Consulta', 'Listar', $consultas);
		}

		public static function insertConsulta($pdo, $dados = "")
		{
			$consulta = new Consulta();
			$status   = $consulta->ValidaDados($dados); 

			if ($status != "true") {
				MensagemTrait::set("Status", "danger");
				View::mountPage('Consulta', 'Cadastrar');
			} else {

				$sql = "INSERT INTO consultas (temperatura_entrada,
											   tipo_entrada,
											   temperatura_resposta,
											   datahora_consulta)
									   VALUES (:temperatura_entrada,
									   		   :tipo_entrada,
									 		   :temperatura_resposta,
									 		   :datahora_consulta)";

				$dados['datahora_consulta'] = date('Y-m-d h:i:s');

				$prepare = $pdo->prepare($sql);
				$prepare->bindValue(":temperatura_entrada",  $dados['temperatura_entrada']);
				$prepare->bindValue(":tipo_entrada",         $dados['tipo_entrada']);
				$prepare->bindValue(":temperatura_resposta", $dados['temperatura_resposta']);
				$prepare->bindValue(":datahora_consulta",    $dados['datahora_consulta']);

				if($prepare->execute()) {
					MensagemTrait::set("Consulta inserida com sucesso", "success");
				} else {
					MensagemTrait::set("Ocorreram erros durante a solicitacao", "danger");
				}				

				View::redirect('listConsultas');							
			}
		}

		public static function newConsulta() 
		{
			View::mountPage('Consulta', 'Cadastrar');
		}

		public static function notFound()
		{
			View::mountPage('Consulta', '404');
		}

		public static function fahrenheitToCelsius()
		{
			if (isset($_POST['Fahrenheit']) && !empty($_POST['Fahrenheit'])) {

				$cliente    = new \SoapClient(self::WSDL);
				$funcao     = 'FahrenheitToCelsius'; 

				$parametros = array('FahrenheitToCelsius' => array(
										'Fahrenheit' => $_POST['Fahrenheit']
							  		)
							  );

				$opcoes    = array('location' => self::ASMX);

				$resultado = $cliente->__soapCall($funcao, $parametros, $opcoes);

				
				return json_encode($resultado);

			} else {
				return json_encode('Quantidade de graus não informada');
			}
			
		}

		public static function celsiusToFahrenheit()
		{
			if (isset($_POST['Celsius']) && !empty($_POST['Celsius'])) {

				$cliente    = new \SoapClient(self::WSDL);
				$funcao     = 'CelsiusToFahrenheit'; 

				$parametros = array('CelsiusToFahrenheit' => array(
										'Celsius' => $_POST['Celsius']
							  		)
							  );

				$opcoes    = array('location' => self::ASMX);

				$resultado = $cliente->__soapCall($funcao, $parametros, $opcoes);
				return json_encode($resultado);
			} else {
				return json_encode('Quantidade de graus não informada');
			}
		}

	}