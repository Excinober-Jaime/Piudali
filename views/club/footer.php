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
          <li><a href="https://piudali.com.co/Ingresar">Acceso Distribuidores</a></li>
          <li><a href="https://piudali.com.co/Ingresar">Acceso Corporativo</a></li>
          <li><a href="https://piudali.com.co/tiendas">Dónde Comprar</a></li>
    
          <li><a href="https://piudali.com.co/sobre-waliwa">Quienes Somos</a></li>
          <li><a href="https://piudali.com.co/quienes-somos">Sobre Piudali</a></li>
          <li><a href="https://piudali.com.co/compromiso-social">Compromiso Social</a></li>
      
          <li><a href="https://piudali.com.co/politica-datos">Políticas del Sitio Web</a></li>
          <li><a href="https://piudali.com.co/servicio-al-cliente">Servicio al Cliente</a></li>
          <li><a href="https://piudali.com.co/Contacto">Contáctenos</a></li>
        </ul>       
          </div>

          <div class="col m5">
            <br/>
            Distribuidor Exclusivo para Colombia Link Grupo Marketing SAS<br/>
            Teléfono: (+57)(2) 524 1887 - (+57) 311 627 9068<br/>
            Email: contacto@piudali.com.co<br/>
            <div class="redes-sociales">
              <span>Síguenos en: </span>
                    <a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                      <a href="#" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                      <a href="#" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                  </div>
            <div class="autor"><small>Todos los derechos reservados Link Grupo Marketing SAS © 2018 </small></div>
            
                  <div class="autor"><small>Diseñado y Desarrollado por <a href="http://imarketing21.com/">iMarketing21</a></small></div>
          </div>
          <div class="clearfix"></div>
      </div>
      
    </div>
    <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright Link Grupo Marketing
            <a class="grey-text text-lighten-4 right" href="<?=URL_SITIO?>">Ir a www.piudali.com.co</a>
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
                  <button type="submit" name="ingresarUsuario" id="iniciar-sesion" class="waves-effect waves-light btn btn-verde">Ingresar</button>
                  <a class="left closeLogOpenRegistro" style="cursor: pointer;font-size: 12px;">¿No tienes cuenta?</a>
                  <a class="left" style="cursor: pointer;font-size: 12px;">¿Olvidaste tu contraseña?</a>
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
          <h4 class="center-align titulos">Registrate</h4>
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
                <button type="submit" name="registrarUsuario" class="waves-effect waves-light green darken-1 btn-large">Registrarme</button><br><br>
                <a class="closeRegistroOpenLog" style="cursor: pointer;">¿Ya tienes una cuenta?</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  	<script type="text/javascript" src="assets/club/js/materialize.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFBMLpxKg2tqIa4wVB4xA5rPsPl_-IfEQ">
      </script>
    <script src="assets/club/js/carrito.js"></script>
    <script src="assets/club/js/js.js"></script>
    <script src="assets/js/return-to-top.js"></script>    
    </body>
  </html>