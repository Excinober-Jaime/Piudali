<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row text-right">
		<form class="form-inline" method="post" id="filtros">
			<div class="form-group">
				<label for="inputEmail3" class=" control-label">Incentivo</label>						
				<select name="idincentivo" class="form-control" onChange="javascript: document.getElementById('filtros').submit();">
					<option value="">-Seleccione-</option>
					<?php 
					if (count($incentivos)>0) {

						foreach ($incentivos as $key => $incentivo) {
					?>
							<option value="<?=$incentivo["idincentivo"]?>" <?php if ($incentivo["idincentivo"] == $idincentivo_seleccionado["idincentivo"]) { echo "selected"; }  ?>><?=$incentivo["incentivo"]?></option>
					<?php
						}									
					}else{
						?>
						<option value="">No hay incentivos disponibles</option>
					<?php

					}
					?>								
				</select>
			</div>
		</form>
	</div>
	<div class="row">
        <div class="col-lg-12">			
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Representante</th>
			  		<th>Neto</th>
			  		<th>Meta</th>
			  		<th>Cumplimiento</th>
			  		<th>Estado</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($representantes as $representante) {
		  		?>
		  		<tr>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS."/".$representante['idusuario']?>"><?=$representante["nombre"]." ".$representante["apellido"]?></a></td>	  			
		  			<td><?=convertir_pesos($representante["neto_total"])?></td>
		  			<td><?=$representante["meta"]?></td>
		  			<td><?=round($representante["cumplimiento"])?>%</td>
		  			<td>
		  				<?php 
		  				if (!$incentivo_en_curso) {		  				
			  				if ($representante["neto_total"]>0) {
				  				if ($representante["incentivo_pagado"]) {
				  				?>
				  					<span class="label label-primary">Pagada</span>
				  				<?php	
				  				}else{

				  					if (count($escalas)>0) { //Incentivo con escalas

				  						if ($representante["cumplimiento"]>0) {
				  						?>
				  							<span class="label label-warning">Pendiente</span>	
				  						<?php
				  						}else{
				  						?>
				  							<span class="label label-info">Aún no cumple</span>	
				  						<?php	
				  						}
				  						
				  					}else{ //Incentivo sin escalas
				  						if ($representante["cumplimiento"]>=100) {
				  						?>
				  							<span class="label label-warning">Pendiente</span>	
				  						<?php
				  						}else{
				  						?>
				  							<span class="label label-info">Aún no cumple</span>	
				  						<?php
				  						}
				  					}

				  				?>
				  					
				  				<?php
			  					}
			  				}
			  			}else{
			  			?>
			  				<span class="label label-danger">En curso</span>	
			  			<?php 
			  			}
		  				?>
		  			</td>
		  			<td>
		  			<?php 
		  			if (!$incentivo_en_curso) {	
			  			/*if ($representante["comision_total"]>0) { ?>
			  			<form action="<?=URL_ADMIN."/".URL_ADMIN_PAGOS_COMISIONES."/".URL_ADMIN_PAGO_COMISION?>" method="post">
				  			<input type="hidden" name="monto" value="<?=round($representante["comision_total"])?>">
				  			<input type="hidden" name="idusuario" value="<?=$representante["idusuario"]?>">
				  			<input type="hidden" name="idcampana" value="<?=$campana_seleccionada["idcampana"]?>">
				  			<input type="hidden" name="nombre_campana" value="<?=$campana_seleccionada["nombre"]?>">
				  			<button type="submit" class="btn" name="detallePago">
				  				<?php if (!$representante["campana_comision_pagada"]) { ?>
				  				<i class="fa fa-credit-card" aria-hidden="true" title="Pagar"></i>
				  				<?php }else{ ?>
				  				<i class="fa fa-eye" aria-hidden="true" title="Ver"></i>
				  				<?php } ?>
				  			</button>
				  		</form>
			  		<?php 
			  			}*/ 
			  		} 
			  		?>
		  				<!--<i class="fa fa-download" aria-hidden="true" title="Descargar Comprobante"></i>-->


		  			</td>
		  		</tr>
		  		<?php
			  	}
			  	?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>