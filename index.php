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
								}else{

								}
								
							}else{
								$controller->adminCodigosPuntosLista();
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

				if (isset($var2) && !empty($var2)) {
					
					switch ($var2) {
						
						case URL_CLUB_PRODUCTO:
							
							if (isset($var3) && !empty($var3)) {
								
								$controller->detalleProductoClub($var3);

							}else{
								
								header('Location: '.URL_CLUB);
							}
							break;

						case URL_CLUB_PERFIL:
							
							$controller->perfilClub();
							break;

						case URL_CLUB_BANCO_PUNTOS:
							
							$controller->bancoPuntos();
							break;

						case URL_CLUB_CARRITO:
							$controller->carritoClub();
							break;

						case 'PEDIDO':
							
							include 'views/club/pedido-regalo.php';
							break;

						case 'CONFIRMACION':
							
							include 'views/club/confirmacion-regalo.php';
							break;

						case 'DETALLE':
							
							include 'views/club/detalle-regalo.php';
							break;

						case 'FINALIZAR':
							
							include 'views/club/finalizar.php';
							break;

						default:
							# code...
							break;
					}

				}else{

					$controller->homeClub();

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

			case URL_TIENDAS:
				$controller->pageTiendas();
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
			
			case COSMETICA_ECOLOGICA:
				$controller->landingCosmeticaEcologica();
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