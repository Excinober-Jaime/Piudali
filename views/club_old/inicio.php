<?php include "header_club.php"; ?>
<!--
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol>

  
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="assets/img/club-banners/spa-en-cali.png" alt="...">
    </div>
    <div class="item">
      <img src="assets/img/club-banners/spa-en-cali.png" alt="...">
    </div>
  </div>
</div>-->
<!--
CONTENIDO
-->
<div class="container">
	<div class="row club">
		<h2 class="text-center" style="margin-top: 50px;">DESCUBRE NUESTROS REGALOS DESTACADOS</h2>
		
		<?php if (count($productos_club)>0) { 

				foreach ($productos_club as $key => $producto) {
		?>

					<div class="col-sm-6 col-md-3">
						<div class="lista-regalos">
							<center>
								<a href="<?=URL_CLUB.'/'.URL_CLUB_PRODUCTO.'/'.$producto['url']?>">
									<img src="<?=$producto['img_principal']?>" class="img-responsive img-thumbnail">
								</a>
							</center>
							<div class="categoria-regalo"><?=$producto['categoria']?></div>
							<div class="nombre-regalo"><?=$producto['nombre']?></div>
							<div class="puntos-precio"><span class="destacarPrecio">
							<?php 
								
								if (!empty($producto["precio_oferta"])) {
									$precio = $producto["precio_oferta"];
								}else{
									$precio = $producto["precio"];
								}								
							?>
							<?=number_format($producto['precio']/$valor_punto)?></span> Puntos Piudalí</div>
						</div>
					</div><!--FIN PRODUCTO-->
		<?php
				}					
				
			}else{ ?>
			<center>No tenemos regalos en este momento. Vuelve pronto!</center>
		<?php } ?>
		
	</div>
</div>

<?php include "footer.php"; ?>