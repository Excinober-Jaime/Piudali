<?php
/**
* 
*/

/** Require Models **/
require "model/dbclass.php";
require "model/usuariosclass.php";
require "model/productosclass.php";
require "model/ordenesclass.php";
require "model/campanasclass.php";
require "model/carritoclass.php";
require "model/paginasclass.php";
require "model/bannersclass.php";
require "model/geolocalizacionclass.php";
require "model/ticketsclass.php";
require "model/capacitacionclass.php";
require "model/personalclass.php";
require "model/cuentasclass.php";
require "model/descuentosespecialesclass.php";
require "model/codigospuntosclass.php";
require "model/canalesdistribucionclass.php";
require "model/puntosclass.php";
require "model/plantillasemailclass.php";
require "model/entradasclubclass.php";
require "model/ventasvirtualesclass.php";
require "model/organizacionesclass.php";
require "model/sucursalesclass.php";
require "model/productosaliadosclass.php";
require "model/vendedoresposclass.php";
require "model/mailchimpclass.php";

/** Require Includes **/
require "include/constantes.php";
require "include/functions.php";


class Controller
{
	/**MODULOS POR DEFECTOS**/
	public static $DISABLE_PUNTOS = false;
	public static $DISABLE_REFERIDOS = false;
	public static $DISABLE_INCENTIVOS = false;
	public static $DISABLE_PREMIOS = false;
	public static $DISABLE_PROMOCIONES = false;
	public static $DISABLE_CUPONES = false;
	public static $DISABLE_POLITICAS = false;
	public static $DISABLE_COMPRAR = false;
	public static $DISABLE_BANNERS_USUARIO = false;
	public static $DISABLE_CAPACITACION = false;
	public static $CANAL_DISTRIBUCION = false;

	public function __construct()
	{
		$this->usuarios = new Usuarios();
		$this->productos = new Productos();
		$this->ordenes = new Ordenes();
		$this->campanas = new Campanas();
		$this->carrito = new Carrito();
		$this->paginas = new Paginas();		
		$this->banners = new Banners();
		$this->geolocalizacion = new Geolocalizacion();
		$this->tickets = new Tickets();
		$this->capacitacion = new Capacitacion();
		$this->personal = new Personal();
		$this->cuentas_virtuales = new CuentasVirtuales();
		$this->descuentos_especiales = new Descuentosespeciales();
		$this->codigos_puntos = new CodigosPuntos();
		$this->canales_distribucion = new CanalesDistribucion();
		$this->entradas = new Entradas();
		$this->ventas_virtuales = new VentasVirtuales();
		$this->organizaciones = new Organizaciones();
		$this->sucursales = new Sucursales();
		$this->productos_aliados = new ProductosAliados();
		$this->mailchimp = new Mailchimp();

		if (isset($_SESSION['idusuario']) && !empty($_SESSION['idusuario']) && $_SESSION['tipo'] == 'CONSUMIDOR') {
			
			header('Location: '.URL_SITIO.URL_CLUB);
		}
		

		/**MODULOS DISTRIBUIDORES**/

		if (isset($_SESSION['idusuario']) && !empty($_SESSION['idusuario']) && $_SESSION['tipo'] == 'DISTRIBUIDOR DIRECTO') {

			$usuario_canal = $this->usuarios->usuarioCanalDistribucion($_SESSION['idusuario']);

			if (count($usuario_canal)>0) {
				
				$canal = $this->canales_distribucion->detalleCanal($usuario_canal['canales_distribucion_idcanal']);


				self::$CANAL_DISTRIBUCION = $canal['nombre'];

				/**PERMISOS**/
				if (!$canal['puntos']) {

					self::$DISABLE_PUNTOS = true;	
				}

				if (!$canal['referidos']) {
					
					self::$DISABLE_REFERIDOS = true;
				}

				if (!$canal['incentivos']) {
					
					self::$DISABLE_INCENTIVOS = true;
				}

				if (!$canal['premios']) {
					
					self::$DISABLE_PREMIOS = true;
				}

				if (!$canal['promociones']) {
					
					self::$DISABLE_PROMOCIONES = true;
				}

				if (!$canal['cupones']) {
					
					self::$DISABLE_CUPONES = true;
				}

				if (!$canal['escuela']) {
					
					self::$DISABLE_CAPACITACION = true;
				}
				
				self::$DISABLE_BANNERS_USUARIO = true;

			}
		}
	}


/**********************FRONT************************************************/
	public function paginaContenido($url){

		$paginas_menu = $this->paginasMenu();
		$pagina_detalle = $this->paginas->contenidoPagina($url);
		
		include "views/pagina.php";
	}


	public function contenidoPagina($idpagina){
		$pagina = $this->paginas->detallePagina($idpagina);
		return $pagina[0]["contenido"];
	}


	public function paginasMenu(){
		
		$paginas_menu = $this->paginas->listarPaginas();	

		$paginas_menu["CATEGORIAS MENU"] = $this->categoriasMenu();

		/*$usuario_canal = $this->usuarios->usuarioCanalDistribucion($_SESSION['idusuario']);

		if (count($usuario_canal)>0) {
			
			$canal = $this->canales_distribucion->detalleCanal($usuario_canal['canales_distribucion_idcanal']);
		
			if ($canal['nombre'] == 'DISTRIBUIDORES ESPECIALIZADOS') {
				
				$paginas_menu = array(								
									
									array(
										'posicion' => 'INTERNAS DISTRIBUIDORES',
										'idpagina' => 14,
										'titulo' => 'Políticas de Manejo de Datos'
										),

									array(
										'posicion' => 'INTERNAS DISTRIBUIDORES',
										'idpagina' => 37,
										'titulo' => 'Terminos y Condiciones Distribuidores Especializados'
										)
								);

			}elseif ($canal['nombre'] == 'TIENDAS ESPECIALIZADAS'){

				$paginas_menu = array(								
									
									array(
										'posicion' => 'INTERNAS DISTRIBUIDORES',
										'idpagina' => 14,
										'titulo' => 'Políticas de Manejo de Datos'
										),

									array(
										'posicion' => 'INTERNAS DISTRIBUIDORES',
										'idpagina' => 34,
										'titulo' => 'Terminos y Condiciones Tiendas  Especializadas'
										)
								);
			}

		}*/

		return $paginas_menu;
	}

	public function categoriasMenu(){

		$menu = 1;
		$categorias_menu = $this->productos->listarCategorias($menu);
		return $categorias_menu;
	}

	public function listarCiudades(){
		$ciudades = $this->usuarios->listarCiudades();
		return $ciudades;
	}

	public function pageInicio(){
		
		$posicion_banners="HOME";
		$estados_banners = array(1);
		$banners = $this->banners->listarBanners($posicion_banners,$estados_banners);

		//$posicion_banners="POPUP";		
		//$banner_popup = $this->banners->listarBanners($posicion_banners,$estados_banners);

		$paginas_menu = $this->paginasMenu();

		$sobre_nosotros = $this->paginas->detallePagina(31);

		$tipos = array('NORMAL');
		$estados = array(1);
		$productosLista = $this->productos->listarProductos($tipos, $estados);

		require "views/producto/productos.php";
		include "views/inicio.php";
	}

	public function paginaProductos(){

		$paginas_menu = $this->paginasMenu();

		$posicion_banners="SIDEBAR";
		$estados_banners = array(1);
		$banners = $this->banners->listarBanners($posicion_banners, $estados_banners);

		$tipos = array('NORMAL');
		$estados = array(1);
		$productosLista = $this->productos->listarProductos($tipos,$estados);		

		require "views/producto/productos.php";
		include "views/productos_lista.php";
	}


	public function paginaCategoria($urlcategoria){
		
		$paginas_menu = $this->paginasMenu();

		$tipos = array('NORMAL');
		$estados = array(1);

		$detalle_categoria = $this->productos->detalleCategoriaUrl($urlcategoria);
		$idcategoria = $detalle_categoria["idcategoria"];		

		$posicion_banners="SIDEBAR";
		$estados_banners = array(1);
		$banners = $this->banners->listarBanners($posicion_banners,$estados_banners);

		$productosLista = $this->productos->listarProductos($tipos,$estados,$idcategoria);		

		require "views/producto/productos.php";
		include "views/productos_categoria.php";
	}

	public function paginaProductoDetalle($urlproducto){
		
		$paginas_menu = $this->paginasMenu();

		$posicion_banners="SIDEBAR";
		$estados = array(1);
		$banners = $this->banners->listarBanners($posicion_banners,$estados);		

		$producto = $this->productos->detalleProductos(0,$urlproducto);

		$tipos = array('NORMAL');
		$estados_relacionados = array(1);

		$productos_relacionados = $this->productos->listarProductos($tipos,$estados_relacionados,$producto[0]['categorias_idcategoria']);

		$imgs_producto = $this->productos->listarImgs($producto[0]['idproducto']);

		if (!empty($producto[0]["precio_oferta"])) {
			$porc_oferta=$producto[0]["precio"]-$producto[0]["precio_oferta"];
        	$porc_oferta=round(($porc_oferta/$producto[0]["precio"])*100);
		}
		
		require "views/producto/productos.php";
		include "views/producto_detalle.php";
	}

	public function pageBuscar(){

		$paginas_menu = $this->paginasMenu();

		$posicion_banners="SIDEBAR";
		$estados = array(1);
		$banners = $this->banners->listarBanners($posicion_banners,$estados);

		$tipos = array('NORMAL');
		$estados_productos = array(1);

		if (isset($_GET["buscar"]) && !empty($_GET["buscar"])) {
			$productosLista = $this->productos->listarProductos($tipos, $estados_productos, 0, $_GET["buscar"]);
		}

		require "views/producto/productos.php";
		include "views/productos_buscar.php";	
	}

	public function pageTiendas(){

		$paginas_menu = $this->paginasMenu();
		$pagina_detalle = $this->paginas->contenidoPagina('tiendas');

		if (isset($_GET["ciudad"]) && !empty($_GET["ciudad"])) {

			$idciudad = $_GET["ciudad"];
			
		}else{

			//Cali por defecto
			$idciudad = 4270;
		}

		$distribuidores_mapa = $this->usuarios->listarUsuariosMapa($idciudad);	

		if (count($distribuidores_mapa)>0) {

			foreach ($distribuidores_mapa as $key => $distribuidor) {

				$distribuidores[$key]["idusuario"] = $distribuidor["idusuario"];

				if (!empty($distribuidor["organizaciones_idorganizacion"])) {

					$organizacion = $this->usuarios->detalleOrganizacionUsuario($distribuidor["organizaciones_idorganizacion"]);

					$distribuidores[$key]["nombre"] = $organizacion["razon_social"];
					$distribuidores[$key]["apellido"] = "";
					$distribuidores[$key]["direccion"] = $organizacion["direccion"];
					$distribuidores[$key]["telefono"] = $organizacion["telefono"];
					$distribuidores[$key]["telefono_m"] = "";
					$distribuidores[$key]["ciudad"] = $organizacion["ciudad"];
				
				}else{

					$distribuidores[$key]["nombre"] = $distribuidor["nombre"];
					$distribuidores[$key]["apellido"] = $distribuidor["apellido"];
					$distribuidores[$key]["direccion"] = $distribuidor["direccion"];
					$distribuidores[$key]["telefono"] = $distribuidor["telefono"];
					$distribuidores[$key]["telefono_m"] = $distribuidor["telefono_m"];;
					$distribuidores[$key]["ciudad"] = $distribuidor["ciudad"];
				}
			}
		}

		if ($idciudad == 4270) { //Cali

			//Provisional artemisa
			$puntos_artemisa = array("Centro Comercial Chipichape Local 8-118","Centro Comercial Centenario Local 131","Centro Comercial Cosmocentro L 2-68","Centro Comercial Unicentro local 320 Pasillo 5","Centro Comercial Unicentro Local 449 Oasis","Centro Cra 5 No.12-16","Avenida Estación No.5CN-34","Avenida Roosevelt No.25-32");

			$i = 300;

			foreach ($puntos_artemisa as $punto) {

				$distribuidores[$i]["idusuario"] = 'ART'.$i;
				$distribuidores[$i]["nombre"] = "Artemisa";
				$distribuidores[$i]["direccion"] = $punto;
				$distribuidores[$i]["telefono"] = "(2) 4873030";
				$distribuidores[$i]["telefono_m"] = "";
				$distribuidores[$i]["ciudad"] = "Cali";

				$i++;
			}
		}

		if ($idciudad == 3394) { //Bogotá
			

			//Provisional supernaturistas
			$puntos_super = array(

							array ('direccion' => '<b>Niza</b> Av. 127 con Av. Suba C.C. Niza Int. 13', 'telefono' => '253 1429'),
							array ('direccion' => '<b>Carrera 15</b> Av. 15 # 105 A - 20', 'telefono' => '619 1662'),
							array ('direccion' => '<b>Santa Ana</b> Cra. 7 # 108 - 44 (en Olímpica)', 'telefono' => '213 9922'),
							array ('direccion' => '<b>Calle 100</b> Calle 98 # 17A - 64', 'telefono' => '256 9136'),
							array ('direccion' => 'Calle 119 # 14B - 10', 'telefono' => '215 7214'),
							array ('direccion' => 'AK 45 # 104 - 60 (Autonorte con 104)', 'telefono' => '214 6229'),
							array ('direccion' => 'Cra. 7 # 82 - 62 Lc 28 ', 'telefono' => '622 0790'),
							array ('direccion' => 'Cra. 15 # 118 - 50', 'telefono' => '214 0824'),
							array ('direccion' => 'Cra. 7 # 17 - 13', 'telefono' => '491 1218'),
							array ('direccion' => 'Cra. 7A # 140 - 20 Lc 108', 'telefono' => '700 5781'),
							array ('direccion' => 'C.C. Bazaar Alsacia Calle 12B # 71D - 61 (Av. Boyacá) Lc 1 - 18', 'telefono' => '411 7058'),
							array ('direccion' => 'Cra. 18A # 135 - 46', 'telefono' => '627 9854')
						);

			$i = 300;

			foreach ($puntos_super as $punto) {

				$distribuidores[$i]["idusuario"] = 'SUP'.$i;
				$distribuidores[$i]["nombre"] = "Supermercado Naturista";
				$distribuidores[$i]["direccion"] = $punto['direccion'];
				$distribuidores[$i]["telefono"] = $punto['telefono'];
				$distribuidores[$i]["telefono_m"] = "";
				$distribuidores[$i]["ciudad"] = "Bogotá";

				$i++;
			}
		}

		$distribuidores_mapa_all = $this->usuarios->listarUsuariosMapa();	
		$ciudades = $this->usuarios->listarCiudadesConDistribuidor();

		$i = 0;

		foreach ($ciudades as $ciudad) {

			foreach ($distribuidores_mapa_all as $key2 => $distribuidor) {

				if ($distribuidor["ciudades_idciudad"] == $ciudad["idciudad"]) {
					
					$ciudades_lista[$i]["idciudad"] = $ciudad["idciudad"];
					$ciudades_lista[$i]["ciudad"] = $ciudad["ciudad"];
					$ciudades_lista[$i]["departamento"] = $ciudad["departamento"];

					$i++;

					break;
				}
			}
		}
		
		$json_maps = json_encode($distribuidores);
		//$onload = "initMap('".$distribuidores."')";
		//$onload = "initMap('".json_encode(array('Direccion'=>'Calle 48A # 29c - 11, Cali'))."')";
		include "views/tiendas.php";
	}



/************USUARIOS**************/	

