<?php

/**
* 
*/
class controllerPOS
{

	public $asesor = array();

	
	function __construct()
	{
		$this->vendedoresPOS = new VendedoresPOS();
	}

	public function loguear($email = '', $password = ''){

		$vendedor = $this->vendedoresPOS->login($email, $password);

		var_dump($vendedor);
	}

	public function home(){

		include 'views/POS/index.php';
	}
}