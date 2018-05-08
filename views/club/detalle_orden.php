<?php include 'header.php'; ?>

<div class="container">

	<div class="row" style="margin-top: 20px;">		
		<div class="col s12 l4">
			<p><b>LINK GRUPO MARKETING SAS</b><br>
			900218947-1<br><br>
			Cali, Colombia<br>
			(+57)(2) 524 1887 - (+57) 311 627 9068<br>
			contacto@piudali.com.co</p>
			<p class="text-left"><b>ESTADO:</b><br><?=$orden["detalle"]["estado"]?></p>
			<p class="text-left"><b>NÚMERO DE GUÍA:</b><br><?=$orden["detalle"]["guia_flete"]?></p>
		</div>
		<div class="col s12 l4">
			<p><b>DIRECCIÓN DE ENVÍO</b></p>
			<p class="text-left">
				<?=$orden["detalle"]["nombre"].' '.$orden["detalle"]["apellido"]?><br>
    			<?=$orden["detalle"]["direccion"]?><br>
                <?=$orden["detalle"]["ciudad"]?><br>
                <?=$orden["detalle"]["telefono"]?><br>
                <?=$orden["detalle"]["telefono_m"]?><br>
                <?=$orden["detalle"]["email"]?><br>
            </p>			
		</div>
		<div class="col s12 l4">
			<p class="text-right"><b>ORDEN No. </b><br><?=$orden["detalle"]["num_orden"]?></p>
			<p class="text-right"><b>MODALIDAD</b><br><?=$orden["detalle"]["modalidad"]?></p>			
			<p class="text-right">FECHA PEDIDO: <?=$orden["detalle"]["fecha_pedido"]?></p>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
		<div class="divider"></div>
			<table class="centered highlight responsive-table">
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
						<th colspan="2" class="right-align">Subtotal Antes de Iva:</th>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["subtotal"])?></td>
					</tr>
					<tr>
						<th colspan="2" class="right-align">Descuentos Cupón:</th>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["descuentos"])?></td>
					</tr>					
					<tr>
						<th colspan="2" class="right-align">Iva:</th>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["impuestos"])?></td>
					</tr>
					<tr>
						<th colspan="2" class="right-align">Flete:</th>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["costo_envio"])?></td>
					</tr>
					<tr>
						<th colspan="2" class="right-align">Total:</th>
						<td class="text-center"><?=convertir_pesos($orden["detalle"]["total"])?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>