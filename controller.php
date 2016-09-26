<?php
/**
* 
*/

/** Require Models **/
require "model/dbclass.php";
require "model/usuariosclass.php";
require "model/productosclass.php";
require "model/campanasclass.php";
require "model/carritoclass.php";
require "model/paginasclass.php";
require "model/bannersclass.php";

/** Require Includes **/
require "include/constantes.php";
require "include/functions.php";


class Controller
{

	public function __construct()
	{
		$this->usuarios = new Usuarios();	
		$this->productos = new Productos();
		$this->campanas = new Campanas();
		$this->carrito = new Carrito();
		$this->paginas = new Paginas();		
		$this->banners = new Banners();
	}


/**********************FRONT************************************************/

	public function paginaContenido($url){

		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		
		$categorias_menu = $this->categoriasMenu();

		$pagina_detalle = $this->paginas->contenidoPagina($url);
		
		include "views/pagina.php";
	}

	public function contenidoPagina($idpagina){
		$pagina = $this->paginas->detallePagina($idpagina);
		return $pagina[0]["contenido"];
	}


	public function paginasMenu(){
		$paginas_menu = $this->paginas->listarPaginas();
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

		$tipos = array('NORMAL');
		$estados = array(1);
		$productosLista = $this->productos->listarProductos($tipos, $estados);

		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");

		$categorias_menu = $this->categoriasMenu();

		require "views/producto/productos.php";
		include "views/inicio.php";
	}

	public function paginaProductos(){		
		
		$tipos = array('NORMAL');
		$estados = array(1);

		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");

		$posicion_banners="SIDEBAR";
		$estados_banners = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados_banners);
		$productosLista = $this->productos->listarProductos($tipos,$estados);		
		$categorias_menu = $this->categoriasMenu();

		require "views/producto/productos.php";
		include "views/productos_lista.php";
	}


	public function paginaCategoria($urlcategoria){
		
		$tipos = array('NORMAL');
		$estados = array(1);

		$detalle_categoria = $this->productos->detalleCategoriaUrl($urlcategoria);
		$idcategoria = $detalle_categoria["idcategoria"];

		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");

		$posicion_banners="SIDEBAR";
		$estados_banners = array(1);

		$banners = $this->banners->listarBanners($posicion_banners,$estados_banners);

		$productosLista = $this->productos->listarProductos($tipos,$estados,$idcategoria);
		$categorias_menu = $this->categoriasMenu();

		require "views/producto/productos.php";
		include "views/productos_categoria.php";
	}

	public function paginaProductoDetalle($urlproducto){
		
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");

		$posicion_banners="SIDEBAR";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners,$estados);
		$categorias_menu = $this->categoriasMenu();

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



