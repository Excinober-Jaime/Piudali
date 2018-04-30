<?php include "header.php"; ?>

<div class="container">			
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<img src="<?=$producto[0]["img_principal"]?>" class="img-responsive">
		</div>
		<div class="col-xs-12 col-md-6">
			<h1 class="texto-vinotinto"><?=$producto[0]["nombre"]?></h1>
			<hr>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
			     <?php if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'DISTRIBUIDOR DIRECTO' && $producto[0]["tipo"] == 'NORMAL') {  ?>
			    <div class="panel-heading" role="tab" id="headingOne" style="background-color: #742126; color: #fff;">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			          Venta Directa o Dropshipping
			        </a>
			      </h4>
			    </div>
			    <?php } ?>
			    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			      <div class="panel-body">
			       <div class="row">
						<div class="col-sm-6">
							<div class="col-sm-7">
								<?php 
								if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'DISTRIBUIDOR DIRECTO' && !empty($producto[0]["precio_oferta"])) {
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
								if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'DISTRIBUIDOR DIRECTO' && !empty($porc_oferta)) {
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
			      </div>
			    </div>
			  </div>
			  <?php if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'DISTRIBUIDOR DIRECTO' && $producto[0]["tipo"] == 'NORMAL') {  ?>
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingTwo" style="background-color: #742126; color: #fff;">
			      <h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          Venta Virtual
			        </a>
			      </h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			      <div class="panel-body">			

						<div class="panel panel-default">
						  <div class="panel-heading text-center" style="background-color: #ef7a00;color: #fff;">VENDE ESTE PRODUCTO VIRTUALMENTE Y GANA EL 20%</div>
						  <div class="panel-body">
						  	<h4 class="text-center">Vende Online y gana el 20% sin necesidad de inventario, inversión ni entrega.</h4>
						  	<p class="text-center">Descarga éstas piezas y compartelas con tus clientes agregando el siguiente enlace.</p>
						  	<div class="well" id="urlpdt">
						    <?=URL_SITIO.URL_TIENDA.'/'.URL_TIENDA_PRODUCTO.'/'.$producto[0]["url"].'?d='.$_SESSION['idusuario']?>
						   </div>
						   <center>
						   		<button class="btn btn-primary btn-sm" onclick="copyToClipboard('#urlpdt')">Copiar enlace</button> 	
						   	</center><br>
						  					  	
						   
						   	<center>						   			

						   		<a class="btn btn-default btn-sm" role="button" data-toggle="collapse" href="#como-funciona-ecommerce" aria-expanded="false" aria-controls="collapseExample">
								  ¿Cómo funciona?
								</a>	
							</center>
							<div class="collapse" id="como-funciona-ecommerce">
							  <div class="well">
							  	<ul class="list-group">
							  		<li class="list-group-item">1. Descarga la pieza publicitaria que deseas usar para vender éste producto a tus clientes.</li>					  		
							  		<li class="list-group-item">2. Comparte la pieza a tus clientes en medios digitales, correos electrónicos, redes sociales, páginas, blogs, tiendas virtuales, etc., junto al enlace.</li>
							  		<li class="list-group-item">3. Al dar clic en el enlace, tus clientes acceden a una página de venta del producto que les compartiste.</li>
							  		<li class="list-group-item">4. Tu cliente puede pagar de forma segura con tarjeta de crédito, débito, efecty, baloto y más.</li>
							  		<li class="list-group-item">5. Nosotros recaudamos el pago y consignamos el 20% a tu cuenta bancaria.</li>
							  		<li class="list-group-item">6. Nosotros entregamos el pedido a tu cliente.</li>
							  		<li class="list-group-item">7. Entregamos en 1 día para Cali y 2 a 3 días para otras ciudades.</li>
							  		<li class="list-group-item">8. El costo del flete es de $5.000 para Cali y de $10.000 para otras ciudades. Flete gratis a partir de compras iguales o superiores a $200.000.</li>
							  	</ul>
							  </div>
							</div>				   	
						  </div>
						</div>
					
			      </div>
			    </div>
			  </div>
			  <?php } ?>
  			</div>
  			<hr>
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











			
			
			
			
			<!--<div class="col-xs-12 text-center" style="font-size:20px;">
				<?php
	            $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	            ?>
	            <span>Compartir en: </span>
	            <a target="_new" href="https://www.facebook.com/sharer/sharer.php?u=<?=$url?>" style="color:#3A5A98;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	            <a target="_new" href="https://twitter.com/home?status=<?=$url?>" style="color:#3C4F56;"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	            <a target="_new" href="https://plus.google.com/share?url=<?=$url?>" style="color:#d73d32;"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
			</div>
			<br><br>				-->

	<?php if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'DISTRIBUIDOR DIRECTO' && $producto[0]["tipo"] == 'NORMAL') {  ?>

	<div class="panel panel-default">						
		<div class="panel-body">
			<h3 class="texto-vinotinto text-center">Galería de Piezas Publicitarias</h3>	
			<div class="row">				
				<?php
					
					$count_imgs = count($imgs_producto);
					$por_columna = ceil($count_imgs / 4);

					//var_dump($por_columna);

					foreach ($imgs_producto as $key => $img) {

						$ext = explode('/', $img['type']);
						$ext = $ext[1];

						if (($key == 0) || ($key % $por_columna) == 0) {

							if (($key % $por_columna) == 0){
								
								echo '</div>';

							}

							echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">';
						}
						
						?>
						<img src="<?=$img['imagen']?>" alt="<?=$img['nombre']?>" ext="<?=$ext?>" type="<?=$img['type']?>" class="img-popup" style="width: 100%;margin-bottom: 10px;cursor: pointer;border:1px solid #000;">
					<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
	
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