<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">		
		<div class="col-lg-12">
			<form role="form" class="form-inline pull-right" id="filtros" method="post">
                <!--<div class="form-group">
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
                </div>-->
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
			  		<th>Código</th>
			  		<th>Nombre</th>
			  		<th class="text-center">Unidades Inventario</th>
			  		<th class="text-center">Unidades Vendidas</th>			  					  		
			  		<!--<th>Zona</th>			  		
			  		<th>Región</th>			  		-->
			  		<th>Categoría</th>
			  		<th>Estado</th>			  		
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	$total_inventario = 0;
			  	$total_vendidas = 0;

			  	foreach ($productos as $producto) {

			  		$total_inventario += $producto["cantidad"];
			  		$total_vendidas += $producto["unidades_vendidas"];

			  		if ($producto["estado"]) {
			  			$estado = "ACTIVO";
			  		}else{
			  			$estado = "INACTIVO";
			  		}
		  		?>
		  		<tr>
		  			<td><?=$producto["codigo"]?></td>
		  			<td><?=$producto["nombre"]?></td>
		  			<td class="text-center"><?=$producto["cantidad"]?></td>
		  			<td class="text-center"><?=$producto["unidades_vendidas"]?></td>		  			
		  			<!--<td></td>
		  			<td></td>-->
		  			<td><?=$producto["categoria"]?></td>		  			
		  			<td><?=$estado?></td>		  			
		  		</tr>
		  		<?php
			  	}
			  	?>
			  	<tr>
			  		<th colspan="2" class="text-right">TOTAL</th>
			  		<th class="text-center"><?=$total_inventario?></th>
			  		<th class="text-center"><?=$total_vendidas?></th>
			  		<th colspan="2"></th>
			  	</tr>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>