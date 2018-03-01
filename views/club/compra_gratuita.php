<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="container">
	<div class="row">
		<div class="col s12">
			<h4 class="center-align">¡Tu orden fue exitosa!</h4>
			<p class="flow-text center-align">Pronto nos contactaremos contigo</p>
			<table>
	          <tr>
	            <td>Estado de la transaccion</td>
	            <td><?php echo $estado; ?> </td>
	          </tr>
	          <tr>
	            <td>Referencia de la transaccion </td>
	            <td><?php echo $codigo_orden; ?> </td>
	          </tr>
	          <tr>
	            <td>Valor total</td>
	            <td><?php echo convertir_pesos($total); ?> </td>
	          </tr>	         
	        </table>
	        
	          <a href="<?=URL_SITIO.URL_CLUB?>" class="btn-large orange">REGRESAR AL CLUB PIUDALI</a>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>