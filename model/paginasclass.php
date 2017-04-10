<?php
/**
* 
*/
class Paginas extends Database
{
	
	public function listarPaginas($posicion=""){
		

		if (!empty($posicion)) {
			$posicion_where = " AND `posicion`='$posicion'";
		}else{
			$posicion_where = "";
		}

		$query = $this->consulta("SELECT `idpagina`, `titulo`, `url`, `contenido`, `banner`, `menu`, `posicion`, `estado` FROM `paginas` WHERE `estado`=1 $posicion_where");
		
		return $query;
	}

	public function crearPagina($titulo="",$url="",$contenido="",$posicion="",$banner="",$menu=0,$estado=0){
		
		$idpagina = $this->insertar("INSERT INTO `paginas`(									
									`titulo`, 
									`url`, 
									`contenido`, 
									`banner`, 
									`menu`, 
									`posicion`, 
									`estado`) VALUES (									
									'$titulo',
									'$url',
									'$contenido',
									'$banner',
									'$menu',
									'$posicion',
									'$estado')");
		
		return $idpagina;
	}

	public function actualizarPagina($idpagina,$titulo,$url,$contenido,$posicion,$banner,$menu,$estado){
		
		$query = $this->actualizar("UPDATE `paginas` SET 									
									`titulo`= '$titulo',
									`url`= '$url',
									`contenido`= '$contenido',
									`posicion`= '$posicion',
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
		
		$query = $this->consulta("SELECT `titulo`, `url`, `contenido`, `banner`, `menu`, `posicion`, `estado` FROM `paginas` WHERE `idpagina`='$idpagina'");
		
		return $query;
	}

	public function contenidoPagina($url){
		
		$query = $this->consulta("SELECT `idpagina`, `titulo`, `contenido`, `banner`, `menu`, `posicion`, `estado` FROM `paginas` WHERE `url`='$url'");
		
		return $query[0];
	}
}
?>
