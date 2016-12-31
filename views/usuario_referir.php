<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>	
    <div class="contenPanel">		
	<div class="col-xs-12 titulo">
	<h1>Referir</h1><small>Aquí podrás referir otros distribuidores y ganar puntos por sus compras.</small>
	<hr>    
	   	<div class="informacion">
	   		<div class="panel panel-info">
			  <div class="panel-heading">Puedes registrar tu referido directamente dando clic al siguiente botón</div>
			  <div class="panel-body">
			    <a href="<?=URL_SITIO.URL_REGISTRO."/?d=".$_SESSION["idusuario"]?>" class="btn btn-primary btn-lg">REGISTRAR REFERIDO</a>
			  </div>
			</div>	
		</div>	
    </div>	
    </div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
