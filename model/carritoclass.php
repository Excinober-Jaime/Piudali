<?php
/**
* 
*/
class Carrito extends Productos
{

	public $itemscarrito = array();
	public static $valor_punto = 1;
	public static $cobro_flete = true;
	public static $pago_puntos_on = true;

	function __construct()
	{

	}

	public function get_valor_punto(){

		return Carrito::$valor_punto;

	}

	public static function productosAgregados(){

		$total_cantidad = 0;

		if (isset($_SESSION["cantidadpdts"]) && count($_SESSION["cantidadpdts"]>0)) {
			foreach ($_SESSION["cantidadpdts"] as $cantidad) {
				$total_cantidad += $cantidad;
			}	
		}else{
			$total_cantidad=0;
		}		

		return $total_cantidad;
	}

	static function totalCarrito(){
		$carrito2 = new Carrito();
		$total_carrito = $carrito2->getTotal();
		return $total_carrito;
	}

	public function infoProducto($idpdt){
		
		$query = $this->consulta("SELECT `productos`.`idproducto`, `productos`.`nombre`, `productos`.`cantidad`, `productos`.`precio`, `productos`.`iva`, `productos`.`aplica_cupon`, `productos`.`precio_oferta`, `productos`.`presentacion`, `productos`.`registro`, `productos`.`codigo`, `productos`.`tipo`, `productos`.`descripcion`, `productos`.`img_principal`, `productos`.`url`, `productos`.`estado`, `productos`.`uso`, `productos`.`mas_info`, `productos`.`metas`, `productos`.`categorias_idcategoria`, `productos`.`companias_idcompania`, `productos`.`relevancias_idrelevancia`, `companias`.`nombre` AS 'compania' 
								FROM `productos`
								INNER JOIN `companias` ON (`productos`.`companias_idcompania`=`companias`.`idcompania`)
								WHERE `idproducto`='$idpdt'");
		
		return $query[0];
	}

	public function ajustarPrecio($precio,$precio_oferta){

		if (!empty($precio_oferta) && $precio_oferta>0) {				
			$precio	= $precio_oferta;
		}else{
			$precio = $precio;
		}

		return $precio;
	}

	public function calcularIva($precio,$porc_iva){

		if (!empty($porc_iva) && $porc_iva>0) {
			$iva = $precio*($porc_iva/100);
		}else{
			$iva = 0;
		}

		return $iva;
	}

	public function calcularSubtotal($precio,$porc_iva,$cantidad){

		if (!empty($porc_iva) && $porc_iva>0) {
			//$subtotal = (($precio - $iva) * $cantidad);
			$subtotal = ($precio/("1.".$porc_iva) * $cantidad);
		}else{
			$subtotal = $precio * $cantidad;
		}
		
		return $subtotal;

	}

	public function listarItems(){

		if (isset($_SESSION["idpdts"]) && count($_SESSION["idpdts"]>0)) {
		
			foreach ($_SESSION["idpdts"] as $key => $idpdt) {

				$producto = $this->infoProducto($idpdt);
				$precio = $this->ajustarPrecio($producto["precio"],$producto["precio_oferta"]);
				$subtotal = $this->calcularSubtotal($precio,$producto["iva"],$_SESSION["cantidadpdts"][$key]);			
				

				$this->itemscarrito['id'][] = $idpdt;
				$this->itemscarrito['precio'][] = $precio;
				$this->itemscarrito['cantidad'][] = $_SESSION["cantidadpdts"][$key];
				$this->itemscarrito['cantidadstock'][] = $producto["cantidad"];
				$this->itemscarrito['nombre'][] = $producto["nombre"];
				$this->itemscarrito['codigo'][] = $producto["codigo"];
				$this->itemscarrito['iva'][] = $producto["iva"];
				$this->itemscarrito['img_principal'][] = $producto["img_principal"];
				$this->itemscarrito['compania'][] = $producto["compania"];
				$this->itemscarrito['subtotal'][] = $subtotal;
			}
		}else{
			$this->itemscarrito=array();
		}

		return $this->itemscarrito;
	}

	public function getSubtotalAntesIva(){

		$subtotalAntesIva=0;

		if (isset($_SESSION["idpdts"]) && count($_SESSION["idpdts"]>0)) {

			foreach ($_SESSION["idpdts"] as $key => $idpdt) {
				
				$producto = $this->infoProducto($idpdt);

				if ($producto['tipo']!='PREMIO') {

					$precio = $this->ajustarPrecio($producto["precio"],$producto["precio_oferta"]);
					//$iva = $this->calcularIva($precio,$producto["iva"]);
					$subtotal = $this->calcularSubtotal($precio,$producto["iva"],$_SESSION["cantidadpdts"][$key]);
					
					$subtotalAntesIva += $subtotal;
				}
			}
		}

		return $subtotalAntesIva;
	}

	public function getSubtotalAntesIvaPremios(){

		$subtotalAntesIvaPremios=0;

		if (isset($_SESSION["idpdts"]) && count($_SESSION["idpdts"]>0)) {

			foreach ($_SESSION["idpdts"] as $key => $idpdt) {
				$producto = $this->infoProducto($idpdt);

				if ($producto['tipo']=='PREMIO') {

					$precio = $this->ajustarPrecio($producto["precio"],$producto["precio_oferta"]);
					//$iva = $this->calcularIva($precio,$producto["iva"]);
					$subtotal = $this->calcularSubtotal($precio,$producto["iva"],$_SESSION["cantidadpdts"][$key]);
					
					$subtotalAntesIvaPremios += $subtotal;
				}
			}
		}

		return $subtotalAntesIvaPremios;
	}

	public function porcDescuentoCupon($tipo_usuario = ''){

		$subtotalAntesIva = $this->getSubtotalAntesIva();

		if ($tipo_usuario == 'CONSUMIDOR') {
			
			//Activar una vez termine campaña MUJER
			/*if ($subtotalAntesIva > 200000) {
				
				$porc_descuento_cupon = 10;
			}*/

			$porc_descuento_cupon = 20;

		}else{

			if (!empty($_SESSION["idcupon"]) && !empty($_SESSION["valor_cupon"]) && isset($_SESSION["aplicacion_cupon"])) {

				if ($_SESSION["aplicacion_cupon"]) {
				
					//Descuento en pesos, se convierte a porcentual
					$porc_descuento_cupon = ($_SESSION["valor_cupon"] / $subtotalAntesIva) * 100;
				
				}else{
					
					//Descuento en porcentaje
					$porc_descuento_cupon = $_SESSION["valor_cupon"];
				}

			}else{

				$porc_descuento_cupon = 0;
			}
		}

		return $porc_descuento_cupon;
	}

	public function getDescuentoCupon($tipo_usuario = ''){

		if ($tipo_usuario == 'CONSUMIDOR') {
			
			$porc_descuento_cupon = $this->porcDescuentoCupon($tipo_usuario);
		
		}else{

			$porc_descuento_cupon = $this->porcDescuentoCupon();	
		}		

		$subtotalAntesIva = $this->getSubtotalAntesIva();
		$descuento_cupon = $porc_descuento_cupon/100;
		$descuentoCupon = $subtotalAntesIva * $descuento_cupon;

		return $descuentoCupon;
	}

	public function getSubtotalNetoAntesIva($tipo_usuario = ''){

		if ($tipo_usuario == 'CONSUMIDOR') {
			
			$descuentoCupon	= $this->getDescuentoCupon($tipo_usuario);

		}else{

			$descuentoCupon	= $this->getDescuentoCupon();
		}

		$subtotalAntesIva = $this->getSubtotalAntesIva();
		
		$subtotalNetoAntesIva = $subtotalAntesIva - $descuentoCupon;

		return $subtotalNetoAntesIva;
	}


	public function porcDescuentoEscala($tipo_usuario = ''){

		if ($tipo_usuario == 'CONSUMIDOR') {
			
			$porcentaje['porcentaje'] = 0;

		}else{

			$canal_distribucion_distribuidor = Usuarios::usuarioCanalDistribucion($_SESSION["idusuario"]);

			//$descuentos_especiales = Descuentosespeciales::consultarDescuento($_SESSION["idusuario"]);

			/*if (count($descuentos_especiales)) {

				$subtotalNetoAntesIva = $this->getSubtotalNetoAntesIva();

				$porcentaje = Descuentosespeciales::consultarPorcentaje($descuentos_especiales["iddescuento"], $subtotalNetoAntesIva);
					
			}*/
			if (count($canal_distribucion_distribuidor)>0) {

				$subtotalNetoAntesIva = $this->getSubtotalNetoAntesIva();

				$porcentaje = CanalesDistribucion::consultarPorcentaje($canal_distribucion_distribuidor["canales_distribucion_idcanal"], $subtotalNetoAntesIva);

				if (empty($porcentaje)) {
					
					$porcentaje['porcentaje'] = 0;
				}
					
			}else{

				$campanas2 = new Campanas();

				$subtotalNetoAntesIva = $this->getSubtotalNetoAntesIva();

				$campana_actual = $campanas2->getCamapanaActual();
				$id_campana_actual = $campana_actual["idcampana"];

				$porcentaje = $campanas2->getPorcEscalaDistribuidor($subtotalNetoAntesIva, $id_campana_actual);
			}

			if (empty($porcentaje["porcentaje"])) {
				$porcentaje["porcentaje"] = 0;
			}
		}

		return $porcentaje["porcentaje"];

	}

	public function getDescuentoEscala($tipo_usuario = ''){

		$porc_escala = $this->porcDescuentoEscala($tipo_usuario);
		$subtotalNetoAntesIva = $this->getSubtotalNetoAntesIva();

		$descuento_escala = $porc_escala/100;
		$descuentoEscala = $subtotalNetoAntesIva * $descuento_escala;

		return $descuentoEscala;
	}

	public function getTotalNetoAntesIva($tipo_usuario = ''){
			
		$subtotalNetoAntesIva = $this->getSubtotalNetoAntesIva($tipo_usuario);
		$descuentoEscala = $this->getDescuentoEscala($tipo_usuario);

		$totalNetoAntesIva = $subtotalNetoAntesIva - $descuentoEscala;

		return $totalNetoAntesIva;
	}

	public function getBaseRTF(){

		$subtotalAntesIvaPremios = $this->getSubtotalAntesIvaPremios();
		$totalNetoAntesIva = $this->getTotalNetoAntesIva();
		$baseRTF = $totalNetoAntesIva + $subtotalAntesIvaPremios;

		return $baseRTF;
	}

	public function porcRTF(){

		$baseRTF = $this->getBaseRTF();

		if (isset($_SESSION["idorganizacion"]) && !empty($_SESSION["idorganizacion"])) {
			if ($baseRTF>=803000) {
				$porc_rft = 0.025;	
			}else{
				$porc_rft = 0;
			}
		}else{
			
		}
		return $porc_rft;
	}

	public function getRTF($tipo_usuario = ''){

		if ($tipo_usuario == 'CONSUMIDOR') {
			
			$rtf = 0;
		
		}else{

			$baseRTF = $this->getBaseRTF();
			$porcRTF = $this->porcRTF();
			$rtf = $baseRTF * $porcRTF;
		}

		return $rtf;
	}

	public function getIva($tipo_usuario = ''){

		$totalIva = 0;

		$porc_descuento_cupon = $this->porcDescuentoCupon($tipo_usuario);
		$porc_escala = $this->porcDescuentoEscala($tipo_usuario);

		if (isset($_SESSION["idpdts"]) && count($_SESSION["idpdts"])>0) {
			
				foreach ($_SESSION["idpdts"] as $key => $idpdt) {

				$producto = $this->infoProducto($idpdt);

				$porc_iva = $producto["iva"];			
				$precio = $this->ajustarPrecio($producto["precio"],$producto["precio_oferta"]);
				//$iva = $this->calcularIva($precio,$porc_iva);
				$subtotal = $this->calcularSubtotal($precio,$porc_iva,$_SESSION["cantidadpdts"][$key]);

				if ($producto['tipo']!='PREMIO') {					
				
					$subtotal_dto_cupon = $subtotal - ($subtotal*($porc_descuento_cupon/100));
					$subtotal_dto_escala = $subtotal_dto_cupon - ($subtotal_dto_cupon*($porc_escala/100));
				}else{
					$subtotal_dto_escala = $subtotal;					
				}

				$iva = $subtotal_dto_escala * ($porc_iva/100);
				$totalIva += $iva;
			}

		}else{
			$totalIva = 0;
		}		

		return $totalIva;

	}

	public function getPagoPuntos(){

		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"])) {

			if (isset($_SESSION["usar_puntos"]) && $_SESSION["usar_puntos"]==true) {

				if (!Carrito::$pago_puntos_on) {
					
					return array(
							"puntos" => 0, 
							"valor_pago" => 0, 
							"valor_punto" => 0
						);
				}

				$valorPunto = $this->get_valor_punto();
				$totalNetoAntesIva = $this->getTotalNetoAntesIva();
				$totalIva = $this->getIva();
				$totalRTF = $this->getRTF();
				$totalNetoConIva = $totalNetoAntesIva+$totalIva-$totalRTF;

				$usuarios2 = new Usuarios();

				$puntos_disponibles = $usuarios2->puntosDisponibles($_SESSION["idusuario"]);

				if ($puntos_disponibles["disponibles"]>0) {

					$valor_puntos_disponibles = $puntos_disponibles["disponibles"]*$valorPunto;
					
					if ($totalNetoConIva>$valor_puntos_disponibles) {
						
						$totalNetoConIva-=$valor_puntos_disponibles;
						$puntos_redimir = $valor_puntos_disponibles/$valorPunto;					
					}else{
						$puntos_redimir = ($totalNetoConIva*$puntos_disponibles["disponibles"])/$valor_puntos_disponibles;
					}

					$valor_pago_puntos = $puntos_redimir*$valorPunto;

					$pago_puntos = array("puntos" => $puntos_redimir, "valor_pago" => $valor_pago_puntos, "valor_punto" => $valorPunto);
					
				}else{

					$pago_puntos = array("puntos" => 0, "valor_pago" => 0, "valor_punto" => 0);
				}				

			}else{
				$pago_puntos = array("puntos" => 0, "valor_pago" => 0, "valor_punto" => 0);
			}

		}else{
			$pago_puntos = array("puntos" => 0, "valor_pago" => 0, "valor_punto" => 0);
		}		

		return $pago_puntos;
	}

