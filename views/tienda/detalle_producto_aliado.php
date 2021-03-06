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
					<h5 class="orange-text text-darken-2">DISPONIBLE EN:</h5>
				</div>
				
			</div>
			<div class="col s12 m8">
				<div class="divider" style="margin-bottom: 10px;"></div>
				<div class="col s12 m7">
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
				<div class="col s12 m5 center-align">					
					
					<?php 
					if (count($sucursales)>0) {
					?>
					 <ul class="collection">
					<?php
							
						foreach ($sucursales as $key => $sucursal) {
					
					?>
					<li class="collection-item avatar">
				      <i class="material-icons circle">location_on</i>
				      <span class="title"><b><?=$sucursal['nombre']?></b></span>
				      <p>
				         <?=$sucursal['telefono']?> <br>
				         <?=$sucursal['email']?><br>
				         <?=$sucursal['direccion']?> <br>
				         <?=$sucursal['ciudad']?>
				      </p>
				      
				    </li>						
					<?php
						}
					?>
					</ul>
					<?php
					}
					?>
						
					
				</div>
				
				
					
					
				
			</div>
		</div>
		
						
						    				        
						
					
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>