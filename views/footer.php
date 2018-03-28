	<div class="clearfix"></div>
	<?php if (!isset($_SESSION["idusuario"])) { ?>
	<div class="newslatter">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-5">				
							<h3 class="text-center">Recibe nuestras noticias*</h3>
				</div>
				<div class="col-xs-12 col-md-7">	
				<center>
							<form method="post" id="form-newsletter" class="form-inline">
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
				</center>
				</div>
				<div class="clearfix"></div>				
			</div>
		</div>
	</div>
	<?php } ?>	
	<div class="franja"></div>
	<footer class="footer">
		<div class="container">
		<div class="col-xs-12 col-sm-4 col-md-3">		
				<h3>Enlaces de Interes</h3>
				<ul>
					<li><a href="<?=URL_SITIO?>Ingresar">Acceso Distribuidores</a></li>
					<li><a href="<?=URL_SITIO?>Ingresar">Acceso Corporativo</a></li>
					<li><a href="<?=URL_SITIO?>tiendas">Dónde Comprar</a></li>
		
					<li><a href="<?=URL_SITIO?>sobre-waliwa">Quienes Somos</a></li>
					<li><a href="<?=URL_SITIO?>quienes-somos">Sobre Piudali</a></li>
					<li><a href="<?=URL_SITIO?>compromiso-social">Compromiso Social</a></li>
			
					<li><a href="<?=URL_SITIO?>politica-datos">Políticas del Sitio Web</a></li>
					<li><a href="<?=URL_SITIO?>servicio-al-cliente">Servicio al Cliente</a></li>
					<li><a href="<?=URL_SITIO?>Contacto">Contáctenos</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-9">
				<div class="col-xs-12 col-md-3 col-md-offset-1">
					<center>
						<img src="assets/img/link-grupo-marketing.png" class="img-responsive">
						<br>
						<img src="assets/img/piudali-footer.png" class="img-responsive">
					</center>
				</div>

				<div class="col-xs-12 col-md-8">
				<h4>Contáctanos</h4>
					<p>
	Distribuidor Exclusivo para Colombia Link Grupo Marketing SAS<br>
	Teléfono: (+57)(2) 524 1887 - (+57) 313 7545092  <br> Email: contacto@piudali.com.co<br>
	<hr>
	Todos los derechos reservados Link Grupo Marketing SAS © 2016 <br>
	Diseñado por <a href="http://imarketing21.com" target="_new">iMarketing21</a> | Desarrollado por <a href="http://excinober.com" target="_new">Excinober Benites</a></p>

				</div>
			</div>
			<!--<div class="clearfix"></div>
			<hr/>
			<div class="col-xs-12">
				<center>
					<img src="assets/img/diferenciador.png" class="img-responsive">
				</center>
			</div>
		</div>-->
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
    <!--<script src="assets/js/jquery-3.1.0.min.js"></script>-->
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