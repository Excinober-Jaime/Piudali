<div class="franja"></div>
<footer class="page-footer darken-3">
<div class="container">
      <div class="row">
        <div class="col s12 m2 offset-m1">
          <center>
            <img src="https://piudali.com.co/assets/img/link-grupo-marketing.png" class="responsive-img" style="max-width: 200px;"><br>
                <img src="https://piudali.com.co/assets/img/piudali-footer.png" class="responsive-img" style="max-width: 200px;">
          </center>
        </div>
          <div class="col m3 offset-m1">
  
        <ul>
          <!--<li><a href="https://piudali.com.co/Ingresar">Acceso Distribuidores</a></li>
          <li><a href="https://piudali.com.co/Ingresar">Acceso Corporativo</a></li>
          <li><a href="https://piudali.com.co/tiendas">Dónde Comprar</a></li>-->
    
          <!--<li><a href="https://piudali.com.co/sobre-waliwa">Quienes Somos</a></li>
          <li><a href="https://piudali.com.co/quienes-somos">Sobre Piudali</a></li>
          <li><a href="https://piudali.com.co/compromiso-social">Compromiso Social</a></li>-->
      
          <!--<li><a href="https://piudali.com.co/politica-datos">Políticas del Sitio Web</a></li>
          <li><a href="https://piudali.com.co/servicio-al-cliente">Servicio al Cliente</a></li>
          <li><a href="https://piudali.com.co/Contacto">Contáctenos</a></li>-->
        </ul>       
          </div>

          <div class="col m5">
            <br/>
            <!--Distribuidor Exclusivo para Colombia Link Grupo Marketing SAS<br/>-->
            
            <h5>Contácto</h5>
            Teléfono: (+57)(2) 524 1887 - (+57) 313 754 5092<br/>
            Email: contacto@piudali.com.co<br/>
            <div class="redes-sociales">
              <span>Síguenos en: </span>
                <a href="https://www.facebook.com/PiudaliColombia/" target="_new"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/piudalicolombia/" target="_new"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/channel/UCUu4Moh5uFyEyt1Dx0qxuMg" target="_new"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </div>
            <!--<div class="autor"><small>Todos los derechos reservados Link Grupo Marketing SAS © 2018 </small></div>-->
            
                  <!--<div class="autor"><small>Diseñado y Desarrollado por <a href="http://imarketing21.com/">iMarketing21</a></small></div>-->
          </div>
          <div class="clearfix"></div>
      </div>
      
    </div>
    <div class="footer-copyright">
            <div class="container">            
              <?php

                if (isset($this->distribuidor) && !empty($this->distribuidor)) {
                ?>
                <p class="left" style="text-transform: uppercase;"><?=$this->distribuidor['nombre']?> <?=$this->distribuidor['apellido']?> - DISTRIBUIDOR AUTORIZADO</p>
                <?php
                }
              ?>
              <p class="right">
                © 2018 Copyright Link Grupo Marketing SAS
              </p>
            </div>
          </div>
</footer>

    <!-- Modal Iniciar -->
    <div id="modal-iniciar" class="modal">
      <div class="franja"></div>
      <div class="modal-content">

        <div class="row">
          <a class="modal-action modal-close waves-effect waves-green btn-flat">X</a>

          <h4 class="center-align titulos">Inicia sesión</h4>
            <form class="col s12 m6 offset-m3 bg-form" method="post">
                <div class="input-field">
                  <input id="email-login" name="email" type="email" class="validate" value="servicioalcliente@piudali.com.co">
                  <label for="email">Email</label>
                </div>
                <div class="input-field">
                  <input id="password-login" name="password" type="password" class="validate" value="excinober">
                  <label for="password">Contraseña</label>
                </div>
                <div class="col s12 center-align">
                  <input type="hidden" id="return_login" name="return_login" value="">
                  <button type="submit" name="ingresarUsuario" id="iniciar-sesion" class="waves-effect waves-light btn btn-verde">CONTINUAR</button>
                  <a class="left closeLogOpenRegistro" style="cursor: pointer;">¿No tienes cuenta?</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Registro -->
    <div id="modal-registro" class="modal">
      <div class="franja"></div>
      <div class="modal-content">
        <div class="row">
          <a class="modal-action modal-close waves-effect waves-green btn-flat">X</a>
          <h4 class="center-align titulos">Crea tu Cuenta</h4>
          <form class="col s12 m8 offset-m2 bg-form" method="post">
            <div class="row">
              
              <div class="input-field">
                <input id="num_identificacion" name="num_identificacion" type="text" class="validate" required="required">
                <label for="num_identificacion">Número de identificación</label>
              </div>
              <div class="input-field">
                <input id="nombre" name="nombre" type="text" class="validate" required="required">
                <label for="nombre">Nombre</label>
              </div>
              <div class="input-field">
                <input id="apellido" name="apellido" type="text" class="validate" required="required">
                <label for="apellido">Apellido</label>
              </div>
              <div class="input-field">
                <input id="email" name="email" type="email" class="validate" required="required">
                <label for="email">Email</label>
              </div>
              <div class="input-field">
                <select class="" id="ciudad" name="ciudad" required>        
                  <option>Seleccione</option>
                  <?php 
                  foreach ($ciudades as $key => $ciudad) {
                    ?>
                    <option value="<?=$ciudad["idciudad"]?>"><?=$ciudad["ciudad"]?></option>
                    <?php
                  }
                  ?>
                </select>
                <label for="ciudad">Ciudad</label>
              </div>
              <div class="input-field">
                <input id="telefono" name="telefono" type="text" class="validate" required="required">
                <label for="telefono">Teléfono</label>
              </div>
              <div class="input-field">
                <input id="password" name="password" type="password" class="validate" required="required">
                <label for="password">Contraseña</label>
              </div>
              <div class="col s12 center-align">
                <button type="submit" name="registrarUsuario" class="waves-effect waves-light green darken-1 btn-large">CONTINUAR</button><br><br>
                <a class="closeRegistroOpenLog" style="cursor: pointer;">¿Ya tienes una cuenta?</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Element Showed -->
  <!--<a id="menu" class="waves-effect waves-light open-sobre-piudali btn btn-floating" style="position: fixed;right: 5%; bottom: 5%;background-color: red;"><i class="material-icons">menu</i></a>-->

  <!-- Tap Target Structure -->
  <!--<div class="tap-target" data-activates="menu">
    <div class="tap-target-content">
      <h5>Title</h5>
      <p>A bunch of text</p>
    </div>
  </div>-->

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  	<script type="text/javascript" src="assets/tienda/js/materialize.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFBMLpxKg2tqIa4wVB4xA5rPsPl_-IfEQ">
      </script>
    <script src="assets/tienda/js/carrito.js"></script>
    <script src="assets/tienda/js/js.js"></script>
    <script src="assets/js/return-to-top.js"></script>    
    </body>
  </html>