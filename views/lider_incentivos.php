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
			</form>
			<br>
		</div>
    <div class="col-xs-12 col-md-9">
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
				<?php 
				if (count($incentivos)>0) {
					foreach ($incentivos as $key => $incentivo) {						
						
					?>
						<tr>
							<td class="text-center">
								<?php  
								if (!empty($incentivo["imagen"])) {
								?>
									<a class="open-incentivo" img="<?=$incentivo["imagen"]?>" descripcion="<?=$incentivo["descripcion"]?>"><?=$incentivo["incentivo"]?></a>
								<?php 
									
								}else{
									echo $incentivo["incentivo"]; 
								}
								?>
							</td>
							<td class="text-center"><?=$incentivo["inicio"]?></td>
							<td class="text-center"><?=$incentivo["fin"]?></td>
							<td class="text-center"><?=$incentivo["meta"]?></td>
							<td class="text-center">$<?=number_format($incentivo["compras_netas"])?></td>
							<td class="text-center"><?=$incentivo["cumplimiento"]?></td>
						</tr>
					<?php
						
					}				
				}else{
				?>
					<tr>
						<td colspan="10" class="text-center">No hay incentivos actualmente.</td>
					</tr>
				<?php
				}
				?>							
			</tbody>
		</table>
        </div>
        <div class="col-xs-12 col-md-3">
        	<?php 
				if (count($incentivos)>0) {
					foreach ($incentivos as $key => $incentivo) {
						if (!empty($incentivo["escalas"]) && count($incentivo["escalas"])>0) {							
							?>
							<ul class="list-group">
					        	<li class="list-group-item text-center" style="background-color: #dff0d8;color: #006837;">ESCALA <?=$incentivo["incentivo"]?></li>
					        	<?php
					        	foreach ($incentivo["escalas"] as $key => $escala) {
					        	?>
					        		<li class="list-group-item <?php if($incentivo["cumplimiento"]==convertir_pesos($escala["bono"])) echo "active"; ?>">
								    	<span class="badge"><?=convertir_pesos($escala["bono"])?></span>
								    	<?=convertir_pesos($escala["minimo"])?> - <?=convertir_pesos($escala["maximo"])?>
								  	</li>
					        	<?php
					        	}
					        	?>								  
								</ul>
							<?php
						}
					}
				}
			?>        	
        </div>
        <div class="clearfix"></div>
        </div>
	</div>
    </div>	
</div>
<br>
<br>
<?php include "footer.php"; ?>
