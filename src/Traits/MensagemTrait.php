<?php
	namespace src\Traits;

	Trait MensagemTrait
	{

		public static function set($mensagem, $tipo)
		{
			$_SESSION['mensagem']['msg']  = $mensagem;
			$_SESSION['mensagem']['tipo'] = $tipo;
		}

		public static function get()
		{
			
			if(isset($_SESSION['mensagem'])) {

				$mensagem = $_SESSION['mensagem']['msg'];
				$tipo     = $_SESSION['mensagem']['tipo'];

				self::limpar();

				$html = '<div class="alert alert-' . $tipo . '" role="alert">
						     <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							 <span class="sr-only">Error:</span>'.$mensagem.'
					     </div>';

				echo $html;

			}

		}

		public static function limpar()
		{
			unset($_SESSION['mensagem']);
		}

	}