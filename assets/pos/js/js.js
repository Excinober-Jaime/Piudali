$(document).ready(function(){


	$('#redimirPuntos').click(function(){

		var valor = $('#valor').val();
		var max = $('#valor').attr('max');

		if (valor == '') {

			alert('Debes ingresar el valor que vas a redimir');

		}else{

			if (valor <= max) {

				confirm = confirm('Estás seguro que deseas redimir $'+valor+' a este cliente?');

				if (confirm) {

					$('#form-redimir').submit();	
					
				}

			}else{

				alert('El valor que intenta redimir es superior al valor acumulado en puntos');
			}
			
		}
	})
});