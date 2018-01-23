<?php

/**
* 
*/
class Organizaciones extends Database
{
	
	public function listarOrganizaciones(){

		$query = $this->consulta("
									SELECT `idorganizacion`, `nit`, `razon_social`, `direccion`, `telefono`, `ciudades_idciudad`, `ciudades`.`ciudad`
									FROM `organizaciones`
									INNER JOIN `ciudades` ON (`ciudades`.`idciudad` = `organizaciones`.`ciudades_idciudad` )
									");
		
		return $query;
	}

	public function detalleOrganizacion($idorganizacion){

		$query = $this->consulta("
									SELECT `idorganizacion`, `nit`, `razon_social`, `direccion`, `telefono`, `ciudades_idciudad` 
									FROM `organizaciones`
									WHERE `idorganizacion` = '$idorganizacion'
									");
		
		return $query[0];
	}

	public function crearOrganizacion($nit = 0, $razon_social = '', $direccion = '', $telefono = '', $idciudad = 0){

		$idorganizacion = $this->insertar("INSERT INTO `organizaciones`(						
									`nit`, 
									`razon_social`, 
									`direccion`, 
									`telefono`, 
									`ciudades_idciudad`) VALUES (							
									'$nit',
									'$razon_social',
									'$direccion',
									'$telefono',
									'$idciudad')");
		
		return $idorganizacion;
	}

	public function actualizarOrganizacion($idorganizacion = 0, $nit = 0, $razon_social = '', $direccion = '', $telefono = '', $idciudad = 0){

		$query = $this->actualizar("UPDATE `organizaciones` SET 
									
									`nit`= '$nit',
									`razon_social`= '$razon_social',
									`direccion`= '$direccion',
									`telefono`= '$telefono',
									`ciudades_idciudad`= '$idciudad'
									
									WHERE `idorganizacion`='$idorganizacion'");	

		return $query;
	}

	public function disponible_ciudad($idciudad){

		$query = $this->consulta("
			
								SELECT `idorganizacion`
								FROM `organizaciones`
								INNER JOIN `sucursales` ON (`sucursales`.`organizaciones_idorganizacion` = `organizaciones`.`idorganizacion`)
								WHERE `sucursales`.`ciudades_idciudad` = '$idciudad'
			");

		return $query;

	}
}
?>