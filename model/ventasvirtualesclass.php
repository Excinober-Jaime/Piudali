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

	public function listar_ventas($idvendedor = 0, $inicio = '', $fin = '', $estados = array()){

		$query = $this->consulta("
								SELECT `ventas_virtuales`.`idventa`, `ventas_virtuales`.`comision_pagada`, `ventas_virtuales`.`ordenes_pedidos_idorden`, `ventas_virtuales`.`usuarios_idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `ordenes_pedidos`.`idorden`, `ordenes_pedidos`.`num_orden`, `ordenes_pedidos`.`fecha_pedido`, `ordenes_pedidos`.`total`, `ordenes_pedidos`.`estado`
								FROM `ventas_virtuales` 
								INNER JOIN `ordenes_pedidos` ON (
									`ordenes_pedidos`.`idorden` = `ventas_virtuales`.`idventa`  
									)
								INNER JOIN `usuarios` ON (`usuarios`.`idusuario` = `ordenes_pedidos`.`usuarios_idusuario`)
								WHERE `ventas_virtuales`.`usuarios_idusuario` = '$idvendedor'");
		
		return $query;

	}
}
?>