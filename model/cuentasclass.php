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
}
?>