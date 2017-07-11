var image = 'assets/img/marker.png';
var center = {lat: 4.0645004, lng: -81.9883374};

$(document).ready(function(){
	$(".open-modal").click(function(){
		var idpage = $(this).attr("idpage");

		$.get("ContenidoPagina/"+idpage, function(data) {
		  $(".modal-body").html(data);
		  $('.modal').modal();
		});
	})

	$(".open-incentivo").click(function(){
		var img = $(this).attr("img");
		var descripcion = $(this).attr("descripcion");
		var data = '<img src="'+img+'" class="img-responsive"><br><p>'+descripcion+'</p>';
		$(".modal-body").html(data);
		$('.modal').modal();
	})

	$("#enviar_newsletter").click(function(){

		var email = $("#nombre_newsletter").val();
		var nombre = $("#email_newsletter").val();

		if (email !='' && nombre !='') {

			$.ajax({
			  type: "POST",
			  url: "SuscribirNewsletter/",
			  data: $("#form-newsletter").serialize(),
			  success: function(data){
			  	alert(data);
			  },
			  dataType: 'html'
			});
		}else{
			alert("Debes diligenciar el nombre y el email");
		}
	})

	$(".mostrar-ordenes-distribuidor").click(function(){

		var iddistribuidor = $(this).attr("iddistribuidor");
		$(".ordenes-distribuidor-"+iddistribuidor).toggle();
	})

	$(".mostrar-nivel").click(function(){

		var nivel = $(this).attr("nivel");		
		$(".distribuidores-nivel"+nivel).toggle();
	})

	$( "[name|='codigo_representante']" ).click(function(){
		var enable_cod_rep = $(this).val();
		if (enable_cod_rep==1) {
			$(".box-cod-rep").show('slow');
		}else{
			$(".box-cod-rep").hide('slow');
		}
	})
	

	/*$( "[name|='codigo_representante2']" ).click(function(){
		var enable_cod_rep = $(this).val();
		if (enable_cod_rep==1) {
			$("#box-cod-rep2").show('slow');
		}else{
			$("#box-cod-rep2").hide('slow');
		}
	})*/

	$(".tienda").click(function(){

		var dir = $(this).attr("dir");
		var ciudad = $(this).attr("ciudad");
		var pais = $(this).attr("pais");

		var address = dir+", "+ciudad+", "+pais;

		initMap(address);
	})
})

function initMap(address) {

    var myLatLng = center;

    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: myLatLng
    });

    
    /*var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Hello World!',
      icon: image
    });*/

    var geocoder = new google.maps.Geocoder();

    geocodeAddress(address, geocoder, map);
}

function geocodeAddress(address, geocoder, resultsMap) {
        //var address = document.getElementById('address').value;
        //var address = "Calle 48A # 29c - 11, Cali, Colombia";
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location,
              icon: 'assets/img/marker.png'
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
