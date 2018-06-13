<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <base href="<?=URL_SITIO?>">
    <!--CSS -->
    <link rel="stylesheet" href="assets/landings_tiendas/css/bootstrap.css">
    <link rel="stylesheet" href="assets/landings_tiendas/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title>Piudali Amazonian Skincare | Artemisa Productos Naturales</title>
  </head>
  <body>
    <header>
      <?php 
      if (!empty($this->alert)) {
      ?>
        <div class="alert alert-warning mb-0" role="alert">
          <h2 class="text-center"><?=$this->alert['mensaje']?></h2>
        </div>
      <?php
      }
      
      ?>
      <div class="cenefa">
        <center><img src="assets/landings_tiendas/img/piudali-logo.png"></center>
      </div>
      <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-6">
              <center><img src="assets/landings_tiendas/img/logo-header.png" class="logo img-fluid" alt="Atermisa Tienda Naturista"> </center>
            </div>
            <div class="col-xs-12 col-sm-6">
              <center><img src="assets/landings_tiendas/img/innovacion-cosmetica.png" class="img-fluid" alt="Innovacion Cosmetica Ecologica"> </center>
            </div>
        </div>
      </div>
      <div class="banner">
        <img src="assets/landings_tiendas/img/banner/piudauli-formula-natural.jpg" class="img-fluid" alt="Piudali una formula unica natural para el bienestar y cuidado de la piel">
      </div>
    </header>
    <!-- PRODUCTO -->
    <section id="productos">
      <div class="section-verde">
        <div class="container-fluid">
          <div class="row align-items-center">
              <div class="col-xs-12 col-sm-6">
                <center>
                  <img src="assets/landings_tiendas/img/piudali-para-toda-la-familia.png" class="img-fluid">
                </center>
              </div>
              <div class="col-xs-12 col-sm-6">
                <center>
                  <img src="assets/landings_tiendas/img/promesas-piudali.png" class="img-fluid">
                </center>
              </div>
          </div>
        </div>
      </div>
      <img src="assets/landings_tiendas/img/piudali-cuidado-familiar.png" class="img-fluid">
      <div class="section-violeta">
        <center>
          <h1>PIUDALÍ® Amazonian Skincare</h1>
          <h2>Completa línea de bienestar y cuidado de la piel para toda la familia.</h2>
          <br/>
          <p>Ideal para el cuidado integral de todo tipo de piel, especialmente para pieles sensibles. En el cuidado facial desde adolescentes hasta adultos y en el cuidado corporal, para madres gestantes, niños y adultos.</p>
        </center>
      </div>
      <!--Slider Productos-->
          <div class="uk-position-relative uk-visible-toggle" uk-slider="autoplay: true; autoplay-interval: 6000">
            <div class="row align-items-center">
           
            <div class="col-12">

          <ul class="uk-slider-items">
              <li>
                  <a data-toggle="modal" data-target=".contorno-ojos">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/facial/Creama-Revitalizante-Contorno-de-Ojos-001.png" alt="Contorno de Ojos">
                    </a>
              </li>
             <li>
                  <a data-toggle="modal" data-target=".crema-mano">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/corporal/Crema-Nutritiva-para-Manos-002.png" alt="Crema para manos">
                    </a>
              </li>
              <li>
                  <a data-toggle="modal" data-target=".limpiadora-rostro">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/facial/Crema-de-Limpieza-Rostro-003.png" alt="Limpiadora de Rostro">
                    </a>
              </li>
              <li>
                  <a data-toggle="modal" data-target=".aceite-relajante">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/corporal/Elixir-Nutritivo-y-Relajante-Aceite-004.png" alt="Aceite Relajante">
                    </a>
              </li>
              <li>
                  <a data-toggle="modal" data-target=".exfoliante-rostro">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/facial/Exfoliante-y-Purificante-de-la-Amazonia---Rostro-005.png" alt="Exfoliante Rostro">
                    </a>
              </li>
             <li>
                  <a data-toggle="modal" data-target=".exfoliante-corporal">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/corporal/Exfoliante-Corporal-de-la-Amazonia-006.png" alt="Exfoliante corporal">
                    </a>
              </li>
              <li>
                  <a data-toggle="modal" data-target=".hidratante-rostro">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/facial/Hidratante-Natural-Rostro-007.png" alt="Hidratante Rostro">
                    </a>
              </li>
              <li>
                  <a data-toggle="modal" data-target=".gel-ducha">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/corporal/Gel-de-Ducha-Corporal.png" alt="Gel de Ducha">
                    </a>
              </li>
              <li>
                  <a data-toggle="modal" data-target=".labios">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/facial/Reparador-de-labios-Nuez-011.png" alt="Reparador de Labios">
                    </a>
              </li>
             <li>
                  <a data-toggle="modal" data-target=".hidratante-corporal">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/corporal/Leche-Corporal-Hidratante-010.png" alt="Hidratante Corporal animated pulse">
                    </a>
              </li>
              <li>
                  <a data-toggle="modal" data-target=".ritual">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/facial/Ritual-de-la-Juventud-de-la-Amazonia-012.png" alt="Ritual de Juventud">
                    </a>
              </li>
              <li>
                  <a data-toggle="modal" data-target=".mantequilla">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/corporal/Mantequilla-Corporal-de-la-Amazonía-012.png" alt="Mantequilla Corporal">
                    </a>
              </li>
              <li>
                  <a data-toggle="modal" data-target=".tonico">
                      <img class="d-block img-fluid animated pulse" src="assets/landings_tiendas/img/productos/facial/Tonico-Facial-Despertar-de-la-Amazonia-013.png" alt="Tonico para rostro">
                    </a>
              </li>
          </ul>

           <center>
               <a class="arrow-left btn-club" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
               <a class="arrow-right btn-club" href="#" uk-slidenav-next uk-slider-item="next"></a>
              </center>
          
        </div>
        
   </div>
    

