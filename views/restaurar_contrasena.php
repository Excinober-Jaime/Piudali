<?php include "header.php"; ?>

<div class="container">			
	<h1 class="text-center">Restaurar Contraseña</h1>
	<center>
	<div class="col-md-3 hidden-xs">	</div>
	<div class="col-xs-12 col-md-6 center-block">
		<div class="panel panel-default">
			<div class="panel-body">  
			<form method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="email" name="email" class="form-control" placeholder="Email" required>
			  </div>			  
			  <button type="submit" name="restaurar" class="btn btn-default btn-lg">RESTAURAR</button>
			</form>
			</div>
		</div>
	</div>
	</center>
</div>

<?php include "footer.php"; ?>