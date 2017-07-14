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

	$("#crearCuentaJuridica").click(function(){

		var nombre = $("#formUsuarioJuridico input[name|='nombre']").val();
		var apellido = $("#formUsuarioJuridico input[name|='apellido']").val();
		var num_identificacion = $("#formUsuarioJuridico input[name|='num_identificacion']").val();
		var email = $("#formUsuarioJuridico input[name|='email']").val();
		var telefono = $("#formUsuarioJuridico input[name|='telefono']").val();
		var telefono_m = $("#formUsuarioJuridico input[name|='telefono_m']").val();
		var password = $("#formUsuarioJuridico input[name|='password']").val();
		var password2 = $("#formUsuarioJuridico input[name|='password2']").val();
		var dia_nacimiento = $("#formUsuarioJuridico input[name|='dia_nacimiento']").val();
		var mes_nacimiento = $("#formUsuarioJuridico input[name|='mes_nacimiento']").val();

		var razon_social = $("#formUsuarioJuridico input[name|='razon_social']").val();
		var nit = $("#formUsuarioJuridico input[name|='nit']").val();

		if (nombre=="") {
			alert("Por favor ingrese el nombre");
		}else if (apellido=="") {
			alert("Por favor ingrese el apellido");
		}else if (num_identificacion=="") {
			alert("Por favor ingrese el número de identificación");
		}else if (email=="") {
			alert("Por favor ingrese el email");
		}else if (telefono=="" && telefono_m=="") {
			alert("Por favor ingrese un número de teléfono");
		}else if (password=="") {
			alert("Por favor ingrese una contraseña");
		}else if (password2=="") {
			alert("Por favor repita la contraseña");
		}else if (password != password2) {
			alert("Las contraseña no coinciden");
		}else if (razon_social == "") {
			alert("Por favor ingrese la razón social");
		}else if (nit == "") {
			alert("Por favor ingrese el nit");
		}else{

			$(this).text("CARGANDO...");

			//Registro en Constant Contact

			$.ajax({
			  type: 'POST',
			  crossDomain: true,
			  url: 'https://visitor2.constantcontact.com/api/signup',
			  data: { ca:"d49ae990-6aec-4703-8dd2-43bd0626645c", list:"1688625949", source:"EFD", required:"list,email,first_name", url:"", email:email, first_name:nombre, last_name:apellido, phone:telefono, birthday_month:mes_nacimiento, birthday_day:dia_nacimiento },
			  success: function(data, status, xhr) {
			  	console.log("Registrado en constant contact");
			  	//console.log(data);
			  },
			  error: function(xhr, status, err) {
					/*json = xhr.responseJSON;
			        console.log(xhr);
			        console.log(status);
			        console.log(err);*/
			  }
			});

			setTimeout(function(){
				$("#formUsuarioJuridico").submit();
			},4000);
		}
	})

	$("#crearUsuarioNatural").click(function(){

		var nombre = $("#formUsuarioNatural input[name|='nombre']").val();
		var apellido = $("#formUsuarioNatural input[name|='apellido']").val();
		var num_identificacion = $("#formUsuarioNatural input[name|='num_identificacion']").val();
		var email = $("#formUsuarioNatural input[name|='email']").val();
		var telefono = $("#formUsuarioNatural input[name|='telefono']").val();
		var telefono_m = $("#formUsuarioNatural input[name|='telefono_m']").val();
		var password = $("#formUsuarioNatural input[name|='password']").val();
		var password2 = $("#formUsuarioNatural input[name|='password2']").val();
		var dia_nacimiento = $("#formUsuarioNatural input[name|='dia_nacimiento']").val();
		var mes_nacimiento = $("#formUsuarioNatural input[name|='mes_nacimiento']").val();


		if (nombre=="") {
			alert("Por favor ingrese el nombre");
		}else if (apellido=="") {
			alert("Por favor ingrese el apellido");
		}else if (num_identificacion=="") {
			alert("Por favor ingrese el número de identificación");
		}else if (email=="") {
			alert("Por favor ingrese el email");
		}else if (telefono=="" && telefono_m=="") {
			alert("Por favor ingrese un número de teléfono");
		}else if (password=="") {
			alert("Por favor ingrese una contraseña");
		}else if (password2=="") {
			alert("Por favor repita la contraseña");
		}else if (password != password2) {
			alert("Las contraseña no coinciden");
		}else{

			$(this).text("CARGANDO...");

			//Registro en Constant Contact

			$.ajax({
			  type: 'POST',
			  crossDomain: true,
			  url: 'https://visitor2.constantcontact.com/api/signup',
			  data: { ca:"d49ae990-6aec-4703-8dd2-43bd0626645c", list:"1688625949", source:"EFD", required:"list,email,first_name", url:"", email:email, first_name:nombre, last_name:apellido, phone:telefono, birthday_month:mes_nacimiento, birthday_day:dia_nacimiento },
			  success: function(data, status, xhr) {
			  	console.log("Registrado en constant contact");
			  	//console.log(data);
			  },
			  error: function(xhr, status, err) {
					/*json = xhr.responseJSON;
			        console.log(xhr);
			        console.log(status);
			        console.log(err);*/
			  }
			});

			setTimeout(function(){
				$("#formUsuarioNatural").submit();
			},4000);
		}
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
