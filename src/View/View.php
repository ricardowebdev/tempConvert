<?php
	namespace src\View;
	use src\Conexao\Conexao;	

	use Controller\Banners\BannerController;

	class View
	{		
		CONST HEADER = 'View/header.php';
		CONST FOOTER = 'View/footer.php';

		public static function mountPage($view, $arquivo, $dados = "")
		{
			include self::HEADER;
			include 'View/'.$view.'/'.$arquivo.'.php';
			include self::FOOTER;
		}

		public static function redirect($route)
		{
			header("location: index.php?route=$route");
		}

		public static function notLogged()
		{
			header("location: login.php");	
		}
	}