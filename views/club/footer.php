    <div class="franja"></div>
       <footer class="page-footer green darken-3">
          <div class="container">
            <div class="row">
              <div class="col offset-l2 offset-m2 l4 m5 s12">
                <img src="https://piudali.com.co/assets/img/link-grupo-marketing.png" class="responsive-img" style="max-width: 200px;"><br>
                <img src="https://piudali.com.co/assets/img/piudali-footer.png" class="responsive-img" style="max-width: 200px;">
              </div>              
              <div class="col l4 m5 s12">
                <h5 class="white-text">Enlaces de Interés</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Términos y Condiciones</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Preguntas Frecuentes</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Política de Privacidad de Datos</a></li>
                </ul>
              </div>
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
      <div class="modal-content">
        <div class="row">
          <form class="col s12" method="post">
            <div class="row">
              <h4 class="center-align">Inicia sesión</h4>
              <div class="input-field offset-m3 col s12 m6">
                <input id="email-login" name="email" type="email" class="validate" value="servicioalcliente@piudali.com.co">
                <label for="email">Email</label>
              </div>
              <div class="input-field offset-m3 col s12 m6">
                <input id="password-login" name="password" type="password" class="validate" value="excinober">
                <label for="password">Contraseña</label>
              </div>
              <div class="col s12 center-align">
                <input type="hidden" id="return_login" name="return_login" value="">
                <button type="submit" name="ingresarUsuario" id="iniciar-sesion" class="waves-effect waves-light green darken-1 btn-large">Ingresar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
      </div>
    </div>

    <!-- Modal Registro -->
    <div id="modal-registro" class="modal">
      <div class="modal-content">
        <div class="row">
          <form class="col s12" method="post">
            <div class="row">
              <h4 class="center-align">Registrate</h4>
              <div class="input-field offset-m3 col s12 m6">
                <input id="num_identificacion" name="num_identificacion" type="text" class="validate" required="required">
                <label for="num_identificacion">Número de identificación</label>
              </div>
              <div class="input-field offset-m3 col s12 m6">
                <input id="nombre" name="nombre" type="text" class="validate" required="required">
                <label for="nombre">Nombre</label>
              </div>
              <div class="input-field offset-m3 col s12 m6">
                <input id="apellido" name="apellido" type="text" class="validate" required="required">
                <label for="apellido">Apellido</label>
              </div>
              <div class="input-field offset-m3 col s12 m6">
                <input id="email" name="email" type="email" class="validate" required="required">
                <label for="email">Email</label>
              </div>
              <div class="input-field offset-m3 col s12 m6">
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
              <div class="input-field offset-m3 col s12 m6">
                <input id="telefono" name="telefono" type="text" class="validate" required="required">
                <label for="telefono">Teléfono</label>
              </div>
              <div class="input-field offset-m3 col s12 m6">
                <input id="password" name="password" type="password" class="validate" required="required">
                <label for="password">Contraseña</label>
              </div>
              <div class="col s12 center-align">
                <button type="submit" name="registrarUsuario" class="waves-effect waves-light green darken-1 btn-large">Registrarme</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
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