<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<form method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="nombre" value="<?=$canal['nombre']?>" required>
						</div>						
						<div class="form-group">
							<label for="exampleInputEmail1">Monto Mínimo</label>
							<input type="text" class="form-control" name="monto_minimo" id="monto_minimo" value="<?=$canal['monto_minimo']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Puntos</label>
							<select class="form-control" name="puntos" required>
								<option value=''>--Seleccione--</option>
								<option value='1' <?php if ($canal['puntos']) echo 'selected'; ?>>Si</option>
								<option value='0' <?php if (!$canal['puntos']) echo 'selected'; ?>>No</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Referidos</label>
							<select class="form-control" name="referidos" required> 
								<option value=''>--Seleccione--</option>
								<option value='1' <?php if ($canal['referidos']) echo 'selected'; ?>>Si</option>
								<option value='0' <?php if (!$canal['referidos']) echo 'selected'; ?>>No</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Incentivos</label>
							<select class="form-control" name="incentivos" required>
								<option value=''>--Seleccione--</option>
								<option value='1' <?php if ($canal['incentivos']) echo 'selected'; ?>>Si</option>
								<option value='0' <?php if (!$canal['incentivos']) echo 'selected'; ?>>No</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Estado</label>
							<select name="estado" id="estado" class="form-control" required>
								<option value="1" <?php if ($canal['estado']) echo 'selected'; ?>>Activo</option>
								<option value="0" <?php if (!$canal['estado']) echo 'selected'; ?>>Inactivo</option>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="col-xs-12 col-md-12">
							<h3>Escalas Especiales</h3>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Mínimo</th>
										<th>Máximo</th>
										<th>Porcentaje</th>
										<!--<th>Acciones</th>-->
									</tr>
								</thead>
								<tbody id="escalas_e">
									<?php 
										if (isset($escalas) && count($escalas)>0) {
											foreach ($escalas as $key => $escala) {
												?>
												<tr>
													<td><?=convertir_pesos($escala["minimo"])?></td>
													<td><?=convertir_pesos($escala["maximo"])?></td>
													<td><?=$escala["porcentaje"]?>%</td>
												</tr>
												<?php
											}
										}
										?>
									<tr>								
										<td><input type="text" name="minimo[]" class="form-control"></td>
										<td><input type="text" name="maximo[]" class="form-control"></td>
										<td><input type="text" name="porcentaje[]" class="form-control"></td>
									</tr>
								</tbody>			  
							</table>
							<a class="pull-right" id="agregarEscalaEspecial">Agregar Escala</a>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<h3>Usuarios Vinculados</h3>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nombre</th>
									<th class="text-center">Acciones</th>									
								</tr>
							</thead>
							<tbody>
								<?php 
								if (count($usuarios)>0) {

									$ids_vinculados = array();

									foreach ($usuarios as $key => $usuario) {
								?>
								<tr>
									<td><?=$usuario["nombre"].' '.$usuario["apellido"]?></td>
									<td class="text-center">
										<a class="eliminar-usuario-escala-especial" idusuario="<?=$usuario["idusuario"]?>" idcanal="<?=$idcanal?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
									</td>
								</tr>
								<?php
										$ids_vinculados[] = $usuario["idusuario"];
									}
								}else{
									?>
									<tr><td>No hay usuarios vinculados a este descuento</td></tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
					<div class="col-xs-12 col-md-6">
						<h3>Vincular Usuarios</h3>
						<div class="w-100" style="max-height:400px;overflow-y:auto;">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Nombre</th>
										<th class="text-center">Vincular</th>									
									</tr>
								</thead>
								<tbody>
									<?php 
									if (count($distribuidores)>0) {
										foreach ($distribuidores as $key => $distribuidor) {
											
									?>
									<tr>
										<td><?=$distribuidor["nombre"].' '.$distribuidor["apellido"]?></td>
										<td class="text-center">

											<?php 
											if(!in_array($distribuidor["idusuario"], $ids_vinculados)){
											?>
												<a class="vincular-usuario-escala-especial" idusuario="<?=$distribuidor["idusuario"]?>" idcanal="<?=$canal["idmodelo"]?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
											<?php
											}else{
											?>
												<span class=" glyphicon glyphicon-check" aria-hidden="true"></span>
											<?php	
											}
											?>										
										</td>
									</tr>
									<?php
											
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<hr>
				<?php
				if (isset($idcanal) && $idcanal!='') {
				?>
					<button type="submit" name="actualizarCanal" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearCanal" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>