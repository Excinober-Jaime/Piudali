$(document).ready(function(){

     var updateOutput = function (e) {
         var list = e.length ? e : $(e.target),
                 output = list.data('output');
         /*if (window.JSON) {
             output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
         } else {
             output.val('JSON browser support required for this demo.');
         }*/
     };

     // activate Nestable for list 2
     $('#nestable2').nestable({
         group: 1
     }).on('change', updateOutput);

     // output initial serialised data     
     updateOutput($('#nestable2').data('output', $('#nestable2-output')));

     $('#data_5 .input-daterange').datepicker({
     	format: 'yyyy-mm-dd',
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });


     $("#fecha_inicio, #fecha_fin").change(function(){
     	$("#form-fechas").submit();
     });

    $("#agregarEscalaDis").click(function(){
        $("#escalas_d").append('<tr><td><input type="text" name="minimo_d[]" class="form-control"></td><td><input type="text" name="maximo_d[]" class="form-control"></td><td><input type="text" name="porcentaje_d[]" class="form-control"></td></tr>');
    });


    $("#agregarEscalaLider").click(function(){
        $("#escalas_l").append('<tr><td><input type="text" name="minimo_l[]" class="form-control"></td><td><input type="text" name="maximo_l[]" class="form-control"></td><td><input type="text" name="porcentaje_l[]" class="form-control"></td></tr>');
    });

    $("#agregarEscalaIncentivo").click(function(){
        $("#escalas_incentivo").append('<tr><td><input type="text" name="minimo[]" class="form-control"></td><td><input type="text" name="maximo[]" class="form-control"></td><td><input type="text" name="bono[]" class="form-control"></td></tr>');
    });

    $("#agregarEscalaEspecial").click(function(){
        $("#escalas_e").append('<tr><td><input type="text" name="minimo[]" class="form-control"></td><td><input type="text" name="maximo[]" class="form-control"></td><td><input type="text" name="porcentaje[]" class="form-control"></td></tr>');
    });

    /*$(".eliminarOrden").click(function(){
        var idorden = $(this).attr("idorden");

        var r = confirm("¿Seguro que desea eliminar la orden? Se eliminará la orden, sus productos y puntos asociados");

        if (r) {

            $.ajax({
                type: 'POST',
                url: "Admin/Ordenes/EliminarOrden",
                data: { idorden:idorden },
                dataType: 'json',
                async: false,
                success: function(response) {
                    alert('Se elimino '+response.filas+' orden(s)');
                    location.reload();
                },
                error: function() {
                    alert('No se pudo eliminar la orden');
                }
            });
        }
    });

    $(".eliminarCupon").click(function(){
        var idcupon = $(this).attr("idcupon");

        var r = confirm("¿Seguro que desea eliminar el cupón?");

        if (r) {

            $.ajax({
                type: 'POST',
                url: "Admin/Cupones/EliminarCupon",
                data: { idcupon:idcupon },
                dataType: 'json',
                async: false,
                success: function(response) {
                    alert('Se elimino '+response.filas+' cupón(es)');
                    location.reload();
                },
                error: function() {
                    alert('No se pudo eliminar el cupón');
                }
            });
        }
    });*/

    $(".eliminarEntidad").click(function(){

        var entidad = $(this).attr("entidad");
        var identidad = $(this).attr("identidad");

        var r = confirm("¿Seguro que desea eliminar "+entidad+"?");

        if (r) {

            $.ajax({
                type: 'POST',
                url: "Admin/EliminarEntidad",
                data: { identidad:identidad, entidad:entidad },
                dataType: 'json',
                async: false,
                success: function(response) {

                        if (response.filas==false) {
                            alert("No se pudo eliminar la entidad. Es posible que otros elementos dependan de ella.");                            
                        }else{
                            alert('Se elimino '+response.filas+' '+response.entidad);
                            location.reload();
                        }
                },
                error: function() {
                    alert('No se pudo eliminar el registro');
                }
            });
        }
    });

    $("#tipo").change(function(){
        var tipo = $(this).val();
        if (tipo=="REPRESENTANTE COMERCIAL" || tipo=="DIRECTOR") {
            $("#lider").val("");
            $("#lider").css("display","none");
        }else if (tipo=="DISTRIBUIDOR DIRECTO"){
            $("#lider").css("display","block");
        }

        if (tipo=="REPRESENTANTE COMERCIAL"){
            $("#cod_lider").css("display","block");
        }else{
            $("#cod_lider").val(0);
            $("#cod_lider").css("display","none");
        }
    });

    $("#tipo-elemento").change(function(){
        var tipo = $(this).val();

        if (tipo=="ENTRADA") {
            $("#img-field").show();
            
        }else{
            $("#img-field").hide();
            
        }
    });

    $(".vincular-usuario-escala-especial").click(function(){
        var idusuario = $(this).attr("idusuario");
        var idmodelo = $(this).attr("idmodelo");

        if (idusuario!='') {
            $.ajax({
                type: 'POST',
                url: "Admin/ModelosNegocioDistribuidores/VincularUsuario",
                data: { idusuario:idusuario, idmodelo:idmodelo },
                dataType: 'text',
                async: false,
                success: function(response) {

                        if (response==true) {
                            alert("El usuario se vinculó con éxito");
                        }else{
                            alert("Error al vincular el usuario");                            
                        }

                        location.reload();
                },
                error: function() {
                    alert('No se pudo vincular el usuario');
                }
            });
        }
    });

    $("#top-search").keypress(function( event ) {
      if ( event.which == 13 ) {
         event.preventDefault();
         searchadmin();
      }
    });

    $("#search").click(function(){
        searchadmin();
    })

    var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
                }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

    CKEDITOR.replace('contenido');
    CKEDITOR.replace('uso');        
    //CKEDITOR.replace('presentacion');
    CKEDITOR.replace('descripcion');  
})

function searchadmin(){
    
        var search = $("#top-search").val();
        var trs = $(".datos > tr").toArray();
        var tds = Array();
        var coincidencia = 0;

        if (search !='') {

            for (var i = 0; i < trs.length; i++) {

                coincidencia = 0;
                
                tds = $(trs[i]).find("td").toArray();   

                for (var j = 0; j < tds.length; j++) {
                    
                    if ($(tds[j]).text() == search) {
                        coincidencia++;
                        break;
                    }
                }

                if (coincidencia == 0) {
                    $(trs[i]).hide();
                }
            }

        }else{
            $("tr").show();
        }
}