$(document).ready(function(){

	$(".agregarPdt").click(function(){

		idpdt = $(this).attr("idpdt");
		cantidad = $("#cantidad").val();

		$.ajax({
			type: 'POST',
			url: "Carrito/AgregarPdt",
			data: {	idpdt:idpdt, cantidad:cantidad },
			dataType: 'json',
			async: false,
			success: function(response) {
				$("#total-carrito").text("Total a pagar $"+response.total);
				$("#cantidad-carrito").text(response.cantidad);
				alert('El producto se agrego al carrito');
			},
			error: function() {
				alert('El producto no se agrego');
			}
		});
	});

	$(".cambiarCantidad").change(function(){
		idpdt = $(this).attr("idpdt");
		cantidad = $(this).val();	

		$.ajax({
			type: 'POST',
			url: "Carrito/ActualizarCantidadPdt",
			data: {	idpdt:idpdt, cantidad:cantidad },
			dataType: 'html',
			async: false,
			success: function(response) {
				if (response=="OK") {
					window.location="Carrito/";
				}
			},
			error: function() {
				alert('No fue posible cambiar la cantidad');
			}
		});
	});

	$(".eliminarPdtCarrito").click(function(){
		var idpdt = $(this).attr("idpdt");
		
		$.ajax({
			type: 'POST',
			url: "Carrito/EliminarPdtCarrito",
			data: {	idpdt:idpdt },
			dataType: 'html',
			async: false,
			success: function(response) {
				if (response=="OK") {
					window.location="Carrito/";
				}
			},
			error: function() {
				alert('No fue posible eliminar el producto');
			}
		});
	});

	$('[name="modalidad"]').click(function(){

		var modalidad = $(this).val();

		if (modalidad == 'NORMAL') {

			//$('#panel-metodologia-normal').show();
			//$('#panel-metodologia-dropshipping').hide();

			window.location.href='Carrito/?modalidad=1';

		}else if (modalidad == 'DROPSHIPPING'){

			//$('#panel-metodologia-normal').hide();
			//$('#panel-metodologia-dropshipping').show();

			window.location.href='Carrito/?modalidad=2';
		}
	});

	$('#guardarDropshipping').click(function(){

		var nombredp = $('#nombre_dp').val();
		var emaildp = $('#email_dp').val();
		var telefonodp = $('#telefono_dp').val();
		var movildp = $('#telefono_m_dp').val();
		var direcciondp = $('#direccion_dp').val();
		var ciudaddp = $('#ciudad_dp').val();


		if (nombredp == '') {

			alert('Por favor ingresa el nombre de tu cliente');
			$('#nombre_dp').focus();

		}else if(emaildp == ''){

			alert('Por favor ingresa el email de tu cliente');
			$('#email_dp').focus();

		}else if (telefonodp == '' && movildp == ''){

			alert('Por favor ingresa al menos un número telefónico de tu cliente');
			$('#telefono_m_dp').focus();

		}else if(direcciondp == ''){

			alert('Por favor ingresa la dirección de tu cliente');
			$('#direccion_dp').focus();

		}else if(ciudaddp == ''){

			alert('Por favor ingresa la ciudad de tu cliente');
			$('#ciudad_dp').focus();

		}else if (!$('#autorizacion_datos_dp').is(':checked')) {

			alert('Por favor autoriza el uso de datos personales');
			$('#autorizacion_datos_dp').focus();

		}else {

			$('#form-modalidad-dropshipping').submit();
		}
	});
	
})

	
