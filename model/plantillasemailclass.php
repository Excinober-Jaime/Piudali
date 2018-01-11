<?php

/**
* 
*/
class PlantillasEmail extends Database
{
	
	public static function detalle_plantilla($idplantilla) {

		$database = new Database;

		$query = $database->consulta("SELECT `titulo`, `asunto`, `mensaje`, `email`, `estado` 
									FROM `mensajes_email` 
									WHERE `idmensaje`='$idplantilla'");
		
		return $query[0];
	}
}
?>