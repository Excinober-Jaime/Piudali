<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>	
    <div class="contenPanel">		
	<div class="col-xs-12 titulo">
	<h1>Nuevo TICKET</h1>
  <small>Selecciona el tipo de ticket y en 24 horas daremos solución a tu caso.</small>
	<hr>
    <div class="col-xs-12 col-md-6 col-md-offset-3">
      <form method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Tipo de ticket</label>
          <select name="tipo" class="form-control" required>
            <option value="">--Seleccione--</option>
            <option value="PREGUNTA">PREGUNTA</option>
            <option value="QUEJA">QUEJA</option>
            <option value="RECLAMO">RECLAMO</option>
            <option value="SOLICITUD">SOLICITUD</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Descripción</label>
          <textarea class="form-control" name="descripcion" required></textarea>
        </div>
        <button type="submit" name="crearTicket" class="btn btn-primary">CREAR TICKET</button>
      </form>
    </div>  
  </div>	
  </div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
