$(document).ready(function(){

	$(".agregarPdt").click(function(){

		idpdt = $(this).attr("idpdt");
		cantidad = $("#cantidad").val();
		//isRegister = $(this).attr("isreg");
		isRegister = 1;

		$.ajax({
			type: 'POST',
			url: "Carrito/AgregarPdt",
			data: {	idpdt:idpdt, cantidad:cantidad },
			dataType: 'json',
			async: false,
			success: function(response) {
				//$("#total-carrito").text("Total a pagar $"+response.total);
				$("#cantidad-carrito").text(response.cantidad);
				
				//alert('El producto se agrego al carrito');
			},
			error: function() {
				//alert('Tenemos un inconveniente. Por favor inténtalo más tarde!');
			}
		});

		if (isRegister == 1) {

			window.location.href = 'Tienda/Carrito';
		}
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
					window.location="Tienda/Carrito/";
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
					window.location="Tienda/Carrito/";
				}
			},
			error: function() {
				alert('No fue posible eliminar el producto');
			}
		});
	});
});