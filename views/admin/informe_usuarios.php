<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">		
		<div class="col-lg-12">
			<form role="form" class="form-inline pull-right" id="filtros" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail2">REGIÓN</label>
                    <select class="form-control" name="filtro_region" onChange="javascript: document.getElementById('filtros').submit();">
                    	<option value="">TODAS</option>                    	
                    	<?php 
                    	foreach ($regiones as $key => $region) {
                    	?>
                    	<option value="<?=$region["idregion"]?>" <?php if ($_POST["filtro_region"]==$region["idregion"]) { echo "selected"; } ?>><?=$region["region"]?></option>
                    	<?php
                    	}
                    	?>
                    </select>
                </div>
                <div class="form-group m-l">
                    <label for="exampleInputEmail2">ZONA</label>
                    <select class="form-control" name="filtro_zona" onChange="javascript: document.getElementById('filtros').submit();">
                    	<option value="">TODAS</option>
                    	<?php 
                    	foreach ($zonas as $key => $zona) {
                    	?>
                    	<option value="<?=$zona["idzona"]?>" <?php if ($_POST["filtro_zona"]==$zona["idzona"]) { echo "selected"; } ?>><?=$zona["zona"]?></option>
                    	<?php
                    	}
                    	?>
                    </select>
                </div>
                <div class="form-group m-l">
                    <label for="exampleInputEmail2">DESDE</label>
                    <input type="date" name="filtro_fecha_inicio" class="form-control" value="<?=$fecha_inicio?>" onChange="javascript: document.getElementById('filtros').submit();">
                </div>
                <div class="form-group m-l">
                    <label for="exampleInputEmail2">HASTA</label>
                    <input type="date" name="filtro_fecha_fin" class="form-control" value="<?=$fecha_fin?>" onChange="javascript: document.getElementById('filtros').submit();">
                </div>                            
                <!--<button class="btn btn-white" type="submit">Filtrar</button>-->
            </form>
		</div>
	</div>
	<hr>
	<div class="row">
        <div class="col-lg-12">			
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Identificación</th>
			  		<th>Nombre</th>
			  		<th>Apellido</th>		  		
			  		<th>Email</th>			  		
			  		<th>Teléfono</th>
			  		<th>Móvil</th>
			  		<th>Segmento</th>
			  		<th>Compras</th>
			  		<th>Ciudad</th>			  		
			  		<th>Zona</th>			  		
			  		<th>Región</th>			  		
			  		<th>Representante</th>
			  		<th>Director</th>

			  	</tr>
			  </thead>
			  <tbody>
			  	<?php

			  	$total_compras_netas = 0;

			  	foreach ($usuarios as $usuario) {
			  		$total_compras_netas += $usuario["compras_netas"];
		  		?>
		  		<tr>
		  			<td><?=$usuario["num_identificacion"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS."/".$usuario['idusuario']?>"><?=$usuario["nombre"]?></a></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS."/".$usuario['idusuario']?>"><?=$usuario["apellido"]?></a></td>	  			
		  			<td><?=$usuario["email"]?></td>
		  			<td><?=$usuario["telefono"]?></td>
		  			<td><?=$usuario["telefono_m"]?></td>
		  			<td><?=$usuario["segmento"]?></td>
		  			<td><?=convertir_pesos($usuario["compras_netas"])?></td>
		  			<td><?=$usuario["ciudad"]?></td>
		  			<td><?=$usuario["zona"]["zona"]?></td>
		  			<td><?=$usuario["region"]["region"]?></td>
		  			<td><?=$usuario["lider"]["nombre"]." ".$usuario["lider"]["apellido"]?></td>
		  			<td><?=$usuario["director"]["nombre"]." ".$usuario["director"]["apellido"]?></td>
		  		</tr>
		  		<?php
			  	}
			  	?>
			  	<tr>
			  		<th colspan="7" class="text-right">TOTAL</th>
			  		<th><?=convertir_pesos($total_compras_netas)?></th>
			  	</tr>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>