<?php 

/**
* 
*/
class CanalesDistribucion extends Database
{

	public function actualizarCanal($idcanal, $nombre = '', $monto_minimo = 0, $puntos = 0, $referidos = 0, $incentivos = 0, $estado = 0){

		$query = $this->actualizar("UPDATE `canales_distribucion` SET 
									`nombre`= '$nombre',
									`monto_minimo`= '$monto_minimo',
									`puntos`= '$puntos',
									`referidos`= '$referidos',
									`incentivos`= '$incentivos',
									`estado`= '$estado' 
									WHERE `idcanal`='$idcanal'");

		return $query;
	}
	
	public function crearCanal($nombre = '', $monto_minimo = 0, $puntos = 0, $referidos = 0, $incentivos = 0, $estado = 0){

		$idcanal = $this->insertar("INSERT INTO `canales_distribucion`(	
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
		
		$query = $this->consulta("SELECT `idcanal`, `nombre`, `monto_minimo`, `puntos`, `referidos`, `incentivos`, `comision`, `estado`
								FROM `canales_distribucion`");
		
		return $query;
	}

	public function detalleCanal($idcanal=0){
		
		
		$query = $this->consulta("SELECT `idcanal`, `nombre`, `monto_minimo`, `puntos`, `referidos`, `incentivos`, `comision`, `estado` 
								FROM `canales_distribucion`
								WHERE `idcanal`='$idcanal'");
		
		return $query[0];
	}


	public function crearEscala($idcanal, $minimo, $maximo, $porcentaje){

		$idescala = $this->insertar("INSERT INTO `escalas_especiales`(
									`minimo`, 
									`maximo`, 
									`porcentaje`, 
									`canales_distribucion_idcanal`) VALUES (
									'$minimo',
									'$maximo',
									'$porcentaje',
									'$idcanal')");
		return $idescala;
	}

	public function listarEscalas($idcanal){

		$query = $this->consulta("SELECT `idescala`, `minimo`, `maximo`, `porcentaje`, `canales_distribucion_idcanal` FROM `escalas_especiales` WHERE `canales_distribucion_idcanal` ='$idcanal'");

		return $query;
	}

	public function listarUsuarios($idcanal = 0){

		$where = '';
		
		if (!empty($idcanal)) {
			
			$where = "WHERE `canales_distribucion_has_usuarios`.`canales_distribucion_idcanal`='$idcanal'";
		}

		$query = $this->consulta("SELECT `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`
								FROM `canales_distribucion_has_usuarios` 
								INNER JOIN `usuarios` ON (`canales_distribucion_has_usuarios`.`usuarios_idusuario`=`usuarios`.`idusuario`) 
								$where");
		return $query;
	}

	public function vincularUsuario($idusuario, $idcanal){

		$this->insertar("INSERT INTO `canales_distribucion_has_usuarios`(
							`canales_distribucion_idcanal`, 
							`usuarios_idusuario`) VALUES (
							'$idcanal',
							'$idusuario')");
	}

	public function eliminarUsuario($idusuario, $idcanal){

		$query = $this->actualizar("DELETE FROM `canales_distribucion_has_usuarios` WHERE `canales_distribucion_idcanal`='$idcanal' AND `usuarios_idusuario`='$idusuario'");

		return $query;
	}

	public static function consultarPorcentaje($idcanal, $monto){
		
		$database = new Database;

		$query = $database->consulta("SELECT `porcentaje` FROM `escalas_especiales` WHERE `canales_distribucion_idcanal`='$idcanal' AND `minimo`<= '$monto' AND `maximo`>='$monto'");
		
		return $query[0];
								
	}

}
?>