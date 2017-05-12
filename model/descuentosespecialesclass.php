<?php 
/**
* 
*/
class Descuentosespeciales extends Database
{

	public function listarDescuentos($estados=array(1)){
		
		$query = $this->consulta("SELECT `iddescuento`, `nombre`, `monto_minimo`, `estado` FROM `descuentos_especiales`");

		return $query;
	}

	public function detalleDescuento($iddescuento){

		$query = $this->consulta("SELECT `iddescuento`, `nombre`, `monto_minimo`, `estado` FROM `descuentos_especiales` WHERE `iddescuento`='$iddescuento'");

		return $query[0];
	}

	public function crearDescuento($nombre, $monto_minimo, $estado){

		$iddescuento = $this->insertar("INSERT INTO `descuentos_especiales`(
										`nombre`, 
										`monto_minimo`, 
										`estado`) VALUES (
										'$nombre',
										'$monto_minimo',
										'$estado')");

		return $iddescuento;
	}

	public function actualizarDescuento($iddescuento, $nombre, $monto_minimo, $estado){

		$query = $this->actualizar("UPDATE `descuentos_especiales` 
									SET `nombre`='$nombre',
										`monto_minimo`='$monto_minimo',
										`estado`='$estado' 
									WHERE `iddescuento`='$iddescuento'");

		return $query;
	}
	
	public static function consultarDescuento($idusuario){
		
		$database = new Database;

		$query = $database->consulta("SELECT `descuentos_especiales`.`iddescuento`, `descuentos_especiales`.`nombre`, `descuentos_especiales`.`monto_minimo`, `descuentos_especiales`.`estado` FROM `descuentos_especiales_has_usuarios`
									INNER JOIN `descuentos_especiales` ON (`descuentos_especiales_has_usuarios`.`descuentos_especiales_iddescuento` = `descuentos_especiales`.`iddescuento`)
									WHERE `descuentos_especiales_has_usuarios`.`usuarios_idusuario`='$idusuario'");
		return $query[0];
								
	}

	public static function consultarPorcentaje($iddescuento, $monto){
		
		$database = new Database;

		$query = $database->consulta("SELECT `porcentaje` FROM `escalas_especiales` WHERE `descuentos_especiales_iddescuento`='$iddescuento' AND `minimo`<= '$monto' AND `maximo`>='$monto'");
		
		return $query[0];
								
	}

	public function crearEscala($iddescuento, $minimo, $maximo, $porcentaje){

		$idescala = $this->insertar("INSERT INTO `escalas_especiales`(									
										`minimo`, 
										`maximo`, 
										`porcentaje`, 
										`descuentos_especiales_iddescuento`) VALUES (
										'$minimo',
										'$maximo',
										'$porcentaje',
										'$iddescuento')");
		return $idescala;
	}

	public function listarEscalas($iddescuento){

		$query = $this->consulta("SELECT `idescala`, `minimo`, `maximo`, `porcentaje`, `descuentos_especiales_iddescuento` FROM `escalas_especiales` WHERE `descuentos_especiales_iddescuento`='$iddescuento'");

		return $query;
	}

	public function listarUsuarios($iddescuento){

		$query = $this->consulta("SELECT `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`
									FROM `usuarios`
									INNER JOIN `descuentos_especiales_has_usuarios` ON (`descuentos_especiales_has_usuarios`.`usuarios_idusuario`=`usuarios`.`idusuario`)
									WHERE `descuentos_especiales_has_usuarios`.`descuentos_especiales_iddescuento`='$iddescuento'");
		return $query;
	}

	public function vincularUsuario($idusuario, $iddescuento){

		$this->insertar("INSERT INTO `descuentos_especiales_has_usuarios`(
										`descuentos_especiales_iddescuento`, 
										`usuarios_idusuario`) VALUES (
										'$iddescuento',
										'$idusuario')");
	}

}
?>