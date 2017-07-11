<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<!--<div class="row text-right">
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
	</div>-->
	<div class="row">
        <div class="col-lg-12">			
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Representante</th>
			  		<th>Comisiones Pendientes</th>
			  		<th>Incentivos Pendientes</th>
			  		<th>Total</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($representantes as $representante) {
			  		$total_representante = $representante["comisiones_total"]+$representante["incentivos_total"];
		  		?>
		  		<tr>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS."/".$representante['idusuario']?>"><?=$representante["nombre"]." ".$representante["apellido"]?></a></td>	  			
		  			<td><?=convertir_pesos($representante["comisiones_total"])?></td>
		  			<td><?=convertir_pesos($representante["incentivos_total"])?></td>
		  			<td><?php 
		  			if ($total_representante>=100000) {
		  			?>
		  			<span class="label label-warning"><?=convertir_pesos($total_representante)?></span>
		  			<?php
		  			}else{
					?>
					<span class="label label-primary"><?=convertir_pesos($total_representante)?></span>
					<?php
		  			}
	  				?>	  					
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