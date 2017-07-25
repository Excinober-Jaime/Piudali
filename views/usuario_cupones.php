<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>
    <div class="contenPanel">		
	<div class="col-xs-12 titulo">
	<h1>Cupones</h1>
    <small>Aquí encontrarás los cupones de descuento disponibles para ti. Aprovechalos!.</small>
		
    <div class="informacion">
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">NOMBRE</th>
					<th class="text-center">VALOR DE DESCUENTO</th>					
					<th class="text-center">CÓDIGO CUPÓN</th>
					<th class="text-center">MONTO MÍNIMO</th>
					<th class="text-center">FECHA EXPIRACIÓN</th>					
				</tr>
			</thead>
			<tbody>
				<?php 
				if (count($cupones)>0) {
					foreach ($cupones as $key => $cupon) {
				?>
						<tr>
							<td class="text-center"><?=$cupon["titulo"]?></td>
							<td class="text-center">
								<?php if ($cupon["aplicacion"]) {
									echo convertir_pesos($cupon["val_descuento"]);
								}else{
									echo $cupon["val_descuento"]."%";
								} 
								?>
							</td>
							<td class="text-center"><?=$cupon["num_codigo_desc"]?></td>
							<td class="text-center">$<?=number_format($cupon["monto_minimo"])?></td>
							<td class="text-center"><?=$cupon["fecha_expiracion"]?></td>
						</tr>
				<?php
					}
				}else{
				?>
					<tr>
						<td colspan="10" class="text-center">No hay cupones actualmente.</td>
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
<br>
<br>
<?php include "footer.php"; ?>
