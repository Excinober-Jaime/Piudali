 <!DOCTYPE html>
  <html>
    <head>

      <title>Club Piudalí</title>

      <meta charset="utf-8">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <meta name="description" content="PIUDALÍ Amazonian Skincare ofrece una línea de bienestar y cuidado para la piel con ingredientes de alta calidad de origen 100% natural">
      <meta name="author" content="Link Grupo Marketing en colaboración de Excinober Benites e iMarketing21">

      <base href="<?=URL_SITIO?>">

      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="assets/club/css/materialize.css"  media="screen,projection"/>

      <link rel="stylesheet" type="text/css" href="assets/club/css/style.css">
       <link href="assets/css/font-awesome.min.css" rel="stylesheet">
       <link href="assets/css/return-to-top.css" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

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
    </head>

<body>
  <!-- Return to Top -->
  <a href="javascript:" id="return-to-top">
    <i class="fa fa-arrow-up" aria-hidden="true"></i>
  </a>
  <div class="container">
     <header class="row header-club">
      <div class="col s3" style="margin-top: 10px;">
        <a href="<?=URL_CLUB?>">
            <img src="assets/club/img/club-piudali.png" class="responsive-img">
        </a> 
      </div>
      <div class="col s7">
        <div class="col s8">
          <div class="box-session-club center-align">
          <?php if (isset($_SESSION['idusuario'])) {  ?>
            <div class="col s8">
              <div class="saludoUsuario">¡Hola!, <?=$_SESSION['nombre'].' '.$_SESSION['apellido']?></div>
              <small><a href="#">Visitar Mi Perfil</a></small>
            </div>
            <div class="col s4">
              <a href="<?=URL_USUARIO."/".URL_SALIR?>" class="enlanceClub">
                <div class="btn-salir">SALIR</div>
              </a>
            </div>
            <?php }else{ ?>
             <div class="col s12">
              <div class="saludoUsuario">¿Ya tienes una cuenta?</div>
              <small><a data-toggle="modal" data-target="#club">Inicia sesión</a></small>
            </div>                  
            <?php  } ?>
            <div class="clearfix"></div>                  
          </div>
        </div>          
        <div class="col s4">
          <a href="<?=URL_SITIO?>" class="enlanceClub">
            <div class="box-session-verde center-align">
              Regresar a sitio corporativo
            </div>
          </a>
        </div>
      </div>
      <div class="col s2">
        <center>
        <?php if (isset($_SESSION['idusuario'])) {  ?>
        <div class="cantidad-puntos">
          <div class="puntos-header center-align">
            <div>Tienes</div>
            <div style="font-size: 35px; font-weight: 700;">
              <?php 

              if (isset($puntos) && !empty($puntos)) {
                
                echo $puntos['disponibles'];

              }else{

                echo '0';

              }

              ?>
              </div>
            <div>Puntos</div>
          </div>
        </div>
        <?php } ?>
        </center>
      </div>
    </header>
  </div>
  <div class="franja"></div>
  
    <nav class="white" style="border:0;box-shadow: none;">
      <center>
        <a class="waves-effect orange btn-large" href="<?=URL_CLUB?>/#sobre-el-club"><i class="large material-icons right">group</i>SOBRE EL CLUB</a>
        <a class="waves-effect orange btn-large" href="<?=URL_CLUB?>/#premios">
          <i class="large material-icons right">card_giftcard</i> PREMIOS
        </a>
        <a class="waves-effect orange btn-large" href="<?=URL_CLUB?>/#enterate">
          <i class="large material-icons right">art_track</i> ENTÉRATE
        </a>
        <a class="waves-effect orange btn-large" href="<?=URL_CLUB?>/#donde-comprar">
          <i class="large material-icons right">location_on</i> ¿DÓNDE COMPRAR?
        </a>
        <a class="waves-effect orange btn-large" href="<?=URL_CLUB?>/#contacto">
          <i class="large material-icons right">contact_phone</i> CONTÁCTO
        </a>
      </center>
    </nav>
    <div class="parallax-container" id="sobre-el-club">
      <div class="parallax"><img src="http://localhost/piudali/www/assets/img/banners/banner-linea-corporal-piudali(1).png">

        <div class="container">
          <div class="card" style="background-color: rgba(225,225,225,0.8);top: 100px;">
            <div class="card-content black-text">
              <span class="card-title">Sobre el Club</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>            
          </div>
        </div>

      </div>
    </div>
  <div class="">



