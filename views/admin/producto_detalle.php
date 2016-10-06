<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Productos</a></li>		  
			  <li class="active">Detalle</li>
			</ol>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?=$producto[0]['nombre']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Código</label>
					<input type="text" class="form-control" name="codigo" id="codigo" value="<?=$producto[0]['codigo']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Categoría</label>
					<select name="categoria" id="categoria" class="form-control" required>					
						<?php 
						foreach ($categorias as $key => $categoria) {
						?>
							<option value="<?=$categoria['idcategoria']?>" <?php if ($producto[0]['categorias_idcategoria']==$categoria['idcategoria']) echo "selected"; ?>><?=$categoria['nombre']?></option>
						<?php
						}
						?>					
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Compañía</label>
					<select name="compania" id="compania" class="form-control" required>
						<option value="1">WALIWA</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Relevancia</label>
					<select name="relevancia" id="relevancia" class="form-control" required>
						<option value="1" <?php if ($producto[0]['relevancias_idrelevancia']==1) echo "selected"; ?>>Muy Relevante</option>
						<option value="3" <?php if ($producto[0]['relevancias_idrelevancia']==3) echo "selected"; ?>>Relevante</option>
						<option value="4" <?php if ($producto[0]['relevancias_idrelevancia']==4) echo "selected"; ?>>Normal</option>
						<option value="2" <?php if ($producto[0]['relevancias_idrelevancia']==2) echo "selected"; ?>>Poco Relevante</option>
					</select>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="form-group">
						<label for="exampleInputEmail1">Imágen Principal</label>
						<input type="file" name="img_principal" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<?php
					if (!empty($producto[0]['img_principal'])) {				
					
					?>
						<img src="<?=$producto[0]['img_principal']?>" class="img-responsive" style="max-width: 300px;">
					<?php
					}	
					?>				
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Registro</label>
					<input type="text" class="form-control" name="registro" id="registro" value="<?=$producto[0]['registro']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Cantidad</label>
					<input type="number" class="form-control" name="cantidad" id="cantidad" value="<?=$producto[0]['cantidad']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Costo</label>
					<div class="input-group">
				      <div class="input-group-addon">$</div>
				      <input type="text" class="form-control" name="costo" id="costo" value="<?=$producto[0]['costo']?>" required>
				      <div class="input-group-addon">.00</div>
				    </div>			
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Precio Público</label>
					<div class="input-group">
				      <div class="input-group-addon">$</div>
				      <input type="text" class="form-control" name="precio" id="precio" value="<?=$producto[0]['precio']?>" required>
				      <div class="input-group-addon">.00</div>
				    </div>			
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Precio Oferta</label>
					<div class="input-group">
				      <div class="input-group-addon">$</div>
				      <input type="text" class="form-control" name="precio_oferta" id="precio_oferta" value="<?=$producto[0]['precio_oferta']?>" required>
				      <div class="input-group-addon">.00</div>
				    </div>			
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">IVA</label>
					<div class="input-group">
				      <input type="text" class="form-control" id="iva" name="iva" value="<?=$producto[0]['iva']?>" required>
				      <div class="input-group-addon">%</div>
				    </div>			
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Aplica cupón</label>
					<input type="checkbox" name="aplica_cupon" value="1" class="form-control" <?php if ($producto[0]['aplica_cupon']) echo "checked"; ?> required>
				</div>		
				<div class="form-group">
					<label for="exampleInputEmail1">Presentación</label>
					<input type="text" name="presentacion" class="form-control" value="<?=$producto[0]['presentacion']?>">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Descripción</label>
					<textarea name="descripcion" id="descripcion" class="form-control"><?=$producto[0]['descripcion']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Uso</label>
					<textarea name="uso" id="uso" class="form-control"><?=$producto[0]['uso']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Más Información</label>
					<textarea name="mas_info" id="contenido" class="form-control contenido"><?=$producto[0]['mas_info']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Metas</label>
					<textarea name="metas" class="form-control"><?=$producto[0]['metas']?></textarea>
				</div>		
				<div class="form-group">
					<label for="exampleInputEmail1">Tipo</label>
					<select name="tipo" id="tipo" class="form-control" required>
						<option value="NORMAL" <?php if ($producto[0]['tipo']=='NORMAL') echo 'selected'; ?>>NORMAL</option>
						<option value="PREMIO" <?php if ($producto[0]['tipo']=='PREMIO') echo 'selected'; ?>>PREMIO</option>
						<option value="PROMOCION" <?php if ($producto[0]['tipo']=='PROMOCION') echo 'selected'; ?>>PROMOCION</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($producto[0]['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$producto[0]['estado']) echo 'selected'; ?>>Inactivo</option>
					</select>
				</div>
				<?php
				if (isset($idproducto) && $idproducto!='') {
				?>
					<button type="submit" name="actualizarProducto" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearProducto" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>
				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>