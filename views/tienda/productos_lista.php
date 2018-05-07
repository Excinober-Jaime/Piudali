<?php include 'header.php'; ?>
<!--<img src="assets/tienda/img/campana-mujer.png" style="width: 100%; display: block;">-->
<!--<div class="carousel-madres carousel-slider" style="height: auto !important;">
    <a class="carousel-item" href="#one!"><img src="assets/tienda/img/campanas/madres/carousel0.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="assets/tienda/img/campanas/madres/carousel1.jpg"></a>
</div>-->
<img src="assets/tienda/img/campanas/madres/carousel0.jpg" style="width: 100%;">
<div class="divider"></div>
<div class="section" id="productos">

	<h4 class="center-align" style="color: #2b8e3c; ">Selecciona el producto de tu preferencia</h4>
	<div class="row">
	<?php

		if (count($productos)>0) {

			foreach ($productos as $key => $producto) {

	?>
				<div class="col s12 m4 l3">
				  <div class="card hoverable">
        			<div class="card-image">
				      	<a href="<?=URL_TIENDA.'/'.URL_TIENDA_PRODUCTO.'/'.$producto['url']?>?d=<?=$_SESSION['iddistribuidor']?>">
				    	  	<img src="<?=$producto['img_principal']?>">
				  		</a>
				      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="<?=URL_TIENDA.'/'.URL_TIENDA_PRODUCTO.'/'.$producto['url']?>?d=<?=$_SESSION['iddistribuidor']?>"><i class="material-icons">add</i></a>
				    </div>
				    <div class="card-content">
				    	<span class="card-title teal-text text-darken-4" style="height: 100px;"><?=$producto['nombre']?></span>				      	
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