	public function calcularFlete($tipo_usuario = ''){

		if (!Carrito::$cobro_flete) {
			
			return 0;
		}

		$subtotalAntesIva = $this->getSubtotalAntesIva();

		if ($subtotalAntesIva>0) {

			if ($tipo_usuario == 'CONSUMIDOR') {
			
				if ($subtotalAntesIva <= 100000) {
					
					if (isset($_SESSION["ciudad"]) && $_SESSION["ciudad"] == "Cali") {
						$flete = 5000;
					}else{
						$flete = 10000;
					}
					
				}else{

					$flete = 0;
				}

			}else{
			
				if (isset($_SESSION["ciudad"]) && $_SESSION["ciudad"] == "Cali") {
					$flete = 7000;
				}else{
					$flete = 14000;
				}
			}

		}else{

			$flete = 0;
		}
		
		return $flete;
		
	}

	public function getTotal($tipo_usuario = ''){
		
		$subtotalAntesIvaPremios = $this->getSubtotalAntesIvaPremios();
		$totalNetoAntesIva = $this->getTotalNetoAntesIva($tipo_usuario);
		$totalIva = $this->getIva($tipo_usuario);
		$totalRTF = $this->getRTF($tipo_usuario);
		$pagoPuntos = $this->getPagoPuntos();
		$flete = $this->calcularFlete($tipo_usuario);

		$total = ($totalNetoAntesIva + $subtotalAntesIvaPremios + $totalIva - $totalRTF - $pagoPuntos["valor_pago"]) + $flete;

		return $total;
	}

