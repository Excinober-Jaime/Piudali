<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="section" id="productos">
	<h2 class="center-align">¿EN QUÉ REDIMIR MIS PUNTOS?</h2>
	<div class="row">
	<?php

		if (count($productos_redimir)>0) {

			foreach ($productos_redimir as $key => $producto) {

				if ($producto['tipo'] == 'CLUB') {
					
					$url = URL_CLUB.'/'.URL_CLUB_PRODUCTO.'/'.$producto['url'];

				}else{

					$url = URL_CLUB.'/'.URL_CLUB_PRODUCTO_ALIADO.'/'.$producto['url'];
				}
	?>
				<div class="col s12 m4 l3" style="height: 550px;">
				  <div class="card hoverable">
        			<div class="card-image">
        				<a href="<?=$url?>">
				      		<img src="<?=$producto['img_principal']?>">
				      	</a>
				      	<a class="btn-floating halfway-fab waves-effect waves-light orange" href="<?=$url?>"><i class="material-icons">add</i></a>
				    </div>
				    <div class="card-content">
				    	<span class="card-title teal-text text-darken-4 truncate"><?=$producto['nombre']?></span>				      	
				    </div>
				  </div>
				</div>
	<?php
			}
		}
	?>
	</div>
</div>
<?php include 'footer.php'; ?>