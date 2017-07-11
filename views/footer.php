	<div class="container">				
		<?php if (!isset($_SESSION["idusuario"])) { ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="col-xs-12" style="color:#3c763d; background-color:#dff0d8; border-color:#d6e9c6; padding:20px 10px;">
					<div class="col-xs-12 col-md-6">
						<h3 style="padding:0;margin:0;" class="text-center">Recibe nuestras noticias y ofertas*</h3>
					</div>
					<form method="post" id="form-newsletter" class="form-inline col-xs-12 col-md-6">
					  <div class="form-group">
					    <label class="sr-only" for="exampleInputEmail3">Nombre</label>
					    <input type="text" class="form-control" name="nombre" id="nombre_newsletter" placeholder="Nombre">
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="exampleInputPassword3">Email</label>
					    <input type="email" class="form-control" name="email" id="email_newsletter" placeholder="Email">
					  </div>				  
					  <button type="button" class="btn btn-success" id="enviar_newsletter">Suscribirme!</button>
					</form>	
				</div>
			</div>
		</div>
		<?php } ?>	
		<div class="col-xs-12" style="color:#3c763d; background-color:#dff0d8; border-color:#d6e9c6; padding:20px 10px;">		
			<div class="col-xs-12 col-md-4">
				<ul>
					<li><a href="<?=URL_SITIO?>Ingresar" style="color:#006837;">Acceso Distribuidores</a></li>
					<li><a href="<?=URL_SITIO?>Ingresar" style="color:#006837;">Acceso Corporativo</a></li>
					<li><a href="<?=URL_SITIO?>tiendas" style="color:#006837;">Dónde Comprar</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-md-4">
				<ul>
					<li><a href="<?=URL_SITIO?>sobre-waliwa" style="color:#006837;">Quienes Somos</a></li>
					<li><a href="<?=URL_SITIO?>quienes-somos" style="color:#006837;">Sobre Piudali</a></li>
					<li><a href="<?=URL_SITIO?>compromiso-social" style="color:#006837;">Compromiso Social</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-md-4">
				<ul>
					<li><a href="<?=URL_SITIO?>politica-datos" style="color:#006837;">Políticas del Sitio Web</a></li>
					<li><a href="<?=URL_SITIO?>servicio-al-cliente" style="color:#006837;">Servicio al Cliente</a></li>
					<li><a href="<?=URL_SITIO?>Contacto" style="color:#006837;">Contáctenos</a></li>
				</ul>
			</div>
		</div>
	</div>
	<br>
	<div class="franja"></div>
	<footer class="container-fluid footer">
		<div class="container">
			<div class="col-xs-12 col-md-2">
				<img src="assets/img/link-grupo-marketing.png" class="img-responsive center-block">
			</div>
			<div class="col-xs-12 col-md-6">
				<p>Contáctanos<br>
Distribuidor Autorizado Link Grupo Marketing SAS<br>
Teléfono: (+57)(2) 524 1887 - (+57) 311 627 9068 | Email: contacto@piudali.com.co<br><br>
Todos los derechos reservados Link Grupo Marketing SAS © 2016 <br>
Diseñado por iMarketing21 | Desarrollado por <a href="http://excinober.com" target="_new" style="color:#fff;">Excinober Benites</a></p>
			</div>
			<div class="col-xs-12 col-md-4">
				<img src="assets/img/piudali-footer.png" class="img-responsive center-block">
			</div>
		</div>
	</footer>

	<div class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"></h4>
	      </div>
	      <div class="modal-body">
	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>	        
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/js.js"></script>
    <script src="assets/js/carrito.js"></script>
    <script src="assets/js/return-to-top.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFBMLpxKg2tqIa4wVB4xA5rPsPl_-IfEQ">
    </script>
    <?php
    if (isset($banner_popup) && count($banner_popup)>0) {
    	$banner_popup = $banner_popup[0];
    ?>
    	<script type="text/javascript">

	    	$(document).ready(function(){
	    		var img = "<?=$banner_popup['imagen']?>";
				var descripcion = "<?=$banner_popup['nombre']?>";
				var href = "<?=$banner_popup['link']?>";
				var data = '<a href="'+href+'"><img src="'+img+'" class="img-responsive" title="'+descripcion+'"></a>';
				$(".modal-body").html(data);
				$('.modal').modal();	    		
	    	})

    	</script>
    <?php
    }
    ?>    
  </body>
</html>