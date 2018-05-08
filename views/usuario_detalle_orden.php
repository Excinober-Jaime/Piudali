<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>			
	<div class="row">
		<div class="col-xs-12">
			<h1>Detalle Orden <small><small></small></small></h1>
		<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-4">
			<p><b>LINK GRUPO MARKETING SAS</b><br>
			900218947-1<br><br>
			Cali, Colombia<br>
			(+57)(2) 524 1887 - (+57) 311 627 9068<br>
			contacto@piudali.com.co</p>
			<p class="text-left"><b>ESTADO:</b><br><?=$orden["detalle"]["estado"]?></p>
			<p class="text-left"><b>NÚMERO DE GUÍA:</b><br><?=$orden["detalle"]["guia_flete"]?></p>
		</div>		
		<div class="col-xs-12 col-md-4">
			<strong>DIRECCIÓN DE ENVÍO</strong>
			<?php if (isset($direccion_orden) && count($direccion_orden)>0) { ?>
				<p class="text-left">
					<?=$direccion_orden['nombre']?><br>
        			<?=$direccion_orden['direccion']?><br>
        			<?=$direccion_orden['ciudad']?><br>
        			<?=$direccion_orden['telefono']?><br>
        			<?=$direccion_orden['telefono_m']?><br>
        			<?=$direccion_orden['email']?>					
				</p>
			<?php }else{ ?>
				<p class="text-left">
					<?=$orden["detalle"]["nombre"].' '.$orden["detalle"]["apellido"]?><br>
        			<?=$orden["detalle"]["direccion"]?><br>
                    <?=$orden["detalle"]["ciudad"]?><br>
                    <?=$orden["detalle"]["telefono"]?><br>
                    <?=$orden["detalle"]["telefono_m"]?><br>
                    <?=$orden["detalle"]["email"]?><br>
                </p>
			<?php } ?>

			<strong>DIRECCIÓN DE FACTURACIÓN</strong>
			<p class="text-left">
				<?=$orden["detalle"]["nombre"]." ".$orden["detalle"]["apellido"]?><br>
	            CC. <?=$orden["detalle"]["num_identificacion"]?><br>                                       
	            <?=$orden["detalle"]["direccion"]?><br>
	            <?=$orden["detalle"]["ciudad"]?><br>
	            <?=$orden["detalle"]["telefono"]?><br>
	            <?=$orden["detalle"]["telefono_m"]?>
	        </p>
		</div>
		<div class="col-xs-12 col-md-4">
			<p class="text-right"><b>ORDEN No. </b><br><?=$orden["detalle"]["num_orden"]?></p>
			<p class="text-right"><b>MODALIDAD</b><br><?=$orden["detalle"]["modalidad"]?></p>			
			<p class="text-right">FECHA PEDIDO: <?=$orden["detalle"]["fecha_pedido"]?></p>
		</div>
		<div class="col-xs-12">
		<hr>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>DESCRIPCIÓN</th>
						<th class="text-center">CANTIDAD</th>
						<th class="text-center">PRECIO</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($orden["productos"] as $key => $producto) {
					?>
						<tr>
							<td><?=$producto["cod_producto"]." - ".$producto["nombre_producto"]?></td>
							<td class="text-center"><?=$producto["cantidad"]?></td>
							<td class="text-center"><?=convertir_pesos($producto["precio"])?></td>
						</tr>
					<?php
					}
					?>					
					<tr>
						<td colspan="2" class="text-right">Subtotal Antes de Iva:</td>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["subtotal"])?></td>
					</tr>
					<tr>
						<td colspan="2" class="text-right">Descuentos Cupón:</td>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["descuentos"])?></td>
					</tr>
					<tr>
						<td colspan="2" class="text-right">Descuento Escala %:</td>
						<td class="text-center"><?=$orden["detalle"]["porc_escala"]?>%</td>
					</tr>
					<tr>
						<td colspan="2" class="text-right">Descuento Escala $:</td>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["desc_escala"])?></td>
					</tr>
					<tr>
						<td colspan="2" class="text-right">Total Neto Antes de Iva:</td>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["neto_sin_iva"])?></td>
					</tr>
					<tr>
						<td colspan="2" class="text-right">Subtotal Premios:</td>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["subtotal_premios"])?></td>
					</tr>
					<tr>
						<td colspan="2" class="text-right">Retención:</td>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["retencion"])?></td>
					</tr>
					<tr>
						<td colspan="2" class="text-right">Iva:</td>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["impuestos"])?></td>
					</tr>
					<tr>
						<td colspan="2" class="text-right">Flete:</td>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["costo_envio"])?></td>
					</tr>
					<tr>
						<th colspan="2" class="text-right">Total:</th>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["total"])?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
