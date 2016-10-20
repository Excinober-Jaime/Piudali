<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>
    <div class="contenPanel">			
	<div class="col-xs-12 titulo">
		<h1>Capacitación</h1>
        <small>Aquí encontrarás todo el material necesario para capacitarte en productos y desarrollo de tu negocio.</small>
		<hr>
		<div class="informacion">
			<div class="col-xs-12 col-md-3">
				<ul class="list-group">
          <li class="list-group-item"><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION."/?opcion="?>">PRESENTACIÓN</a></li>
				  <li class="list-group-item"><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION."/?opcion=".URL_USUARIO_CAPACITACION_INGREDIENTES?>">A-Z INGREDIENTES NATURALES</a></li>				  
				  <li class="list-group-item"><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION."/?opcion=".URL_USUARIO_CAPACITACION_PROTOCOLOS?>">PROTOCOLOS DE USO</a></li>
          <li class="list-group-item"><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION."/?opcion=".URL_USUARIO_CAPACITACION_VIDEOS?>">VIDEOS DE PROTOCOLOS</a></li>
				</ul>				
			</div>      
			<div class="col-xs-12 col-md-9">
      <?php
      if ($ingredientes) {

        foreach ($ingredientes as $key => $ingrediente) {
      ?>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?=$key?>">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key?>" aria-expanded="false" aria-controls="collapse<?=$key?>">
                  <?=$ingrediente["nombre"]?>
                </a>
              </h4>
            </div>
            <div id="collapse<?=$key?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$key?>">
              <div class="panel-body">
                <?=$ingrediente["descripcion"]?>
              </div>
            </div>
          </div>

        <?php
        }

      }elseif ($protocolos) {

        foreach ($protocolos as $key => $protocolo) {
      ?>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?=$key?>">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key?>" aria-expanded="false" aria-controls="collapse<?=$key?>">
                  <?=$protocolo["nombre"]?>
                </a>
              </h4>
            </div>
            <div id="collapse<?=$key?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$key?>">
              <div class="panel-body">
                <?=$protocolo["descripcion"]?>
              </div>
            </div>
          </div>
        <?php
        }

      }elseif ($videos) {
        foreach ($videos as $key => $video) {          
        ?>
          <div class="col-xs-12 col-md-6" style="margin-top: 0px;">
            <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="<?=$video?>" allowfullscreen></iframe>
            </div>
          </div>
        <?php
        }
      }else{
        ?>
        <div class="col-xs-12" style="margin-top: 0px;">        
          <iframe src="//www.slideshare.net/slideshow/embed_code/key/pTde05ewgmyRoK" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; width: 100%; height: 500px; max-width: 100%;" allowfullscreen> </iframe>
        </div>
        <?php
      }
		  ?>			
			</div>
            <div class="clearfix"></div>
		</div>
	</div>
    </div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
