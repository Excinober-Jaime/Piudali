<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Campañas</a></li>		  
			  <li class="active">Detalle</li>
			</ol>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?=$campana['nombre']?>" required>
				</div>						
				<div class="form-group">
					<label for="exampleInputEmail1">Fecha Inicio</label>
					<input type="date" class="form-control" name="fecha_ini" id="fecha_ini" value="<?=$campana['fecha_ini']?>" required>
				</div>						
				<div class="form-group">
					<label for="exampleInputEmail1">Fecha Final</label>
					<input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?=$campana['fecha_fin']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Monto Mínimo</label>
					<input type="text" class="form-control" name="monto_minimo" id="monto_minimo" value="<?=$campana['monto_minimo']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($campana['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$campana['estado']) echo 'selected'; ?>>Inactivo</option>
					</select>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<h3>Escalas Distribuidores</h3>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Mínimo</th>
									<th>Máximo</th>
									<th>Porcentaje</th>
								</tr>
							</thead>
							<tbody id="escalas_d">
								<?php 
									if (isset($escalas_dis) && count($escalas_dis)>0) {
										foreach ($escalas_dis as $key => $escala) {
											?>
											<tr>
												<td><?=$escala["minimo"]?></td>
												<td><?=$escala["maximo"]?></td>
												<td><?=$escala["porcentaje"]?>%</td>
											</tr>
											<?php
										}
									}
									?>
								<tr>								
									<td><input type="text" name="minimo_d[]" class="form-control"></td>
									<td><input type="text" name="maximo_d[]" class="form-control"></td>
									<td><input type="text" name="porcentaje_d[]" class="form-control"></td>
								</tr>
							</tbody>			  
						</table>
						<a class="pull-right" id="agregarEscalaDis">Agregar Escala</a>
					</div>
					<div class="col-xs-12 col-md-6">
						<h3>Escalas Líderes</h3>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Mínimo</th>
									<th>Máximo</th>
									<th>Porcentaje</th>
								</tr>
							</thead>
							<tbody id="escalas_l">
								<?php 
									if (isset($escalas_lider) && count($escalas_lider)>0) {
										foreach ($escalas_lider as $key => $escala) {
											?>
											<tr>
												<td><?=$escala["minimo"]?></td>
												<td><?=$escala["maximo"]?></td>
												<td><?=$escala["porcentaje"]?>%</td>
											</tr>
											<?php
										}
									}
								?>
								<tr>
									<td><input type="text" name="minimo_l[]" class="form-control"></td>
									<td><input type="text" name="maximo_l[]" class="form-control"></td>
									<td><input type="text" name="porcentaje_l[]" class="form-control"></td>
								</tr>
							</tbody>
						</table>
						<a class="pull-right" id="agregarEscalaLider">Agregar Escala</a>
					</div>
				</div>
				<hr>
				<?php
				if (isset($idcampana) && $idcampana!='') {
				?>
					<button type="submit" name="actualizarCampana" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearCampana" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>
				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>