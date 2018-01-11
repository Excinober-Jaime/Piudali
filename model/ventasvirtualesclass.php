<?php
/**
* 
*/
class VentasVirtuales extends Database
{
	
	public function crear_venta($comision_pagada = 0, $idorden = 0, $iddistribuidor = 0){

		$idventa = $this->insertar("INSERT INTO `ventas_virtuales`(								
									`comision_pagada`, 
									`ordenes_pedidos_idorden`, 
									`usuarios_idusuario`) VALUES (
									'$comision_pagada',
									'$idorden',
									'$iddistribuidor')");
		
		return $idventa;
	}
}
?>