</div>
                <?php include 'videos.php'; ?>
                <center>
                  <a class="btn-comprar" data-toggle="modal" linktienda="https://artemisa.co/product/search/product/Piudali" data-target=".preregistro" >Compra Productos Piudalí con el 10% de Descuento</a>
                </center>
    </section>
    <section id="quienes-somos">
      <div class="section-gris">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-sm-6 col-md-8">
              <center>
                <h3>¿POR QUÉ SOMOS DIFERENTES?</h3>
                <h4>La cosmética natural, bio y ecológica es una<br/>alternativa respetuosa con el medio y con nuestra piel</h4>
              
              <h5><strong>Somos pioneros en Colombia en la investigación y desarrollo de cosmética ecológica.</strong></h5>
              </center>
              <p>Nuestra fórmula está  diseñada con una mezcla científicamente balanceada con plantas y frutos exóticos de reconocida efectividad como el Chontaduro, Buriti, Açaí, Cupuazú, Babassú, Seje, Andiroba, Balú, Guayaba, Mango, Cacao, Karité, entre más de 20 ingredientes de origen natural.  Lo que hace de PIUDALÍ® Amazonian Skincare una línea de productos cosméticos innovadores y únicos.</p>

              <p>Nuestros productos no contienen ingredientes de origen animal, sin parabenos, colorantes y aromas de origen sintético, sin ingredientes derivados de la petroquímica, elaborados con agua de manantial (no clorada), sin especies genéticamente modificadas, seguridad probada dermatológicamente, no se realizan pruebas en animales, conservantes ecocertificados, somos social y ecológicamente sustentables, productos desarrollados con rigor científico y tecnológico, producción en laboratorios certificados con BPM y Registros invima, productos comercializados en mercado nacional e internacional.</p>
              
            </div>
            <div class="col-sm-6 col-md-4">
              <center>
                <img src="assets/landings_tiendas/img/productos-ecologicos.png" class="img-fluid">
                <h3>Uso sostenible y conservación de la Biodiversidad</h3>
                <img src="assets/landings_tiendas/img/a-ciencia-cierta-bio-piudali.png" class="img-fluid">
              </center>
            </div>

          </div>
        </div>
      </div>
      <center>
          <img src="assets/landings_tiendas/img/productos-piudali.png" class="img-fluid">
          <a class="btn-comprar" data-toggle="modal" data-target=".preregistro" linktienda="https://artemisa.co/product/search/product/Piudali">Compra Productos Piudalí con el 10% de Descuento</a>
        </center>
    </section>
    <section id="puntos-mundialistas">
      <img src="assets/landings_tiendas/img/puntos-mudialistas.png" class="img-fluid">
      <div class="container-fluid">


      <h2><strong>Convierte tus compras en puntos</strong></h2>
      <h2>Acumula puntos mundialistas</h2>
      <p>Redime tus puntos en productos en Tiendas Artemisa o espectaculares premios para que disfrutes este mundial en <a href="https://piudali.com.co/Club" target="_blank">piudali.com.co/Club</a></p>

      </div>

       <!--Slider Productos-->
          <div class="uk-position-relative uk-visible-toggle" uk-slider="autoplay: true; autoplay-interval: 6000">
            <div class="row align-items-center">
           
            <div class="col-12">

          <ul class="uk-slider-items">
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/audifonos-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/bbq-set-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/cargador-portatil-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/hielera-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/llavero-capa-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/muchila-balon-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/muchila-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/multipuerto-usb-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/paraguas-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/parlante-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/silla-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/termo-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
              <li>
                <img class="d-block img-fluid animated pulse img-thumbnail" src="assets/landings_tiendas/img/premios/vasos-piudali.png" alt="Contorno de Ojos" width="250" height="250">
              </li>
          </ul>

           <center>
               <a class="arrow-left btn-club" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
               <a class="arrow-right btn-club" href="#" uk-slidenav-next uk-slider-item="next"></a>
              </center>
          
        </div>
        <div class="col-sm-6">
          <center>
            <a class="btn-club" href="https://piudali.com.co/Club" target="_blank">Conoce el Club Piudalí</a>
          </center>
        </div>
         <div class="col-sm-6">
          <center>
            <a class="btn-comprar" data-toggle="modal" data-target=".preregistro" linktienda="https://artemisa.co/product/search/product/Piudali">Compra Productos Piudalí con el 10% de Descuento</a>
          </center>
        </div>
   </div>
    

