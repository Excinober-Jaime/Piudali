<?php

/**
* 
*/

class ControllerClub
{

	public $puntos_disponibles = 0;
	public $response_codigo = '';
	public $valor_punto = 5; //Pesos que vale un punto de CONSUMIDOR
	public $cobro_flete = false; //Flete para consumidores del club
	
	function __construct()
	{
		$this->usuarios = new Usuarios();
		$this->productos = new Productos();
		$this->codigos_puntos = new CodigosPuntos();
		$this->carrito = new Carrito();
		$this->puntos = new Puntos();
		$this->ordenes = new Ordenes();
		$this->banners = new Banners();
		$this->entradas = new Entradas();
		$this->ventas_virtuales = new VentasVirtuales();
		$this->productos_aliados = new ProductosAliados();
		$this->organizaciones = new Organizaciones();
		$this->sucursales = new Sucursales();
		$this->paginas = new Paginas();

		Carrito::$valor_punto = $this->valor_punto;
		Carrito::$cobro_flete = $this->cobro_flete;
		
		//Loguear usuario

		if (isset($_POST['ingresarUsuario'])) {

			extract($_POST);

			$response = $this->loguearUsuario($email, md5($password), array(), $return_login);

			if (isset($_SESSION['idusuario']) && !empty($_SESSION['idusuario'])) {
				
				if (!empty($response) && is_array($response)) {

					$response_codigo = $response;
				}

			}else{

				if (!empty($response)) {
				
				echo "<script> alert('Los datos de acceso son incorrectos. Por favor intenta de nuevo'); </script>";
				}	
			
			}
		}

		//Registrar usuario 

		if (isset($_POST['registrarUsuario'])) {

			extract($_POST);

			$response = $this->registrarConsumidor($num_identificacion, $nombre, $apellido, $email, $ciudad, $telefono, $contrasena);
		}


		if (isset($_POST['redimirCodigo']) && !empty($_POST['codigo'])) {

			$this->response_codigo = $this->redimirCodigoPuntos($_POST['codigo']);
			
		}

		if (isset($_SESSION['idusuario']) && !empty($_SESSION['idusuario'])) {
			
			$this->puntos_disponibles = $this->usuarios->puntosDisponibles($_SESSION['idusuario']);
		}

		//Validar si proviene de un enlace de distribuidor
		if (isset($_GET['d']) && !empty($_GET['d'])) {
			
			$_SESSION['iddistribuidor'] = $_GET['d'];

		}
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

	private function redimirCodigoPuntos($codigo){

		$codigo_detalle = $this->codigos_puntos->detalleCodigo($codigo);

			if (count($codigo_detalle)>0) {				
			
				if (!$codigo_detalle['redimido']) {

					if ($codigo_detalle['fecha_vencimiento'] >= fecha_actual('datetime')) {
				
						if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'CONSUMIDOR') {

							if (count($codigo_detalle)>0) {

								$filas = $this->codigos_puntos->redimirCodigo($codigo_detalle['codigo'], $_SESSION['idusuario']);

								if ($filas) {

									$estado_puntos = 1;
									
									$idnuevospuntos = $this->usuarios->asignarNuevosPuntos($codigo_detalle['puntos'], "CLUB PIUDALI", fecha_actual('datetime'), 0, $estado_puntos, $_SESSION['idusuario'], 0);

									if ($idnuevospuntos) {

										if (isset($_SESSION['codigo_por_asignar'])) {
											
											unset($_SESSION['codigo_por_asignar']);
										}

										return array(
								
											'estado' => 'ASIGNADO',
											'codigo' => $codigo_detalle
										);
									}
								}
							}

						}else{						
							
							$_SESSION['codigo_por_asignar'] = $codigo_detalle;

							return array(

								'estado' => 'AUTENTICAR',
								'codigo' => $codigo_detalle
							);	
						}
					}else{
						
						return array(					
							'estado' => 'VENCIDO'
						);	
					}

				}else{

					return array(					
						'estado' => 'REDIMIDO'
					);	
				}

			}else{

				return array(					
						'estado' => 'NO EXISTE'
					);	
			}
	}

