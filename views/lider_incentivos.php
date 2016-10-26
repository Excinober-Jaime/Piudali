<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>
    <div class="contenPanel">		
	<div class="col-xs-12 titulo">
	<h1>Incentivos</h1>
    <small>Aquí encontrarás los incentivos que puedes ganar y cuanto te falta para alcanzarlos.</small>
    </div>
	<div class="clearfix"></div>
    <div class="informacion">
    <div class="col-xs-12 col-md-8">
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">INCENTIVO</th>
					<th class="text-center">DESDE</th>					
					<th class="text-center">HASTA</th>
					<th class="text-center">META</th>
					<!--<th class="text-center">TOTAL NETO</th>
					<th class="text-center">% DE CUMPLIMIENTO</th>					-->
					<th class="text-center">NETO TOTAL</th>
					<th class="text-center">CUMPLIMIENTO</th>
				</tr>
			</thead>
			<tbody>
				<?php /*
				if (count($incentivos)>0) {
					foreach ($incentivos as $key => $incentivo) {
				?>
						<tr>
							<td class="text-center"><?=$incentivo["incentivo"]?></td>
							<td class="text-center"><?=$incentivo["inicio"]?></td>
							<td class="text-center"><?=$incentivo["fin"]?></td>
							<td class="text-center">$<?=number_format($incentivo["meta"])?></td>
							<td class="text-center">$<?=number_format($incentivo["compras_netas"])?></td>
							<td class="text-center"><?=round($incentivo["cumplimiento"])?>%</td>
						</tr>
				<?php
					}				
				}else{
				?>
					<tr>
						<td colspan="10" class="text-center">No hay incentivos actualmente.</td>
					</tr>
				<?php
				}*/
				?>
				<tr>
					<td class="text-center">BONO MENSUAL</td>
					<td class="text-center">2016-10-01</td>
					<td class="text-center">2016-10-31</td>
					<td class="text-center">Escala Bono Mensual</td>
					<td class="text-center">$12.000.000</td>
					<td class="text-center">$500.000</td>					
				</tr>
				<tr>
					<td class="text-center">BONO TRIMESTRAL</td>
					<td class="text-center">2016-10-01</td>
					<td class="text-center">2016-12-31</td>
					<td class="text-center">$90.000.000</td>
					<td class="text-center">$12.000.000</td>
					<td class="text-center">13%</td>
				</tr>				
			</tbody>
		</table>
        </div>
        <div class="col-xs-12 col-md-4">
        	<ul class="list-group">
	        	<li class="list-group-item text-center" style="background-color: #dff0d8;color: #006837;">ESCALAS BONO MENSUAL</li>
			  <li class="list-group-item">
			    <span class="badge">No aplica</span>
			    $0 - $10.000.000
			  </li>
			  <li class="list-group-item active" style="background-color:#006837;">
			    <span class="badge">$500.000</span>
			    $10.000.001 - $30.000.000
			  </li>
			  <li class="list-group-item">
			    <span class="badge">$800.000</span>
			    $30.000.001 - $60.000.000
			  </li>
			  <li class="list-group-item">
			    <span class="badge">$1.200.000</span>
			    Mayor a $60.0000.000
			  </li>
			</ul>
        </div>
        <div class="clearfix"></div>
        </div>
	</div>
    </div>	
</div>
<br>
<br>
<?php include "footer.php"; ?>
