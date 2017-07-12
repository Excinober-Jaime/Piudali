<?php include "header.php"; ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			  	<?php
			  	foreach ($banners as $key => $banner) {
			  	?>
			  	<li data-target="#carousel-example-generic" data-slide-to="<?=$key?>" <?php if ($key==0) echo 'class="active"'; ?>></li>
			  	<?php
			  	}
			  	?>	    
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			  	<?php
			  	foreach ($banners as $key => $banner) {
			  	?>
			  		<div class="item <?php if ($key==0) echo 'active'; ?>">
				      <img src="<?=$banner['imagen']?>" alt="<?=$banner['nombre']?>">
				      <!--<div class="carousel-caption">
				        ...
				      </div>-->
				    </div>
			  	<?php
			  	}
			  	?>		    
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<hr>
		</div>		
		<!--<div class="col-xs-12">
			<h2 class="texto-destacado text-center">PRODUCTOS PIUDALÍ DEL MES</h2>
		</div>	-->
	</div>
	<div class="row hidden-xs">
		<div class="col-xs-12 text-right">
			<a href="#carousel-productos" role="button" data-slide="prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> 
			<a href="#carousel-productos" role="button" data-slide="next"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
		</div>
		<br><br>
		<div id="carousel-productos" class="carousel slide" data-ride="carousel">		  

		  	<!-- Wrapper for slides -->
		  	<div class="carousel-inner" role="listbox">
		    
		      <?php

		      	$count=0;

				foreach ($productosLista as $producto) {

					if (($count % 4)==0) {
					?>
						<div class="item <?php if ($count==0) { echo 'active'; }?>">
					<?php
					}
						producto_bloque($producto["img_principal"],$producto["nombre"],$producto["codigo"],$producto["precio"],$producto["precio_oferta"],$producto["url"],"col-sm-3");
					
					$count++;

					if (count($productosLista)==$count || ($count % 4)==0) {					
						?>
						</div>
						<?php
					}					
				}
				?>
		    </div>		    
		</div>		 
	</div>
	<div class="row hidden-sm hidden-md hidden-lg">
		<?php

			foreach ($productosLista as $producto) {

				producto_bloque($producto["img_principal"],$producto["nombre"],$producto["codigo"],$producto["precio"],$producto["precio_oferta"],$producto["url"],"col-sm-3");
			}
		?>
	</div>
	</div>		
	<div class="col-xs-12" style="background-color:#f9f9f9; padding:20px;">
		<div class="container">
			<?=$sobre_nosotros[0]["contenido"]?>
		</div>
	</div>
	
	<!--<div class="row">
		<div class="col-xs-12">
			<h2 class="text-center">ÚLTIMAS NOTICIAS</h2>
		</div>
		<div class="col-xs-6 col-md-4">
			<img src="http://piudali.com.co/wp-content/uploads/2016/03/AMAZONAS-10-150.jpg" class="img-responsive">
			<h3>Detrás de la marca: Dos Mujeres y Un Sueño</h3>
			<p>Detrás de la marca: Dos Mujeres y Un Sueño Durante muchos años las vidas de Martha Neira y Myriam Moya transcurrieron en paralelo. Químicas farmacéuticas egresadas de la misma universidad, su curiosid...</p>
		</div>
		<div class="col-xs-6 col-md-4">
			<img src="http://piudali.com.co/wp-content/uploads/2016/03/2012-11-02-08.34.21.jpg" class="img-responsive">
			<h3>Descubriendo Nuestro Amazonas</h3>
			<p>Descubriendo nuestro Amazonas Todo descubrimiento puede ser visto desde por lo menos tres puntos de vista: desde una perspectiva histórica, desde una perspectiva cultural y desde una perspectiva perso...</p>
		</div>
		<div class="col-xs-6 col-md-4">
			<img src="http://piudali.com.co/wp-content/uploads/2016/03/AMAZONAS-10-150.jpg" class="img-responsive">
			<h3>Detrás de la marca: Dos Mujeres y Un Sueño</h3>
			<p>Detrás de la marca: Dos Mujeres y Un Sueño Durante muchos años las vidas de Martha Neira y Myriam Moya transcurrieron en paralelo. Químicas farmacéuticas egresadas de la misma universidad, su curiosid...</p>
		</div>
	</div>-->

<br>
<br>
<?php include "footer.php"; ?>