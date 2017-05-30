<?php
/**
* 
*/
class CuentasVirtuales extends Database
{
	
	public function consultarCuenta($idusuario){
		
		$query = $this->consulta("SELECT `idcuenta`, `valor`, `fecha`, `usuarios_idusuario` FROM `cuentas_virtuales` WHERE `usuarios_idusuario`='$idusuario'");
		
		return $query[0];
	}

	public function consultarMovimientos($idcuenta){
		
		$query = $this->consulta("SELECT `idmovimiento`, `valor`, `descripcion`, `fecha`, `adjunto`, `cuentas_virtuales_idcuenta` FROM `movimientos_cuentas` WHERE `cuentas_virtuales_idcuenta`='$idcuenta'");
		
		return $query;
	}

	public function crearCuenta($valor, $fecha, $idusuario){

		$idcuenta = $this->insertar("INSERT INTO `cuentas_virtuales`(									
										`valor`, 										
										`fecha`,
										`usuarios_idusuario`) VALUES (									
										'$valor',										
										'$fecha',										
										'$idusuario')");
		return $idcuenta;
	}

	public function actualizarCuenta($nuevo_valor, $idusuario){

		$query = $this->actualizar("UPDATE `cuentas_virtuales` 
									SET `valor`= '$nuevo_valor'
									WHERE `usuarios_idusuario`= '$idusuario'");
		
		return $query;
	}

	public function crearMovimiento($monto, $descripcion, $adjunto, $idcuenta, $idusuario){

		//Actualizar cuenta
		$cuenta = $this->consultarCuenta($idusuario);
		$nuevo_valor = $cuenta["valor"] + $monto;

		$filas = $this->actualizarCuenta($nuevo_valor, $idusuario);

		$idmovimiento = 0;
		
		if ($filas) {		

			$idmovimiento = $this->insertar("INSERT INTO `movimientos_cuentas`(
											`valor`, 
											`descripcion`, 										 
											`adjunto`, 
											`cuentas_virtuales_idcuenta`) VALUES (
											'$monto',
											'$descripcion',
											'$adjunto',
											'$idcuenta')");
		}
		
		return $idmovimiento;
	}

	public function crearPagoComision($idmovimiento, $idcampana, $idusuario){

		$idpago = $this->insertar("INSERT INTO `pagos_comisiones`(
									`movimientos_cuentas_idmovimiento`,
									`campanas_idcampana`,
									`usuarios_idusuario`) VALUES (									
									'$idmovimiento',
									'$idcampana',
									'$idusuario')");
		return $idpago;
	}

	public function detallePagoComision($idcampana, $idusuario){
		$query = $this->consulta("SELECT `pagos_comisiones`.`idpago`, `pagos_comisiones`.`movimientos_cuentas_idmovimiento`, `pagos_comisiones`.`campanas_idcampana`, `pagos_comisiones`.`usuarios_idusuario`, `movimientos_cuentas`.`valor`, `movimientos_cuentas`.`descripcion`, `movimientos_cuentas`.`fecha`, `movimientos_cuentas`.`adjunto` 
									FROM `pagos_comisiones` 
									INNER JOIN `movimientos_cuentas` ON (`pagos_comisiones`.`movimientos_cuentas_idmovimiento`=`movimientos_cuentas`.`idmovimiento`)
									WHERE `pagos_comisiones`.`campanas_idcampana`='$idcampana' AND `pagos_comisiones`.`usuarios_idusuario`='$idusuario'");
		
		return $query[0];
	}

	public function detallePagoIncentivo($idincentivo, $idusuario){
		$query = $this->consulta("SELECT `pagos_incentivos`.`idpago`, `pagos_incentivos`.`movimientos_cuentas_idmovimiento`, `pagos_incentivos`.`incentivos_idincentivo`, `pagos_incentivos`.`usuarios_idusuario`, `movimientos_cuentas`.`valor`, `movimientos_cuentas`.`descripcion`, `movimientos_cuentas`.`fecha`, `movimientos_cuentas`.`adjunto` 
									FROM `pagos_incentivos` 
									INNER JOIN `movimientos_cuentas` ON (`pagos_incentivos`.`movimientos_cuentas_idmovimiento`=`movimientos_cuentas`.`idmovimiento`)
									WHERE `pagos_incentivos`.`incentivos_idincentivo`='$idincentivo' AND `pagos_incentivos`.`usuarios_idusuario`='$idusuario'");
		
		return $query[0];
	}
}
?>