	public function homeClub() {

		$posicion_banners = 'CLUB';
		$estados_banners = array(1);
		$banners = $this->banners->listarBanners($posicion_banners,$estados_banners);

		$ciudades = $this->usuarios->listarCiudades();

		$entradas = $this->entradas->listarEntradas(array(1), 'LIMIT 3');

		$productos_club = $this->productos->listarProductos(array('CLUB PIUDALI'), array(1));
		$productos_aliados = $this->productos_aliados->listarProductos(array(1));

		array_rand($productos_club);
		array_rand($productos_aliados);


		if (isset($_SESSION['idusuario']) && !empty($_SESSION['ciudades_idciudad']) && isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'CONSUMIDOR') {
			
			$organizaciones_en_ciudad = $this->organizaciones->disponible_ciudad($_SESSION['ciudades_idciudad']);

			foreach ($productos_aliados as $key => $producto_aliado) {
				
				foreach ($organizaciones_en_ciudad as $key2 => $organizacion) {
					
					if ($producto_aliado['organizaciones_idorganizacion'] == $organizacion['idorganizacion']) {
						
						$productos_aliados_filtrado[] = $producto_aliado;
						break;
					}
				}
			}

			$productos_aliados = $productos_aliados_filtrado;
		}

		foreach ($productos_club as $key => $producto_club) {
			
			$productos_club[$key]['tipo'] = 'CLUB';
		}

		foreach ($productos_aliados as $key => $producto_aliado) {
			
			$productos_aliados[$key]['tipo'] = 'ALIADO';
		}

		$productos_redimir = array_merge($productos_aliados, $productos_club);
		shuffle($productos_redimir);



		/*for ($i=0; $i < 8; $i++) {
			
			shuffle($opciones);

			if ($opciones[0] == 'CLUB') {
				
				if (isset($productos_club[0])) {
					
					$productos_redimir[$i] = $productos_club[0];
					$productos_redimir[$i]['tipo'] = 'CLUB';
					unset($productos_club[0]);

				}elseif (isset($productos_aliados[0])) {
					
						$productos_redimir[$i] = $productos_aliados[0];
						$productos_redimir[$i]['tipo'] = 'ALIADOS';
						unset($productos_aliados[0]);
					
				}

			}else{

				if (isset($productos_aliados[0])) {
					
					$productos_redimir[$i] = $productos_aliados[0];
					$productos_redimir[$i]['tipo'] = 'ALIADOS';
					unset($productos_aliados[0]);

				}elseif (isset($productos_club[0])) {
					
						$productos_redimir[$i] = $productos_club[0];
						$productos_redimir[$i]['tipo'] = 'CLUB';
						unset($productos_club[0]);	

				}
			}
		}*/



		//var_dump(count($productos_aliados));

		include "views/club/inicio.php";
	}

	public function detalleProductoClub($urlpdt=''){

		if (isset($_POST['redimirCodigo']) && !empty($_POST['codigo'])) {

			$response_codigo = $this->redimirCodigoPuntos($_POST['codigo']);	
		}
	
		$producto = $this->productos->detalleProductos(0,$urlpdt);
		$producto = $producto[0];

		include 'views/club/detalle_premio.php';
	}

	public function detalleProductoAliadoClub($urlpdt=''){

		/*if (isset($_POST['redimirCodigo']) && !empty($_POST['codigo'])) {

			$response_codigo = $this->redimirCodigoPuntos($_POST['codigo']);	
		}*/
		
		$producto = $this->productos_aliados->detalleProductoUrl($urlpdt);
		$organizacion =$this->organizaciones->detalleOrganizacion($producto['organizaciones_idorganizacion']);

		$sucursales = $this->sucursales->listarSucursales($organizacion['idorganizacion']);

		include 'views/club/detalle_producto_aliado.php';
	}

