<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>		
	<div class="contenPanel">
	<div class="col-xs-12 titulo">
		<h1>Mis Distribuidores</h1>
        <small>Aquí encontrarás el listado de tus distribuidores directos</small>
	</div>
    <div class="clearfix"></div>
    <div class="informacion">
    <div class="col-xs-12 col-md-6">    	
		<a class="btn btn-default" href="<?=URL_SITIO.URL_REGISTRO."/?r=".$_SESSION["idusuario"]?>" title="Agregar distribuidor directo">
			<i class="fa fa-user-plus" aria-hidden="true"></i>			
		</a>
    </div>   
    <div class="col-xs-12 col-md-6">
		<form class="form-inline" method="post" id="filtros">			
			<div class="form-group">
				<label for="inputEmail3" class=" control-label">Filtro</label>
				<input type="text" name="texto-filtro" id="texto-filtro" class="form-control" onChange="javascript: document.getElementById('filtros').submit();">
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="control-label">Estado</label>
				<select name="estado" class="form-control" onChange="javascript: document.getElementById('filtros').submit();">
					<option value="">--Seleccione--</option>
					<option value="1">ACTIVOS</option>
					<option value="0">INACTIVO</option>					
				</select>						
			</div>				
		</form>
		<br>
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
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (count($clientes)>0) {
					foreach ($clientes as $key => $cliente) {
				?>
						<tr>
							<td class="text-center"><?=$cliente["nombre"]." ".$cliente["apellido"]?></td>
							<td class="text-center"><?=$cliente["telefono"]?></td>
							<td class="text-center"><?=$cliente["email"]?></td>							
							<td class="text-center"><?=$cliente["ciudad"]?></td>
							<td class="text-center"><?php if($cliente["estado"]==1){ echo "Activo"; }else{ echo "Inactivo"; } ?></td>
							<td class="text-center">
								<form method="post" action="<?=URL_INGRESO_REMOTO?>">
									<input type="hidden" value="<?=$cliente["email"]?>" name="email">
									<input type="hidden" value="<?=$cliente["password"]?>" name="password">
									<button type="submit" name="ingresoRemoto" class="btn btn-default" title="Ingresa como <?=$cliente["nombre"]." ".$cliente["apellido"]?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></button>
								</form>
							</td>
						</tr>
				<?php
					}
				}else{
				?>
					<tr>
						<td colspan="10" class="text-center">No tiene clientes actualmente.</td>
					</tr>
				<?php
				}
				?>				
			</tbody>
		</table>
	</div>
    <div class="clearfix"></div>
    </div>
    </div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
