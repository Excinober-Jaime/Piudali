        
                <div class="footer">
                    <div class="pull-right">
                        10GB of <strong>250GB</strong> Free.
                    </div>
                    <div>
                        <strong>Copyright</strong> Piudalí &copy; 2016
                    </div>
                </div>

            </div>
        </div>
        <!-- Mainly scripts -->
        <script src="assets/admin/js/jquery-2.1.1.js"></script>
        <script src="assets/admin/js/bootstrap.min.js"></script>
        <script src="assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="assets/admin/js/inspinia.js"></script>
        <script src="assets/admin/js/plugins/pace/pace.min.js"></script>

        <script src="include/ckeditor/ckeditor.js"></script>
        <script src="include/ckeditor/config.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){

            $("#agregarEscalaDis").click(function(){
                $("#escalas_d").append('<tr><td><input type="text" name="minimo_d[]" class="form-control"></td><td><input type="text" name="maximo_d[]" class="form-control"></td><td><input type="text" name="porcentaje_d[]" class="form-control"></td></tr>');
            })


            $("#agregarEscalaLider").click(function(){
                $("#escalas_l").append('<tr><td><input type="text" name="minimo_l[]" class="form-control"></td><td><input type="text" name="maximo_l[]" class="form-control"></td><td><input type="text" name="porcentaje_l[]" class="form-control"></td></tr>');
            })
            
            CKEDITOR.replace('contenido');
            CKEDITOR.replace('uso');        
            CKEDITOR.replace('presentacion');
            CKEDITOR.replace('descripcion');        
        });
        </script>

    </body>

</html>