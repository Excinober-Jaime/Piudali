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
                    <label for="exampleInputEmail2">ESTADOS</label>
                    <select class="form-control" name="filtro_estado" onChange="javascript: document.getElementById('filtros').submit();">
                    	<option value="">--SELECCIONE--</option>
                    	<option value="">TODAS</option>
                    	<?php 
							foreach ($estados as $key => $estado) {
								?>
								<option value="<?=$estado?>" <?php //if($estado == $orden["detalle"]["estado"]) echo "selected"; ?>><?=$estado?></option>
								<?php
							}
						?>
                    </select>
                </div> 
                <!--<div class="form-group m-l">
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
			  		<th>Número de Orden</th>
			  		<th>Fecha de Pedido</th>
			  		<th>Comprador</th>
			  		<th>Total Pagado</th>			  		
			  		<th>Representante</th>
			  		<th>Director</th>
			  		<th>Zona</th>
			  		<th>Región</th>
			  		<th>Estado</th>
			  		<th>Número de Factura</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	$total_total = 0;

			  	foreach ($ordenes as $ordenes) {
			  		$total_total += $ordenes["total"];
		  		?>
		  		<tr>
		  			<td><a href="<?=URL_SITIO.URL_ADMIN."/".URL_ADMIN_ORDENES."/".$ordenes["idorden"]?>"><?=$ordenes["num_orden"]?></a></td>
		  			<td><?=$ordenes["fecha_pedido"]?></td>
		  			<td><?=$ordenes["nombre"]." ".$ordenes["apellido"]?></td>
		  			<td><?=convertir_pesos($ordenes["total"])?></td>	  			
		  			<td><?=$ordenes["lider"]["nombre"]." ".$ordenes["lider"]["apellido"]?></td>
		  			<td><?=$ordenes["director"]["nombre"]." ".$ordenes["director"]["apellido"]?></td>
		  			<td><?=$ordenes["zona"]["zona"]?></td>
		  			<td><?=$ordenes["region"]["region"]?></td>
		  			<td><?=$ordenes["estado"]?></td>
		  			<td><?=$ordenes["num_factura"]?></td>		  			
		  		</tr>
		  		<?php
			  	}
			  	?>
			  	<tr>
			  		<th colspan="3" class="text-right">TOTAL</th>
			  		<th><?=convertir_pesos($total_total)?></th>
			  		<th colspan="6"></th>
			  	</tr>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>