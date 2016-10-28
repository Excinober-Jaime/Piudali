<?php
/**
* 
*/
class Ordenes extends Database
{
	
	public function unidadesVendidas($fecha_inicio, $fecha_fin, $estado_orden, $cod_producto=0){

		if (!empty($cod_producto)) {
			
			$where_producto = "AND `detalle_orden`.`cod_producto`='$cod_producto'";
		}else{
			$where_producto = "";
		}

		$query = $this->consulta("SELECT SUM(`detalle_orden`.`cantidad`) as 'cantidad' 
									FROM `ordenes_pedidos` 
									INNER JOIN `detalle_orden` ON (`ordenes_pedidos`.`idorden`=`detalle_orden`.`ordenes_pedidos_idorden`) 
									WHERE `ordenes_pedidos`.`estado`='$estado_orden' $where_producto AND `ordenes_pedidos`.`fecha_pedido` BETWEEN '$fecha_inicio' AND '$fecha_fin'");
		return $query[0];
	}

	public function listarDetalleOrden($cod_productos, $estado_orden){

		if (count($cod_productos)>0) {

			$where_productos = "AND (";

			$count = 0;

			foreach ($cod_productos as $cod_producto) {
				if ($count>0) {
					$where_productos .= " OR ";
				}

				$where_productos .= "`detalle_orden`.`cod_producto`= '$cod_producto'";
				$count++;
			}

			$where_productos .= ")";

		}else{

			$where_productos = "";
		}

		$query = $this->consulta("SELECT `iddetalle_orden`, `nombre_producto`, `cod_producto`, `cantidad`, `precio`, `precio_base`, `descuento_cupon`, `iva`, `descuento_puntos`, `ordenes_pedidos_idorden` 
									FROM `detalle_orden` 
									INNER JOIN `ordenes_pedidos` ON (`ordenes_pedidos`.`idorden`=`detalle_orden`.`ordenes_pedidos_idorden`)
									WHERE `ordenes_pedidos`.`estado`='$estado_orden' $where_productos");

		return $query;
	}
}
?>