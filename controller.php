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

/** Require Includes **/
require "include/constantes.php";
require "include/functions.php";


class Controller
{

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

		$posicion_banners="POPUP";		
		$banner_popup = $this->banners->listarBanners($posicion_banners,$estados_banners);

		$paginas_menu = $this->paginasMenu();

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



/************USUARIOS**************/

	public function actualizarSesion($idusuario, $nombre, $apellido, $email, $telefono, $telefono_m, $direccion, $ciudades_idciudad, $ciudad, $tipo="", $lider=0, $idorganizacion=0, $usuarioremoto=array()){

		if (!empty($usuarioremoto)) {

			$_SESSION["idusuario_remoto"] = $usuarioremoto["idusuario"];
			$_SESSION["email_remoto"] = $usuarioremoto["email"];
			$_SESSION["nombre_remoto"] = $usuarioremoto["nombre"];
			$_SESSION["apellido_remoto"] = $usuarioremoto["apellido"];
			$_SESSION["tipo_remoto"] = $usuarioremoto["tipo"];
			
		}
		
		$_SESSION["idusuario"] = $idusuario;
		$_SESSION["nombre"] = $nombre;
		$_SESSION["apellido"] = $apellido;
		$_SESSION["email"] = $email;
		$_SESSION["telefono"] = $telefono;
		$_SESSION["telefono_m"] = $telefono_m;
		$_SESSION["direccion"] = $direccion;
		$_SESSION["ciudades_idciudad"] = $ciudades_idciudad;
		$_SESSION["ciudad"] = $ciudad;
		$_SESSION["lider"] = $lider;
		$_SESSION["idorganizacion"] = $idorganizacion;

		if (!empty($tipo)) {
			$_SESSION["tipo"] = $tipo;
		}		
	}

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

			$tipo = "DISTRIBUIDOR DIRECTO";
			$foto = "";
			$estado = 1;
			$fecha_registro = fecha_actual("datetime");
			$passwordmd5 = md5($password);			

			$idorganizacion = $this->usuarios->crearOrganizacion($nit, $razon_social, $direccion_organizacion, $telefono_organizacion, $ciudad_organizacion);

			$idusuario = $this->usuarios->crearUsuario($nombre, $apellido, $sexo, $fecha_nacimiento, $email, $passwordmd5, $num_identificacion, $boletines, $condiciones, $direccion, $telefono, $telefono_m, $tipo, $segmento, $foto, $estado, $fecha_registro, $referente, $lider, 0, $nivel, $ciudad, $idorganizacion);
		
