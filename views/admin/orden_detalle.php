<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="col-xs-12 col-md-6">
				<div class="well well-sm"><b>Subtotal Antes de Iva:</b> $<?=number_format($orden["detalle"]["subtotal"])?></div>
				<div class="well well-sm"><b>Descuentos Cupón:</b> $<?=number_format($orden["detalle"]["descuentos"])?></div>
				<div class="well well-sm"><b>Descuento Escala %:</b> <?=$orden["detalle"]["porc_escala"]?>%</div>
				<div class="well well-sm"><b>Descuento Escala $:</b> $<?=number_format($orden["detalle"]["desc_escala"])?></div>
				<div class="well well-sm"><b>Total Neto Antes de Iva:</b> $<?=number_format($orden["detalle"]["neto_sin_iva"])?></div>
				<div class="well well-sm"><b>Iva:</b> $<?=number_format($orden["detalle"]["impuestos"])?></div>
				<div class="well well-sm"><b>Flete:</b> $<?=number_format($orden["detalle"]["costo_envio"])?></div>			
				<div class="well well-sm"><b>Total:</b> $<?=number_format($orden["detalle"]["total"])?></div>			
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="well well-sm"><b>Número de Orden:</b> <?=$orden["detalle"]["num_orden"]?></div>
				<div class="well well-sm"><b>Fecha:</b> <?=$orden["detalle"]["fecha_pedido"]?></div>
				<form method="post">
				<div class="well well-sm"><b>Estado:</b> 
					<select name="estado" class="input-sm">
					<?php 
						foreach ($estados as $key => $estado) {
							?>
							<option value="<?=$estado?>" <?php if($estado == $orden["detalle"]["estado"]) echo "selected"; ?>><?=$estado?></option>
							<?php
						}
					?>	
					</select>
				</div>
				<div class="well well-sm"><b>Número de Factura:</b>
					<input type="text" name="num_factura" class="form-control input-sm" value="<?=$orden["detalle"]["num_factura"]?>">
				</div>
				<button type="submit" name="actualizar_orden" class="btn btn-primary center-block">ACTUALIZAR</button>
				</form>
			</div>
			<div class="col-xs-12">
				<h2>Productos</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-center">DESCRIPCIÓN</th>
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
								<td class="text-center"><?=$producto["precio"]?></td>						
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>	
		</div>
	</div>
</div>
<?php include "footer.php"; ?>