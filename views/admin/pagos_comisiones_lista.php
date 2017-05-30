<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row text-right">
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

					/*foreach ($anos_filtro as $key => $ano) {
						?>
							<option value="ano<?=$ano?>" <?php if ($_POST["idcampana"]=="ano".$ano) { echo "selected"; } ?>>Año <?=$ano?></option>
						<?php
					}*/
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
			  		<th>Comisiones</th>
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
		  			<td><?=convertir_pesos($representante["comision_total"])?></td>
		  			<td>
		  				<?php 
		  				if (!$campana_en_curso) {		  				
			  				if ($representante["comision_total"]>0) {
				  				if ($representante["campana_comision_pagada"]) {
				  				?>
				  					<span class="label label-primary">Pagada</span>
				  				<?php	
				  				}else{
				  				?>
				  					<span class="label label-warning">Pendiente</span>	
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
		  			if (!$campana_en_curso) {	
			  			if ($representante["comision_total"]>0) { ?>
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
			  			} 
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