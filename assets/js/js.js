$(document).ready(function(){

	$('[data-toggle="popover"]').popover();

	$(".open-modal").click(function(){
		var idpage = $(this).attr("idpage");

		$.get("ContenidoPagina/"+idpage, function(data) {
		  $(".modal-body").html(data);
		  $('.modal').modal();
		});
	})

	$('.img-popup').click(function(){

		var urlimg = $(this).attr('src');
		var nombreimg = $(this).attr('alt');

		if (nombreimg == '') {

			nombreimg = 'Pieza_Publicitaria';
		}

		var typeimg = $(this).attr('type');
		var extimg = $(this).attr('ext');
		var html = '<img src="'+urlimg+'" class="img-responsive"><br><a class="btn btn-primary" href="Descargar?doc='+urlimg+'&nombre='+nombreimg+'&type='+typeimg+'&ext='+extimg+'">Descargar imágen</a>';

		$('.modal-body').html(html);
		$('.modal').modal();

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
		var segmento = $("#formUsuarioJuridico select[name|='segmento']").val();

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

			/*if (segmento != 'Tienda Especializada' && segmento != 'Distribuidor Especializado') {

				//Registro en Mailchimp
				$.ajax({
				  type: 'POST',
				  crossDomain: true,
				  url: 'https://piudali.us16.list-manage.com/subscribe/post?u=38aa1fae8e888e044646240c1&amp;id=b8ebc5f9f4',
				  data: { EMAIL:email, FNAME:nombre, LNAME:apellido, MMERGE3:"", MMERGE4:"", MMERGE6:num_identificacion, MMERGE7:"", MMERGE8:telefono_m, MMERGE9:"", MMERGE10:"1", MMERGE12:razon_social, MMERGE13:"" },
				  success: function(data) {
				  	
				  	console.log(data);
				  },
				  error: function(err) {
						
						console.log(err);
				  }
				});

			}*/

			setTimeout(function(){
				$("#formUsuarioJuridico").submit();
			},2000);
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
		var segmento = $("#formUsuarioNatural select[name|='segmento']").val();

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

			/*if (segmento != 'Tienda Especializada' && segmento != 'Distribuidor Especializado') {

				//Registro en Mailchimp
				$.ajax({
				  type: 'POST',
				  crossDomain: true,
				  url: 'https://piudali.us16.list-manage.com/subscribe/post?u=38aa1fae8e888e044646240c1&amp;id=b8ebc5f9f4',
				  data: { EMAIL:email, FNAME:nombre, LNAME:apellido, MMERGE3:"", MMERGE4:"", MMERGE6:num_identificacion, MMERGE7:"", MMERGE8:telefono_m, MMERGE9:"", MMERGE10:"1", MMERGE12:"", MMERGE13:"" },
				  success: function(data) {
				  	
				  	console.log(data);
				  },
				  error: function(err) {
						
						console.log(err);			        
				  }
				});
			}*/

			setTimeout(function(){
				$("#formUsuarioNatural").submit();
			},2000);
		}
	})

	$(".tienda").click(function(){

		$(".tienda").removeClass("active");
		$(this).addClass("active");

		var iddistribuidor = $(this).attr("iddistribuidor");		

		openWindowMap(iddistribuidor);
	})

	$('#ingresarUsuario').click(function(){

		$(this).attr('disabled','disabled');
		$(this).text('INICIANDO...');

		var email = $('#email').val();
		var password = $('#password').val();
		var login_escuela = false;

		if (email != '' && password !='') {

			//Loguear en escuela virtual

			$.ajax({
			  type: 'POST',
			  url: 'formacion/wp-login.php',
			  //url: 'escuela.php',
			  data: { log:email, pwd:password, redirect_to:'https://piudali.com.co/formacion/', testcookie:'1' },
			  success: function(data){

			  	login_escuela = true;

			  	console.log(login_escuela);

			  	setTimeout(function(){ $('#form-login').submit(); }, 1000);
			  	
			  },
			  dataType: 'text'
			});
		
		}else{

			alert('Por favor ingresa tus datos de acceso.');
		}
	})

	$('#open-form-cuenta-bancaria').click(function(){

		$('#form-cuenta-bancaria').toggle();
	})

	$('#actualizar-cuenta').click(function(){

		$('#datos-cuenta-bancaria').toggle();
		$('#container-form-cuenta-bancaria').toggle();	
	})
})

var image = 'assets/img/marker.png';
var center = {lat: 5.0645004, lng: -71.9883374};
var contentString = '';
var marker = [];
var infowindow = [];

function initMap(distribuidores, ciudad) {

	var distribuidores = JSON.parse(distribuidores);
	//console.log(distribuidores);

	var myLatLng = center;

    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: myLatLng
    });

    
    /*var markerc = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Hello World!'
      
    });*/

    var geocoder = new google.maps.Geocoder();

    for (var i = 0; i < 10; i++) {
    	
    	if (distribuidores[i]["direccion"] != '') {
    		
	    	address = distribuidores[i]["direccion"]+", "+distribuidores[i]["ciudad"]+", Colombia";
	    	
	    	contentString = '<h3>'+distribuidores[i]["nombre"]+' '+distribuidores[i]["apellido"]+'</h3><p>'+distribuidores[i]["direccion"]+'<br>'+distribuidores[i]["ciudad"]+'<br>'+distribuidores[i]["telefono"]+'</p>';

	    	geocodeAddress(address, geocoder, map, contentString, distribuidores[i]["idusuario"]);

	    	//console.log(contentString);
	    	sleep(0);
	    }
    }
	
}


function geocodeAddress(address, geocoder, resultsMap, contentWindow, iddistribuidor) {
	//var address = document.getElementById('address').value;
	//var address = "Calle 48A # 29c - 11, Cali, Colombia";
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

function copyToClipboard(elemento) {

	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(elemento).text()).select();
	document.execCommand("copy");
	$temp.remove();

}