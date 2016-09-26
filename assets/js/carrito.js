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
	})
	
})

	
