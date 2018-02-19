<?php

/**
* 
*/
class Sucursales extends Database
{
	
	public function listarSucursales($idorganizacion = 0){

		if (!empty($idorganizacion)) {
			
			$where = "WHERE `organizaciones_idorganizacion` = '$idorganizacion'";
		}

		$query = $this->consulta("SELECT `idsucursal`, `nombre`, `sucursales`.`direccion`, `sucursales`.`telefono`, `email`, `pagina_web`, `imagen`, `organizaciones_idorganizacion`, `sucursales`.`ciudades_idciudad`, `organizaciones`.`razon_social`, `ciudades`.`ciudad`
									FROM `sucursales` 
									INNER JOIN `ciudades` ON (`ciudades`.`idciudad` = `sucursales`.`ciudades_idciudad` )
									INNER JOIN `organizaciones` ON (`organizaciones`.`idorganizacion` = `sucursales`.`organizaciones_idorganizacion` )
									$where ");
		
		return $query;
	}

	public function detalleSucursal($idsucursal){

		$query = $this->consulta("
									SELECT `idsucursal`, `nombre`, `direccion`, `telefono`, `email`, `pagina_web`, `imagen`, `organizaciones_idorganizacion`, `ciudades_idciudad` 
									FROM `sucursales` 
									INNER JOIN `ciudades` ON (`ciudades`.`idciudad` = `sucursales`.`ciudades_idciudad`)
									WHERE `idsucursal` = '$idsucursal'
									");
		
		return $query[0];
	}

	public function crearSucursal($nombre = '', $direccion = '', $telefono = '', $email = '', $pagina_web = '', $imagen = '', $idorganizacion = 0 ,$idciudad = 0){

		$idsucursal = $this->insertar("INSERT INTO `sucursales`(							
										`nombre`, 
										`direccion`, 
										`telefono`, 
										`email`,
										`pagina_web`,
										`imagen`, 
										`organizaciones_idorganizacion`, 
										`ciudades_idciudad`) VALUES (				
										'$nombre',
										'$direccion',
										'$telefono',
										'$email',
										'$pagina_web',
										'$imagen',
										'$idorganizacion',
										'$idciudad')");
		
		return $idsucursal;
	}

	public function actualizarSucursal($idsucursal = 0, $nombre = '', $direccion = '', $telefono = '', $email = '', $pagina_web = '', $imagen = '', $idorganizacion = 0 ,$idciudad = 0){

		$query = $this->actualizar("UPDATE `sucursales` SET 									
									`nombre`= '$nombre',
									`direccion`= '$direccion',
									`telefono`= '$telefono',						
									`email`= '$email',
									`pagina_web`= '$pagina_web',
									`organizaciones_idorganizacion`= '$idorganizacion',
									`ciudades_idciudad`= '$idciudad' 
									WHERE `idsucursal` = '$idsucursal'");	

		if (!empty($imagen)) {
			
			$this->actualizar("UPDATE `sucursales` SET 					
									`imagen`= '$imagen'							
									WHERE `idsucursal` = '$idsucursal'");

		}

		return $query;
	}
}
?>