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
                	<!--ENVIAR DIRECTAMENTE AL CARRO-->
                	<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='0' style="background:#f29400; font-weight: bold; font-size: 1.2em">COMPRA CON EL 20% DE DESCUENTO</button>
                
                <?php } ?>
                
                <input type="hidden" id="cantidad" value="1">
           </div>
        </div>
    </div>
</div>
<center>
	<img src="assets/tienda/img/<?=$this->img_flotante_1?>" class="img-flotante img-responsive" style='max-width: 600px !important;'/>
</center>
</div>
<div class="divider"></div>
<div class="section" id="ingredientes">
	<h3 class="center-align">INGREDIENTES DE ORIGEN NATURAL</h3>

	<div class="row">
		<div class="container">
			<p class="flow-text center-align">
				La cosmética ecológica, es amigable con el piel y con el medio ambiente. Sus ingredientes son mayoritariamente de origen vegetal, su producción y cosecha no generan desequilibrio en el ecosistema, no provienen de especies amenazadas y evita el uso de ingredientes nocivos para la piel.</p>
			<p class="flow-text center-align">
				PIUDALÍ® Amazonian Skincare contiene ingredientes naturales, 100% de origen vegetal obtenidos de especies nativas del amazonas y los andes colombianos.
			</p>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<ul class="collapsible" data-collapsible="accordion">
			    <li>
			    <div class="collapsible-header" style="width: 100%; display: block !important; background-color: #009330; color:#fff; border:none">
			    		<center>
			    			<h2 style="margin:0;font-size: 2.01rem;"><?=$this->nombre_pdt?></h2>
			    			<h5>Conoce sus ingredientes de origen natural, click aquí</h5>
			    		</center>
				</div>
			    <div class="collapsible-body">
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
			      
			      
			    </li>
		  	</ul>
		</div>
	</div>
	<center>
		<h4 style="color: #6d1e3f">Precio <?=convertir_pesos($this->precio_pdt)?></h4>
		<?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'CONSUMIDOR'){?>
						
						<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='1' style="background:#f19300;">AGREGAR AL PEDIDO!</button>

	                <?php }else{ ?>

	                	<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='0' style="background:#f29400; font-weight: bold; font-size: 1.2em">COMPRA CON EL 20% DE DESCUENTO</button>
	                
	                <?php } ?>
	                
	                <input type="hidden" id="cantidad" value="1"><br/>

	</center>
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
<div class="section" id="comprar">
	<div class="container">
		
		<div class="row">
			<div class="col s12 m6 center-align">
				<img src="assets/tienda/img/<?=$this->img_flotante_1?>" class="responsive-img" style="max-height: 400px;">			
			</div>
			<div class="col s12 m6 center-align">
				<div class="row">
					<h3 style="color: #6D1E3F;"><?=$this->nombre_pdt?></h3>
					<h5 style="color: #009330">INGREDIENTES NATURALES</h5>
					<div style="font-size:1.2em">
						<p>
							<?php 
							foreach ($this->ingredientes_pdt as $key => $ingrediente){

								echo $this->ingredientes[$ingrediente][1];

								if (end($this->ingredientes_pdt) == $ingrediente) {
									
									echo '. ';
								}else{
									echo ', ';
								}
							}
							?>
						</p>
					</div>
					<br/>
					<h4 style="color: #6d1e3f">Precio <?=convertir_pesos($this->precio_pdt)?></h4>
					<?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'CONSUMIDOR'){?>
					
						<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='1' style="background:#f19300;">AGREGAR AL PEDIDO!</button>

	                <?php }else{ ?>
	                	<!--ENVIAR DIRECTAMENTE AL CARRO-->
	                	<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='0' style="background:#f29400; font-weight: bold; font-size: 1.2em">COMPRA CON EL 20% DE DESCUENTO</button>
	                
	                <?php } ?>					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="divider"></div>