	public function opcionesRedimirPuntos(){

		$productos_club = $this->productos->listarProductos(array('CLUB PIUDALI'), array(1));
		$productos_aliados = $this->productos_aliados->listarProductos(array(1));

		array_rand($productos_club);
		array_rand($productos_aliados);

		$opciones = array('CLUB', 'ALIADOS');

		$productos_redimir = array_merge($productos_aliados, $productos_club);
		shuffle($productos_redimir);



		/*for ($i=0; $i < $total_opciones; $i++) { 
			
			shuffle($opciones);

			if ($opciones[0] == 'CLUB') {
				
				if (isset($productos_club[0])) {
					
					$productos_redimir[$i] = $productos_club[0];
					$productos_redimir[$i]['tipo'] = 'CLUB';
					unset($productos_club[0]);

				}else{

					if (isset($productos_aliados[0])) {
					
						$productos_redimir[$i] = $productos_aliados[0];
						$productos_redimir[$i]['tipo'] = 'ALIADOS';
						unset($productos_aliados[0]);
					}
				}

			}else{

				if (isset($productos_aliados[0])) {
					
					$productos_redimir[$i] = $productos_aliados[0];
					$productos_redimir[$i]['tipo'] = 'ALIADOS';
					unset($productos_aliados[0]);

				}else{

					if (isset($productos_club[0])) {
					
						$productos_redimir[$i] = $productos_club[0];
						$productos_redimir[$i]['tipo'] = 'CLUB';
						unset($productos_club[0]);

					}

				}
			}
		}*/
		

		include 'views/club/en_que_redimir.php';
	}

