<?php include 'header.php'; ?>
<div style="position: relative;">
<div class="parallax-container">
    <div class="parallax">
    	<img src="assets/tienda/img/avatar_all.png">
    </div>
    <div class="row" id="container-banner-principal"> 
    	<div class="col s11 m7 l5 offset-l1 valign-wrapper" style="height: 100%;">
    		<div class="row">
    			<h3 style="color: #6D1E3F;"><?=$this->nombre_pdt?></h3>
    			<h5 class="flow-text"><?=$this->promesa_pdt?></h5>
                <button class="btn-large open-registro agregarPdt" idpdt="<?=$this->id_pdt?>" style="background:#f19300;">COMPRAR!</button>
                <input type="hidden" id="cantidad" value="1">
           </div>
        </div>
    </div>
</div>
<img src="assets/tienda/img/<?=$this->img_flotante_1?>" class='img-flotante'>
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
					      <p><?=$this->ingredientes[$ingrediente][2]?></p>
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
<div class="section" id="action">
	<div class="container center-align">
		<div class="row">
			<div class="col s12 m4 z-depth-2">
				<h4 style="font-weight: 100;margin-bottom: 0;line-height: 1em;">Obtén el<h4>
				<h1 style="font-weight: 600;margin: 0;line-height: 1em;">10%</h1>
				<h5 style="font-weight: 100;margin: 0;line-height: 1em;">De descuento<h5>
					<p class="flow-text">Usando el cupón de descuento: <b>LOREM</b></p>
					<button class="btn-large truncate open-registro" style="background-color: #f19300;">USAR CUPÓN DE DESCUENTO</button>
				<h6>*Aplica para compras superiores a $80.000</h6>
				<br>
			</div>
			<div class="col s12 m4 offset-m1">
				<h2 style="font-weight: 100;margin: 0;line-height: 1em;">Además...</h2>
				<p class="flow-text">
					Todos nuestros productos tienen un código único con el que podrás ganar puntos y redimirlos en lo que quieras!
					<br><br>
					Conocerás nuestro Club, en el que aprenderás más sobre el cuidado de tu cuerpo.
				</p>
			</div>
			<div class="col s12 m3">
				<img src="assets/tienda/img/qr.png" class="responsive-img">
			</div>
		</div>
		
	</div>
</div>
<div class="divider"></div>
<div class="section" id="promesas">
	<h3 class="center-align">¿PORQUÉ SOMOS DIFERENTES?</h3>
	<div class="container">		
		<div class="row">
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
					<button class="btn-large open-registro" style="background-color: #f19300;">COMPRAR</button>
				</div>
			</div>
		</div>
	</div>

</div>
<?php include 'footer.php'; ?>