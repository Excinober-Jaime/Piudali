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

	public function eliminarOrden($idorden){

		$filas_puntos = $this->actualizar("DELETE FROM `puntos` WHERE `ordenes_pedidos_idorden`='$idorden'");
		$filas_productos = $this->actualizar("DELETE FROM `detalle_orden` WHERE `ordenes_pedidos_idorden`='$idorden'");
		$filas_ordenes = $this->actualizar("DELETE FROM `ordenes_pedidos` WHERE `idorden`='$idorden'");

		return $filas_ordenes;
	}

	public function enviarEmailOrden($detalle_orden = array(), $subtotalAntesIva = 0, $descuentoCupon = 0, $porcDescuentoEscala = 0, $descuentoEscala = 0, $totalNetoAntesIva = 0, $retencion = 0, $iva = 0, $pago_puntos = 0, $flete = 0, $total = 0, $codigo_orden = '', $estado = '', $nombre = '', $apellido = '', $email = ''){


		$tabla_orden = '<table cellspacing="10" border="0" width="650px" align="center">
						<thead>
							<tr>
								<th align="center">DESCRIPCIÓN</th>
								<th align="center">PRECIO</th>
								<th align="center">CANTIDAD</th>
								<th align="right">SUBTOTAL</th>
							</tr>
						</thead>
						<tbody>';

		if (count($detalle_orden)>0) {

			foreach ($detalle_orden as $key => $producto) {

				$tabla_orden .= '<tr><td>'.$producto["nombre"].'<br>'.$producto["codigo"].'<br>'.$producto["iva_porc"].'%</td>
						<td>$'.convertir_pesos($producto["precio"]).'</td>
						<td align="center">'.$producto["cantidad"].'</td>
						<td align="right">$'.convertir_pesos($producto["subtotal"]).'</td></tr>';
			}
		}
		
		$tabla_orden .='<tr><td colspan="3" align="right">Subtotal antes de IVA</td>
						<td align="right">$'.convertir_pesos($subtotalAntesIva).'</td></tr>
					<tr><td colspan="3" align="right">Descuento Cupón</td>
						<td align="right">$'.convertir_pesos($descuentoCupon).'</td></tr>
					<tr><td colspan="3" align="right">Subtotal Neto Antes de Iva</td>
						<td align="right">$'.convertir_pesos(($subtotalAntesIva-$descuentoCupon)).'</td></tr>
					<tr><td colspan="3" align="right">Descuento por Escala %</td>
						<td align="right">'.$porcDescuentoEscala.'%</td></tr>
					<tr><td colspan="3" align="right">Descuento por Escala $</td>
						<td align="right">$'.convertir_pesos($descuentoEscala).'</td></tr>
					<tr><td colspan="3" align="right">Total Neto antes de IVA</td>
						<td align="right">$'.convertir_pesos($totalNetoAntesIva).'</td></tr>
					<tr><td colspan="3" align="right">Retención</td>
						<td align="right">$'.convertir_pesos($retencion).'</td></tr>
					<tr><td colspan="3" align="right">IVA</td>
						<td align="right">$'.convertir_pesos($iva).'</td></tr>
					<tr><td colspan="3" align="right">Pago con puntos</td>
						<td align="right">$'.convertir_pesos($pago_puntos).'</td></tr>
					<tr><td colspan="3" align="right">Costo de Envío</td>
						<td align="right">$'.convertir_pesos($flete).'</td></tr>
					<tr><td colspan="3" align="right"><b>TOTAL A PAGAR</b></td>
						<td align="right"><b>$'.convertir_pesos($total).'</b></td></tr>
				</tbody>
			</table>';
		
		$idplantilla=1;
		$plantilla = PlantillasEmail::detalle_plantilla($idplantilla);

		$mensaje = shorcodes_orden_compra($nombre." ".$apellido,$codigo_orden,$plantilla["mensaje"],$tabla_orden,$estado);
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

		// More headers
		$headers .= 'From: Piudali <'.$plantilla["email"].'>'."\r\n";

		$mail = mail($_SESSION["email"], $plantilla["asunto"], $mensaje, $headers);		
	}
}
?>