	public function getRentabilidad(){
		
		$descuentoCupon	= $this->getDescuentoCupon();
		$descuentoEscala = $this->getDescuentoEscala();

		$rentabilidad = $descuentoCupon + $descuentoEscala;

		return $rentabilidad;
	}

	public function generarCodOrden(){

		$stamp = date("Ymdhis");
		$rnd = str_pad(rand(0,999999),6, "0", STR_PAD_LEFT);
		$codigo = "$stamp-$rnd";
		return $codigo;
	}

	public function generarOrden($codigo_orden, $fecha_pedido, $subtotalAntesIva, $subtotalAntesIvaPremios,$descuentoCupon, $porcDescuentoEscala, $descuentoEscala, $totalNetoAntesIva, $iva, $retencion, $pagoPuntos, $valorPunto, $flete, $total, $estado, $fecha_facturacion, $num_factura, $idusuario){
		
		$idorden = $this->insertar("INSERT INTO `ordenes_pedidos`(									
									`num_orden`, 
									`fecha_pedido`,
									`subtotal`, 
									`subtotal_premios`,
									`descuentos`, 
									`porc_escala`, 
									`desc_escala`, 
									`neto_sin_iva`, 
									`impuestos`, 
									`retencion`,
									`pago_puntos`, 
									`valor_punto`, 
									`costo_envio`, 
									`total`, 
									`estado`, 
									`fecha_facturacion`, 
									`num_factura`, 
									`usuarios_idusuario`) VALUES (									
									'$codigo_orden',
									'$fecha_pedido',
									'$subtotalAntesIva',
									'$subtotalAntesIvaPremios',
									'$descuentoCupon',
									'$porcDescuentoEscala',
									'$descuentoEscala',
									'$totalNetoAntesIva',
									'$iva',
									'$retencion',
									'$pagoPuntos',
									'$valorPunto',
									'$flete',
									'$total',
									'$estado',
									'$fecha_facturacion',
									'$num_factura',
									'$idusuario')");
		
		return $idorden;
	}