			if (!empty($idusuario)) {
				//Enviar email Bienvenida
				$idplantilla=2;
				$plantilla = $this->usuarios->detallePlantilla($idplantilla);
				$mensaje = shorcodes_registro_usuario($nombre." ".$apellido,$email,$password,$plantilla["mensaje"]);

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0"."\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

				// More headers
				$headers .= 'From: Piudali <'.$plantilla["email"].'>'."\r\n";

				$mail = mail($email, $plantilla["asunto"], $mensaje, $headers);

				echo "<script> alert('Tu registro fue exitoso. Por favor ingresa con tus datos'); window.location='".URL_SITIO.URL_INGRESAR."';</script>";		
			}else{
				echo "<script> alert('No fue posible realizar el registro. Por favor intente de nuevo');</script>";			
			}

		}elseif (isset($_POST["crearUsuario"])) {

			extract($_POST);

			$tipo = "DISTRIBUIDOR DIRECTO";
			$foto = "";
			$estado = 1;
			$fecha_registro = fecha_actual("datetime");
			$passwordmd5 = md5($password);
			$idorganizacion = 0;

			$idusuario = $this->usuarios->crearUsuario($nombre, $apellido, $sexo, $fecha_nacimiento, $email, $passwordmd5, $num_identificacion, $boletines, $condiciones, $direccion, $telefono, $telefono_m, $tipo, $segmento, $foto, $estado, $fecha_registro, $referente, $lider, 0, $nivel, $ciudad, $idorganizacion);

			if (!empty($idusuario)) {
				
				//Enviar email Bienvenida
				$idplantilla=2;
				$plantilla = $this->usuarios->detallePlantilla($idplantilla);
				$mensaje = shorcodes_registro_usuario($nombre." ".$apellido,$email,$password,$plantilla["mensaje"]);

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0"."\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

				// More headers
				$headers .= 'From: Piudali <'.$plantilla["email"].'>'."\r\n";

				$mail = mail($email, $plantilla["asunto"], $mensaje, $headers);

				echo "<script> alert('Tu registro fue exitoso. Por favor ingresa con tus datos'); window.location='".URL_SITIO.URL_INGRESAR."';</script>";			
			}else{
				echo "<script> alert('No fue posible realizar el registro. Por favor intente de nuevo');</script>";			
			}
		}

		include "views/registro.php";
	}

	public function pageIngresar(){

		$paginas_menu = $this->paginasMenu();		

		if (isset($_POST["ingresar"])) {
			extract($_POST);

			$password = md5($password);

			$usuario = $this->usuarios->loguearUsuario($email, $password);
			$usuario = $usuario[0];

			if (count($usuario)>0) {
				
				$this->actualizarSesion($usuario["idusuario"], $usuario["nombre"], $usuario["apellido"], $usuario["email"], $usuario["telefono"], $usuario["telefono_m"], $usuario["direccion"], $usuario["ciudades_idciudad"], $usuario["ciudad"], $usuario["tipo"], $usuario["lider"], $usuario["organizaciones_idorganizacion"]);
				header("Location: ".URL_USUARIO."/".URL_USUARIO_PERFIL);
			}else{
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

				$usuario = $this->usuarios->loguearUsuario($email, $password);
				$usuario = $usuario[0];

				if (count($usuario)>0) {

					$usuarioremoto = array(
											'idusuario' => $_SESSION["idusuario"], 
											'tipo' => $_SESSION["tipo"],
											'email' => $_SESSION["email"],
											'nombre' => $_SESSION["nombre"],
											'apellido' => $_SESSION["apellido"],
											'tipo' => $_SESSION["tipo"]
											);
					
					$this->actualizarSesion($usuario["idusuario"], $usuario["nombre"], $usuario["apellido"], $usuario["email"], $usuario["telefono"], $usuario["telefono_m"], $usuario["direccion"], $usuario["ciudades_idciudad"], $usuario["ciudad"], $usuario["tipo"], $usuario["lider"], $usuario["organizaciones_idorganizacion"], $usuarioremoto);

					header("Location: ".URL_USUARIO."/".URL_USUARIO_PERFIL);
				}else{
					header("Location: ".URL_SITIO);
				}
			}else{
				header("Location: ".URL_SITIO);
			}
		}
	}

	public function salirUsuarioRemoto(){
		
		if (isset($_SESSION["idusuario_remoto"]) && !empty($_SESSION["idusuario_remoto"])) {
			
			$usuario = $this->usuarios->detalleUsuario($_SESSION["idusuario_remoto"]);

			$this->actualizarSesion($usuario["idusuario"], $usuario["nombre"], $usuario["apellido"], $usuario["email"], $usuario["telefono"], $usuario["telefono_m"], $usuario["direccion"], $usuario["ciudades_idciudad"], $usuario["ciudad"], $usuario["tipo"],$usuario["lider"], $usuario["organizaciones_idorganizacion"]);

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

				$actualizar_usuario = $this->usuarios->actualizarUsuario($_SESSION["idusuario"],$nombre, $apellido, $sexo, $fecha_nacimiento, $email, $boletines, $direccion, $telefono, $telefono_m, $_SESSION["tipo"], $segmento, $foto, $_SESSION["lider"], $ciudad);

				if (isset($idorganizacion) && !empty($idorganizacion)) {
					$actualizar_organizacion = $this->usuarios->actualizarOrganizacion($idorganizacion, $razon_social, $telefono_organizacion, $direccion_organizacion, $ciudad_organizacion);
				}

				if (!empty($nueva_contrasena)) {
					
					$cambio_contrasena = $this->usuarios->cambiarContrasenaUsuario($_SESSION["idusuario"], md5($contrasena_actual), md5($nueva_contrasena));

					if ($cambio_contrasena===1) {
						
					}else{
						
					}
				}

				$info_ciudad = $this->usuarios->nombreCiudad($ciudad);
				$this->actualizarSesion($_SESSION["idusuario"], $nombre, $apellido, $email, $telefono, $telefono_m, $direccion, $ciudad, $info_ciudad["ciudad"], $_SESSION["tipo"], $_SESSION["lider"], $idorganizacion);

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

							foreach ($distribuidores as $key => $distribuidor) {

								if ($distribuidor["nivel"]==$i) {
									$niveles[$i]["distribuidores"][$key] = $distribuidor;
									$niveles[$i]["neto"]+=$distribuidor["compras_netas"];
								}								
							}							
						}	

						/*var_dump($niveles[0]["distribuidores"]);
						exit();*/
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
		
		if (!empty($_SESSION["idusuario"])) {

			switch ($_SESSION["tipo"]) {

				case 'DISTRIBUIDOR DIRECTO':
					$usuario = array("DISTRIBUIDOR DIRECTO");
					$incentivos = $this->usuarios->listarIncentivos($usuario);
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
					$incentivos = $this->usuarios->listarIncentivos($usuario);

					$distribuidores = $this->usuarios->listarDistribuidoresLider($_SESSION["idusuario"]);

					if (count($incentivos)>0) {
						
						foreach ($incentivos as $key => $incentivo) {

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
								$incentivos[$key]["cumplimiento"] = $incentivos[$key]["cumplimiento"]."%";
							}
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
			
			$cupones = $this->usuarios->listarCupones();			
			
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
		
		//$categorias = $this->productos->listarCategorias();


		if (!empty($_SESSION["idusuario"])) {

			$categorias = $this->capacitacion->listarCategorias();

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
						$elementos = $this->capacitacion->listarElementosCat($_GET["opcion"]);

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

		include "views/usuario_comprar.php";
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
		session_destroy();
		unset($_SESSION["idusuario"]);
		unset($_SESSION["nombre"]);
		unset($_SESSION["apellido"]);
		unset($_SESSION["email"]);
		unset($_SESSION["telefono"]);
		unset($_SESSION["telefono_m"]);
		unset($_SESSION["direccion"]);
		unset($_SESSION["ciudades_idciudad"]);
		unset($_SESSION["ciudad"]);
		unset($_SESSION["tipo"]);

		header("Location: ".URL_SITIO);
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
	
	public function verCarrito(){

		$paginas_menu = $this->paginasMenu();

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

		if ($campana_actual["monto_minimo"]>$subtotalAntesIva) {
			$alerta = 'El pedido no cumple con el monto mínimo, por favor agrega más productos. Si no eres un distribuidor por favor da clic <a href="'.URL_SITIO.'tiendas">aquí.</a>';
		}

		include "views/carrito.php";
	}

	public function verResumenCompra(){

		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"])) {
			
			$paginas_menu = $this->paginasMenu();

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
			if ($pagoPuntos["puntos"]>0) {

				$puntos_sin_redimir = $pagoPuntos["puntos"];
				$puntos_disponibles = $this->usuarios->listarPuntosDisponibles($_SESSION["idusuario"]);

				foreach ($puntos_disponibles as $puntos_fila) {
					
					if ($puntos_sin_redimir>=$puntos_fila["disponibles"]) {
						$puntos_redimidos = $puntos_fila["disponibles"];
						$puntos_actualizar = $puntos_fila["puntos"];
					}else{
						$puntos_restantes = $puntos_sin_redimir;
						$puntos_actualizar = $puntos_fila["redimido"]+$puntos_restantes;
						$puntos_redimidos = $puntos_sin_redimir;
					}

					$puntos_sin_redimir=$puntos_sin_redimir-$puntos_redimidos;

					$this->usuarios->actualizarPuntosRedimidos($puntos_fila["idpuntos"],$puntos_actualizar);
					
					if ($puntos_sin_redimir==0) {
						break;
					}
				}
			}
			
			//Crear Orden
			$idorden = $this->carrito->generarOrden($codigo_orden, $fecha_pedido, $subtotalAntesIva, $subtotalAntesIvaPremios, $descuentoCupon, $porcDescuentoEscala, $descuentoEscala, $totalNetoAntesIva, $iva, $retencion, $pagoPuntos["puntos"], $pagoPuntos["valor_punto"], $flete, $total, $estado, $fecha_facturacion, $num_factura, $_SESSION["idusuario"]);

			if ($idorden) {
				
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
						$filas = $this->descontarStock($producto["idpdt"],$producto["cantidad"]);

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

				//Variables Pago Payu
				$merchantId = 502548;
				$ApiKey = "28tuaar72n6g65ervovdl1sst";
				$referenceCode = $codigo_orden;
				//$accountId = ;
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
				$payerFullName = $_SESSION["nombre"]." ".$_SESSION["apellido"];
				$extra1 = $_SESSION["idusuario"];
				$extra3 = "PIUDALI";
				$responseUrl = "http://naturalvitalis.com/respagos.php";
				$signature=md5($ApiKey."~".$merchantId."~".$referenceCode."~".$amount."~COP");

				require "include/pago_payu.php";

				unset($_SESSION["idpdts"]);
				unset($_SESSION["cantidadpdts"]);
			}		
			
		}else{
			header("Location: ".URL_INGRESAR);
		}
	}

	public function descontarStock($idpdt, $cantidad){

		$producto = $this->productos->detalleProductos($idpdt);
		$cantidad_actual = $producto[0]["cantidad"];
		$cantidad_nueva = $cantidad_actual - $cantidad;
		$filas = $this->productos->actualizarCantidadProducto($idpdt,$cantidad_nueva);

		return $filas;
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
		}

		include "views/admin/producto_detalle.php";
	}

	public function adminProductosLista(){

		$tipos = array('NORMAL','PREMIO','PROMOCION');
		$estados = array(1,0);
		
		$productosLista = $this->productos->listarProductos($tipos, $estados);

		include "views/admin/productos_lista.php";
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
		
		$paginasLista = $this->paginas->listarPaginas();

		include "views/admin/paginas_lista.php";	
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
		include "views/admin/usuarios_lista.php";
	}

	public function adminUsuarioDetalle($idusuario){

		extract($_POST);

		if (isset($_POST["crearUsuario"])) {			
			$this->usuarios->crearUsuario($nombre, $apellido, $sexo, $fecha_nacimiento, $email,"", $num_identificacion, 0, 0, $direccion, $telefono, $telefono_m, $tipo, $segmento, "", $estado, fecha_actual('datetime'), 0, $lider, $cod_lider, 0, $ciudad, 0);
		}

		if (isset($_POST["actualizarUsuario"])) {
			$this->usuarios->actualizarUsuario($idusuario, $nombre, $apellido, $sexo, $fecha_nacimiento, $email, 0, $direccion, $telefono, $telefono_m, $tipo, $segmento,'', $lider, $cod_lider, $ciudad);
		}

		if (isset($idusuario) && !empty($idusuario)) {
			$usuario = $this->usuarios->detalleUsuario($idusuario);
			$documentos = $this->usuarios->listarDocumentos($idusuario);
		}

		$lideres = 	$this->usuarios->listarUsuarios(array("REPRESENTANTE COMERCIAL"));
		$ciudades = $this->listarCiudades();

		include "views/admin/usuario_detalle.php";
	}


	/*****Ordenes*****/

	public function eliminarOrden(){

		if (isset($_POST["idorden"]) && !empty($_POST["idorden"])) {
			
			$filas = $this->ordenes->eliminarOrden($_POST["idorden"]);

		}else{
			$filas = 0;
		}

		$return = array('filas' => $filas);

		echo json_encode($return);
	}

	public function adminOrdenesLista(){

		$ordenesLista = $this->usuarios->listarOrdenes();
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
			$this->capacitacion->actualizarCategoria($idcategoria, $titulo, $contenido, $perfil, $estado);
		}

		if (isset($_POST["crearCategoria"])) {
			$idcategoria = $this->capacitacion->crearCategoria($titulo, $contenido, $perfil, $estado);
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

		if (isset($_POST["actualizarElemento"])) {
			$this->capacitacion->actualizarElemento($idelemento, $titulo, $tipo, $contenido2, $perfil, $estado, $categoria);
		}

		if (isset($_POST["crearElemento"])) {
			$idelemento = $this->capacitacion->crearElemento($titulo, $tipo, $contenido2, $perfil, $estado, $categoria);
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

		$cupones = $this->usuarios->listarCupones();
		include "views/admin/cupones_lista.php";
	}

	public function eliminarCupon(){
		if (isset($_POST["idcupon"]) && !empty($_POST["idcupon"])) {			
			
			$filas = $this->usuarios->eliminarCupon($_POST["idcupon"]);

		}else{
			$filas = 0;
		}

		$return = array('filas' => $filas);

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
}
?>