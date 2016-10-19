<?php
/**
* 
*/
class Ordenes extends Database
{
	
	public function unidadesVendidas($fecha_inicio, $fecha_fin, $estado_ordenes, $cod_producto=0){

		if (!empty($cod_producto)) {
			
			$where_producto = "AND `detalle_orden`.`cod_producto`='$cod_producto'";
		}else{
			$where_producto = "";
		}

		$query = $this->consulta("SELECT SUM(`detalle_orden`.`cantidad`) as 'cantidad' 
									FROM `ordenes_pedidos` 
									INNER JOIN `detalle_orden` ON (`ordenes_pedidos`.`idorden`=`detalle_orden`.`ordenes_pedidos_idorden`) 
									WHERE `ordenes_pedidos`.`estado`='$estado_ordenes' $where_producto AND `ordenes_pedidos`.`fecha_pedido` BETWEEN '$fecha_inicio' AND '$fecha_fin'");
		return $query[0];
	}
}
?>