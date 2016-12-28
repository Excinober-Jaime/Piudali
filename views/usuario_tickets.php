<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>	
    <div class="contenPanel">		
	<div class="col-xs-12 titulo">
	<h1>Tickets PQRS</h1><small>Aquí podrás generar tickets para hacer seguimiento a tus preguntas, quejas, reclamos o solicitudes.</small>
	<hr>
    <?php 
    if (count($tickets)>0) {
   	?>
   	<div class="informacion">
	   	<table class="table table-striped">
	  		<thead>
	  			<tr>
	  				<th>Código</th>
	  				<th>Tipo</th>
	  				<th>Estado</th>
	  				<th>Fecha</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			<?php
	  				foreach ($tickets as $key => $ticket) {
	  					?>
	  					<tr>
	  						<td><a href="<?=URL_USUARIO."/".URL_USUARIO_TICKETS."/".$ticket["idticket"]?>"><?=$ticket["codigo"]?></a></td>
	  						<td><?=$ticket["tipo"]?></td>
	  						<td><?=$ticket["estado"]?></td>
	  						<td><?=$ticket["fecha_registro"]?></td>
	  					</tr>
	  					<?php
	  				}
	  			?>
	  		</tbody>
		</table>
	</div>
   	<?php
    }
    ?>    
    <a href="<?=URL_USUARIO."/".URL_USUARIO_TICKETS."/Nuevo"?>" class="btn btn-default">Crear Ticket</a>    
    </div>	
    </div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
