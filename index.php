<?php 
error_reporting(0);
session_start();

require "controller.php";

$controller = new Controller();

if (isset($_GET["url"]) && !empty($_GET["url"])) {

	$url = explode("/", $_GET["url"]);

	$var1 = $url[0];
	$var2 = $url[1];
	$var3 = $url[2];
	$var4 = $url[3];

	if ($var1 !='' && $var1 != URL_INICIO) {

		switch ($var1) {

			case URL_ADMIN:

				if (isset($var2) && $var2!='') {
					
					switch ($var2) {

						case URL_ADMIN_INICIO:
							$controller->adminInicio();
							break;

						case URL_ADMIN_PRODUCTOS:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminProductoDetalle($var3);							
								
							}else{
								$controller->adminProductosLista();
							}
							break;

						case URL_ADMIN_PAGINAS:
							if (isset($var3) && !empty($var3)) {
								
								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminPaginaDetalle($var3);							
								
							}else{
								$controller->adminPaginasLista();
							}
							break;

						case URL_ADMIN_BANNERS:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";								
								}
								$controller->adminBannerDetalle($var3);
								
							}else{
								$controller->adminBannersLista();
							}
							break;

						case URL_ADMIN_CATEGORIAS:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";							
								}
								$controller->adminCategoriaDetalle($var3);
								
							}else{
								$controller->adminCategoriasLista();
							}
							break;

						case URL_ADMIN_CAMPANAS:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";								
								}
								$controller->adminCampanaDetalle($var3);							
								
							}else{
								$controller->adminCampanasLista();
							}
							break;

						case URL_ADMIN_PLANTILLAS:
							if (isset($var3) && !empty($var3)) {
								
								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminPlantillaDetalle($var3);
								
							}else{
								$controller->adminPlantillasLista();
							}						
							break;

						case URL_ADMIN_USUARIOS:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminUsuarioDetalle($var3);							
								
							}else{
								$controller->adminUsuariosLista();
							}												
							break;

						case URL_ADMIN_ORDENES:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminOrdenDetalle($var3);							
								
							}else{
								$controller->adminOrdenesLista();
							}												
							break;

						case URL_ADMIN_INCENTIVOS:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminIncentivoDetalle($var3);							
								
							}else{
								$controller->adminIncentivosLista();
							}
							break;

						case URL_ADMIN_CAPACITACION_CATEGORIAS:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminCategoriaCapacitacionDetalle($var3);
								
							}else{
								$controller->adminCategoriasCapacitacionLista();
							}
							break;

						case URL_ADMIN_CAPACITACION_ELEMENTOS:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminElementoCapacitacionDetalle($var3);
								
							}else{
								$controller->adminElementosCapacitacionLista();
							}
							break;

						case URL_ADMIN_INGREDIENTES:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminIngredienteDetalle($var3);
								
							}else{
								$controller->adminIngredientesLista();
							}
							break;

						case URL_ADMIN_PROTOCOLOS:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminProtocoloDetalle($var3);							
								
							}else{
								$controller->adminProtocolosLista();
							}
							break;
						
						case URL_ADMIN_SUSCRIPTORES:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminSuscriptorDetalle($var3);
								
							}else{
								$controller->adminSuscriptoresLista();
							}
							break;

						case URL_ADMIN_TICKETS:
							if (isset($var3) && !empty($var3)) {								
								$controller->adminTicketsDetalle($var3);
							}else{
								$controller->adminTicketsLista();
							}							
							break;
						
						case URL_ADMIN_INFORMES:
							if (isset($var3) && !empty($var3)) {

								switch ($var3) {									
									case URL_ADMIN_INFORME_PYG:
										$controller->adminInformePyG();
										break;

									case URL_ADMIN_INFORME_USUARIOS:
										$controller->adminInformeUsuarios();
										break;
									
									case URL_ADMIN_INFORME_ORDENES:
										$controller->adminInformeOrdenes();
										break;

									case URL_ADMIN_INFORME_PRODUCTOS:
										$controller->adminInformeProductos();
										break;

									default:
										echo "El informe no existe";
										break;
								}
							}else{
								echo "El informe no existe";
							}							
							break;

						case URL_ADMIN_GEOLOCALIZACION:
							if (isset($var3) && !empty($var3)) {

								switch ($var3) {

									case URL_ADMIN_GEOLOCALIZACION_ZONAS:
										if (isset($var4) && !empty($var4)) {

											if ($var4=="Nuevo") {
												$var4 = "";
											}
											$controller->adminZonaDetalle($var4);
										}else{
											$controller->adminZonas();
										}
										break;

									case URL_ADMIN_GEOLOCALIZACION_REGIONES:
										if (isset($var4) && !empty($var4)) {

											if ($var4=="Nuevo") {
												$var4 = "";
											}
											$controller->adminRegionDetalle($var4);
										}else{
											$controller->adminRegiones();
										}										
										break;
									
									default:
										echo "Url no válida";
										break;
								}
							}else{
								echo "Url no válida";
							}
							break;

						case URL_ADMIN_PERSONAL:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminPersonalDetalle($var3);
							}else{
								$controller->adminPersonalLista();
							}							
							break;
						case URL_ADMIN_SALIR:
							$controller->personalCerrarSesion();
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
				if (isset($var2) && !empty($var2)) {
					$controller->paginaProductoDetalle($var2);
				}else{
					$controller->paginaProductos();
				}
				break;

			case URL_CATEGORIA:
				if (isset($var2) && !empty($var2)) {
					$controller->paginaCategoria($var2);
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

			case URL_BUSCAR:
				$controller->pageBuscar();
				break;

			case URL_USUARIO:
				if (isset($var2) && !empty($var2)) {

					switch ($var2) {
						case URL_USUARIO_PERFIL:
							$controller->usuarioPerfil();
							break;
						case URL_USUARIO_CAMBIAR_DATOS:
							if (isset($var3) && !empty($var3)) {
								$return = $var3;
							}else{
								$return = "";
							}
							$controller->usuarioCambiarDatos($return);
							break;
						case URL_USUARIO_NEGOCIO:
							$controller->usuarioNegocio();
							break;
						case URL_USUARIO_DETALLE_ORDEN:
							if (isset($var3) && !empty($var3)) {
								$controller->usuarioDetalleOrden($var3);
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

						case URL_USUARIO_COMPRAR:
							$controller->usuarioComprar();
							break;

						case URL_USUARIO_TICKETS:
							if (isset($var3) && !empty($var3)) {
								if ($var3=="Nuevo") {
									$controller->usuarioNuevoTicket();
								}else{
									$controller->usuarioDetalleTicket($var3);
								}
							}else{
								$controller->usuarioTickets();
							}							
							break;

						case URL_USUARIO_REFERIR:
							$controller->usuarioReferir();
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
				if (isset($var2) && !empty($var2)) {
					switch ($var2) {
						case URL_CARRITO_AGREGAR:
							$controller->agregarPdtCarrito();
							break;

						case URL_CARRITO_ACTUALIZAR_CANTIDAD:
							$controller->actualizarCantidadPdt();
							break;

						case URL_CARRITO_ELIMINAR_PRODUCTO:
							$controller->eliminarPdtCarrito();
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
				if (isset($var2) && !empty($var2)) {
					echo $controller->contenidoPagina($var2);
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

			case URL_SALIR_REMOTO:
				$controller->salirUsuarioRemoto();
				break;
			
			default:
				$controller->paginaContenido($var1);
				break;
		}
		
	}else{
		/* Página de Inicio */
		$controller->pageInicio();
	}
}else{
	$controller->pageInicio();
}

?>