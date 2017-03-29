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
})