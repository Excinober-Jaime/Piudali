<?php 

/**
* 
*/
class CanalesDistribucion extends Database
{

	public function actualizarCanal($idcanal, $nombre = '', $monto_minimo = 0, $puntos = 0, $referidos = 0, $incentivos = 0, $estado = 0){

		$query = $this->actualizar("UPDATE `modelos_negocio_distribuidores` SET 
									`nombre`= '$nombre',
									`monto_minimo`= '$monto_minimo',
									`puntos`= '$puntos',
									`referidos`= '$referidos',
									`incentivos`= '$incentivos',
									`estado`= '$estado' 
									WHERE `idmodelo`='$idcanal'");

		return $query;
	}
	
	public function crearCanal($nombre = '', $monto_minimo = 0, $puntos = 0, $referidos = 0, $incentivos = 0, $estado = 0){

		$idcanal = $this->insertar("INSERT INTO `modelos_negocio_distribuidores`(	
									`nombre`, 
									`monto_minimo`, 
									`puntos`, 
									`referidos`, 
									`incentivos`, 
									`estado`) VALUES (
									'$nombre',
									'$monto_minimo',
									'$puntos',
									'$referidos',
									'$incentivos',
									'$estado')");

		return $idcanal;

	}

	public function listarCanales(){		
		
		$query = $this->consulta("SELECT `idmodelo`, `nombre`, `monto_minimo`, `puntos`, `referidos`, `incentivos`, `estado` 
								FROM `modelos_negocio_distribuidores`");
		
		return $query;
	}

	public function detalleCanal($idcanal=0){
		
		
		$query = $this->consulta("SELECT `idmodelo`, `nombre`, `monto_minimo`, `puntos`, `referidos`, `incentivos`, `estado` 
								FROM `modelos_negocio_distribuidores`
								WHERE `idmodelo`='$idcanal'");
		
		return $query[0];
	}


	public function crearEscala($idcanal, $minimo, $maximo, $porcentaje){

		$idescala = $this->insertar("INSERT INTO `escalas_especiales`(
									`minimo`, 
									`maximo`, 
									`porcentaje`, 
									`modelos_negocio_distribuidores_idmodelo`) VALUES (
									'$minimo',
									'$maximo',
									'$porcentaje',
									'$idcanal')");
		return $idescala;
	}

	public function listarEscalas($idcanal){

		$query = $this->consulta("SELECT `idescala`, `minimo`, `maximo`, `porcentaje`, `modelos_negocio_distribuidores_idmodelo` FROM `escalas_especiales` WHERE `modelos_negocio_distribuidores_idmodelo` ='$idcanal'");

		return $query;
	}

	public function listarUsuarios($idcanal = 0){

		$where = '';
		
		if (!empty($idcanal)) {
			
			$where = "WHERE `modelos_negocio_distribuidores_has_usuarios`.`modelos_negocio_distribuidores_idmodelo`='$idcanal'";
		}

		$query = $this->consulta("SELECT `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`
								FROM `modelos_negocio_distribuidores_has_usuarios` 
								INNER JOIN `usuarios` ON (`modelos_negocio_distribuidores_has_usuarios`.`usuarios_idusuario`=`usuarios`.`idusuario`) 
								$where");
		return $query;
	}

	public function vincularUsuario($idusuario, $idcanal){

		$this->insertar("INSERT INTO `modelos_negocio_distribuidores_has_usuarios`(
							`modelos_negocio_distribuidores_idmodelo`, 
							`usuarios_idusuario`) VALUES (
							'$idcanal',
							'$idusuario')");
	}

	public function eliminarUsuario($idusuario, $idcanal){

		$query = $this->actualizar("DELETE FROM `modelos_negocio_distribuidores_has_usuarios` WHERE `modelos_negocio_distribuidores_idmodelo`='$idcanal' AND `usuarios_idusuario`='$idusuario'");

		return $query;
	}

	public static function consultarPorcentaje($idcanal, $monto){
		
		$database = new Database;

		$query = $database->consulta("SELECT `porcentaje` FROM `escalas_especiales` WHERE `modelos_negocio_distribuidores_idmodelo`='$idcanal' AND `minimo`<= '$monto' AND `maximo`>='$monto'");
		
		return $query[0];
								
	}

}
?>