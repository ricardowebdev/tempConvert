<?php
	namespace Model\Consultas;

	class Consulta
	{
		private $id;
		private $tempEntrada;
		private $tipoEntrada;
		private $tempResposta;
		private $dataHora;

		public function __construct()
		{

		}

		public function setTempEntrada($tempEntrada)
		{
			$this->tempEntrada = $tempEntrada;
		}

		public function getTempEntrada()
		{
			return $this->tempEntrada;
		}


		public function setTipoEntrada($tipoEntrada)
		{
			$this->tipoEntrada = $tipoEntrada;
		}

		public function getTipoEntrada()
		{
			return $this->tipoEntrada;
		}
			

		public function setTempResposta($tempResposta)
		{
			$this->tempResposta = $tempResposta;
		}

		public function getTempResposta()
		{
			return $this->tempResposta;
		}


		public function setDataHora($dataHora)
		{
			$this->dataHora = $dataHora;
		}

		public function getDataHora()
		{
			return $this->dataHora;
		}							

		public function setId($id)
		{
			$this->id = $id;
		}

		public function getId()
		{
			return $this->id;
		}

		public function validaDados($dados)
		{

			if (!isset($dados['temperatura_entrada']) 
				&& !empty($dados['temperatura_entrada'])) {

				return "Temperatura de entrada não pode ficar em branco";				

			} else if (!isset($dados['tipo_entrada']) 
				&& !empty($dados['tipo_entrada'])) {

				return "Tipo de entrada não pode ficar em branco";				

			} else if (!isset($dados['temperatura_resposta']) 
				&& !empty($dados['temperatura_resposta'])) {

				return "Temperatura de resposta não pode ficar em branco";				

			} else {
				return "true";
			}

		}

	}