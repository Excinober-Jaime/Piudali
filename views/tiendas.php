<?php include "header.php"; ?>

<div class="container">
	<div class="col-xs-5">
		<!--<?=$pagina_detalle["contenido"]?>-->
		<h2>Cali</h2>
		<div class="row" style="font-size:0.8em;">
		  <div class="col-xs-12 col-md-6">
		  	<div class="panel panel-default">
  				<div class="panel-body">	    
			        <h4>Natural Vitalis</h4>
			        <p>TIENDA ONLINE 24/7<br>
						www.naturalvitalis.com<br>
						Teléfonos: (2) 430 5058 - 311 627 9068<br>
						​Email: contacto@naturalvitalis.com
					</p>
			        <p>
			        	<a href="#" class="btn btn-primary btn-sm" role="button">Llamar <i class="fa fa-phone" aria-hidden="true"></i></a> 
			        	<a class="btn btn-default btn-sm tienda" dir="Carrera 65A # 9 - 60" ciudad="Cali" pais="Colombia" role="button">Ver Mapa <i class="fa fa-map-marker" aria-hidden="true"></i></a>
			        </p>
		      </div>
		    </div>
		  </div>
		  <div class="col-xs-12 col-md-6">
		    <div class="panel panel-default">
  				<div class="panel-body">	
			        <h4>Artemisa</h4>
			        <p>www.artemisa.co<br>
						Domicilios: (2) 4873030<br>
						TIENDA EN CALI


					</p>
			        <p><a href="#" class="btn btn-primary btn-sm" role="button">Llamar <i class="fa fa-phone" aria-hidden="true"></i>
					</a> <a  class="btn btn-default btn-sm tienda" dir="Cra 5 # 12-16" ciudad="Cali" pais="Colombia" role="button">Ver Mapa <i class="fa fa-map-marker" aria-hidden="true"></i>
					</a></p>
		      </div>
		    </div>
		  </div>
		</div>
		<h2>Tuluá</h2>
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<div class="panel panel-default">
	  				<div class="panel-body pt-0">	
					    <h4>Artemisa</h4>
					    <p>www.artemisa.co<br>
							Domicilios: (2) 4873030<br>
							TIENDA EN CALI
						</p>
					    <p><a  href="#" class="btn btn-primary btn-sm" role="button">Llamar <i class="fa fa-phone" aria-hidden="true"></i>
	</a> <a class="btn btn-default btn-sm" role="button">Ver Mapa <i class="fa fa-map-marker" aria-hidden="true"></i>
	</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-7">
		<!-- 16:9 aspect ratio -->
		<div class="embed-responsive embed-responsive-16by9 container-map">
		  <div id="map" class="embed-responsive-item"></div>
		</div>
	</div>
</div>
<br>
<br>

<script>


	  /*var image = 'assets/img/marker.png';
	  var center = {lat: -81.9883374, lng: 4.0645004};
      
      function initMap() {

        var myLatLng = center;

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: myLatLng
        });

        

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!',
          icon: image
        });

        var geocoder = new google.maps.Geocoder();

        geocodeAddress(geocoder, map);
      }

       function geocodeAddress(geocoder, resultsMap) {
        //var address = document.getElementById('address').value;
        var address = "Calle 48A # 29c - 11, Cali, Colombia";
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }*/


    </script>
    


<?php include "footer.php"; ?>