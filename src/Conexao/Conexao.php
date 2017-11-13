<?php

	namespace src\Conexao;

	class Conexao 
	{
		public static $instance;
		
		private function __construct()
		{
		}

		public static function getInstance()
		{
           
            $dsn  = 'mysql:host=localhost;dbname=tempconvert';
            $user = 'root';
            $pass = '';

			if (!isset(self::$instance)) {
			    self::$instance = new \PDO($dsn, $user, $pass);
			}

			return self::$instance;
		}
	}