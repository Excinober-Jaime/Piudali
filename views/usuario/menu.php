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
<hr>
<div class="row">
	<div class="col-xs-12">
		<div class="alert alert-info text-center" role="alert">TU PERFIL ES DE <?=$_SESSION['tipo']?></div>	
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<ul class="nav nav-pills pull-right">

		<?php
			switch ($_SESSION["tipo"]) {
				case 'DISTRIBUIDOR':
		?>
				<div class="btn-group" role="group" aria-label="...">
					<a href="<?=URL_USUARIO?>" class="btn btn-success">Perfil</a>
					<a href="<?=URL_USUARIO."/".URL_USUARIO_NEGOCIO?>" class="btn btn-success">Mis Compras</a>
					<a href="<?=URL_USUARIO."/".URL_USUARIO_PUNTOS?>" class="btn btn-success">Puntos</a>
					<a href="<?=URL_USUARIO."/".URL_USUARIO_PREMIOS?>" class="btn btn-success">Premios</a>
					<a href="<?=URL_USUARIO."/".URL_USUARIO_INCENTIVOS?>" class="btn btn-success">Incentivos</a>
					<a href="<?=URL_USUARIO."/".URL_USUARIO_PROMOCIONES?>" class="btn btn-success">Promociones</a>
					<a href="<?=URL_USUARIO."/".URL_USUARIO_CUPONES?>" class="btn btn-success">Cupones de Descuento</a>
					<a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION?>" class="btn btn-success">Capacitación</a>

					<div class="btn-group" role="group">
					    <a type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					      Políticas
					      <span class="caret"></span>
					    </a>
					    <ul class="dropdown-menu">
					      <li><a class="open-modal" idpage="15">Condiciones Comerciales</a></li>
					      <li><a class="open-modal" idpage="14">Políticas de Datos</a></li>
					      <li><a class="open-modal" idpage="16">Como Realizar Pedidos</a></li>
					    </ul>
					</div>				
				</div>

					<!--<li role="presentation" <?php if ($moduloActual == URL_USUARIO_PERFIL) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO?>">Perfil</a></li>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_NEGOCIO) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_NEGOCIO?>">Mis Compras</a></li>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_PUNTOS) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_PUNTOS?>">Puntos</a></li>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_PREMIOS) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_PREMIOS?>">Premios</a></li>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_INCENTIVOS) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_INCENTIVOS?>">Incentivos</a></li>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_PROMOCIONES) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_PROMOCIONES?>">Promociones</a></li>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_CUPONES) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_CUPONES?>">Cupones de Descuento</a></li>	  
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_CAPACITACION) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION?>">Capacitación</a></li>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_POLITICAS) { echo 'class="active"';  } ?>><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				      Políticas <span class="caret"></span>
				    </a>
				    <ul class="nav nav-pills dropdown-menu">
				      <li><a class="open-modal" idpage="15">Condiciones Comerciales</a></li>
				      <li><a class="open-modal" idpage="14">Políticas de Datos</a></li>
				      <li><a class="open-modal" idpage="16">Como Realizar Pedidos</a></li>
				    </ul>
					</li>	-->				
		<?php
					break;
				case 'LIDER':
		?>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_PERFIL) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO?>">Perfil</a></li>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_CLIENTES) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_CLIENTES?>">Mis clientes</a></li>
					<li role="presentation" <?php if ($moduloPerfil == URL_USUARIO_NEGOCIO) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_NEGOCIO?>">Mi negocio</a></li>				
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_INCENTIVOS) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_INCENTIVOS?>">Incentivos</a></li>
					<li role="presentation" <?php if ($moduloPerfil == URL_USUARIO_CUENTA) { echo "class='active'";  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_CUENTA?>">Cuenta virtual</a></li>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_CAPACITACION) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION?>">Capacitación</a></li>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_DOCUMENTOS) { echo 'class="active"';  } ?>><a href="<?=URL_USUARIO."/".URL_USUARIO_DOCUMENTOS?>">Documentos</a></li>
					<li role="presentation" <?php if ($moduloActual == URL_USUARIO_POLITICAS) { echo 'class="active"';  } ?>><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				      Políticas <span class="caret"></span>
				    </a>
				    <ul class="nav nav-pills dropdown-menu">
				      <li><a class="open-modal" idpage="18">Políticas Comerciales</a></li>
				      <li><a class="open-modal" idpage="19">Proceso Comercial</a></li>
				      <li><a class="open-modal" idpage="20">Gestión de Clientes</a></li>
				    </ul>
					</li>
		<?php
					break;
				case 'DIRECTOR':
					# code...
					break;
				
				default:
					# code...
					break;
			}
		?>		  
		</ul>
	</div>
</div>