	public function pageRegistro(){

		$paginas_menu = $this->paginasMenu();

		//$posicion_banners="SIDEBAR";
		//$estados = array(1);
		//$banners = $this->banners->listarBanners($posicion_banners,$estados);

		$posicion_banners="REGISTRO";
		$estados = array(1);
		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		
		$ciudades = $this->listarCiudades();

		$lider = 0;

		if (isset($_GET["r"]) && !empty($_GET["r"])) {
			$lider = $_GET["r"];
			$alerta = "Diligencia el formulario con los datos de tu distribuidor";
		}

		if (isset($_GET["d"]) && !empty($_GET["d"])) {
			
			$referente = $_GET["d"];

			$info_referente = $this->usuarios->detalleUsuario($referente);
			$lider = $info_referente["lider"]; //El nuevo distribuidor hereda el lider del referente

			$nivel_referente = $info_referente["nivel"];

			if ($nivel_referente<=4) {
				$nivel = $nivel_referente+1;
			}else{
				$nivel = 0;
			}

			$alerta = "Diligencia el formulario con los datos de tu referido";

		}else{

			$referente = 0;
			$nivel = 0;
		}

		if (isset($_POST["cod_representante"]) && !empty($_POST["cod_representante"])) {
			$representante = $this->usuarios->detalleUsuarioCodLider($_POST["cod_representante"]);
			if (count($representante)>0) {
				$lider = $representante["idusuario"];
			}
		}

		if (isset($_POST["crearUsuarioOrganizacion"])) {

			extract($_POST);

			if (count($this->usuarios->validarUsuario($num_identificacion, $email))>0) {

				$alerta = "Usted ya posee una cuenta";

			}else{

				$tipo = "DISTRIBUIDOR DIRECTO";
				$foto = "";
				$estado = 1;
				$fecha_registro = fecha_actual("datetime");
				$passwordmd5 = md5($password);

				if (!empty($ano_nacimiento) && !empty($mes_nacimiento) && !empty($dia_nacimiento)) {
					$fecha_nacimiento = $ano_nacimiento."-".$mes_nacimiento."-".$dia_nacimiento;	
				}else{
					$fecha_nacimiento = "0000-00-00";
				}

				$idorganizacion = $this->usuarios->crearOrganizacion($nit, strtoupper($razon_social), strtoupper($direccion_organizacion), $telefono_organizacion, $ciudad_organizacion);

				$idusuario = $this->usuarios->crearUsuario(strtoupper($nombre), strtoupper($apellido), '', '0000-00-00', $email, $passwordmd5, $num_identificacion, $boletines, $condiciones, strtoupper($direccion), 0, '', $telefono_m, $tipo, $segmento, $foto, $estado, $fecha_registro, $referente, $lider, 0, $nivel, $ciudad, $idorganizacion);
			
				if (!empty($idusuario)) {

					//Suscribir en Mailchimp
					$suscribir = $this->mailchimp->suscribir('b8ebc5f9f4', $email, strtoupper($nombre), strtoupper($apellido), $idusuario, '', '', $num_identificacion, strtoupper($direccion), $telefono_m, $segmento, 1, fecha_actual('date'), $idorganizacion, 'DISTRIBUIDOR DIRECTO');

					//Enviar email Bienvenida
					$idplantilla=2;
					$plantilla = $this->usuarios->detallePlantilla($idplantilla);
					$mensaje = shorcodes_registro_usuario($nombre." ".$apellido,$email,$password,$plantilla["mensaje"]);

					require_once 'include/PHPMailer-master/PHPMailerAutoload.php';

					//Create a new PHPMailer instance
					$mail = new PHPMailer;
					//Set who the message is to be sent from
					$mail->setFrom($plantilla["email"], "Piudali");
					//Set an alternative reply-to address
					//$mail->addReplyTo('replyto@example.com', 'First Last');
					//Set who the message is to be sent to
					$mail->addAddress($email, $nombre." ".$apellido);
					//Set the subject line
					$mail->Subject = $plantilla["asunto"];
					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->msgHTML($mensaje);
					//Replace the plain text body with one created manually
					//$mail->AltBody = 'This is a plain-text message body';
					//Attach an image file
					//$mail->addAttachment('images/phpmailer_mini.png');

					//send the message, check for errors
					if (!$mail->send()) {

					   //echo $mail->ErrorInfo;

					} else {

						echo "<script> alert('Tu registro fue exitoso. Por favor ingresa con tus datos'); window.location='".URL_SITIO.URL_INGRESAR."';</script>";    
					}					

				}else{

					echo "<script> alert('No fue posible realizar el registro. Por favor intente de nuevo');</script>";			
				}
			}
		}elseif (isset($_POST["crearUsuario"])) {

			extract($_POST);

			if (count($this->usuarios->validarUsuario($num_identificacion, $email))>0) {

				$alerta = "Usted ya posee una cuenta";

			}else{

				$tipo = "DISTRIBUIDOR DIRECTO";
				$foto = "";
				$estado = 1;
				$fecha_registro = fecha_actual("datetime");
				$passwordmd5 = md5($password);
				$idorganizacion = 0;

				if (!empty($ano_nacimiento) && !empty($mes_nacimiento) && !empty($dia_nacimiento)) {
					$fecha_nacimiento = $ano_nacimiento."-".$mes_nacimiento."-".$dia_nacimiento;	
				}else{
					$fecha_nacimiento = "0000-00-00";
				}
				

				$idusuario = $this->usuarios->crearUsuario(strtoupper($nombre), strtoupper($apellido), '', $fecha_nacimiento, $email, $passwordmd5, $num_identificacion, $boletines, $condiciones, strtoupper($direccion), 0, '', $telefono_m, $tipo, $segmento, $foto, $estado, $fecha_registro, $referente, $lider, 0, $nivel, $ciudad, $idorganizacion);

				if (!empty($idusuario)) {

					//Suscribir en Mailchimp
					$suscribir = $this->mailchimp->suscribir('b8ebc5f9f4',$email, strtoupper($nombre), strtoupper($apellido), $idusuario, '', '', $num_identificacion, strtoupper($direccion), $telefono_m, $segmento, 1, fecha_actual('date'), $idorganizacion, 'DISTRIBUIDOR DIRECTO');
					
					//Enviar email Bienvenida
					$idplantilla=2;
					$plantilla = $this->usuarios->detallePlantilla($idplantilla);
					$mensaje = shorcodes_registro_usuario($nombre." ".$apellido,$email,$password,$plantilla["mensaje"]);

					require_once 'include/PHPMailer-master/PHPMailerAutoload.php';

					//Create a new PHPMailer instance
					$mail = new PHPMailer;
					//Set who the message is to be sent from
					$mail->setFrom($plantilla["email"], "Piudali");
					//Set an alternative reply-to address
					//$mail->addReplyTo('replyto@example.com', 'First Last');
					//Set who the message is to be sent to
					$mail->addAddress($email, $nombre." ".$apellido);
					//Set the subject line
					$mail->Subject = $plantilla["asunto"];
					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->msgHTML($mensaje);
					//Replace the plain text body with one created manually
					//$mail->AltBody = 'This is a plain-text message body';
					//Attach an image file
					//$mail->addAttachment('images/phpmailer_mini.png');

					//send the message, check for errors
					if (!$mail->send()) {

					   //echo $mail->ErrorInfo;

					} else {

					    //echo 'Por favor revisa tu correo';
					}


					echo "<script> alert('Tu registro fue exitoso. Por favor ingresa con tus datos'); window.location='".URL_SITIO.URL_INGRESAR."';</script>";			
				}else{
					echo "<script> alert('No fue posible realizar el registro. Por favor intente de nuevo');</script>";			
				}
			}
		}

		include "views/registro.php";
	}

	private function loguearUsuario($email, $password, $usuarioremoto = array()){

		$usuario = $this->usuarios->loguearUsuario($email, $password);
		$usuario = $usuario[0];

		if (count($usuario)>0) {
			
			$this->usuarios->actualizarSesion($usuario["idusuario"], $usuario["nombre"], $usuario["apellido"], $usuario["email"], $usuario["telefono"], $usuario["telefono_m"], $usuario["direccion"], $usuario["ciudades_idciudad"], $usuario["ciudad"], $usuario["tipo"], $usuario["lider"], $usuario["organizaciones_idorganizacion"], $usuarioremoto);

			if ($usuario['tipo'] == 'CONSUMIDOR') {

				if (isset($_SESSION['codigo_por_asignar']) && !empty($_SESSION['codigo_por_asignar'])) {
					
					$response_codigo = $this->redimirCodigoPuntos($_SESSION['codigo_por_asignar']['codigo']);

					return $response_codigo;

				}else{
					
					header("Location: ".URL_CLUB);
				}

			}else{

				header("Location: ".URL_USUARIO."/".URL_USUARIO_PERFIL);
			}

		}else{

			return true;
		}
	}

	public function pageIngresar(){

		$paginas_menu = $this->paginasMenu();

		if (isset($_POST["ingresar"])) {

			extract($_POST);

			$password = md5($password);

			$response = $this->loguearUsuario($email, $password);

			if (!empty($response)) {
				
				echo "<script> alert('Los datos de acceso son incorrectos. Por favor intenta de nuevo'); </script>";
			}
			
		}

		include "views/ingresar.php";
	}

	public function ingresoUsuarioRemoto(){

		if (isset($_POST["ingresoRemoto"])) {

			$email = $_POST["email"];
			$password = $_POST["password"];

			if (!empty($email) && !empty($password)) {

				$usuarioremoto = array(

					'idusuario' => $_SESSION["idusuario"], 
					'tipo' => $_SESSION["tipo"],
					'email' => $_SESSION["email"],
					'nombre' => $_SESSION["nombre"],
					'apellido' => $_SESSION["apellido"],
					'tipo' => $_SESSION["tipo"]
				);

				$response = $this->loguearUsuario($email, $password, $usuarioremoto);

				if (!empty($response)) {
				
					echo "<script> alert('No fue posible ingresar remotamente a la cuenta. Por favor contactar al administrador'); </script>";
				}

			}else{

				header("Location: ".URL_SITIO);

			}
		}
	}

	public function salirUsuarioRemoto(){
		
		if (isset($_SESSION["idusuario_remoto"]) && !empty($_SESSION["idusuario_remoto"])) {
			
			$usuario = $this->usuarios->detalleUsuario($_SESSION["idusuario_remoto"]);

			$this->usuarios->actualizarSesion($usuario["idusuario"], $usuario["nombre"], $usuario["apellido"], $usuario["email"], $usuario["telefono"], $usuario["telefono_m"], $usuario["direccion"], $usuario["ciudades_idciudad"], $usuario["ciudad"], $usuario["tipo"],$usuario["lider"], $usuario["organizaciones_idorganizacion"]);

			unset($_SESSION["idusuario_remoto"]);
			unset($_SESSION["email_remoto"]);
			unset($_SESSION["nombre_remoto"]);
			unset($_SESSION["apellido_remoto"]);
			unset($_SESSION["tipo_remoto"]);

			header("Location: ".URL_USUARIO."/".URL_USUARIO_PERFIL);

		}else{

			header("Location:".URL_SITIO);
		}
	}

	public function suscribirNewsletter(){

		extract($_POST);

		if (isset($nombre) && isset($email)) {
			$idsuscriptor = $this->usuarios->suscribirNewsletter($nombre,$email,fecha_actual('datetime'));
		}

		if ($idsuscriptor) {
			$return = "Tu suscripción se realizó con éxito";

		}else{
			$return = "Tu suscripción no se logro realizar, intenta más tarde";
		}

		return $return;
	}

	public function pageRestaurarContrasena(){
		
		$paginas_menu = $this->paginasMenu();

		if (isset($_POST["restaurar"])) {

			$email = $_POST["email"];

			if (!empty($email)) {
			
				$usuario = $this->usuarios->detalleUsuarioEmail($email);			

				if (count($usuario)>0) {
					
					$nueva_contrasena = $this->usuarios->generarContrasena();
					$exitoso = $this->usuarios->cambiarContrasenaUsuario($usuario["idusuario"], $usuario["password"], md5($nueva_contrasena));
					
					if ($exitoso) {

						//Enviar email Restauración Contraseña
						$idplantilla=3;
						$plantilla = $this->usuarios->detallePlantilla($idplantilla);
						$mensaje = shorcodes_restaurar_contrasena($usuario["nombre"]." ".$usuario["apellido"],$email,$nueva_contrasena,$plantilla["mensaje"]);

						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0"."\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

						// More headers
						$headers .= 'From: Piudali <'.$plantilla["email"].'>'."\r\n";

						$mail = mail($email, $plantilla["asunto"], $mensaje, $headers);
						
						if ($mail) {
							echo "<script> alert('Se ha restaurado tu contraseña. Revisa tu correo electrónico'); window.location='".URL_SITIO.URL_INGRESAR."'</script>";
						}
					}

				}else{
					echo "<script> alert('El correo electrónico no se encuentra registrado'); </script>";
				}
			}
			
		}

		include "views/restaurar_contrasena.php";
	}

	public function pageContacto(){

		$paginas_menu = $this->paginasMenu();

		$posicion_banners="CONTACTO";
		$estados = array(1);
		$banners = $this->banners->listarBanners($posicion_banners, $estados);

		if (isset($_POST["enviarMensaje"])) {

			extract($_POST);

			$html = '<html>
			<head>
				<title>Contácto</title>
			</head>
			<body>
				Nombre: '.$nombre.'<br>
				Email: '.$email.'<br>
				Teléfono: '.$telefono.'<br>
				Mensaje: '.$mensaje.'
			</body>
			</html>';
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0"."\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

			// More headers
			$headers .= 'From: <info@linkgrupomarketing.com>'."\r\n";

			$mail = mail("gcomercial@linkgrupomarketing.com", "Contácto Piudali", $html, $headers);
			if ($mail) {
				echo "<script> alert('Hemos recibido tu mensaje. Pronto te contactaremos'); </script>";
			}
		}

		include "views/contacto.php";
	}

	public function usuarioPerfil(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_PERFIL;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);		
		
