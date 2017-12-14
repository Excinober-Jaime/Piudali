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
                <input id="email" name="email" type="email" class="validate" value="servicioalcliente@piudali.com.co">
                <label for="email">Email</label>
              </div>
              <div class="input-field offset-m3 col s12 m6">
                <input id="password" name="password" type="password" class="validate" value="excinober">
                <label for="password">Contraseña</label>
              </div>
              <div class="col s12 center-align">
                <button type="submit" name="ingresarUsuario" class="waves-effect waves-light green darken-1 btn-large">Ingresar</button>
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
  	<script src="assets/js/js.js"></script>
    <script src="assets/js/carrito.js"></script>
    <script src="assets/js/return-to-top.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFBMLpxKg2tqIa4wVB4xA5rPsPl_-IfEQ">
	    </script>
      <script type="text/javascript">
        
         $(document).ready(function(){

            let modal_iniciar=new Materialize.Modal($("#modal-iniciar"));
            let modal_registro=new Materialize.Modal($("#modal-registro"));
            
            //$('.parallax').parallax();
             $('.carousel.carousel-slider').carousel({fullWidth: true});

             $(".button-collapse").sideNav();

            $('.open-iniciar').click(function(event){

              event.preventDefault();
              modal_iniciar.open();

            });

            $('.open-registro').click(function(event){

              event.preventDefault();
              modal_registro.open();

            });

            $('select').material_select();

            $(".tienda").click(function(){

              $(".tienda").removeClass("active");
              $(this).addClass("active");

              var iddistribuidor = $(this).attr("iddistribuidor");    

              openWindowMap(iddistribuidor);
            })

          });


var image = 'assets/img/marker.png';
var center = {lat: 5.0645004, lng: -71.9883374};
var contentString = '';
var marker = [];
var infowindow = [];

function initMap(distribuidores) {

  var distribuidores = JSON.parse(distribuidores);
  //console.log(distribuidores);

  var myLatLng = center;

    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: myLatLng
    });

    var geocoder = new google.maps.Geocoder();

    for (var i = 0; i < 10; i++) {
      
      if (distribuidores[i]["direccion"] != '') {
        
        address = distribuidores[i]["direccion"]+", "+distribuidores[i]["ciudad"]+", Colombia";
        
        contentString = '<h3>'+distribuidores[i]["nombre"]+'</h3><p>'+distribuidores[i]["direccion"]+'<br>'+distribuidores[i]["ciudad"]+'<br>'+distribuidores[i]["telefono"]+'</p>';

        geocodeAddress(address, geocoder, map, contentString, distribuidores[i]["idusuario"]);

        //console.log(contentString);
        sleep(0);
      }
    }
  
}


function geocodeAddress(address, geocoder, resultsMap, contentWindow, iddistribuidor) {
  
  console.log(address);
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {
      //resultsMap.setCenter(results[0].geometry.location);
      marker[iddistribuidor] = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location,
        icon: 'assets/img/marker.png'
      });

      if (contentWindow) {

        infowindow[iddistribuidor] = new google.maps.InfoWindow({
          content: contentWindow
        });

        marker[iddistribuidor].addListener('click', function() {
            infowindow[iddistribuidor].open(map, marker[iddistribuidor]);
        });
      }
    } else {
      console.log('Geocode was not successful for the following reason: ' + status);
    }
  });
}

function openWindowMap(iddistribuidor){
  infowindow[iddistribuidor].open(map, marker[iddistribuidor]);
}

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}
      </script>
    </body>
  </html>