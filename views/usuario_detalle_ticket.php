<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>	
    <div class="contenPanel">		
	<div class="col-xs-12 titulo">
	<h1>TICKET <small><?=$ticket["codigo"]?></small></h1>
    <!--<small>Aquí encontrarás los incentivos que puedes ganar y cuanto te falta para alcanzarlos.</small>
	<hr>	-->
    <div class="informacion">
    <h3><?=$ticket["tipo"]?></h3>
    <h4><?=$ticket["descripcion"]?></h4>
    <hr>  
    <?php 
    if (count($mensajes_ticket)>0) {
      
      foreach ($mensajes_ticket as $key => $mensaje) {          
      ?>        
        <?php
          if ($mensaje["emisor"]=="EMPRESA") {
        ?>
          <div class="panel panel-success">
            <div class="panel-heading">Piudalí</div>
        <?php
          }else{
        ?>
          <div class="panel panel-info">
            <div class="panel-heading"><?=$_SESSION["nombre"]?></div>
        <?php
          }
        ?>
          
          <div class="panel-body">
            <?=$mensaje["mensaje"]?>
            <h6 class="text-right"><?=$mensaje["fecha_registro"]?></h6>
          </div>
        </div>
      <?php
      }

    }else{
    ?>      
      <p>No existen mensajes.</p>
    <?php
    }
    ?>
    <hr>
    <?php 
    if ($ticket["estado"]=='CERRADO') {
    ?>
    <p>Este ticket se encuentra cerrado.</p>
    <?php
    }else{
    ?>
      <form method="post">
        <div class="form-group">          
          <textarea class="form-control" name="mensaje" required></textarea>
        </div>
        <button type="submit" name="agregarMensaje" class="btn btn-primary">AGREGAR MENSAJE</button>
      </form>
    <?php }    ?>
    </div>
  </div>	
  </div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
