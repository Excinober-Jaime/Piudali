<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>		
	<div class="col-xs-12">
		<h1>Mi Negocio <small><small>Aquí podrás monitorear las compras netas de tus distribuidores.</small></small></h1>
		<hr>
		<div class="row">
			<div class="hidden-xs hidden-sm col-md-7"></div>
			<div class="col-xs-12 col-md-5">
				<form class="form-horizontal" method="post" id="campana">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Campaña</label>
						<div class="col-sm-10">
							<select name="idcampana" class="form-control" onChange="javascript: document.getElementById('campana').submit();">
								<option value="">-Seleccione-</option>
									<?php 
									if (count($campanas)>0) {

										$anos_filtro = array();

										foreach ($campanas as $key => $campana) {											

											$ano = explode("-", $campana["fecha_ini"]);
											$ano = $ano[0];

											if (!in_array($ano, $anos_filtro)) {
												$anos_filtro[] = $ano;	
											}
									?>
											<option value="<?=$campana["idcampana"]?>" <?php if ($campana["idcampana"] == $campana_seleccionada["idcampana"]) { echo "selected"; }?>><?=$campana["nombre"]?></option>
									<?php
										}									
									}else{
										?>
										<option value="">No hay campañas disponibles</option>
									<?php
									}

									foreach ($anos_filtro as $key => $ano) {
										?>
											<option value="ano<?=$ano?>" <?php if ($_POST["idcampana"]=="ano".$ano) { echo "selected"; } ?>>Año <?=$ano?></option>
										<?php
									}
									?>								
							</select>
						</div>
					</div>
				<form>
			</div>			
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">DISTRIBUIDOR</th>
					<th class="text-center">CIUDAD</th>										
					<th class="text-center">NETO FACTURADO</th>					
				</tr>
			</thead>
			<tbody>
				<?php
				if(count($distribuidores)>0){					

					$porcentaje_comision = 5;
					$total_compras_netas = 0;

					foreach ($distribuidores as $key => $distribuidor) {
				?>
					<tr>
						<td class="text-center"><?=$distribuidor["nombre"]?></td>
						<td class="text-center"><?=$distribuidor["ciudad"]?></td>
						<td class="text-center">$<?=number_format($distribuidor["compras_netas"])?></td>						
					</tr>
					<?php

						$total_compras_netas += $distribuidor["compras_netas"];

					}
					?>
					<tr>
						<th class="text-right" colspan="2">TOTAL COMPRAS NETAS</th>
						<th class="text-center">$<?=number_format($total_compras_netas)?></th>						
					</tr>
					<tr>
						<th class="text-right" colspan="2">PORCENTAJE COMISIÓN</th>
						<th class="text-center"><?=$porcentaje_comision?>%</th>						
					</tr>
					<tr>
						<th class="text-right" colspan="2">TOTAL COMISIÓN</th>
						<th class="text-center">$<?=number_format($total_compras_netas*($porcentaje_comision/100))?></th>
					</tr>
					<?php
				}else{
				?>
				<tr>
					<td colspan="3" class="text-center">Aún no se registran movimientos.</td>
				</tr>
				<?php
				}
				?>				
			</tbody>
		</table>
	</div>	
</div>
<br>
<br>
<?php include "footer.php"; ?>
