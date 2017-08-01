<?php include "header.php"; ?>
<div class="container">
	<div class="col-xs-4">
		<!--<?=$pagina_detalle["contenido"]?>-->

		<div class="dropdown">
		  <button class="btn btn-lg btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    Ciudad
		    <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
		  	<?php
		  	foreach ($ciudades_lista as $key => $ciudad) {
		  	?>
		  	<li><a href="<?=URL_TIENDAS?>/?ciudad=<?=$ciudad["idciudad"]?>"><?=$ciudad["ciudad"]." (".$ciudad["departamento"].")"?></a></li>
		  	<?php
		  	}
		  	?>
		  </ul>
		</div>

		<div class="list-group" style="overflow-y:auto;max-height:800px;margin-top:20px;">

		<?php 
		foreach ($distribuidores as $key => $distribuidor) {
		?>
			<a class="list-group-item tienda" iddistribuidor="<?=$distribuidor["idusuario"]?>">
			    <h4 class="list-group-item-heading"><?=$distribuidor["nombre"]." ".$distribuidor["apellido"]?></h4>
			    <p class="list-group-item-text"><?=$distribuidor["direccion"]?><br><?=$distribuidor["telefono"]." - ".$distribuidor["telefono_m"]?><br><?=$distribuidor["ciudad"]?></p>
			  </a>
		<?php
		}
		?>
		</div>

		<!--<h2>Cali</h2>
		<div class="row" style="font-size:0.8em;">
		  <div class="col-xs-12 col-md-6">
		  	<div class="panel panel-default">
  				<div class="panel-body">	    
			        <h4>Natural Vitalis</h4>
			        <p>TIENDA ONLINE 24/7<br>
						www.naturalvitalis.com<br>
						Teléfonos: (2) 430 5058 - 311 627 9068<br>
						​Email: contacto@naturalvitalis.com
					</p>
			        <p>
			        	<a href="#" class="btn btn-primary btn-sm" role="button">Llamar <i class="fa fa-phone" aria-hidden="true"></i></a> 
			        	<a class="btn btn-default btn-sm tienda" dir="Carrera 65A # 9 - 60" ciudad="Cali" pais="Colombia" role="button">Ver Mapa <i class="fa fa-map-marker" aria-hidden="true"></i></a>
			        </p>
		      </div>
		    </div>
		  </div>
		  <div class="col-xs-12 col-md-6">
		    <div class="panel panel-default">
  				<div class="panel-body">	
			        <h4>Artemisa</h4>
			        <p>www.artemisa.co<br>
						Domicilios: (2) 4873030<br>
						TIENDA EN CALI


					</p>
			        <p><a href="#" class="btn btn-primary btn-sm" role="button">Llamar <i class="fa fa-phone" aria-hidden="true"></i>
					</a> <a  class="btn btn-default btn-sm tienda" dir="Cra 5 # 12-16" ciudad="Cali" pais="Colombia" role="button">Ver Mapa <i class="fa fa-map-marker" aria-hidden="true"></i>
					</a></p>
		      </div>
		    </div>
		  </div>
		</div>
		<h2>Tuluá</h2>
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<div class="panel panel-default">
	  				<div class="panel-body pt-0">	
					    <h4>Artemisa</h4>
					    <p>www.artemisa.co<br>
							Domicilios: (2) 4873030<br>
							TIENDA EN CALI
						</p>
					    <p><a  href="#" class="btn btn-primary btn-sm" role="button">Llamar <i class="fa fa-phone" aria-hidden="true"></i>
	</a> <a class="btn btn-default btn-sm" role="button">Ver Mapa <i class="fa fa-map-marker" aria-hidden="true"></i>
	</a></p>
					</div>
				</div>
			</div>
		</div>-->
	</div>
	<div class="col-xs-8">
		<!-- 16:9 aspect ratio -->
		<div class="embed-responsive embed-responsive-16by9 container-map">
		  <div id="map" class="embed-responsive-item"></div>
		</div>
	</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>