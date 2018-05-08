<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="container">
	<div class="row">
		<table class="">
			<thead>
				<tr>
					<th class="center-align">DESCRIPCIÓN</th>
					<th>PRECIO</th>
					<th width="50px">CANTIDAD</th>
					<th class="right-align">SUBTOTAL</th>
				</tr>
			</thead>
			<tbody>
				<?php
					
					if (isset($itemsCarrito) && count($itemsCarrito)>0) {
					
						foreach ($itemsCarrito as $key => $item) {

				?>
				<tr>
					<td>						
						<div class="col s3">
							<img src="<?=$item["img_principal"]?>" class="" style="max-width:100px;">
						</div>
						<div class="col s9">
							<span class="left">
								<?=$item["nombre"]?><br>Código: <?=$item["codigo"]?><br>Iva: <?=$item["iva"]?>%
							</span>
						</div>
					</td>
					<td>
						<?=convertir_pesos($item["precio"])?>
					</td>
					<td>
						<?=$item["cantidad"]?>
					</td>
					<td class="right-align">
						<?=convertir_pesos($item["subtotal"])?>
					</td>
				</tr>
				<?php
					}
				}else{
				?>
					<tr>
						<td colspan="4">No tienes productos en el carrito!</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="divider"></div><br>
	<div class="row">
		<div class="col s12 m8">
		<?php  if (isset($_SESSION["idusuario"])) { ?>
			<div class="card-panel">
				<h4>DIRECCIÓN DE ENVÍO</h4>			
	          	<span class="black-text">				 	
			 		Dirección: <?=$_SESSION["direccion"]?><br>
			 		Ciudad: <?=$_SESSION["ciudad"]?><br>
			 		Teléfono: <?=$_SESSION["telefono"]?><br>
			 		Teléfono Móvil: <?=$_SESSION["telefono_m"]?><br><br>
				 	
			 		<a href="<?=URL_CLUB."/".URL_CLUB_PERFIL?>?return=<?=URL_SITIO.URL_CLUB.'/'.URL_CLUB_CARRITO?>" class="btn green">Cambiar Datos</a>
			 		
	          	</span>
	        </div>
	    <?php } else { ?>
	    	<h5>Por favor ingresa o registrate para cargar tu dirección</h5>
	    	<a class="open-iniciar btn orange" return="<?=URL_SITIO.URL_CLUB.'/'.URL_CLUB_CARRITO?>">Iniciar sesión</a>
	    	<a class="open-registro btn green">Regístrarse</a>
	    <?php } ?>
		</div>
		<div class="col s12 m4" style="background-color: #f2f2f2; border-radius: 10px;padding: 1rem;">
			<div class="row">
				<div class="col s6 m8 right-align">Subtotal antes de IVA</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($subtotalAntesIva)?></div>
			
				<div class="col s6 m8 right-align">Descuento Cupón</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($descuentoCupon)?></div>
			
			
				<div class="col s6 m8 right-align">Subtotal Neto Antes de Iva</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($subtotalNetoAntesIva)?></div>
			
				<div class="col s6 m8 right-align">IVA</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($iva)?></div>				

				<div class="col s6 m8 right-align">Pago con puntos:</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($pagoPuntos["valor_pago"])?></div>				

				<div class="col s6 m8 right-align">Costo de Envío</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($flete)?></div>
			
				<div class="col s6 m8 right-align"><h5>TOTAL A PAGAR</h5></div>
				<div class="col s6 m4 right-align"><h5><?=convertir_pesos($total)?></h5></div>
			</div>
			<div class="divider"></div>
			<div class="row" style="margin-top: 1rem;">
				
				<div class="col s12 right-align ">
					
					<?php if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'CONSUMIDOR' && ($total == 0 || $total>=1000)) { ?>
						
					<a href="<?=URL_CLUB.'/'.URL_CLUB_GENERAR_ORDEN?>" class="btn-large orange right">FINALIZAR COMPRA</a>

					<?php } else { ?>

						
					<?php }  ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>