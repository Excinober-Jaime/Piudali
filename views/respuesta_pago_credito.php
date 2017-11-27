<?php include "header.php"; ?>

<div class="container">
	<div class="col-xs-12">
		<h2>Respuesta de la transacción</h2>
		<table class="table table-striped">
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
            <td>$<?php echo number_format($total); ?> </td>
          </tr>
          <tr>
            <td>Moneda </td>
            <td><?php echo $currency; ?></td>
          </tr>
          <tr>
            <td>Método</td>
            <td><?php echo ($metodo); ?></td>
          </tr>
          <tr>
            <td>Plazo</td>
            <td><?php echo ($plazo_dias); ?> Días</td>
          </tr>
        </table>
        
          <a href="<?=URL_SITIO?>" class="btn btn-primary btn-lg center-block">REGRESAR A PIUDALI</a>
	</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>