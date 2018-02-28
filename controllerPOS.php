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
		$this->usuarios = new Usuarios();
		$this->puntos = new Puntos();
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

	public function consultar_cliente(){

		if (isset($_POST['consultar']) && !empty($_POST['documento'])) {
			
			$cliente = $this->usuarios->detalleUsuarioDocumento($_POST['documento'], 'CONSUMIDOR');

			$puntos = $this->usuarios->puntosDisponibles($cliente['idusuario']);
			$equivalencia_pesos = $puntos['disponibles'] * 5;

			include 'views/pos/consulta.php';

		}else{

			header('Location: '.URL_SITIO.URL_POS);

		}

	}

	public function redimir_puntos(){

		if (isset($_POST['valor']) && !empty($_POST['valor']) && isset($_POST['idcliente']) && !empty($_POST['idcliente'])) {

			$puntos = $_POST['valor'] / 5;
			
			$this->puntos->descontarPuntos(round($puntos), $_POST['idcliente']);

			$this->alerta = 'Se redimió con éxito '.convertir_pesos($_POST['valor']);

		}else{

			$this->alerta = 'No fue posible redimir el valor. Por favor intenta de nuevo';
		}

		include 'views/pos/index.php';
	}
}