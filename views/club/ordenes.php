<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="container">
	<div class="row">
		<table class="centered highlight responsive-table">
			<thead>
				<tr>
					<th>Fecha Pedido</th>					
					<th>Número de Orden</th>
					<th>Total Pagado</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				<?php

				if (count($ordenes)>0) {

					foreach ($ordenes as $key => $orden) {

				?>
					<tr>
						<td><?=$orden['fecha_pedido']?></td>
						<td><a href="<?=URL_CLUB.'/'.URL_CLUB_ORDENES.'/'.$orden['idorden']?>"><?=$orden['num_orden']?></td>
						<td><?=convertir_pesos($orden['total'])?></td>			
						<td><?=$orden['estado']?></td>						
					</tr>
				<?php
					}
				}else{
				?>
					<tr>
						<td colspan="5">No hay ordenes para mostrar.</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include 'footer.php'; ?>