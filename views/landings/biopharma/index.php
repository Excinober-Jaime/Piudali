<!DOCTYPE html>
<html>
    <head>
        <title>Compra productos Piudalí Amazonian Skincare en Biopharma Naturals</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="<?=URL_SITIO.'views/landings/biopharma/'?>">
        <link rel="shortcut icon" href="../../../assets/img/favicon.png" type="image/png"> 
        <link rel="stylesheet" href="css/uikit.css" />
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
        <meta property="og:url" content="<?=URL_SITIO.'views/landings/biopharma/'?>" />
		<meta property="og:type" content="product.group" />
		<meta property="og:title" content="Compra productos Piudalí en Biopharma Naturals" />
		<meta property="og:description" content="PIUDALÍ® Amazonian Skincare es una completa línea de bienestar y cuidado de la piel para toda la familia." />
		<meta property="og:image" content="img/biopharmanatural-piudali-madres.jpg" />

        <script>
		    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		    ga('create', 'UA-80277968-1', 'auto');
		    ga('send', 'pageview');
		    gtag('config', 'AW-959221012'); //Conversiones adwords
		  </script>

		  <!-- Facebook Pixel Code -->
		    <script>
		      !function(f,b,e,v,n,t,s)
		      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		      n.queue=[];t=b.createElement(e);t.async=!0;
		      t.src=v;s=b.getElementsByTagName(e)[0];
		      s.parentNode.insertBefore(t,s)}(window, document,'script',
		      'https://connect.facebook.net/en_US/fbevents.js');
		      fbq('init', '281340985646373');
		      fbq('track', 'PageView');
		    </script>
		    <noscript><img height="1" width="1" style="display:none"
		      src="https://www.facebook.com/tr?id=281340985646373&ev=PageView&noscript=1"
		    /></noscript>
		    <!-- End Facebook Pixel Code -->
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
        						<!-- Event snippet for Registro en Landing Distribuidores Virtuales - Dropshipping conversion page -->
								<script>
								  gtag('event', 'conversion', {'send_to': 'AW-959221012/P_grCPDc7YABEJSasskD'});
								</script>
								
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
			<img src="img/biopharmanatural-piudali-madres.jpg" class="img-responsive">
			<center>
        			<a class="uk-button uk-button-naranja uk-text-center" href="#modal-example" uk-toggle>Compra Piudalí en Biopharma Naturals</a>
        		</center>
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
        			<a class="uk-button uk-button-naranja uk-text-center" href="#modal-example" uk-toggle>Compra Piudalí en Biopharma Naturals</a>
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
        			<h2 class="H2 textoVerde"><strong>COSMÉTICA ECOLÓGICA</strong></h2>  
    				<h2 class="H2 textoVerde">"La cosmética natural, bio y ecológica es una alternativa respetuosa con el medio y con nuestra piel".</h2>
					
<p>Los ingredientes son mayoritariamente de origen vegetal, su producción y cosecha no generan desequilibrio en el ecosistema y no provienen de especies amenazadas, evita  el uso de ingredientes nocivos para el organismo como derivados de la petroquímica, parabenos, siliconas, nano-partículas, aromas y colorantes sintéticos, entre otros, y no son testados en animales.</p>   

<p>Debe contener mínimo un 95% de ingredientes de origen natural y de este porcentaje mínimo un 10% debe ser de agricultura ecológica es decir que en su producción no usan abonos químicos, ni plaguicidas que afecten el ecosistema y la salud.</p>

<p>La cosmética ecológica es una megatendencia mundial, cada días más consumidores concientes la prefieren.</p>


</div>

        		
        	</div>
<center>
	<img src="img/a-ciencia-cierta.png">
</center>


<div class="uk-padding-large">
        		<div class="box-texto">
<h2 class="H2 textoVerde"><strong>¿POR QUÉ SOMOS DIFERENTES?</strong></h2>  

<h3 class="H3 textoVerde">"Somos pioneros en Colombia en cosmética ecológica y ganadores del concurso “a ciencia cierta BIO” de Colciencia 2016".</h3> 


<p>Ingredientes de origen natural, 100% vegetal, especies nativas del Amazonas y los Andes Colombianos, sin ingredientes de origen animal, sin parabenos, colorantes y aromas de origen sintético, sin ingredientes derivados de la petroquímica, elaborados con agua de manantial (no clorada), sin especies genéticamente modificadas, seguridad probada dermatológicamente, no se realizan pruebas en animales, conservantes y emulsificantes ecocertificados, somos social y ecológicamente sustentables, productos desarrollados con rigor científico y tecnológico, producción en laboratorios certificados con BPM y Registros invima, productos comercializados en mercado nacional e internacional.</p>

<!--<h3 class="H3 textoVioleta"><strong>PIUDALÍ® Amazonian Skincare te ofrece productos innovadores, garantia en calidad y excelente servicio al cliente.</strong></h3>-->


				</div>

        		<center>
        			<a class="uk-button uk-button-naranja uk-text-center" href="#modal-example" uk-toggle>Compra Piudalí en Biopharma Naturals</a>
        		</center>
        	</div>





