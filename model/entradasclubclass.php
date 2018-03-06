<?php

/**
* 
*/
class Entradas extends Database
{
	
	public function crearEntrada($titulo="",$contenido="",$url="",$tipo="",$ruta="",$estado=1){
		
		$identrada = $this->insertar("INSERT INTO `entradas_club`(
									`titulo`, 
									`contenido`, 
									`url`, 
									`tipo`, 									
									`ruta`, 									
									`estado`) VALUES (									
									'$titulo',
									'$contenido',
									'$url',
									'$tipo',
									'$ruta',
									'$estado')");
		
		return $identrada;
	}

	public function actualizarEntrada($titulo="",$contenido="",$url="",$tipo="",$ruta="",$estado=1, $identrada=0){

		$query = $this->actualizar("UPDATE `entradas_club` SET
									`titulo`='$titulo',									
									`contenido`='$contenido',
									`url`='$url',
									`tipo`='$tipo',
									`ruta`='$ruta',
									`estado`='$estado' 
									WHERE `identrada`='$identrada'");	

		return $query;

	}

	public function listarEntradas($estados=array(), $limit = '') {
			

		if (count($estados)>0) {

			$estados_select = "(";

			$count = 0;

			foreach ($estados as $estado) {
				if ($count>0) {
					$estados_select .= " OR ";
				}

				$estados_select .= "`estado` = '$estado'";
				$count++;
			}
			$estados_select .= ")";
		}else{
			$estados_select = "";
		}
		
		$query = $this->consulta("SELECT `identrada`, `titulo`, `contenido`, `url`, `tipo`, `ruta`, `estado` 
								FROM `entradas_club` 
								WHERE $estados_select 
								ORDER BY `identrada` DESC
								$limit");
		
		return $query;
	}

	public function detalleEntrada($identrada){
		
		$query = $this->consulta("SELECT `identrada`, `titulo`, `contenido`, `url`, `tipo`, `ruta`, `estado` FROM `entradas_club` WHERE `identrada`='$identrada'");
		
		return $query[0];
	}

	public function detalleEntradaUrl($url){
		
		$query = $this->consulta("SELECT `identrada`, `titulo`, `contenido`, `url`, `tipo`, `ruta`, `estado` FROM `entradas_club` WHERE `url`='$url'");
		
		return $query[0];
	}

	public function eliminarEntrada($identrada){

		$filas = $this->actualizar("DELETE FROM `entradas_club` WHERE `identrada`='$identrada'");
		return $filas;
	}
}

?>