	public function perfilClub(){

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

		if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'CONSUMIDOR') {

			if (isset($_POST['redimirCodigo']) && !empty($_POST['codigo'])) {

				$response_codigo = $this->redimirCodigoPuntos($_POST['codigo']);	
			}
			
			$usuario = $this->usuarios->detalleUsuario($_SESSION['idusuario']);
			$ciudades = $this->usuarios->listarCiudades();
			//$puntos = $this->usuarios->puntosDisponibles($_SESSION['idusuario']);

			include 'views/club/perfil.php';	

		}else{

			header('Location: '.URL_CLUB);
		}
		
	}


	public function carritoClub(){

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

		$tipo_usuario = 'CONSUMIDOR';

		$itemsCarrito = $this->carrito->listarItems();
		$subtotalAntesIva = $this->carrito->getSubtotalAntesIva();
		$subtotalAntesIvaPremios = $this->carrito->getSubtotalAntesIvaPremios();
		$descuentoCupon = $this->carrito->getDescuentoCupon();
		$subtotalNetoAntesIva = $this->carrito->getSubtotalNetoAntesIva();
		$descuentoEscala = $this->carrito->getDescuentoEscala($tipo_usuario);
		$porcDescuentoEscala = $this->carrito->porcDescuentoEscala($tipo_usuario);
		$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva();

		$retencion = $this->carrito->getRTF($tipo_usuario);

		$pagoPuntos = $this->carrito->getPagoPuntos();

		$iva = $this->carrito->getIva();
		$flete = $this->carrito->calcularFlete();
		$total = $this->carrito->getTotal();
		$rentabilidad = $this->carrito->getRentabilidad();

		include "views/club/carrito.php";
	}

	public function resumenCompraClub(){

		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"]) && $_SESSION["tipo"]== 'CONSUMIDOR') {

			$tipo_usuario = 'CONSUMIDOR';

			$itemsCarrito = $this->carrito->listarItems();
			$subtotalAntesIva = $this->carrito->getSubtotalAntesIva();
			$subtotalAntesIvaPremios = $this->carrito->getSubtotalAntesIvaPremios();
			$descuentoCupon = $this->carrito->getDescuentoCupon();
			$subtotalNetoAntesIva = $this->carrito->getSubtotalNetoAntesIva();
			$descuentoEscala = $this->carrito->getDescuentoEscala($tipo_usuario);
			$porcDescuentoEscala = $this->carrito->porcDescuentoEscala($tipo_usuario);
			$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva();
			$retencion = $this->carrito->getRTF($tipo_usuario);
			$pagoPuntos = $this->carrito->getPagoPuntos();
			$iva = $this->carrito->getIva();
			$flete = $this->carrito->calcularFlete();
			$total = $this->carrito->getTotal();
			$rentabilidad = $this->carrito->getRentabilidad();

			include "views/club/resumen_compra.php";
		}
	}

	public function generarOrdenClub(){

		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"]) && count($_SESSION["idpdts"])>0 && count($_SESSION["cantidadpdts"])>0 && $_SESSION["tipo"]== 'CONSUMIDOR') {

			$tipo_usuario = 'CONSUMIDOR';

			$codigo_orden = $this->carrito->generarCodOrden();
			$fecha_pedido = fecha_actual("date");

			$subtotalAntesIva = $this->carrito->getSubtotalAntesIva();
			$subtotalAntesIvaPremios = $this->carrito->getSubtotalAntesIvaPremios();
			$descuentoCupon = $this->carrito->getDescuentoCupon();
			$descuentoEscala = $this->carrito->getDescuentoEscala($tipo_usuario);
			$porcDescuentoEscala = $this->carrito->porcDescuentoEscala($tipo_usuario);
			$totalNetoAntesIva = $this->carrito->getTotalNetoAntesIva();
			$retencion = $this->carrito->getRTF($tipo_usuario);
			$detalleOrden = $this->carrito->getDetalleOrden($tipo_usuario);
			
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


	public function bancoPuntos(){

		if (isset($_SESSION['idusuario']) && $_SESSION['tipo'] == 'CONSUMIDOR') {

			if (isset($_POST['redimirCodigo']) && !empty($_POST['codigo'])) {

				$response_codigo = $this->redimirCodigoPuntos($_POST['codigo']);	
			}

			$puntos_banco = $this->puntos->listarPuntosDisponibles($_SESSION['idusuario']);
			$puntos = $this->usuarios->puntosDisponibles($_SESSION['idusuario']);

			include 'views/club/banco_puntos.php';


		}else{

			header('Location: '.URL_CLUB);
		}
	}

	private function loguearUsuario($email, $password, $usuarioremoto = array(), $return_login=''){

		$usuario = $this->usuarios->loguearUsuario($email, $password);
		$usuario = $usuario[0];

		if (count($usuario)>0) {
			
			$this->usuarios->actualizarSesion($usuario["idusuario"], $usuario["nombre"], $usuario["apellido"], $usuario["email"], $usuario["telefono"], $usuario["telefono_m"], $usuario["direccion"], $usuario["ciudades_idciudad"], $usuario["ciudad"], $usuario["tipo"], $usuario["lider"], $usuario["organizaciones_idorganizacion"], $usuarioremoto);

			if ($usuario['tipo'] == 'CONSUMIDOR') {

				if (isset($_SESSION['codigo_por_asignar']) && !empty($_SESSION['codigo_por_asignar'])) {
					
					$response_codigo = $this->redimirCodigoPuntos($_SESSION['codigo_por_asignar']['codigo']);

					return $response_codigo;

				}else{

					if (isset($return_login) && !empty($return_login)) {
						
						header("Location: ".$return_login);

					}else{

						header("Location: ".URL_SITIO.URL_CLUB);	
					}
					
					
				}

			}else{

				header("Location: ".URL_USUARIO."/".URL_USUARIO_PERFIL);
			}

		}else{

			return true;
		}
	}

	public function listarProductosClub(){

		$tipos = array('NORMAL');
		$estados = array(1);
		$productos = $this->productos->listarProductos($tipos, $estados);

		include 'views/club/productos_lista.php';

	}

	public function listarPremiosClub(){

		$tipos = array('CLUB PIUDALI');
		$estados = array(1);
		$premios = $this->productos->listarProductos($tipos, $estados);

		include 'views/club/premios_lista.php';

	}

	public function contenidoEntrada($url){

		$entrada = $this->entradas->detalleEntradaUrl($url);

		include 'views/club/detalle_entrada.php';
	}

	public function entradasClub(){

		$entradas = $this->entradas->listarEntradas(array(1));

		include 'views/club/entradas_lista.php';
	}

	public function paginaClub($url){

		$pagina = $this->paginas->contenidoPagina($url);

		include 'views/club/pagina.php';
	}



}
?>