</div>
    </section>
    <section id="contactenos">
      <div class="section-gris">
        <div class="row align-items-center">
          <div class="col-sm-4">
            <center><img src="assets/landings_tiendas/img/logo-header.png" class="logo img-fluid" alt="Atermisa Tienda Naturista"></center>
          </div>
          <div class="col-sm-4">
            <p>
              Artemisa<br/>
              Avenida Roosevelt No. 25 - 32<br/>
              PBX: (+57) (2) 487 30 30<br/>
              Email: artemisaweb@artemisa.com.co<br/>
              Cali - Colombia
          </p>
          </div>
          <div class="col-sm-4">
            <center>
              <a class="btn-club" href="#"><i class="fab fa-facebook-square"></i></a>
              <a class="btn-club" href="#"><i class="fab fa-instagram"></i></a>
              <a class="btn-club" href="#"><i class="fab fa-youtube"></i></a>
            </center>
          </div>
        </div>
      </div>
    </section>


    <!-- PRE REGISTRO CLIENTE -->
                
    <div class="modal fade preregistro" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <center>
              <h3>Te obsequiamos 1.000 puntos</h3>
                <p>Redime tus puntos en productos en cualquiera de las Tiendas Artemisa o en espectaculares premios para que disfrutes de la fiesta mundialista Rusia 2018!.</p>
            </center>
            <form method="post">
              <div class="section-verde">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="exampleInputPassword1" placeholder="Nombre Completo" required="required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Apellido</label>
                      <input type="text" class="form-control" name="apellido" id="exampleInputPassword1" placeholder="Apellido" required="required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Número de Documento</label>
                      <input type="text" class="form-control" name="num_identificacion" id="exampleInputPassword1" placeholder="Cédula" required="required">
                    </div>
                  </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Ciudad</label>
                        <select id="" name="ciudad" class="form-control" required="required">
                          <option value="">Seleccione...</option>

                          <?php 

                          foreach ($ciudades as $key => $ciudad) {
                            ?>
                            <option value="<?=$ciudad["idciudad"]?>"><?=$ciudad["ciudad"]?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required="required">
                      <small id="emailHelp" class="form-text text-muted" style="color: #fff">Nunca compartirermos esta infomación con nadie. Conoce nuestras policitas <a href="https://piudali.com.co/politica-datos" target="_blank" style="color:orange !important;">aquí</a></small>
                    </div>
                  </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <center>
                    <input type="hidden" name="urltienda" id="urltienda" value="">
                    <button type="submit" name="registrarConsumidor" class="btn btn-comprar">Quiero mis 1.000 puntos Piudalí</button>
                    <a href="" id="no-puntos" class="btn btn-NoComprar">No quiero 1.000 puntos</a>
                  </center>
                </div> 
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="assets/landings_tiendas/js/bootstrap.js"></script>
    <script src="assets/landings_tiendas/js/uikit.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        $('[data-toggle="modal"]').click(function(){

            var linktienda = $(this).attr('linktienda');

            $('#no-puntos').attr('href', linktienda);

            $('#urltienda').val(linktienda);
        })
      })
    </script>
  </body>
</html>