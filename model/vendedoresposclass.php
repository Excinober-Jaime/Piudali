<?php 

/**
* 
*/
class VendedoresPOS extends Database
{
	
	public function login($email, $password){

		$query = $this->consulta("SELECT `idvendedor`, `nombre`, `apellido`, `num_identificacion`, `email`, `password`, `organizaciones_idorganizacion`, `organizaciones`.`razon_social`
									FROM `vendedores`
									INNER JOIN `organizaciones` ON (`organizaciones`.`idorganizacion` = `vendedores`.`organizaciones_idorganizacion`)			
									WHERE `email`='$email' AND `password`='$password'");
		
		return $query[0];
	}
}