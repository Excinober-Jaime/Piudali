<?php include "header.php"; ?>

<div class="container">			
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<img src="<?=$producto[0]["img_principal"]?>" class="img-responsive">
		</div>
		<div class="col-xs-12 col-md-6">
			<h1 class="texto-vinotinto"><?=$producto[0]["nombre"]?></h1>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					<div class="col-sm-7">
						<?php 
						if (!empty($producto[0]["precio_oferta"])) {
						?>
							<h4>$<?=number_format($producto[0]["precio_oferta"])?><br><small>$<?=number_format($producto[0]["precio"])?></small></h4>
						<?php
						}else{
						?>
							<h4>$<?=number_format($producto[0]["precio"])?></h4>
						<?php
						}
						?>							
					</div>
					<div class="col-sm-5">
						<?php 
						if (!empty($porc_oferta)) {
						?>
							<h3><?=$porc_oferta?>%</h3>
						<?php
						}
						?>
					</div>
				</div>
				<div class="col-sm-6">
				    <div class="col-sm-6">
				    	<h4>Cantidad</h4>
				    </div>
				    <div class="col-sm-6">
				    <?php
				    if ($producto[0]["cantidad"]>0) {			    
				    ?>
				      <select class="form-control" id="cantidad" name="cantidad">
				      	<?php
				      	for ($i=1; $i <= $producto[0]["cantidad"]; $i++) { 
				      		?>
				      		<option value="<?=$i?>"><?=$i?></option>
				      		<?php
				      	}
				      	?>
				      </select>
				    <?php
					}else{
					?>
					<p>El producto está agotado</p>
					<?php
					}
				    ?>
				    </div>
				</div>							
			</div>
			<hr>		
			<button type="button" idpdt="<?=$producto[0]["idproducto"]?>" class="btn btn-primary btn-lg btn-block agregarPdt">Añadir Producto</button>	
			<hr>
			<?php if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'DISTRIBUIDOR DIRECTO' && $producto[0]["tipo"] == 'NORMAL') {  ?>
				

				<div class="panel panel-default">
				  <div class="panel-heading text-center" style="background-color: rgba(109,30,63,1);color:#fff;">VENDE ESTE PRODUCTO VIRTUALMENTE Y GANA EL 20%</div>
				  <div class="panel-body">
				  	<h4 class="text-center">Vende Online y gana el 20% sin necesidad de inventario.</h4>
				  	<p class="text-center">Comparte este enlace para vender este producto:</p>
				  	<div class="well" id="urlpdt">
				    <?=URL_SITIO.URL_TIENDA.'/'.URL_TIENDA_PRODUCTO.'/'.$producto[0]["url"].'?d='.$_SESSION['idusuario']?>
				   </div>
				   
				   	<center>
				   		<button class="btn btn-primary btn-sm" onclick="copyToClipboard('#urlpdt')">Copiar enlace</button> 		

				   		<a class="btn btn-default btn-sm" role="button" data-toggle="collapse" href="#como-funciona-ecommerce" aria-expanded="false" aria-controls="collapseExample">
						  ¿Cómo funciona?
						</a>	
					</center>					
					<div class="collapse" id="como-funciona-ecommerce">
					  <div class="well">
					  	<ul class="list-group">
					  		<li class="list-group-item">1. Copia el enlace que aparece en la sección "VENDER ESTE PRODUCTOS VIRTUALMENTE"</li>
					  		<li class="list-group-item">2. Comparte el enlace a tus clientes en medios digitales, correos electrónicos, redes sociales, páginas, blogs, tiendas virtuales, etc.</li>
					  		<li class="list-group-item">3. Al dar clic en el enlace, tus clientes acceden a una página de venta del producto que les compartiste.</li>
					  		<li class="list-group-item">4. Tu cliente puede pagar de forma segura con tarjeta de crédito, débito, efecty, baloto y más.</li>
					  		<li class="list-group-item">5. Nosotros recaudamos el pago y consignamos el 20% a tu cuenta bancaria.</li>
					  		<li class="list-group-item">6. Nosotros entregamos el pedido a tu cliente.</li>
					  		<li class="list-group-item">7. Entregamos en 1 día para Cali y 2 a 3 días para otras ciudades.</li>
					  		<li class="list-group-item">8. El costo del flete es de $5.000 para Cali y de $10.000 para otras ciudades. Flete gratis a partir de compras iguales o superiores a $100.000.</li>

					  	</ul>
					  </div>
					</div>				   	
				  </div>
				</div>

			<?php } ?>
			
			<div class="col-xs-12 text-center" style="font-size:20px;">
				<?php
	            $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	            ?>
	            <span>Compartir en: </span>
	            <a target="_new" href="https://www.facebook.com/sharer/sharer.php?u=<?=$url?>" style="color:#3A5A98;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	            <a target="_new" href="https://twitter.com/home?status=<?=$url?>" style="color:#3C4F56;"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	            <a target="_new" href="https://plus.google.com/share?url=<?=$url?>" style="color:#d73d32;"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
			</div>
			<br><br>				
			<div class="row">					
				<div class="col-xs-6">
					<h6>Compañia: <?=$producto[0]["compania"]?></p>
				</div>
				<div class="col-xs-6">
					<h6>Código: <?=$producto[0]["codigo"]?></h6>
				</div>
				<div class="col-xs-6">
					<h6>Registro: <?=$producto[0]["registro"]?></h6>
				</div>
				<div class="col-xs-6">
					<h6>Presentación: <?=$producto[0]["presentacion"]?></h6>
				</div>
			</div>
			
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-12">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#descripcion" aria-controls="descripcion" role="tab" data-toggle="tab" class="texto-vinotinto">Descripción</a></li>
		    <?php if (!empty($producto[0]["uso"])) {
		    ?>
		    <li role="presentation"><a href="#uso" aria-controls="uso" role="tab" data-toggle="tab" class="texto-vinotinto">Ver Video</a></li>
		    <?php
		    } ?> 
		    <li role="presentation"><a href="#mas_info" aria-controls="mas_info" role="tab" data-toggle="tab" class="texto-vinotinto">
		    	<?php ($producto[0]["tipo"] == 'PREMIO')? print('Más Información') : print('Ingredientes') ?>	
		    </a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="descripcion"><br><?=$producto[0]["descripcion"]?></div>
		    <?php if (!empty($producto[0]["uso"])) {
		    ?>
		    <div role="tabpanel" class="tab-pane" id="uso"><br><?=$producto[0]["uso"]?></div>
		    <?php
		    } ?>
		    <div role="tabpanel" class="tab-pane" id="mas_info"><br><?=$producto[0]["mas_info"]?></div>
		  </div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-12">
			<h3>Productos Relacionados</h3>
		</div>
		<?php
		foreach ($productos_relacionados as $producto_relacionado) {

			producto_bloque($producto_relacionado["img_principal"],$producto_relacionado["nombre"],$producto_relacionado["codigo"],$producto_relacionado["tipo"],$producto_relacionado["precio"],$producto_relacionado["precio_oferta"],$producto_relacionado["url"],"col-sm-2", true);
		}
		?>
	</div>
	<div class="row">		
		<?php
		foreach ($banners as $banner) {
		?>		
		<div class="col-xs-12 col-md-3">
			<br>
			<a href="<?=$banner['link']?>"><img src="<?=$banner['imagen']?>" class="img-responsive"></a>
		</div>
		<?php
		}
		?>
	</div>
</div>
<br><br>
<?php include "footer.php"; ?>