<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>	
    <div class="contenPanel">		
	<div class="col-xs-12 titulo">
	<h1>Referir</h1><small>Aquí podrás ver y agregar nuevos referidos distribuidores y ganar puntos por sus compras.</small>
	<hr>
	   	<div class="informacion">
	   		<div class="panel panel-info">
			  <div class="panel-heading">Puedes registrar tu referido directamente dando clic al siguiente botón</div>
			  <div class="panel-body">
			    <a href="<?=URL_SITIO.URL_REGISTRO."/?d=".$_SESSION["idusuario"]?>" class="btn btn-primary btn-lg">REGISTRAR REFERIDO</a>
			  </div>
			</div>
			<div class="col-xs-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-center">Nombre</th>
							<th class="text-center">Teléfono</th>
							<th class="text-center">Email</th>
							<th class="text-center">Ciudad</th>
							<th class="text-center">Estado</th>					
						</tr>
					</thead>
					<tbody>
						<?php 
						if (count($referidos)>0) {
							foreach ($referidos as $key => $referido) {
						?>
								<tr>
									<td class="text-center"><?=$referido["nombre"]." ".$referido["apellido"]?></td>
									<td class="text-center"><?=$referido["telefono"].' '.$referido["telefono_m"]?></td>
									<td class="text-center"><?=$referido["email"]?></td>							
									<td class="text-center"><?=$referido["ciudad"]?></td>
									<td class="text-center"><?php if($referido["estado"]==1){ echo "Activo"; }else{ echo "Inactivo"; } ?></td>		
								</tr>
						<?php
							}
						}else{
						?>
							<tr>
								<td colspan="10" class="text-center">No tienes referidos actualmente.</td>
							</tr>
						<?php
						}
						?>				
					</tbody>
				</table>
			</div>
		</div>	
    </div>	
    </div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
