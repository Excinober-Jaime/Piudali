<?php 

/**
* 
*/
class ControllerTienda
{
	
	function __construct()
	{
		$this->usuarios = new Usuarios();
		$this->productos = new Productos();
		$this->carrito = new Carrito();
		$this->ordenes = new Ordenes();
	}

	public function inicioTienda() {


		include 'views/tienda/inicio.php';
	}


}
?>