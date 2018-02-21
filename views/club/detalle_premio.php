<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="container">
	<div class="row" id="premios">
		<div class="padding-full">
		<div class="row">
			<div class="col s12 m4 center-align">
				<center>
					<img src="<?=$producto['img_principal']?>" class="responsive-img materialboxed">
				</center>
			</div>
			<div class="col s12 m8">
				<div class="col s12 m8">
					<h5 class="center-align orange-text text-darken-2"><?=$producto['nombre']?></h5>
				</div>
				<div class="col s12 m4 center-align">
					<p style="margin-bottom: 2px;">Llévalo por: 
						<?=convertir_pesos($producto['precio'])?> ó por
					</p>
					<div class="chip orange white-text" style="font-size:30px;">
						<?=number_format($producto['precio'] / $this->valor_punto)?>
					</div>
					<p style="margin-top: 0px;margin-bottom: 2px;">PUNTOS PIUDALÍ</p>
				</div>
				
			</div>
			<div class="col s12 m8">
				<div class="divider" style="margin-bottom: 10px;"></div>
				<div class="col s12 m8">
					<div class="col s12">
				      <ul class="tabs">
				        <li class="tab col s4"><a class="active" href="#tab_descripcion">Descripción</a></li>
				        <li class="tab col s4"><a href="#tab_mas_info">Más Información</a></li>
				        <?php if (!empty($producto["uso"])) { ?>
						<li class="tab col s4"><a href="#tab_uso">Ver Video</a></li>
						<?php } ?>					            
				      </ul>
				      <div class="divider" style="margin-bottom: 10px;"></div>
					</div>

					    <div id="tab_descripcion" class="col s12"><?=$producto['descripcion']?></div>
					    <div id="tab_mas_info" class="col s12"><?=$producto['mas_info']?></div>					    						 
					    <?php if (!empty($producto["uso"])) { ?>   
					    <div id="tab_uso" class="col s12"><?=$producto['uso']?></div>
					    <?php } ?>	
				</div>
				<div class="col s12 m4 center-align">					
					<div class="card-panel " style="background-color: rgba(0,0,0,0.1);color: #000;">
						<?php 
						if (isset($_SESSION['idusuario']) && !empty($_SESSION['idusuario'])) {
						?>
						<p style="font-size: 13px;line-height: 1.1rem !important;">
							<?php 
							switch ($this->puntos_disponibles['disponibles'] * $this->valor_punto) {

								case 0:
									echo $_SESSION['nombre'].', no tienes puntos disponibles. Llévalo por '.convertir_pesos($producto['precio']);
									break;

								case ($this->puntos_disponibles['disponibles'] * $this->valor_punto) < $producto['precio']:		
									?>

									<?=$_SESSION['nombre']?>, tienes 
									<b><?php 
									if (isset($this->puntos_disponibles)) {
									
										echo number_format(round($this->puntos_disponibles['disponibles']));
									
									}
									?></b>
									puntos, redímelos y llévalo pagando <b>
										<?=convertir_pesos($producto['precio']-($this->puntos_disponibles['disponibles'] * $this->valor_punto))?></b> adicionales.<br> ¡Ó sigue acumulando puntos!
									<?php
									
									break;

								case ($this->puntos_disponibles['disponibles'] * $this->valor_punto) >= $producto['precio']:
									
									echo $_SESSION['nombre'].', tienes suficientes puntos para llevarlo. ¡Aprovecha!';

									break;
								
								default:
									
									break;
							}
							?>								
							
						</p>
						<?php	
						}else{
						?>
						<p style="font-size: 13px;line-height: 1.1rem !important;">
							
								Recuerda que puedes pagar con puntos, o con <br>puntos + dinero.
							
						</p>
						<?php	
						}
						?>
						
					</div>
					
					<div class="input-field col s12">
						<?php
					    if ($producto["cantidad"]>0) {			    
					    ?>
					      <select id="cantidad" name="cantidad">
					      	<?php
					      	for ($i=1; $i <= $producto["cantidad"]; $i++) { 
					      		?>
					      		<option value="<?=$i?>"><?=$i?></option>
					      		<?php
					      	}
					      	?>
					      </select>
					    <?php
						}else{
						?>
						<p>El producto está agotado</p>
						<?php
						}
					    ?>					   
					    <label>Cantidad</label>
					</div>
					<div class="col s12 center-align">
						<br>
						<button idpdt="<?=$producto["idproducto"]?>" class="btn orange waves-effect waves-light agregarPdt">LO QUIERO!</button>
					</div>
					
				</div>
				
				
					
					
				
			</div>
		</div>
		
						
						    				        
						
					
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>