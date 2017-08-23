<?php include "header_club.php"; ?>

<!--
CONTENIDO
-->
<div class="container">
	<div class="row club">
		<div class="col-sm-6 col-md-6">
			<img src="<?=$producto['img_principal']?>" class="img-responsive img-thumbnail img-producto">
		</div>
		<div class="col-sm-6 col-md-6">
			<div class="categoria-regalo-detalle"><h2><?=$producto['categoria']?></h2></div>
			<div class="nombre-regalo-detalle"><h1><?=$producto['nombre']?><h1></div>
			<div class="col-md-12" style="padding-left: 0 !important">
				<div class="puntos-precio"><span class="destacarPrecio-detalle">
					
					<?php 
					if (!empty($producto["precio_oferta"])) {
						$precio = $producto["precio_oferta"];
					}else{
						$precio = $producto["precio"];
					}	

					echo number_format($precio/$valor_punto);
					?>
				</span> Puntos Piudalí</div>
			</div>
			<div class="clearfix"></div>
			<div class="descripcion">
				<p><?=$producto["descripcion"]?></p>
			</div>
			<div class="col-xs-6 col-md-2" style="padding-left: 0 !important">
				<h4>Cantidad</h4>
			</div>
			<div class="col-xs-6 col-md-2">
				<?php

				    if ($producto["cantidad"]>0) {			    

				?>

					<select class="form-control" id="cantidad" name="cantidad">

						<?php for ($i=1; $i <= $producto["cantidad"]; $i++) { ?>
				    
				      		<option value="<?=$i?>"><?=$i?></option>
				    
				      	<?php }	?>

					</select>
				<?php

				}else{

				?>					
					<p>El producto está agotado</p>

				<?php
				}
			    ?>
			</div>
			<div class="col-xs-12 col-md-8" style="padding-right: 0 !important">
				<a class="btn-regalo agregarPdt" idpdt="<?=$producto["idproducto"]?>">¡Lo quiero!</a>
			</div>
		</div>
		<div class="col-sm-12 panelInformacion">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Lo que debes saber</a></li>
		    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Acerca del Proveedor</a></li>
		  </ul>

		  <!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
			<div class="col-md-6">
				<h4>Descripción</h4>
				<p>Comparte con tu pareja de un momento especial de relajación y renovación corporal en el cual los momentos de la rutina diaria pasan a segundo plano y la relajación sea el dueño de esta velada.</p>

				<p>Incluye: </p>
				<ul>
					<li>Cupón valido para dos personas</li>
					<li>Masaje relajante corporal</li>
					<li>Reflexología en manos y pies</li> 
					<li>Piedras calientes</li> 
					<li>Bambuterapia</li> 
					<li>Cocoterapia</li> 
					<li>Mascarilla facial de chocolate</li> 
				</ul>
			</div>
			<div class="col-md-6">
				<h4>Reglas Claras</h4>
				<ul>
					<li>Horario: Lunes a sábado 8:00 am – 8:00 pm / Domingos y festivos 10:00 am – 4:00 pm-*</li>
					<li>El horario se debe verificar con el SPA directamente.</li>
					<li>Servicio por una hora</li> 
					<li>Tiempo de anticipación para cambiar o cancelar reserva: 48 Horas.</li> 
				</ul>
			</div>
			<div class="clearfix"></div>
			</div>
		    <div role="tabpanel" class="tab-pane" id="profile">2</div>
		</div>
		</div>
	</div>
</div>

<?php include "footer.php"; ?>