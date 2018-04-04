<?php 

/**
* 
*/
class ControllerTienda
{
	public $id_pdt = 0;
	public $nombre_pdt = '';
	public $precio_pdt = '';
	public $promesa_pdt = '';
	public $url_pdt = '';
	public $banner_parallax = '';
	public $img_flotante_1 = '';
	public $img_flotante_2 = '';
	public $ingredientes = array();
	public $uso = array();
	public $distribuidor = array();
	public $imagenes_pdts_png = array();
	public $pago_puntos_on = false;

	function __construct()
	{

		$this->usuarios = new Usuarios();
		$this->productos = new Productos();
		$this->carrito = new Carrito();
		$this->ordenes = new Ordenes();
		$this->ventas_virtuales = new VentasVirtuales();

		$this->imagenes_pdts_png = array (

			'P-001' => 'productos/linea-facial/linea-facial_amazon-awakeing-facial-cleanser.png',
			'P-002' => 'productos/linea-facial/linea-facial_Clear-Away-Amazon-Facial-Scrub.png',
			'P-003' => 'productos/linea-facial/linea-facial_Amazon-Awakening-Toner.png',
			'P-004' => 'productos/linea-facial/linea-facial_Amazon-Awakening-Daily-Facial-Moisturizer.png',
			'P-005' => 'productos/linea-facial/linea-facial_Amazonian-Eye-Cream.png',
			'P-006' => 'productos/linea-facial/linea-facial_Amazon-Night-Renewal-Cream.png',
			'P-007' => 'productos/linea-facial/linea-facial_Amazon-balm-for-lush-lips.png',
			'P-008' => 'productos/linea-corporal/linea-coporal_Amazon Awakening Body Wash.png',
			'P-009' => 'productos/linea-corporal/linea-coporal_Clear-away-amazon-body-scrub.png',
			'P-010' => 'productos/linea-corporal/linea-coporal_Antioxidant-Moisturizing-Body-lotion.png',
			'P-0011' => 'productos/linea-corporal/linea-coporal_Deep-Nourishing-hand-cream.png',
			'P-012' => 'productos/linea-corporal/linea-coporal_Amazon-body-butter.png',
			'P-013' => 'productos/linea-corporal/linea-coporal_Pure-Amazon-Body-Oil.png',
			'P-014' => 'productos/linea-facial/linea-facial_Amazon-balm-for-lush-lips-stick.png'
		);

		Carrito::$pago_puntos_on = $this->pago_puntos_on;

		//Loguear usuario

		if (isset($_POST['ingresarUsuario'])) {

			extract($_POST);

			$response = $this->loguearUsuario($email, md5($password), array(), $return_login);

			if (!$response) {
			
			echo "<script> alert('Los datos de acceso son incorrectos. Por favor intenta de nuevo'); </script>";
			
			}else{

				if ($_SESSION['tipo'] == 'CONSUMIDOR') {
					
					header('Location: '.URL_SITIO.URL_TIENDA.'/'.URL_TIENDA_CARRITO);
				
				}else{

					header('Location: '.URL_SITIO.URL_CLUB);

				}
			}
			
			
		}


		//Registrar usuario 

		if (isset($_POST['registrarUsuario'])) {

			extract($_POST);

			$response = $this->registrarConsumidor($num_identificacion, $nombre, $apellido, $email, $ciudad, $telefono, $contrasena);

			if ($response['tipo'] == 'idusuario' && isset($_SESSION['idusuario'])) {
				


			}
		}

		//Validar si proviene de un enlace de distribuidor
		if (isset($_GET['d']) && !empty($_GET['d'])) {
			
			$_SESSION['iddistribuidor'] = $_GET['d'];
		}

		if (isset($_SESSION['iddistribuidor']) && !empty($_SESSION['iddistribuidor'])) {
			
			$this->distribuidor = $this->usuarios->detalleUsuario($_SESSION['iddistribuidor']);
		}
	

	}

	public function img_pdt_png($codigo = ''){

		return $this->imagenes_pdts_png[$codigo];
	}

	private function registrarConsumidor($num_identificacion, $nombre, $apellido, $email, $ciudad, $telefono, $contrasena){

		if (count($this->usuarios->validarUsuario($num_identificacion, $email))>0) {

				$alerta = "Usted ya posee una cuenta";

				return array('tipo'		=>	'alerta', 
							'response'	=>	$alerta
							);

		}else{

			$sexo = '';
			$fecha_nacimiento = '';
			$boletines = 0;
			$condiciones = 0;
			$direccion = 0;
			$mapa = 0;
			$telefono_m = '';
			$tipo = 'CONSUMIDOR';
			$segmento = '';
			$foto = '';
			$estado = 1;
			$fecha_registro = fecha_actual('datetime');
			$referente = 0;
			$lider = 0;
			$cod_lider = 0;
			$nivel = 0;
			$organizacion = 0;

			$idusuario = $this->usuarios->crearUsuario($nombre, $apellido, $sexo, $fecha_nacimiento, $email, md5($password), $num_identificacion, $boletines, $condiciones, $direccion, $mapa, $telefono, $telefono_m, $tipo, $segmento, $foto, $estado, $fecha_registro, $referente, $lider, $cod_lider, $nivel, $ciudad, $organizacion);

			if ($idusuario) {

				$this->usuarios->actualizarSesion($idusuario, $nombre, $apellido, $email, $telefono, '', '', $ciudad, '', $tipo, 0, 0);	
			}

			return array(	
						'tipo'		=>	'idusuario', 
						'response'	=>	$idusuario
					);
		}
	}

