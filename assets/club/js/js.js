$(document).ready(function(){

  let modal_iniciar=new Materialize.Modal($("#modal-iniciar"));
  let modal_registro=new Materialize.Modal($("#modal-registro"));
  
  $('.parallax').parallax();
  
  $('.carousel.carousel-slider').carousel({fullWidth: true});

  setInterval(function(){

    $('.carousel.carousel-slider').carousel('next');

  },6000);

   $(".button-collapse").sideNav();

  $('.open-iniciar').click(function(event){

    var return_url = $(this).attr('return');
    $('#return_login').val(return_url);
    event.preventDefault();
    modal_iniciar.open();

  });

  $('.open-registro').click(function(event){

    event.preventDefault();
    modal_registro.open();

  });

  $('.closeLogOpenRegistro').click(function(){

    modal_iniciar.close();
    
    setTimeout(function(){

      modal_registro.open();

    }, 500);

  });

  $('.closeRegistroOpenLog').click(function(){

    modal_registro.close();
    
    setTimeout(function(){

      modal_iniciar.open();

    }, 500);

  });

  $('select').material_select();

  $(".tienda").click(function(){

    $(".tienda").removeClass("active");
    $(this).addClass("active");

    var iddistribuidor = $(this).attr("iddistribuidor");    

    openWindowMap(iddistribuidor);
  })

  $('#ciudad-sucursales').change(function(){
    $('#form-ciudad-sucursales').submit();
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