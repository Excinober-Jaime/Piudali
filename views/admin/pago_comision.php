<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<h2>PAGO DE COMISIÓN <span class="pull-right"></span></h2>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="exampleInputEmail1">Monto</label>
						<div class="input-group">
						  <div class="input-group-btn">
						  	<button type="button" class="btn btn-primary">$</button>
						  </div>
					      <input type="text" class="form-control" value="<?=$monto?>" disabled="disabled" required>
					      <input type="hidden" name="monto" value="<?=$monto?>">
					    </div><!-- /input-group -->
					</div>
				    <!--<div class="form-group">
						<label for="exampleInputEmail1">Tipo de movimiento</label>
						<select name="tipo_movimiento" class="form-control" required>
							<option value="POSITIVO">POSITIVO</option>
							<option value="NEGATIVO">NEGATIVO</option>
						</select>
					</div>-->
					<div class="form-group">
						<label for="exampleInputEmail1">Descripción</label>
						<textarea name="descripcion" class="form-control" required>PAGO DE COMISIÓN <?=$nombre_campana?></textarea>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Adjunto</label>
						<input type="file" name="adjunto" class="form-control">
					</div>
					<input type="hidden" name="idusuario" value="<?=$idusuario?>">
					<input type="hidden" name="idcampana" value="<?=$idcampana?>">
					
					<button type="submit" name="pagarComision" class="btn btn-primary">Generar Movimiento</button>
				</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>