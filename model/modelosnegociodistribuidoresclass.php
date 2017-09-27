<?php 

/**
* 
*/
class ModelosNegocioDistribuidores extends Database
{

	public function actualizarModelo($idmodelo, $nombre = '', $monto_minimo = 0, $puntos = 0, $referidos = 0, $incentivos = 0, $estado = 0){

		$query = $this->actualizar("UPDATE `modelos_negocio_distribuidores` SET 
									`nombre`= '$nombre',
									`monto_minimo`= '$monto_minimo',
									`puntos`= '$puntos',
									`referidos`= '$referidos',
									`incentivos`= '$incentivos',
									`estado`= '$estado' 
									WHERE `idmodelo`='$idmodelo'");

		return $query;
	}
	
	public function crearModelo($nombre = '', $monto_minimo = 0, $puntos = 0, $referidos = 0, $incentivos = 0, $estado = 0){

		$idmodelo = $this->insertar("INSERT INTO `modelos_negocio_distribuidores`(	
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

		return $idmodelo;

	}

	public function listarModelos(){
		
		
		$query = $this->consulta("SELECT `idmodelo`, `nombre`, `monto_minimo`, `puntos`, `referidos`, `incentivos`, `estado` 
								FROM `modelos_negocio_distribuidores`");
		
		return $query;
	}

	public function detalleModelo($idmodelo=0){
		
		
		$query = $this->consulta("SELECT `idmodelo`, `nombre`, `monto_minimo`, `puntos`, `referidos`, `incentivos`, `estado` 
								FROM `modelos_negocio_distribuidores`
								WHERE `idmodelo`='$idmodelo'");
		
		return $query[0];
	}


	public function crearEscala($idmodelo, $minimo, $maximo, $porcentaje){

		$idescala = $this->insertar("INSERT INTO `escalas_especiales`(
									`minimo`, 
									`maximo`, 
									`porcentaje`, 
									`modelos_negocio_distribuidores_idmodelo`) VALUES (
									'$minimo',
									'$maximo',
									'$porcentaje',
									'$idmodelo')");
		return $idescala;
	}

	public function listarEscalas($idmodelo){

		$query = $this->consulta("SELECT `idescala`, `minimo`, `maximo`, `porcentaje`, `modelos_negocio_distribuidores_idmodelo` FROM `escalas_especiales` WHERE `modelos_negocio_distribuidores_idmodelo` ='$idmodelo'");

		return $query;
	}

	public function listarUsuarios($idmodelo = 0){

		$where = '';
		
		if (!empty($idmodelo)) {
			
			$where = "WHERE `modelos_negocio_distribuidores_has_usuarios`.`modelos_negocio_distribuidores_idmodelo`='$idmodelo'";
		}

		$query = $this->consulta("SELECT `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`
								FROM `modelos_negocio_distribuidores_has_usuarios` 
								INNER JOIN `usuarios` ON (`modelos_negocio_distribuidores_has_usuarios`.`usuarios_idusuario`=`usuarios`.`idusuario`) 
								$where");
		return $query;
	}

	public function vincularUsuario($idusuario, $idmodelo){

		$this->insertar("INSERT INTO `modelos_negocio_distribuidores_has_usuarios`(
							`modelos_negocio_distribuidores_idmodelo`, 
							`usuarios_idusuario`) VALUES (
							'$idmodelo',
							'$idusuario')");
	}

}
?>