		if (!empty($_SESSION["idusuario"])) {

			$usuario = $this->usuarios->detalleUsuario($_SESSION["idusuario"]);

			if (!empty($usuario["organizaciones_idorganizacion"])) {
				$organizacion = $this->usuarios->detalleOrganizacionUsuario($usuario["organizaciones_idorganizacion"]);
			}else{
				$organizacion = false;
			}

			$region = $this->geolocalizacion->detalleRegionCiudad($usuario["ciudades_idciudad"]);
			
			switch ($_SESSION["tipo"]) {

				case 'DISTRIBUIDOR DIRECTO':

					if (!empty($usuario["lider"])) {

						$ids = array();
						$lideres = array($usuario["lider"]);
						$ciudades = array();

						$lider = $this->usuarios->detalleUsuario($usuario["lider"]);
						//$zona = $this->geolocalizacion->listarZonas($ids,$lideres,$ciudades);

					}else{
						$lider = false;
					}
					break;

				case 'REPRESENTANTE COMERCIAL':
					//$zona = $this->usuarios->zonaUsuario($_SESSION["idusuario"]);
					break;
				
				case 'DIRECTOR':
					# code...
					break;

				default:
					# code...
					break;
			}	
			
			include "views/usuario_perfil.php";

		}else{
			header("Location: ".URL_SITIO);
		}
	}

	public function usuarioCambiarDatos($return=""){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_PERFIL;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);		
		
		if (!empty($_SESSION["idusuario"])) {

			if (isset($_POST["cambiarDatos"])) {

				extract($_POST);

				//Upload foto
				if($_FILES["foto"]["error"]==UPLOAD_ERR_OK){

					$rutaimg=$_FILES["foto"]["tmp_name"];
					$nombreimg=$_FILES["foto"]["name"];
					$destino = DIR_IMG_USUARIOS.$nombreimg;
					move_uploaded_file($rutaimg, $destino);

				}else{

					$destino = "";
				}

				$foto = $destino;

				if (empty($boletines)) {
					$boletines = 0;
				}

				$actualizar_usuario = $this->usuarios->actualizarUsuario($_SESSION["idusuario"],$nombre, $apellido, $sexo, $fecha_nacimiento, $email, $num_identificacion, $boletines, $direccion, $mapa, $telefono, $telefono_m, $_SESSION["tipo"], $segmento, $foto, $_SESSION["lider"], '', $ciudad);

				if (isset($idorganizacion) && !empty($idorganizacion)) {
					$actualizar_organizacion = $this->usuarios->actualizarOrganizacion($idorganizacion, $nit, $razon_social, $telefono_organizacion, $direccion_organizacion, $ciudad_organizacion);
				}

				if (!empty($nueva_contrasena)) {
					
					$cambio_contrasena = $this->usuarios->cambiarContrasenaUsuario($_SESSION["idusuario"], md5($contrasena_actual), md5($nueva_contrasena));

					if ($cambio_contrasena===1) {
						
					}else{
						
					}
				}

				$info_ciudad = $this->usuarios->nombreCiudad($ciudad);
				$this->usuarios->actualizarSesion($_SESSION["idusuario"], $nombre, $apellido, $email, $telefono, $telefono_m, $direccion, $ciudad, $info_ciudad["ciudad"], $_SESSION["tipo"], $_SESSION["lider"], $idorganizacion);

				if ($actualizar_usuario===1) {
					if (!empty($return)) {
						header("Location: ".URL_SITIO.$return);
					}				
				}
			}
			
			$ciudades = $this->listarCiudades();
			$usuario = $this->usuarios->detalleUsuario($_SESSION["idusuario"]);

			if (!empty($usuario["organizaciones_idorganizacion"])) {
				$organizacion = $this->usuarios->detalleOrganizacionUsuario($usuario["organizaciones_idorganizacion"]);
			}else{
				$organizacion = false;
			}
			
			include "views/usuario_cambiar_datos.php";

		}else{
			header("Location: ".URL_SITIO);
		}
	}

	public function usuarioNegocio(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_NEGOCIO;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);
		$banners = $this->banners->listarBanners($posicion_banners, $estados);

		$campanas = $this->campanas->listarCampanas();

		if (isset($_POST["idcampana"]) && !empty($_POST["idcampana"])) {

			$es_ano = substr($_POST["idcampana"], 0, 3);			
			if ($es_ano=="ano") {
				$ano = substr($_POST["idcampana"], 3, 7);
				$campana_seleccionada = array('fecha_ini' => $ano.'-01-01', 'fecha_fin' => $ano.'-12-31');
			}else{
				$campana_seleccionada = $this->campanas->detalleCampana($_POST["idcampana"]);
			}			
			
		}else{
			$campana_seleccionada = $this->campanas->getCamapanaActual();
		}		
		
		if (!empty($_SESSION["idusuario"])) {

			switch ($_SESSION["tipo"]) {
				case 'DISTRIBUIDOR DIRECTO':

					if (isset($_POST["estado"]) && !empty($_POST["estado"])) {
						$estado = array($_POST["estado"]);
					}else{
						$estado = array();
					}

					$ordenes = $this->usuarios->listarOrdenesUsuario($_SESSION["idusuario"],$campana_seleccionada["fecha_ini"], $campana_seleccionada["fecha_fin"],$estado);

					include "views/usuario_negocio.php";

					break;

				case 'REPRESENTANTE COMERCIAL':

					$distribuidores = $this->usuarios->listarDistribuidoresLider($_SESSION["idusuario"]);
					
					if (count($distribuidores)>0) {

						if (isset($_POST["estado"])) {
							$estado_compras = $_POST["estado"];
						}else{
							$estado_compras = "PENDIENTE";
						}

						foreach ($distribuidores as $key => $distribuidor) {
							$compras_netas = $this->usuarios->comprasNetasPeriodo($campana_seleccionada["fecha_ini"], $campana_seleccionada["fecha_fin"],$estado_compras,$distribuidor["idusuario"]);
							$distribuidores[$key]["compras_netas"] = $compras_netas["compras_netas"];

							$ordenes = $this->usuarios->listarOrdenesUsuario($distribuidor["idusuario"], $campana_seleccionada["fecha_ini"], $campana_seleccionada["fecha_fin"], array($estado_compras));
							
							$distribuidores[$key]["ordenes"] = $ordenes;
						}

						//Niveles
						$nombre_niveles = array('FRONTAL','REFERIDOS','REFERIDOS','REFERIDOS','REFERIDOS');
						$niveles = array();
						$porc_niveles = array(5,4,3,2,1);

						for ($i=0; $i <=4 ; $i++) {

							$niveles[$i]["neto"] = 0;
							$niveles[$i]["comision"] = 0;

							foreach ($distribuidores as $key => $distribuidor) {

								//Default
								$distribuidor['tipo_cliente'] = 'DISTRIBUIDOR DIRECTO';

								/***CONSULTAR PORCENTAJE COMISIÓN CORRESPONDIENTE AL CANAL DEL DISTRIBUIDOR****/

								$porc_canal = 0;

								$distribuidor_canal = $this->usuarios->usuarioCanalDistribucion($distribuidor['idusuario']);

								if (count($distribuidor_canal)>0) {

									$detalle_canal = $this->canales_distribucion->detalleCanal($distribuidor_canal['canales_distribucion_idcanal']);

									$porc_canal = $detalle_canal['comision'];
									$tipo_cliente = $detalle_canal['nombre'];

									$distribuidor['porc_canal'] = $porc_canal;
									$distribuidor['tipo_cliente'] = $tipo_cliente;
								}

								if ($distribuidor["nivel"]==$i) {

									if (!empty($distribuidor['porc_canal'])) {
													
										$porc_comision = $distribuidor['porc_canal'];
									
									}else{

										$porc_comision = $porc_niveles[$i];
									}

									$comision_cliente = ($distribuidor["compras_netas"] * $porc_comision) / 100;


									$niveles[$i]["distribuidores"][$key] = $distribuidor;
									$niveles[$i]["neto"]+=$distribuidor["compras_netas"];
									$niveles[$i]["comision"]+=$comision_cliente;
								}
							}	
						}
					}

					include "views/lider_negocio.php";
					break;

				case 'DIRECTOR':
					# code...
					break;
				
				default:
					# code...
					break;
			}			

		}else{
			header("Location: ".URL_SITIO);
		}
	}

	public function usuarioDetalleOrden($idorden){
		
		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_NEGOCIO;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);

		$orden = $this->usuarios->detalleOrden($idorden);

		include "views/usuario_detalle_orden.php";
	}

	public function usuarioClientes(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_CLIENTES;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);
		$banners = $this->banners->listarBanners($posicion_banners, $estados);		

		if (isset($_POST["texto-filtro"])) {
			$filtro_nombre = $_POST["texto-filtro"];
		}else{
			$filtro_nombre = "";
		}

		if (isset($_POST["estado"])) {
			$estado_distribuidores = $_POST["estado"];
		}else{
			$estado_distribuidores = 1;
		}

		$clientes = $this->usuarios->listarDistribuidoresLider($_SESSION["idusuario"], $estado_distribuidores, $filtro_nombre);

		include "views/lider_clientes.php";
	}

	public function usuarioCuentaVirtual(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_CUENTA;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);		

		$cuenta = $this->cuentas_virtuales->consultarCuenta($_SESSION["idusuario"]);
		$movimientos = 	$this->cuentas_virtuales->consultarMovimientos($cuenta["idcuenta"]);

		include "views/usuario_cuenta_virtual.php";
	}

	public function usuarioPremios(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_PREMIOS;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);		
		
		if (!empty($_SESSION["idusuario"])) {

			$estados = array(1);
			$tipos = array("PREMIO");
			$premios = $this->productos->listarProductos($tipos, $estados);
			
			include "views/producto/productos.php";
			include "views/usuario_premios.php";

		}else{
			header("Location: ".URL_SITIO);
		}
	}

	public function usuarioPromociones(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_PROMOCIONES;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);		
		
		if (!empty($_SESSION["idusuario"])) {

			$estados = array(1);
			$tipos = array("PROMOCION");
			$promociones = $this->productos->listarProductos($tipos, $estados);
			
			include "views/producto/productos.php";
			include "views/usuario_promociones.php";

		}else{
			header("Location: ".URL_SITIO);
		}
	}

	public function usuarioIncentivos(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_INCENTIVOS;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);		

		$campanas = $this->campanas->listarCampanas();

		if (isset($_POST["idcampana"]) && !empty($_POST["idcampana"])) {

			$es_ano = substr($_POST["idcampana"], 0, 3);
			if ($es_ano=="ano") {
				$ano = substr($_POST["idcampana"], 3, 7);
				$campana_seleccionada = array('fecha_ini' => $ano.'-01-01', 'fecha_fin' => $ano.'-12-31');
			}else{
				$campana_seleccionada = $this->campanas->detalleCampana($_POST["idcampana"]);
			}			
			
		}else{
			$campana_seleccionada = $this->campanas->getCamapanaActual();
		}
		
		if (!empty($_SESSION["idusuario"])) {

			switch ($_SESSION["tipo"]) {

				case 'DISTRIBUIDOR DIRECTO':

					$usuario = array("DISTRIBUIDOR DIRECTO");
					$incentivos = $this->usuarios->listarIncentivos($usuario, $campana_seleccionada["fecha_ini"], $campana_seleccionada["fecha_fin"]);
					$estado_compras = "FACTURADO";


					if (count($incentivos)>0) {
						foreach ($incentivos as $key => $incentivo) {
							$compras_netas = $this->usuarios->comprasNetasPeriodo($incentivo["inicio"], $incentivo["fin"],$estado_compras,$_SESSION["idusuario"]);
							$incentivos[$key]["compras_netas"] = $compras_netas["compras_netas"];
							$incentivos[$key]["cumplimiento"] = ($incentivos[$key]["compras_netas"]/$incentivo["meta"])*100;
		 				}
					}
					
					include "views/usuario_incentivos.php";

					break;

				case 'REPRESENTANTE COMERCIAL':
					
					$usuario = array("REPRESENTANTE COMERCIAL");
					$incentivos = $this->usuarios->listarIncentivos($usuario, $campana_seleccionada["fecha_ini"], $campana_seleccionada["fecha_fin"]);

					$distribuidores = $this->usuarios->listarDistribuidoresLider($_SESSION["idusuario"]);

					if (count($incentivos)>0) {
						
						foreach ($incentivos as $key => $incentivo) {

							//if ($incentivo["fin"] >= date("Y-m-d")) {			

								$escalas = $this->usuarios->listarEscalasIncentivo($incentivo["idincentivo"]);
								$incentivos[$key]["escalas"] = $escalas;
								
								if (count($distribuidores)>0) {

									$estado_compras = "FACTURADO";

									foreach ($distribuidores as $distribuidor) {

										$compras_netas = $this->usuarios->comprasNetasPeriodo($incentivo["inicio"], $incentivo["fin"],$estado_compras,$distribuidor["idusuario"]);
										
										$incentivos[$key]["compras_netas"] += $compras_netas["compras_netas"];								
									}
								}

								if (count($escalas)>0) {
									
									$incentivos[$key]["meta"] = 0;

									foreach ($escalas as $escala) {
										if ($escala["minimo"]<=$incentivos[$key]["compras_netas"] && $escala["maximo"]>=$incentivos[$key]["compras_netas"]) {

											$incentivos[$key]["meta"] = "ESCALA ".$incentivo["incentivo"];
											$incentivos[$key]["cumplimiento"] = convertir_pesos($escala["bono"]);
											break;
										}
									}
								}else{
									$incentivos[$key]["meta"] = convertir_pesos($incentivo["meta"]);
									$incentivos[$key]["cumplimiento"] = ($incentivos[$key]["compras_netas"]/$incentivo["meta"])*100;
									$incentivos[$key]["cumplimiento"] = round($incentivos[$key]["cumplimiento"])."%";
								}
							//}else{
								//Eliminar incentivos vencidos
								//unset($incentivos[$key]);
							//}
						}
					}

					include "views/lider_incentivos.php";

					break;

				case 'DIRECTOR':
					# code...
					break;				
			}

		}else{
			header("Location: ".URL_SITIO);
		}
	}

	public function usuarioCupones(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_CUPONES;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);		
		
		if (!empty($_SESSION["idusuario"])) {			
			
			$cupones = $this->usuarios->listarCupones(array(1),false);
			
			include "views/usuario_cupones.php";

		}else{
			header("Location: ".URL_SITIO);
		}
	}

	public function usuarioCapacitacion(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_CAPACITACION;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);

		$posicion_banners="CAPACITACION";
		$estados = array(1);
		$banner_capacitacion = $this->banners->listarBanners($posicion_banners, $estados);
		
		//$categorias = $this->productos->listarCategorias();


		if (!empty($_SESSION["idusuario"])) {

			$categorias = $this->capacitacion->listarCategorias($_SESSION["tipo"], 1);

			if (isset($_GET["opcion"])) {

				switch ($_GET["opcion"]) {

					case URL_USUARIO_CAPACITACION_INGREDIENTES:
						$ingredientes = $this->usuarios->listarIngredientes();
						break;

					case URL_USUARIO_CAPACITACION_PROTOCOLOS:
						$protocolos = $this->usuarios->listarProtocolos();
						break;

					default:
						$categoria_actual = $this->capacitacion->detalleCategoria($_GET["opcion"]);

						if ($_GET["opcion"] == 4) {
							$elementos = $this->capacitacion->listarElementosCat($_GET["opcion"],array(1), "ASC");
						}else{
							$elementos = $this->capacitacion->listarElementosCat($_GET["opcion"],array(1));
						}
						

						if (count($elementos)>0) {
							foreach ($elementos as $key => $elemento) {
								if ($elemento["perfil"]=="DISTRIBUIDOR DIRECTO") {
									$elementos_distribuidores[] = $elemento;
								}

								if ($elemento["perfil"]=="REPRESENTANTE COMERCIAL") {
									$elementos_representantes[] = $elemento;
								}

								if ($elemento["perfil"]=="TODOS") {
									$elementos_distribuidores[] = $elemento;
									$elementos_representantes[] = $elemento;
								}
							}		
						}

						if ($_SESSION["tipo"]=="DISTRIBUIDOR DIRECTO") {

							$elementos = $elementos_distribuidores;

						}elseif ($_SESSION["tipo"]=="REPRESENTANTE COMERCIAL") {
							
							$elementos = $elementos_representantes;					
						}
						break;
				}							
			}


			

			/*if (count($categorias)>0) {
				foreach ($categorias as $key => $categoria) {
					$categorias[$key]["elementos"] = $this->capacitacion->listarElementosCat($categoria["idcategoria"]);
				}
			}*/

			/*if (isset($_GET["opcion"]) && !empty($_GET["opcion"])) {
				
				switch ($_GET["opcion"]) {
					case URL_USUARIO_CAPACITACION_INGREDIENTES:
						$ingredientes = $this->usuarios->listarIngredientes();
						break;

					case URL_USUARIO_CAPACITACION_NEGOCIO:
						if ($_SESSION["tipo"]=="REPRESENTANTE COMERCIAL") {
							$url_presentacion = "//www.slideshare.net/slideshow/embed_code/key/BEhgOKiy9qdeJG";
						}else{
							$url_presentacion = "//www.slideshare.net/slideshow/embed_code/key/6vFK37aoFdfDcm";
						}						
						break;
					case URL_USUARIO_CAPACITACION_PROTOCOLOS:
						$protocolos = $this->usuarios->listarProtocolos();
						break;
					case URL_USUARIO_CAPACITACION_VIDEOS:
						$videos = array(
									"https://www.youtube.com/embed/mOE8Y5EHRCg",
									"https://www.youtube.com/embed/ULHqCSwlWQQ",
									"https://www.youtube.com/embed/vbNEz-TchQE",									
									"https://www.youtube.com/embed/-mJnu6UGJk4"
									);
						break;
					case URL_USUARIO_CAPACITACION_VIDEOS_NEGOCIO:
						$url_tutorial_compra = "//www.slideshare.net/slideshow/embed_code/key/oZaYlOeUC72KC8";
						break;
					
					default:
						break;
				}

			}*/
		
			include "views/usuario_capacitacion.php";

		}else{
			header("Location: ".URL_SITIO);
		}
	}

	public function usuarioDocumentos(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_DOCUMENTOS;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);

		if (isset($_POST["crearDocumento"])) {

			$nombre = $_POST["nombre"];
			
			//Upload foto
			if($_FILES["documento"]["error"]==UPLOAD_ERR_OK){

				$rutadoc=$_FILES["documento"]["tmp_name"];
				$nombredoc=$_FILES["documento"]["name"];
				$destinodoc = DIR_IMG_DOCUMENTOS.$_SESSION["idusuario"].$nombredoc;
				move_uploaded_file($rutadoc, $destinodoc);

			}else{
				$destinodoc = "";
			}

			$iddocumento = $this->usuarios->crearDocumento($_SESSION["idusuario"], $nombre, $destinodoc);
		}

		if (isset($_GET["eliminarDocumento"]) && !empty($_GET["eliminarDocumento"])) {
			
			$this->usuarios->eliminarDocumento($_GET["eliminarDocumento"]);
		}

		$documentos = $this->usuarios->listarDocumentos($_SESSION["idusuario"]);

		include "views/usuario_documentos.php";
	}

	public function usuarioPuntos(){
		
		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_PUNTOS;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);		

		if (!empty($_SESSION["idusuario"])) {

			$total_puntos = 0;
			$total_redimidos = 0;
			$total_disponibles = 0;

			$estado_puntos = 1;
			
			$puntos = $this->usuarios->listarPuntosUsuario($_SESSION["idusuario"],$estado_puntos);

			if (count($puntos)>0) {

				$total_puntos = 0;
				$total_redimidos = 0;
				$total_disponibles = 0;

				foreach ($puntos as $key => $punto) {
					$puntos[$key]["disponibles"] = $punto["puntos"] - $punto["redimido"];

					$total_puntos += $punto["puntos"];
					$total_redimidos += $punto["redimido"];
					$total_disponibles += $puntos[$key]["disponibles"];
				}
			}
			
			include "views/usuario_puntos.php";

		}else{
			header("Location: ".URL_SITIO);
		}
	}

	public function usuarioComprar(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_COMPRAR;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);

		$usuario_canal = $this->usuarios->usuarioCanalDistribucion($_SESSION['idusuario']);

		$pagina_comprar = 32;

		if (count($usuario_canal)>0) {
			
			$canal = $this->canales_distribucion->detalleCanal($usuario_canal['canales_distribucion_idcanal']);

			if ($canal['nombre'] == 'DISTRIBUIDORES ESPECIALIZADOS') {
				
				$pagina_comprar = 35;

			}elseif ($canal['nombre'] == 'TIENDAS ESPECIALIZADAS'){

				$pagina_comprar = 36;
			}

		}

		$comprar = $this->paginas->detallePagina($pagina_comprar);

		include "views/usuario_comprar.php";
	}

	public function usuarioVentasVirtuales(){

		$paginas_menu = $this->paginasMenu();

		$moduloActual = URL_USUARIO_VENTAS_VIRTUALES;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);		

		$campanas = $this->campanas->listarCampanas();

		if (isset($_POST["idcampana"]) && !empty($_POST["idcampana"])) {

			$es_ano = substr($_POST["idcampana"], 0, 3);
			if ($es_ano=="ano") {
				$ano = substr($_POST["idcampana"], 3, 7);
				$campana_seleccionada = array('fecha_ini' => $ano.'-01-01', 'fecha_fin' => $ano.'-12-31');
			}else{
				$campana_seleccionada = $this->campanas->detalleCampana($_POST["idcampana"]);
			}			
			
		}else{
			$campana_seleccionada = $this->campanas->getCamapanaActual();
		}

		$ventas = $this->ventas_virtuales->listar_ventas($_SESSION['idusuario'], $campana_seleccionada["fecha_ini"], $campana_seleccionada["fecha_fin"]);

		include 'views/usuario_ventas_virtuales.php';
	}

	public function usuarioTickets(){
		
		$paginas_menu = $this->paginasMenu();
		$moduloActual = URL_USUARIO_TICKETS;
		$posicion_banners="PANEL INTERNO";
		$estados = array(1);
		$banners = $this->banners->listarBanners($posicion_banners, $estados);

		$tickets = $this->tickets->listarTickets($_SESSION["idusuario"]);			

		include "views/usuario_tickets.php";
	}

	public function usuarioNuevoTicket(){		
		
		$paginas_menu = $this->paginasMenu();
		$moduloActual = URL_USUARIO_TICKETS;
		$posicion_banners="PANEL INTERNO";
		$estados = array(1);
		$banners = $this->banners->listarBanners($posicion_banners, $estados);

		if (isset($_POST["crearTicket"])) {
			extract($_POST);

			$codigo_ticket = $this->tickets->generarCodTicket();

			$idticket = $this->tickets->crearTicket($codigo_ticket, $tipo, $descripcion, "ABIERTO", fecha_actual('datetime'), $_SESSION["idusuario"]);

			$this->usuarioTickets();
		}else{
			include "views/usuario_nuevo_ticket.php";		
		}		
	}

	public function usuarioDetalleTicket($idticket){
		$paginas_menu = $this->paginasMenu();
		$moduloActual = URL_USUARIO_TICKETS;
		$posicion_banners="PANEL INTERNO";
		$estados = array(1);
		$banners = $this->banners->listarBanners($posicion_banners, $estados);		

		if (isset($_POST["agregarMensaje"])) {
			$this->tickets->crearMensajeTicket($_POST['mensaje'], $emisor="CLIENTE", fecha_actual('datetime'), $idticket);
		}

		$ticket = $this->tickets->detalleTicket($idticket);
		$mensajes_ticket = $this->tickets->listarMensajesTickets($idticket);

		include "views/usuario_detalle_ticket.php";
	}

	public function usuarioReferir(){

		$paginas_menu = $this->paginasMenu();
		$moduloActual = URL_USUARIO_REFERIR;
		$posicion_banners="PANEL INTERNO";
		$estados = array(1);
		$banners = $this->banners->listarBanners($posicion_banners, $estados);	

		include "views/usuario_referir.php";
	}

	public function usuarioCerrarSesion(){

		//session_destroy();

		unset($_SESSION["idusuario"]);
		unset($_SESSION["nombre"]);
		unset($_SESSION["apellido"]);
		unset($_SESSION["email"]);
		unset($_SESSION["telefono"]);
		unset($_SESSION["telefono_m"]);
		unset($_SESSION["direccion"]);
		unset($_SESSION["ciudades_idciudad"]);
		unset($_SESSION["ciudad"]);
		unset($_SESSION["lider"]);
		unset($_SESSION["idorganizacion"]);
		unset($_SESSION["tipo"]);

		if (isset($_SESSION["idusuario_remoto"])) {

			unset($_SESSION["idusuario_remoto"]);
			unset($_SESSION["email_remoto"]);
			unset($_SESSION["nombre_remoto"]);
			unset($_SESSION["apellido_remoto"]);
			unset($_SESSION["tipo_remoto"]);
			
		}

		if (isset($_GET['return']) && !empty($_GET['return'])) {
			
			header('Location: '.URL_SITIO.$_GET['return']);

		}else{

			header("Location: ".URL_SITIO);
		}
		
	}

	public function personalCerrarSesion(){

		unset($_SESSION["admin"]);
		unset($_SESSION["admin_nombre"]);
		unset($_SESSION["admin_cargo"]);
		unset($_SESSION["admin_email"]);
		unset($_SESSION["admin_rol"]);	

		header("Location: ".URL_SITIO.URL_ADMIN);
	}

