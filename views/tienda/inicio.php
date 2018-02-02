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
                <button class="btn-large open-registro agregarPdt" idpdt="<?=$this->id_pdt?>" style="background:#f19300;">COMPRAR!</button>
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
				<h4 style="font-weight: 100;margin-bottom: 0;line-height: 1em;">Obtén el<h4>
				<h1 style="font-weight: 600;margin: 0;line-height: 1em; color: #00973A;">10%</h1>
				<h5 style="font-weight: 100;margin: 0;line-height: 1em;">De descuento<h5>
					<p class="flow-text">Usando el cupón de descuento: <br/><b style="color: #00973A; font-size: 1.9em">LOREM</b></p>
					<button class="btn-large truncate open-registro agregarPdt" style="background-color: #f19300;" idpdt="<?=$this->id_pdt?>">USAR CUPÓN DE DESCUENTO</button>
				<h6>*Aplica para compras superiores a $80.000</h6>
				<br>
			</div>
			<div class="col m6 s12 l4 offset-l1">
				<img src="assets/tienda/img/club-piudali.png" class="img-responsive">
				
					<h4>Premiamos tu fidelidad y confianza!</h4>

					<p>Gana puntos por tus compras virtuales y en puntos de venta, redime tus puntos en premios, productos y servicios. Además descubre todo los beneficios y contenidos que tenemos para ti.</p>
					
					<p>Conoce nuestro Club, en el que aprenderás más sobre el cuidado de tu cuerpo.</p>
				
			</div>
			<div class="col m6 s12 l4">
				<img src="assets/tienda/img/qr.png" class="responsive-img">
			</div>
		</div>
		
	</div>
</div>
<div class="divider"></div>
<h3 class="center-align tituloVerde">¿PORQUÉ SOMOS DIFERENTES?</h3>
<div class="section box-promesas" id="promesas">
	<!--<h3 class="center-align">¿PORQUÉ SOMOS DIFERENTES?</h3>-->
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
			<div class="col s12 m6">
				<h6 class="flow-text white-text left-align">
					<i class="material-icons">check_circle</i> Pioneros en Colombia en cosmética ecológica.
				</h6>
			</div>
			<div class="col s12 m6">
				<h6 class="flow-text white-text left-align">
					<i class="material-icons">check_circle</i> Ingredientes de origen natural, 100% vegetal.
				</h6>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6">
				<h6 class="flow-text white-text left-align">
					<i class="material-icons">check_circle</i> Especies nativas del Amazonas y los Andes Colombianos.
				</h6>
			</div>
			<div class="col s12 m6">
				<h6 class="flow-text white-text left-align">
					<i class="material-icons">check_circle</i> Sin parabenos, colorantes y aromas de origen sintético.
				</h6>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6">
				<h6 class="flow-text white-text left-align">
					<i class="material-icons">check_circle</i> Sin ingredientes derivados de la petroquímica.
				</h6>
			</div>
			<div class="col s12 m6">
				<h6 class="flow-text white-text left-align">
					<i class="material-icons">check_circle</i> Sin especies genéticamente modificadas.
				</h6>
			</div>
			<!--<div class="col s12">
				<h6 class="flow-text white-text left-align">
					<i class="material-icons">check_circle</i> Conservantes y emulsificantes ecocertificados.
				</h6>
			</div>-->
		</div>
	</div>
</div>
<div class="divider"></div>
<div class="section" id="productos">
	<h3 class="center-align">MÁS PRODUCTOS</h3>
	<div class="row hide-on-small-only hide-on-med-only">
		<div class="carousel carousel-slider center" data-indicators="true">
		    <div class="carousel-item" href="#one!">			    
				    <div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
		    </div>
		    <div class="carousel-item" href="#two!">
		      		<div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col l2">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
		    </div>		    
		</div>
	</div>
	<div class="row hide-on-small-only hide-on-large-only">
		<div class="carousel carousel-slider center" data-indicators="true">
		    <div class="carousel-item" href="#one!">			    
				    <div class="col m3">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col m3">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col m3">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col m3">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
		    </div>
		    <div class="carousel-item" href="#two!">
		      		<div class="col m3">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col m3">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col m3">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col m3">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
		    </div>		    
		</div>
	</div>
	<div class="row hide-on-med-only hide-on-large-only">
		<div class="carousel carousel-slider center" data-indicators="true">
		    <div class="carousel-item" href="#one!">			    
				    
					<div class="col s6">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col s6">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
		    </div>
		    <div class="carousel-item" href="#two!">
		      		
					<div class="col s6">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
					<div class="col s6">
					  <div class="card hoverable">
	        			<div class="card-image">
					      <img src="https://piudali.com.co/assets/img/productos/productos-web_Amazonian-Eye-Cream-Crema-Contorno-de-Ojos.jpg">
					      <a class="btn-floating halfway-fab waves-effect waves-light orange" href="#"><i class="material-icons">add</i></a>
					    </div>
					    <div class="card-content">
					    	<span class="card-title teal-text text-darken-4">Crema Revitalizante Contorno de Ojos</span>				      	
					    </div>
					  </div>
					</div>
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
					<button class="btn-large open-registro agregarPdt" idpdt="<?=$this->id_pdt?>" style="background-color: #f19300;">COMPRAR</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>