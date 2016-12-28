<?php 
/**
* 
*/
class Capacitacion extends Database
{

	public function listarCategorias($perfil="TODOS"){

		if ($perfil!="TODOS") {
			 $where = "WHERE `perfil`='$perfil'";
		}else{
			$where = "";
		}
		
		$query = $this->consulta("SELECT `idcategoria`, `titulo`, `contenido`, `perfil`, `estado` FROM `categorias_capacitacion` $where");
		
		return $query;
	}

	public function crearCategoria($titulo="", $contenido="", $perfil="TODOS", $estado=0){
		
		$idcategoria = $this->insertar("INSERT INTO `categorias_capacitacion`(										
										`titulo`, 
										`contenido`, 
										`perfil`, 
										`estado`) VALUES (										
										'$titulo',
										'$contenido',
										'$perfil',
										'$estado')");
		
		return $idcategoria;
	}

	public function actualizarCategoria($idcategoria=0, $titulo="", $contenido="", $perfil="TODOS", $estado=0){
		
		$query = $this->actualizar("UPDATE `categorias_capacitacion` SET 
									`titulo`='$titulo',
									`contenido`='$contenido',
									`perfil`='$perfil',
									`estado`='$estado' 
									WHERE `idcategoria`='$idcategoria'");
		return $query;
	}



	public function detalleCategoria($idcategoria){
		
		$query = $this->consulta("SELECT `idcategoria`, `titulo`, `contenido`, `perfil`, `estado` FROM `categorias_capacitacion` WHERE `idcategoria`='$idcategoria'");
		
		return $query[0];
	}

	/***ELEMENTOS****/
	public function listarElementosCat($categoria=0){		
		
		$query = $this->consulta("SELECT `idelemento`, `titulo`, `tipo`, `contenido`, `perfil`, `estado`, `categorias_capacitacion_idcategoria` FROM `elementos_capacitacion` WHERE `categorias_capacitacion_idcategoria`='$categoria'");
		
		return $query;
	}

	public function listarElementos($perfil="TODOS"){

		if ($perfil!="TODOS") {
			 $where = "WHERE `perfil`='$perfil'";
		}else{
			$where = "";
		}
		
		$query = $this->consulta("SELECT `idelemento`, `titulo`, `tipo`, `contenido`, `perfil`, `estado`, `categorias_capacitacion_idcategoria` FROM `elementos_capacitacion` $where");
		
		return $query;
	}

	public function crearElemento($titulo="", $tipo="", $contenido="", $perfil="TODOS", $estado=0, $idcategoria=0){
		
		$idelemento = $this->insertar("INSERT INTO `elementos_capacitacion`(										
										`titulo`, 
										`tipo`, 
										`contenido`, 
										`perfil`, 
										`estado`, 
										`categorias_capacitacion_idcategoria`) VALUES (										
										'$titulo',
										'$tipo',
										'$contenido',
										'$perfil',
										'$estado',
										'$idcategoria')");
		
		return $idelemento;
	}

	public function actualizarElemento($idelemento=0, $titulo="", $tipo="", $contenido="", $perfil="TODOS", $estado=0, $idcategoria=0){
		
		$query = $this->actualizar("UPDATE `elementos_capacitacion` SET 
									`titulo`='$titulo',
									`tipo`='$tipo',
									`contenido`='$contenido',
									`perfil`='$perfil',
									`estado`='$estado',
									`categorias_capacitacion_idcategoria`='$idcategoria'
									WHERE `idelemento`='$idelemento'");
		return $query;
	}



	public function detalleElemento($idelemento){
		
		$query = $this->consulta("SELECT `idelemento`, `titulo`, `tipo`, `contenido`, `perfil`, `estado`, `categorias_capacitacion_idcategoria` FROM `elementos_capacitacion` WHERE `idelemento`='$idelemento'");
		
		return $query[0];
	}
}
?>