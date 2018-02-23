<?php include 'header.php'; ?>
<div class="banner-principal">
<div class="parallax-container">
    <div class="parallax">
    	<img src="assets/tienda/img/avatar_all.png" class="hide-on-small-only">
    </div>
    <div class="row" id="container-banner-principal"> 
    	<div class="col s12 m7 l5 offset-l1 valign-wrapper" style="height: 100%;">
    		<div class="row">
    			<h3 style="color: #6D1E3F;"><?=$this->nombre_pdt?></h3>
    			<h5 class="flow-text"><?=$this->promesa_pdt?></h5>
    			<?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'CONSUMIDOR'){?>
					
					<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='1' style="background:#f19300;">AGREGAR AL PEDIDO!</button>

                <?php }else{ ?>

                	<button class="btn-large open-registro agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='0' style="background:#f19300;">COMPRAR!</button>
                
                <?php } ?>
                
                <input type="hidden" id="cantidad" value="1">
           </div>
        </div>
    </div>
</div>
<center>
	<img src="assets/tienda/img/<?=$this->img_flotante_1?>" class="img-flotante img-responsive" />
</center>
</div>
<div class="divider"></div>
<div class="section" id="ingredientes">
	<h3 class="center-align">INGREDIENTES</h3>
	<div class="row">
		<div class="container">
			<p class="flow-text center-align">
		
				PIUDALÍ® Amazonian Skincare ofrece una fórmula natural única para el bienestar y cuidado de la piel para toda la familia. Desarrollada con los más altos estándares de calidad y rigor científico.<br><br>
Una mezcla balanceada científicamente con plantas y frutos exóticos de reconocida efectividad, provenientes de nuestra Biodiversidad Colombiana, con más de 20 ingredientes de origen natural 100% vegetal; hacen de  PIUDALÍ® Amazonian Skincare una línea de productos cosméticos innovadores y únicos.

			</p>
		</div>
	</div>
	<div class="row">

		<?php  
			foreach ($this->ingredientes_pdt as $key => $ingrediente) {
		?>		

			<div class="col s12 m6">		    
				<div class="card horizontal card-ingredientes">
					  <div class="card-image">
					    <img src="assets/tienda/img/<?=$this->ingredientes[$ingrediente][0]?>">
					  </div>
					  <div class="card-stacked">
					    <div class="card-content">
					    <h5><?=$this->ingredientes[$ingrediente][1]?></h5>
					      <p><?=substr($this->ingredientes[$ingrediente][2], 0, 200)?>...</p>
					    </div> 
					  </div>
				</div>			
			</div>
		<?php
			}
		?>
		
		
	</div>
</div>
<div class="divider"></div>
<div class="section" id="como-usarlo" style="background-image: url(assets/tienda/img/<?=$this->img_flotante_2?>);">
	<h3 class="center-align">¿CÓMO USARLO?</h3>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l6">
				<ul>
					<?php 
					foreach ($this->uso as $key => $paso) {
					?>
						<li>
							<h4 style="color: #6D1E3F;">Paso <?=$key+1?></h4>
							<p><?=$paso?></p>
						</li>
					<?php
					}
					?>					
				</ul>
			</div>			
		</div>
	</div>
</div>
<div class="divider"></div>
<div class="section puntos-club" id="action">
	<div class="container center-align">
		<div class="row">
			<div class="col s12 m12 l3 z-depth-2">				
				<h3 style="color: #41281B;">Envío a toda Colombia</h3>				
				<i class="large material-icons">local_shipping</i>
				<h5 style="color: #12491d;">Todos los medios de pago</h5>
				<img src="http://localhost/piudali/www/assets/img/medios-de-pago.png" class="responsive-img">
				<?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'CONSUMIDOR'){?>
					
					<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='1' style="background:#f19300;">AGREGAR AL PEDIDO!</button>

                <?php }else{ ?>

                	<button class="btn-large open-registro agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='0' style="background:#f19300;">COMPRAR!</button>
                
                <?php } ?>

				<!--<h6>*Aplica para compras superiores a $80.000</h6>
				-->
				<br><br>
			</div>
			<div class="col m6 s12 l4">
				<!--<img src="assets/tienda/img/qr.png" class="responsive-img">-->
				<h3>Para ganar puntos y ser parte del Club</h3>
				<ul>
					<li>Identifica</li>
				</ul>
			</div>
			<div class="col m6 s12 l4 offset-l1">
				<img src="assets/tienda/img/club-piudali.png" class="img-responsive">
				
					<h4>Premiamos tu fidelidad y valoramos tu confianza!</h4>

					<!--<p>Gana puntos por tus compras. <br>Redime tus puntos en premios, productos y servicios.</p>-->
					
					<p>Descúbre Entérate de noticias, tips y más...</p>
				
			</div>
			
		</div>
		
	</div>
