<?php 
error_reporting(0);
session_start();

require "controller.php";
require "controllerClub.php";
require "controllerTienda.php";
require "controllerPOS.php";

if (isset($_GET["url"]) && !empty($_GET["url"])) {

	$url = explode("/", $_GET["url"]);

	$var1 = $url[0];
	$var2 = $url[1];
	$var3 = $url[2];
	$var4 = $url[3];

	if ($var1 !='' && $var1 != URL_INICIO) {

		switch ($var1) {

			case URL_ADMIN:

				$controller = new Controller();

				if (isset($var2) && $var2!='') {

					if (!$_SESSION["admin"]) {
					
						header('Location: '.URL_SITIO.URL_ADMIN);

					}
					
					switch ($var2) {

						case URL_ADMIN_INICIO:
							$controller->adminInicio();
							break;

						case URL_ADMIN_EXPORT:
							if (isset($var3) && !empty($var3)) {

								switch ($var3) {
									case URL_ADMIN_USUARIOS:
										$controller->adminExportData($var3);	
									break;
									
									default:
										# code...
										break;
								}
							}
							break;

						case URL_ADMIN_CODIGOS_PUNTOS:
							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$controller->adminGenerarCodigosPuntos();	
								}
								
							}else{
								
								$controller->adminCodigosPuntosLista();
							}
							break;

						case URL_ADMIN_CODIGOS_PUNTOS_IMPRIMIR:
							if (isset($var3) && !empty($var3)) {

								$controller->adminCodigosPuntosImprimir($var3);

							}else{

								header('Location: '.URL_SITIO.URL_ADMIN.'/'.URL_ADMIN_CODIGOS_PUNTOS);
							}
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

						case URL_ADMIN_ORGANIZACIONES:

							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminOrganizacionDetalle($var3);							
								
							}else{
								$controller->adminOrganizacionesLista();
							}
							break;

						case URL_ADMIN_SUCURSALES:

							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminSucursalDetalle($var3);							
								
							}else{
								$controller->adminSucursalesLista();
							}
							break;

						case URL_ADMIN_PRODUCTOS_ALIADOS:

							if (isset($var3) && !empty($var3)) {

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminProductoAliadoDetalle($var3);							
								
							}else{
								$controller->adminProductosAliadosLista();
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

						case URL_ADMIN_ENTRADAS_CLUB:
							if (isset($var3) && !empty($var3)) {
								
								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminEntradaDetalle($var3);
								
							}else{
								$controller->adminEntradasLista();
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

						case URL_ADMIN_DESCUENTOS_ESPECIALES:
							if (isset($var3) && !empty($var3)) {

								if ($var3 == URL_ADMIN_DESCUENTOS_ESPECIALES_VINCULAR) {
									$controller->adminDescuentoEspecialVincular();
								}else{

									if ($var3=="Nuevo") {
										$var3 = "";								
									}
									$controller->adminDescuentoEspecialDetalle($var3);
								}
							}else{
								$controller->adminDescuentosEspeciales();
							}
							break;

						case URL_ADMIN_CANALES_DISTRIBUCION:
							
							if (isset($var3) && !empty($var3)) {

								if ($var3 == URL_ADMIN_CANALES_DISTRIBUCION_VINCULAR) {
									$controller->adminCanalDistribucionVincular();
								}
								elseif ($var3 == URL_ADMIN_CANALES_DISTRIBUCION_ELIMINAR) {
									$controller->adminCanalDistribucionEliminar();
								}else{

									if ($var3=="Nuevo") {
										$var3 = "";								
									}
									$controller->adminCanalDistribucionDetalle($var3);
								}
							}else{
								$controller->adminCanalesDistribucion();
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

									$controller->adminUsuarioNuevo();		

								}else{

									$controller->adminUsuarioDetalle($var3);				
								}
												
								
							}else{
								$controller->adminUsuariosLista();
							}												
							break;

						case URL_ADMIN_ORDENES:						
							if (isset($var3) && !empty($var3)) {

								if ($var3==URL_ADMIN_ELIMINAR_ORDEN) {
									$controller->eliminarOrden();
								}else{

									if ($var3=="Nuevo") {
										$var3 = "";
									}
									$controller->adminOrdenDetalle($var3);							
								}
								
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

									case URL_ADMIN_INFORME_PAGOS:
										$controller->adminInformePagos();
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
						case URL_ADMIN_CUPONES:
							if (isset($var3) && !empty($var3)) {								

								if ($var3=="Nuevo") {
									$var3 = "";
								}
								$controller->adminCuponDetalle($var3);
																
							}else{
								$controller->adminCuponesLista();
							}
							break;

						case URL_ADMIN_PAGOS_COMISIONES:
							if (isset($var3) && !empty($var3)) {

								if ($var3==URL_ADMIN_PAGO_COMISION) {

									$controller->adminPagoComision();								
								}	
																
							}else{
								$controller->adminPagosComisiones();
							}						
							break;

						case URL_ADMIN_PAGOS_INCENTIVOS:
							if (isset($var3) && !empty($var3)) {

								if ($var3==URL_ADMIN_PAGO_INCENTIVO) {

									$controller->adminPagoIncentivo();
								}	
																
							}else{
								$controller->adminPagosIncentivos();
							}
							break;

						case URL_ADMIN_SALIR:
							$controller->personalCerrarSesion();
							break;

						case URL_ADMIN_ELIMINAR_ENTIDAD:
							$controller->eliminarEntidad();
							break;

						default:
						# code...
						break;
					}
					
				}else{

					$controller->adminLoguin();
				}
				
				break;

			case URL_CLUB:

				$controllerClub = new ControllerClub();

				if (isset($var2) && !empty($var2)) {
					
					switch ($var2) {

						case URL_CLUB_ENTRADAS:
							
							if (isset($var3) && !empty($var3)) {
								
								$controllerClub->contenidoEntrada($var3);

							}else{

								$controllerClub->entradasClub();
							}							
							break;

						case URL_CLUB_PRODUCTOS:							
												
							$controllerClub->listarProductosClub($var3);
							
							break;

						case URL_CLUB_PREMIOS:
												
							$controllerClub->listarPremiosClub($var3);
							
							break;
						
						case URL_CLUB_PRODUCTO:
							
							if (isset($var3) && !empty($var3)) {
								
								$controllerClub->detalleProductoClub($var3);

							}else{
								
								header('Location: '.URL_CLUB);
							}
							break;

						case URL_CLUB_PRODUCTO_ALIADO:
							
							if (isset($var3) && !empty($var3)) {
								
								$controllerClub->detalleProductoAliadoClub($var3);

							}else{
								
								header('Location: '.URL_CLUB);
							}
							break;

						case URL_CLUB_EN_QUE_REDIMIR:
							
							$controllerClub->opcionesRedimirPuntos();

							break;

						case URL_CLUB_PERFIL:
							
							$controllerClub->perfilClub();
							break;

						case URL_CLUB_BANCO_PUNTOS:
							
							$controllerClub->bancoPuntos();
							break;

						case URL_CLUB_CARRITO:
							$controllerClub->carritoClub();
							break;

						case URL_CLUB_RESUMEN_COMPRA:
							$controllerClub->resumenCompraClub();
							break;

						case URL_CLUB_GENERAR_ORDEN:
							$controllerClub->generarOrdenClub();
							break;

						case URL_CLUB_PAGINAS:
							
							if (isset($var3) && !empty($var3)) {

								$controllerClub->paginaClub($var3);
							
							}else{

								header('Location: '.URL_CLUB);
							}

							break;

						default:
							# code...
							break;
					}

				}else{

					$controllerClub->homeClub();

				}
				break;

			case URL_TIENDA:
				
				$controllerTienda = new ControllerTienda();

				if (isset($var2) && !empty($var2)) {
					
					switch ($var2) {

						case URL_TIENDA_PERFIL:
							
							$controllerTienda->perfilTienda();
							
							break;

						case URL_TIENDA_PRODUCTO:
							
							if (isset($var3) && !empty($var3)) {

								$controllerTienda->inicioTienda($var3);
							
							}else{

								header('Location: '.URL_SITIO.URL_CLUB);

							}							
							break;

						case URL_TIENDA_PRODUCTOS:
							
							$controllerTienda->productosTienda();
							
							break;

						case URL_TIENDA_CARRITO:
							$controllerTienda->carritoTienda();
							break;

						case URL_TIENDA_RESUMEN_COMPRA:
							$controllerTienda->resumenCompraTienda();
							break;

						case URL_TIENDA_GENERAR_ORDEN:
							$controllerTienda->generarOrdenTienda();
							break;

						default:

							header('Location: '.URL_SITIO.URL_CLUB);

						break;
					}

				}else{

					header('Location: '.URL_SITIO.URL_CLUB);

				}		

				break;

			case URL_POS:

				$controllerPOS = new ControllerPOS();

				if (isset($var2) && !empty($var2)) {

					switch ($var2) {

						case URL_POS_CERRAR_SESION:

							$controllerPOS->cerrar_sesion();	

							break;

						case URL_POS_CONSULTA:
							
							$controllerPOS->consultar_cliente();

							break;

						case URL_POS_REDIMIR:
							
							$controllerPOS->redimir_puntos();

							break;
						
						default:
							# code...
							break;
					}

				}else{

					$controllerPOS->home();
				}

				break;
			
			case URL_PRODUCTOS:

				$controller = new Controller();

				if (isset($var2) && !empty($var2)) {
					$controller->paginaProductoDetalle($var2);
				}else{
					$controller->paginaProductos();
				}
				break;

			case URL_CATEGORIA:

				$controller = new Controller();

				if (isset($var2) && !empty($var2)) {
					$controller->paginaCategoria($var2);
				}else{
					$controller->paginaCategorias();
				}
				break;

			case URL_REGISTRO:

				$controller = new Controller();

				$controller->pageRegistro();
				break;

			case URL_INGRESAR:

				$controller = new Controller();

				$controller->pageIngresar();
				break;

			case URL_CONTACTO:

				$controller = new Controller();

				$controller->pageContacto();

				break;

			case URL_RESTAURAR_CONTRASENA:

				$controller = new Controller();

				$controller->pageRestaurarContrasena();

				break;

			case URL_BUSCAR:

				$controller = new Controller();
				
				$controller->pageBuscar();

				break;

			case URL_TIENDAS:

				$controller = new Controller();

				$controller->pageTiendas();

				break;

			case URL_USUARIO:

				$controller = new Controller();

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

							if (!Controller::$DISABLE_PREMIOS){

								$controller->usuarioPremios();

							}else{

								header('Location:'. URL_SITIO);

							}							
							break;

						case URL_USUARIO_INCENTIVOS:

							if (!Controller::$DISABLE_INCENTIVOS){

								$controller->usuarioIncentivos();

							}else{

								header('Location:'. URL_SITIO);

							}
							break;

						case URL_USUARIO_PROMOCIONES:

							if (!Controller::$DISABLE_PROMOCIONES){

								$controller->usuarioPromociones();

							}else{

								header('Location:'. URL_SITIO);

							}
							break;						
							
						case URL_USUARIO_CUPONES:

							if (!Controller::$DISABLE_CUPONES){

								$controller->usuarioCupones();

							}else{

								header('Location:'. URL_SITIO);

							}
							break;						

						case URL_USUARIO_CAPACITACION:

							if (!Controller::$DISABLE_CAPACITACION){

								$controller->usuarioCapacitacion();

							}else{

								header('Location:'. URL_SITIO);

							}
							break;					

						case URL_USUARIO_DOCUMENTOS:
							$controller->usuarioDocumentos();
							break;

						case URL_USUARIO_PUNTOS:
							
							if (!Controller::$DISABLE_PUNTOS){

								$controller->usuarioPuntos();
							}else{

							header('Location:'. URL_SITIO);

							}
							break;

						case URL_USUARIO_CLIENTES:
							$controller->usuarioClientes();
							break;

						case URL_USUARIO_CUENTA:
							$controller->usuarioCuentaVirtual();
							break;

						case URL_USUARIO_COMPRAR:

							if (!Controller::$DISABLE_COMPRAR){

								$controller->usuarioComprar();

							}else{

							header('Location:'. URL_SITIO);

							}
							break;

						case URL_USUARIO_VENTAS_VIRTUALES:
							$controller->usuarioVentasVirtuales();
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

							if (!Controller::$DISABLE_REFERIDOS){

								$controller->usuarioReferir();

							}else{

							header('Location:'. URL_SITIO);

							}
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

				$controller = new Controller();

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
				
				$controller = new Controller();

				$controller->verResumenCompra();

				break;

			case URL_GENERAR_ORDEN:

				$controller = new Controller();

				$controller->generarOrden();

				break;

			case URL_PAGINA_CONTENIDO:

				$controller = new Controller();

				if (isset($var2) && !empty($var2)) {
					echo $controller->contenidoPagina($var2);
				}else{
					return false;
				}
				break;

			case URL_SUSCRIBIR_NEWSLETTER:

				$controller = new Controller();

				echo $controller->suscribirNewsletter();
				break;

			case URL_INGRESO_REMOTO:

				$controller = new Controller();

				$controller->ingresoUsuarioRemoto();
				break;

			case URL_SALIR_REMOTO:

				$controller = new Controller();

				$controller->salirUsuarioRemoto();
				break;
			
			case COSMETICA_ECOLOGICA:

				$controller = new Controller();

				$controller->landingCosmeticaEcologica();

				break;

			default:

				$controller = new Controller();

				$controller->paginaContenido($var1);

				break;
		}
		
	}else{

		$controller = new Controller();
		/* Página de Inicio */
		$controller->pageInicio();
	}
}else{

	$controller = new Controller();

	$controller->pageInicio();
}

?>