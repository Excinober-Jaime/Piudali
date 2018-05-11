<?php include "header.php"; ?>
<div class="container">
	<div class="tiendas">
		<!--<?=$pagina_detalle["contenido"]?>-->
		<div class="col-md-4">
			<div class="dropdown">
			  <button class="btn btn-lg btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			    Ciudad
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			  	<?php
			  	foreach ($ciudades_lista_id as $key => $idciudad) {
			  	?>
			  	<li><a href="<?=URL_TIENDAS?>/?ciudad=<?=$idciudad?>"><?=$ciudades_lista_ciudad[$key]?></a></li>
			  	<?php
			  	}
			  	?>
			  </ul>
			</div>
		
			<div class="list-group" style="overflow-y:auto;height:300px;margin-top:20px;">

			<?php 
			foreach ($sucursales as $key => $sucursal) {
			?>
				<a class="list-group-item tienda" iddistribuidor="<?=$sucursal["idsucursal"]?>">
				    <h4 class="list-group-item-heading"><?=$sucursal["nombre"]?></h4>
				    <p class="list-group-item-text"><?=$sucursal["direccion"]?><br><?=$sucursal["telefono"]?><br><?=$sucursal["ciudad"]?></p>
				  </a>
			<?php
			}
			?>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<!-- 16:9 aspect ratio -->
		<div class="embed-responsive embed-responsive-16by9 container-map">
		  <div id="map" class="embed-responsive-item"></div>
		</div>
	</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>