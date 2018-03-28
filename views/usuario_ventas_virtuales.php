<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>
    <div class="contenPanel">		
	<div class="col-xs-12 titulo">
		<h1>Mis Ventas</h1>
        <small></small>		
		<hr>
        <div class="informacion">	
			<div class="col-xs-12 col-md-5 col-md-offset-7">
				<form class="form-inline" method="post" id="filtros">
					<div class="form-group">
						<label for="inputEmail3" class=" control-label">Campaña</label>						
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
					<div class="form-group">
						<label for="inputEmail3" class="control-label">Estados</label>						
						<select name="estado" class="form-control" onChange="javascript: document.getElementById('filtros').submit();">
							<option value="">TODOS</option>
							<option value="PENDIENTE" <?php if ($estado[0] == "PENDIENTE") echo "selected"; ?>>PENDIENTE</option>
							<option value="APROBADO" <?php if ($estado[0] == "APROBADO") echo "selected"; ?>>APROBADO</option>
							<option value="FACTURADO" <?php if ($estado[0] == "FACTURADO") echo "selected"; ?>>FACTURADO</option>
							<option value="DECLINADO" <?php if ($estado[0] == "DECLINADO") echo "selected"; ?>>DECLINADO</option>
						</select>						
					</div>
				</form>
				<br>
			</div>
            
            
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">FECHA</th>
					<th class="text-center">COMPRADOR</th>					
					<th class="text-center">EMAIL</th>
					<th class="text-center">TELÉFONO</th>
					<th class="text-center">NÚMERO ORDEN</th>
					<th class="text-center">TOTAL PAGADO</th>
					<th class="text-center">ESTADO</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(count($ventas)>0){

					/*$total_subtotal = 0;
					$total_descuento = 0;
					$total_descuento_escala = 0;
					$total_neto = 0;
					$total_iva = 0;
					$total_flete = 0;
					$total_total = 0;
					$total_rentabilidad = 0;
					$rentabilidad_ponderada = 0;*/

					foreach ($ventas as $key => $venta) {

						/*$rentabilidad = $orden["descuentos"] + $orden["desc_escala"];
						$porc_rentabilidad = ($rentabilidad/$orden["subtotal"])*100;*/
				?>
					<tr>
						<td class="text-center"><?=$venta["fecha_pedido"]?></td>
						<td class="text-center"><?=$venta["nombre"].' '.$venta["apellido"]?></td>						
						<td class="text-center"><?=$venta["email"]?></td>					
						<td class="text-center"><?=$venta["telefono_m"]?></td>						
						<td class="text-center"><a href="<?=URL_USUARIO."/".URL_USUARIO_DETALLE_ORDEN."/".$venta['idorden']?>"><?=$venta["num_orden"]?></a></td>
						<td class="text-center"><?=convertir_pesos($orden["total"])?></td>
						<td class="text-center"><?=$venta["estado"]?></td>					
					</tr>
					<?php
						/*$total_subtotal += $orden["subtotal"];
						$total_descuento += $orden["descuentos"];
						$total_descuento_escala += $orden["desc_escala"];
						$total_neto += $orden["neto_sin_iva"];
						$total_iva += $orden["impuestos"];
						$total_flete += $orden["costo_envio"];
						$total_total += $orden["total"];
						$total_rentabilidad += $rentabilidad;*/
					}

						$rentabilidad_ponderada = ($total_rentabilidad/$total_subtotal)*100;
					?>
					<tr>
						<!--<th class="text-right" colspan="3">TOTAL</th>						
						<th class="text-center"><?=convertir_pesos($total_total)?></th>
						<th class="text-center"><?=convertir_pesos($total_subtotal)?></th>
						<th class="text-center"><?=convertir_pesos($total_rentabilidad)?></th>
						<th class="text-center"><?=round($rentabilidad_ponderada)?>%</th>-->
					</tr>
					<?php
				}else{
				?>
				<tr>
					<td colspan="11" class="text-center">Aún no se registran ventas virtuales.</td>
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
