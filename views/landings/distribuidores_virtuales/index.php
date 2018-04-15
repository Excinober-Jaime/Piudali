<!DOCTYPE html>
<html>
    <head>
        <title>Conviertete en Distribuidor de Piudalí Amazonian Skincare</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<base href="<? //=URL_SITIO.'views/landings/distribuidores_virtuales/'?>">-->
        <base href="http://localhost/piudali/www/views/landings/distribuidores_virtuales/">

        <link rel="stylesheet" href="css/uikit.css" />
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
    </head>
    <body>
    	<hader>
    		<div class="bg-naranja">
    			<center>
    				<img src="img/piudali.png">
    			</center>
    		</div>
    		<div class="bg-cafe">
    			<center>
    				<img src="img/amazonian-skincare.png">
    			</center>
    		</div>
    	</hader>

    	<?php if (!empty($this->alerta)) { ?>

    	<div class="uk-padding-large">

    	<?php 

        	switch ($this->alerta[0]) {

        				case 'INVALIDO':
        					
        					?>
        						<div class="box-texto">
				    				<h2 class="H2 textoVioleta">Ya existe una cuenta con tus datos. Por favor da clic <a href='<?=URL_SITIO.URL_RESTAURAR_CONTRASENA?>'>aquí </a>para restaurar tu contraseña</h2>
									<p></p>
								</div>
								<center>
				        			<a class="uk-button uk-button-naranja uk-text-center" href=""></a>
				        		</center>
        					<?php

        					break;

        				case 'EXITOSO':
        					?>
        						<div class="box-texto">
				    				<h2 class="H2 textoVioleta">Felicidades! Tu registro fue exitoso. Por favor <a href='<?=URL_SITIO.URL_INGRESAR?>'>ingresa aquí</a> y accede con tus datos para iniciar tu negocio</h2>	
								</div>
								<center>
				        			<a class="uk-button uk-button-naranja uk-text-center" href=""></a>
				        		</center>
        					<?php


        					break;
        				
        				case 'FALLIDO':
        					?>
        						<div class="box-texto">
				    				<h2 class="H2 textoVioleta">Lo sentimos! No fue posible realizar el registro. Por favor <a href="<?=URL_SITIO.URL_LANDING.'/'.URL_LANDING_DISTRIBUIDORES_VIRTUALES?>">da clic aquí</a> para intentarlo de nuevo</h2>
								</div>
								<center>
				        			<a class="uk-button uk-button-naranja uk-text-center" href=""></a>
				        		</center>
				        	<?php
        					break;

        				default:
        					# code...
        					break;
        			}	
        ?>
        </div>	

        <?php }else{ ?>

		<!--video
		<iframe width="100%" height="450" src="https://player.vimeo.com/video/264518010?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen uk-responsive></iframe>-->

		<!-- 16:9 aspect ratio -->
		<div style="background-color: #6d1e3f">
			<div class="col-md-7" style="padding: 0 !important">
				<div class="embed-responsive embed-responsive-16by9">
				  <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/264518010?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-md-5 bg-violeta" style="height: 100%">
        		<div class="container-fluid">
	        		<div class="row">
		        		<div class="col-xs-12">
		        			<br/>
		        			<center>
		        				<h1 style="color: #fff; font-weight: 300; font-size: 2.4em">TIENES 3 OPCIONES PARA COMERCIALIZAR NUESTRO PRODUCTOS</h1>
		        			</center>
		        		</div>
		        		<div class="col-xs-12">
		        			<center>
		        					<a class="uk-button uk-button-naranja uk-text-center" href="<?=URL_SITIO.URL_LANDING.'/'.URL_LANDING_DISTRIBUIDORES_VIRTUALES?>#negocio">CONÓCELAS!</a>
		        			</center>
		        		</div>
		        		<!--<div class="col-xs-12">
		        			<center>
		        				<h1 style="color: #fff; font-weight: 300; font-size: 2.5em">TIENES 3 OPCIONES PARA COMERCIALIZAR NUESTRO PRODUCTOS</h1>
		        			</center>
		        		</div>-->
	        		</div>
        		</div>
        	</div>
			<div class="clearfix"></div>
		</div>
		<div class="franja"></div>
        <section id="productos">
        	
        	<!--Slider Productos-->
        	<div class="uk-position-relative uk-visible-toggle" uk-slider="autoplay: true; autoplay-interval: 6000">
			    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@s uk-child-width-1-6@m">
			        <li>
			            <img src="img/productos/Creama-Revitalizante-Contorno-de-Ojos-001.png" alt="Creama Revitalizante Contorno de Ojos">
			        </li>
			       <li>
			            <img src="img/productos/Crema-Nutritiva-para-Manos-002.png" alt="Crema Nutritiva para Manos">
			        </li>
			        <li>
			            <img src="img/productos/Crema-de-Limpieza-Rostro-003.png" alt="Crema de Limpieza Rostro">
			        </li>
			        <li>
			            <img src="img/productos/Elixir-Nutritivo-y-Relajante-Aceite-004.png" alt="Elixir Nutritivo y Relajante Aceite">
			        </li>
			        <li>
			            <img src="img/productos/Exfoliante-y-Purificante-de-la-Amazonia---Rostro-005.png" alt="Exfoliante y Purificante de la-Amazonia Rostro">
			        </li>
			       <li>
			            <img src="img/productos/Exfoliante-Corporal-de-la-Amazonia-006.png" alt="Exfoliante Corporal de la Amazonia">
			        </li>
			        <li>
			            <img src="img/productos/Hidratante-Natural-Rostro-007.png" alt="Hidratante Natural Rostro">
			        </li>
			        <li>
			            <img src="img/productos/Gel-de-Ducha-Corporal-008.png" alt="Gel de Ducha Corporal">
			        </li>
			        <li>
			            <img src="img/productos/Reparador-de-labios-Barra-009.png" alt="Reparador de labios Barra">
			        </li>
			       <li>
			            <img src="img/productos/Leche-Corporal-Hidratante-010.png" alt="Leche Corporal Hidratante">
			        </li>
			        <li>
			            <img src="img/productos/Reparador-de-labios-Nuez-011.png" alt="Reparador de labios Nuez">
			        </li>
			        <li>
			            <img src="img/productos/Ritual-de-la-Juventud-de-la-Amazonia-012.png" alt="Ritual de la Juventud de la Amazonia">
			        </li>
			        <li>
			            <img src="img/productos/Tonico-Facial-Despertar-de-la-Amazonia-013.png" alt="Tonico Facial Despertar de la Amazonia">
			        </li>
			    </ul>

    <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>
        </section>
        <section id="nosotros">
        	<center>
        		<img src="img/para-toda-la-familia.png" />
        	</center>
        	<div class="bg-verde">
        		<div class="container-fluid">
	        		<div class="row">
		        		<div class="col-md-6 col-md-offset-3">
			        		<center>
			        			<img src="img/formula-natural.png" />
			        		</center>
		        		</div>
		        	</div>
		        </div>
        	</div>
        	<div class="uk-padding-large">
        		<div class="box-texto">
    				<h2 class="H2 textoVioleta"><strong>PIUDALÍ® Amazonian Skincare</strong> es una completa línea de bienestar y cuidado de la piel para toda la familia.</h2>   

					<p>

					 Ideal para el cuidado integral de todo tipo de piel, especialmente para pieles sensibles. En el cuidado facial desde adolescentes hasta adultos y, en el cuidado corporal, para madres gestantes, niños y adultos.

					<!--La línea facial ofrece todo el cuidado integral de la piel. Ideal para todo tipo de piel, desde adolescentes hasta adultos.  La línea corporal ofrece todo el cuidado integral de la piel.  Ideal para todo tipo de piel, especialmente para pieles sensibles, madres gestantes, niños y adultos. --></p>
					<p>Nuestra fórmula está  diseñada con una mezcla científicamente balanceada con especies nativas del Amazonas y los Andes Colombianos. Plantas y frutos exóticos de reconocida efectividad como el Chontaduro, Buriti, Açaí, Cupuazú, Babassú, Seje, Andiroba, Balú, Guayaba, Mango, Cacao, Karité, entre más de 20 ingredientes de origen natural, hacen de <strong>PIUDALÍ® Amazonian Skincare</strong> una línea de productos cosméticos innovadores y únicos.</p>
					<p>Productos innovadores pioneros en Colombia en investigación y desarrollo de cosmética verde o ecológica. Ganadores del concurso “a ciencia cierta BIO de Colciencia en el 2016", por el uso sostenible y conservación de la Biodiversidad. Desarrollados con el más alto rigor científico y tecnológico por Waliwa Amazonian Natural Products Ltda.,  una empresa Colombiana que se ajusta a las tendencias mundiales, con un marca sustentable a nivel económico, tecnológico, social y ecológico.</p>
				</div>
				<center>
        			<a class="uk-button uk-button-naranja uk-text-center" href="<?=URL_SITIO.URL_LANDING.'/'.URL_LANDING_DISTRIBUIDORES_VIRTUALES?>#negocio">COMERCIALÍZALOS SIN INVERSIÓN!</a>
        		</center>
        	</div>
        	<div class="bg-violeta">
        		<div class="container-fluid">
	        		<div class="row">
		        		<div class="col-md-8 col-md-offset-2">
			        		<center>
			        			<img src="img/productos-de-bellza-de-alta-calidad.png" />
			        		</center>
		        		</div>
		        	</div>
		        </div>
        	</div>
        </section>        
        <section id="negocio">       	
        	
        	<div class="uk-padding-large">
        		<div class="box-texto">
    				<h2 class="H2 textoVerde">Si buscas una oportunidad de comercialización en Colombia</h2>
					<h2 class="H2 textoVerde"><strong>Esta oportunidad es para ti!</strong></h2>   

					<p>Te ofrecemos un  modelo de negocio con las más modernas y efectivas herramientas de ventas para que desarrolles con éxito la comercialización de nuestros productos.</p>
					
					<p>
						Rentabilidad entre el 20% y 30%, 
						Premios e Incentivos, 
						Ofertas exclusivas para distribuidores, 
						Escuela de negocio virtual, 
						Plataforma para administrar tu negocio, 
						Oportunidad de comercializar sin inventarios, entregas ni inversión.
					</p>

<!--<h3 class="H3 textoVioleta"><strong>PIUDALÍ® Amazonian Skincare te ofrece productos innovadores, garantia en calidad y excelente servicio al cliente.</strong></h3>-->

<h4 class="H4 textoVerde">Comienza desde YA! con PIUDALÍ® Amazonian Skincare</h4> 
				</div>

        		<div class="container-fluid">
	        		<div class="row">
	        			<div class="col-md-4">
	        				<center>
	        					<img src="img/venta-directa.png">
	        				</center>
	        				<div class="bg-violeta">
	        					<center><h4 style="margin: 0; color: #fff; font-size: 1.8em; font-weight: bold;">VENTA DIRECTA</h4></center>
	        				</div>
	        				<div class="box-texto-gris">
	        					

								<p class="textoVioleta" style="font-size: 1.6em"><strong>Así de simple!</strong></p>
								<p>Tu compras, vendes, recaudas y entregas.</p>
								<p>Nosotros te entregamos directame a ti como Distribuidor.</p>

								<p>Manejas inventario y logística!</p>
							</div>
	        			</div>
	        			<div class="col-md-4">
	        				<center>
	        					<img src="img/dropshipping.png">
	        				</center>
	        				<div class="bg-verde">
	        					<center><h4 style="margin: 0; color: #fff; font-size: 1.8em; font-weight: bold;">DROPSHIPPING</h4></center>
	        				</div>
	        				<div class="box-texto-gris">

								<p class="textoVerde" style="font-size: 1.6em"><strong>Así de simple!</strong></p>
								<p>Tu compras, vendes y recaudas.</p>
								<p>Nosotros entregamos a tu cliente final, con tus datos de distribuidor. </p>

								<p>Sin inventarios y sin logística!</p>

							</div>
	        			</div>
	        			<div class="col-md-4">
	        				<center>
	        					<img src="img/venta-virtual.png">
	        				</center>
	        				<div class="bg-naranja">
	        					<center><h4 style="margin: 0; color: #fff; font-size: 1.6em; font-weight: bold;">VENTA VIRTUAL</h4></center>
	        				</div>
	        				<div class="box-texto-gris">

								<p class="textoNaranja" style="font-size: 1.8em"><strong>Así de simple!</strong></p>
								<p>Tu promocionas y vendes.</p>
								<p>Nosotros recaudamos y entregamos a tu cliente final. </p>

								<p>Sin inventarios, recaudo ni logística!</p>

	        				</div>
	        			</div>
	        			<center>
		        			<button uk-toggle="target: #modal-registro" type="button" class="uk-button uk-button-naranja uk-text-center">REGISTRATE YA!</button>
		        		</center>
	        		</div>
	        	</div>
        	</div>
        	<center>
        		<a uk-toggle="target: #modal-registro">
    				<img src="img/ser-distribuidor-piudali.jpg" />
    			</a>
    		</center>
        </section>
       	<?php } ?>
        <footer>
        	<div class="franja"></div>
        	<div class="bg-naranja">
    			<center>
    				<img src="img/piudali.png">
    			</center>
    		</div>
    		<div class="bg-cafe">
    			<center>
    				<img src="img/amazonian-skincare.png">
    			</center>
    		</div>
    		<div class="bg-violeta">
    			<div class="container-fluid">
	        		<div class="row">
	    				<center>
			    			<strong>Contáctanos</strong><br/>
							Distribuidor Exclusivo para Colombia Link Grupo Marketing SAS<br/>
							Teléfono: (+57)(2) 524 1887 - (+57) 313 7545092 <br/>
							Email: contacto[@]piudali.com.co<br/>
						</center>
						<br/>
						<center><img src="img/link-grupo-marketing.png" style="max-width: 50%; height: auto;"></center>
					</div>
				</div>
    		</div>
        </footer>
        <!-- This is the modal -->
		<div id="modal-registro" uk-modal>
		    <div class="uk-modal-dialog uk-modal-body">
		    	<button class="uk-modal-close-default" type="button" uk-close></button>
		        <h2 class="uk-modal-title">Regístrate e inicia un negocio inteligente!</h2>
		        <form method="post">
		        	 <fieldset class="uk-fieldset">

				        <legend class="uk-legend">Nombre</legend>

				        <div class="uk-margin">
				            <input class="uk-input" type="text" name="nombre" placeholder="" required="required">
				        </div>

				        <legend class="uk-legend">Apellido</legend>

				        <div class="uk-margin">
				            <input class="uk-input" type="text" name="apellido" placeholder="" required="required">
				        </div>

				        <legend class="uk-legend">Número de Documento</legend>

				        <div class="uk-margin">
				            <input class="uk-input" type="number" name="num_documento" placeholder="" required="required">
				        </div>
				        <legend class="uk-legend">Email</legend>

				        <div class="uk-margin">
				            <input class="uk-input" type="email" name="email" placeholder="" required="required">
				        </div>
				        <legend class="uk-legend">Teléfono</legend>

				        <div class="uk-margin">
				            <input class="uk-input" type="phone" name="telefono_m" placeholder="" required="required">
				        </div>

				        <legend class="uk-legend">Ciudad</legend>

				        <div class="uk-margin">
            				<select class="uk-select" name="ciudad">
			        			<option>Seleccione</option>
								<?php 
								foreach ($ciudades as $key => $ciudad) {
									?>
									<option value="<?=$ciudad["idciudad"]?>"><?=$ciudad["ciudad"]?></option>
									<?php
								}
								?>
							</select>
						</div>

				        <legend class="uk-legend">Contraseña para tu usuario</legend>

				        <div class="uk-margin">
				            <input class="uk-input" type="password" name="password" placeholder="" required="required">
				        </div>
				         <div class="uk-margin">
				            <label><input class="uk-checkbox" type="checkbox" required="required" checked> Autorización de uso de datos personales</label>				           
				        </div>
				        <p uk-margin>
				        	<button type="submit" name="registrarse" class="uk-button uk-button-large uk-button-primary uk-width-1-1" style="font-size: 16px;background-color: #f09700;">ENVIAR</button>
				        </p>
				    </fieldset>
		        </form>		        
		    </div>
		</div>
		
    </body>
</html>