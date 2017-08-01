<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PIUDALÍ Amazonian Skincare ofrece una línea de bienestar y cuidado para la piel con ingredientes de alta calidad de origen 100% natural">
    <meta name="author" content="Link Grupo Marketing en colaboración de Excinober Benites e iMarketing21">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">    

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Piudalí Colombia</title>

    <base href="<?=URL_SITIO?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/return-to-top.css" rel="stylesheet">

    <style type="text/css">
      body{
        font-family: 'Open Sans', sans-serif;
      }

    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-80277968-1', 'auto');
    ga('send', 'pageview');

  </script>
  <!--Start of Zendesk Chat Script-->
  <script type="text/javascript">
  window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
  d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
  _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
  $.src="https://v2.zopim.com/?4N01XhSlB3VxmzRKfI542gkx8YzOeR4C";z.t=+new Date;$.
  type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
  </script>
  <!--End of Zendesk Chat Script-->

  <script type="text/javascript">
    <?php if (isset($json_maps) && !empty($json_maps)) { ?>
      var json_maps = '<?=$json_maps?>';
    <?php } ?>
  </script>
  </head>
  <body <?php if(isset($onload) && !empty($onload)) { ?> onload="<?=$onload?>" <?php } ?>
    <?php if(isset($json_maps) && !empty($json_maps)) { ?> onload="initMap(json_maps)" <?php } ?>
  >
    <!-- Return to Top -->
    <a href="javascript:" id="return-to-top">
      <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </a>
    <div class="container">
    	<div class="col-xs-12 col-md-3" style="padding-top:15px;">
        	<a href="<?=URL_SITIO?>">
          		<img src="assets/img/logo-piudali.png" class="img-responsive center-block">
        	</a>        
      	</div>
      	<div class="col-xs-12 col-md-6">
          <?php include "ingresar-club.php"; ?>
      		<span>Contacto: </span>
	      	<span class="whatsapp">
	          <i class="fa fa-whatsapp" aria-hidden="true"></i> (+57) 311 627 9068 
	          <i class="fa fa-phone" aria-hidden="true"></i>  (57) (2) 5241887
	        </span>
	        <form class="form-inline form-search" id="form-buscar" method="get" action="<?=URL_BUSCAR."/"?>">
          		<div class="form-group">
        			<label class="sr-only">Buscar</label>
        			<div class="input-group">              
          				<input type="text" name="buscar" class="form-control" placeholder="Buscar">
          				<div class="input-group-addon"><i class="fa fa-search" aria-hidden="true" onClick="javascript: document-getElementById('form-buscar').submit();"></i></div>
        			</div>
          		</div>          
        	</form>
        </div>

      <!--<div class="col-xs-12 col-md-3 text-center social">
        <a href="https://www.instagram.com/piudalicolombia/" title="Instagram" target="_new">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="https://www.facebook.com/Piudali-Colombia-1698229213799755/" title="Facebook" target="_new">
          <i class="fa fa-facebook-official" aria-hidden="true"></i>
        </a>        
        <a href="https://www.youtube.com/channel/UCUu4Moh5uFyEyt1Dx0qxuMg" target="_new">
          <i class="fa fa-youtube-square" aria-hidden="true"></i>
        </a>
      </div>-->
      
      <div class="col-xs-12 col-md-3">
        <div class="box-session text-center">

          <?php 
            if (!empty($_SESSION["idusuario"])):
          ?>
              <a href="<?=URL_USUARIO."/".URL_USUARIO_PERFIL?>" style="color:#fff;"><i class="fa fa-user" aria-hidden="true"></i> <?=$_SESSION["nombre"]?></a> |
              <a href="<?=URL_USUARIO."/".URL_SALIR?>" style="color:#fff;"> Salir <i class="fa fa-sign-out" aria-hidden="true"></i></a>
          <?php 
            else:
          ?>             
              <a href="<?=URL_INGRESAR?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Acceso Distribuidor</a> |
              <a href="<?=URL_REGISTRO?>">Registrate</a>   
          <?php 
            endif;
          ?>
        </div>
        <br>
        <a href="<?=URL_CARRITO?>" class="btn btn-small btn-block btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Productos Agregados <span class="badge" id="cantidad-carrito"><?=Carrito::productosAgregados()?></span></a>
        <a href="<?=URL_CARRITO?>" class="btn btn-small btn-block btn-primary" id="total-carrito">Total a pagar $<?=number_format(Carrito::totalCarrito())?></a>
        <br>
      </div>
    </div>
    <div class="franja"></div>
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="#">Brand</a>-->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?=URL_SITIO?>">INICIO <span class="sr-only">(current)</span></a></li>            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUCTOS <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php 
                foreach ($paginas_menu["CATEGORIAS MENU"] as $key => $categoria) {
                ?>
                  <li><a href="<?=URL_CATEGORIA.'/'.$categoria['url']?>"><?=$categoria['nombre']?></a></li>
                <?php  
                }
                ?>
                <li><a href="<?=URL_PRODUCTOS?>">TODOS</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">QUIÉNES SOMOS <span class="caret"></span></a>
              <ul class="dropdown-menu">
            <?php 
            foreach ($paginas_menu as $pagina) {
              if ($pagina["posicion"]=="QUIENES SOMOS") {
              ?>
                <li><a href="<?=$pagina['url']?>"><?=$pagina["titulo"]?></a></li>
              <?php
              }
            }
            ?>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DÓNDE COMPRAR <span class="caret"></span></a>
              <ul class="dropdown-menu">
            <?php 
            foreach ($paginas_menu as $pagina) {
              if ($pagina["posicion"]=="DONDE COMPRAR") {
              ?>
                <li><a href="<?=$pagina['url']?>"><?=$pagina["titulo"]?></a></li>
              <?php
              }
            }
            ?>
              </ul>
            </li>            
            <?php 
            foreach ($paginas_menu as $pagina) {
              if ($pagina["posicion"]=="SIN CATEGORIA") {
              ?>
                <li><a href="<?=$pagina['url']?>"><?=$pagina["titulo"]?></a></li>
              <?php
              }
            }
            ?>
            <!--<li><a href="/blog">BLOG</a></li>-->
            <li><a href="<?=URL_CONTACTO?>">CONTÁCTO</a></li>
          </ul>  

             
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>