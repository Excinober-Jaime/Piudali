<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Nombre</label>
					<input type="text" class="form-control" name="nombre" value="<?=$suscriptor['nombre']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input type="text" class="form-control" name="email" value="<?=$suscriptor['email']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Fecha registro</label>
					<input type="text" class="form-control" name="fecha" value="<?=$suscriptor['fecha']?>" disabled>
				</div>
				<?php
				if (isset($idsuscriptor) && $idsuscriptor!='') {
				?>
					<button type="submit" name="actualizarSuscriptor" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearSuscriptor" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>
				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>