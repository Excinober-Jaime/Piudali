<?php 

/**
* 
*/
class VendedoresPOS extends Database
{
	
	public function login($email, $password){

		$query = $this->consulta("SELECT `idvendedor`, `nombre`, `apellido`, `num_identificacion`, `email`, `password`, `organizaciones_idorganizacion`
									FROM `usuarios` 								
									WHERE `email`='$email' AND `password`='$password'");
		
		return $query[0];
	}
}