/************USUARIOS**************/

	public function actualizarSesion($idusuario, $nombre, $apellido, $email, $telefono, $telefono_m, $direccion, $ciudades_idciudad, $ciudad, $tipo=""){
		
		$_SESSION["idusuario"] = $idusuario;
		$_SESSION["nombre"] = $nombre;
		$_SESSION["apellido"] = $apellido;
		$_SESSION["email"] = $email;
		$_SESSION["telefono"] = $telefono;
		$_SESSION["telefono_m"] = $telefono_m;
		$_SESSION["direccion"] = $direccion;
		$_SESSION["ciudades_idciudad"] = $ciudades_idciudad;
		$_SESSION["ciudad"] = $ciudad;

		if (!empty($tipo)) {
			$_SESSION["tipo"] = $tipo;
		}
		
	}

	public function pageRegistro(){

		$posicion_banners="SIDEBAR";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners,$estados);

		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		
		$categorias_menu = $this->categoriasMenu();
		$ciudades = $this->listarCiudades();

		if (isset($_POST["crearUsuario"])) {			

			extract($_POST);

			$tipo = "DISTRIBUIDOR";
			$foto = "";
			$estado = 1;
			$fecha_registro = date("Y-m-d H:i:s");			
			$passwordmd5 = md5($password);

			$idusuario = $this->usuarios->crearUsuario($nombre, $apellido, $sexo, $fecha_nacimiento, $email, $passwordmd5, $num_identificacion, $boletines, $condiciones, $direccion, $telefono, $telefono_m, $tipo, $foto, $estado, $fecha_registro, $ciudad);	
		
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

			echo "<script> alert('Tu registro fue exitoso. Por favor ingresa con tus datos'); window.location='".URL_INGRESAR."';</script>";			
		}

		include "views/registro.php";
	}

	public function pageIngresar(){

		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");

		$categorias_menu = $this->categoriasMenu();

		if (isset($_POST["ingresar"])) {
			extract($_POST);

			$password = md5($password);

			$usuario = $this->usuarios->loguearUsuario($email, $password);
			$usuario = $usuario[0];

			if (count($usuario)>0) {
				
				$this->actualizarSesion($usuario["idusuario"], $usuario["nombre"], $usuario["apellido"], $usuario["email"], $usuario["telefono"], $usuario["telefono_m"], $usuario["direccion"], $usuario["ciudades_idciudad"], $usuario["ciudad"], $usuario["tipo"]);
				header("Location: ".URL_USUARIO."/".URL_USUARIO_PERFIL);
			}else{

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
					
					$this->actualizarSesion($usuario["idusuario"], $usuario["nombre"], $usuario["apellido"], $usuario["email"], $usuario["telefono"], $usuario["telefono_m"], $usuario["direccion"], $usuario["ciudades_idciudad"], $usuario["ciudad"], $usuario["tipo"]);
					header("Location: ".URL_USUARIO."/".URL_USUARIO_PERFIL);
				}else{
					header("Location: ".URL_SITIO);
				}
			}else{
				header("Location: ".URL_SITIO);
			}
		}
	}

	public function pageRestaurarContrasena(){
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");

		$categorias_menu = $this->categoriasMenu();

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
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");

		$categorias_menu = $this->categoriasMenu();

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

		$moduloActual = URL_USUARIO_PERFIL;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();
		
		if (!empty($_SESSION["idusuario"])) {

			$usuario = $this->usuarios->detalleUsuario($_SESSION["idusuario"]);

			switch ($_SESSION["tipo"]) {
				case 'DISTRIBUIDOR':
					if (!empty($usuario["lider"])) {
						$lider = $this->usuarios->detalleUsuario($usuario["lider"]);
					}else{
						$lider = false;
					}
					break;

				case 'LIDER':
					$zona = $this->usuarios->zonaUsuario($_SESSION["idusuario"]);
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

		$moduloActual = URL_USUARIO_PERFIL;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();
		
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

				$actualizar_usuario = $this->usuarios->actualizarUsuario($_SESSION["idusuario"],$nombre, $apellido, $sexo, $fecha_nacimiento, $email, $boletines, $direccion, $telefono, $telefono_m, $foto, $ciudad);
			

				if (!empty($nueva_contrasena)) {
					
					$cambio_contrasena = $this->usuarios->cambiarContrasenaUsuario($_SESSION["idusuario"], md5($contrasena_actual), md5($nueva_contrasena));

					if ($cambio_contrasena===1) {
						
					}else{
						
					}
				}

				$info_ciudad = $this->usuarios->nombreCiudad($ciudad);
				$this->actualizarSesion($_SESSION["idusuario"], $nombre, $apellido, $email, $telefono, $telefono_m, $direccion, $ciudad, $info_ciudad["ciudad"]);

				if ($actualizar_usuario===1) {
					if (!empty($return)) {
						header("Location: ".URL_SITIO.$return);
					}				
				}


			}
			
			$ciudades = $this->listarCiudades();
			$usuario = $this->usuarios->detalleUsuario($_SESSION["idusuario"]);
			$usuario["ciudades_idciudad"];
			include "views/usuario_cambiar_datos.php";

		}else{
			header("Location: ".URL_SITIO);
		}
	}

	public function usuarioNegocio(){

		$moduloActual = URL_USUARIO_NEGOCIO;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();
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
				case 'DISTRIBUIDOR':
					$ordenes = $this->usuarios->listarOrdenesUsuario($_SESSION["idusuario"],$campana_seleccionada["fecha_ini"], $campana_seleccionada["fecha_fin"]);
					include "views/usuario_negocio.php";

					break;

				case 'LIDER':

					$distribuidores = $this->usuarios->listarDistribuidoresLider($_SESSION["idusuario"]);
					
					if (count($distribuidores)>0) {

						$estado_compras = "APROBADO";

						foreach ($distribuidores as $key => $distribuidor) {
							$compras_netas = $this->usuarios->comprasNetasPeriodo($campana_seleccionada["fecha_ini"], $campana_seleccionada["fecha_fin"],$estado_compras,$distribuidor["idusuario"]);
							$distribuidores[$key]["compras_netas"] = $compras_netas["compras_netas"];
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
		$moduloActual = URL_USUARIO_NEGOCIO;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();

		$orden = $this->usuarios->detalleOrden($idorden);

		include "views/usuario_detalle_orden.php";
	}

	public function usuarioClientes(){
		$moduloActual = URL_USUARIO_CLIENTES;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();

		$clientes = $this->usuarios->listarDistribuidoresLider($_SESSION["idusuario"]);

		include "views/lider_clientes.php";
	}

	public function usuarioCuentaVirtual(){
		$moduloActual = URL_USUARIO_CUENTA;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();		

		include "views/usuario_cuenta_virtual.php";
	}

	public function usuarioPremios(){

		$moduloActual = URL_USUARIO_PREMIOS;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();
		
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

		$moduloActual = URL_USUARIO_PROMOCIONES;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();
		
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

		$moduloActual = URL_USUARIO_INCENTIVOS;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();
		
		if (!empty($_SESSION["idusuario"])) {

			switch ($_SESSION["tipo"]) {

				case 'DISTRIBUIDOR':
					$usuario = array("DISTRIBUIDOR");
					$incentivos = $this->usuarios->listarIncentivos($usuario);
					$estado_compras = "APROBADO";


					if (count($incentivos)>0) {
						foreach ($incentivos as $key => $incentivo) {
							$compras_netas = $this->usuarios->comprasNetasPeriodo($incentivo["inicio"], $incentivo["fin"],$estado_compras,$_SESSION["idusuario"]);
							$incentivos[$key]["compras_netas"] = $compras_netas["compras_netas"];
							$incentivos[$key]["cumplimiento"] = ($incentivos[$key]["compras_netas"]/$incentivo["meta"])*100;
		 				}
					}
					
					include "views/usuario_incentivos.php";

					break;

				case 'LIDER':
					
					$usuario = array("LIDER");
					$incentivos = $this->usuarios->listarIncentivos($usuario);

					$distribuidores = $this->usuarios->listarDistribuidoresLider($_SESSION["idusuario"]);

					if (count($incentivos)>0) {
						
						foreach ($incentivos as $key => $incentivo) {
							
							if (count($distribuidores)>0) {

								$estado_compras = "APROBADO";

								foreach ($distribuidores as $distribuidor) {

									$compras_netas = $this->usuarios->comprasNetasPeriodo($incentivo["inicio"], $incentivo["fin"],$estado_compras,$distribuidor["idusuario"]);									
									$incentivos[$key]["compras_netas"] = $compras_netas["compras_netas"];
									$incentivos[$key]["cumplimiento"] = ($incentivos[$key]["compras_netas"]/$incentivo["meta"])*100;
								}
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

		$moduloActual = URL_USUARIO_CUPONES;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();
		
		if (!empty($_SESSION["idusuario"])) {			
			
			$cupones = $this->usuarios->listarCupones();			
			
			include "views/usuario_cupones.php";

		}else{
			header("Location: ".URL_SITIO);
		}
	}

	public function usuarioCapacitacion($seccion=""){

		$moduloActual = URL_USUARIO_CAPACITACION;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();
		$categorias = $this->productos->listarCategorias();
		


		if (!empty($_SESSION["idusuario"])) {
		
			switch ($seccion) {
				case URL_USUARIO_CAPACITACION_INGREDIENTES:
					$ingredientes = $this->usuarios->listarIngredientes();
					break;

				case 'Fichas':
					
					break;
				case 'Protocolos':
					# code...
					break;
				case 'Tutoriales':
					# code...
					break;
				
				default:
					# code...
					break;
			}			
			
			include "views/usuario_capacitacion.php";

		}else{
			header("Location: ".URL_SITIO);
		}	
	}

	public function usuarioPuntos(){
		
		$moduloActual = URL_USUARIO_PUNTOS;

		$posicion_banners="PANEL INTERNO";
		$estados = array(1);

		$banners = $this->banners->listarBanners($posicion_banners, $estados);
		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();

		if (!empty($_SESSION["idusuario"])) {	
			
			$puntos = $this->usuarios->listarPuntosUsuario($_SESSION["idusuario"]);		

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

/*************CARRITO******************************/
	
	public function verCarrito(){

		$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
		$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
		$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
		$categorias_menu = $this->categoriasMenu();

		if (isset($_POST["redimirCupon"])) {

			if (!empty($_POST["cupon_descuento"])) {
				$cupon = $_POST["cupon_descuento"];
				$cupon = $this->carrito->infoCupon($cupon);

				if (!empty($cupon)) {
					$_SESSION["idcupon"] = $cupon["idcodigo"];
					$_SESSION["valor_cupon"] = $cupon["val_descuento"];
					$_SESSION["aplicacion_cupon"] = $cupon["aplicacion"];
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
		$descuentoCupon = $this->carrito->getDescuentoCupon();
		$subtotalNetoAntesIva = $this->carrito->getSubtotalNetoAntesIva();
		$descuentoEscala = $this->carrito->getDescuentoEscala();
		$porcDescuentoEscala = $this->carrito->porcDescuentoEscala();
		$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva();
		$pagoPuntos = $this->carrito->getPagoPuntos();		

		$iva = $this->carrito->getIva();
		$flete = $this->carrito->calcularFlete();
		$total = $this->carrito->getTotal();
		$rentabilidad = $this->carrito->getRentabilidad();

		include "views/carrito.php";
	}

	public function verResumenCompra(){

		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"])) {
			
			$paginas_quienes_somos = $this->paginas->listarPaginas("QUIENES SOMOS");
			$paginas_donde_comprar = $this->paginas->listarPaginas("DONDE COMPRAR");
			$paginas_sin_categoria = $this->paginas->listarPaginas("SIN CATEGORIA");
			$categorias_menu = $this->categoriasMenu();

			$itemsCarrito = $this->carrito->listarItems();
			$subtotalAntesIva = $this->carrito->getSubtotalAntesIva();
			$descuentoCupon = $this->carrito->getDescuentoCupon();
			$subtotalNetoAntesIva = $this->carrito->getSubtotalNetoAntesIva();

			$descuentoEscala = $this->carrito->getDescuentoEscala();
			$porcDescuentoEscala = $this->carrito->porcDescuentoEscala();
			$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva();
			$pagoPuntos = $this->carrito->getPagoPuntos();

			$iva = $this->carrito->getIva();
			$flete = $this->carrito->calcularFlete();
			$total = $this->carrito->getTotal();
			$rentabilidad = $this->carrito->getRentabilidad();

			include "views/resumen_compra.php";

		}else{
			header("Location: ".URL_INGRESAR);
		}
		
	}

	public function generarOrden(){

		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"]) && count($_SESSION["idpdts"])>0 && count($_SESSION["cantidadpdts"])>0) {

			$codigo_orden = $this->carrito->generarCodOrden();
			$fecha_pedido = date("Y-m-d");
			$subtotalAntesIva = $this->carrito->getSubtotalAntesIva();
			$descuentoCupon = $this->carrito->getDescuentoCupon();
			$descuentoEscala = $this->carrito->getDescuentoEscala();
			$porcDescuentoEscala = $this->carrito->porcDescuentoEscala();
			$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva();
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

			//Cargar Nuevos Puntos
			$valor_punto = 1;
			$fecha_adquirido = date("Y-m-d H:i:s");
			$redimido = 0;

			$nuevos_puntos = $totalNetoAntesIva*($valor_punto/100);
			$idnuevospuntos = $this->usuarios->asignarNuevosPuntos($nuevos_puntos, "COMPRAS", $fecha_adquirido, $redimido, $_SESSION["idusuario"]);
		
			
			//Crear Orden
			$idorden = $this->carrito->generarOrden($codigo_orden, $fecha_pedido, $subtotalAntesIva, $descuentoCupon, $porcDescuentoEscala, $descuentoEscala, $totalNetoAntesIva, $iva, $pagoPuntos["puntos"], $pagoPuntos["valor_punto"], $flete, $total, $estado, $fecha_facturacion, $num_factura, $_SESSION["idusuario"]);
			
			if (count($detalleOrden)>0) {
				foreach ($detalleOrden as $key => $producto) {
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
			$responseUrl = "http://naturalvitalis.com/respagos.php";
			$signature=md5($ApiKey."~".$merchantId."~".$referenceCode."~".$amount."~COP");

			require "include/pago_payu.php";

			unset($_SESSION["idpdts"]);
			unset($_SESSION["cantidadpdts"]);
			
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


/**************************** ADMIN ***********************************/

	public function adminLoguin(){

		if (isset($_POST["ingresarAdmin"])) {
			$email = $_POST["email"];
			$password = md5($_POST["password"]);

			$admin = $this->usuarios->loguearPersonal($email, $password);			

			if (count($admin)>0) {
				$_SESSION["admin"] = true;
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

			$this->productos->actualizarProducto($idproducto,$nombre,$cantidad,$precio,$iva,$aplica_cupon,$precio_oferta,$presentacion,$registro,$codigo,$tipo,$descripcion,$img_principal,$url,$estado,$uso,$mas_info,$metas,$categoria,$compania,$relevancia);
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

			$idproducto = $this->productos->crearProducto($nombre,$cantidad,$precio,$iva,$aplica_cupon,$precio_oferta,$presentacion,$registro,$codigo,$tipo,$descripcion,$img_principal,$url,$estado,$uso,$mas_info,$metas,$categoria,$compania,$relevancia);
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
			$banner = $destino;
			$menu = $_POST["menu"];
			$estado = $_POST["estado"];			

			$this->paginas->actualizarPagina($idpagina,$titulo,$contenido,$banner,$menu,$estado);

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
			$banner = $destino;
			$menu = $_POST["menu"];
			$estado = $_POST["estado"];

			$url = convierte_url($_POST["url"]);

			$idpagina = $this->paginas->crearPagina($titulo,$url,$contenido,$banner,$menu,$estado);
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

			//var_dump($imagen);

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
		$fecha = date("Y-m-d");

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

		$ciudades = $this->listarCiudades();

		if (isset($idusuario) && $idusuario!='') {
			$usuario = $this->usuarios->detalleUsuario($idusuario);
		}
		
		include "views/admin/usuario_detalle.php";	
	}


	/*****Ordenes*****/
	public function adminOrdenesLista(){

		$ordenesLista = $this->usuarios->listarOrdenes();
		include "views/admin/ordenes_lista.php";
	}

	public function adminOrdenDetalle($idorden){

		$orden = $this->usuarios->detalleOrden($idorden);

		include "views/admin/orden_detalle.php";
	}

	public function adminIncentivosLista(){

		$usuarios = array('DISTRIBUIDOR','LIDER');

		$incentivos = $this->usuarios->listarIncentivos($usuarios);

		include "views/admin/incentivos_lista.php";
	}

	public function adminIncentivoDetalle($idincentivo){

		extract($_POST);

		if (isset($_POST["actualizarIncentivo"])) {
			$this->usuarios->actualizarIncentivo($idincentivo, $incentivo, $imagen, $inicio, $fin, $meta, $descripcion, $usuario);
		}

		if (isset($_POST["crearIncentivo"])) {
			//$idincentivo = $this->usuarios->crearIncentivo();			
		}

		if (isset($idincentivo) && $idincentivo!='') {
			$incentivo = $this->usuarios->incentivoDetalle($idincentivo);
		}			

		include "views/admin/incentivo_detalle.php";
	}

	/******INGREDIENTES************/

	public function adminIngredientesLista(){
		
		$ingredientes = $this->usuarios->listarIngredientes();
		include "views/admin/ingredientes_lista.php";	
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

}
?>