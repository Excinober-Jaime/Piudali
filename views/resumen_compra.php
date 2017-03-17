<?php include "header.php"; ?>

<div class="container">
	<div class="row">
	<div class="col-xs-12">
		<?php
		if (isset($alerta) && !empty($alerta)) {
		?>
		<div class="alert alert-warning" role="alert"><?=$alerta?></div>
		<?php
		}
		?>	
		<table class="table table-striped">
				<thead>
					<th colspan="2" class="text-center">DESCRIPCIÓN</th>
					<th class="text-center">PRECIO</th>
					<th class="text-center">CANTIDAD</th>
					<th class="text-center">SUBTOTAL</th>
				</thead>
				<tbody>
					<?php
					if (isset($itemsCarrito) && count($itemsCarrito)>0) {
					
						foreach ($itemsCarrito["id"] as $key => $iditem) {
					?>
						<tr>
							<td width="12%"><img src="<?=$itemsCarrito["img_principal"][$key]?>" class="img-responsive" style="max-width:100px;"></td>
							<td class="text-left"><?=$itemsCarrito["nombre"][$key]?><br>Código: <?=$itemsCarrito["codigo"][$key]?><br>Iva: <?=$itemsCarrito["iva"][$key]?>%</td>
							<td class="text-center">$<?=number_format($itemsCarrito["precio"][$key])?></td>
							<td class="text-center"><?=$itemsCarrito["cantidad"][$key]?></td>
							<td class="text-center">$<?=number_format($itemsCarrito["subtotal"][$key])?></td>
						</tr>
					<?php
						}
					}else{
					?>
						<tr>
							<td colspan="4">No tienes productos en el carrito!</td>
						</tr>
					<?php
					}
					?>
				</tbody>
		</table>
	 </div>
	</div>
	<hr>
	<div class="row">
	 <div class="col-xs-12 col-md-7">
	 	<h2>Dirección de envío</h2>
	 	<p> Dirección: <?=$_SESSION["direccion"]?><br>
	 		Ciudad: <?=$_SESSION["ciudad"]?><br>
	 		Teléfono: <?=$_SESSION["telefono"]?><br>
	 		Teléfono Móvil: <?=$_SESSION["telefono_m"]?><br>
	 	</p>
	 	<a href="<?=URL_USUARIO."/".URL_USUARIO_CAMBIAR_DATOS?>" class="btn btn-sm btn-primary">Cambiar Datos</a>
	 </div>
	 <div class="col-xs-12 col-md-5">	 	
	 	<div class="col-xs-8 text-right">Subtotal antes de IVA</div><div class="col-xs-4 text-right">$<?=number_format($subtotalAntesIva)?></div>	 	
	 	<div class="col-xs-8 text-right">Descuento Cupón</div><div class="col-xs-4 text-right">$<?=number_format($descuentoCupon)?></div>
	 	<div class="col-xs-8 text-right">Subtotal Neto Antes de Iva</div><div class="col-xs-4 text-right">$<?=number_format($subtotalNetoAntesIva)?></div>
	 	<div class="col-xs-8 text-right">Descuento por Escala %</div><div class="col-xs-4 text-right"><?=$porcDescuentoEscala?>%</div>
	 	<div class="col-xs-8 text-right">Descuento por Escala $</div><div class="col-xs-4 text-right">$<?=number_format($descuentoEscala)?></div>
	 	<div class="col-xs-8 text-right">Total Neto antes de IVA</div><div class="col-xs-4 text-right">$<?=number_format($totalNetoAntesIva)?></div>
	 	<div class="col-xs-8 text-right">Subtotal Premios</div><div class="col-xs-4 text-right">$<?=number_format($subtotalAntesIvaPremios)?></div>
	 	<div class="col-xs-8 text-right">Retención</div><div class="col-xs-4 text-right">$<?=number_format($retencion)?></div>
	 	<div class="col-xs-8 text-right">IVA</div><div class="col-xs-4 text-right">$<?=number_format($iva)?></div>
	 	<?php if (isset($_SESSION["usar_puntos"]) && $_SESSION["usar_puntos"]==true) { ?>
	 		
	 		<div class="col-xs-12"><br></div>
		 	<div class="col-xs-8 text-right">Pago con puntos:</div>
		 	<div class="col-xs-4 text-right">$<?=number_format($pagoPuntos["valor_pago"])?></div>	 	
		 	<div class="col-xs-12"><br></div>

	 	<?php }?>
	 	<div class="col-xs-8 text-right">Costo de Envío</div><div class="col-xs-4 text-right">$<?=number_format($flete)?></div>
	 	<div class="col-xs-8 text-right"><b>TOTAL A PAGAR</b></div><div class="col-xs-4 text-right"><b>$<?=number_format($total)?></b></div>
	 	<div class="col-xs-12"><br><div class="well well-sm text-center">TU RENTABILIDAD ES DE: $<?=number_format($rentabilidad)?></div></div>
	 </div>
	 <div class="col-xs-12 text-right">
	 	<?php 
	 	if ($total>0) {
	 		if (isset($campana_actual["monto_minimo"]) && $campana_actual["monto_minimo"]<=$subtotalAntesIva) {
	 	?>
	 		<a href="<?=URL_GENERAR_ORDEN?>" class="btn btn-lg btn-default">FINALIZAR COMPRA</a>
	 	<?php
	 		}	
	 	}
	 	?>
	 	
	 </div>
	 <div class="col-xs-12">
	 	<img src="assets/img/medios-de-pago.png" class="img-responsive">
	 </div>
	</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>