	public function getDetalleOrden($tipo_usuario = ''){

		if (isset($_SESSION["idpdts"]) && count($_SESSION["idpdts"]>0)) {

			$detalle_orden = array();
			$porc_descuento_cupon = $this->porcDescuentoCupon();
			$porc_escala = $this->porcDescuentoEscala($tipo_usuario);
			$pagoPuntos = $this->getPagoPuntos();
			$valor_descuento_puntos = $pagoPuntos["valor_pago"]/(count($_SESSION["cantidadpdts"]));

			foreach ($_SESSION["idpdts"] as $key => $idpdt) {

				$producto = $this->infoProducto($idpdt);
				$precio = $this->ajustarPrecio($producto["precio"],$producto["precio_oferta"]);
				//$iva = $this->calcularIva($precio,$producto["iva"]);
				$subtotal = $this->calcularSubtotal($precio,$producto["iva"],$_SESSION["cantidadpdts"][$key]);

				$codigo_pdt = $producto["codigo"];
				$cantidad_pdt = $_SESSION["cantidadpdts"][$key];

				if ($producto['tipo']!='PREMIO') {
					
					$descuento_cupon_pdt = $subtotal*($porc_descuento_cupon/100);
					$descuento_escala_pdt = ($subtotal-$descuento_cupon_pdt)*($porc_escala/100);
					$neto_sin_iva_pdt = $subtotal - $descuento_cupon_pdt - $descuento_escala_pdt;					

				}else{
					$descuento_cupon_pdt = 0;
					$descuento_escala_pdt = 0;
					$neto_sin_iva_pdt = $subtotal;
				}

				$iva_pdt = $neto_sin_iva_pdt*($producto["iva"]/100);
				
				
				$detalle_orden[$key]["idpdt"] = $idpdt;
				$detalle_orden[$key]["nombre"] = $producto["nombre"];
				$detalle_orden[$key]["iva_porc"] = $producto["iva"];
				$detalle_orden[$key]["subtotal"] = $subtotal;

				$detalle_orden[$key]["codigo"] = $codigo_pdt;
				$detalle_orden[$key]["cantidad"] = $cantidad_pdt;
				$detalle_orden[$key]["precio"] = $precio;
				$detalle_orden[$key]["precio_base"] = ($neto_sin_iva_pdt/$cantidad_pdt);
				$detalle_orden[$key]["descuento_cupon"] = ($descuento_cupon_pdt/$cantidad_pdt);
				$detalle_orden[$key]["iva"] = ($iva_pdt/$cantidad_pdt);
				$detalle_orden[$key]["descuento_puntos"] = ($valor_descuento_puntos/$cantidad_pdt);
			}
		}else{
			$detalle_orden = array();
		}

		return $detalle_orden;
	}

