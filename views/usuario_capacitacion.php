<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>
    <div class="contenPanel">			
	<div class="col-xs-12 titulo">
		<h1>Capacitación</h1>
        <small>Aquí encontrarás todo el material necesario para capacitarte en productos y desarrollo de tu negocio.</small>
		<hr>
		<div class="informacion">
      <!--<h3 class="text-center">ESCUELA DE NEGOCIO</h3>-->
			<div class="col-xs-12 col-md-3">
				<ul class="list-group">
          <?php 
          if (count($categorias)>0) {
            foreach ($categorias as $key => $categoria) {
              ?>
              <li class="list-group-item"><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION."/?opcion=".$categoria['idcategoria']?>"><?=$categoria['titulo']?></a></li>
              <?php
            }
          }
          ?>
          <!--<li class="list-group-item"><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION."/?opcion=".URL_USUARIO_CAPACITACION_NEGOCIO?>">PRESENTACIÓN</a></li>-->
				  <li class="list-group-item"><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION."/?opcion=".URL_USUARIO_CAPACITACION_PROTOCOLOS?>">PROTOCOLOS DE USO</a></li>
          <li class="list-group-item"><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION."/?opcion=".URL_USUARIO_CAPACITACION_INGREDIENTES?>">A-Z INGREDIENTES NATURALES</a></li>				  				  
          <!--<li class="list-group-item"><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION."/?opcion=".URL_USUARIO_CAPACITACION_VIDEOS?>">VIDEOS DE PROTOCOLOS</a></li>
          <li class="list-group-item"><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION."/?opcion=".URL_USUARIO_CAPACITACION_VIDEOS_NEGOCIO?>">VIDEOS TUTORIALES</a></li>-->
				</ul>				
			</div>      
			<div class="col-xs-12 col-md-9">
        <div class="row">
          <div class="col-xs-12">
            <!--<img src="assets/img/escuela-de-negocio.png" class="img-responsive">-->
            <a href="<?=$banner_capacitacion[0]['link']?>">
              <img src="<?=$banner_capacitacion[0]['imagen']?>" class="img-responsive">
            </a>
          </div>
        </div>
        <hr>
      <?php    
      echo '<div clas="col-xs-12">'.$categoria_actual['contenido'].'</div>';


      if (count($elementos)>0) {
        
        switch (count($elementos)) {
          case 1:
            $col = "col-xs-12";
            break;

          case 2:
            $col = "col-xs-12 col-md-6";
            break;

          default:
            $col = "col-xs-12 col-md-6";
            break;
        }

        foreach ($elementos as $key => $elemento) {
  
            switch ($elemento["tipo"]) {
              case 'YOUTUBE':
          ?>
              <div class="<?=$col?>">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="<?=$elemento['contenido']?>" frameborder="0" allowfullscreen></iframe>
                </div>            
              </div>
            <?php
                break;
            case 'SLIDESHARE':
            ?>
              <div class="<?=$col?>">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="<?=$elemento['contenido']?>" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" allowfullscreen> </iframe>
                </div>
              </div>
            <?php
              break;
            case 'HTML':
            ?>
              <div class="<?=$col?>">
            <?php echo $elemento['contenido']; ?>
              </div>
            <?php
              break;

            case 'VIDEO':
              ?>
              <div class="<?=$col?>">
                <div class="embed-responsive embed-responsive-16by9">
                  <video width="320" height="240" controls>
                    <source src="<?=$elemento['contenido']?>" type="video/mp4">                
                  Your browser does not support the video tag.
                  </video>
                </div>
              </div>
              <?php
              break;

            case 'ENTRADA':
              ?>
              <div class="col-xs-12">
                <div class="thumbnail">
                  <?php if (!empty($elemento["imagen"])) {
                  ?>
                    <img src="<?=$elemento["imagen"]?>">
                  <?php
                  } ?>                
                  <div class="caption">
                    <h3><?=$elemento["titulo"]?></h3>
                    <p><?=$elemento["contenido"]?></p>                  
                  </div>
                </div>
              </div>
              <?php
              break;
              
              default:
                # code...
                break;
            }
        }

      }

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

      }/*elseif ($videos) {
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
      }elseif (!empty($url_tutorial_compra)){
        ?>
        <div class="col-xs-12" style="margin-top: 0px;">        
          <iframe src="<?=$url_tutorial_compra?>" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; width: 100%; height: 500px; max-width: 100%;" allowfullscreen> </iframe>
        </div>
        <?php
      }else{
        ?>
        <div class="col-xs-12" style="margin-top: 0px;">        
          <iframe src="<?=$url_presentacion?>" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; width: 100%; height: 500px; max-width: 100%;" allowfullscreen> </iframe>
        </div>
        <?php
      }*/
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
