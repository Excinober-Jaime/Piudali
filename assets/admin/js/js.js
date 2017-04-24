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

    $(".eliminarOrden").click(function(){
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