<div class="section puntos-club" id="action">
	<div class="container center-align">
		<div class="row">
			<div class="col s12 m12 l3 z-depth-2">
				<div class="cupon">
					<h5>Recibe un descuento especial por este mes.</h5>
					<h2 style="font-weight: bold; margin-top: 0px; line-height: 2.5rem;">20%</h2>
					<h5 style="font-weight: bold; margin-bottom: 0px !important; line-height: 1.1rem;">DESCUENTO</h5>
					<p><small>Válido hasta el 30 de abril de 2018.</small></p>
				</div>
				<?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'CONSUMIDOR'){?>
					
					<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='1' style="background:#f19300;">AGREGAR AL PEDIDO!</button>

                <?php }else{ ?>
                	<!--ENVIAR DIRECTAMENTE AL CARRO-->
                	<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='0' style="background:#f29400; font-weight: bold; font-size: 1.2em">COMPRARLO!</button>
                
                <?php } ?>

				<!--<h6>*Aplica para compras superiores a $80.000</h6>
				-->
				<br><br>
			</div>
			
			<div class="col m6 s12 l4 offset-l1">
				
				<img src="assets/tienda/img/club-piudali.png" class="img-responsive">
				
					<h4>Premiamos tu fidelidad y valoramos tu confianza!</h4>

					<!--<p>Gana puntos por tus compras. <br>Redime tus puntos en premios, productos y servicios.</p>-->
				

					<p>Busca el Código QR en los empaques, acumula puntos y descúbre todos los beneficios que tenemos para ti en <a href="https://piudali.com.co/Club" target="=_blank" style="color: #f29400"><b>piudali.com.co/Club</b></a></p>
				
			</div>

			<div class="col m6 s12 l4">
				
				<img src="assets/tienda/img/gana-puntos-por-tus-compras.png" class="responsive-img" style="width: 80%;">
				<!--<h3>Para ganar puntos y ser parte del Club</h3>
				<ul>
					<li>Identifica</li>
				</ul>-->
			</div>
			
		</div>
		
	</div>
</div>
<div class="divider"></div>
<!--
<h3 class="center-align tituloVerde"></h3>
<div class="section box-promesas" id="promesas">
	<h3 class="center-align">¿PORQUÉ SOMOS DIFERENTES?</h3>
	<div class="container">		
		<div class="row">
			<div class="col s6 m6 l2 offset-l2">
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
			</div>
			
		</div>
		<div class="row">
			<div class="col s12 m6">
				
			</div>
			<div class="col s12 m6">
				<p class="flow-text center-align">
					
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6">
				
			</div>
			<div class="col s12 m6">
				
			</div>
		</div>
	</div>
</div>
<div class="divider"></div>-->

<div class="section" id="piudali">
	<h3 class="center-align">SOBRE PIUDALÍ</h3>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l7" style="padding-top:0;">	
				<p class="flow-text center-align" style="font-size: 1.2rem;margin-top:0;">PIUDALÍ® Amazonian Skincare ofrece una completa línea de bienestar y cuidado para la piel de toda la familia. </p>  

<h3 style="font-size: 1.1rem; text-align: center; font-weight: bold !important;">"Una fórmula natural única para el bienestar y cuidado de la piel" </h3>
<p class="flow-text center-align" style="font-size: 1.28rem;">
Nuestra fórmula está  diseñada con una mezcla científicamente balanceada con plantas y frutos exóticos de reconocida efectividad como el Chontaduro, Buriti, Açaí, Copoazú, Babassú, Seje, Andiroba, Balú, Guayaba, Mango, Cacao, Karité, entre más de 20 ingredientes de origen natural.  Lo que hace de PIUDALÍ® Amazonian Skincare una línea de productos cosméticos innovadores y únicos. </p>  


<h3 style="font-size: 1.1rem; text-align: center; font-weight: bold !important;">"Somos pioneros en Colombia en cosmética ecológica y ganadores del concurso “a ciencia cierta BIO” de Colciencia 2016".  </h3>
				<img src="https://piudali.com.co/assets/img/capacitacion/cienciaconciencia.png" class="responsive-img">
			</div>
			<div class="col s12 m6 l5">
				<div style="background-color:rgba(109,30,63,1); padding: 15px; color: #fff; border-radius: 20px">
					<h4 style="font-size: 1.4rem; text-align: center; color: #fff">¿POR QUÉ SOMOS DIFERENTES?</h4>	
						<ul style="padding-left: 25px;">
							<li style="list-style-type: disc !important; font-size: 1.08rem">Sin ingredientes de origen animal, sin parabenos.</li>
							<li style="list-style-type: disc !important; font-size: 1.08rem">Sin colorantes y aromas de origen sintético.</li>			
							<li style="list-style-type: disc !important; font-size: 1.08rem">Sin ingredientes derivados de la petroquímica.</li>
							<li style="list-style-type: disc !important; font-size: 1.08rem">Elaborados con agua de manantial (no clorada).
							<li style="list-style-type: disc !important; font-size: 1.08rem">Sin especies genéticamente modificadas.</li>
							<li style="list-style-type: disc !important; font-size: 1.08rem">Seguridad probada dermatológicamente.</li>
							<li style="list-style-type: disc !important; font-size: 1.08rem">No se realizan pruebas en animales.</li>
							<li style="list-style-type: disc !important; font-size: 1.08rem">Sus conservantes y emulsificantes son ecocertificados.</li>
							<li style="list-style-type: disc !important; font-size: 1.08rem">Somos social y ecológicamente sustentables.</li>
							<li style="list-style-type: disc !important; font-size: 1.08rem">Desarrollados con rigor científico y tecnológico.</li>
						</ul>
					<center><img src="https://piudali.com.co/assets/img/capacitacion/sellospiudali.png" class="responsive-img" style="width: 70%"></center>
				</div>

			</div>
		</div>
	</div>