	public function agregarDetalleOrden($nombre_producto, $cod_producto, $cantidad, $precio, $precio_base, $descuento_cupon, $iva, $descuento_puntos, $idorden){
		
		$id_detalle = $this->insertar("INSERT INTO `detalle_orden`(										
										`nombre_producto`, 
										`cod_producto`, 
										`cantidad`, 
										`precio`, 
										`precio_base`, 
										`descuento_cupon`, 
										`iva`, 
										`descuento_puntos`, 
										`ordenes_pedidos_idorden`) VALUES (										
										'$nombre_producto',
										'$cod_producto',
										'$cantidad',
										'$precio',
										'$precio_base',
										'$descuento_cupon',
										'$iva',
										'$descuento_puntos',
										'$idorden')");
		
		return $id_detalle;
	}

/**********CUPONES************/

	public function infoCupon($cupon=""){

		$fecha_actual = date("Y-m-d");

		
		$query = $this->consulta("SELECT `idcodigo`, `titulo`, `aplicacion`, `val_descuento`, `fecha_expiracion`, `tipo`, `privado`, `monto_minimo` 
									FROM `codigos_descuento` 
									WHERE `num_codigo_desc`='$cupon' AND `estado`=1 AND `fecha_expiracion`>='$fecha_actual'");
		
		return $query[0];
	}

}
?>