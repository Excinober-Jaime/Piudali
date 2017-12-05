<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="container">
	<div class="row">
		<table class="centered highlight responsive-table">
			<thead>
				<tr>
					<th>Fecha Adquiridos</th>
					<th>Concepto</th>
					<th>Puntos</th>
					<th>Redimidos</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				<?php

				if (count($puntos_banco)>0) {

					foreach ($puntos_banco as $key => $punto) {

				?>
					<tr>
						<td><?=$punto['fecha_adquirido']?></td>
						<td><?=$punto['concepto']?></td>
						<td><?=number_format($punto['puntos'])?></td>
						<td><?=number_format($punto['redimido'])?></td>
						<td><?php if($punto['estado']) echo 'ACTIVOS'; else echo 'INACTIVOS'; ?></td>
					</tr>
				<?php
					}
				}else{
				?>
					<tr>
						<td colspan="5">Aún no has registrado códigos con puntos</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include 'footer.php'; ?>