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
		var data = '<img src="'+img+'" class="img-responsive">';
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
})