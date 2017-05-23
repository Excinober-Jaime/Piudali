<?php 
/**
* 
*/
class Capacitacion extends Database
{

	public function listarCategorias($perfil="TODOS", $estado){

		
		if (!empty($perfil) && $perfil != "TODOS") {
			$where = "WHERE `perfil`='TODOS' OR `perfil`='$perfil'";
		}

		if ($estado === 0 || $estado === 1) {
			if ($where) {
				$where .= " AND `estado`='$estado'";
			}else{
				$where = "WHERE `estado`='$estado'";
			}
		}
		
		$query = $this->consulta("SELECT `idcategoria`, `titulo`, `contenido`, `perfil`, `orden`, `estado` FROM `categorias_capacitacion` $where
			  ORDER BY `orden` ASC");
		
		return $query;
	}

	public function crearCategoria($titulo="", $contenido="", $perfil="TODOS", $orden=0, $estado=0){
		
		$idcategoria = $this->insertar("INSERT INTO `categorias_capacitacion`(										
										`titulo`, 
										`contenido`, 
										`perfil`, 
										`orden`,
										`estado`) VALUES (										
										'$titulo',
										'$contenido',
										'$perfil',
										'$orden',
										'$estado')");
		
		return $idcategoria;
	}

	public function actualizarCategoria($idcategoria=0, $titulo="", $contenido="", $perfil="TODOS", $orden=0, $estado=0){
		
		$query = $this->actualizar("UPDATE `categorias_capacitacion` SET 
									`titulo`='$titulo',
									`contenido`='$contenido',
									`perfil`='$perfil',
									`orden`='$orden',
									`estado`='$estado' 
									WHERE `idcategoria`='$idcategoria'");
		return $query;
	}


	public function eliminarCategoria($idcategoria){
		
		$filas = $this->actualizar("DELETE FROM `categorias_capacitacion` WHERE `idcategoria`='$idcategoria'");
		return $filas;
	}

	public function detalleCategoria($idcategoria){
		
		$query = $this->consulta("SELECT `idcategoria`, `titulo`, `contenido`, `perfil`, `orden`, `estado` FROM `categorias_capacitacion` WHERE `idcategoria`='$idcategoria'");
		
		return $query[0];
	}

	/***ELEMENTOS****/
	public function listarElementosCat($categoria=0,$estados=array()){	

		if (count($estados)>0) {

			$estados_select = "AND (";

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
		
		$query = $this->consulta("SELECT `idelemento`, `titulo`, `tipo`, `imagen`, `contenido`, `perfil`, `estado`, `categorias_capacitacion_idcategoria` FROM `elementos_capacitacion` WHERE `categorias_capacitacion_idcategoria`='$categoria' $estados_select");
		
		return $query;
	}

	public function listarElementos($perfil="TODOS"){

		if ($perfil!="TODOS") {
			 $where = "WHERE `perfil`='$perfil'";
		}else{
			$where = "";
		}
		
		$query = $this->consulta("SELECT `idelemento`, `titulo`, `tipo`, `imagen`, `contenido`, `perfil`, `estado`, `categorias_capacitacion_idcategoria` FROM `elementos_capacitacion` $where");
		
		return $query;
	}

	public function crearElemento($titulo="", $tipo="", $imagen="", $contenido="", $perfil="TODOS", $estado=0, $idcategoria=0){
		
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

		if (!empty($imagen)) {
			$this->actualizar("UPDATE `elementos_capacitacion` SET 
									`imagen`='$imagen'
									WHERE `idelemento`='$idelemento'");
		}
		
		return $idelemento;
	}

	public function actualizarElemento($idelemento=0, $titulo="", $tipo="", $imagen="", $contenido="", $perfil="TODOS", $estado=0, $idcategoria=0){

		$query = $this->actualizar("UPDATE `elementos_capacitacion` SET 
									`titulo`='$titulo',
									`tipo`='$tipo',
									`contenido`='$contenido',
									`perfil`='$perfil',
									`estado`='$estado',
									`categorias_capacitacion_idcategoria`='$idcategoria'
									WHERE `idelemento`='$idelemento'");

		if (!empty($imagen)) {
			$this->actualizar("UPDATE `elementos_capacitacion` SET 
									`imagen`='$imagen'
									WHERE `idelemento`='$idelemento'");			
		}

		return $query;
	}



	public function detalleElemento($idelemento){
		
		$query = $this->consulta("SELECT `idelemento`, `titulo`, `tipo`, `imagen`, `contenido`, `perfil`, `estado`, `categorias_capacitacion_idcategoria` FROM `elementos_capacitacion` WHERE `idelemento`='$idelemento'");
		
		return $query[0];
	}

	public function eliminarElemento($idelemento){
		
		$filas = $this->actualizar("DELETE FROM `elementos_capacitacion` WHERE `idelemento`='$idelemento'");
		return $filas;
	}
}
?>