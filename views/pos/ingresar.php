<?php include 'views/pos/header.php'; ?>

<div class="container-fluid text-center" style="max-width: 400px;">
	<img src="assets/img/logo-piudali.png" class="img-fluid">
	<hr>
	<form method="post">
	  <div class="form-group">
	    <label for="Email">Email</label>
	    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su email" required="required">	    
	  </div>
	  <div class="form-group">
	    <label for="Password">Contraseña</label>
	    <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required="required">
	  </div>	  
	  <button type="submit" name="loguear" class="btn btn-primary">INGRESAR</button>
	</form>
</div>

<?php include 'views/pos/footer.php'; ?>