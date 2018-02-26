<?php

/**
* 
*/
class controllerPOS
{

	public $asesor = array();
	public $alerta = '';
	
	function __construct()
	{
		$this->vendedoresPOS = new VendedoresPOS();
	}

	private function crear_sesion($vendedor = array()){


		if (!empty($vendedor)) {
			

			$_SESSION['loginpos'] = true;
			$_SESSION['nombrePOS'] = $vendedor['nombre'];
			$_SESSION['apellidoPOS'] = $vendedor['apellido'];
			$_SESSION['emailPOS'] = $vendedor['email'];
			$_SESSION['organizacionPOS'] = $vendedor['razon_social'];
		}

	}

	public function cerrar_sesion(){

		unset($_SESSION['loginpos']);
		unset($_SESSION['nombrePOS']);
		unset($_SESSION['apellidoPOS']);
		unset($_SESSION['emailPOS']);
		unset($_SESSION['organizacionPOS']);

		session_destroy();

		header('Location: '.URL_SITIO.URL_POS);
	}

	public function loguear($email = '', $password = ''){

		$vendedor = $this->vendedoresPOS->login($email, $password);

		return $vendedor;
	}

	public function home(){

		if (isset($_SESSION['loginpos']) && !empty($_SESSION['loginpos'])) {
			
			include 'views/pos/index.php';

		}else{

			if (isset($_POST['loguear'])) {
					
				extract($_POST);

				$vendedor = $this->loguear($email, md5($password));

				if (count($vendedor)>0) {
					
					$this->crear_sesion($vendedor);					

					header('Location: '.URL_POS);

				}else{

					$this->alerta = 'Los datos no coinciden con ningún usuario en el sistema. Por favor intente de nuevo';
					
					include 'views/pos/ingresar.php';
				}

			}else{

				include 'views/pos/ingresar.php';
			}			
		}
	}
}