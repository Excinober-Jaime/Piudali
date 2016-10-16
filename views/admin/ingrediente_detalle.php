<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Ingrediente</a></li>		  
			  <li class="active">Detalle</li>
			</ol>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?=$ingrediente['nombre']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Descripción</label>
					<textarea name="descripcion" id="contenido" class="form-control"><?=$ingrediente['descripcion']?></textarea>
				</div>			
				<?php
				if (isset($idingrediente) && $idingrediente!='') {
				?>
					<button type="submit" name="actualizarIngrediente" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearIngrediente" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>