/*************CARRITO******************************/

	private function eliminarVariablesDropshipping(){

		unset($_SESSION['nombre_dp']);
		unset($_SESSION['email_dp']);
		unset($_SESSION['telefono_dp']);
		unset($_SESSION['telefono_m_dp']);
		unset($_SESSION['direccion_dp']);
		unset($_SESSION['idciudad_dp']);
		unset($_SESSION['ciudad_dp']);
	}
	
	public function verCarrito(){

		$paginas_menu = $this->paginasMenu();
		$ciudades = $this->listarCiudades();

		if (isset($_GET['modalidad']) && !empty($_GET['modalidad'])) {
			
			switch ($_GET['modalidad']) {
				
				case 1: //NORMAL. Despacho al distribuidor
					
					$_SESSION['modalidad_compra'] = 'NORMAL';
					$this->eliminarVariablesDropshipping();
					break;

				case 2: //DROPSHIPPING. Despacho al cliente del distribuidor
					
					$_SESSION['modalidad_compra'] = 'DROPSHIPPING';

					break;
			}

		}else{

			if (!isset($_SESSION['modalidad_compra'])) {
				
				$_SESSION['modalidad_compra'] = 'NORMAL';
				$this->eliminarVariablesDropshipping();
			}
		}

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

				}
			}
		}

		if (isset($_POST["guardarDropshipping"])) {

			extract($_POST);

			$_SESSION['modalidad_compra'] = 'DROPSHIPPING';

			$_SESSION['nombre_dp'] = $nombre_dp;
			$_SESSION['email_dp'] = $email_dp;
			$_SESSION['telefono_dp'] = $telefono_dp;
			$_SESSION['telefono_m_dp'] = $telefono_m_dp;
			$_SESSION['direccion_dp'] = $direccion_dp;
			$_SESSION['idciudad_dp'] = $ciudad_dp;
			$ciudad_info = $this->usuarios->nombreCiudad($ciudad_dp);
			$_SESSION['ciudad_dp'] = $ciudad_info['ciudad'];
		}


		if (isset($_POST["usar_puntos"]) && $_POST["usar_puntos"]==1) {
			$_SESSION["usar_puntos"] = true;
		}

		if (isset($_POST["usar_puntos"]) && $_POST["usar_puntos"]==0) {
			$_SESSION["usar_puntos"] = false;
		}


		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"])) {

			$puntos_disponibles = $this->usuarios->puntosDisponibles($_SESSION["idusuario"]);

		}else{
			$puntos_disponibles = 0;
		}

		if ($_SESSION['modalidad_compra'] == 'DROPSHIPPING') {

			//Fijar el porcentaje de descuento escala al 20%
			Carrito::$porc_descuento_escala = 20;
			Carrito::$modalidad_compra = 'DROPSHIPPING';
		}


		$itemsCarrito = $this->carrito->listarItems();
		$subtotalAntesIva = $this->carrito->getSubtotalAntesIva();
		$subtotalAntesIvaPremios = $this->carrito->getSubtotalAntesIvaPremios();
		$descuentoCupon = $this->carrito->getDescuentoCupon();
		$subtotalNetoAntesIva = $this->carrito->getSubtotalNetoAntesIva();
		$descuentoEscala = $this->carrito->getDescuentoEscala();
		$porcDescuentoEscala = $this->carrito->porcDescuentoEscala();
		$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva();
		$retencion = $this->carrito->getRTF();
		$pagoPuntos = $this->carrito->getPagoPuntos();
		$iva = $this->carrito->getIva();		
		$flete = $this->carrito->calcularFlete();
		$total = $this->carrito->getTotal();		
		$rentabilidad = $this->carrito->getRentabilidad();

		$campana_actual = $this->campanas->getCamapanaActual();

		if ($_SESSION['modalidad_compra'] != 'DROPSHIPPING') {
			
			if ($campana_actual["monto_minimo"]>$subtotalNetoAntesIva) {
				
				$alerta = 'El pedido no cumple con el monto mínimo, por favor agrega más productos. Si no eres un distribuidor por favor da clic <a href="'.URL_SITIO.URL_CLUB.'">aquí.</a>';
			}
		}

		include "views/carrito.php";
	}

	public function verResumenCompra(){

		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"])) {
			
			$paginas_menu = $this->paginasMenu();

			if ($_SESSION['modalidad_compra'] == 'DROPSHIPPING') {

				//Fijar el porcentaje de descuento escala al 20%
				Carrito::$porc_descuento_escala = 20;
				Carrito::$modalidad_compra = 'DROPSHIPPING';
			}

			$credito = false;

			$credito = $this->usuarios->detalleCredito($_SESSION["idusuario"]);

			$itemsCarrito = $this->carrito->listarItems();
			$subtotalAntesIva = $this->carrito->getSubtotalAntesIva();
			$subtotalAntesIvaPremios = $this->carrito->getSubtotalAntesIvaPremios();
			$descuentoCupon = $this->carrito->getDescuentoCupon();
			$subtotalNetoAntesIva = $this->carrito->getSubtotalNetoAntesIva();

			$descuentoEscala = $this->carrito->getDescuentoEscala();
			$porcDescuentoEscala = $this->carrito->porcDescuentoEscala();
			$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva();

			$retencion = $this->carrito->getRTF();
			$pagoPuntos = $this->carrito->getPagoPuntos();

			$iva = $this->carrito->getIva();
			$flete = $this->carrito->calcularFlete();
			$total = $this->carrito->getTotal();
			$rentabilidad = $this->carrito->getRentabilidad();

			$campana_actual = $this->campanas->getCamapanaActual();

			$alerta = "Valida tu pedido, si esta correcto da clic en FINALIZAR COMPRA para ir a pagar. Luego podras escoger el medio de pago que mas te convenga";

			include "views/resumen_compra.php";

		}else{
			header("Location: ".URL_INGRESAR);
		}
		
	}

	public function generarOrden(){

		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"]) && count($_SESSION["idpdts"])>0 && count($_SESSION["cantidadpdts"])>0) {

			if ($_SESSION['modalidad_compra'] == 'DROPSHIPPING') {

				//Fijar el porcentaje de descuento escala al 20%
				Carrito::$porc_descuento_escala = 20;
				Carrito::$modalidad_compra = 'DROPSHIPPING';
			}

			$codigo_orden = $this->carrito->generarCodOrden();
			$fecha_pedido = fecha_actual("date");
			$subtotalAntesIva = $this->carrito->getSubtotalAntesIva();
			$subtotalAntesIvaPremios = $this->carrito->getSubtotalAntesIvaPremios();
			$descuentoCupon = $this->carrito->getDescuentoCupon();
			$descuentoEscala = $this->carrito->getDescuentoEscala();
			$porcDescuentoEscala = $this->carrito->porcDescuentoEscala();
			$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva();
			$retencion = $this->carrito->getRTF();
			$detalleOrden = $this->carrito->getDetalleOrden();
			
			$pagoPuntos = $this->carrito->getPagoPuntos();		
			
			$iva = $this->carrito->getIva();
			$flete = $this->carrito->calcularFlete();
			$total = $this->carrito->getTotal();
			$estado = "PENDIENTE";
			$fecha_facturacion = "0000-00-00";
			$num_factura = "";

			//Descontar puntos usuario
			if ($pagoPuntos['puntos'] > 0) {
				
				$this->puntos->descontarPuntos($pagoPuntos['puntos'], $_SESSION['idusuario']);
			}
						
			//Crear Orden
			$idorden = $this->carrito->generarOrden($codigo_orden, $fecha_pedido, $subtotalAntesIva, $subtotalAntesIvaPremios, $descuentoCupon, $porcDescuentoEscala, $descuentoEscala, $totalNetoAntesIva, $iva, $retencion, $pagoPuntos["puntos"], $pagoPuntos["valor_punto"], $flete, $total, $estado, $fecha_facturacion, $num_factura, $_SESSION["idusuario"]);

			if ($idorden) {

				//Registrar dirección para dropshipping
				if ($_SESSION['modalidad_compra'] == 'DROPSHIPPING') {

					$iddireccion = $this->carrito->registrar_direccion_orden($idorden, $_SESSION['nombre_dp'], $_SESSION['direccion_dp'], $_SESSION['idciudad_dp'], $_SESSION['telefono_dp'], $_SESSION['telefono_m_dp'], $_SESSION['email_dp']);
				}
				
				//Cargar Nuevos Puntos
				$valor_punto = 1;
				$fecha_adquirido = fecha_actual('datetime');
				$redimido = 0;
				$estado_puntos = 0;

				$nuevos_puntos = $totalNetoAntesIva*($valor_punto/100);
				$idnuevospuntos = $this->usuarios->asignarNuevosPuntos($nuevos_puntos, "COMPRAS", $fecha_adquirido, $redimido, $estado_puntos, $_SESSION["idusuario"], $idorden);


				$usuario = $this->usuarios->detalleUsuario($_SESSION["idusuario"]);				
				$referente = $usuario["referente"];

				if ($referente) {
					//Abonar puntos a referente
					$idnuevospuntos_referente = $this->usuarios->asignarNuevosPuntos($nuevos_puntos, "COMPRA DE REFERIDO ".$usuario["nombre"], $fecha_adquirido, $redimido, $estado_puntos, $referente, $idorden);
				}

				//Registrar detalle de orden
				if (count($detalleOrden)>0) {
					foreach ($detalleOrden as $key => $producto) {

						//Descontar stock
						$filas = $this->productos->descontarStock($producto["idpdt"],$producto["cantidad"]);

						//Agregar detalle orden
						$id_detalle_orden = $this->carrito->agregarDetalleOrden($producto["nombre"], $producto["codigo"], $producto["cantidad"], $producto["precio"], $producto["precio_base"], $producto["descuento_cupon"], $producto["iva"], $producto["descuento_puntos"], $idorden);
					}
				}


				//Enviar Email Orden
				$tabla_orden = '<table cellspacing="10" border="0" width="650px" align="center">
						<thead>
							<tr>
								<th align="center">DESCRIPCIÓN</th>
								<th align="center">PRECIO</th>
								<th align="center">CANTIDAD</th>
								<th align="right">SUBTOTAL</th>
							</tr>
						</thead>
						<tbody>';

				if (count($detalleOrden)>0) {
					foreach ($detalleOrden as $key => $producto) {
						$tabla_orden .= '<tr><td>'.$producto["nombre"].'<br>'.$producto["codigo"].'<br>'.$producto["iva_porc"].'%</td>
								<td>$'.number_format($producto["precio"]).'</td>
								<td align="center">'.$producto["cantidad"].'</td>
								<td align="right">$'.number_format($producto["subtotal"]).'</td></tr>';
					}
				}
				
				$tabla_orden .='<tr><td colspan="3" align="right">Subtotal antes de IVA</td>
								<td align="right">$'.number_format($subtotalAntesIva).'</td></tr>
							<tr><td colspan="3" align="right">Descuento Cupón</td>
								<td align="right">$'.number_format($descuentoCupon).'</td></tr>
							<tr><td colspan="3" align="right">Subtotal Neto Antes de Iva</td>
								<td align="right">$'.number_format(($subtotalAntesIva-$descuentoCupon)).'</td></tr>
							<tr><td colspan="3" align="right">Descuento por Escala %</td>
								<td align="right">'.$porcDescuentoEscala.'%</td></tr>
							<tr><td colspan="3" align="right">Descuento por Escala $</td>
								<td align="right">$'.number_format($descuentoEscala).'</td></tr>
							<tr><td colspan="3" align="right">Total Neto antes de IVA</td>
								<td align="right">$'.number_format($totalNetoAntesIva).'</td></tr>
							<tr><td colspan="3" align="right">Retención</td>
								<td align="right">$'.number_format($retencion).'</td></tr>
							<tr><td colspan="3" align="right">IVA</td>
								<td align="right">$'.number_format($iva).'</td></tr>
							<tr><td colspan="3" align="right">Pago con puntos</td>
								<td align="right">$'.number_format($pagoPuntos["valor_pago"]).'</td></tr>
							<tr><td colspan="3" align="right">Costo de Envío</td>
								<td align="right">$'.number_format($flete).'</td></tr>
							<tr><td colspan="3" align="right"><b>TOTAL A PAGAR</b></td>
								<td align="right"><b>$'.number_format($total).'</b></td></tr>
						</tbody>
					</table>';

				
				
				$idplantilla=1;
				$plantilla = $this->usuarios->detallePlantilla($idplantilla);
				$mensaje = shorcodes_orden_compra($_SESSION["nombre"]." ".$_SESSION["apellido"],$codigo_orden,$plantilla["mensaje"],$tabla_orden,$estado);
				
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0"."\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

				// More headers
				$headers .= 'From: Piudali <'.$plantilla["email"].'>'."\r\n";

				$mail = mail($_SESSION["email"], $plantilla["asunto"], $mensaje, $headers);


				if (isset($_GET['method']) && !empty($_GET['method'])) {

					switch ($_GET['method']) {
						
						case 'credito':
							
							$credito = $this->usuarios->detalleCredito($_SESSION["idusuario"]);

							if (count($credito)>0) {
	 				
				 				if ($credito['cupo_disponible'] >= $total) {
				 					

				 					$cupo_asignado = $credito['cupo_asignado'];
				 					$cupo_disponible = $credito['cupo_disponible'];
				 					$cupo_usado = $credito['cupo_usado'];
				 					$plazo_dias = $credito['plazo'];

				 					$cupo_usado += $total;
				 					$cupo_disponible -= $total;

				 					$filas = $this->usuarios->actualizarCredito($credito['idcredito'], $cupo_asignado, $cupo_usado, $cupo_disponible, $plazo);

				 					if ($filas) {

				 						$estado = 'PENDIENTE';
				 						$currency = 'COP';
				 						$metodo = 'Crédito';
				 						
				 						include 'views/respuesta_pago_credito.php';

				 					}else{

				 						header("Location: ".URL_SITIO);

				 					}

				 				}else{

				 					header("Location: ".URL_SITIO);
				 				}

				 			}else{

				 				header("Location: ".URL_SITIO);
				 			}

							break;
						
						default:

							/****PAGO CON PAYU****/

							//Variables Pago Payu
							$merchantId = 502548;
							$ApiKey = "28tuaar72n6g65ervovdl1sst";
							$referenceCode = $codigo_orden;
							$description = "COMPRA PRODUCTOS PIUDALI";
							$currency = "COP";
							$buyerEmail = $_SESSION["email"];
							$amount = round($total);
							$tax = round($iva);
							if ($iva == 0) {
								$taxReturnBase = 0;
							}else{
								$taxReturnBase = round($totalNetoAntesIva-$pagoPuntos["valor_pago"]);
							}
							$lng = "ES";

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
							$extra3 = "PIUDALI";
							$responseUrl = "http://naturalvitalis.com/respagos.php";
							$signature=md5($ApiKey."~".$merchantId."~".$referenceCode."~".$amount."~COP");

							require "include/pago_payu.php";

						break;
					}					

					unset($_SESSION["idpdts"]);
					unset($_SESSION["cantidadpdts"]);

				}else{

					header("Location: ".URL_SITIO);

				}
			}
			
		}else{
			header("Location: ".URL_INGRESAR);
		}
	}


	public function agregarPdtCarrito(){

		if (isset($_POST["idpdt"]) && isset($_POST["cantidad"])) {
		
			$idpdt = $_POST["idpdt"];
			$cantidad = $_POST["cantidad"];

			if (in_array($idpdt, $_SESSION["idpdts"])) {
				
				$clave = array_search($idpdt, $_SESSION["idpdts"]);
				$_SESSION["cantidadpdts"][$clave] = $_SESSION["cantidadpdts"][$clave] + $cantidad;

			}else{

				$_SESSION["idpdts"][] = $idpdt;
				$_SESSION["cantidadpdts"][] = $cantidad;
			}

			$total = $this->carrito->getTotal();
			$cantidad = $this->carrito->productosAgregados();

			$return = array('total' => number_format($total), 'cantidad' => $cantidad);
			echo json_encode($return);
		}
	}

	public function actualizarCantidadPdt(){

		if (isset($_POST["idpdt"]) && isset($_POST["cantidad"])) {
		
			$idpdt = $_POST["idpdt"];
			$cantidad = $_POST["cantidad"];

			if (in_array($idpdt, $_SESSION["idpdts"])) {
				
				$clave = array_search($idpdt, $_SESSION["idpdts"]);
				$_SESSION["cantidadpdts"][$clave] = $cantidad;

				echo "OK";
			}			
		}
	}

	public function eliminarPdtCarrito(){

		if (isset($_POST["idpdt"]) && !empty($_POST["idpdt"])) {

			$idpdt = $_POST["idpdt"];

			if (in_array($idpdt, $_SESSION["idpdts"])) {

				$clave = array_search($idpdt, $_SESSION["idpdts"]);
				unset($_SESSION["cantidadpdts"][$clave]);
				unset($_SESSION["idpdts"][$clave]);

				echo "OK";
			}
		}
	}


