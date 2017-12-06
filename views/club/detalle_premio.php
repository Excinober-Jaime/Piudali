<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="container">
	<div class="row" id="premios">
		<div class="row">
			<div class="col s12 m6 l5 center-align">
				<center>
					<img src="<?=$producto['img_principal']?>" class="responsive-img materialboxed">
				</center>
			</div>
			<div class="col s12 m6 l7">
				<h5 class="center-align orange-text text-darken-2"><?=$producto['nombre']?></h5>
				<div class="divider" style="margin-bottom: 10px;"></div>
				<div class="row center-align">
					<div class="chip orange white-text">				
						<?=number_format($producto['precio'] / $valor_punto)?>
					</div>
					<span>PUNTOS PIUDALÍ</span>
				</div>
				<div class="row">
					<div class="input-field col s6 m3 offset-m2">
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
					<div class="col s6 center-align">
						<br>
						<button class="btn orange waves-effect waves-light">LO QUIERO!</button>
					</div>
					<div class="col s12">
						<div class="row">
						    <div class="col s12">
						      <ul class="tabs">
						        <li class="tab col s3"><a class="active" href="#tab_descripcion">Descripción</a></li>
						        <li class="tab col s3"><a href="#tab_mas_info">Más Información</a></li>						        
						        
						      </ul>
						    </div>
						    <div id="tab_descripcion" class="col s12"><?=$producto['descripcion']?></div>
						    <div id="tab_mas_info" class="col s12"><?=$producto['mas_info']?></div>					    						    
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>