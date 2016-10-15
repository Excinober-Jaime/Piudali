<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>
    <div class="contenPanel">		
	<div class="col-xs-12 titulo">
		<h1>Mis Compras</h1>
        <small>Aquí podrás ver el estado de tu negocio como comercializador, monitorear el estado de tus pedidos y rentabilidad.</small>		
		<hr>
        	<div class="informacion">	
			<div class="col-xs-12 col-md-5 col-md-offset-7">
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
											<option value="<?=$campana["idcampana"]?>" <?php if ($campana["idcampana"] == $campana_seleccionada["idcampana"]) { echo "selected"; }  ?>><?=$campana["nombre"]?></option>
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
				</form>
			</div>
            
            
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">FECHA</th>
					<th class="text-center">ESTADO</th>
					<th class="text-center">ORDEN DE PEDIDO</th>					
					<!--<th class="text-center">SUBTOTAL ANTES DE IVA</th>
					<th class="text-center">DESCUENTOS CUPÓN</th>
					<th class="text-center">DESCUENTOS ESCALA %</th>
					<th class="text-center">DESCUENTOS ESCALA $</th>
					<th class="text-center">TOTAL NETO ANTES DE IVA</th>
					<th class="text-center">IVA</th>
					<th class="text-center">FLETE</th>-->
					<th class="text-center">TOTAL</th>
					<th class="text-center">RENTABILIDAD</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(count($ordenes)>0){

					$total_subtotal = 0;
					$total_descuento = 0;
					$total_descuento_escala = 0;
					$total_neto = 0;
					$total_iva = 0;
					$total_flete = 0;
					$total_total = 0;
					$total_rentabilidad = 0;

					foreach ($ordenes as $key => $orden) {

						$rentabilidad = $orden["descuentos"] + $orden["desc_escala"];						
				?>
					<tr>
						<td class="text-center"><?=$orden["fecha_pedido"]?></td>
						<td class="text-center"><?=$orden["estado"]?></td>
						<td class="text-center"><a href="<?=URL_USUARIO."/".URL_USUARIO_DETALLE_ORDEN."/".$orden['idorden']?>"><?=$orden["num_orden"]?></a></td>						
						<td class="text-center"><?=convertir_pesos($orden["total"])?></td>
						<td class="text-center"><?=convertir_pesos($rentabilidad)?></td>
					</tr>
					<?php
						$total_subtotal += $orden["subtotal"];
						$total_descuento += $orden["descuentos"];
						$total_descuento_escala += $orden["desc_escala"];
						$total_neto += $orden["neto_sin_iva"];
						$total_iva += $orden["impuestos"];
						$total_flete += $orden["costo_envio"];
						$total_total += $orden["total"];
						$total_rentabilidad += $rentabilidad;
					}
					?>
					<tr>
						<th class="text-right" colspan="3">TOTAL</th>						
						<th class="text-center"><?=convertir_pesos($total_total)?></th>
						<th class="text-center"><?=convertir_pesos($total_rentabilidad)?></th>
					</tr>
					<?php
				}else{
				?>
				<tr>
					<td colspan="11" class="text-center">Aún no se registran movimientos.</td>
				</tr>
				<?php
				}
				?>				
			</tbody>
		</table>
        </div>
        <div class="clearfix"></div>
	</div>
    </div>
    </div>		
<br>
<br>
<?php include "footer.php"; ?>