/**************************** ADMIN ***********************************/

	public function adminExportData($modulo){
		switch ($modulo) {
			case URL_ADMIN_USUARIOS:
				$usuarios = $this->usuarios->listarUsuarios();
				/** Include PHPExcel */
				require_once 'include/PHPExcel/Classes/PHPExcel.php';

				// Create new PHPExcel object
				$objPHPExcel = new PHPExcel();

				// Set document properties
				$objPHPExcel->getProperties()->setCreator("Piudali")
											 ->setLastModifiedBy("Piudali")
											 ->setTitle("Usuarios Piudali")
											 ->setSubject("Usuarios Piudali")
											 ->setDescription("Usuarios Piudali")
											 ->setKeywords("")
											 ->setCategory("");


				$columnas = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

				$columnasdata = count($usuarios[0]);
				$nombrecolumnas = array_keys($usuarios[0]);

				foreach ($usuarios as $key => $usuario) {
					
					$fila = $key+1;

					for ($i=0; $i < $columnasdata ; $i++) { 
						$objPHPExcel->setActiveSheetIndex(0)
				            ->setCellValue($columnas[$i].$fila, $usuario[$nombrecolumnas[$i]]);
				            
					}
				}

				// Miscellaneous glyphs, UTF-8
				/*$objPHPExcel->setActiveSheetIndex(0)
				            ->setCellValue('A4', 'Miscellaneous glyphs')
				            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');*/

				// Rename worksheet
				//$objPHPExcel->getActiveSheet()->setTitle('Simple');


				// Set active sheet index to the first sheet, so Excel opens this as the first sheet
				$objPHPExcel->setActiveSheetIndex(0);


				// Redirect output to a client’s web browser (Excel5)
				header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment;filename="Usuarios.xls"');
				header('Cache-Control: max-age=0');
				// If you're serving to IE 9, then the following may be needed
				header('Cache-Control: max-age=1');

				// If you're serving to IE over SSL, then the following may be needed
				header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
				header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
				header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
				header ('Pragma: public'); // HTTP/1.0

				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
				$objWriter->save('php://output');
				exit;

				break;
			
			default:
				# code...
				break;
		}
	}

	public function adminLoguin(){

		if (isset($_POST["ingresarAdmin"])) {
			$email = $_POST["email"];
			$password = md5($_POST["password"]);

			$admin = $this->usuarios->loguearPersonal($email, $password);			

			if (count($admin)>0) {
				
				$_SESSION["admin"] = true;
				$_SESSION["admin_nombre"] = $admin["nombre"];
				$_SESSION["admin_cargo"] = $admin["cargo"];
				$_SESSION["admin_email"] = $admin["usuario"];
				$_SESSION["admin_rol"] = $admin["rol"];
				header("Location: ".URL_ADMIN."/".URL_ADMIN_INICIO);
			}else{
				
			}
		}

		include "views/admin/ingresar.php";
	}

	public function adminInicio(){

		if ($_SESSION["admin"]) {
			include "views/admin/inicio.php";	
		}		
	}

	/***productos***/

	public function adminProductoDetalle($idproducto){

		$categorias = $this->productos->listarCategorias();

		if (isset($_POST["actualizarProducto"])) {
			//Upload foto
			if($_FILES["img_principal"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["img_principal"]["tmp_name"];
				$nombreimg=$_FILES["img_principal"]["name"];
				$destino = DIR_IMG_PRODUCTOS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			if ($_POST["aplica_cupon"]==1) {
				$aplica_cupon = 1;
			}else{
				$aplica_cupon = 0;
			}

			$nombre = $_POST["nombre"];
			$codigo = $_POST["codigo"];
			$tipo = $_POST["tipo"];
			$categoria = $_POST["categoria"];
			$compania = $_POST["compania"];
			$relevancia = $_POST["relevancia"];
			$img_principal = $destino;
			$registro = $_POST["registro"];
			$cantidad = $_POST["cantidad"];
			$costo = $_POST["costo"];
			$precio = $_POST["precio"];
			$precio_oferta = $_POST["precio_oferta"];
			$iva = $_POST["iva"];			
			$presentacion = $_POST["presentacion"];
			$descripcion = $_POST["descripcion"];
			$uso = $_POST["uso"];
			$mas_info = $_POST["mas_info"];
			$metas = $_POST["metas"];
			$estado = $_POST["estado"];

			$url = convierte_url($_POST["nombre"]);

			$producto_url_homonimia = $this->productos->detalleProductos(0,$url);

			if (count($producto_url_homonimia)>0) {				
				$count = 2;			

				while (count($producto_url_homonimia)!=0) {
					$url = convierte_url($_POST["nombre"])."-".$count;
					$producto_url_homonimia = $this->productos->detalleProductos(0,$url);					
					$count++;
				}
			}

			//Upload img secundaria
			if($_FILES["img_publicitaria"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["img_publicitaria"]["tmp_name"];
				$nombreimg=$_FILES["img_publicitaria"]["name"];
				$extimg=$_FILES["img_publicitaria"]["type"];
				$destino = DIR_IMG_PRODUCTOS_PIEZAS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

				$this->productos->crearImg($destino, $idproducto, $extimg);
			}

			$this->productos->actualizarProducto($idproducto,$nombre,$cantidad,$costo,$precio,$iva,$aplica_cupon,$precio_oferta,$presentacion,$registro,$codigo,$tipo,$descripcion,$img_principal,$url,$estado,$uso,$mas_info,$metas,$categoria,$compania,$relevancia);
		}

		if (isset($_POST["crearProducto"])) {

			//Upload foto
			if($_FILES["img_principal"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["img_principal"]["tmp_name"];
				$nombreimg=$_FILES["img_principal"]["name"];
				$destino = DIR_IMG_PRODUCTOS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			if ($_POST["aplica_cupon"]==1) {
				$aplica_cupon = 1;
			}else{
				$aplica_cupon = 0;
			}

			$nombre = $_POST["nombre"];
			$codigo = $_POST["codigo"];
			$tipo = $_POST["tipo"];
			$categoria = $_POST["categoria"];
			$compania = $_POST["compania"];
			$relevancia = $_POST["relevancia"];
			$img_principal = $destino;
			$registro = $_POST["registro"];
			$cantidad = $_POST["cantidad"];
			$costo = $_POST["costo"];
			$precio = $_POST["precio"];
			$precio_oferta = $_POST["precio_oferta"];
			$iva = $_POST["iva"];			
			$presentacion = $_POST["presentacion"];
			$descripcion = $_POST["descripcion"];
			$uso = $_POST["uso"];
			$mas_info = $_POST["mas_info"];
			$metas = $_POST["metas"];
			$estado = $_POST["estado"];

			$url = convierte_url($_POST["nombre"]);

			$producto_url_homonimia = $this->productos->detalleProductos(0,$url);

			if (count($producto_url_homonimia)>0) {				
				$count = 2;			

				while (count($producto_url_homonimia)!=0) {
					$url = convierte_url($_POST["nombre"])."-".$count;
					$producto_url_homonimia = $this->productos->detalleProductos(0,$url);					
					$count++;
				}
			}

			$idproducto = $this->productos->crearProducto($nombre,$cantidad,$costo,$precio,$iva,$aplica_cupon,$precio_oferta,$presentacion,$registro,$codigo,$tipo,$descripcion,$img_principal,$url,$estado,$uso,$mas_info,$metas,$categoria,$compania,$relevancia);
		}

		if (isset($idproducto) && $idproducto!='') {
			$producto = $this->productos->detalleProductos($idproducto,"");
			$producto_imgs = $this->productos->listarImgs($idproducto);
		}

		include "views/admin/producto_detalle.php";
	}

	public function adminProductosLista(){

		$tipos = array('NORMAL','PREMIO','PROMOCION', 'CLUB PIUDALI');
		$estados = array(1,0);
		
		$productosLista = $this->productos->listarProductos($tipos, $estados);

		include "views/admin/productos_lista.php";
	}

	/**Organizaciones***/

	public function adminOrganizacionesLista(){
		
		$organizaciones = $this->organizaciones->listarOrganizaciones();

		include "views/admin/organizaciones_lista.php";
	}

	public function adminOrganizacionDetalle($idorganizacion){

		$ciudades = $this->listarCiudades();

		if (isset($_POST["actualizarOrganizacion"])) {
			
			extract($_POST);

			$this->organizaciones->actualizarOrganizacion($idorganizacion,$nit,$razon_social,$direccion,$telefono,$idciudad);

		}

		if (isset($_POST["crearOrganizacion"])) {
			
			extract($_POST);

			$idorganizacion = $this->organizaciones->crearOrganizacion($nit,$razon_social,$direccion,$telefono,$idciudad);
		}


		if (isset($idorganizacion) && $idorganizacion!='') {

			$organizacion = $this->organizaciones->detalleOrganizacion($idorganizacion);
		}

		include "views/admin/organizacion_detalle.php";

	}

	/**SUCURSALES**/

	public function adminSucursalesLista(){
		
		$sucursales = $this->sucursales->listarSucursales();

		include "views/admin/sucursales_lista.php";
	}

	public function adminSucursalDetalle($idsucursal){

		$ciudades = $this->listarCiudades();
		$organizaciones = $this->organizaciones->listarOrganizaciones();

		if (isset($_POST["actualizarSucursal"])) {
			
			extract($_POST);

			//Upload imagen
			if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["imagen"]["tmp_name"];
				$nombreimg=$_FILES["imagen"]["name"];
				$destino = DIR_IMG_SUCURSALES.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$this->sucursales->actualizarSucursal($idsucursal, $nombre, $direccion, $telefono, $email, $pagina_web, $destino, $idorganizacion, $idciudad);
		}

		if (isset($_POST["crearSucursal"])) {
			
			extract($_POST);

			//Upload imagen
			if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["imagen"]["tmp_name"];
				$nombreimg=$_FILES["imagen"]["name"];
				$destino = DIR_IMG_SUCURSALES.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$idsucursal = $this->sucursales->crearSucursal($nombre, $direccion, $telefono, $email, $pagina_web, $destino, $idorganizacion, $idciudad);
		}


		if (isset($idsucursal) && $idsucursal!='') {

			$sucursal = $this->sucursales->detalleSucursal($idsucursal);
		}

		include "views/admin/sucursal_detalle.php";

	}

	/***Productos Aliados**/

	public function adminProductosAliadosLista(){
		
		$productos = $this->productos_aliados->listarProductos();

		include "views/admin/productos_aliados_lista.php";
	}

	public function adminProductoAliadoDetalle($idproducto){

		$organizaciones = $this->organizaciones->listarOrganizaciones();

		if (isset($_POST["actualizarProducto"])) {
			
			extract($_POST);

			//Upload foto
			if($_FILES["img_principal"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["img_principal"]["tmp_name"];
				$nombreimg=$_FILES["img_principal"]["name"];
				$destino = DIR_IMG_PRODUCTOS_ALIADOS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$url = convierte_url($nombre);

			$this->productos_aliados->actualizarProducto($idproducto, $nombre, $url, $destino, $descripcion, $mas_info, $estado, $idorganizacion);

		}

		if (isset($_POST["crearProducto"])) {
			
			extract($_POST);

			//Upload foto
			if($_FILES["img_principal"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["img_principal"]["tmp_name"];
				$nombreimg=$_FILES["img_principal"]["name"];
				$destino = DIR_IMG_PRODUCTOS_ALIADOS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$url = convierte_url($nombre);

			$idproducto = $this->productos_aliados->crearProducto($nombre, $url, $destino, $descripcion, $mas_info, $estado, $idorganizacion);
		}


		if (isset($idproducto) && $idproducto!='') {

			$producto = $this->productos_aliados->detalleProducto($idproducto);
		}

		include "views/admin/producto_aliado_detalle.php";

	}

	/***paginas***/

	public function adminPaginaDetalle($idpagina){		

		if (isset($_POST["actualizarPagina"])) {
			//Upload banner
			if($_FILES["banner"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["banner"]["tmp_name"];
				$nombreimg=$_FILES["banner"]["name"];
				$destino = DIR_IMG_PAGINAS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$titulo = $_POST["titulo"];			
			$contenido = $_POST["contenido"];
			$posicion = $_POST["posicion"];
			$banner = $destino;
			$menu = $_POST["menu"];
			$estado = $_POST["estado"];	

			$url = convierte_url($_POST["url"]);		

			$this->paginas->actualizarPagina($idpagina,$titulo,$url,$contenido,$posicion,$banner,$menu,$estado);

		}

		if (isset($_POST["crearPagina"])) {
			//Upload banner
			if($_FILES["banner"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["banner"]["tmp_name"];
				$nombreimg=$_FILES["banner"]["name"];
				$destino = DIR_IMG_PAGINAS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$titulo = $_POST["titulo"];			
			$contenido = $_POST["contenido"];
			$posicion = $_POST["posicion"];
			$banner = $destino;
			$menu = $_POST["menu"];
			$estado = $_POST["estado"];

			$url = convierte_url($_POST["url"]);

			$idpagina = $this->paginas->crearPagina($titulo,$url,$contenido,$posicion,$banner,$menu,$estado);
		}


		if (isset($idpagina) && $idpagina!='') {
			$pagina = $this->paginas->detallePagina($idpagina);
		}

		include "views/admin/pagina_detalle.php";

	}

	public function adminPaginasLista(){
		
		$paginasLista = $this->paginas->listarPaginas(array(0,1));

		include "views/admin/paginas_lista.php";	
	}	

	/****entradas***/

	public function adminEntradaDetalle($identrada){

		if (isset($_POST["actualizarEntrada"])) {

			extract($_POST);

			if ($tipo == 'IMAGEN') {
			
				//Upload banner
				if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){

					$rutaimg=$_FILES["imagen"]["tmp_name"];
					$nombreimg=$_FILES["imagen"]["name"];
					$destino = DIR_IMG_ENTRADAS.$nombreimg;
					move_uploaded_file($rutaimg, $destino);

				}else{

					$destino = "";
				}

				$ruta = $destino;

			}else{

				$ruta = $url_video;

			}
			
			$url = convierte_url($titulo);

			$this->entradas->actualizarEntrada($titulo,$contenido,$url,$tipo,$ruta,$estado,$identrada);
		}

		if (isset($_POST["crearEntrada"])) {
			
			extract($_POST);

			if ($tipo == 'IMAGEN') {
			
				//Upload banner
				if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){

					$rutaimg=$_FILES["imagen"]["tmp_name"];
					$nombreimg=$_FILES["imagen"]["name"];
					$destino = DIR_IMG_ENTRADAS.$nombreimg;
					move_uploaded_file($rutaimg, $destino);

				}else{

					$destino = "";
				}

				$ruta = $destino;

			}else{

				$ruta = $url_video;

			}
			
			$url = convierte_url($titulo);


			$identrada = $this->entradas->crearEntrada($titulo,$contenido,$url,$tipo,$ruta,$estado);
		}


		if (isset($identrada) && $identrada!='') {

			$entrada = $this->entradas->detalleEntrada($identrada);
		}

		include "views/admin/entrada_detalle.php";

	}

	public function adminEntradasLista(){
		
		$entradas = $this->entradas->listarEntradas(array(0,1));

		include "views/admin/entradas_lista.php";
	}

	/***banners***/

	public function adminBannersLista(){
		
		$posicion_banners = "";
		$estados = array(1,0) ;
		$bannersLista = $this->banners->listarBanners($posicion_banners, $estados);

		include "views/admin/banners_lista.php";	
	}

	public function adminBannerDetalle($idbanner){

		if (isset($_POST["actualizarBanner"])) {
			//Upload banner
			if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["imagen"]["tmp_name"];
				$nombreimg=$_FILES["imagen"]["name"];
				$destino = DIR_IMG_BANNERS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$nombre = $_POST["nombre"];			
			$link = $_POST["link"];
			$imagen = $destino;
			$posicion = $_POST["posicion"];
			$estado = $_POST["estado"];						

			$this->banners->actualizarBanner($idbanner,$nombre,$imagen,$link,$posicion,$estado);

		}

		if (isset($_POST["crearBanner"])) {
			//Upload banner
			if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["imagen"]["tmp_name"];
				$nombreimg=$_FILES["imagen"]["name"];
				$destino = DIR_IMG_BANNERS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$nombre = $_POST["nombre"];
			$link = $_POST["link"];
			$imagen = $destino;
			$posicion = $_POST["posicion"];
			$estado = $_POST["estado"];			

			$idbanner = $this->banners->crearBanner($nombre,$imagen,$link,$posicion,$estado);
		}


		if (isset($idbanner) && $idbanner!='') {
			$banner = $this->banners->detalleBanner($idbanner);
		}

		include "views/admin/banner_detalle.php";
	}

	/*****categorias******/

	public function adminCategoriasLista(){

		$categoriasLista = $this->productos->listarCategorias(0);

		include "views/admin/categorias_lista.php";	
	}

	public function adminCategoriaDetalle($idcategoria){

		if (isset($_POST["actualizarCategoria"])) {
			//Upload banner
			if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["imagen"]["tmp_name"];
				$nombreimg=$_FILES["imagen"]["name"];
				$destino = DIR_IMG_CATEGORIAS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$nombre = $_POST["nombre"];
			$imagen = $destino;			
			$estado = $_POST["estado"];			

			$url = convierte_url($nombre);

			$this->productos->actualizarCategoria($idcategoria,$nombre,$url,$imagen,$estado);

		}

		if (isset($_POST["crearCategoria"])) {
			//Upload banner
			if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["imagen"]["tmp_name"];
				$nombreimg=$_FILES["imagen"]["name"];
				$destino = DIR_IMG_CATEGORIAS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$nombre = $_POST["nombre"];
			$imagen = $destino;
			$estado = $_POST["estado"];

			$url = convierte_url($nombre);

			$idcategoria = $this->productos->crearCategoria($nombre,$url,$imagen,$estado);
		}

		if (isset($idcategoria) && $idcategoria!='') {
			$categoria = $this->productos->detalleCategoria($idcategoria);
		}

		include "views/admin/categoria_detalle.php";		
	}

	public function adminCampanasLista(){

		$campanasLista = $this->campanas->listarCampanas();

		include "views/admin/campanas_lista.php";	
	}

	public function adminCampanaDetalle($idcampana){

		extract($_POST);
		$fecha = fecha_actual("date");

		if (isset($_POST["actualizarCampana"])) {
			$this->campanas->actualizarCampana($idcampana, $nombre, $fecha_ini, $fecha_fin, $monto_minimo, $estado);
		}

		if (isset($_POST["crearCampana"])) {

			$idcampana = $this->campanas->crearCampana($nombre, $fecha_ini, $fecha_fin, $monto_minimo, $estado);
		}

		if (isset($minimo_d) && count($minimo_d)>0) {

			foreach ($minimo_d as $key => $value) {
				if (!empty($minimo_d[$key]) && !empty($maximo_d[$key]) && !empty($porcentaje_d[$key])) {
					$idescala = $this->campanas->crearEscalaDis($minimo_d[$key], $maximo_d[$key], $porcentaje_d[$key], $fecha, $idcampana);
				}
			}
		}

		if (isset($minimo_l) && count($minimo_l)>0) {

			foreach ($minimo_l as $key => $value) {
				if (!empty($minimo_l[$key]) && !empty($maximo_l[$key]) && !empty($porcentaje_l[$key])) {
					$idescala =	$this->campanas->crearEscalaLider($minimo_l[$key], $maximo_l[$key], $porcentaje_l[$key], $fecha, $idcampana);
				}
			}
		}

		if (isset($idcampana) && $idcampana!='') {
			$campana = $this->campanas->detalleCampana($idcampana);
			$escalas_dis = $this->campanas->listarEscalasDis($idcampana);
			$escalas_lider = $this->campanas->listarEscalasLider($idcampana);
		}

		include "views/admin/campana_detalle.php";		
	}

	/*****Descuentos Especiales****/
	public function adminDescuentosEspeciales(){

		$descuentos = $this->descuentos_especiales->listarDescuentos();

		include "views/admin/descuentos_especiales_lista.php";		
	}

	public function adminDescuentoEspecialDetalle($iddescuento){

		extract($_POST);

		if (isset($_POST["actualizarDescuento"])) {
			$this->descuentos_especiales->actualizarDescuento($iddescuento, $nombre, $monto_minimo, $estado);
		}

		if (isset($_POST["crearDescuento"])) {

			$iddescuento = $this->descuentos_especiales->crearDescuento($nombre, $monto_minimo, $estado);
		}

		if (isset($minimo) && count($minimo)>0) {

			foreach ($minimo as $key => $value) {
				if (!empty($maximo[$key]) && !empty($porcentaje[$key])) {
					$idescala = $this->descuentos_especiales->crearEscala($iddescuento, $minimo_[$key], $maximo[$key], $porcentaje[$key]);
				}
			}
		}

		if (isset($iddescuento) && !empty($iddescuento)) {

			$descuento = $this->descuentos_especiales->detalleDescuento($iddescuento);
			$escalas = $this->descuentos_especiales->listarEscalas($iddescuento);
			$usuarios = $this->descuentos_especiales->listarUsuarios($iddescuento);
			$distribuidores = $this->usuarios->listarUsuarios(array("DISTRIBUIDOR DIRECTO"));
		}

		include "views/admin/descuento_especial_detalle.php";		
	}

	public function adminDescuentoEspecialVincular(){

		if (isset($_POST["idusuario"]) && !empty($_POST["idusuario"]) && isset($_POST["iddescuento"]) && !empty($_POST["iddescuento"])) {
			
			$this->descuentos_especiales->vincularUsuario($_POST["idusuario"], $_POST["iddescuento"]);
			echo true;
		}
	}

	/*****Modelos de negocio Distribuidores*****/

	public function adminCanalesDistribucion(){

		$canales = $this->canales_distribucion->listarCanales();

		include 'views/admin/canales_distribucion_lista.php';
	}

	public function adminCanalDistribucionDetalle($idcanal){

		extract($_POST);

		if (isset($_POST["actualizarCanal"])) {

			$this->canales_distribucion->actualizarCanal($idcanal, $nombre, $monto_minimo, $comision, $puntos, $referidos, $incentivos, $premios, $promociones, $cupones, $escuela, $estado);
		}

		if (isset($_POST["crearCanal"])) {

			$idcanal = $this->canales_distribucion->crearCanal($nombre, $monto_minimo, $comision, $puntos, $referidos, $incentivos, $premios, $promociones, $cupones, $escuela, $estado);
		}

		if (isset($minimo) && count($minimo)>0) {

			foreach ($minimo as $key => $value) {
				if (!empty($maximo[$key]) && !empty($porcentaje[$key])) {
					$idescala = $this->canales_distribucion->crearEscala($idcanal, $minimo[$key], $maximo[$key], $porcentaje[$key]);
				}
			}
		}



		if (isset($idcanal) && !empty($idcanal)) {
			
			$canal = $this->canales_distribucion->detalleCanal($idcanal);
			$escalas = $this->canales_distribucion->listarEscalas($idcanal);
			$usuarios = $this->canales_distribucion->listarUsuarios($idcanal);

			$usuarios_con_canal_asignado = $this->canales_distribucion->listarUsuarios();
			
			$distribuidores = $this->usuarios->listarUsuarios(array("DISTRIBUIDOR DIRECTO"));
		}

		include 'views/admin/canal_distribucion_detalle.php';
	}

	public function adminCanalDistribucionVincular(){

		if (isset($_POST["idusuario"]) && !empty($_POST["idusuario"]) && isset($_POST["idcanal"]) && !empty($_POST["idcanal"])) {
			
			$this->canales_distribucion->vincularUsuario($_POST["idusuario"], $_POST["idcanal"]);

			echo true;
		}
	}

	public function adminCanalDistribucionEliminar(){

		if (isset($_POST["idusuario"]) && !empty($_POST["idusuario"]) && isset($_POST["idcanal"]) && !empty($_POST["idcanal"])) {
			
			$this->canales_distribucion->eliminarUsuario($_POST["idusuario"], $_POST["idcanal"]);

			echo true;
		}
	}

	/*****Plantillas*****/

	public function adminPlantillasLista(){
		$plantillasLista = $this->usuarios->listarPlantillas();

		include "views/admin/plantillas_lista.php";	
	}

	public function adminPlantillaDetalle($idplantilla){

		if (isset($_POST["actualizarPlantilla"])) {
			extract($_POST);
			$this->usuarios->actualizarPlantilla($idplantilla, $titulo, $asunto, $mensaje, $email, $estado);
		}

		if (isset($idplantilla) && $idplantilla!='') {
			$plantilla = $this->usuarios->detallePlantilla($idplantilla);
		}

		include "views/admin/plantilla_detalle.php";
	}

	/******Usuarios****/

	public function adminUsuariosLista(){

		$usuariosLista = $this->usuarios->listarUsuarios();

		if (count($usuariosLista)>0) {
		
			foreach ($usuariosLista as $key => $usuario) {
				
				if (!empty($usuario['organizaciones_idorganizacion'])) {
					
					$usuariosLista[$key]['organizacion'] = $this->usuarios->detalleOrganizacionUsuario($usuario['organizaciones_idorganizacion']);

				}
			}
		}

		include "views/admin/usuarios_lista.php";
	}

	public function adminUsuarioNuevo(){

		extract($_POST);

		$lideres = 	$this->usuarios->listarUsuarios(array("REPRESENTANTE COMERCIAL"));
		$ciudades = $this->listarCiudades();

		if (isset($_POST["crearUsuario"])) {

			if ($password != $password2) {
				
				echo "<script>alert('Las contraseñas no coinciden'); window.history.back();</script>";

			}else{

				//Crear organización
				$idorganizacion = 0;

				if (!empty($nit) && !empty($razon_social) && !empty($ciudad_organizacion)) {
					

					$idorganizacion = $this->usuarios->crearOrganizacion($nit, strtoupper($razon_social), strtoupper($direccion_organizacion), $telefono_organizacion, $ciudad_organizacion);

				}

				//Crear usuario
			
				$idusuario = $this->usuarios->crearUsuario($nombre, $apellido, $sexo, $fecha_nacimiento, $email, md5($password), $num_identificacion, 0, 0, $direccion, $mapa, $telefono, $telefono_m, $tipo, $segmento, "", $estado, fecha_actual('datetime'), 0, $lider, $cod_lider, 0, $ciudad, $idorganizacion);

				if ($idusuario) {

					//Enviar email Bienvenida
					$idplantilla=2;
					$plantilla = $this->usuarios->detallePlantilla($idplantilla);
					$mensaje = shorcodes_registro_usuario($nombre." ".$apellido,$email,$password,$plantilla["mensaje"]);

					require_once 'include/PHPMailer-master/PHPMailerAutoload.php';

					
					$mail = new PHPMailer;					
					$mail->setFrom($plantilla["email"], "Piudali");					
					$mail->addAddress($email, $nombre." ".$apellido);				
					$mail->Subject = $plantilla["asunto"];					
					$mail->msgHTML($mensaje);					
					
					if (!$mail->send()) {
						//echo 'correo bienvenida NO';
					} else {
						//echo 'correo bienvenida OK';
					}			

					switch ($tipo) {

						case 'DISTRIBUIDOR DIRECTO':

							//Suscribir en Mailchimp						
							$suscribir = $this->mailchimp->suscribir('b8ebc5f9f4', $email, strtoupper($nombre), strtoupper($apellido), $idusuario, '', '', $num_identificacion, strtoupper($direccion), $telefono_m, $segmento, 1, fecha_actual('date'), $idorganizacion, 'DISTRIBUIDOR DIRECTO');
						

							break;

						case 'REPRESENTANTE COMERCIAL':
							
							//Suscribir en Mailchimp						
							$suscribir = $this->mailchimp->suscribir('ef24b7641d', $email, strtoupper($nombre), strtoupper($apellido), $idusuario, '', '', $num_identificacion, strtoupper($direccion), $telefono_m, $segmento, 1, fecha_actual('date'), $idorganizacion, 'REPRESENTANTE COMERCIAL');
							break;
						
						default:
							# code...
							break;
					}
					
				}
			}
		}

		include "views/admin/usuario_nuevo.php";
	}

	public function adminUsuarioDetalle($idusuario){

		extract($_POST);

		$cuenta = $this->cuentas_virtuales->consultarCuenta($idusuario);

		if (isset($_POST["crearMovimiento"])) {

			//Upload banner
			if($_FILES["adjunto"]["error"]==UPLOAD_ERR_OK){

				$rutaadj=$_FILES["adjunto"]["tmp_name"];
				$nombreadj=$_FILES["adjunto"]["name"];
				$destino = DIR_ADJUNTOS.$nombreadj;
				move_uploaded_file($rutaadj, $destino);

			}else{
				$destino = "";
			}

			if (empty($cuenta)) {
				//Crear cuenta
				$idcuenta = $this->cuentas_virtuales->crearCuenta(0, fecha_actual('datetime') ,$idusuario);
				$cuenta = $this->cuentas_virtuales->consultarCuenta($idusuario);
			}

			if ($tipo_movimiento == "NEGATIVO") {
				$monto = "-".$monto;	
			}

			$idmovimiento = $this->cuentas_virtuales->crearMovimiento($monto, $descripcion, $destino, $cuenta["idcuenta"], $idusuario);
		}

		if (isset($_POST['obsequiarPuntos']) && isset($idusuario) && !empty($idusuario)) {

			extract($_POST);

			$estado_puntos = 1;

			$this->usuarios->asignarNuevosPuntos($puntos, $concepto, fecha_actual('datetime'), 0, $estado_puntos, $idusuario, 0);
		}

		if (isset($_POST["crearUsuario"])) {

			if ($password != $password2) {
				
				echo "<script>alert('Las contraseñas no coinciden'); window.history.back();</script>";

			}else{
			
				$idusuario = $this->usuarios->crearUsuario($nombre, $apellido, $sexo, $fecha_nacimiento, $email, md5($password), $num_identificacion, 0, 0, $direccion, $mapa, $telefono, $telefono_m, $tipo, $segmento, "", $estado, fecha_actual('datetime'), 0, $lider, $cod_lider, 0, $ciudad, 0);

				if ($idusuario) {

					//Enviar email Bienvenida
					$idplantilla=2;
					$plantilla = $this->usuarios->detallePlantilla($idplantilla);
					$mensaje = shorcodes_registro_usuario($nombre." ".$apellido,$email,$password,$plantilla["mensaje"]);

					require_once 'include/PHPMailer-master/PHPMailerAutoload.php';

					
					$mail = new PHPMailer;					
					$mail->setFrom($plantilla["email"], "Piudali");					
					$mail->addAddress($email, $nombre." ".$apellido);				
					$mail->Subject = $plantilla["asunto"];					
					$mail->msgHTML($mensaje);					
					if (!$mail->send()) {				

					} else {					
					}			

					switch ($tipo) {

						case 'DISTRIBUIDOR DIRECTO':

							//Suscribir en Mailchimp						
							$suscribir = $this->mailchimp->suscribir('b8ebc5f9f4', $email, strtoupper($nombre), strtoupper($apellido), $idusuario, '', '', $num_identificacion, strtoupper($direccion), $telefono_m, $segmento, 1, fecha_actual('date'), $idorganizacion, 'DISTRIBUIDOR DIRECTO');
						

							break;

						case 'REPRESENTANTE COMERCIAL':
							
							//Suscribir en Mailchimp						
							$suscribir = $this->mailchimp->suscribir('ef24b7641d', $email, strtoupper($nombre), strtoupper($apellido), $idusuario, '', '', $num_identificacion, strtoupper($direccion), $telefono_m, $segmento, 1, fecha_actual('date'), $idorganizacion, 'REPRESENTANTE COMERCIAL');
							break;
						
						default:
							# code...
							break;
					}					
				}
			}
		}

		if (isset($_POST["actualizarUsuario"])) {

			$this->usuarios->actualizarUsuario($idusuario, $nombre, $apellido, $sexo, $fecha_nacimiento, $email, $num_identificacion, 0, $direccion, $mapa, $telefono, $telefono_m, $tipo, $segmento,'', $lider, $cod_lider, $ciudad, $estado);
		}

		if (isset($_POST['actualizarOrganizacion'])) {
			
			$this->usuarios->actualizarOrganizacion($idorganizacion, $nit, $razon_social, $telefono_organizacion, $direccion_organizacion, $ciudad_organizacion);
		}

		if (isset($_POST['asignarCredito'])) {
			
			$this->usuarios->asignarCredito($idusuario, $cupo_asignado, $cupo_usado, $cupo_disponible, $plazo);

		}

		if (isset($idusuario) && !empty($idusuario)) {
			$usuario = $this->usuarios->detalleUsuario($idusuario);

			if (!empty($usuario['organizaciones_idorganizacion'])) {
				
				$organizacion = $this->usuarios->detalleOrganizacionUsuario($usuario['organizaciones_idorganizacion']);
			}

			$documentos = $this->usuarios->listarDocumentos($idusuario);
			$cuenta = $this->cuentas_virtuales->consultarCuenta($idusuario);
			$puntos = $this->usuarios->puntosDisponibles($idusuario);
			$credito = $this->usuarios->detalleCredito($idusuario);
		}

		$lideres = 	$this->usuarios->listarUsuarios(array("REPRESENTANTE COMERCIAL"));
		$ciudades = $this->listarCiudades();
		

		include "views/admin/usuario_detalle.php";
	}


	/*****Ordenes*****/

	/*public function eliminarOrden(){

		if (isset($_POST["idorden"]) && !empty($_POST["idorden"])) {
			
			$filas = $this->ordenes->eliminarOrden($_POST["idorden"]);

		}else{
			$filas = 0;
		}

		$return = array('filas' => $filas);

		echo json_encode($return);
	}
*/
	public function adminOrdenesLista(){

		$ordenesLista = $this->usuarios->listarOrdenes();

		if (count($ordenesLista)>0) {
			foreach ($ordenesLista as $key => $orden) {
				if (!empty($orden["organizaciones_idorganizacion"])) {
					$organizacion = $this->usuarios->detalleOrganizacionUsuario($orden["organizaciones_idorganizacion"]);

					if (count($organizacion)>0) {
						$ordenesLista[$key]["razon_social"] = $organizacion["razon_social"];
					}
				}
			}
		}
		include "views/admin/ordenes_lista.php";
	}

	public function adminOrdenDetalle($idorden){
		
		$estados = array('APROBADO', 'DECLINADO', 'PENDIENTE', 'FACTURADO');

		if (isset($_POST["actualizar_orden"])) {
		
			extract($_POST);
			$fecha_facturacion = fecha_actual('datetime');
			$this->usuarios->actualizarOrden($idorden, $estado, $fecha_facturacion, $num_factura, $guia_flete);

			if ($estado == "FACTURADO") {

				$detalle_orden = $this->usuarios->detalleOrden($idorden);
				
				$puntos_pendientes = $this->usuarios->listarPuntosUsuario($detalle_orden["detalle"]["usuarios_idusuario"], 0, $idorden);				

				if (count($puntos_pendientes)>0) {
					//Activar puntos pendientes

					$estado_puntos = 1;

					foreach ($puntos_pendientes as $key => $puntos) {
						
						$this->usuarios->actualizarPuntosEstado($puntos["idpuntos"] ,$estado_puntos);
					}
				}

				$usuario = $this->usuarios->detalleUsuario($detalle_orden["detalle"]["usuarios_idusuario"]);
				$referente = $usuario["referente"];

				if ($referente) {

					$puntos_pendientes = $this->usuarios->listarPuntosUsuario($referente, 0, $idorden);

					if (count($puntos_pendientes)>0) {
					//Activar puntos pendientes del referente

						$estado_puntos = 1;

						foreach ($puntos_pendientes as $key => $puntos) {
							
							$this->usuarios->actualizarPuntosEstado($puntos["idpuntos"] ,$estado_puntos);
						}
					}
				}
			}
		}

		$orden = $this->usuarios->detalleOrden($idorden);

		include "views/admin/orden_detalle.php";
	}

	public function adminIncentivosLista(){

		$usuarios = array('DISTRIBUIDOR DIRECTO','REPRESENTANTE COMERCIAL');

		$incentivos = $this->usuarios->listarIncentivos($usuarios);

		include "views/admin/incentivos_lista.php";
	}

	public function adminIncentivoDetalle($idincentivo){

		extract($_POST);

		if (isset($_POST["actualizarIncentivo"])) {

			//Upload banner
			if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["imagen"]["tmp_name"];
				$nombreimg=$_FILES["imagen"]["name"];
				$destino = DIR_IMG_INCENTIVOS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$this->usuarios->actualizarIncentivo($idincentivo, $incentivo, $destino, $inicio, $fin, $meta, $descripcion, $usuario);
		
			if (isset($minimo) && count($minimo)>0) {				

				foreach ($minimo as $key => $value) {
					if (isset($minimo[$key]) && isset($maximo[$key]) && isset($bono[$key])) {
						$idescala = $this->usuarios->crearEscalaIncentivo($idincentivo, $minimo[$key], $maximo[$key], $bono[$key]);		
					}
				}
			}
		}

		if (isset($_POST["crearIncentivo"])) {

			//Upload banner
			if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){

				$rutaimg=$_FILES["imagen"]["tmp_name"];
				$nombreimg=$_FILES["imagen"]["name"];
				$destino = DIR_IMG_INCENTIVOS.$nombreimg;
				move_uploaded_file($rutaimg, $destino);

			}else{

				$destino = "";
			}

			$idincentivo = $this->usuarios->crearIncentivo($incentivo, $destino, $inicio, $fin, $meta, $descripcion, $usuario);			
			
			if (isset($minimo) && count($minimo)>0) {				

				foreach ($minimo as $key => $value) {
					if (isset($minimo[$key]) && isset($maximo[$key]) && isset($bono[$key])) {
						$idescala = $this->usuarios->crearEscalaIncentivo($idincentivo, $minimo[$key], $maximo[$key], $bono[$key]);		
					}
				}
			}
		}

		if (isset($idincentivo) && $idincentivo!='') {
			$incentivo = $this->usuarios->incentivoDetalle($idincentivo);
			$escalas = $this->usuarios->listarEscalasIncentivo($idincentivo);
		}

		include "views/admin/incentivo_detalle.php";
	}

	/******INGREDIENTES************/

	public function adminIngredientesLista(){
		
		$ingredientes = $this->usuarios->listarIngredientes();
		include "views/admin/ingredientes_lista.php";	
	}

	public function adminCategoriasCapacitacionLista(){
		$categorias = $this->capacitacion->listarCategorias();
		include "views/admin/categorias_capacitacion_lista.php";		
	}

	public function adminCategoriaCapacitacionDetalle($idcategoria){

		extract($_POST);

		if (isset($_POST["actualizarCategoria"])) {
			$this->capacitacion->actualizarCategoria($idcategoria, $titulo, $contenido, $perfil, $orden, $estado);
		}

		if (isset($_POST["crearCategoria"])) {
			$idcategoria = $this->capacitacion->crearCategoria($titulo, $contenido, $perfil, $orden, $estado);
		}

		if (isset($idcategoria) && $idcategoria!='') {
			$categoria = $this->capacitacion->detalleCategoria($idcategoria);
		}
		
		include "views/admin/categoria_capacitacion_detalle.php";
	}

	public function adminElementosCapacitacionLista(){
		
		$elementos = $this->capacitacion->listarElementos();

		if (count($elementos)>0) {			
		
			foreach ($elementos as $key => $elemento) {
				$elementos[$key]["categoria"] = $this->capacitacion->detalleCategoria($elemento["categorias_capacitacion_idcategoria"]);
			}
		}
		include "views/admin/elementos_capacitacion_lista.php";		
	}

	public function adminElementoCapacitacionDetalle($idelemento){

		$categorias = $this->capacitacion->listarCategorias();

		extract($_POST);

		//Upload banner
		if($_FILES["imagen"]["error"]==UPLOAD_ERR_OK){

			$rutaimg=$_FILES["imagen"]["tmp_name"];
			$nombreimg=$_FILES["imagen"]["name"];
			$destino = DIR_IMG_ENTRADAS.$nombreimg;
			move_uploaded_file($rutaimg, $destino);

		}else{

			$destino = "";
		}

		$imagen = $destino;

		if (isset($_POST["actualizarElemento"])) {
			$this->capacitacion->actualizarElemento($idelemento, $titulo, $tipo, $imagen, $contenido2, $perfil, $estado, $categoria);
		}

		if (isset($_POST["crearElemento"])) {
			$idelemento = $this->capacitacion->crearElemento($titulo, $tipo, $imagen, $contenido2, $perfil, $estado, $categoria);
		}

		if (isset($idelemento) && $idelemento!='') {
			$elemento = $this->capacitacion->detalleElemento($idelemento);
		}
		
		include "views/admin/elemento_capacitacion_detalle.php";
	}

	public function adminIngredienteDetalle($idingrediente){

		extract($_POST);

		if (isset($_POST["actualizarIngrediente"])) {
			$this->usuarios->actualizarIngrediente($idingrediente,$nombre,$descripcion);
		}

		if (isset($_POST["crearIngrediente"])) {
			$idingrediente = $this->usuarios->crearIngrediente($nombre,$descripcion);
		}

		if (isset($idingrediente) && $idingrediente!='') {
			$ingrediente = $this->usuarios->ingredienteDetalle($idingrediente);
		}

		include "views/admin/ingrediente_detalle.php";	
	}


	public function adminProtocolosLista(){
		
		$protocolos = $this->usuarios->listarProtocolos();
		include "views/admin/protocolos_lista.php";	
	}

	public function adminProtocoloDetalle($idprotocolo){

		extract($_POST);

		if (isset($_POST["actualizarProtocolo"])) {

			$this->usuarios->actualizarProtocolo($idprotocolo,$nombre,$descripcion,$estado);
		}

		if (isset($_POST["crearProtocolo"])) {
			$idprotocolo = $this->usuarios->crearProtocolo($nombre,$descripcion,$estado);			
		}

		if (isset($idprotocolo) && $idprotocolo!='') {
			$protocolo = $this->usuarios->protocoloDetalle($idprotocolo);
		}

		include "views/admin/protocolo_detalle.php";	
	}

	public function adminSuscriptoresLista(){

		$suscriptores = $this->usuarios->listarSuscriptores();
		include "views/admin/suscriptores_lista.php";
	}

	public function adminSuscriptorDetalle($idsuscriptor){

		extract($_POST);

		if (isset($_POST["actualizarSuscriptor"])) {

			$this->usuarios->actualizarSuscriptor($idsuscriptor,$nombre,$email);
		}

		if (isset($_POST["crearSuscriptor"])) {
			$idsuscriptor = $this->usuarios->crearSuscriptor($nombre,$email,fecha_actual('datetime'));
		}

		if (isset($idsuscriptor) && !empty($idsuscriptor)) {
			$suscriptor = $this->usuarios->suscriptorDetalle($idsuscriptor);
		}

		include "views/admin/suscriptor_detalle.php";

	}

	public function adminPersonalLista(){

		$personal = $this->personal->listarPersonal();
		include "views/admin/personal_lista.php";
	}

	public function adminPersonalDetalle($idpersona){

		$companias = $this->personal->listarCompanias();

		extract($_POST);

		if (isset($_POST["actualizarPersonal"])) {

			$this->personal->actualizarPersonal($idpersona, $nombre, $cargo, $usuario, $password, $rol, $estado, $compania);
		}

		if (isset($_POST["crearPersonal"])) {
			$idpersona = $this->personal->crearPersonal($nombre, $cargo, $usuario, $password, $rol, $estado, $compania);
		}

		if (isset($idpersona) && !empty($idpersona)) {
			$persona = $this->personal->detallePersona($idpersona);
		}

		include "views/admin/personal_detalle.php";

	}

	public function adminCuponesLista(){

		$cupones = $this->usuarios->listarCupones(array(0,1));
		include "views/admin/cupones_lista.php";
	}

	/*public function eliminarCupon(){
		if (isset($_POST["idcupon"]) && !empty($_POST["idcupon"])) {			
			
			$filas = $this->usuarios->eliminarCupon($_POST["idcupon"]);

		}else{
			$filas = 0;
		}

		$return = array('filas' => $filas);

		echo json_encode($return);
		
	}*/

	public function eliminarEntidad(){

		if (isset($_POST["entidad"]) && !empty($_POST["entidad"]) && isset($_POST["identidad"]) && !empty($_POST["identidad"])) {
			
			switch ($_POST["entidad"]) {
				case 'cupones':
					$filas = $this->usuarios->eliminarCupon($_POST["identidad"]);					
					break;

				case 'ordenes':
					$filas = $this->ordenes->eliminarOrden($_POST["identidad"]);
					break;

				case 'productos':
					$filas = $this->productos->eliminarProducto($_POST["identidad"]);
					break;

				case 'categorias':
					$filas = $this->productos->eliminarCategoria($_POST["identidad"]);
					break;

				case 'paginas':
					$filas = $this->paginas->eliminarPagina($_POST["identidad"]);
					break;

				case 'campanas':
					$filas = $this->campanas->eliminarCampana($_POST["identidad"]);
					break;

				case 'categoriascapacitacion':
					$filas = $this->capacitacion->eliminarCategoria($_POST["identidad"]);
					break;

				case 'elementoscapacitacion':
					$filas = $this->capacitacion->eliminarElemento($_POST["identidad"]);
					break;

				case 'ingredientes':
					$filas = $this->usuarios->eliminarIngrediente($_POST["identidad"]);
					break;
				
				case 'protocolos':
					$filas = $this->usuarios->eliminarProtocolo($_POST["identidad"]);
					break;

				case 'incentivos':
					$filas = $this->usuarios->eliminarIncentivo($_POST["identidad"]);
					break;

				case 'regiones':
					$filas = $this->geolocalizacion->eliminarRegion($_POST["identidad"]);
					break;

				case 'entrada':
					$filas = $this->entradas->eliminarEntrada($_POST["identidad"]);
					break;

				case 'imagen_publicitaria':
					$filas = $this->productos->eliminarImg($_POST["identidad"]);
					break;

				default:
					# code...
					break;
			}
		}else{
			$filas = 0;
		}

		$return = array('filas' => $filas, 'entidad' => $_POST["entidad"]);

		echo json_encode($return);
	}

	public function adminCuponDetalle($idcupon){		

		extract($_POST);

		if (isset($_POST["actualizarCupon"])) {

			$privado = 0;			
			$tipo = 0;

			$this->usuarios->actualizarCupon($idcupon, $titulo, $aplicacion, $val_descuento, $fecha_expiracion, $num_codigo_desc, $estado, $tipo, $privado, $monto_minimo);
		}

		if (isset($_POST["crearCupon"])) {

			$privado = 0;			
			$tipo = 0;
			
			$idcupon = $this->usuarios->crearCupon($titulo, $aplicacion, $val_descuento, $fecha_expiracion, $num_codigo_desc, $estado, $tipo, $privado, $monto_minimo);
		}

		if (isset($idcupon) && !empty($idcupon)) {
			$cupon =$this->usuarios->detalleCupon($idcupon);
		}
		
		include "views/admin/cupon_detalle.php";
	}

	public function adminTicketsLista(){

		$tickets = $this->tickets->listarTickets();
		if (count($tickets)>0) {
			foreach ($tickets as $key => $ticket) {				
				$tickets[$key]["usuario"] = $this->usuarios->detalleUsuario($ticket["usuarios_idusuario"]);
			}
		}
		include "views/admin/tickets_lista.php";
	}

	public function adminTicketsDetalle($idticket){

		if (isset($_POST["agregarMensaje"])) {
			$this->tickets->crearMensajeTicket($_POST['mensaje'], $emisor="EMPRESA", fecha_actual('datetime'), $idticket);
		}

		if (isset($_POST["actualizarEstado"])) {
			$this->tickets->actualizarTicket($idticket, $_POST["estado"]);
		}

		$ticket = $this->tickets->detalleTicket($idticket);
		$mensajes_ticket = $this->tickets->listarMensajesTickets($idticket);
		$ticket["usuario"] = $this->usuarios->detalleUsuario($ticket["usuarios_idusuario"]);


		include "views/admin/ticket_detalle.php";	
	}

	public function adminPagosComisiones(){

		$comision_nivel = 0;
		$niveles = array();
		$porc_niveles = array(5,4,3,2,1);
		
		$representantes = $this->usuarios->listarUsuarios(array('REPRESENTANTE COMERCIAL'));
		$campanas = $this->campanas->listarCampanas();

		if (isset($_POST["idcampana"]) && !empty($_POST["idcampana"])) {

			$es_ano = substr($_POST["idcampana"], 0, 3);			
			if ($es_ano=="ano") {
				$ano = substr($_POST["idcampana"], 3, 7);
				$campana_seleccionada = array('fecha_ini' => $ano.'-01-01', 'fecha_fin' => $ano.'-12-31');
			}else{
				$campana_seleccionada = $this->campanas->detalleCampana($_POST["idcampana"]);
			}
			
		}else{
			$campana_seleccionada = $this->campanas->getCamapanaActual();
		}

		//Validar si la campaña está en curso
		if ($campana_seleccionada["fecha_fin"]>=fecha_actual("date")) {
			$campana_en_curso = true;
		}else{
			$campana_en_curso = false;
		}

		foreach ($representantes as $key => $representante) {

			$comision_total = 0;

			//Consultar si ya se realizó el pago para la campaña y el representante correspondiente
			$pago_comision_campana = $this->cuentas_virtuales->detallePagoComision($campana_seleccionada["idcampana"], $representante["idusuario"]);

			if (count($pago_comision_campana)>0) {
				$representantes[$key]["campana_comision_pagada"] = true;
			}else{
				$representantes[$key]["campana_comision_pagada"]	= false;
			}
		
			$distribuidores = $this->usuarios->listarDistribuidoresLider($representante["idusuario"]);
					
			if (count($distribuidores)>0) {
				
				$estado_compras = "FACTURADO";				

				foreach ($distribuidores as $key2 => $distribuidor) {
					$compras_netas = $this->usuarios->comprasNetasPeriodo($campana_seleccionada["fecha_ini"], $campana_seleccionada["fecha_fin"],$estado_compras,$distribuidor["idusuario"]);

					$distribuidores[$key2]["compras_netas"] = $compras_netas["compras_netas"];
				}

				//Niveles

				for ($i=0; $i < count($porc_niveles); $i++) {

					$niveles[$i]["neto"] = 0;

					foreach ($distribuidores as $key3 => $distribuidor) {

						if ($distribuidor["nivel"]==$i) {
							$niveles[$i]["neto"]+=$distribuidor["compras_netas"];						
						}
					}
					
					$comision_nivel = $niveles[$i]["neto"] * ($porc_niveles[$i]/100);
					$comision_total += $comision_nivel;
				}

				$representantes[$key]["comision_total"] = $comision_total;				
			}
			
		}

		include "views/admin/pagos_comisiones_lista.php";
	}

	public function adminPagoComision(){

		if (isset($_POST["pagarComision"])) {
			extract($_POST);

			//Upload banner
			if($_FILES["adjunto"]["error"]==UPLOAD_ERR_OK){

				$rutaadj=$_FILES["adjunto"]["tmp_name"];
				$nombreadj=$_FILES["adjunto"]["name"];
				$destino = DIR_ADJUNTOS.$nombreadj;
				move_uploaded_file($rutaadj, $destino);

			}else{
				$destino = "";
			}

			$cuenta = $this->cuentas_virtuales->consultarCuenta($idusuario);

			if (count($cuenta)==0) {
				//Crear cuenta
				$idcuenta = $this->cuentas_virtuales->crearCuenta(0, fecha_actual('datetime') ,$idusuario);
				$cuenta = $this->cuentas_virtuales->consultarCuenta($idusuario);
			}

			
			//Movimiento positivo
			$idmovimientopositivo = $this->cuentas_virtuales->crearMovimiento($monto, $descripcion, "", $cuenta["idcuenta"], $idusuario);


			//Movimiento negativo						
			$monto = "-".$monto;

			$idmovimientonegativo = $this->cuentas_virtuales->crearMovimiento($monto, $descripcion, $destino, $cuenta["idcuenta"], $idusuario);

			//Crear pago comision
			$idpago = $this->cuentas_virtuales->crearPagoComision($idmovimientonegativo, $idcampana, $idusuario);

			if (!empty($idpago)) {
				header("Location: ../".URL_ADMIN_PAGOS_COMISIONES);
			}

		}

		if (isset($_POST["detallePago"])) {

			extract($_POST);

			if (isset($monto) && !empty($monto) && isset($idusuario) && !empty($idusuario) && isset($idcampana) && !empty($idcampana)) {
			
				//Consultar si ya se realizó el pago para la campaña y el representante correspondiente
				$pago_comision_campana = $this->cuentas_virtuales->detallePagoComision($idcampana, $idusuario);

				if (count($pago_comision_campana)>0) { //Si ya re realizó el pago

					include "views/admin/detalle_pago_comision.php";

				}else{ //Si no se ha realizado el pago

					include "views/admin/pago_comision.php";
				}

			}else{

				echo "Algo está mal. Por favor intenta de nuevo";
			}
		}
	}

	public function adminPagosIncentivos(){
		
		$representantes = $this->usuarios->listarUsuarios(array('REPRESENTANTE COMERCIAL'));
		$incentivos = $this->usuarios->listarIncentivos(array('REPRESENTANTE COMERCIAL'));

		if (isset($_POST["idincentivo"]) && !empty($_POST["idincentivo"])) {

			$incentivo_seleccionado = $this->usuarios->incentivoDetalle($_POST["idincentivo"]);	
			$escalas = $this->usuarios->listarEscalasIncentivo($incentivo_seleccionado["idincentivo"]);
		}

		//Validar si la campaña está en curso
		if ($incentivo_seleccionado["fin"]>=fecha_actual("date")) {
			$incentivo_en_curso = true;
		}else{
			$incentivo_en_curso = false;
		}

		foreach ($representantes as $key => $representante) {

			$neto_total = 0;


			//Consultar si ya se realizó el pago para el incentivo y el representante correspondiente
			$pago_incentivo = $this->cuentas_virtuales->detallePagoIncentivo($incentivo_seleccionado["idincentivo"], $representante["idusuario"]);

			if (count($pago_incentivo)>0) {
				$representantes[$key]["incentivo_pagado"] = true;
			}else{
				$representantes[$key]["incentivo_pagado"] = false;
			}
		
			$distribuidores = $this->usuarios->listarDistribuidoresLider($representante["idusuario"]);
					
			if (count($distribuidores)>0) {
				
				$estado_compras = "FACTURADO";

				foreach ($distribuidores as $key2 => $distribuidor) {
					$compras_netas = $this->usuarios->comprasNetasPeriodo($incentivo_seleccionado["inicio"], $incentivo_seleccionado["fin"],$estado_compras,$distribuidor["idusuario"]);

					$neto_total += $compras_netas["compras_netas"];
				}

				$representantes[$key]["neto_total"] = $neto_total;


				if (count($escalas)>0) { //Si el incentivo tiene escalas

					$representantes[$key]["cumplimiento"] = 0;

					foreach ($escalas as $escala) {

						if ($escala["minimo"]<=$neto_total && $escala["maximo"]>=$neto_total) {

							$representantes[$key]["meta"] = "ESCALA ".$incentivo_seleccionado["incentivo"];
							$representantes[$key]["cumplimiento"] = convertir_pesos($escala["bono"]);
							break;
						}
					}

					if (!isset($representantes[$key]["meta"]) || empty($representantes[$key]["meta"])) 
					{
						$representantes[$key]["meta"] = "No ha alcanzado ninguna meta";				
					}
				}else{ //Si el incentivo no tiene escalas
					$representantes[$key]["meta"] = convertir_pesos($incentivo_seleccionado["meta"]);
					$representantes[$key]["cumplimiento"] = ($neto_total/$incentivo_seleccionado["meta"])*100;					
				}
			}
		}

		include "views/admin/pagos_incentivos_lista.php";
	}

	/****INFORMES***/

	public function adminInformePyG(){

		
		if (isset($_GET["fecha_inicio"]) && isset($_GET["fecha_fin"])) {

			$fecha_inicio = $_GET["fecha_inicio"];
			$fecha_fin = $_GET["fecha_fin"];
			
		}else{
			$fecha_inicio = fecha_actual("date");
			$fecha_fin = fecha_actual("date");
		}

		$estado_ordenes = "PENDIENTE";
		
		$unidades_vendidas = $this->ordenes->unidadesVendidas($fecha_inicio, $fecha_fin, $estado_ordenes);
		include "views/admin/informe_pyg.php";
	}

	public function adminInformeUsuarios(){

		$tipos = array('DISTRIBUIDOR DIRECTO');
		$usuarios = $this->usuarios->listarUsuarios($tipos);
		$zonas = $this->geolocalizacion->listarZonas();
		$regiones = $this->geolocalizacion->listarRegiones();

		if (isset($_POST["filtro_fecha_inicio"]) && !empty($_POST["filtro_fecha_inicio"])) {				
			$fecha_inicio = $_POST["filtro_fecha_inicio"];
		}else{
			$fecha_inicio = date("Y")."-01-01";
		}

		if (isset($_POST["filtro_fecha_fin"]) && !empty($_POST["filtro_fecha_fin"])) {
			$fecha_fin = $_POST["filtro_fecha_fin"];	
		}else{
			$fecha_fin = date("Y")."-12-31";
		}

		foreach ($usuarios as $key => $usuario) {			
			

			$compras_netas = $this->usuarios->comprasNetasPeriodo($fecha_inicio, $fecha_fin, "FACTURADO", $usuario["idusuario"]);
			$lider = $this->usuarios->detalleUsuario($usuario["lider"]);
			$region = $this->geolocalizacion->detalleRegionCiudad($usuario["ciudades_idciudad"]);
			$director =	$this->usuarios->detalleUsuario($region[0]["director"]);
			$zona = $this->geolocalizacion->listarZonas(array(),array($usuario["lider"]),array());
			
			$usuarios[$key]["compras_netas"] = $compras_netas["compras_netas"];
			$usuarios[$key]["zona"] = $zona[0];
			$usuarios[$key]["region"] = $region[0];
			$usuarios[$key]["lider"] = $lider;
			$usuarios[$key]["director"] = $director;

			if (isset($_POST["filtro_zona"]) && !empty($_POST["filtro_zona"])) {
				if ($zona[0]["idzona"]!=$_POST["filtro_zona"]) {
					unset($usuarios[$key]);
				}
			}

			if (isset($_POST["filtro_region"]) && !empty($_POST["filtro_region"])) {
				if ($region[0]["idregion"]!=$_POST["filtro_region"]) {
					unset($usuarios[$key]);
				}
			}
		}

		include "views/admin/informe_usuarios.php";
	}

	public function adminInformeOrdenes(){

		$estados = array('APROBADO', 'DECLINADO', 'PENDIENTE', 'FACTURADO');

		if (isset($_POST["filtro_fecha_inicio"]) && !empty($_POST["filtro_fecha_inicio"])) {
			$fecha_inicio = $_POST["filtro_fecha_inicio"];
		}else{
			$fecha_inicio = date("Y")."-01-01";
		}

		if (isset($_POST["filtro_fecha_fin"]) && !empty($_POST["filtro_fecha_fin"])) {
			$fecha_fin = $_POST["filtro_fecha_fin"];	
		}else{
			$fecha_fin = date("Y")."-12-31";
		}

		if (isset($_POST["filtro_estado"]) && !empty($_POST["filtro_estado"])) {
			$estado = $_POST["filtro_estado"];	
		}else{
			$estado = "";
		}

		$ordenes = $this->usuarios->listarOrdenes($fecha_inicio, $fecha_fin, $estado);
		$zonas = $this->geolocalizacion->listarZonas();
		$regiones = $this->geolocalizacion->listarRegiones();

		foreach ($ordenes as $key => $orden) {

			$comprador = $this->usuarios->detalleUsuario($orden["usuarios_idusuario"]);
			$ordenes[$key]["comprador"] = $comprador;
			
			$lider_comprador = $this->usuarios->detalleUsuario($comprador["lider"]);	
			$region = $this->geolocalizacion->detalleRegionCiudad($comprador["ciudades_idciudad"]);
			$director =	$this->usuarios->detalleUsuario($region[0]["director"]);
			$zona = $this->geolocalizacion->listarZonas(array(),array($comprador["lider"]),array());

			$ordenes[$key]["lider"] = $lider_comprador;
			$ordenes[$key]["director"] = $director;
			$ordenes[$key]["zona"] = $zona[0];
			$ordenes[$key]["region"] = $region[0];

			/*if (isset($_POST["filtro_zona"]) && !empty($_POST["filtro_zona"])) {
				if ($zona[0]["idzona"]!=$_POST["filtro_zona"]) {
					unset($ordenes[$key]);
				}
			}*/

			if (isset($_POST["filtro_region"]) && !empty($_POST["filtro_region"])) {
				if ($region[0]["idregion"]!=$_POST["filtro_region"]) {
					unset($ordenes[$key]);
				}
			}
		}
		
		include "views/admin/informe_ordenes.php";
	}

	public function adminInformeProductos(){

		$tipos_productos = array('NORMAL');
		$estados_productos = array(0,1);
		$estado_orden = "FACTURADO";

		$productos = $this->productos->listarProductos($tipos_productos, $estados_productos);

		if (isset($_POST["filtro_fecha_inicio"]) && !empty($_POST["filtro_fecha_inicio"])) {
			$fecha_inicio = $_POST["filtro_fecha_inicio"];
		}else{
			$fecha_inicio = date("Y")."-01-01";
		}

		if (isset($_POST["filtro_fecha_fin"]) && !empty($_POST["filtro_fecha_fin"])) {
			$fecha_fin = $_POST["filtro_fecha_fin"];	
		}else{
			$fecha_fin = date("Y")."-12-31";
		}

		foreach ($productos as $key => $producto) {

			$ordenes = $this->usuarios->listarOrdenes();
			$detalle_orden = $this->ordenes->listarDetalleOrden(array($producto["codigo"]), $estado_orden);
			//var_dump($detalle_orden);
			$unidades_vendidas = $this->ordenes->unidadesVendidas($fecha_inicio, $fecha_fin, $estado_orden, $producto["codigo"]);
			
			$productos[$key]["unidades_vendidas"] = intval($unidades_vendidas["cantidad"]);
		}
		
		include "views/admin/informe_productos.php";
	}

	public function adminInformePagos(){

		$comision_nivel = 0;
		$niveles = array();
		$porc_niveles = array(5,4,3,2,1);
		
		$representantes = $this->usuarios->listarUsuarios(array('REPRESENTANTE COMERCIAL'));
		$campanas = $this->campanas->listarCampanas();
		$incentivos = $this->usuarios->listarIncentivos(array('REPRESENTANTE COMERCIAL'));

		//Eliminar campaña que está en curso o que aún no finaliza
		foreach ($campanas as $key => $campana) {
			
			if ($campana["fecha_fin"]>=fecha_actual("date")) {
				unset($campanas[$key]);
			}
		}

		//Eliminar incentivos que están en curso o que aún no finalizan
		foreach ($incentivos as $key => $incentivo) {
			
			if ($incentivo["fin"]>=fecha_actual("date")) {
				unset($incentivos[$key]);
			}
		}
		

		foreach ($representantes as $keyR => $representante) {

			$representantes[$keyR]["comisiones_total"] = 0;
			$representantes[$keyR]["incentivos_total"] = 0;

			//CÁLCULO DE COMISIONES
			foreach ($campanas as $keyC => $campana) {

				$comision_total = 0;
				$comision_pendiente_campana = 0;
				
				//Consultar si ya se realizó el pago para la campaña y el representante correspondiente
				$pago_comision_campana = $this->cuentas_virtuales->detallePagoComision($campana["idcampana"], $representante["idusuario"]);

				if (count($pago_comision_campana)==0) { //Si no se ha pagado la comisión de la campaña

					//Calcular comisión pendiente campaña
					$distribuidores = $this->usuarios->listarDistribuidoresLider($representante["idusuario"]);
							
					if (count($distribuidores)>0) {
						
						$estado_compras = "FACTURADO";				

						foreach ($distribuidores as $keyD => $distribuidor) {
							$compras_netas = $this->usuarios->comprasNetasPeriodo($campana["fecha_ini"], $campana["fecha_fin"],$estado_compras,$distribuidor["idusuario"]);

							$distribuidores[$keyD]["compras_netas"] = $compras_netas["compras_netas"];
						}

						//Niveles
						for ($i=0; $i < count($porc_niveles); $i++) {

							$niveles[$i]["neto"] = 0;

							foreach ($distribuidores as $keyD2 => $distribuidor) {

								if ($distribuidor["nivel"]==$i) {
									$niveles[$i]["neto"]+=$distribuidor["compras_netas"];
								}
							}
							
							$comision_nivel = $niveles[$i]["neto"] * ($porc_niveles[$i]/100);
							$comision_total += $comision_nivel;
						}

						$comision_pendiente_campana = $comision_total;
					}
				}

				$representantes[$keyR]["comisiones_total"] += $comision_pendiente_campana;
			}

			//CÁLCULO DE INCENTIVOS

			foreach ($incentivos as $key => $incentivo) {			

				$neto_total = 0;
				$incentivo_pendiente = 0;
				$escalas = $this->usuarios->listarEscalasIncentivo($incentivo["idincentivo"]);

				//Consultar si ya se realizó el pago para el incentivo y el representante correspondiente
				$pago_incentivo = $this->cuentas_virtuales->detallePagoIncentivo($incentivo["idincentivo"], $representante["idusuario"]);

				if (count($pago_incentivo)==0) {					
			
					$distribuidores = $this->usuarios->listarDistribuidoresLider($representante["idusuario"]);
							
					if (count($distribuidores)>0) {
						
						$estado_compras = "FACTURADO";
						foreach ($distribuidores as $keyD => $distribuidor) {
							$compras_netas = $this->usuarios->comprasNetasPeriodo($incentivo["inicio"], $incentivo["fin"],$estado_compras,$distribuidor["idusuario"]);

							$neto_total += $compras_netas["compras_netas"];
						}

						if (count($escalas)>0) { //Si el incentivo tiene escalas

							foreach ($escalas as $escala) {

								if ($escala["minimo"]<=$neto_total && $escala["maximo"]>=$neto_total) {

									$incentivo_pendiente = $escala["bono"];
									break;
								}
							}

						}else{ //Si el incentivo no tiene escalas							
							$cumplimiento = ($neto_total/$incentivo["meta"])*100;
							if ($cumplimiento>=100) {
								$incentivo_pendiente = $incentivo["valorazion"];
							}
						}
					}
				}

				$representantes[$keyR]["incentivos_total"] += $incentivo_pendiente;
			}

		}

		include "views/admin/informe_pagos.php";
	}

	public function adminZonas(){
		
		$zonas = $this->geolocalizacion->listarZonas();
		include "views/admin/zonas_lista.php";
	}

	public function adminZonaDetalle($idzona){

		extract($_POST);

		if (isset($_POST["actualizarZona"])) {

			$this->geolocalizacion->actualizarZona($idzona, $zona, $estado, $lider, $ciudad);
		}

		if (isset($_POST["crearZona"])) {
			$idzona = $this->geolocalizacion->crearZona($zona, $estado, $lider, $ciudad);
		}

		if (isset($idzona) && !empty($idzona)) {

			$ids = array($idzona);
			$zona = $this->geolocalizacion->listarZonas($ids);	
			$zona = $zona[0];
		}

		$tipos = array("REPRESENTANTE COMERCIAL");
		
		$lideres = $this->usuarios->listarUsuarios($tipos);
		$ciudades = $this->usuarios->listarCiudades();

		include "views/admin/zona_detalle.php";
	}

	public function adminRegiones(){

		$regiones = $this->geolocalizacion->listarRegiones();		
		include "views/admin/regiones_lista.php";
	}

	public function adminRegionDetalle($idregion){

		extract($_POST);

		if (isset($_POST["actualizarRegion"])) {

			$this->geolocalizacion->eliminarCiudadesRegion($idregion);

			if (isset($ciudades) && count($ciudades)>0) {				

				foreach ($ciudades as $key => $ciudad) {
					$idciudadregion = $this->geolocalizacion->agregarCiudadRegion($idregion,$ciudad);
				}
			}
			
			$this->geolocalizacion->actualizarRegion($idregion, $region, $estado, $director);
		}

		if (isset($_POST["crearRegion"])) {

			$idregion = $this->geolocalizacion->crearRegion($region, $estado, $director);

			if (isset($ciudades) && count($ciudades)>0) {
				
				foreach ($ciudades as $key => $ciudad) {
					$idciudadregion = $this->geolocalizacion->agregarCiudadRegion($idregion,$ciudad);
				}
			}
		}

		if (isset($idregion) && !empty($idregion)) {

			$ids = array($idregion);
			$region = $this->geolocalizacion->listarRegiones($ids);	
			$region = $region[0];

			$ciudades = $this->geolocalizacion->listarCiudadesRegion($region["idregion"]);
			
			foreach ($ciudades as $key => $ciudad) {
				$ciudades_region[]= $ciudad["idciudad"];
			}
		}

		$tipos = array("DIRECTOR");

		$directores = $this->usuarios->listarUsuarios($tipos);
		$ciudades = $this->usuarios->listarCiudades();

		include "views/admin/region_detalle.php";	
	}


	/****CÓDIGOS PUNTOS****/

	public function adminGenerarCodigosPuntos(){

		if (isset($_POST["generarCodigos"])) {

			extract($_POST);

			$codigos = array();
			$imgsqr = array();


			//Crear Lote
			$idlote = $this->codigos_puntos->crearLote($idproducto);

			if (!empty($idlote)) {

				//Insertar Códigos

				for ($i=0; $i < $cantidad; $i++) {
					
					do {
					
						$codigo = $this->codigos_puntos->generaCodigo();
						$info = $this->codigos_puntos->datalleCodigo($codigo);	
					
					} while (count($info)>0);

					if ($qr) {
						$imgqr = $this->codigos_puntos->generarQR($codigo);		
					}

					$idcodigo = $this->codigos_puntos->crearCodigo($codigo, $puntos, 0, $qr, fecha_actual("datetime"), $vencimiento, 0, $idlote);
				}

				$this->adminCodigosPuntosImprimir($idlote);
			}				

		}else{

			$productos = $this->productos->listarProductos(array('NORMAL'),array(1));

			include "views/admin/codigos_puntos_generar.php";
		}

	}

	public function adminCodigosPuntosImprimir($idlote){

		$codigos = $this->codigos_puntos->listarCodigos($idlote);

		include "views/admin/codigos_puntos_imprimir.php";		
	}

	public function adminCodigosPuntosLista(){

		$lotes = $this->codigos_puntos->listarLotes();


		//$codigos = $this->codigos_puntos->listarCodigos();

		/*foreach ($codigos as $key => $codigo) {
			
			if (!empty($codigo['idredentor'])) {
				
				$redentor = $this->usuario->detalleUsuario($codigo['idredentor']);
				$codigos[$key]['redentor'] = $redentor['nombre'].' '.$redentor['apellido'];
			}
		}*/

		include 'views/admin/codigos_puntos_lista.php';
	}

	/*****LANDING****/
	public function landingCosmeticaEcologica(){

		$paginas_menu = $this->paginasMenu();

		include 'views/landing/cosmetica_ecologica.php';
	}

	/**DOCUMENTOS**/

	public function descargarArchivo(){

		extract($_GET);

		if (!empty($nombre) && !empty($ext) && !empty($type) && !empty($doc)) {

			header("Content-disposition: attachment; filename=$nombre.$ext");
			header("Content-type: $type");
			readfile($doc);
		}
	}
}
?>