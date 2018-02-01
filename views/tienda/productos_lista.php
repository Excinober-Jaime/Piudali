<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="section" id="productos">
	<h3 class="center-align">PRODUCTOS</h3>
	<div class="row">
	<?php

		if (count($productos)>0) {

			foreach ($productos as $key => $producto) {

	?>
				<div class="col s12 m4 l3" style="height: 590px;">
				  <div class="card hoverable">
        			<div class="card-image">
				      	<a href="<?=URL_TIENDA.'/'.URL_TIENDA_PRODUCTO.'/'.$producto['url']?>?d=<?=$_SESSION['iddistribuidor']?>">
				    	  	<img src="<?=$producto['img_principal']?>">
				  		</a>
				      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="<?=URL_TIENDA.'/'.URL_TIENDA_PRODUCTO.'/'.$producto['url']?>?d=<?=$_SESSION['iddistribuidor']?>"><i class="material-icons">add</i></a>
				    </div>
				    <div class="card-content">
				    	<span class="card-title teal-text text-darken-4"><?=$producto['nombre']?></span>				      	
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