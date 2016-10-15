<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Protocolo</a></li>		  
			  <li class="active">Detalle</li>
			</ol>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?=$protocolo['nombre']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Descripción</label>
					<textarea name="descripcion" id="contenido" class="form-control"><?=$protocolo['descripcion']?></textarea>
				</div>			
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" class="form-control">
						<option value="1" <?php if($protocolo['estado']) echo "selected";  ?>>ACTIVO</option>
						<option value="0" <?php if(!$protocolo['estado']) echo "selected";  ?>>INACTIVO</option>
					</select>
				</div>			
				<?php
				if (isset($idprotocolo) && $idprotocolo!='') {
				?>
					<button type="submit" name="actualizarProtocolo" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearProtocolo" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>