<!-- This is the modal -->
<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title" style="text-align: center;">PUNTOS DE ATENCIÓN</h2>
        <center><a href="http://biopharmanatural.com/" target="_blank"><img src="img/biopharmanatural.png" style="max-width: 50%; height: auto;"></a></center>
       <div class="box">
            <div class="headquarter head center">
                <div class="row">
                    <div class="col-md-12">
                        <span class="icon icon-calendar"></span>
                        <span>L-S: 08:00am - 07:00pm D: 09:00am - 02:00pm</span>
                    </div>
                </div>
            </div>
            <div class="headquarter head h-small hidden-xs hidden-sm">
                <div class="row">
                    <div class="col-md-6">
                        <span style="font-weight: bold;">Direccion</span>
                    </div>
                    <div class="col-md-3">
                        <span style="font-weight: bold;">Telefono</span>
                    </div>
                    <div class="col-md-3 right">
                        <span style="font-weight: bold;">Celular</span>
                    </div>
                </div>
            </div>
            
                
                    <div class="headquarter">
                        <div class="row">
                            <div class="col-md-6">
                                <span>Biopharma Natural Torcoroma</span>
                                <span>Cra 51B # 84-94 CC Torcoroma Plaza</span>
                            </div>
                            <div class="col-md-3">
                                <span>
                                      
                                          
                                              
                                              <a href="tel:0353548016">3548016</a>
                                          
                                              -
                                              <a href="tel:0353528770">3528770</a>
                                          
                                      
                                </span>
                            </div>
                            <div class="col-md-3 right">
                                <span><a href="tel:3013600220">3013600220</a></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="headquarter">
                        <div class="row">
                            <div class="col-md-6">
                                <span>Biopharma Natural 49C</span>
                                <span>Cra 49C # 80 - 13 Local 4</span>
                            </div>
                            <div class="col-md-3">
                                <span>
                                      
                                          
                                              
                                              <a href="tel:0353786717">3786717</a>
                                          
                                              -
                                              <a href="tel:0353782551">3782551</a>
                                          
                                      
                                </span>
                            </div>
                            <div class="col-md-3 right">
                                <span><a href="tel:3015054972">3015054972</a></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="headquarter">
                        <div class="row">
                            <div class="col-md-6">
                                <span>Biopharma Natural Santa Marta</span>
                                <span>Calle 22 # 14 - 70 Centro Medico Perla del Caribe Local 3</span>
                            </div>
                            <div class="col-md-3">
                                <span>
                                      
                                          
                                              
                                              <a href="tel:0354219580">4219580</a>
                                          
                                              -
                                              <a href="tel:0354203885">4203885</a>
                                          
                                      
                                </span>
                            </div>
                            <div class="col-md-3 right">
                                <span><a href="tel:3024434388">3024434388</a></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="headquarter">
                        <div class="row">
                            <div class="col-md-6">
                                <span>Biopharma Natural 82</span>
                                <span>Calle 82 # 43-19 Local 1A</span>
                            </div>
                            <div class="col-md-3">
                                <span>
                                      
                                          
                                              
                                              <a href="tel:0353552579">3552579</a>
                                          
                                              -
                                              <a href="tel:0353552340">3552340</a>
                                          
                                              -
                                              <a href="tel:0353177962">3177962</a>
                                          
                                      
                                </span>
                            </div>
                            <div class="col-md-3 right">
                                <span><a href="tel:3016833102">3016833102</a></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="headquarter">
                        <div class="row">
                            <div class="col-md-6">
                                <span>Biopharma Villa Santos</span>
                                <span>Cra 51B # 106 - Esquina L-4</span>
                            </div>
                            <div class="col-md-3">
                                <span>
                                      
                                          
                                              
                                              <a href="tel:0353854809">3854809</a>
                                          
                                              -
                                              <a href="tel:0353854808">3854808</a>
                                          
                                      
                                </span>
                            </div>
                            <div class="col-md-3 right">
                                <span><a href="tel:3013600884">3013600884</a></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="headquarter">
                        <div class="row">
                            <div class="col-md-6">
                                <span>Biopharma Natural 21</span>
                                <span>Cra 21B # 60-13 Esquina Local 7</span>
                            </div>
                            <div class="col-md-3">
                                <span>
                                      
                                          
                                              
                                              <a href="tel:0353855267">3855267</a>
                                          
                                              -
                                              <a href="tel:0353855903">3855903</a>
                                          
                                      
                                </span>
                            </div>
                            <div class="col-md-3 right">
                                <span><a href="tel:3043963029">3043963029</a></span>
                            </div>
                        </div>
                    </div>
                
            
        </div>
        <p class="uk-text-right">
            <small><a class="uk-button uk-button-naranja uk-text-center uk-modal-close">Cerrar</a></small>
        </p>
    </div>
</div>
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
							Distribuidor Autorizado Biopharma Naturals<br/>
							Dirección: Calle 82 # 43 - 19 L-1A<br/>
							Teléfonos: (+57)(5) 355 2579 - (+57)(5) 355 2340<br/><br/>
							Cartagena - Santa Marta - Colombia
						</center>
						<br/>
						<center><a href="http://biopharmanatural.com/" target="_blank"><img src="img/biopharmanatural.png" style="max-width: 50%; height: auto;"></a></center>
					</div>
				</div>
    		</div>
        </footer>	

    </body>
</html>