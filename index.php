<?php 
error_reporting(0);
session_start();

require "controller.php";

$controller = new Controller();


$url = $_SERVER['REQUEST_URI'];
$url = explode("/", $url);

$dominio = $url[0];

/*
$var1 = $url[1];

if (isset($url[1])) {
	$var2 = $url[1];
}else{
	$var2 = '';
}

if (isset($url[2])) {
	$var3 = $url[2];
}else{
	$var3 = '';
}

if (isset($url[3])) {
	$var4 = $url[3];
}else{
	$var4 = '';
}
*/
$var1 = $url[2];

if (isset($url[3])) {
	$var2 = $url[3];
}else{
	$var2 = '';
}

if (isset($url[4])) {
	$var3 = $url[4];
}else{
	$var3 = '';
}

if (isset($url[5])) {
	$var4 = $url[5];
}else{
	$var4 = '';
}

if ($var2 !='' && $var2 != URL_INICIO) {

	switch ($var2) {
		case URL_ADMIN:

			if (isset($var3) && $var3!='') {

				switch ($var3) {
					case URL_ADMIN_INICIO:
						$controller->adminInicio();
						break;
					case URL_ADMIN_PRODUCTOS:
						if (isset($var4) && !empty($var4)) {

							if ($var4=="Nuevo") {
								$var4 = "";
							}
							$controller->adminProductoDetalle($var4);							
							
						}else{
							$controller->adminProductosLista();
						}
					break;

					case URL_ADMIN_PAGINAS:
						if (isset($var4) && !empty($var4)) {
							
							if ($var4=="Nuevo") {
								$var4 = "";
							}
							$controller->adminPaginaDetalle($var4);							
							
						}else{
							$controller->adminPaginasLista();
						}
						break;

					case URL_ADMIN_BANNERS:
						if (isset($var4) && !empty($var4)) {

							if ($var4=="Nuevo") {
								$var4 = "";								
							}
							$controller->adminBannerDetalle($var4);
							
						}else{
							$controller->adminBannersLista();
						}
						break;

					case URL_ADMIN_CATEGORIAS:
						if (isset($var4) && !empty($var4)) {

							if ($var4=="Nuevo") {
								$var4 = "";							
							}
							$controller->adminCategoriaDetalle($var4);
							
						}else{
							$controller->adminCategoriasLista();
						}
						break;

					case URL_ADMIN_CAMPANAS:
						if (isset($var4) && !empty($var4)) {

							if ($var4=="Nuevo") {
								$var4 = "";								
							}
							$controller->adminCampanaDetalle($var4);							
							
						}else{
							$controller->adminCampanasLista();
						}
						break;
					case URL_ADMIN_PLANTILLAS:
						if (isset($var4) && !empty($var4)) {
							
							if ($var4=="Nuevo") {
								$var4 = "";
							}
							$controller->adminPlantillaDetalle($var4);
							
						}else{
							$controller->adminPlantillasLista();
						}						
						break;

					case URL_ADMIN_USUARIOS:
						if (isset($var4) && !empty($var4)) {

							if ($var4=="Nuevo") {
								$var4 = "";
							}
							$controller->adminUsuarioDetalle($var4);							
							
						}else{
							$controller->adminUsuariosLista();
						}												
						break;

					case URL_ADMIN_ORDENES:
						if (isset($var4) && !empty($var4)) {

							if ($var4=="Nuevo") {
								$var4 = "";
							}
							$controller->adminOrdenDetalle($var4);							
							
						}else{
							$controller->adminOrdenesLista();
						}												
						break;

					case URL_ADMIN_INCENTIVOS:
						if (isset($var4) && !empty($var4)) {

							if ($var4=="Nuevo") {
								$var4 = "";								
							}
							$controller->adminIncentivoDetalle($var4);							
							
						}else{
							$controller->adminIncentivosLista();
						}
						break;

					case URL_ADMIN_INGREDIENTES:
						if (isset($var4) && !empty($var4)) {

							if ($var4=="Nuevo") {
								$var4 = "";
							}
							$controller->adminIngredienteDetalle($var4);
							
						}else{
							$controller->adminIngredientesLista();
						}
						break;

					case URL_ADMIN_PROTOCOLOS:
						if (isset($var4) && !empty($var4)) {

							if ($var4=="Nuevo") {
								$var4 = "";
							}
							$controller->adminProtocoloDetalle($var4);							
							
						}else{
							$controller->adminProtocolosLista();
						}
						break;
					
					case URL_ADMIN_SUSCRIPTORES:
						if (isset($var4) && !empty($var4)) {

							if ($var4=="Nuevo") {
								$var4 = "";
							}
							$controller->adminSuscriptorDetalle($var4);
							
						}else{
							$controller->adminSuscriptoresLista();
						}
						break;
					
					case URL_ADMIN_PYG:
						$controller->adminPyG();
						break;

					default:
					# code...
					break;
				}
				
			}else{
				$controller->adminLoguin();
			}
			
			break;

		case URL_PRODUCTOS:
			if (isset($var3) && !empty($var3)) {
				$controller->paginaProductoDetalle($var3);
			}else{
				$controller->paginaProductos();
			}
			break;

		case URL_CATEGORIA:
			if (isset($var3) && !empty($var3)) {
				$controller->paginaCategoria($var3);
			}else{
				$controller->paginaCategorias();
			}
			break;

		case URL_REGISTRO:
			$controller->pageRegistro();
			break;

		case URL_INGRESAR:
			$controller->pageIngresar();
			break;
		case URL_CONTACTO:
			$controller->pageContacto();
			break;

		case URL_RESTAURAR_CONTRASENA:
			$controller->pageRestaurarContrasena();
			break;

		case URL_USUARIO:
			if (isset($var3) && !empty($var3)) {

				switch ($var3) {
					case URL_USUARIO_PERFIL:
						$controller->usuarioPerfil();
						break;
					case URL_USUARIO_CAMBIAR_DATOS:
						if (isset($var4) && !empty($var4)) {
							$return = $var4;
						}else{
							$return = "";
						}
						$controller->usuarioCambiarDatos($return);
						break;
					case URL_USUARIO_NEGOCIO:
						$controller->usuarioNegocio();
						break;
					case URL_USUARIO_DETALLE_ORDEN:
						if (isset($var4) && !empty($var4)) {
							$controller->usuarioDetalleOrden($var4);
						}else{
							$controller->usuarioNegocio();
						}
						break;
					case URL_USUARIO_PREMIOS:
						$controller->usuarioPremios();
						break;
					case URL_USUARIO_INCENTIVOS:
						$controller->usuarioIncentivos();
						break;
					case URL_USUARIO_PROMOCIONES:
						$controller->usuarioPromociones();
						break;
					case URL_USUARIO_CUPONES:
						$controller->usuarioCupones();
						break;
					case URL_USUARIO_CAPACITACION:
						$controller->usuarioCapacitacion();						
						break;
					case URL_USUARIO_DOCUMENTOS:
						$controller->usuarioDocumentos();
						break;
					case URL_USUARIO_PUNTOS:
						$controller->usuarioPuntos();
						break;

					case URL_USUARIO_CLIENTES:
						$controller->usuarioClientes();
						break;

					case URL_USUARIO_CUENTA:
						$controller->usuarioCuentaVirtual();
						break;

					case URL_SALIR:						
						$controller->usuarioCerrarSesion();
						break;

					default:
						$controller->usuarioPerfil();
						break;
				}
			}else{
				$controller->usuarioPerfil();	
			}			
			break;

		case URL_CARRITO:
			if (isset($var3) && !empty($var3)) {
				switch ($var3) {
					case URL_CARRITO_AGREGAR:
						$controller->agregarPdtCarrito();
						break;

					case URL_CARRITO_ACTUALIZAR_CANTIDAD:
						$controller->actualizarCantidadPdt();
						break;						

					case URL_ACTUALIZAR_TOTAL_CARRITO:
						$controller->actualizarTotalCarrito();
						break;
					
					default:
						header("Location: ".URL_CARRITO);
					break;
				}
			}else{
				$controller->verCarrito();	
			}			
			break;

		case URL_RESUMEN_COMPRA:
			$controller->verResumenCompra();
			break;

		case URL_GENERAR_ORDEN:
			$controller->generarOrden();
			break;

		case URL_PAGINA_CONTENIDO:
			if (isset($var3) && !empty($var3)) {
				echo $controller->contenidoPagina($var3);
			}else{
				return false;
			}
			break;

		case URL_SUSCRIBIR_NEWSLETTER:
			echo $controller->suscribirNewsletter();
			break;

		case URL_INGRESO_REMOTO:
			$controller->ingresoUsuarioRemoto();
			break;
		
		default:
			$controller->paginaContenido($var2);
			break;
	}
	
}else{
	/* Página de Inicio */
	$controller->pageInicio();
}

?>