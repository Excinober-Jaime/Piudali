<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="section" id="productos">
	<h2 class="center-align">PRODUCTOS</h2>
	<div class="row">
	<?php

		if (count($productos)>0) {

			foreach ($productos as $key => $producto) {

	?>
				<div class="col s12 m4 l3" style="height: 550px;">
				  <div class="card hoverable">
        			<div class="card-image">
				      <img src="<?=$producto['img_principal']?>">
				      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="<?=URL_CLUB.'/'.URL_CLUB_PRODUCTO.'/'.$producto['url']?>"><i class="material-icons">add</i></a>
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