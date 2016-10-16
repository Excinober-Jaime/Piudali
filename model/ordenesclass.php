<?php
/**
* 
*/
class Ordenes extends Database
{
	
	public function unidadesVendidas($fecha_inicio, $fecha_fin, $estado_ordenes){

		$query = $this->consulta("SELECT SUM(`detalle_orden`.`cantidad`) as 'cantidad' FROM `ordenes_pedidos` INNER JOIN `detalle_orden` ON (`ordenes_pedidos`.`idorden`=`detalle_orden`.`ordenes_pedidos_idorden`) WHERE `ordenes_pedidos`.`estado`='$estado_ordenes' AND `ordenes_pedidos`.`fecha_pedido` BETWEEN '$fecha_inicio' AND '$fecha_fin'");
		return $query[0];
	}
}
?>