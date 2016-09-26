<?php
/**
* 
*/
class Carrito extends Productos
{

	public $itemscarrito = array();		
	

	function __construct()
	{

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
		
		$query = $this->consulta("SELECT `productos`.`idproducto`, `productos`.`nombre`, `productos`.`cantidad`, `productos`.`precio`, `productos`.`iva`, `productos`.`aplica_cupon`, `productos`.`precio_oferta`, `productos`.`presentacion`, `productos`.`registro`, `productos`.`codigo`, `productos`.`descripcion`, `productos`.`img_principal`, `productos`.`url`, `productos`.`estado`, `productos`.`uso`, `productos`.`mas_info`, `productos`.`metas`, `productos`.`categorias_idcategoria`, `productos`.`companias_idcompania`, `productos`.`relevancias_idrelevancia`, `companias`.`nombre` AS 'compania' 
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

	public function calcularSubtotal($precio,$iva,$cantidad){

		if (!empty($iva) && $iva>0) {
			$subtotal = (($precio - $iva) * $cantidad);
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
				$iva = $this->calcularIva($precio,$producto["iva"]);
				$subtotal = $this->calcularSubtotal($precio,$iva,$_SESSION["cantidadpdts"][$key]);			
				

				$this->itemscarrito['id'][] = $idpdt;
				$this->itemscarrito['precio'][] = $precio;
				$this->itemscarrito['valor_iva'][] = $iva;
				$this->itemscarrito['cantidad'][] = $_SESSION["cantidadpdts"][$key];
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
				$precio = $this->ajustarPrecio($producto["precio"],$producto["precio_oferta"]);
				$iva = $this->calcularIva($precio,$producto["iva"]);
				$subtotal = $this->calcularSubtotal($precio,$iva,$_SESSION["cantidadpdts"][$key]);
				
				$subtotalAntesIva += $subtotal;
			}
		}

		return $subtotalAntesIva;
	}

	public function porcDescuentoCupon(){

		if (!empty($_SESSION["idcupon"]) && !empty($_SESSION["valor_cupon"]) && isset($_SESSION["aplicacion_cupon"])) {
			$porc_descuento_cupon = $_SESSION["valor_cupon"];
		}else{
			$porc_descuento_cupon = 0;
		}

		return $porc_descuento_cupon;
	}

	public function getDescuentoCupon(){

		$porc_descuento_cupon = $this->porcDescuentoCupon();

		$subtotalAntesIva = $this->getSubtotalAntesIva();
		$descuento_cupon = $porc_descuento_cupon/100;
		$descuentoCupon = $subtotalAntesIva * $descuento_cupon;

		return $descuentoCupon;
	}

	public function getSubtotalNetoAntesIva(){
		$subtotalAntesIva = $this->getSubtotalAntesIva();
		$descuentoCupon	= $this->getDescuentoCupon();
		$subtotalNetoAntesIva = $subtotalAntesIva - $descuentoCupon;

		return $subtotalNetoAntesIva;
	}


	public function porcDescuentoEscala(){

		$campanas2 = new Campanas();

		$subtotalNetoAntesIva = $this->getSubtotalNetoAntesIva();

		$campana_actual = $campanas2->getCamapanaActual();
		$id_campana_actual = $campana_actual["idcampana"];		

		$porcentaje = $campanas2->getPorcEscalaDistribuidor($subtotalNetoAntesIva, $id_campana_actual);

		return $porcentaje["porcentaje"];

	}

	public function getDescuentoEscala(){

		$porc_escala = $this->porcDescuentoEscala();
		$subtotalNetoAntesIva = $this->getSubtotalNetoAntesIva();		

		$descuento_escala = $porc_escala/100;
		$descuentoEscala = $subtotalNetoAntesIva * $descuento_escala;

		return $descuentoEscala;
	}

	public function getTotalNetoAntesIva(){
		$subtotalNetoAntesIva = $this->getSubtotalNetoAntesIva();
		$descuentoEscala = $this->getDescuentoEscala();

		$totalNetoAntesIva = $subtotalNetoAntesIva - $descuentoEscala;

		return $totalNetoAntesIva;
	}

	public function getIva(){

		$totalIva = 0;

		$porc_descuento_cupon = $this->porcDescuentoCupon();
		$porc_escala = $this->porcDescuentoEscala();

		if (isset($_SESSION["idpdts"]) && count($_SESSION["idpdts"])>0) {
			
				foreach ($_SESSION["idpdts"] as $key => $idpdt) {

				$producto = $this->infoProducto($idpdt);

				$porc_iva = $producto["iva"];			
				$precio = $this->ajustarPrecio($producto["precio"],$producto["precio_oferta"]);
				$iva = $this->calcularIva($precio,$porc_iva);
				$subtotal = $this->calcularSubtotal($precio,$iva,$_SESSION["cantidadpdts"][$key]);

				$subtotal_dto_cupon = $subtotal - ($subtotal*($porc_descuento_cupon/100));
				$subtotal_dto_escala = $subtotal_dto_cupon - ($subtotal_dto_cupon*($porc_escala/100));

				$iva = $subtotal_dto_escala * ($porc_iva/100);
				$totalIva += $iva;
			}

		}else{
			$totalIva = 0;
		}		

		return $totalIva;

	}

	public function getValorPunto(){
		//En pesos
		$valor_punto = 1;
		return $valor_punto; 
	}

	public function getPagoPuntos(){

		if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"])) {

			if (isset($_SESSION["usar_puntos"]) && $_SESSION["usar_puntos"]==true) {

				$valorPunto = $this->getValorPunto();
				$totalNetoAntesIva = $this->getTotalNetoAntesIva();
				$totalIva = $this->getIva();
				$totalNetoConIva = $totalNetoAntesIva+$totalIva;

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

	public function calcularFlete(){

		$subtotalAntesIva = $this->getSubtotalAntesIva();

		if ($subtotalAntesIva>0) {
			if (isset($_SESSION["ciudad"]) && $_SESSION["ciudad"] == "Cali") {
				$flete = 6000;
			}else{
				$flete = 11000;
			}	
		}else{
			$flete = 0;
		}
		
		return $flete;
	}

	public function getTotal(){
		
		$totalNetoAntesIva = $this->getTotalNetoAntesIva();
		$totalIva = $this->getIva();
		$pagoPuntos = $this->getPagoPuntos();
		$flete = $this->calcularFlete();

		$total = ($totalNetoAntesIva + $totalIva - $pagoPuntos["valor_pago"]) + $flete;

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

	public function generarOrden($codigo_orden, $fecha_pedido, $subtotalAntesIva, $descuentoCupon, $porcDescuentoEscala, $descuentoEscala, $totalNetoAntesIva, $iva, $pagoPuntos, $valorPunto, $flete, $total, $estado, $fecha_facturacion, $num_factura, $idusuario){
		
		$idorden = $this->insertar("INSERT INTO `ordenes_pedidos`(									
									`num_orden`, 
									`fecha_pedido`,
									`subtotal`, 
									`descuentos`, 
									`porc_escala`, 
									`desc_escala`, 
									`neto_sin_iva`, 
									`impuestos`, 
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
									'$descuentoCupon',
									'$porcDescuentoEscala',
									'$descuentoEscala',
									'$totalNetoAntesIva',
									'$iva',
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

	public function getDetalleOrden(){		

		if (isset($_SESSION["idpdts"]) && count($_SESSION["idpdts"]>0)) {

			$detalle_orden = array();
			$porc_descuento_cupon = $this->porcDescuentoCupon();
			$porc_escala = $this->porcDescuentoEscala();
			$pagoPuntos = $this->getPagoPuntos();
			$valor_descuento_puntos = $pagoPuntos["valor_pago"]/(count($_SESSION["cantidadpdts"]));

			foreach ($_SESSION["idpdts"] as $key => $idpdt) {

				$producto = $this->infoProducto($idpdt);
				$precio = $this->ajustarPrecio($producto["precio"],$producto["precio_oferta"]);
				$iva = $this->calcularIva($precio,$producto["iva"]);
				$subtotal = $this->calcularSubtotal($precio,$iva,$_SESSION["cantidadpdts"][$key]);

				$codigo_pdt = $producto["codigo"];
				$cantidad_pdt = $_SESSION["cantidadpdts"][$key];
				$descuento_cupon_pdt = $subtotal*($porc_descuento_cupon/100);
				$descuento_escala_pdt = ($subtotal-$descuento_cupon_pdt)*($porc_escala/100);
				$neto_sin_iva_pdt = $subtotal - $descuento_cupon_pdt - $descuento_escala_pdt;
				$iva_pdt = $neto_sin_iva_pdt*($producto["iva"]/100);
				
				$detalle_orden[$key]["nombre"] = $producto["nombre"];
				$detalle_orden[$key]["iva_porc"] = $producto["iva"];
				$detalle_orden[$key]["subtotal"] = $subtotal;

				$detalle_orden[$key]["codigo"] = $codigo_pdt;
				$detalle_orden[$key]["cantidad"] = $cantidad_pdt;
				$detalle_orden[$key]["precio"] = $precio;
				$detalle_orden[$key]["precio_base"] = ($neto_sin_iva_pdt/$_SESSION["cantidadpdts"][$key]);
				$detalle_orden[$key]["descuento_cupon"] = ($descuento_cupon_pdt/$_SESSION["cantidadpdts"][$key]);
				$detalle_orden[$key]["iva"] = ($iva_pdt/$_SESSION["cantidadpdts"][$key]);
				$detalle_orden[$key]["descuento_puntos"] = ($valor_descuento_puntos/$_SESSION["cantidadpdts"][$key]);
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