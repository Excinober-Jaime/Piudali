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
			<div class="col-xs-12 col-md-5 col-md-offset-7">
				<form class="form-inline" method="post" id="filtros">
					<div class="form-group">
						<label for="inputEmail3">Campaña</label>
						
						<select name="idcampana" class="form-control" onChange="javascript: document.getElementById('filtros').submit();">
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
					<div class="form-group">
						<label for="inputEmail3" class="control-label">Estados</label>
						<select name="estado" class="form-control" onChange="javascript: document.getElementById('filtros').submit();">
							<option value="">--Seleccione--</option>
							<option value="PENDIENTE" <?php if ($estado_compras == "PENDIENTE") echo "selected"; ?>>PENDIENTE</option>
							<option value="APROBADO" <?php if ($estado_compras == "APROBADO") echo "selected"; ?>>APROBADO</option>
							<option value="FACTURADO" <?php if ($estado_compras == "FACTURADO") echo "selected"; ?>>FACTURADO</option>
							<option value="DECLINADO" <?php if ($estado_compras == "DECLINADO") echo "selected"; ?>>DECLINADO</option>
						</select>
					</div>
				</form>
				<br>
			</div>			
			<table class="table table-striped">
				<thead>
					<tr>
						<th>NIVEL</th>
						<th class="text-center">NETO</th>
						<th class="text-center">COMISIÓN %</th>
						<th class="text-center">COMISIÓN $</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$neto_total = 0;
					$comision_total = 0;

					foreach ($niveles as $key => $nivel) {						

						$comision_nivel = $nivel["neto"] * ($porc_niveles[$key]/100);
						$neto_total += $nivel["neto"];
						$comision_total += $comision_nivel;
					?>
					<tr>
						<td><a class="mostrar-nivel" nivel="<?=$key?>">NIVEL <?=$key+1?></a></td>
						<td class="text-center"><?=convertir_pesos($nivel["neto"])?></td>
						<td class="text-center"><?=$porc_niveles[$key]?>%</td>
						<td class="text-center"><?=convertir_pesos($comision_nivel)?></td>
					</tr>
					<tr>
						<td colspan="4">
							<table class="table table-striped distribuidores-nivel<?=$key?>" style="display: none;">
								<thead>
									<tr>
										<th class="text-center">DISTRIBUIDOR</th>
										<th class="text-center">CIUDAD</th>										
										<th class="text-center">NETO</th>					
									</tr>
								</thead>
								<tbody>
									<?php
									if(count($nivel["distribuidores"])>0){
										
										$total_neto_nivel = 0;

										foreach ($nivel["distribuidores"] as $distribuidor) {

									?>
										<tr>
											<td class="text-center"><a class="mostrar-ordenes-distribuidor" iddistribuidor="<?=$distribuidor["idusuario"]?>"><?=$distribuidor["nombre"]?></a><br>
											
												<table class="table ordenes-distribuidor-<?=$distribuidor["idusuario"]?>" style="display: none;">
													<thead>
														<tr>										
															<th class="text-center">Número de Orden</th>
															<th class="text-center">Neto</th>
															<th class="text-center">Estado</th>
														</tr>	
													</thead>
													<tbody>
													<?php
													if (count($distribuidor["ordenes"])>0) {
														foreach ($distribuidor["ordenes"] as $orden) {
															?>
															<tr>
																<td class="text-center"><a href="<?=URL_USUARIO."/".URL_USUARIO_DETALLE_ORDEN."/".$orden["idorden"]?>"><?=$orden["num_orden"]?></a></td>
																<td class="text-center"><?=convertir_pesos($orden["neto_sin_iva"])?></td>
																<td class="text-center"><?=$orden["estado"]?></td>
															</tr>
															<?php
														}
													}else{
													?>
														<tr>
															<td>Aún no se registran ordenes.</td>
														</tr>
													<?php
													}
													?>
													</tbody>
												</table>												
											</td>
											<td class="text-center"><?=$distribuidor["ciudad"]?></td>
											<td class="text-center">$<?=number_format($distribuidor["compras_netas"])?></td>						
										</tr>
										<?php

											$total_neto_nivel += $distribuidor["compras_netas"];

										}
										?>
										<tr>
											<td class="text-right" colspan="2"><strong>COMPRAS NETAS NIVEL <?=$key+1?></strong></td>
											<td class="text-center"><strong>$<?=number_format($total_neto_nivel)?></strong></td>						
								  </tr>
										<tr>
											<td class="text-right" colspan="2"><strong>PORCENTAJE COMISIÓN</strong></td>
											<td class="text-center"><strong><?=$porc_niveles[$key]?>%</strong></td>						
										</tr>
										<tr>
											<td class="text-right" colspan="2"><strong>TOTAL COMISIÓN NIVEL <?=$key+1?></strong></td>
											<td class="text-center"><strong>$<?=number_format($total_neto_nivel*($porc_niveles[$key]/100))?></strong></td>
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
						</td>
					</tr>
					<?php } ?>
					<tr>
						<td>TOTAL</td>
						<td class="text-center"><?=convertir_pesos($neto_total)?></td>
						<td></td>
						<td class="text-center"><?=convertir_pesos($comision_total)?></td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>		
 </div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
