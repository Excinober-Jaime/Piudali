<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>			
	<div class="col-xs-12">
		<h1>Capacitación <small><small>Aquí encontrarás todo el material necesario para capacitarte en productos y desarrollo de tu negocio.</small></small></h1>
		<hr>
		<div class="row">
			<div class="col-xs-12 col-md-3">
				<ul class="list-group">
				  <li class="list-group-item"><a href="<?=URL_USUARIO."/".URL_USUARIO_CAPACITACION."/".URL_USUARIO_CAPACITACION_INGREDIENTES?>">A-Z INGREDIENTES NATURALES</a></li>
				  <!--<li class="list-group-item">Dapibus ac facilisis in</li>
				  <li class="list-group-item">Morbi leo risus</li>
				  <li class="list-group-item">Porta ac consectetur ac</li>
				  <li class="list-group-item">Vestibulum at eros</li>-->
				</ul>
				<!--<div class="panel-group" role="tablist">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="collapseListGroupHeading1">
							<h4 class="panel-title">
								<a class="" role="button" data-toggle="collapse" href="#collapseListGroup1" aria-expanded="true" aria-controls="collapseListGroup1">Fichas Técnicas</a> 
							</h4>
						</div>
						<div id="collapseListGroup1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading1" aria-expanded="true"> 
							<ul class="list-group">
								<?php
								if (count($categorias)>0) {
									foreach ($categorias as $key => $categoria) {
								?>
									<li class="list-group-item"><a href="#"><?=$categoria["nombre"]?></a></li>
								<?php
									}
								}else{

								}
								?>								
							</ul>							
						</div>
					</div>
				</div>-->
				<!--<div class="panel-group" role="tablist">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="collapseListGroupHeading2">
							<h4 class="panel-title">
								<a class="" role="button" data-toggle="collapse" href="#collapseListGroup2" aria-expanded="true" aria-controls="collapseListGroup2">Protocolos</a> 
							</h4>
						</div>
						<div id="collapseListGroup2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading2" aria-expanded="true"> 
							<ul class="list-group">
								<li class="list-group-item">Protocolo 1</li>
								<li class="list-group-item">Protocolo 2</li>
							</ul>							
						</div>
					</div>
				</div>
				<div class="panel-group" role="tablist">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="collapseListGroupHeading3">
							<h4 class="panel-title">
								<a class="" role="button" data-toggle="collapse" href="#collapseListGroup3" aria-expanded="true" aria-controls="collapseListGroup3">Tutoriales</a> 
							</h4>
						</div>
						<div id="collapseListGroup3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading3" aria-expanded="true"> 
							<ul class="list-group">
								<li class="list-group-item">Tutorial 1</li>
								<li class="list-group-item">Tutorial 2</li>								
							</ul>							
						</div>
					</div>
				</div>-->
			</div>
			<div class="col-xs-12 col-md-9">
				<?php        
					switch ($seccion) {
            case URL_USUARIO_CAPACITACION_INGREDIENTES:
              foreach ($ingredientes as $key => $ingrediente) {
              ?>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="heading<?=$key?>">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key?>" aria-expanded="false" aria-controls="collapse<?=$key?>">
                        <?=$ingrediente["nombre"]?>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse<?=$key?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$key?>">
                    <div class="panel-body">
                      <?=$ingrediente["descripcion"]?>
                    </div>
                  </div>
                </div>

              <?php
              }
              break;
						case 'Fichas':
							echo "Fichas";	
							break;
						case 'Protocolos':
							echo "Protocolos";
							break;
						case 'Tutoriales':
							echo "Tutoriales";
							break;
						
						default:
							?>
<!--
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Aloe barbadensis gel: (Aloe Vera)
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Body Butter, Night Renewal Cream, Amazon Awakening Toner, Deep</b><br><br>

Nourishing Night Cream, Amazon Awakening Body Wash.<br>

Miembro de la familia de las liliáceas, esta planta se ha utilizado en la medicina tradicional

por millones de años para aliviar irritaciones de la piel, picaduras de insectos y quemaduras.

El gel espeso de las hojas de la planta no sólo es altamente hidratante, sino también es rico

en polisacáridos con propiedades anti-inflamatorias, anti-microbianas y cicatrizantes de

heridas.<br>

El Gel de Aloe es capaz de penetrar profundamente el tejido de la piel para aliviar la

sequedad, facilita la cicatrización estimulando la reparación celular, promoviendo el

crecimiento de tejido sano, y la aceleración de la eliminación de las células muertas de la

piel, así como sus toxinas.<br>

Un factor de crecimiento que se encuentra en el Aloe, giberelinas, es un coadyudante de la

activación de los fibroblastos que producen el colágeno necesario para mantener la piel

joven.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Arachidyl alcohol/behenyl alcohol/arachidyl glucoside
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon Body Butter; Facial Moisturizer; Amzonian Night Renewal</b><br><br>

Cream, Antioxidant Body Lotion, Amazon Facial Cleanser, Amazon Awakening Daily

Facial, Revitalizing Amazonian Eye Cream, Clear Awakening Amazon Facial Scrub,

Deep Nourishing Hand Cream, Clear Awakening Amazon Body Scrub

Una mezcla emulsionante natural hecha de extractos naturales de la planta de maní, con

glucosido obtenidos del maiz. Utilizado como agente para disminuir la tensión superficial de

los aceite, viscosante y emoliente.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Bactris gasipaes (Amazonian Peach palm) fruit juice: Chontaduro
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <b>PRODUCTOS: Amazonian Night Renewal Cream, Antioxidant Body Lotion, Amazon</b><br><br>

Facial Cleanser, Amazon Awakening Daily Facial, Pure Amazon Body Oil, Balm for

Lush Lips, Revitalizing Amazonian Eye Cream, Amazon Awakening Facial Cleanser,

Amazon Awakening Toner, Clear Away Amazon Facial Scrub, Deep Nourishing

Hand Cream, Amazon Awakening Body Wash, Clear Away Amazon Body Scrub,

Amazon Body Butter.

Cada palma de peach palm de Amazonas (Chontaduro) produce docenas de &quot;súper frutas&quot;

que contienen ácidos grasos esenciales y vitaminas antioxidantes A, C y E. De hecho, la

fruta de la palma del Amazonas tiene la mayor concentración de vitamina A encontrada en

cualquier fuente natural.

El aceite extraído de este fruto tiene poder de penetración excepcional, por tanto, su acción

antioxidante, alcanza las mitocondrias produciendo un efecto de antienvejecimiento,

regenerativo y nutriente en las capas más profundas de la piel.

Utilizado por los miembros de las tribus amazónicas durante siglos para calmar la piel seca,

nuestro aceite de Bactris gasipaes es extraída por presión del fruto únicamente de las

palmas que crecen dentro de la región amazónica de Colombia, de manera silvestre.

Estos árboles están libres de pesticidas químicos y fertilizantes sintéticos, es decir que se

pueden considerar orgánicos.

El aceite bruto se adquiere de comunidades a quienes se les ha capacitado para un manejo

sostenible de toda la fruta sin dejar ningún tipo de residuo así: la cáscara es alimento para

los peces, la harina sirve para la preparación de coladas y el aceite también es comestible.
      </div>
    </div>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
          Beeswax - Cera de Abejas
        </a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon Balm for Lush Lips</b><br><br>

Una cera natural producida por las abejas, con propiedades emolientes, calmantes y

suavizantes. La cera proporciona una barrera natural contra el frío, el viento y la pérdida

de humedad. También sirve como un emulsionante y para ayudar a mantener la

consistencia del producto. Provee un agradable olor a miel.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
          Bertholletia Excelsa seed oil: Nuez de Brasil
        </a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Antioxidant Body Lotion</b><br><br>

Nuestro aceite de nuez de Brasil se extrae por prensado en frío de las semillas de árboles de

Bertholletia excelsa de la Amazonía.

El aceite refinado es de color amarillo claro y rico en proteínas, ácidos grasos esenciales

(oleico, linoleico), phytoesterol y selenio, así como vitaminas A, B, C y E. Los extractos de la

nuez del Brasil producen hidratación de larga duración y en la piel además la protegen de

los radicales libres por su efecto antioxidante.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapse6">
          Bisabolol: Extracto vegetal de Mansanilla
        </a>
      </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon Awakening Daily Facial Mousturizer, Amazonian Night

Renewal Cream.</b><br><br>

Derivado de las flores de la manzanilla es conocido por sus propiedades suavizantes,

cicatrizantes, calmantes, anti-inflamatorias, protectoras, anti-irritantes y antimicrobianas.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapse7">
          Butyrospermum parkii (Shea) butter: Manteca de Karité
        </a>
      </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
       <b> PRODUCTOS: Antioxidant Body Lotion, Amazon Facial Cleanser, Balm for Lush

Lips.</b><br><br>

La manteca de karité es un humectante natural intenso, muy apreciado por sus propiedades

emolientes, cicatrizantes y protectoras de la piel y el cabello.

Su origen es äfrica dónde tradicionalmente se ha utilizado para el tratamiento del cabello

rizado y maltratado por el sol, además para ayudar a la curación de heridas y quemaduras

menores.

La manteca de karité tiene excelentes propiedades de penetración en la piel y contiene

alantoína, sustancia cicatrizante que reduce el tiempo de curación de los tejidos dañados.

La mantequilla de Karité tiene un alto Factor Natural de Humectación, porque es rica en

ácidos grasos y ácidos grasos esenciales y vitamina E que ayudan a restaurar el contenido

de lípidos de la piel y la protegen del daño de los radicales libres.

Químicamente se compone principalmente de ácido palmítico (2-6%); ácido esteárico (15-

25%); ácido oleico (60-70%); ácido linolénico (5-15%); ácido linoleico (&lt;1%) y la fracción

insaponificable original que le da una gran capacidad hidratante y emoliente.

Además, Contiene antioxidantes tales como tocoferoles (vitamina E) y catequinas (que

también se encuentran en el té verde). Se han reportado otros compuestos específicos tales

como alcoholes triterpénicos que tienen la propiedad de reducir la inflamación; ésteres de

ácido cinnámico, que tienen una capacidad limitada para absorber la radiación ultravioleta

(UV) y lupeol, que evita los efectos de envejecimiento de la piel mediante la inhibición de

enzimas que degradan proteínas cutáneas.

También protege la piel mediante la estimulación de la producción de proteínas

estructurales por células especializadas de la piel (fibroblastos).

Manteca de Karité es de color blanquecino, es una grasa sólida que se licua al tacto.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="true" aria-controls="collapse8">
          Calendula officinalis (calendula) flower extract: Caléndula
        </a>
      </h4>
    </div>
    <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Antioxidant Body Lotion, Amazon Facial Cleanser, Amazon

Awakening Daily Facial, Pure amazon body oil, Balm for lush lips, Revitalizing

Amazonian eye cream, Amazon night renewal cream, Amazon awakening facial

cleanser, Clear away amazon body scrub.</b><br><br>

La Caléndula puede reducir la aparición de enrojecimiento e irritación por su efecto

calmante y refrescante de la piel. Favorece la curación de las heridas y posee propiedades

anti-inflamatorias y antibacterianas.

Los principales componentes de la caléndula incluyen carotenoides y flavonoides (triter-

penoides / ácido oleanólico).
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="true" aria-controls="collapse9">
          Camellia Sinensis (Green tea) leaf extract: Té verde
        </a>
      </h4>
    </div>
    <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Body Butter, Deep nourishing Hand cream</b><br><br>

El té verde contiene vitaminas, flavonoides, metilxantinas, taninos y polifenoles que son

antioxidantes fuertes y agentes anti-inflamatorios. El componente activo principal del

extracto de té verde, la epigalocatequina – 3 - galato (EGCG), que representa el 40 %

del contenido total de polifenoles del té verde, es un antioxidante.

Además de estos antioxidantes que ayudan a reparar el daño oxidativo de las células, el

té verde también contiene taninos con propiedades antibacterianas y metilxantinas que

trabajan para mejorar el tono y la textura de la piel.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="true" aria-controls="collapse10">
          Carapa guaianensis (Andiroba) seed oil: Andiroba
        </a>
      </h4>
    </div>
    <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Balm for lushLips, Deep nourishing hand cream, Antioxidant body

lotion, Natural radiance facial cleanser, Clear away amazon body scrub</b><br><br>

Obtenido del árbol de andiroba, un miembro de la familia de la caoba, este aceite se ha

utilizado durante siglos por las tribus del Amazonas para usos etnomedicinal como la

artritis, las picaduras de insectos y las enfermedades con inflamación asociada.

Las semillas producen un aceite ligeramente amarillo rico en ácidos grasos, limonoides,

ácidos grasos omega - 3 y vitaminas que son beneficiosas para la piel.

Los limonoides, en particular, poseen propiedades anti- inflamatorias de la piel.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="true" aria-controls="collapse11">
          Cetearyl olivate and sorbitan olivate
        </a>
      </h4>
    </div>
    <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRDUCTOS: Antioxidant body lotion, Natural radiance facial cleanser, Amazon

awakening daily facial, Revitalizing Amazonian eye cream, Amazon night renewal

cream, Clear away amzon facial scrub, Deep nourishing hand cream, Clear away

amazon body scrub,Amazon body butter</b><br><br>

Es una combinación de ácidos grasos, derivados del aceite de oliva, químicamente similar a

la composición de lípidos de la superficie de la piel, tiene la propiedad de emulsionar en

medios hidrófilos o lipófilos.

También tiene la capacidad de generar estructuras de cristal líquido que imitan la matriz

extracelular de los lípidos del estrato córneo organización tridimensional. Estos cristales

líquidos presentan una estructura molecular similar a la observada en la capa lipídica de la

piel.

Los cristales líquidos, que tiene una composición de ácidos grasos &quot; semejante a la piel &quot; ,

tienen una doble característica única: en la piel mejoran la integridad de la barrera y la

entrega de sustancias través de capas de estrato córneo .
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="true" aria-controls="collapse12">
          Cinnamomum zeylanicum (Cinnamon) bark extract: Canela de Ceylan
        </a>
      </h4>
    </div>
    <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Antioxidant body lotion, Natural radiance facial cleanser, Amazon

awakening daily facial, Pure amazon body oil, Balm for lush Lips, Revitalizing

Amazonian eye cream, Amazon night renewal cream, Amazon awakening facial

cleanser, Clear away amzon facial scrub, Deep nourishing hand cream, Amazon

awakening body wash, Clear away amazon body scrub,Amazon body butter.</b><br><br>

Se obtiene a partir de la corteza seca del árbol de la canela, este extracto natural está

compuesto principalmente de aceites volátiles y taninos.

Estudios recientes han demostrado que los extractos de canela poseen propiedades

antimicrobianas y antioxidantes. Históricamente, la canela se ha utilizado como un

estimulante, astringente y un agente antiséptico
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="true" aria-controls="collapse13">
          Coco-glucoside and Glyceryl oleate
        </a>
      </h4>
    </div>
    <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon awakening body wash</b><br><br>

Elaborado de aceites vegetales tales como aceite de coco, aceite de palma, aceite de

girasol y maíz. Diminuye la perdida de agua transepidermica, dando características de

humectación.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="true" aria-controls="collapse14">
          Coffea arabica seed oil: Aceite de Café Arábigo
        </a>
      </h4>
    </div>
    <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Clear away amazon facial scrub</b><br><br>

El aceite de café se obtiene por la expresión de los granos. Por su alto contenido de acidos

grasos tiene propiedades de sintesis de cerámidas, hiratación, keratinización de la piel. Por

su alto contenido de terpenos tiene efectos lipoliticos, reafirmantes, regenerantes.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="true" aria-controls="collapse15">
          Copernicia cerifera wax: Cera Carnauba
        </a>
      </h4>
    </div>
    <div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Natural radiance facial cleanser, Balm for lush lips</b><br><br>

Esta cera vegetal se obtiene mediante el raspado de la capa de cera de las hojas del arbusto

tropical Copernicia cerifera. Después de refinamiento, la cera natural sirve como un agente

espesante que mejora la consistencia del producto y proporciona una barrera protectora que

impide la deshidratación por el sudor.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse16" aria-expanded="true" aria-controls="collapse16">
          Daucus carota (carrot) root oil: Zanahoria
        </a>
      </h4>
    </div>
    <div id="collapse16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>Se encuentra en: Balm for lush lips</b><br><br>

La planta de zanahoria, también conocido como cordón de la reina Anna, produce un aceite

emoliente que sirve como factor hidratante natural de la piel. Este extracto de color dorado

contiene poderosos antioxidantes (carotenoides, vitaminas A y E) que acondicionan la piel y

protegen las células del daño de los radicales libres.

Estudios indican efectos fotoprotectores de los carotenoides por ser precursores de la

síntesis de vitamina E.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse17" aria-expanded="true" aria-controls="collapse17">
          Dioscorea villosa (Wild yam) root extract: Ñame
        </a>
      </h4>
    </div>
    <div id="collapse17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Antioxidant body lotion, Body Butter; Revitalizing eye cream,

Amazon night Renewal Cream</b><br><br>

El extracto de las raíces de Dioscorea villosa (ñame salvaje) contiene como activos

saponinas (Dioscin principalmente), fitoesteroles y taninos. La Dioscin tiene propiedades

anti-inflamatorias que pueden beneficiar a la piel sensible o condiciones inflamatorias como

el eczema.



Por las propiedades antimicrobianas y antibacterianas de las saponinas se utiliza en la

protección de la piel y por su contenido en fitosteroles base para la síntesis de hormonas

femeninas se utiliza como antiedad en pieles prematuramente envejecidas.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse18" aria-expanded="true" aria-controls="collapse18">
          Disodium Lauryl Sulfosuccinate (and) Sodium Cocoyl Isethionate

(and) Zea Mays (corn) Starch (and) Cetearyl Alcohol (and) Aqua

(and) Glycerin (and) Hydrogenated Castor Oil (and)

Cocamidopropyl Betaine (and) CI 77891
        </a>
      </h4>
    </div>
    <div id="collapse18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon awakening facial cleanser</b><br><br>

Blend de detergentes suaves que limpia y humectan de una sola vez.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse19" aria-expanded="true" aria-controls="collapse19">
          Euphorbia cerifera wax: Cera Candelilla
        </a>
      </h4>
    </div>
    <div id="collapse19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Balm for lush lips</b><br><br>

La cera de candelilla es una cera vegetal relativamente dura, obtenida de la capa

protectora de arbustos de Candelilla. Su color es por lo general amarillo claro se usa como

protectora y emoliente y también por su capacidad de dar consistencia y formar barrera

protectora.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse20" aria-expanded="true" aria-controls="collapse20">
          Euterpe Oleracea Fruit Oil: Aceite de Acaí
        </a>
      </h4>
    </div>
    <div id="collapse20" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Revitalizing amazonian eye cream</b><br><br>

Es una semilla obtenida de una palma del Brasil, por su contenido de polyfenoles tiene una

excelente capacidad antioxidante recomendado como antiedad. Protectora de la piel.

Mantiene la humedad de la piel y evita que esta se deshidrate.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse21" aria-expanded="true" aria-controls="collapse21">
          Glycerine (vegetable source): Glicerina
        </a>
      </h4>
    </div>
    <div id="collapse21" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon Body Butter, Antixodant body lotion, Amazon awakening

daily facial, Revitalizing amazonian eye cream, Amazon awakening facial

cleanser, Deep nourishing hand cream</b><br><br>

La glicerina es un factor hidratante natural que ayuda a la piel a mantener su equilibrio de

humedad. La glicerina se utiliza en productos PIUDALÍ se deriva únicamente a partir de

fuentes vegetales.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse22" aria-expanded="true" aria-controls="collapse22">
          Helianthus annuus (Sunflower) seed oil: Aceite de Girasol
        </a>
      </h4>
    </div>
    <div id="collapse22" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Natural radiance facial cleanser, Pure amazon body Oil, Balm for lush

lips, Amazon Night Renewal Cream.</b><br><br>

El aceite no volátil obtenido por expresión de las semillas de girasol es un excelente

emoliente. Rico en vitamina E nutre y ayuda a la piel a retener la humedad.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse23" aria-expanded="true" aria-controls="collapse23">
          Hydrastis Canadensis (Goldenseal) root extract: Sello de Oro
        </a>
      </h4>
    </div>
    <div id="collapse23" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Antioxidant body lotion, Natural radiance facial cleanser, Amazon

awakening daily facial, Pure amazon body oil, Balm for lush lips, Revitalizing

Amazonian eye cream, Amazon night renewal cream, Amazon awakening facial

cleanser, Clear away amazon facial scrub, Deep nourishing hand cream, Amazon

awakening body wash, Clear away amazon body scrub, Amazon body butter.</b><br><br>

Derivado de la raíz de la planta sello de oro, este extracto tiene propiedades anti-

inflamatorias y antimicrobianas que ayudan a proteger la piel de las infecciones. En

cosmética natural se usa como conservante en mezclas con otros aceites esenciales que

potencian su acción. Además contiene berberina, (se ha demostrado que poseen accion

fungicida y antibacteriana) y canadaline, la que parece ser responsable de la actividad

antimicrobiana de sello de oro.

Las hojas y raíces de sello de oro tienen una larga historia de uso medicinal, después de

haber sido usadas como tratamiento herbolario para una variedad de infecciones y dolencias

de la piel.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse24" aria-expanded="true" aria-controls="collapse24">
          Hydrolyzed Erythrina Edulis Seed: Balú
        </a>
      </h4>
    </div>
    <div id="collapse24" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTO: Amazon awakening toner</b><br><br>

La comunidad Ingana localizada en el Putumayo considera el árbol de balú como un milagro,

ya que salvo a la comunidad de la extinción, por su gran contenido de aminoácidos afines a

la piel y el cabello, Formador de film, Humectante. Estimula ligeramente, la proliferación de

los fibroblastos
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse25" aria-expanded="true" aria-controls="collapse25">
          Jojoba sters:
        </a>
      </h4>
    </div>
    <div id="collapse25" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Revitalizing Amazonian eye cream, Clear away amazon facial scrub,

Clear away amazon body scrub, Amazon body butter.</b><br><br>

Derivado del aceite de jojoba, conservando las características de humectación, suavidad en

la piel, reduce líneas suaves del rostro.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse26" aria-expanded="true" aria-controls="collapse26">
          Juglans regia shell powder: Cáscara de Nuez de Nogal
        </a>
      </h4>
    </div>
    <div id="collapse26" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
       <b>PRODUCTOS: Clear away amazon facial scrub</b><br><br>

La cáscara de nuez molida es un exfoliante o abrasivo de origen natural, adecuado para

productos de cuidado personal encaminados a eliminar las células superficiales de la piel y

eliminar asperezas.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse27" aria-expanded="true" aria-controls="collapse27">
          Lavandula angustifolia (Lavender) flower extract: Lavanda
        </a>
      </h4>
    </div>
    <div id="collapse27" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTO: Antioxidant body lotion, Natural radiance facial cleanser, Amazon

awakening daily facial, Pure amazon body oil, Balm for lush lips, Revitalizing

Amazonian eye cream, Amazon night renewal cream, Amazon awakening facial

cleanser, Clear away amzon facial scrub, Deep nourishing hand cream, Amazon

awakening body wash, Clear away amazon body scrub, Amazon body butter.</b><br><br>

Extracto de la flor de la lavanda tiene propiedades antibacterianas, efectos anti-

inflamatorios y calmantes, por lo que es muy beneficioso para la piel con problemas. En

cosmética natural se le usa en mezclas conservantes.

Reconocido por sus impresionantes flores de color púrpura a la luz, delicioso aroma de

lavanda ha hecho que sea una hierba aromática preferida durante siglos.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse28" aria-expanded="true" aria-controls="collapse28">
          Macadamia ternifolia (Macadamia nut) oil: Macadamia
        </a>
      </h4>
    </div>
    <div id="collapse28" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTO: Antioxidant body lotion, Balm for lush lips, AmazonNight Renewal

Cream.</b><br><br>

El aceite de macadamia es muy similar al propio aceite natural de la piel (sebo). Esto

permite biocompatibilidad de aceite de nuez de macadamia se absorbe con eficacia, lo que

permite la piel recibir rápidamente sus efectos de suavizado y acondicionamiento.

El aceite también tiene un alto nivel de ácido palmitoleico, un antioxidante natural que

ayuda a la piel a combatir los radicales libres que pueden causar daño oxidativo a las

células.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse29" aria-expanded="true" aria-controls="collapse29">
          Mangifera Indica Fruit Extract: Extracto de Mango
        </a>
      </h4>
    </div>
    <div id="collapse29" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTO: Amazon awakening body wash, Clear away amazon body scrub</b><br><br>

La fruta de mango contiene acido ascorbico y dehidroascorbic, β caroteno y otros

carotenoides, polyphenols (especialmente mangiferrin, isomangiferrin, quercetin and

anthocyanins que le dan caracteristicas antioxidantes.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse30" aria-expanded="true" aria-controls="collapse30">
          Mangifera Indica seed butter: Mantequilla de Mango
        </a>
      </h4>
    </div>
    <div id="collapse30" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTO: Clear away amazon facial scrub</b><br><br>

La mantequilla de mango se obtiene de la almendra de la semilla de fruta de mango y es

una buena fuente de ácidos grasos esenciales (Oleico). Tiene propiedades hidratantes,

nutritivas y de lubricación beneficioso para el cuidado de la piel y el cabello.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse31" aria-expanded="true" aria-controls="collapse31">
          Mauritia flexuosa (Buriti) fruit oil: Aceite de buriti
        </a>
      </h4>
    </div>
    <div id="collapse31" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTO: Pure amazon body Oil; Natural radiance facial Cleanser; Balm for lush

lips; Clear away amazon body scrub</b><br><br>

Llamado el &quot; árbol de la vida &quot; por las tribus amazónicas, la palma de Buriti alcanza niveles

altísimos y produce una fruta amarilla única por su diseño estriado. El aceite de esta fruta

tropical es rica en ácidos grasos, carotenoides y vitaminas A y C, que le confieren sus

propiedades: antioxidante, anti-inflamatoria, emoliente y suavizante.

Increíblemente relajante, el aceite de Buriti se ha utilizado tradicionalmente por los

indígenas de la Amazonía en forma tópica para calmar las quemaduras y otras irritaciones

de la piel.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse32" aria-expanded="true" aria-controls="collapse32">
          Melaleuca alternifolia (Tea tree) leaf oil: Arbol de té
        </a>
      </h4>
    </div>
    <div id="collapse32" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTO: Antioxidant body lotion, Pure amazon body oil, Natural radiance facial

cleanser, Amazonian night renewal cream, Clear away amazon facial scrub, Deep

nourishing hand cream, Balm for lush lips; Amazon awakening daily facial, Clear

away amazon body scrub, Amazon body butter.</b><br><br>

Aceite de árbol de té tiene una gran variedad de propiedades beneficcas. Por sus

propiedades antisépticas, anti-inflamatorias y antimicrobianas se utiliza en la cosmética

antiacné y en otros desórdenes de la piel y las uñas como son algunas infecciones por

hongos.

Debido a sus propiedades antimicrobianas, el aceite del árbol de té también se utiliza como

conservante natural.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse33" aria-expanded="true" aria-controls="collapse33">
          Myrica cerifera (Bayberry) wax: Cera de Laurel
        </a>
      </h4>
    </div>
    <div id="collapse33" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTO: Balm for lush lips</b><br><br>

Se obtiene de cultivos en el sur de Colombia y se refina en Europa. Las bayas del fruto

producen esta cera natural que tiene en su composición ácidos grasos y ácidos grasos

esenciales. Estos ácidos grasos proporcionan una protección natural y fortalecen la función

de barrera de la piel con lo cual se evita la salida de agua de adentro hacia fuera y por esto

se permite un efecto hidratante físico.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse34" aria-expanded="true" aria-controls="collapse34">
          Oenocarpus Bataua Fruit Oil: Aceite de Seje
        </a>
      </h4>
    </div>
    <div id="collapse34" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTO: Revitalizing amazonian eye cream, Clear away amazon facial scrub,

Deep nourishing hand cream.</b><br><br>

Es una planta sagrada de los indígenas del Amazonas ya que su utiliza como alimento y

bebida. El aceite de seje (Oenocarpus Bataua) Se obtiene por expresión del fruto. Su

contenido de omega 3 y 6 presenta características antiedad que se comprobaron en un test

en vivo con 25 mujeres donde se obtuvo una mejora después de 2 semanas de aplicación

de un 27% en profundidad. Además tiene estudios de efecto hidrante prolongado.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse35" aria-expanded="true" aria-controls="collapse35">
          Orbignya oleifera seed oil: Babassú
        </a>
      </h4>
    </div>
    <div id="collapse35" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTO: Natural radiance facial cleanser</b><br><br>

Aceite comestible de la semilla de babassú es muy apreciado por sus cualidades

antioxidantes y antirradicales libres ya que contiene vitamina E natural y fitosteroles.

Combate la inflamación efectivamente y tradicionalmente se ha usado por los nativos para

el tratamiento de excemas, quemaduras y cortadas. Los estudios informan que su uso

tópico es muy seguro.

Tambien se utiliza como emoliente y suavizante en productos infantiles por su alta y

rápida penetración y porque no deja residuo graso en la piel.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse36" aria-expanded="true" aria-controls="collapse36">
          Origanum vulgare leaf extract: Orégano
        </a>
      </h4>
    </div>
    <div id="collapse36" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Antioxidant body lotion, Natural radiance facial cleanser, Amazon

awakening daily facial, Pure amazon body oil, Balm for lush lips, Revitalizing

Amazonian eye cream, Amazon night renewal cream, Amazon awakening facial

cleanser, Clear away amazon facial scrub, Deep nourishing hand cream, Amazon

awakening body wash, Clear away amazon body scrub,Amazon body butter.</b><br><br>

Usado como condimento en la comida, esta hierba también posee potentes propiedades

antibacterianas y antifúngicas que ayudan a la conservación de los alimentos y cosméticos

naturales. Utilizado en forma tópica el extracto de las hojas de orégano desintoxica y

protege la piel. Tambien se ha usado para tratamiento de acné, piel grasa, pie de atleta,

caspa, rosácea y psoriasis. Igualmente se usa como repelente de mosquitos.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse37" aria-expanded="true" aria-controls="collapse37">
          Palmitoyl glycine
        </a>
      </h4>
    </div>
    <div id="collapse37" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTO: Revitalizing Amazonian eye cream</b><br><br>

De acuerdo con un grupo de investigadores, el envejecimiento es el resultado de una

inflamación silenciosa crónica. Esta inflamación afecta a toda la población y se acentua con

el tiempo. Se caracteriza por por una presencia crónica de la interlukina-6 (citokina

proinflamatoria). El palmitoyl glycine es una molecula biomimetica que actua a nivel de la

interlukina-6 disminuyendo las arrugas hasta en un 35% en profundidad.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse38" aria-expanded="true" aria-controls="collapse38">
          Passiflora Edulis (Passion fruit) oil: Aceite Semillas de Maracuyá
        </a>
      </h4>
    </div>
    <div id="collapse38" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Antioxidant body lotion, Amazon awakening facial cleanser, Pure

amazon body oil, Deep nourishing hand cream, Clear away amazon body scrub,

Amazon body Butter, Balm for lush lips</b><br><br>

El aceite de las semillas de maracuyá contiene altos niveles de ácido linoléico y ácidos

grasos Omega 6, es de fácil absorción por la piel y la mantiene suave y flexible.

El aceite también ha demostrado tener propiedades hidratantes, antioxidantes,

antiinflamatorias, antipruriginosas y astringentes.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse39" aria-expanded="true" aria-controls="collapse39">
          Persea gratissima (Avocado) oil: Aceite de Aguacate
        </a>
      </h4>
    </div>
    <div id="collapse39" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PODUCTOS: Pure amazon body Oil, Amazon night renewal cream</b><br><br>

Este aceite muy nutritivo y calmante está constituido por gran cantidad de ácidos grasos

omega 3 en forma de alfa linolénico y vitaminas que son necesarios para la salud la piel

especialmente para hidratarla y mantenerla suave.

El aceite de aguacate se puede equiparar al NMF Factor hidratante natural de la piel,

además es capaz de penetrar profundamente en la piel para reparar y suavizar con su

mezcla natural de antioxidantes, minerales (magnesio, fosforo, hierro y potasio), ácido

pantoténico (vitamina B5) y vitaminas A, D y E.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse40" aria-expanded="true" aria-controls="collapse40">
          Psidium Guajava Fruit Extract - Guayaba
        </a>
      </h4>
    </div>
    <div id="collapse40" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon awakening toner, Amazon awakening body wash</b><br><br>

Provienen de America tropical, su contenido de vitaminac C, vitamina B y polifenoles lo

hace excelente para productos antiedad.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse41" aria-expanded="true" aria-controls="collapse41">
          Prunus amygdalus dulcis (Almond) seed oil: Aceite de Almendras
        </a>
      </h4>
    </div>
    <div id="collapse41" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon awakening daily facial, Pure amazon body Oil, Amazon Night

Renewal Cream</b><br><br>

El aceite de almendras dulces comúnmente se usa como acondicionador de la piel y agente

lubricante y suavizante. Tambien actua como emulsificante e hidratante para pieles secas,

labios partidos y manos resecas.

Es un aceite ligero que se absorbe rápida y fácilmente.

Precaución: puede generar reacción en personas alérgicas a las almendras.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse42" aria-expanded="true" aria-controls="collapse42">
          Prunus armeniaca seed powder: Nuez de Durazno
        </a>
      </h4>
    </div>
    <div id="collapse42" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Clear away amazon facial scrub</b><br><br>

La nuez molida es un exfoliante o abrasivo de origen natural, adecuado para productos de

cuidado personal encaminados a eliminar las células superficiales de la piel y eliminar

asperezas.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse43" aria-expanded="true" aria-controls="collapse43">
          Ricinus communis (Castor) oil: Aceite de Riricino
        </a>
      </h4>
    </div>
    <div id="collapse43" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Balm for lush lips</b><br><br>

Un aceite extraido de la semilla de ricino o higuerilla por expresión en frío.

El aceite de ricino se compone principalmente de ácidos grasos y de él se han elaborado

muchos derivados útiles en cosmética como lo son los ricinoleatos.

Este aceite altamente emoliente confiere brillo y suavidad a los labios y retiene la humedad.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse44" aria-expanded="true" aria-controls="collapse44">
          Rosmarinus Officinalis (Rosemary) extract: Romero
        </a>
      </h4>
    </div>
    <div id="collapse44" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon awakening daily facial, Pure amazon body oil, Amazonian

night renewal cream</b><br><br>

El romero de la familia de menta rico en aceite esencial con propiedades antioxidantes y

antimicrobianas que lo hacen apto para conservar cárnicos, alimentos y cosméticos.

Util para el tratamiento cosmético de la celulitis (piel de naranja) por sus propiedades

antiinflamatorias y desintoxicantes.

El romero se usa tradicionalmente en forma tópica para cicatrizar heridas, fortalecer el

cabello, evitar la calvicie, para calmar dolores musculares, mialgias y para repeler insectos.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse45" aria-expanded="true" aria-controls="collapse45">
          Scleroglucan
        </a>
      </h4>
    </div>
    <div id="collapse45" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon awakening daily facial, Amazonian night renewal cream</b><br><br>

El escleroglucano es un polisacárido natural producido por el hongo Sclerotium rolfsii. De

la avena y sus derivados también se obtiene este polímero con gran capacidad de absorber

agua. Actúa como agente fijador de humedad natural y le confiere hidratación y extrema

suavidad a la piel. Se usa especialmente en piel seca y para el manejo de la dermatitis de

contacto.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse46" aria-expanded="true" aria-controls="collapse46">
          Sodium cocoyl alaninate
        </a>
      </h4>
    </div>
    <div id="collapse46" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Revitalizing amazonian eye cream</b><br><br>

Trabaja contra el tiempo, sobre las células dérmicas y epidérmicas, actua frente al estrés

oxidativo, los daños causados por los rayos UV, la perdida de adhesión celular a la matrix

extracelular.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse47" aria-expanded="true" aria-controls="collapse47">
          Sodium lauroyl sarcosinate
        </a>
      </h4>
    </div>
    <div id="collapse47" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon awakening body wash</b><br><br>

Tensioactivo aniónico cuya superficie de actividad, de compatibilidad y de sustantividad le

otorgan características de humectante, formación de espuma y agente de

acondicionamiento, todo en uno. Los sarcosinatos de sodio son menos alcalino que su

jabón de ácido graso correspondiente, que exhiben un rendimiento óptimo bajo ligeramente

condiciones ácidas.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse48" aria-expanded="true" aria-controls="collapse48">
          Theobroma cacao (cocoa) seed Butter: Manteca de Cacao
        </a>
      </h4>
    </div>
    <div id="collapse48" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Natural radiance facial cleanser, Balm for lush lips, Amazon

awakening facial cleanser, Clear away Amazon facial scrub, Clear away Amazon

body scrub.</b><br><br>

Manteca extraída de granos de cacao, con excelentes propiedades emolientes. Se utiliza

para suavizar y proteger la piel y la mucosa de los labios. Es una excelente fuente de

antioxidantes naturales los cuales combaten los radicales libres y ayudan a proteger la piel

de los inevitables signos del envejecimiento y del estress ambiental.

La manteca de cacao nutre y protege la piel debido a su composición beneficioso de

carbohidratos, ácidos grasos (oleico y esteárico), minerales (potasio, zinc, magnesio y

cobre) y alto contenido de proteína (aproximadamente 11 %).

La manteca de cacao es ideal para el tratamiento de piel sensible porque la hidrata y la

protege del medio ambiente.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse49" aria-expanded="true" aria-controls="collapse49">
          Theobroma grandiflorum (Cupuacu) seed butter: Mantequilla de cupuasú
        </a>
      </h4>
    </div>
    <div id="collapse49" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Antioxidant body lotion, Amazon awakening daily facial, Balm for

lush lips, Revitalizing Amazonian eye cream, Amazon night renewal cream, Deep

nourishing hand cream, Amazon awakening body wash,Clear away amazon body

scrub, Amazon body butter.</b><br><br>

La manteca de Cupuaçu es un excelente emoliente con una alta capacidad de retención de

agua. Esta mantequilla de base vegetal es mucho más eficaz que los emolientes de origen

animal como la lanolina. De hecho, tiene la capacidad de retener 100 veces más humedad

que la lanolina para una hidratación de mayor duración.

Los fitoesteroles que se encuentran en Cupuaçu también actúan para ayudar a regular y

equilibrar los lípidos en la piel. Todas estas propiedades hacen que la mantequilla de

cupuaçu sea un hidratante superior que se compara con el factor de hidratación normal de

la piel suave y se encarga de mantener el equilibrio hidrolipídico.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse50" aria-expanded="true" aria-controls="collapse50">
          Thymus vulgaris (Thyme) leaf/ flower extract: Tomillo
        </a>
      </h4>
    </div>
    <div id="collapse50" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Antioxidant body lotion, Natural radiance facial cleanser, Amazon

awakening daily facial, Pure amazon body oil, Balm for lush lips, Revitalizing

Amazonian eye cream, Amazon night renewal cream, Amazon awakening facial

cleanser, Clear away amazon facial scrub, Deep nourishing hand cream, Amazon

awakening body wash, Clear away amazon body scrub,Amazon body butter.</b><br><br>

Además de su agradable aroma, el tomillo posee actividad antioxidante natural y

propiedades bactericidas. Uno de los constituyentes del tomillo, el timol, también tiene

fuertes propiedades antifúngicas.Por esto se usa en productos para tratar la calvicie y en

infecciones de los oídos y de los dientes. En cosmética natural se usa para la conservación

de los productos.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse51" aria-expanded="true" aria-controls="collapse51">
          Trifolium repens (Red clover) extract: Trebol Rojo
        </a>
      </h4>
    </div>
    <div id="collapse51" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazonian Night Renewal Cream</b><br><br>

Este extracto tiene poder antioxidante y propiedades anti-inflamatorias, contiene altas

concentraciones de isoflavonas. Se usa tradicionalmente para contrarrestar los síntomas de

la menopausia (los calores, mastalgia) y los dolores del síndrome premestrual. Las

isoflavonas contenidas en el trébol rojo se transforman en el cuerpo en fitoestrógenos

similares en comportamiento a los estrógenos.

Aplicado sobre la piel ayuda en el manejo del cancer de piel, llagas en la piel, quemaduras,

eczema y psoriasis por cuanto reduce la inflamación.

El extracto ayuda a mejorar el tono de la piel, le da claridad y la acondiciona.

El extracto de trébol rojo también se ha usado para reducir los signos de envejecimiento de

la piel porque aumenta la producción de colágeno.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse52" aria-expanded="true" aria-controls="collapse52">
          Triticum Vulgare (Wheat germ) oil: Aceite de germen de trigo
        </a>
      </h4>
    </div>
    <div id="collapse52" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Antioxidant body lotion, Natural radiance facial cleanser, Pure

amazon body oil, Balm for lush lips, revitalizing Amazonian eye cream, Amazonian

night renewal cream, Amazon awakening facial cleanser, Clear away amazon facial

scrub, Deep Nourishing hand cream, Amazon awakening body wash, Clear away

amazon body scrub, Amazon body butter.</b><br><br>

El aceite de germen de trigo tiene altas concentraciones de vitamina E natural, minerales,

vitaminas, proteinas y ácidos grasos esenciales. El aceite de germen de trigo protege la piel

de las irritaciones, y promueve la formación de piel más joven debido a las fitoestimulinas

que contiene. El poder antioxidante de la vitamina E combate los radicales libres y sirve

como un agente anti-envejecimiento.

Su principal uso es para combatir la resequedad en la piel, protección de las quemaduras

solares y manejo de piel prematuramente envejecida. Cuando se aplica en la piel aumenta

la circulación y ayuda a reparar las células epidérmicas que se han deteriorado por la

exposición al sol.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse53" aria-expanded="true" aria-controls="collapse53">
          Usnea barbata (Lichen) extract: Barba de capuchino
        </a>
      </h4>
    </div>
    <div id="collapse53" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Antioxidant body lotion, Amazon awakening daily facial, Amazon

Body Butter, Deep nourishing hand cream, Amazon Night Renewal Cream.</b><br><br>

Es un líquen (simbiosis entre un hongo u una alga), se ha utilizado durante siglos como un

agente antifúngico. Los líquenes producen antibióticos naturales, entre ellos el ácido úsnico

para protegerse de otras bacterias. Esta acción le confiere propiedades antibacterianas que

son beneficiosos para la piel.

El ácido usnico es efectivo contra bacterias gran positivas tales como streptococos y

staphylococos por lo cual la Usnea se usa para combatir infecciones de la piel.

En un estudio reciente, el romero y la usnea mostraron ser eficaz contra un variado grupo

de bacterias.

Por estos efectos antimicrobianos pueden ser útiles para la desintoxicación de la piel y el

alivio tópico de trastornos de la piel como el acné y el eczema.

En cosmética natural se usa como conservante y desodorante.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse54" aria-expanded="true" aria-controls="collapse54">
          Vitis vinifera (Grape) seed oil: Aceite de Uva
        </a>
      </h4>
    </div>
    <div id="collapse54" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Pure amazon Body Oil</b><br><br>

Este aceite emoliente tiene un alto contenido de ácidos grasos (ácido linoléico) y

antioxidantes. La aplicación tópica de extractode semillas de uva (que contiene

proantocianidina) GSPE ) se ha demostrado que es beneficioso para la cicatrización de

heridas y desinfección de las mismas.

Este aceite ligero además de ser un suavizante único actúa como factor hidratante

natural necesario para mantener un adecuado balance hidrolípidico.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse55" aria-expanded="true" aria-controls="collapse55">
          Xanthan Gum: Goma Xanthan
        </a>
      </h4>
    </div>
    <div id="collapse55" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Amazon awakening toner, Revitalizing Amazonian eye cream,

Amazon awakening facial cleanser, Deep Nourishing hand cream, Amazon

awakening body wash, , Amazon body butter.</b><br><br>

Polisacarido de alto peso molecular, que se emplea como agente viscosante.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse56" aria-expanded="true" aria-controls="collapse56">
          Xylitylglucoside (and) Anhydroxylitol (and) Xylitol
        </a>
      </h4>
    </div>
    <div id="collapse56" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <b>PRODUCTOS: Revitalizing Amazonian eye cream</b><br><br>

Agente de humectación y restructuración natural capaz de atrapar agua libre. Resultados

visibles en la superficie y mejora el microrelieve de la piel.
      </div>
    </div>
  </div>
  </div>
</div>-->
							<?php
							break;
					}
				?>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