</div>
<div class="divider"></div>
<h3 class="center-align tituloVerde">¿POR QUÉ SOMOS DIFERENTES?</h3>
<div class="section box-promesas" id="promesas">
	<!--<h3 class="center-align">¿PORQUÉ SOMOS DIFERENTES?</h3>-->
	<div class="container">		
		<div class="row">
			<!--<div class="col s6 m6 l2 offset-l2">
				<img src="assets/tienda/img/cara.png" class="responsive-img" />
			</div>
			<div class="col s6 m6 l2">
				<img src="assets/tienda/img/manos.png" class="responsive-img" />
			</div>
			<div class="col s6 m6 l2">
				<img src="assets/tienda/img/cuerpo.png" class="responsive-img" />
			</div>
			<div class="col s6 m6 l2">
				<img src="assets/tienda/img/pies.png" class="responsive-img" />
			</div>-->
			
		</div>
		<div class="row">
			<div class="col s12 m6">
				<p class="flow-text center-align">
					Pioneros en Colombia en cosmética ecológica. <br>
					Ingredientes de origen natural, 100% vegetal. <br>				
					Especies nativas del Amazonas y los Andes Colombianos.
				</p>
			</div>
			<div class="col s12 m6">
				<p class="flow-text center-align">
					Sin parabenos, colorantes y aromas de origen sintético. <br>
					Sin ingredientes derivados de la petroquímica. <br>
					Sin especies genéticamente modificadas.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6">
				<img src="https://piudali.com.co/assets/img/capacitacion/cienciaconciencia.png" class="responsive-img">
			</div>
			<div class="col s12 m6">
				<img src="https://piudali.com.co/assets/img/capacitacion/sellospiudali.png" class="responsive-img">
			</div>
		</div>
	</div>
</div>
<div class="divider"></div>
<div class="section" id="productos">
	<h3 class="center-align">MÁS PRODUCTOS</h3>
	<div class="container">
		<div class="row">
			<div class="carousel">
				<?php 
				foreach ($productos as $key => $pdt) {
				?>
					<a class="carousel-item" href="<?=URL_SITIO.URL_TIENDA.'/'.URL_TIENDA_PRODUCTO.'/'.$pdt['url']?>">
						<img src="<?=$pdt['img_principal']?>">
						<h6 class="center-align" style="color: #6D1E3F;"><?=$pdt['nombre']?></h6>
					</a>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
<div class="divider"></div>
<div class="section" id="piudali">
	<h3 class="center-align">SOBRE PIUDALÍ</h3>
	<div class="container">
		<div class="row">
			<div class="col s12">	
				<p class="flow-text center-align">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>
</div>
<div class="divider"></div>
<div class="section" id="comprar">
	<div class="container">
		
		<div class="row">
			<div class="col s12 m6 center-align">
				<img src="assets/tienda/img/<?=$this->img_flotante_1?>" class="responsive-img" style="max-height: 400px;">			
			</div>
			<div class="col s12 m6 center-align">
				<div class="row">
					<h3 style="color: #6D1E3F;"><?=$this->nombre_pdt?></h3>
					<p class="flow-text"><?=$this->promesa_pdt?>
					</p>
					<?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'CONSUMIDOR'){?>
					
						<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='1' style="background:#f19300;">AGREGAR AL PEDIDO!</button>

	                <?php }else{ ?>

	                	<button class="btn-large open-registro agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='0' style="background:#f19300;">COMPRAR!</button>
	                
	                <?php } ?>					
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>