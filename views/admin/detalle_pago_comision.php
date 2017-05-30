<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<h2>DETALLE PAGO COMISIÓN <span class="pull-right"></span></h2>
			<table class="table table-striped">
				<tr>
					<td>Id pago</td>
					<td><?=$pago_comision_campana["idpago"]?></td>
				</tr>
				<tr>
					<td>Valor</td>
					<td><?=convertir_pesos($pago_comision_campana["valor"])?></td>
				</tr>
				<tr>
					<td>Descripción</td>
					<td><?=$pago_comision_campana["descripcion"]?></td>
				</tr>
				<tr>
					<td>Fecha</td>
					<td><?=$pago_comision_campana["fecha"]?></td>
				</tr>
				<tr>
					<td>Adjunto</td>
					<td>
					<?php if (!empty($pago_comision_campana["adjunto"])) { ?>
						<a href="<?=$pago_comision_campana["adjunto"]?>" target="_new">Descargar</a>
					<?php }else{ echo "No contiene adjuntos"; } ?></td>
				</tr>
			</table>		
		</div>
	</div>
</div>
<?php include "footer.php"; ?>