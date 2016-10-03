<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>			
	<div class="col-xs-12">
		<h1>Puntos <small><small>Gana puntos por tus compras y redímelos en productos o premios</small></small></h1>
		<hr>		
		<div class="col-xs-12 col-md-8">
			<h3 class="text-center">Movimientos</h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th class="text-center">PUNTOS</th>
						<th class="text-center">CONCEPTO</th>					
						<th class="text-center">FECHA ADQUIRIDOS</th>
						<th class="text-center">FECHA EXPIRACIÓN</th>
						<th class="text-center">REDIMIDOS</th>					
						<th class="text-center">DISPONIBLES</th>					
					</tr>
				</thead>
				<tbody>
					<?php 
					if (count($puntos)>0) {
						foreach ($puntos as $key => $punto) {
					?>
							<tr>
								<td class="text-center"><?=$punto["puntos"]?></td>
								<td class="text-center"><?=$punto["concepto"]?></td>
								<td class="text-center"><?=$punto["fecha_adquirido"]?></td>
								<td class="text-center"><?=$punto["fecha_redimido"]?></td>
								<td class="text-center"><?=$punto["redimido"]?></td>
								<td class="text-center"><?=$punto["disponibles"]?></td>
							</tr>
					<?php
						}
					}else{
					?>
						<tr>
							<td colspan="10" class="text-center">No hay movimientos para mostrar.</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<div class="col-xs-12 col-md-4">
			<h3 class="text-center">Resumen</h3>
			<ul class="list-group">
			  <li class="list-group-item">
			    <span class="badge"><?=$total_puntos?></span>
			    TOTAL PUNTOS:
			  </li>
			  <li class="list-group-item">
			    <span class="badge"><?=$total_redimidos?></span>
			    TOTAL REDIMIDOS:
			  </li>
			  <li class="list-group-item">
			    <span class="badge" style="background-color:#ef7a00;"><?=$total_disponibles?></span>
			    TOTAL DISPONIBLES:
			  </li>
			</ul>
		</div>
	</div>	
</div>
<br>
<br>
<?php include "footer.php"; ?>