</div>
<div class="divider"></div>
<div class="section" id="productos">
	<div class="container">
		<div class="row">
			<div class="col s12">

				<div class="col s12 m6 l5">
					<center><img src="assets/tienda/img/<?=$this->img_flotante_1?>" class="responsive-img" style="max-height: 400px;"></center>
				</div>
				<div class="col s12 m6 l7">
					<center>
						<h3 style="color: #6D1E3F; font-size: 2.4rem;"><?=$this->nombre_pdt?></h3>

						<h5 class="flow-text"><?=$this->promesa_pdt?></h5>

						
						<h4 style="color: #6d1e3f">Precio <?=convertir_pesos($this->precio_pdt)?></h4>
					</center>
					<center>
					<?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'CONSUMIDOR'){?>
					
						<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='1' style="background:#f19300;">AGREGAR AL PEDIDO!</button>

	                <?php }else{ ?>
	                	<!--ENVIAR DIRECTAMENTE AL CARRO-->
	                	<button class="btn-large agregarPdt" idpdt="<?=$this->id_pdt?>" isreg='0' style="background:#f29400; font-weight: bold; font-size: 1.2em">COMPRA CON EL 20% DE DESCUENTO</button>
	                
	                <?php } ?>	
	                </center>
	            </div>
	            <div style="clear: both;"></div>
	            <br/>
	            <center>
					      
	        		<img src="<?=URL_SITIO?>assets/img/medios-de-pago.png" class="responsive-img">
	        		<span><h6>Envío a toda Colombia, Todos los medios de pago</h6></span>    
        		</center>
        		<br/>
			</div>
			<hr style="border: #f4f4f4 1px solid;" />
			<div class="col s12">
					<h3 class="center-align" style="margin-bottom: 0">MÁS PRODUCTOS</h3>

					<div class="col s12 m6">
						<center>
							<h4>LÍNEA FACIAL</h4>
							<img src="assets/tienda/img/linea-facial.png" class="categoria-img">
							<p class="flow-text center-align" style="font-size: 1.4em">La línea facial ofrece todo el cuidado integral. Ideal para todo tipo de piel, desde adolescentes hasta adultos, hombres y mujeres. </p>
						</center> 
					</div>
					
					<div class="col s12 m6">
						<center>
							<h4>LÍNEA CORPORAL</h4>
							<img src="assets/tienda/img/linea-corporal.png" class="categoria-img">
							<p class="flow-text center-align" style="font-size: 1.4em">La línea corporal ofrece todo el cuidado integral.  Ideal para todo tipo de piel, especialmente para pieles sensibles, Madres gestantes, niños y adultos.  </p>
						</center> 
					</div>
					

						
					<div class="carousel">
						<?php 
						foreach ($productos as $key => $pdt) {
						?>
							<a class="carousel-item" href="<?=URL_SITIO.URL_TIENDA.'/'.URL_TIENDA_PRODUCTO.'/'.$pdt['url']?>">
								<img src="<?=$pdt['img_principal']?>">
								<h6 class="center-align" style="color: #6D1E3F;"><?php 
									
									$nombre = explode('-',$pdt['nombre']);
									echo $nombre[1];

								?>
										

								</h6>
							</a>
						<?php
						}
						?>
					</div>


			</div>
			
		</div>
	</div>
		
</div>
<div class="divider"></div>

<?php include 'footer.php'; ?>