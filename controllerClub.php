<?php

/**
* 
*/

class ControllerClub
{

	public  $puntos_disponibles = 0;
	
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

		/****
		if (isset($_POST['redimirCodigo']) && !empty($_POST['codigo'])) {

			$response_codigo = $this->redimirCodigoPuntos($_POST['codigo']);
			
		}

		if (isset($_GET['ciudad_redimir']) && !empty($_GET['ciudad_redimir'])) {

			$ciudad_redimir = $_GET['ciudad_redimir'];

		}else{

			$ciudad_redimir = 4270;
		}
			
		if ($ciudad_redimir == 4270) { //Cali

			//Provisional artemisa
			$puntos_artemisa = array("Centro Comercial Chipichape Local 8-118","Centro Comercial Centenario Local 131","Centro Comercial Cosmocentro L 2-68","Centro Comercial Unicentro local 320 Pasillo 5","Centro Comercial Unicentro Local 449 Oasis","Centro Cra 5 No.12-16","Avenida Estación No.5CN-34","Avenida Roosevelt No.25-32");

			$i = 0;

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

		if ($ciudad_redimir == 3394) { //Bogotá	
			

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

			$i = 0;

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

		$json_maps = json_encode($distribuidores);
		****/

		$entradas = $this->entradas->listarEntradas(array(1), 'LIMIT 3');

		$productos_club = $this->productos->listarProductos(array('CLUB PIUDALI'), array(1));
		$productos_aliados = $this->productos_aliados->listarProductos();

		$random_productos_club = array_rand($productos_club);
		$random_productos_aliados = array_rand($productos_aliados);

		$opciones = array('CLUB', 'ALIADOS');

		$productos_redimir = array();

		for ($i=0; $i < 8; $i++) { 
			
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

		}

		$valor_punto = 1; //Pesos que vale un punto

		include "views/club/inicio.php";
	}

	public function detalleProductoClub($urlpdt=''){

		if (isset($_POST['redimirCodigo']) && !empty($_POST['codigo'])) {

			$response_codigo = $this->redimirCodigoPuntos($_POST['codigo']);	
		}
		
		//$paginas_menu = $this->paginasMenu();
		$producto = $this->productos->detalleProductos(0,$urlpdt);
		$producto = $producto[0];
		$valor_punto = 1; //Pesos que vale un punto

		include 'views/club/detalle_premio.php';
		//include 'views/club_old/detalle-regalo.php';
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
				
				//Cargar Nuevos Puntos Consumidor
				/*$valor_punto = 1;
				$fecha_adquirido = fecha_actual('datetime');
				$redimido = 0;
				$estado_puntos = 0;

				$nuevos_puntos = $totalNetoAntesIva*($valor_punto/100);
				$idnuevospuntos = $this->usuarios->asignarNuevosPuntos($nuevos_puntos, "COMPRAS", $fecha_adquirido, $redimido, $estado_puntos, $_SESSION["idusuario"], $idorden);*/

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

						header("Location: ".URL_CLUB);	
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

}
?>