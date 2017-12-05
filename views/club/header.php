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

    <script type="text/javascript">
      <?php if (isset($json_maps) && !empty($json_maps)) { ?>
        var json_maps = '<?=$json_maps?>';
      <?php } ?>
    </script>
    </head>

<body <?php if(isset($json_maps) && !empty($json_maps)) { ?> onload="initMap(json_maps)" <?php } ?>>
  <!-- Return to Top -->
  <a href="javascript:" id="return-to-top">
    <i class="fa fa-arrow-up" aria-hidden="true"></i>
  </a>
  <div class="container">
    <div class="row">
    <header class="header-club">
       <div class="col s12 m3" style="padding-top:15px;">
          <a href="<?=URL_CLUB?>">
              <img src="assets/club/img/club-piudali.png" class="responsive-img" style="margin-top: 8px;">
          </a>        
        </div>
        <div class="col s12 m9">
             
          <?php 

          if (isset($response_codigo) && !empty($response_codigo)) {
            
          ?>
          <div class="col s12 m6">
              <center>
    
                <div class="card-panel red lighten-5">

                  <span class="black-text">
          <?php 

            switch ($response_codigo['estado']) {
        
              case 'REDIMIDO':
                echo 'Lo sentimos, el código ya fue redimido! <br><a class="blue-text text-darken-4" href="'.URL_CLUB.'">Intenta de nuevo</a>';
                break;

              case 'VENCIDO':
                echo 'Lo sentimos, el código se encuentra vencido! <br><a class="blue-text text-darken-4" href="'.URL_CLUB.'">Intenta de nuevo</a>';
                break;

              case 'AUTENTICAR':
                echo 'Tu código tiene '.number_format($response_codigo['codigo']['puntos']).' puntos. Por favor <a class="blue-text text-darken-4 open-iniciar">inicia sesión</a> o completa el <a class="blue-text text-darken-4 open-iniciar">registro</a> para que puedas registrarlos.';
                break;
              
              case 'ASIGNADO':
                echo 'Felicidades, tienes '.number_format($response_codigo['codigo']['puntos']).' nuevos puntos disponibles para redimir en premios. <br><a class="blue-text text-darken-4" href="'.URL_CLUB.'">Ingresar más códigos</a>';
                break;

              case 'NO EXISTE':
                echo 'Lo sentimos, el código no existe :( <br><a class="blue-text text-darken-4" href="'.URL_CLUB.'">Intenta de nuevo</a>';
                break;

              default:
                # code...
                break;
            }
            ?>  
                </span>
                </div>
              </center>
            </div>
            <?php 
          }else{
          ?>
              <div class="col s12 m6">
                <center>
                <p style="margin:15px 0; color: #41281b; font-size: 13px;" class="text-center">Ingresa aquí las claves alfanuméricas de <b>10 dígitos</b> impresas en los empaques o escanea el QR <i class="fa fa-qrcode" aria-hidden="true"></i>.</p>
                <form class="form-inline" method="post">
                  <div class="col s5 m5 l6">
                    <div class="form-group">
                      <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Ejemplo:15s56g6saq" required>
                    </div>
                  </div>
                  <div class="col s7 m7 l6">
                    <button type="submit" name="redimirCodigo" class="btn green darken-4">Registrar QR</button>
                  </div>
                </form>
                </center>
              </div>
          <?php } ?>

               <div class="col s12 m5 offset-m1">
                <div class="box-session-club text-center">
                  
                  
                <?php 
                  if (isset($_SESSION['idusuario']) && $_SESSION['tipo']=='CONSUMIDOR') {
                ?>
                      <div class="col s8">
                        <div class="saludoUsuario">¡Hola!, <?=$_SESSION['nombre']?></div>
                        <small>
                            <a href="<?=URL_CLUB.'/'.URL_CLUB_PERFIL?>">Mi Perfil</a> |
                            <a href="<?=URL_CLUB.'/'.URL_CLUB_BANCO_PUNTOS?>">Banco de Puntos</a>                        
                        </small>
                      </div>
                      <div class="col s4">
                        <a href="<?=URL_USUARIO.'/'.URL_SALIR.'?return='.URL_CLUB?>" class="enlanceClub">
                          <center><div class="btn-salir">SALIR</div></center>
                        </a>
                      </div>
                <?php
                  }else{
                ?>
                    <div class="col s6">                      
                        <a href="#" class="enlanceClub open-iniciar" id="">
                            <center><div class="btn-salir">Inicia sesión</div></center>
                        </a>
                    </div>
                    <div class="col s6">
                        <a href="#" class="enlanceClub open-registro" id="">
                          <center><div class="btn-salir">Registrate</div></center>
                        </a>
                    </div>
                <?php
                  }
                ?>

                  


                  <div class="clearfix"></div>
                </div>
                 <?php 
                  if (isset($_SESSION['idusuario']) && $_SESSION['tipo']=='CONSUMIDOR') {
                  ?>
                    <div class="box-session-verde text-center">
                        Tienes <strong><?=number_format(intval($puntos['disponibles']))?></strong> puntos
                    </div>
                  <?php } ?>
              </div>
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
      
      
      <div class="clearfix"></div>
      </header>
      </div>
    </div>
  <div class="franja"></div>
  
    <!--<nav class="white" style="border:0;box-shadow: none;">
      <center>-->
        <!--<a class="waves-effect green darken-1 btn-large" href="<?=URL_CLUB?>/#sobre-el-club"><i class="large material-icons right">group</i>SOBRE EL CLUB</a>
        <a class="waves-effect green darken-1 btn-large" href="<?=URL_CLUB?>/#premios">
          <i class="large material-icons right">card_giftcard</i> PREMIOS
        </a>
        <a class="waves-effect green darken-1 btn-large" href="<?=URL_CLUB?>/#enterate">
          <i class="large material-icons right">art_track</i> ENTÉRATE
        </a>
        <a class="waves-effect green darken-1 btn-large" href="<?=URL_CLUB?>/#donde-comprar">
          <i class="large material-icons right">location_on</i> ¿DÓNDE REDIMIR?
        </a>
        <a class="waves-effect green darken-1 btn-large" href="<?=URL_CLUB?>/#preguntas-frecuentes">
          <i class="large material-icons right">question_answer</i> PREGUNTAS FRECUENTES
        </a>
        <a class="waves-effect green darken-1 btn-large" href="<?=URL_CLUB?>/#contacto">
          <i class="large material-icons right">contact_phone</i> CONTÁCTO
        </a>-->
        <!--<a class="waves-effect btn-flat" href="<?=URL_CLUB?>/#sobre-el-club"><i class="large material-icons right">group</i>SOBRE EL CLUB</a>
        <a class="waves-effect btn-flat" href="<?=URL_CLUB?>/#premios">
          <i class="large material-icons right">card_giftcard</i> PREMIOS
        </a>
        <a class="waves-effect btn-flat" href="<?=URL_CLUB?>/#enterate">
          <i class="large material-icons right">art_track</i> ENTÉRATE
        </a>
        <a class="waves-effect btn-flat" href="<?=URL_CLUB?>/#donde-comprar">
          <i class="large material-icons right">location_on</i> ¿DÓNDE REDIMIR?
        </a>
        <a class="waves-effect btn-flat" href="<?=URL_CLUB?>/#preguntas-frecuentes">
          <i class="large material-icons right">question_answer</i> PREGUNTAS FRECUENTES
        </a>
        <a class="waves-effect btn-flat" href="<?=URL_CLUB?>/#contacto">
          <i class="large material-icons right">contact_phone</i> CONTÁCTO
        </a>-->

      <!--</center>-->
      <nav>
        <div class="nav-wrapper green darken-3">
          <div class="container">            
            <ul id="nav-mobile" class="left hide-on-med-and-down">
              <li><a href="<?=URL_CLUB?>/#premios">PREMIOS</a></li>
              <li><a href="<?=URL_CLUB?>/#enterate">ENTÉRATE</a></li>
              <li><a href="<?=URL_CLUB?>/#donde-comprar">¿DÓNDE REDIMIR?</a></li>
              <li><a href="<?=URL_CLUB?>/#preguntas-frecuentes">PREGUNTAS FRECUENTES</a></li>
              <li><a href="<?=URL_CLUB?>/#contacto">CONTÁCTO</a></li>
            </ul>
            <ul id="slide-out" class="side-nav">
              <!--<li>
              <div class="user-view">                
                <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
                <a href="#!name"><span class="white-text name">John Doe</span></a>
                <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
              </div></li>-->
              <li><a class="open-iniciar"><i class="material-icons">input</i>INICIAR SESIÓN</a></li>
              <li><a class="open-registro"><i class="material-icons">person_add</i>REGISTRARSE</a></li>
              <li><div class="divider"></div></li>
              <li><a href="<?=URL_CLUB?>/#premios">PREMIOS</a></li>
              <li><a href="<?=URL_CLUB?>/#enterate">ENTÉRATE</a></li>
              <li><a href="<?=URL_CLUB?>/#donde-comprar">¿DÓNDE REDIMIR?</a></li>
              <li><a href="<?=URL_CLUB?>/#preguntas-frecuentes">PREGUNTAS FRECUENTES</a></li>
              <li><a href="<?=URL_CLUB?>/#contacto">CONTÁCTO</a></li>
            </ul>
             <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
          </div>
        </div>
      </nav>
    <!--</nav>-->
  <div class="">