	private function infoProducto($producto){

		$this->ingredientes = array(

			'chontaduro' => array ('ingredientes/chontaduro.jpg', 'Aceite de Chontaduro' ,'Rico en carotenos, ácidos grasos esenciales omega 3 y 6, vitaminas A, C y D. Los carotenoides, por su función antioxidante, contrarrestan los efectos dañinos de los radicales libres. Nutre y rejuvenece la piel.'),

			'cafe' => array ('ingredientes/cafe.jpg', 'Aceite de Café Arábigo' ,'Rico en antioxidante, actúa como exfoliante natural, estimula la renovación de las células. Mejorar la circulación sanguínea, equilibrante de la piel grasa y acneica. Calma las irritaciones y el enrojecimiento.'),

			'abejas' => array ('ingredientes/abejas.jpg', 'Cera de Abejas' ,'La cera proporciona una barrera natural contra el frío, el viento y la pérdida de humedad. También sirve como un emulsionante para ayudar a mantener la consistencia del producto.'),

			'acai' => array ('ingredientes/acai.jpg', 'Aceite de açaí' ,'Rico en ácidos grasos esenciales omega 6 y Omega 9, vitamina C, E y B3, minerales, aminoácidos esenciales y fitosteroles con propiedades anti-inflamatorias. Previene el envejecimiento y repara los daños de la piel.'),

			'aguacate' => array ('ingredientes/aguacate.jpg', 'Aceite de Aguacate' ,'Rico en antioxidantes, minerales y vitaminas A, D y E. Es similar al NMF (Factor Hidratante Natural de la piel), penetra profundamente, nutre, repara y suaviza. Mejora la circulación sanguínea.'),

			'almendras' => array ('ingredientes/almendras.jpg', 'Aceite de Almendras Dulces' ,'Rico en antioxidantes, vitamina E y nutrientes esenciales. Mantiene la humedad de la piel. Es antiinflamatorio, hidratante, emoliente y protector. Reduce las arrugas y mejora la elasticidad.'),

			'aloe' => array ('ingredientes/aloe.jpg', 'Extracto de Aloe Vera' ,'Limpia profundamente la piel, lo que favorece la desobstrucción de los poros y la eliminación de toxinas e impurezas. Es hidratante, astringente, calmante y regenerador de la piel.'),

			'andiroba' => array ('ingredientes/andiroba.jpg', 'Aceite de Andiroba' ,'Es el aceite vegetal más extraordinario y completo que se conoce porque no se oxida. Ideal para todo tipo de piel por su propiedad protectora, reparadora y antiinflamatoria. Hidrata y suaviza.'),

			'babassu' => array ('ingredientes/babassu.jpg', 'Aceite de Babassú' ,'Rico en vitamina E. Tiene propiedades hidratantes y antisépticas. Elimina el exceso de grasa e impurezas. No obstruye los poros. Protege y revitaliza la piel. Ideal para todo tipo de piel, especialmente pieles grasas y acneicas.'),

			'balu' => array ('ingredientes/balu.jpg', 'Extracto de Balú' ,'Rico en antioxidantes, proteína y aminoácidos esenciales. Estimula ligeramente el crecimiento de los fibroblastos, células productoras de proteínas como el colágeno y la elastina. Forma una película humectante en la piel.'),

			'buriti' => array ('ingredientes/buriti.jpg', 'Aceite de Buriti' ,'Rico en antioxidantes, carotenoides, vitamina E, ácidos grasos esenciales, vitamina A y C. Es antiinflamatorio, emoliente y suavizante. Rejuvenece, nutre, repara y protege la piel.'),

			'cacao' => array ('ingredientes/cacao.jpg', 'Mantequilla de Cacao' ,'Es rica en ácidos grasos esenciales, vitamina E y antioxidantes. Tiene una alta capacidad de hidratar la piel del cuerpo y los labios. Repara y protege del sol y del medio ambiente. Ideal para pieles muy secas y agrietadas.'),

			'calendula' => array ('ingredientes/calendula.jpg', 'Aceite de Caléndula' ,'Posee propiedades antiinflamatorias, antisépticas y calmantes. Estimula la regeneración de las células. Penetra profundamente en la piel, suaviza, nutre y mejora la elasticidad de la piel.'),

			'candelilla' => array ('ingredientes/candelilla.jpg', 'Ceras de Candelilla' ,'La cera de candelilla es una cera vegetal relativamente dura, obtenida de la capa protectora de arbustos de Candelilla. Forma una barrera protectora, es emoliente y da consistencia al producto.'),

			'copoazu' => array ('ingredientes/copoazu.jpg', 'Mantequilla de Cupuazú ' ,'Rica en antioxidantes, vitamina A, B y C aminoácidos y ácidos grasos. Hidrata profundamente, nutre y suaviza. Mantiene la humedad de la piel. Repara los daños de la piel producidos por las radiaciones UV.'),

			'durazno' => array ('ingredientes/durazno.jpg', 'Exfoliante polvo de nuez de Durazno' ,'La semilla o nuez del durazno molida es un exfoliante de origen natural. Limpia profundamente, elimina la grasa, impurezas y células muertas. Aporta suavidad y luminosidad a la piel.'),

			'girasol' => array ('ingredientes/girasol.jpg', 'Aceite de Girasol' ,'Rico en ácidos grasos esenciales omega 3 y 6. Tiene propiedades nutritivas, antiinflamatorias, emolientes y protectora. Hidrata y ayuda a retener la humedad de la piel.'),

			'guayaba' => array ('ingredientes/guayaba.jpg', 'Extracto de guayaba' ,'Extracto hidrosoluble, antioxidante, antienvejecimiento y tonificante. Hidrata, mejora la textura de la piel. Contiene licopeno es un antioxidante que protege la piel. Rico en vitamina C.'),

			'jojoba' => array ('ingredientes/jojoba.jpg', 'Aceite de Jojoba' ,'Es el aceite vegetal más extraordinario y completo que se conoce porque no se oxida. Ideal para todo tipo de piel por su propiedad protectora, reparadora y antiinflamatoria. Hidrata y suaviza.'),

			'karite' => array ('ingredientes/karite.jpg', 'Mantequilla de Karité' ,'Es un regenerador celular, puede ser aplicado en cualquier parte del cuerpo. Hidrata profundamente, protege la piel de las agresiones del medio ambiente y ayuda a prevenir el envejecimiento.'),

			'laurel' => array ('ingredientes/laurel.jpg', 'Cera de Laurel' ,'Contiene ácidos grasos que proporcionan una protección natural y fortalecen la función de barrera de la piel, evita la pérdida de agua de adentro hacia fuera. Esta altamente hidratante.'),

			
			'mango' => array ('ingredientes/mango.jpg', 'Mantequilla de Mango' ,'Rica en antioxidantes. Posee propiedades hidratantes y emolientes. suaviza, favorece la cicatrización de las heridas y la regeneración de la piel. Protege la piel de los rayos ultravioletas. Exfoliante y purificante de rostro.'),

			'manzanilla' => array ('ingredientes/manzanilla.jpg', 'Extracto de Manzanilla' ,'Es un equilibrante de la piel y calmante de las terminaciones nerviosas que se encuentran en ella. Antiinflamatorio, descongestionante y antimicrobiano. Hidrata y purifica la piel.'),

			'maracuya' => array ('ingredientes/maracuya.png', 'Aceite de semillas de Maracuyá' ,'Es rico en antioxidantes, ácido linoléico y ácidos grasos Omega 3, 6 y 9. Tiene propiedades antiinflamatoria y astringente. Reduce la producción de sebo. Nutre, protege y repara la piel.'),

			'name' => array ('ingredientes/name.jpg', 'Extracto de Ñame' ,'Rico en beta-caroteno, vitamina A y C, vitamina B6, y antioxidantes. Ayuda retardar el envejecimiento, reduce las arrugas. Estimula la producción de colágeno. Posee propiedades antiinflamatorias.'),

			'nogal' => array ('ingredientes/nogal.jpg', 'Exfoliante Polvo de nuez de nogal' ,'La semilla de nuez molida es un exfoliante de origen natural. Hidrata, limpia profundamente, elimina puntos negros, impurezas y células muertas. Promueve la regeneración celular.'),

			'ricino' => array ('ingredientes/ricino.jpg', 'Aceite de Ricino' ,'Rico en ácidos grasos, penetra profundamente en la piel, es altamente hidratante y emoliente confiere brillo y suavidad a los labios. Es antimicrobiano ayuda a mejorar las irritaciones de la piel.'),

			'romero' => array ('ingredientes/romero.jpg', 'Extracto de Romero' ,'Posee propiedades fotoprotectoras, antiinflamatorias, antisépticas y calmantes. Hidrata, repara, ayuda cicatrizar y estimular la circulación sanguínea. Previene el envejecimiento prematuro de la piel.'),

			'seje' => array ('ingredientes/seje.png', 'Aceite de Seje' ,'Rico en ácidos grasos esenciales omega 9. Protege, tonifica y restaura los niveles naturales de humedad de la piel. Previene el envejecimiento y suaviza la piel.'),

			'trebolrojo' => array ('ingredientes/trebolrojo.jpg', 'Extracto de Trébol Rojo' ,'Rico en isoflavonoides que hidratan y mejoran la elasticidad de la piel. Reduce los signos de envejecimiento, aumenta la producción de colágeno y elastina. Ayuda mantener el grosor de la piel.'),

			'trigo' => array ('ingredientes/trigo.jpg', 'Aceite de Germen de Trigo' ,'Rico en vitamina E, antioxidantes, minerales, proteínas y ácidos grasos esenciales omega 3 y 6. Nutre, rejuvenece, repara y protege la piel. Mejora la elasticidad de la piel.'),

			'uva' => array ('ingredientes/uva.jpg', 'Aceite de Semillas de Uva' ,'Rico en antioxidantes como el resveratrol, este aceite emoliente tiene un alto contenido de ácidos grasos (ácido linoléico). Hidrata, mejora la circulación sanguínea y elasticidad de la piel.'),

			'sesamo' => array ('ingredientes/sesamo.jpg', 'Aceite de sésamo' ,'Contiene vitaminas E, y ácidos grasos omega 3 y 6. Hidrata, nutre y repara la piel, evitando el envejecimiento prematuro. Ideal para pieles sensibles. Ayuda a retener la humedad de la piel.'),

			'carnauba' => array ('ingredientes/carnauba.jpg', 'Proporciona una barrera protectora que impide la deshidratación por el sudor. Aporta un brillo natural a los labios, y da consistencia al producto.'),

			'nuezbrasil' => array ('ingredientes/nuezdebrasil.jpg', 'Rico en aminoácidos, minerales, vitaminas A, C, E y B. Es altamente Hidratante, Nutre, suaviza, rejuvenece y repara la piel. Ideal para pieles con psoriasis y eczemas.'),

			'granadilla' => array ('ingredientes/granadilla.jpg', 'Rico en vitaminas C, polifenoles, potasio y otros minerales y nutrientes, ayuda en la regeneración celular. Protege y repara la capa exterior de la piel. Ayuda a cicatrizar heridas.'),
			'achiote' => array ('ingredientes/achiote.jpg', 'Es un colorante natural. Rico en carotenos con propiedades antioxidantes. Tiene propiedades antiinflamatorias, ayuda a cicatrizar. Suaviza y protege la piel de los rayos solares.'),

			'extractochontaduro' => array ('ingredientes/extractochontaduro.jpg', 'Fruto rico en carotenos precursores de la vitamina A, nutrientes, ácidos grasos esenciales omega 3 y 6, vitaminas C y D. Los carotenoides, por su función antioxidante, contrarrestan los efectos dañinos de los radicales libre y ayudan a mantener la piel joven.'),

			'teverde' => array ('ingredientes/teverde.jpg', 'Rico en vitamina C, E y Carotenos. Posee propiedades fotoprotectoras, antiinflamatorias y descongestiva. Mejora la elasticidad de la piel, ayuda a mejorar el tono de la piel y a unificarlo, Repara los daños de la piel producidos por las radiaciones UV.'),

			'zanahoria' => array ('ingredientes/zanahoria.jpg', 'Aceite de Zanahoria' ,'Contiene antioxidantes (carotenoides, vitaminas A y E) que acondicionan la piel y protegen las células del daño de los radicales libres. Nutre, repara y mejora la elasticidad a la piel.')
		);

		if (!empty($producto)) {

			$this->id_pdt = $producto['idproducto'];
			$this->url_pdt = $producto['url'];
			$this->precio_pdt = $producto['precio'];

			switch ($producto['codigo']) {
				
				case 'P-001':
					
					$this->nombre_pdt = 'Crema de Limpieza Rostro';
					
					$this->promesa_pdt = '<b>Limpia profundamente y purifica la piel.</b><br>Remueve fácilmente el maquillaje, impurezas y demás residuos de la piel, dejándola suave, firme y radiante todos los días. Se adapta a todo tipo de piel.';		

					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_amazon-awakeing-facial-cleanser.png';
					$this->img_flotante_2 = 'modelo/linea-facial_amazon-awakeing-facial-cleanser.png';
					$this->ingredientes_pdt = array('chontaduro', 'cacao', 'calendula', 'trigo', 'girasol', 'maracuya');
					$this->uso = array(
						'Aplicar sobre el rostro y cuello',
						'Realizar movimientos suaves circulares hasta retirar todas las impurezas.',
						'Enjuagar bien con agua o pomos húmedos.',
						'Seque con una toalla limpia y seca.',
						'Usar todos los días mañana y noche. Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-002':
					
					$this->nombre_pdt = 'Exfoliante y Purificante de la Amazonía';
					$this->promesa_pdt = '<b>Exfolia, purifica y renueva la piel</b><br>Con aroma del tradicional café Colombiano y extractos de la selva Amazónica. Elimina las células muertas, remplazandolas por nuevas. Refresca y revitaliza todo tipo de piel.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Clear-Away-Amazon-Facial-Scrub.png';
					$this->img_flotante_2 = 'modelo/linea-facial_Amazon-Awakening-Toner.png';
					$this->ingredientes_pdt = array('nogal','durazno','mango','cacao','maracuya','chontaduro', 'cafe','jojoba','seje', 'te', 'trigo');
					$this->uso = array(
						'Aplicar sobre el rostro y cuello',
						'Realizar movimientos suaves circulares hasta retirar todas las impurezas.',
						'Enjuagar bien con agua o pomos húmedos.',
						'Seque con una toalla limpia y seca.',
						'Aplicar 1 o 2 veces a la semana. Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-003':
					
					$this->nombre_pdt = 'Tónico Facial Despertar de la Amazonía';
					$this->promesa_pdt = '<b>Refresca como la niebla de una mañana en la selva amazónica</b><br>Hidrata, tonifica y suaviza delicadamente la piel. Se adapta a todo tipo de piel.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazon-Awakening-Toner.png';
					$this->img_flotante_2 = 'modelo/linea-facial_Amazon-Awakening-Toner.png';
					$this->ingredientes_pdt = array('chontaduro', 'guayaba', 'aloe','balu');
					$this->uso = array(
						'Aplicar sobre el rostro y cuello después de la limpieza y/o exfoliación.',
						'Usar en cualquier momento para hidratar la piel.',
						'Conservar en lugar fresco y seco.'

					);

					break;

				case 'P-004':
					
					$this->nombre_pdt = 'Hidratante Natural Rostro';
					$this->promesa_pdt = '<b>Hidrata y nutre profundamente la piel</b><br>Ofrece un adecuado balance de humedad. Contrarresta los efectos adversos de los radicales libres causantes del envejecimiento prematuro. Rica en vitaminas naturales A, C y E. Se adapta a todo tipo de piel.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazon-Awakening-Daily-Facial-Moisturizer.png';
					$this->img_flotante_2 = 'modelo/linea-facial_Amazon-Awakening-Daily-Facial-Moisturizer.png';
					$this->ingredientes_pdt = array('chontaduro','manzanilla','almendras','romero','calendula', 'girasol', 'copoazu');
					$this->uso = array(
						'Aplicar una ligera capa en la mañana sobre el rostro y el cuello.',
						'Realizar movimientos suaves circulares ascendentes.',
						'Dejar durante el día.',
						'Usar después de la crema de limpieza rostro y tónico. Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-005':
					
					$this->nombre_pdt = 'Crema Revitalizante Contorno de Ojos';
					$this->promesa_pdt = '<b>Nutre, tonifica y revitaliza el contorno de los ojos</b><br>Esta exótica crema rica en antioxidantes, mejora la apariencia de ojos cansados o fatigados. Ayuda a prevenir el envejecimiento y a minimizar líneas de expresión y arrugas.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazonian-Eye-Cream.png';
					$this->img_flotante_2 = 'modelo/linea-facial_Amazonian-Eye-Cream.png';
					$this->ingredientes_pdt = array('copoazu', 'trigo','seje','acai','name','chontaduro');
					$this->uso = array(
						'Aplicar con ligeros y suaves toques en el contorno de los ojos.',
						'Usar día y noche.',
						'Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-006':
					
					$this->nombre_pdt = 'Ritual de la Juventud de la Amazonía';
					$this->promesa_pdt = '<b>Nutre, tonifica y rejuvenece la piel</b><br>Esta exótica crema revitaliza la piel, dejándola juvenil, tersa y radiante. Reduce la apariencia de las líneas de expresión y arrugas. Aporta firmeza y elasticidad a la piel.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazon-Night-Renewal-Cream.png';
					$this->img_flotante_2 = 'modelo/linea-facial_Amazon-Awakening-Toner.png';
					$this->ingredientes_pdt = array('name','chontaduro','romero','calendula','aloe','manzanilla','trebolrojo','copoazu','almendras','trigo','girasol','macadamia','te','aguacate');
					$this->uso = array(
						'Aplicar en la noche una ligera capa sobre el rostro y cuello.',
						'Masajear suevemente con movimientos ascendentes',
						'Dejar durante toda la noche.',
						'Retirar al dia siguiente con crema de Limpieza rostro.',
						'Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-007':
					
					$this->nombre_pdt = 'Reparador de labios - Nuez';
					$this->promesa_pdt = '<b>Hidrata y protege los labios</b><br>Ofrece una deliciosa sensación al aplicar las mantequillas, ceras y aceites de frutos amazónicos hidratantes. La acción de los carotenoides y Fito-esteroles permite lucir labios humectados, suaves, sanos y con agradable brillo natural';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazon-balm-for-lush-lips.png';
					$this->img_flotante_2 = 'modelo/linea-facial_Amazon-balm-for-lush-lips.png';
					$this->ingredientes_pdt = array('trigo','macadamia','zanahoria','calendula','andiroba','te','ricino','girasol','maracuya','buriti','laurel','candelilla','abejas','karite','cacao','copoazu');
					$this->uso = array(
						'Aplicar sobre los labios, una o varias veces al día y masajear suavemente.',
						'Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-008':
					
					$this->nombre_pdt = 'Gel de Ducha Corporal';
					$this->promesa_pdt = '<b>Limpia, hidrata y revitaliza la piel</b><br>Hidrata, refresca, suaviza y revitaliza la piel dejando una sensación de limpieza y relajación en la ducha diaria. Con deliciosos aromás exóticos de la selva Amazónica.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Amazon Awakening Body Wash.png';
					$this->img_flotante_2 = 'modelo/linea-coporal_Amazon Awakening Body Wash.png';
					$this->ingredientes_pdt = array('aloe','guayaba','mango','chontaduro','copoazu','trigo','acai');
					$this->uso = array(
						'Frotar suavemente sobre el cuerpo húmedo, aplicar con las manos o toallita en forma circular hasta obtener abundante espuma y enjuague.',
						'Aplicar el gel de ducha corporal todos los días como ritual de limpieza y relajación.',
						'Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-009':
					
					$this->nombre_pdt = 'Exfoliante Corporal de la Amazonía';
					$this->promesa_pdt = '<b>Exfolia, nutre y renueva la piel del cuerpo</b><br>Exfolia la piel, eliminando las células muertas, reemplazandolas por nuevas. Refresca, purifica y revitaliza la piel.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Clear-away-amazon-body-scrub.png';
					$this->img_flotante_2 = 'modelo/linea-coporal_Clear-away-amazon-body-scrub.png';
					$this->ingredientes_pdt = array('durazno','maracuya','chontaduro','mango','jojoba','trigo','te','buriti','karite','cacao');
					$this->uso = array(
						'Aplicar en la mano o toallita y extender por todo el cuerpo con movimientos circulares.',
						'Concentrándose en las partes más queratinizadas (rodillas, codos y pies) y enjuagar.',
						'Se recomienda exfoliar para abrir los poros y reparar la piel para cualquier tratamiento de nutrición o hidratación. 1 o 2 veces al mes.',
						'Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-010':
					
					$this->nombre_pdt = 'Loción Corporal Hidratante';
					$this->promesa_pdt = '<b>Hidrata, nutre y restalece el balance natural de la piel</b><br>Por sus componentes naturales exóticos y antioxidantes brinda a la piel suavidad y vitalidad, dejando una sensación de frescura y relajación.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Antioxidant-Moisturizing-Body-lotion.png';
					$this->img_flotante_2 = 'modelo/linea-coporal_Antioxidant-Moisturizing-Body-lotion.png';
					$this->ingredientes_pdt = array('trigo','buriti','andiroba','macadamia','maracuya','calendula','girasol','aloe','chontaduro','copoazu');

					$this->uso = array(
						'Aplicar abundantemente en la mañana o en la noche. Masajear la piel hasta que se absorba completamente.',
						'Ideal para pieles con sequedad extrema.<br>Ideal para personas que reciben tratamientos que alteran la humedad de la piel.',
						'Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-0011':
					
					$this->nombre_pdt = 'Crema Nutritiva para Manos';
					$this->promesa_pdt = '<b>Hidrata y nutre las manos</b><br>Hidrata, humecta, nutre y revitaliza la piel de las manos, dejando una sensación de suavidad, frescura y relajación. Por su contenido de aceites exóticos y antioxidantes previene el envejecimiento.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Deep-Nourishing-hand-cream.png';
					$this->img_flotante_2 = 'modelo/linea-coporal_Deep-Nourishing-hand-cream.png';
					$this->ingredientes_pdt = array('maracuya', 'seje','trigo','andiroba','copoazu','chontaduro','aloe','te');
					$this->uso = array(
						'Aplicar día y noche generosamente en las manos y masajear suavemente.',
						'Aplicar una vez por semana exfoliante para una limpieza profunda y renovar las células muertas.',
						'Ideal para personas que manipulan agentes químico, o que realizan trabajos extremos.',
						'Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-012':
					
					$this->nombre_pdt = 'Mantequilla Corporal de la Amazonía';
					$this->promesa_pdt = '<b>Hidrata, nutre y restablece el balance natural de la piel</b><br>Exótica mantequilla con aromas que evocan la selva Amazónica. Nutre y revitaliza la piel. Acondiciona, suaviza e hidrata profundamente.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Amazon-body-butter.png';
					$this->img_flotante_2 = 'modelo/linea-coporal_Amazon-body-butter.png';
					$this->ingredientes_pdt = array('copoazu','trigo','jojoba','maracuya','chontaduro','aloe','te','buriti');
					$this->uso = array(
						'Aplicar sobre la piel limpia de todo el cuerpo.',
						'Ideal para zonas más queratinizadas en especial en los codos, las rodillas y los pies.',
						'Masajear hasta que se absorba completamente.',
						'Ideal para pieles con sequedad extrema.<br>Ideal para rituales de spa.',
						'Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-014':
					
					$this->nombre_pdt = 'Bálsamo Amazónico reparador de labios en barra';
					$this->img_flotante_1 = 'productos/linea-facial/linea-facial_Amazon-balm-for-lush-lips-stick.png';
					$this->promesa_pdt = '<b>Hidrata y protege los labios</b><br>Ofrece una deliciosa sensación al aplicar las mantequillas, ceras y aceites de frutos amazónicos hidratantes. La acción de los carotenoides y Fito-esteroles permite lucir labios humectados, suaves, sanos y con agradable brillo natural';
					$this->banner_parallax = '';
					$this->img_flotante_2 = 'modelo/linea-facial_Amazon-balm-for-lush-lips-stick.png';
					$this->ingredientes_pdt = array('trigo','macadamia','zanahoria','calendula','andiroba','te','ricino','girasol','maracuya','buriti','laurel','candelilla','abejas','karite','cacao','copoazu');
					$this->uso = array(
						'Aplicar sobre los labios, una o varias veces al día y masajear suavemente.',
						'Conservar en lugar fresco y seco.'
					);

					break;

				case 'P-013':
					
					$this->nombre_pdt = 'Elixir Nutritivo y Relajante / Aceite';
					$this->promesa_pdt = '<b>Relaja, nutre y restablece el balance natural de la piel</b><br>Aporta nutrientes y antioxidantes que ayudan a mejorar la elasticidad y firmeza de la piel. Facilita todo tipo de masajes.';
					$this->banner_parallax = '';
					$this->img_flotante_1 = 'productos/linea-corporal/linea-coporal_Pure-Amazon-Body-Oil.png';
					$this->img_flotante_2 = 'modelo/linea-coporal_Pure-Amazon-Body-Oil.png';
					$this->ingredientes_pdt = array('trigo','calendula','te','chontaduro','uva','almendras','girasol','maracuya','buriti','romero','aguacate');
					$this->uso = array(
						'Frotar sobre la piel limpia y preferiblemente húmeda, hasta que se absorba completamente.',
						'Usar de día o de noche.',
						'Dejar secar antes de colocar su ropa.',
						'Ideal para pieles con sequedad extrema.',
						'Recomendado para majases relajantes y terapéuticos. Ideal para rituales de spa.',
						'Conservar en lugar fresco y seco.'

					);

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


		$ciudades = $this->usuarios->listarCiudades();

		$producto = $this->productos->detalleProductos(0,$url);

		$productos = $this->productos->listarProductos(array('NORMAL'), array(1));

		$this->infoProducto($producto[0]);

		include 'views/tienda/inicio.php';

	}

	public function productosTienda(){

		if (isset($_SESSION['iddistribuidor']) && !empty($_SESSION['iddistribuidor'])) {
			
			$productos = $this->productos->listarProductos(array('NORMAL'), array(1));

			include 'views/tienda/productos_lista.php';	
		
		}else{

			header('Location: '.URL_SITIO.URL_CLUB);
		}

		
	}

	public function carritoTienda(){

		if (isset($_SESSION['iddistribuidor']) && !empty($_SESSION['iddistribuidor'])) {

			$categoria_crosselling = 0;

			if (count($_SESSION['idpdts'])>0) {
				
				$producto = $this->productos->detalleProductos($_SESSION['idpdts'][0]);
				$categoria_crosselling = $producto[0]['categorias_idcategoria'];
			}

			$productos = $this->productos->listarProductos(array('NORMAL'), array(1), $categoria_crosselling);

			if (isset($_POST["redimirCupon"])) {

				if (!empty($_POST["cupon_descuento"])) {

					$cupon = $_POST["cupon_descuento"];
					$cupon = $this->carrito->infoCupon($cupon);

					if (!empty($cupon)) {

						if ($cupon["monto_minimo"] <= $this->carrito->getSubtotalAntesIva()) {

							$_SESSION["idcupon"] = $cupon["idcodigo"];
							$_SESSION["valor_cupon"] = $cupon["val_descuento"];
							$_SESSION["aplicacion_cupon"] = $cupon["aplicacion"];
							$_SESSION["monto_minimo_cupon"] = $cupon["monto_minimo"];

						}else{

							unset($_SESSION["idcupon"]);
							unset($_SESSION["valor_cupon"]);
							unset($_SESSION["aplicacion_cupon"]);
							unset($_SESSION["monto_minimo_cupon"]);
							
							echo "<script>alert('La compra no cumple con el monto minimo para aplicar el cupon');</script>";
						}

					}else{
						//No se encuentra el cupón
					}
				}
			}

			$puntos_disponibles = 0;
		
			$tipo_usuario = 'CONSUMIDOR';

			$itemsCarrito = $this->carrito->listarItems();
			$subtotalAntesIva = $this->carrito->getSubtotalAntesIva();

			$subtotalAntesIvaPremios = $this->carrito->getSubtotalAntesIvaPremios();
			$descuentoCupon = $this->carrito->getDescuentoCupon($tipo_usuario);
			$subtotalNetoAntesIva = $this->carrito->getSubtotalNetoAntesIva($tipo_usuario);
			$descuentoEscala = $this->carrito->getDescuentoEscala($tipo_usuario);
			$porcDescuentoEscala = $this->carrito->porcDescuentoEscala($tipo_usuario);
			$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva($tipo_usuario);

			$retencion = $this->carrito->getRTF($tipo_usuario);

			$pagoPuntos = $this->carrito->getPagoPuntos();

			$iva = $this->carrito->getIva($tipo_usuario);
			$flete = $this->carrito->calcularFlete($tipo_usuario);
			$total = $this->carrito->getTotal($tipo_usuario);
			$rentabilidad = $this->carrito->getRentabilidad();

			

			include "views/tienda/carrito.php";

		}else{

			header('Location: '.URL_SITIO.URL_CLUB);
		}
	}

	public function resumenCompraTienda(){

		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"]) && $_SESSION["tipo"]== 'CONSUMIDOR') {

			$tipo_usuario = 'CONSUMIDOR';

			$itemsCarrito = $this->carrito->listarItems();
			$subtotalAntesIva = $this->carrito->getSubtotalAntesIva();
			$subtotalAntesIvaPremios = $this->carrito->getSubtotalAntesIvaPremios();
			$descuentoCupon = $this->carrito->getDescuentoCupon($tipo_usuario);
			$subtotalNetoAntesIva = $this->carrito->getSubtotalNetoAntesIva($tipo_usuario);
			$descuentoEscala = $this->carrito->getDescuentoEscala($tipo_usuario);
			$porcDescuentoEscala = $this->carrito->porcDescuentoEscala($tipo_usuario);
			$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva($tipo_usuario);
			$retencion = $this->carrito->getRTF($tipo_usuario);
			$pagoPuntos = $this->carrito->getPagoPuntos();
			$iva = $this->carrito->getIva($tipo_usuario);
			$flete = $this->carrito->calcularFlete($tipo_usuario);
			$total = $this->carrito->getTotal($tipo_usuario);
			$rentabilidad = $this->carrito->getRentabilidad();

			include "views/tienda/resumen_compra.php";

		}
	}

	public function generarOrdenTienda(){

		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"]) && count($_SESSION["idpdts"])>0 && count($_SESSION["cantidadpdts"])>0 && $_SESSION["tipo"]== 'CONSUMIDOR') {

			$tipo_usuario = 'CONSUMIDOR';

			$codigo_orden = $this->carrito->generarCodOrden();
			$fecha_pedido = fecha_actual("date");

			$subtotalAntesIva = $this->carrito->getSubtotalAntesIva();
			$subtotalAntesIvaPremios = $this->carrito->getSubtotalAntesIvaPremios();
			$descuentoCupon = $this->carrito->getDescuentoCupon($tipo_usuario);
			$descuentoEscala = $this->carrito->getDescuentoEscala($tipo_usuario);
			$porcDescuentoEscala = $this->carrito->porcDescuentoEscala($tipo_usuario);
			$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva($tipo_usuario);
			$retencion = $this->carrito->getRTF($tipo_usuario);
			$detalleOrden = $this->carrito->getDetalleOrden($tipo_usuario);
			
			$pagoPuntos = $this->carrito->getPagoPuntos();		
			
			$iva = $this->carrito->getIva($tipo_usuario);
			$flete = $this->carrito->calcularFlete($tipo_usuario);
			$total = $this->carrito->getTotal($tipo_usuario);
			
			$estado = "PENDIENTE";
			$fecha_facturacion = "0000-00-00";
			$num_factura = "";
			
			//Crear Orden
			$idorden = $this->carrito->generarOrden($codigo_orden, $fecha_pedido, $subtotalAntesIva, $subtotalAntesIvaPremios, $descuentoCupon, $porcDescuentoEscala, $descuentoEscala, $totalNetoAntesIva, $iva, $retencion, $pagoPuntos["puntos"], $pagoPuntos["valor_punto"], $flete, $total, $estado, $fecha_facturacion, $num_factura, $_SESSION["idusuario"]);

			if ($idorden) {

				//Registrar detalle de orden
				if (count($detalleOrden)>0) {

					foreach ($detalleOrden as $key => $producto) {

						//Descontar stock
						$filas = $this->productos->descontarStock($producto["idpdt"],$producto["cantidad"]);

						//Agregar detalle orden
						$id_detalle_orden = $this->carrito->agregarDetalleOrden($producto["nombre"], $producto["codigo"], $producto["cantidad"], $producto["precio"], $producto["precio_base"], $producto["descuento_cupon"], $producto["iva"], $producto["descuento_puntos"], $idorden);
					}
				}

				//Registrar si la compra fue hecha a través de un enlace de distribuidor
				if (isset($_SESSION['iddistribuidor']) && !empty($_SESSION['iddistribuidor']) && $_SESSION['iddistribuidor'] != $_SESSION['idusuario']) {
					
					$comision_pagada = 0;

					$this->ventas_virtuales->crear_venta($comision_pagada, $idorden, $_SESSION['iddistribuidor']);

					//Cargar Nuevos Puntos A Distribuidor
					$valor_punto = 1;
					$fecha_adquirido = fecha_actual('datetime');
					$redimido = 0;
					$estado_puntos = 0;

					$nuevos_puntos = $totalNetoAntesIva*($valor_punto/100);

					$idnuevospuntosdistribuidor = $this->usuarios->asignarNuevosPuntos($nuevos_puntos, "VENTA A COMPRADOR", $fecha_adquirido, $redimido, $estado_puntos, $_SESSION['iddistribuidor'], $idorden);
				}


				//Enviar Email Orden
				$this->ordenes->enviarEmailOrden($detalleOrden, $subtotalAntesIva, $descuentoCupon, $porcDescuentoEscala, $descuentoEscala, $totalNetoAntesIva, $retencion, $iva, $pagoPuntos["valor_pago"], $flete, $total, $codigo_orden, $estado, $_SESSION['nombre'], $_SESSION['apellido'], $_SESSION['email']);				

				/****PAGO CON PAYU****/

				//Variables Pago Payu

				$referenceCode = $codigo_orden;
				$description = "COMPRA PRODUCTOS PIUDALI";
				$buyerEmail = $_SESSION["email"];
				$amount = round($total);
				$tax = round($iva);
				if ($iva == 0) {
					$taxReturnBase = 0;
				}else{
					$taxReturnBase = round($totalNetoAntesIva-$pagoPuntos["valor_pago"]);
				}

				if (isset($_SESSION["idorganizacion"]) && !empty($_SESSION["idorganizacion"])) {

					$organizacion = $this->usuarios->detalleOrganizacionUsuario($_SESSION["idorganizacion"]);

					if (count($organizacion)>0) {
						$payerFullName = $organizacion["razon_social"];
					}else{
						$payerFullName = $_SESSION["nombre"]." ".$_SESSION["apellido"];	
					}
				}else{
					$payerFullName = $_SESSION["nombre"]." ".$_SESSION["apellido"];
				}

				$extra1 = $_SESSION["idusuario"];
				
				$signature=md5(ApiKey."~".merchantId."~".$referenceCode."~".$amount."~".currency);

				require "include/pago_payu.php";

				unset($_SESSION["idpdts"]);
				unset($_SESSION["cantidadpdts"]);	
			}
			
		}else{
			header("Location: ".URL_CLUB_INGRESAR);
		}
	}


	public function perfilTienda(){

		if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'CONSUMIDOR' && isset($_SESSION['iddistribuidor']) && !empty($_SESSION['iddistribuidor'])) {

			if (isset($_SESSION['idusuario']) && isset($_POST["actualizarPerfil"])) {

				extract($_POST);

				$tipo_usuario = 'CONSUMIDOR';
				
				$filas = $this->usuarios->actualizarUsuario($_SESSION['idusuario'], $nombre, $apellido, '', '', $email, $num_identificacion, 0, $direccion, 0, $telefono, $telefono_m, $tipo_usuario, '', '', 0, 0, $ciudad);

				if ($filas) {
					
					$info_ciudad = $this->usuarios->nombreCiudad($ciudad);

					$this->usuarios->actualizarSesion($_SESSION["idusuario"], $nombre, $apellido, $email, $telefono, $telefono_m, $direccion, $ciudad, $info_ciudad["ciudad"], $tipo_usuario, 0, 0);
				}

				if (isset($_GET['return']) && !empty($_GET['return'])) {
							
					header("Location: ".$_GET['return']);

				}
			}

			if (isset($_SESSION['idusuario']) && isset($_POST["cambiarPassword"])) {
							
				$cambio_contrasena = $this->usuarios->cambiarContrasenaUsuario($_SESSION["idusuario"], md5($contrasena_actual), md5($nueva_contrasena));

				if ($cambio_contrasena===1) {
					
				}else{
					
				}

				if (isset($_GET['return']) && !empty($_GET['return'])) {
							
					header("Location: ".$_GET['return']);

				}
			}
			
			$usuario = $this->usuarios->detalleUsuario($_SESSION['idusuario']);
			$ciudades = $this->usuarios->listarCiudades();

			include 'views/tienda/perfil.php';

		}else{

			header('Location: '.URL_CLUB);
		}
		
	}

	private function loguearUsuario($email, $password, $usuarioremoto = array(), $return_login=''){

		$usuario = $this->usuarios->loguearUsuario($email, $password);
		$usuario = $usuario[0];

		if (count($usuario)>0) {
			
			$this->usuarios->actualizarSesion($usuario["idusuario"], $usuario["nombre"], $usuario["apellido"], $usuario["email"], $usuario["telefono"], $usuario["telefono_m"], $usuario["direccion"], $usuario["ciudades_idciudad"], $usuario["ciudad"], $usuario["tipo"], $usuario["lider"], $usuario["organizaciones_idorganizacion"], $usuarioremoto);

			/*if ($usuario['tipo'] == 'CONSUMIDOR') {

				if (isset($return_login) && !empty($return_login)) {
					
					header("Location: ".$return_login);

				}else{

					header("Location: ".URL_SITIO.URL_TIENDA_PRODUCTOS);	
				}

			}else{

				header('Location: '.URL_SITIO.URL_CLUB);
			}*/

			return true;

		}else{

			return false;
		}
	}


}
?>