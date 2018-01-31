<?php 

/**
* 
*/
class ControllerTienda
{

	public $nombre_pdt = '';
	public $promesa_pdt = '';
	public $banner_parallax = '';
	public $img_flotante_1 = '';
	public $img_flotante_2 = '';
	public $ingredientes = array();
	public $uso = array();
	
	function __construct()
	{
		$this->usuarios = new Usuarios();
		$this->productos = new Productos();
		$this->carrito = new Carrito();
		$this->ordenes = new Ordenes();
	}

	private function infoProducto($producto){

		$this->ingredientes = array(

			'chontaduro' => array ('ingredientes/chontaduro.jpg', 'Chontaduro' ,'El aceite extraído de este fruto tiene poder de penetración excepcional, por tanto, su acción antioxidante, alcanza las mitocondrias produciendo un efecto de antienvejecimiento, regenerativo y nutriente en las capas más profundas de la piel.'),

			'cafe' => array ('ingredientes/cafe.jpg', 'Café' ,'El aceite de café se obtiene por la expresión de los granos.  Por su alto contenido de acidos grasos tiene propiedades de sintesis de cerámidas, hiratación, keratinización de la piel. Por su alto     contenido de terpenos tiene efectos lipoliticos, reafirmantes, regenerantes.'),

			'abejas' => array ('ingredientes/abejas.jpg', 'Cera de Abejas' ,'Una cera natural producida por las abejas, con propiedades emolientes, calmantes y suavizantes.  La cera proporciona una barrera natural contra el frío, el viento y la pérdida de     humedad. También sirve como un emulsionante y para ayudar a mantener la consistencia del producto. Provee un agradable olor a miel.'),

			'acai' => array ('ingredientes/acai.jpg', 'Acaí' ,'Es una semilla obtenida de una palma del Brasil, por su contenido de polyfenoles tiene una excelente capacidad antioxidante recomendado como antiedad. Protectora de la piel. Mantiene la humedad de la piel y evita que esta se deshidrate.'),

			'aceiteoliva' => array ('ingredientes/aceiteoliva.jpg', 'Aceite de Oliva' ,'Es una combinación de ácidos grasos, derivados del aceite de oliva, químicamente similar a la composición de lípidos de la superficie de la piel, tiene la propiedad de emulsionar en medios hidrófilos o lipófilos.

				También tiene la capacidad de generar estructuras de cristal líquido que imitan la matriz extracelular de los lípidos del estrato córneo organización tridimensional. '),

			'aguacate' => array ('ingredientes/aguacate.jpg', 'Aguacate' ,'Este aceite muy nutritivo y calmante está constituido por gran cantidad de ácidos grasos omega 3 en forma de alfa linolénico y vitaminas que son necesarios para la salud la piel especialmente para hidratarla y mantenerla suave.

				El aceite de aguacate se puede equiparar al NMF Factor hidratante natural de la piel, además es capaz de penetrar profundamente en la piel para reparar y suavizar con su mezcla natural de antioxidantes, minerales (magnesio, fosforo, hierro y potasio), ácido pantoténico (vitamina B5) y vitaminas A, D y E.'),

			'almendras' => array ('ingredientes/almendras.jpg', 'Almendras' ,'El aceite de almendras dulces comúnmente se usa como acondicionador de la piel y agente lubricante y suavizante. Tambien actua como emulsificante e hidratante para pieles secas, labios partidos y manos resecas. Es un aceite ligero que se absorbe rápida y fácilmente.'),

			'aloe' => array ('ingredientes/aloe.jpg', 'Aloe Vera' ,'Miembro de la familia de las liliáceas, esta planta se ha utilizado en la medicina tradicional por millones de años para aliviar irritaciones de la piel, picaduras de insectos y quemaduras.  El   gel espeso de las hojas de la planta no sólo es altamente hidratante, sino también es rico en polisacáridos con propiedades anti-inflamatorias, anti-microbianas y cicatrizantes de  heridas.
  				
  				Un factor de crecimiento que se encuentra en el Aloe, giberelinas, es un coadyudante de la activación de los fibroblastos que producen el colágeno necesario para mantener la piel joven.'),

			'andiroba' => array ('ingredientes/andiroba.jpg', 'Andiroba' ,'Obtenido del árbol de andiroba, un miembro de la familia de la caoba, este aceite se ha utilizado durante siglos por las tribus del Amazonas para usos etnomedicinal como la artritis, las  picaduras de insectos y las enfermedades con inflamación asociada.

 				Las semillas producen un aceite ligeramente amarillo rico en ácidos grasos, limonoides, ácidos grasos omega - 3 y vitaminas que son beneficiosas para la piel.   Los limonoides, en particular,  poseen propiedades anti- inflamatorias de la piel.'),

			'babassu' => array ('ingredientes/babassu.jpg', 'Babassú' ,'Aceite comestible de la semilla de babassú es muy apreciado por sus cualidades antioxidantes y antirradicales libres ya que contiene vitamina E natural y fitosteroles. Combate la inflamación  efectivamente y tradicionalmente se ha usado por los nativos para el tratamiento de excemas, quemaduras y cortadas. Los estudios informan que su uso tópico es muy seguro.

 				Tambien se utiliza como emoliente y suavizante en productos infantiles por su alta y rápida penetración y porque no deja residuo graso en la piel.'),
			'balu' => array ('ingredientes/balu.jpg', 'Balú' ,'La comunidad Ingana localizada en el Putumayo considera el árbol de balú como un milagro, ya que salvo a la comunidad de la extinción, por su gran contenido de aminoácidos afines a la piel y  el cabello, Formador de film, Humectante. Estimula ligeramente,  la proliferación de los fibroblastos'),

			'buriti' => array ('ingredientes/buriti.jpg', 'Buriti' ,'Llamado el " árbol de la vida " por las tribus amazónicas, la palma de Buriti alcanza niveles altísimos y produce una fruta amarilla única por su diseño estriado. El aceite de esta fruta tropical es     rica en ácidos grasos, carotenoides y vitaminas A y C, que le confieren sus propiedades: antioxidante, anti-inflamatoria, emoliente y suavizante.

				Increíblemente relajante, el aceite de Buriti se ha utilizado tradicionalmente por los indígenas de la Amazonía en forma tópica para calmar las quemaduras y otras irritaciones de la piel.'),

			'cacao' => array ('ingredientes/cacao.jpg', 'Cacao' ,'Manteca extraída de granos de cacao, con excelentes propiedades emolientes. Se utiliza para suavizar y proteger la piel y la mucosa de los labios. Es una excelente fuente de antioxidantes naturales los cuales combaten los radicales libres y ayudan a proteger la piel de los inevitables signos del envejecimiento y del estress ambiental.

  				La manteca de cacao nutre y protege la piel debido a su composición beneficioso de carbohidratos, ácidos grasos (oleico y esteárico), minerales (potasio, zinc, magnesio y cobre) y alto                 contenido de proteína (aproximadamente 11 %).La manteca de cacao es ideal para el tratamiento de piel sensible porque la hidrata y la protege del medio ambiente.'),

			'calendula' => array ('ingredientes/calendula.jpg', 'Caléndula' ,'La Caléndula puede reducir la aparición de enrojecimiento e irritación por su efecto calmante y refrescante de la piel. Favorece la curación de las heridas y posee propiedades anti-inflamatorias    y antibacterianas. Los principales componentes de la caléndula incluyen carotenoides y flavonoides  (triter-penoides / ácido oleanólico).'),

			'candelilla' => array ('ingredientes/candelilla.jpg', 'Candelilla' ,'La cera de candelilla es una cera vegetal relativamente dura, obtenida de la capa protectora de arbustos de Candelilla. Su color es por lo general amarillo claro se usa como protectora y emoliente y también por su capacidad de dar consistencia y  formar barrera protectora.'),

			'copoazu' => array ('ingredientes/copoazu.jpg', 'Cupuasú ' ,'La manteca de Cupuaçu es un excelente emoliente con una alta capacidad de retención de agua. Esta mantequilla de base vegetal es mucho más eficaz que los emolientes de origen animal        como la lanolina. De hecho, tiene la capacidad de retener 100 veces más humedad que la lanolina para una hidratación de mayor duración.

   				Los fitoesteroles que se encuentran en Cupuaçu también actúan para ayudar a regular y equilibrar los lípidos en la piel. Todas estas propiedades hacen que la mantequilla de cupuaçu sea un      hidratante superior que se compara con el factor de hidratación normal de la piel suave y se encarga de mantener el equilibrio hidrolipídico.'),

			'durazno' => array ('ingredientes/durazno.jpg', 'Durazno' ,'La nuez molida es un exfoliante o abrasivo de origen natural, adecuado para productos de cuidado personal encaminados a eliminar las células superficiales de la piel y eliminar asperezas.'),

			'girasol' => array ('ingredientes/girasol.jpg', 'Aceite de Girasol' ,'El aceite no volátil obtenido por expresión de las  semillas de girasol es un excelente emoliente. Rico en vitamina E nutre y ayuda a la piel a retener la humedad.'),

			'guayaba' => array ('ingredientes/guayaba.jpg', 'Guayaba' ,'Provienen de America tropical, su contenido de vitaminac C, vitamina B y polifenoles lo hace excelente para productos antiedad.'),

			'jojoba' => array ('ingredientes/jojoba.jpg', 'Jojoba' ,'Derivado del aceite de jojoba, conservando las características de humectación, suavidad en la piel, reduce líneas suaves del rostro.'),

			'karite' => array ('ingredientes/karite.jpg', 'Karité' ,'La manteca de karité es un humectante natural intenso, muy apreciado por sus propiedades emolientes, cicatrizantes y protectoras de la piel y el cabello.

  				Su origen es de äfrica dónde tradicionalmente se ha utilizado para el tratamiento del cabello rizado y maltratado por el sol, además para ayudar a la curación de heridas y quemaduras           menores.

  				La manteca de karité tiene excelentes propiedades de penetración en la piel y contiene alantoína, sustancia cicatrizante que reduce el tiempo de curación de los tejidos dañados.

  				La mantequilla de Karité tiene un alto Factor Natural  de Humectación, porque es rica en ácidos grasos y ácidos grasos esenciales y vitamina E que ayudan a restaurar el contenido de         lípidos de la piel y la protegen del daño de los radicales libres.'),

			'laurel' => array ('ingredientes/laurel.jpg', 'Laurel' ,'Se obtiene de cultivos en el sur de Colombia y se refina en Europa. Las bayas del fruto producen esta cera natural que tiene en su composición ácidos grasos y ácidos grasos esenciales. Estos ácidos grasos proporcionan una protección natural y fortalecen la función de barrera de la piel con lo cual se evita la salida de agua de adentro hacia fuera y por esto se permite un efecto hidratante físico.'),

			'macadamia' => array ('ingredientes/macadamia.jpg', 'Macadamia' ,'  El aceite de macadamia es muy similar al propio aceite natural de la piel (sebo). Esto permite biocompatibilidad de aceite de nuez de macadamia se absorbe con eficacia, lo que permite la piel      recibir rápidamente sus efectos de suavizado y acondicionamiento.

    			El aceite también tiene un alto nivel de ácido palmitoleico, un antioxidante natural que ayuda a la piel a combatir los radicales libres que pueden causar daño oxidativo a las células.'),

			'mango' => array ('ingredientes/mango.jpg', 'Mango' ,'La mantequilla de mango se obtiene de la almendra de la semilla de fruta de mango y es una buena fuente de ácidos grasos esenciales (Oleico). Tiene propiedades hidratantes, nutritivas y de lubricación beneficioso para el cuidado de la piel y el cabello.'),

			'manzanilla' => array ('ingredientes/manzanilla.jpg', 'Extracto de Manzanilla' ,'Derivado de las flores de la manzanilla es conocido por sus propiedades suavizantes, cicatrizantes, calmantes, anti-inflamatorias, protectoras, anti-irritantes y antimicrobianas.'),

			'maracuya' => array ('ingredientes/maracuya.png', 'Maracuyá' ,'El aceite de las semillas de maracuyá contiene altos niveles de ácido linoléico y ácidos grasos Omega 6, es de fácil absorción por la piel y la mantiene suave y flexible.

				El aceite también ha demostrado tener propiedades hidratantes, antioxidantes, antiinflamatorias, antipruriginosas y astringentes.'),

			'name' => array ('ingredientes/name.jpg', 'Ñame' ,'El extracto de las raíces de Dioscorea villosa (ñame salvaje) contiene como activos saponinas (Dioscin principalmente), fitoesteroles y taninos. La Dioscin tiene propiedades anti-inflamatorias que pueden beneficiar a la piel sensible o condiciones inflamatorias como el eczema.

				Por las propiedades antimicrobianas y antibacterianas de las saponinas se utiliza en la protección de la piel y por su contenido en fitosteroles base para la síntesis de hormonas femeninas se utiliza como antiedad en pieles prematuramente envejecidas.'),

			'nogal' => array ('ingredientes/nogal.jpg', 'Nogal' ,'La cáscara de nuez molida es un exfoliante o abrasivo de origen natural, adecuado para productos de cuidado personal encaminados a eliminar las células superficiales de la piel y eliminar asperezas.'),

			'ricino' => array ('ingredientes/ricino.jpg', 'Ricino' ,'Un aceite extraido de la semilla de ricino o higuerilla por expresión en frío.

				El aceite de ricino se compone principalmente de ácidos grasos y de él se han elaborado muchos derivados útiles en cosmética como lo son los ricinoleatos.

  				Este aceite altamente emoliente confiere brillo y suavidad a los labios y retiene la humedad.'),

			'romero' => array ('ingredientes/romero.jpg', 'Romero' ,'El romero de la familia de menta rico en aceite esencial con propiedades antioxidantes y antimicrobianas que lo hacen apto para conservar cárnicos, alimentos y cosméticos.

  				Util para el tratamiento cosmético de la celulitis (piel de naranja) por sus propiedades antiinflamatorias y desintoxicantes.

  				El romero se usa tradicionalmente en forma tópica para cicatrizar heridas, fortalecer el cabello, evitar la calvicie, para calmar dolores musculares, mialgias y para repeler insectos.'),

			'seje' => array ('ingredientes/seje.png', 'Seje' ,'Es una planta sagrada de los indígenas del Amazonas ya que se utiliza como alimento y bebida. El aceite de seje (Oenocarpus Bataua) Se obtiene por expresión del fruto. Su contenido de omega 3 y 6 presenta características antiedad que se comprobaron en un test en vivo con 25 mujeres donde se obtuvo una mejora después de 2 semanas de aplicación de un 27% en profundidad. Además tiene estudios de efecto hidrante prolongado.'),

			'te' => array ('ingredientes/te.jpg', 'Té Verde' ,'El té verde contiene vitaminas, flavonoides, metilxantinas, taninos y polifenoles que son antioxidantes fuertes y agentes anti-inflamatorios. El componente activo principal del extracto de té             verde,  la epigalocatequina – 3 - galato (EGCG), que representa el 40 % del contenido total de polifenoles del té verde, es un antioxidante.

  				Además de estos antioxidantes que ayudan a reparar el daño oxidativo de las células, el té verde también contiene taninos con propiedades antibacterianas y metilxantinas que trabajan para       mejorar el tono y la textura de la piel.'),

			'trebolrojo' => array ('ingredientes/trebolrojo.jpg', 'Trebol Rojo' ,'Este extracto tiene poder antioxidante  y propiedades anti-inflamatorias, contiene altas concentraciones de isoflavonas. Se usa tradicionalmente para contrarrestar los síntomas de la    menopausia (los calores, mastalgia) y los dolores del síndrome premestrual. Las isoflavonas contenidas en el trébol rojo se transforman en el cuerpo en fitoestrógenos similares en  comportamiento a los estrógenos.

 				Aplicado sobre la piel ayuda en el manejo del cancer de piel, llagas en la piel, quemaduras, eczema y psoriasis por cuanto reduce la inflamación.

				 El extracto ayuda a mejorar el tono de la piel, le da claridad y la acondiciona.

				El extracto de trébol rojo también se ha usado para reducir los signos de envejecimiento de la piel porque aumenta la producción de colágeno.'),

			'trigo' => array ('ingredientes/trigo.jpg', 'Trigo' ,' El aceite de germen de trigo tiene altas concentraciones de vitamina E natural, minerales, vitaminas, proteinas y ácidos grasos esenciales. El aceite de germen de trigo protege la piel de las    irritaciones, y promueve la formación de piel más joven debido a las fitoestimulinas que contiene. El poder antioxidante de la vitamina E combate los radicales libres y sirve como un agente anti-  envejecimiento.

 				Su principal uso es para combatir la resequedad en la piel, protección de las quemaduras solares y manejo de piel prematuramente envejecida. Cuando se aplica en la piel aumenta la  circulación y ayuda a reparar las células epidérmicas que se han deteriorado por la exposición al sol.'),

			'uva' => array ('ingredientes/uva.jpg', 'Uva' ,'Este aceite emoliente tiene un alto contenido de ácidos grasos (ácido linoléico) y antioxidantes. La aplicación tópica de extractode semillas de uva (que contiene proantocianidina) GSPE ) se ha  demostrado que es beneficioso para la cicatrización de heridas y desinfección de las mismas.

 				Este aceite ligero además de ser un suavizante único actúa como factor hidratante natural necesario para mantener un adecuado balance hidrolípidico.'),

			'zanahoria' => array ('ingredientes/zanahoria.jpg', 'Zanahoria' ,'

				La planta de zanahoria, también conocido como cordón de la reina Anna, produce un aceite emoliente que sirve como factor hidratante natural de la piel. Este extracto de color dorado contiene poderosos antioxidantes (carotenoides, vitaminas A y E) que acondicionan la piel y protegen las células del daño de los radicales libres.

				Estudios indican efectos fotoprotectores de los carotenoides por ser precursores de la síntesis de vitamina E.
			')


		);

		if (!empty($producto)) {

			switch ($producto['codigo']) {
				
				case 'P-001':
					
					$this->nombre_pdt = 'Crema de Limpieza Rostro';
					
					$this->promesa_pdt = '<b>LIMPIA PROFUNDAMENTE Y PURIFICA LA PIEL</b><br>Remueve fácilmente el maquillaje, impurezas y demás residuos de la piel, dejándola suave, firme y radiante todos los días. Se adapta a todo tipo de piel.';

					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_amazon-awakeing-facial-cleanser.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('chontaduro', 'cacao', 'calendula', 'trigo', 'girasol', 'maracuya');
					$this->uso = array();

					break;

				case 'P-002':
					
					$this->nombre_pdt = 'Exfoliante y Purificante de la Amazonía';
					$this->promesa_pdt = '<b>EXFOLIA, PURIFICA Y RENUEVA LA PIEL</b><br>Con aroma del tradicional café Colombiano y extractos de la selva Amazónica. Elimina las células muertas, remplazandolas por nuevas. Refresca y revitaliza todo tipo de piel.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Clear-Away-Amazon-Facial-Scrub.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('nogal','durazno','mango','cacao','maracuya','chontaduro', 'cafe','jojoba','seje', 'te', 'trigo');
					$this->uso = array();

					break;

				case 'P-003':
					
					$this->nombre_pdt = 'Tónico Facial Despertar de la Amazonía';
					$this->promesa_pdt = '<b>REFRESCA COMO LA NIEBLA DE UNA MAÑANA EN LA SELVA AMAZÓNICA </b><br>Hidrata, tonifica y suaviza delicadamente la piel. Se adapta a todo tipo de piel.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazon-Awakening-Toner.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('chontaduro', 'guayaba', 'aloe','balu');
					$this->uso = array();

					break;

				case 'P-004':
					
					$this->nombre_pdt = 'Hidratante Natural Rostro';
					$this->promesa_pdt = '<b>HIDRATA Y NUTRE PRODUNDAMENTE LA PIEL</b><br>Ofrece un adecuado balance de humedad. Contrarresta los efectos adversos de los radicales libres causantes del envejecimiento prematuro. Rica en vitaminas naturales A, C y E. Se adapta a todo tipo de piel.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazon-Awakening-Daily-Facial-Moisturizer.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('chontaduro','manzanilla','almendras','romero','calendula', 'girasol', 'copoazu');
					$this->uso = array();

					break;

				case 'P-005':
					
					$this->nombre_pdt = 'Crema Revitalizante Contorno de Ojos';
					$this->promesa_pdt = '<b>NUTRE, TONIFICA Y REVITALIZA EL CONTORNO DE LOS OJOS</b><br>Esta exótica crema rica en antioxidantes, mejora la apariencia de ojos cansados o fatigados. Ayuda a prevenir el envejecimiento y a minimizar líneas de expresión y arrugas.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazonian-Eye-Cream.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('copoazu', 'trigo','seje','acai','name','chontaduro');
					$this->uso = array();

					break;

				case 'P-006':
					
					$this->nombre_pdt = 'Ritual de la Juventud de la Amazonía';
					$this->promesa_pdt = '<b>NUTRE, TONIFICA Y REJUVENECE LA PIEL</b><br>Esta exótica crema revitaliza la piel, dejándola juvenil, tersa y radiante. Reduce la apariencia de las líneas de expresión y arrugas. Aporta firmeza y elasticidad a la piel.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazon-Night-Renewal-Cream.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('name','chontaduro','romero','calendula','aloe','manzanilla','trebolrojo','copoazu','almendras','trigo','girasol','macadamia','te','aguacate');
					$this->uso = array();

					break;

				case 'P-007':
					
					$this->nombre_pdt = 'Reparador de labios - Nuez';
					$this->promesa_pdt = '<b>HIDRATA Y PROTEGE LOS LABIOS</b><br>Ofrece una deliciosa sensación al aplicar las mantequillas, ceras y aceites de frutos amazónicos hidratantes. La acción de los carotenoides y Fito-esteroles permite lucir labios humectados, suaves, sanos y con agradable brillo natural';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazon-balm-for-lush-lips.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('trigo','macadamia','zanahoria','calendula','andiroba','te','ricino','girasol','maracuya','buriti','laurel','candelilla','abejas','karite','cacao','copoazu');
					$this->uso = array();

					break;

				case 'P-008':
					
					$this->nombre_pdt = 'Gel de Ducha Corporal';
					$this->promesa_pdt = '<b>LIMPIA, HIDRATA Y REVITALIZA LA PIEL</b><br>		Hidrata, refresca, suaviza y revitaliza la piel dejando una sensación de limpieza y relajación en la ducha diaria. Con deliciosos aromás exóticos de la selva Amazónica.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Amazon Awakening Body Wash.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('aloe','guayaba','mango','chontaduro','copoazu','trigo','acai');
					$this->uso = array();

					break;

				case 'P-009':
					
					$this->nombre_pdt = 'Exfoliante Corporal de la Amazonía';
					$this->promesa_pdt = '<b>EXFOLIA, NUTRE Y RENUEVA LA PIEL DEL CUERPO</b><br>Exfolia la piel, eliminando las células muertas, reemplazandolas por nuevas. Refresca, purifica y revitaliza la piel.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Clear-away-amazon-body-scrub.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('durazno','maracuya','chontaduro','mango','jojoba','trigo','te','buriti','karite','cacao');
					$this->uso = array();

					break;

				case 'P-010':
					
					$this->nombre_pdt = 'Loción Corporal Hidratante';
					$this->promesa_pdt = '<b>HIDRATA, NUTRE Y RESTABLECE EL BALANCE NATURAL DE LA PIEL</b><br>Por sus componentes naturales exóticos y antioxidantes brinda a la piel suavidad y vitalidad, dejando una sensación de frescura y relajación.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Antioxidant-Moisturizing-Body-lotion.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('trigo','buriti','andiroba','macadamia','maracuya','calendula','girasol','aloe','chontaduro','copoazu');

					$this->uso = array();

					break;

				case 'P-0011':
					
					$this->nombre_pdt = 'Crema Nutritiva para Manos';
					$this->promesa_pdt = '<b>HIDRATA & NUTRE LAS MANOS</b><br>Hidrata, humecta, nutre y revitaliza la piel de las manos, dejando una sensación de suavidad, frescura y relajación. Por su contenido de aceites exóticos y antioxidantes previene el envejecimiento.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Deep-Nourishing-hand-cream.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('maracuya', 'seje','trigo','andiroba','copoazu','chontaduro','aloe','te');
					$this->uso = array();

					break;

				case 'P-012':
					
					$this->nombre_pdt = 'Mantequilla Corporal de la Amazonía';
					$this->promesa_pdt = '<b>HIDRATA, NUTRE Y RESTABLECE EL BALANCE NATURAL DE LA PIEL</b><br>Exótica mantequilla con aromas que evocan la selva Amazónica. Nutre y revitaliza la piel. Acondiciona, suaviza e hidrata profundamente.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Amazon-body-butter.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('copoazu','trigo','jojoba','maracuya','chontaduro','aloe','te','buriti');
					$this->uso = array();

					break;

				case 'P-014':
					
					$this->nombre_pdt = 'Bálsamo Amazónico reparador de labios en barra';
					$this->promesa_pdt = '';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazon-balm-for-lush-lips-stick.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array();
					$this->uso = array();

					break;

				case 'P-013':
					
					$this->nombre_pdt = 'Elixir Nutritivo y Relajante / Aceite';
					$this->promesa_pdt = '<b>RELAJA, NUTRE Y RESTABLECE EL BALANCE NATURAL DE LA PIEL</b><br>Aporta nutrientes y antioxidantes que ayudan a mejorar la elasticidad y firmeza de la piel. Facilita todo tipo de masajes.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Pure-Amazon-Body-Oil.png';
					$this->img_flotante_2 = '';
					$this->ingredientes_pdt = array('trigo','calendula','te','chontaduro','uva','almendras','girasol','maracuya','buriti','romero','aguacate');
					$this->uso = array();

					break;
				
				default:
					# code...
					break;
			}

		}else{

			header('Location: '.URL_SITIO.URL_CLUB);

		}
	}

	public function inicioTienda($url = '') {

		$producto = $this->productos->detalleProductos(0,$url);

		$this->infoProducto($producto[0]);

		include 'views/tienda/inicio.php';

	}


}
?>