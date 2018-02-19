$(document).ready(function(){

  let modal_iniciar=new Materialize.Modal($("#modal-iniciar"));
  let modal_registro=new Materialize.Modal($("#modal-registro"));
  
  $('.parallax').parallax();
  
  $('.carousel').carousel({
      fullWidth: false,
      shift: 0,
      padding: 0,
      indicators: false,
      noWrap: false
  });

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

  $('.open-sobre-piudali').click(function(){

    $('.tap-target').tapTarget('open');

  });
  

});