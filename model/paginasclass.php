<?php
/**
* 
*/
class Paginas extends Database
{
	
	public function listarPaginas($posicion=""){
		

		if (!empty($posicion)) {
			$posicion_where = " WHERE `posicion`='$posicion'";
		}else{
			$posicion_where = "";
		}

		$query = $this->consulta("SELECT `idpagina`, `titulo`, `url`, `contenido`, `banner`, `menu`, `estado` FROM `paginas` $posicion_where");
		
		return $query;
	}

	public function crearPagina($titulo="",$url="",$contenido="",$banner="",$menu=0,$estado=0){
		
		$idpagina = $this->insertar("INSERT INTO `paginas`(									
									`titulo`, 
									`url`, 
									`contenido`, 
									`banner`, 
									`menu`, 
									`estado`) VALUES (									
									'$titulo',
									'$url',
									'$contenido',
									'$banner',
									'$menu',
									'$estado')");
		
		return $idpagina;
	}

	public function actualizarPagina($idpagina,$titulo,$contenido,$banner,$menu,$estado){
		
		$query = $this->actualizar("UPDATE `paginas` SET 									
									`titulo`= '$titulo',									
									`contenido`= '$contenido',									
									`menu`= '$menu',
									`estado`= '$estado' 
									WHERE `idpagina`='$idpagina'");	

		if (!empty($banner)) {
			$img = $this->actualizar("UPDATE `paginas` SET
									`banner`= '$banner'	
									WHERE `idpagina`='$idpagina'");	
		}

		
		return $query;
	}



	public function detallePagina($idpagina){
		
		$query = $this->consulta("SELECT `titulo`, `url`, `contenido`, `banner`, `menu`, `estado` FROM `paginas` WHERE `idpagina`='$idpagina'");
		
		return $query;
	}

	public function contenidoPagina($url){
		
		$query = $this->consulta("SELECT `idpagina`, `titulo`, `contenido`, `banner`, `menu`, `estado` FROM `paginas` WHERE `url`='$url'");
		
		return $query[0];
	}
}
?>
