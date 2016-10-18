<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>
    <div class="contenPanel">		
	<div class="col-xs-12 titulo">
	<h1>Cuenta Virtual</h1>
    <small>Aquí encontrarás tus movimientos financieros en tiempo real.</small>	
    </div>
    <div class="clearfix"></div>
    <div class="informacion">
    <div class="col-xs-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">FECHA</th>
					<th class="text-center">DESCRIPCIÓN</th>
					<th class="text-center">VALOR</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (count($movimientos)>0) {
					foreach ($movimientos as $key => $movimiento) {
				?>
						
				<?php
					}
				}else{
				?>
					<tr>
						<td colspan="3" class="text-center">No hay movimientos en tu cuenta.</td>
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
</div>
<br>
<br>
<?php include "footer.php"; ?>
