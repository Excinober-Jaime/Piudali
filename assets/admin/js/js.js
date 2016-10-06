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

    CKEDITOR.replace('contenido');
    CKEDITOR.replace('uso');        
    //CKEDITOR.replace('presentacion');
    CKEDITOR.replace('descripcion');  
})