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
			<?php if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'DISTRIBUIDOR DIRECTO' && $producto[0]["tipo"] == 'NORMAL') { ?>
				

				<div class="panel panel-default">
				  <div class="panel-heading">VENDE ESTE PRODUCTO VIRTUALMENTE Y GANA EL 20%</div>
				  <div class="panel-body">
				  	<p>
				  		Sin inventario. Nosotros entregamos directamente a tus clientes.<br>
				  		Nos encargamos de recaudar a tus clientes y te consignamos el 20%.
				  	</p>
				  	<p>Comparte este enlace para vender este producto</p>
				    <p id="urlpdt"><?=URL_SITIO.URL_TIENDA.'/'.URL_TIENDA_PRODUCTO.'/'.$producto[0]["url"].'?d='.$_SESSION['idusuario']?>
				   	</p>				   	
				   	<center>
				   		<button class="btn btn-primary btn-sm" onclick="copyToClipboard('#urlpdt')">Copiar enlace</button>
				   		<button class="btn btn-default btn-sm">¿Cómo funciona?</button>
				   	</center>
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
		    <li role="presentation"><a href="#mas_info" aria-controls="mas_info" role="tab" data-toggle="tab" class="texto-vinotinto">Ingredientes</a></li>
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