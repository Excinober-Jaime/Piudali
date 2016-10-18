<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>	
    <div class="contenPanel">
	<div class="col-xs-12 titulo">
		<h1>Mi Negocio</h1>
        <small>Aquí podrás monitorear las compras netas de tus distribuidores.</small>
    </div>
    <div class="clearfix"></div>
		<div class="informacion">
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
						<td class="text-right" colspan="2"><strong>TOTAL COMPRAS NETAS</strong></td>
						<td class="text-center"><strong>$<?=number_format($total_compras_netas)?></strong></td>						
			  </tr>
					<tr>
						<td class="text-right" colspan="2"><strong>PORCENTAJE COMISIÓN</strong></td>
						<td class="text-center"><strong><?=$porcentaje_comision?>%</strong></td>						
					</tr>
					<tr>
						<td class="text-right" colspan="2"><strong>TOTAL COMISIÓN</strong></td>
						<td class="text-center"><strong>$<?=number_format($total_compras_netas*($porcentaje_comision/100))?></strong></td>
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
 </div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
