<?php

/**
* 
*/
class Usuarios extends Database
{
	public function listarUsuarios($tipos = array()){

		if (count($tipos)>0) {

			$where = "WHERE ";

			foreach ($tipos as $key => $tipo) {
				$where .= "`usuarios`.`tipo`='$tipo'";

				if (($key+1) <  count($tipos)) {
					$where .= " OR ";
				}
			}
		}else{
			$where = "";
		}
		
		$query = $this->consulta("SELECT `idusuario`, `nombre`, `apellido`, `sexo`, `fecha_nacimiento`, `email`, `password`, `num_identificacion`, `boletines`, `condiciones`, `direccion`, `telefono`, `telefono_m`, `tipo`, `foto`, `estado`, `fecha_registro`, `lider`, `ciudades_idciudad`, `ciudades`.`ciudad` AS 'ciudad'
									FROM `usuarios`
									INNER JOIN `ciudades` ON (`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`) 
									$where 
									ORDER BY `fecha_registro` DESC");
		
		return $query;
	}
	
	public function crearUsuario($nombre="", $apellido="", $sexo="", $fecha_nacimiento="", $email="", $password="", $num_identificacion="", $boletines=0, $condiciones=0, $direccion="", $telefono="", $telefono_m="", $tipo="", $foto="", $estado=0, $fecha_registro="", $ciudad=0, $idorganizacion=0){	
		
		$idusuario = $this->insertar("INSERT INTO usuarios(										
										nombre,
										apellido, 
										sexo, 
										fecha_nacimiento, 
										email, 
										password, 
										num_identificacion, 
										boletines, 
										condiciones, 
										direccion, 
										telefono, 
										telefono_m, 
										tipo, 										
										estado, 
										fecha_registro, 
										ciudades_idciudad,
										organizaciones_idorganizacion) VALUES (
										'$nombre',
										'$apellido', 
										'$sexo', 
										'$fecha_nacimiento', 
										'$email', 
										'$password', 
										'$num_identificacion', 
										'$boletines', 
										'$condiciones', 
										'$direccion', 
										'$telefono', 
										'$telefono_m', 
										'$tipo',										
										'$estado', 
										'$fecha_registro', 
										'$ciudad',
										'$idorganizacion')");

		if (!empty($foto)) {
			$foto = $this->insertar("INSERT INTO usuarios(foto) VALUES ('$foto')");
		}

		
		return $idusuario;	
	}

	public function actualizarUsuario($idusuario, $nombre, $apellido, $sexo, $fecha_nacimiento, $email, $boletines, $direccion, $telefono, $telefono_m, $tipo, $foto, $ciudad){
		
		$query = $this->actualizar("UPDATE `usuarios` SET 									
									`nombre`='$nombre',
									`apellido`='$apellido',
									`sexo`='$sexo',
									`fecha_nacimiento`='$fecha_nacimiento',
									`email`='$email',
									`boletines`='$boletines',									
									`direccion`='$direccion',
									`telefono`='$telefono',
									`telefono_m`='$telefono_m',
									`tipo`='$tipo',
									`ciudades_idciudad`= '$ciudad'
									WHERE `idusuario`='$idusuario'");

		if (!empty($foto)) {
			$this->actualizar("UPDATE `usuarios` SET `foto`='$foto' WHERE `idusuario`='$idusuario'");
		}
		
		return $query;
	}

	public function cambiarContrasenaUsuario($idusuario, $contrasena_actual, $nueva_contrasena){
		
		$query = $this->actualizar("UPDATE `usuarios` SET 									
									`password`='$nueva_contrasena'
									WHERE `idusuario`='$idusuario' AND `password`='$contrasena_actual'");
		
		return $query;
	}

	public function generarContrasena(){
		
		$rnd = str_pad(rand(0,999999),9, "0", STR_PAD_LEFT);
		$codigo = $rnd;
		return $codigo;
	}

	public function nombreCiudad($idciudad){
		
		$query = $this->consulta("SELECT `codigo`, `ciudad`, `departamento` FROM `ciudades` WHERE `idciudad`='$idciudad'");
		
		return $query[0];
	}

	public function listarCiudades(){
		
		$query = $this->consulta("SELECT `idciudad`, `codigo`, `ciudad`, `departamento` FROM `ciudades` ORDER BY `ciudad` ASC");
		
		return $query;
	}

	public function loguearUsuario($email,$password){
		
		$query = $this->consulta("SELECT `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`sexo`, `usuarios`.`fecha_nacimiento`, `usuarios`.`email`, `usuarios`.`num_identificacion`, `usuarios`.`boletines`, `usuarios`.`condiciones`, `usuarios`.`direccion`, `usuarios`.`telefono`, `usuarios`.`telefono_m`, `usuarios`.`tipo`, `usuarios`.`foto`, `usuarios`.`estado`, `usuarios`.`fecha_registro`, `usuarios`.`ciudades_idciudad`, `ciudades`.`ciudad` 
									FROM `usuarios` 
									INNER JOIN `ciudades` ON(`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`)
									WHERE `email`='$email' AND `password`='$password'");
		
		return $query;
	}

	public function loguearPersonal($email,$password){
		
		$query = $this->consulta("SELECT `idpersona`, `nombre`, `cargo`, `usuario`, `password`, `rol`, `estado`, `companias_idcompania` FROM `personal`
									WHERE `usuario`='$email' AND `password`='$password'");
		
		return $query[0];
	}

	public function detalleUsuario($idusuario){
		
		$query = $this->consulta("SELECT  `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`sexo`, `usuarios`.`fecha_nacimiento`, `usuarios`.`email`, `usuarios`.`password`, `usuarios`.`num_identificacion`, `usuarios`.`boletines`, `usuarios`.`condiciones`, `usuarios`.`direccion`, `usuarios`.`telefono`, `usuarios`.`telefono_m`, `usuarios`.`tipo`, `usuarios`.`foto`, `usuarios`.`estado`, `usuarios`.`fecha_registro`, `usuarios`.`lider`, `usuarios`.`ciudades_idciudad`, `usuarios`.`organizaciones_idorganizacion`,`ciudades`.`ciudad` 
									FROM `usuarios`
									INNER JOIN `ciudades` ON(`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`)
									WHERE `idusuario`='$idusuario'");
		
		return $query[0];
	}

	public function detalleUsuarioEmail($email){
		
		$query = $this->consulta("SELECT  `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`sexo`, `usuarios`.`fecha_nacimiento`, `usuarios`.`email`, `usuarios`.`password`, `usuarios`.`num_identificacion`, `usuarios`.`boletines`, `usuarios`.`condiciones`, `usuarios`.`direccion`, `usuarios`.`telefono`, `usuarios`.`telefono_m`, `usuarios`.`tipo`, `usuarios`.`foto`, `usuarios`.`estado`, `usuarios`.`fecha_registro`, `usuarios`.`lider`, `usuarios`.`ciudades_idciudad`, `ciudades`.`ciudad` 
									FROM `usuarios`
									INNER JOIN `ciudades` ON(`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`)
									WHERE `usuarios`.`email`='$email'");
		
		return $query[0];
	}

	public function listarOrdenes(){
		
		$query = $this->consulta("SELECT `ordenes_pedidos`.`idorden`, `ordenes_pedidos`.`num_orden`, `ordenes_pedidos`.`fecha_pedido`, `ordenes_pedidos`.`subtotal`, `ordenes_pedidos`.`descuentos`, `ordenes_pedidos`.`porc_escala`, `ordenes_pedidos`.`desc_escala`, `ordenes_pedidos`.`neto_sin_iva`, `ordenes_pedidos`.`impuestos`, `ordenes_pedidos`.`pago_puntos`, `ordenes_pedidos`.`valor_punto`, `ordenes_pedidos`.`costo_envio`, `ordenes_pedidos`.`total`, `ordenes_pedidos`.`estado`, `ordenes_pedidos`.`fecha_facturacion`, `ordenes_pedidos`.`num_factura`, `usuarios`.`nombre`,`usuarios`.`apellido`
									FROM `ordenes_pedidos`
									INNER JOIN `usuarios` ON (`ordenes_pedidos`.`usuarios_idusuario`=`usuarios`.`idusuario`)
									ORDER BY `ordenes_pedidos`.`fecha_pedido` DESC");
		
		return $query;
	}

	public function detalleOrden($idorden){
		
		$query = $this->consulta("SELECT `ordenes_pedidos`.`idorden`, `ordenes_pedidos`.`num_orden`, `ordenes_pedidos`.`fecha_pedido`, `ordenes_pedidos`.`subtotal`, `ordenes_pedidos`.`descuentos`, `ordenes_pedidos`.`porc_escala`, `ordenes_pedidos`.`desc_escala`, `ordenes_pedidos`.`neto_sin_iva`, `ordenes_pedidos`.`impuestos`, `ordenes_pedidos`.`pago_puntos`, `ordenes_pedidos`.`valor_punto`, `ordenes_pedidos`.`costo_envio`, `ordenes_pedidos`.`total`, `ordenes_pedidos`.`estado`, `ordenes_pedidos`.`fecha_facturacion`, `ordenes_pedidos`.`num_factura`, `ordenes_pedidos`.`usuarios_idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido` 
									FROM `ordenes_pedidos` 
									INNER JOIN `usuarios` ON (`ordenes_pedidos`.`usuarios_idusuario`=`usuarios`.`idusuario`)
									WHERE `ordenes_pedidos`.`idorden`='$idorden'");


		$productos = $this->consulta("SELECT `detalle_orden`.`iddetalle_orden`, `detalle_orden`.`nombre_producto`, `detalle_orden`.`cod_producto`, `detalle_orden`.`cantidad`, `detalle_orden`.`precio`, `detalle_orden`.`precio_base`, `detalle_orden`.`descuento_cupon`, `detalle_orden`.`iva`, `detalle_orden`.`descuento_puntos`
										FROM `detalle_orden`
										WHERE `ordenes_pedidos_idorden`='$idorden'");

		

		$return = array('detalle' => $query[0], 'productos' => $productos);

		return $return;
	}

	public function actualizarOrden($idorden, $estado, $fecha_facturacion, $num_factura){
		
		$query = $this->actualizar("UPDATE `ordenes_pedidos` SET 
									`estado`= '$estado',
									`fecha_facturacion`= '$fecha_facturacion',
									`num_factura`= '$num_factura'
									WHERE `idorden`='$idorden'");
		return $query;
	}

	public function listarOrdenesUsuario($idusuario,$inicio,$fin){
		
		$query = $this->consulta("SELECT `idorden`, `num_orden`, `fecha_pedido`, `subtotal`, `descuentos`, `porc_escala`, `desc_escala`, `neto_sin_iva`, `impuestos`, `pago_puntos`, `valor_punto`, `costo_envio`, `total`, `estado`, `fecha_facturacion`, `num_factura`
									FROM `ordenes_pedidos` 
									WHERE `usuarios_idusuario`='$idusuario' AND `fecha_pedido` BETWEEN '$inicio' AND '$fin'
									ORDER BY `fecha_pedido` DESC");
		
		return $query;
	}

	public function listarIncentivos($usuarios=array()){

		if (count($usuarios)>0) {

			$usuarios_select = "WHERE ";

			$count = 0;

			foreach ($usuarios as $usuario) {
				if ($count>0) {
					$usuarios_select .= " OR ";
				}

				$usuarios_select .= "`usuario` = '$usuario'";
				$count++;
			}			
		}else{
			$usuarios_select = "";
		}

		
		$query = $this->consulta("SELECT `idincentivo`, `incentivo`, `imagen`, `inicio`, `fin`, `meta`, `descripcion`, `usuario` 
									FROM `incentivos`
									$usuarios_select");
		
		return $query;
	}

	public function incentivoDetalle($idincentivo=0){
		
		$query = $this->consulta("SELECT `idincentivo`, `incentivo`, `imagen`, `inicio`, `fin`, `meta`, `descripcion`, `usuario` 
									FROM `incentivos` 
									WHERE `idincentivo`='$idincentivo'");
		
		return $query[0];
	}

	public function actualizarIncentivo($idincentivo, $incentivo, $imagen, $inicio, $fin, $meta, $descripcion, $usuario){
		
		$query = $this->actualizar("UPDATE `incentivos` SET 									
									`incentivo`='$incentivo',
									`imagen`='$imagen',
									`inicio`='$inicio',
									`fin`='$fin',
									`meta`='$meta',
									`descripcion`='$descripcion',
									`usuario`='$usuario'
									WHERE `idincentivo`='$idincentivo'");
		
		return $query;
	}

	public function comprasNetasPeriodo($inicio, $fin, $estado, $idusuario){
		
		$query = $this->consulta("SELECT SUM(`neto_sin_iva`) as 'compras_netas'
									FROM `ordenes_pedidos` 
									WHERE `usuarios_idusuario`='$idusuario' AND `estado`='$estado' AND `fecha_pedido` BETWEEN '$inicio' AND '$fin'");
		
		return $query[0];
	}
	
	public function listarCupones(){
		
		$query = $this->consulta("SELECT `idcodigo`, `titulo`, `aplicacion`, `val_descuento`, `fecha_expiracion`, `num_codigo_desc`, `estado`, `tipo`, `privado`, `monto_minimo` 
									FROM `codigos_descuento`");
		
		return $query;
	}

	public function listarDistribuidoresLider($idlider){
		
		$query = $this->consulta("SELECT  `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`sexo`, `usuarios`.`fecha_nacimiento`, `usuarios`.`email`, `usuarios`.`password`, `usuarios`.`num_identificacion`, `usuarios`.`boletines`, `usuarios`.`condiciones`, `usuarios`.`direccion`, `usuarios`.`telefono`, `usuarios`.`telefono_m`, `usuarios`.`tipo`, `usuarios`.`foto`, `usuarios`.`estado`, `usuarios`.`fecha_registro`, `usuarios`.`ciudades_idciudad`, `ciudades`.`ciudad` 
									FROM `usuarios`
									INNER JOIN `ciudades` ON(`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`) 
									WHERE `lider`='$idlider'");
		
		return $query;
	}

	/**************PUNTOS******************/

	public function listarPuntosUsuario($idusuario){
		
		$query = $this->consulta("SELECT `idpuntos`, `puntos`, `concepto`, `fecha_adquirido`, `fecha_redimido`, `redimido`
					FROM `puntos` 
					WHERE `usuarios_idusuario` = '$idusuario'");
		
		return $query;
	}

	public function puntosDisponibles($idusuario){
		
		$query = $this->consulta("SELECT SUM(`puntos`-`redimido`) AS 'disponibles'
					FROM `puntos`
					WHERE `usuarios_idusuario` = '$idusuario' AND NOW()<= DATE_ADD(`fecha_adquirido`, INTERVAL 365 DAY)");
		
		return $query[0];
	}

	public function listarPuntosDisponibles($idusuario){
		
		$query = $this->consulta("SELECT (`puntos`-`redimido`) AS 'disponibles', idpuntos, puntos, redimido
					FROM `puntos`
					WHERE `usuarios_idusuario` = '$idusuario' AND NOW()<= DATE_ADD(`fecha_adquirido`, INTERVAL 365 DAY)
					ORDER BY fecha_adquirido ASC");
		
		return $query;
	}

	public function actualizarPuntosRedimidos($idpuntos, $puntos_redimidos){
		
		$query = $this->actualizar("UPDATE `puntos` SET `redimido` = $puntos_redimidos WHERE `idpuntos` = '$idpuntos'");
		
		return $query;
	}

	public function asignarNuevosPuntos($nuevos_puntos, $concepto, $fecha_adquirido, $redimido, $idusuario){	
		
		$idpuntos = $this->insertar("INSERT INTO `puntos`(
									`puntos`, 
									`concepto`, 
									`fecha_adquirido`, 									
									`redimido`, 
									`usuarios_idusuario`) VALUES (									
									'$nuevos_puntos',
									'$concepto',
									'$fecha_adquirido',
									'$redimido',
									'$idusuario')");
		
		return $idpuntos;	
	}

	public function detallePlantilla($idplantilla){
		
		$query = $this->consulta("SELECT `titulo`, `asunto`, `mensaje`, `email`, `estado` 
									FROM `mensajes_email` 
									WHERE `idmensaje`='$idplantilla'");
		
		return $query[0];
	}

	public function listarPlantillas(){
		
		$query = $this->consulta("SELECT `idmensaje`, `titulo`, `asunto`, `mensaje`, `email`, `estado` 
									FROM `mensajes_email`");
		
		return $query;
	}

	public function actualizarPlantilla($idmensaje, $titulo, $asunto, $mensaje, $email, $estado){
		
		$query = $this->actualizar("UPDATE `mensajes_email` SET 									
									`titulo`='$titulo',
									`asunto`='$asunto',
									`mensaje`='$mensaje',
									`email`='$email',
									`estado`='$estado' 
									WHERE `idmensaje`='$idmensaje'");
		
		return $query;
	}

	/******INGREDIENTES*****/

	public function listarIngredientes(){
		
		$query = $this->consulta("SELECT `idingrediente`, `nombre`, `descripcion` FROM `ingredientes` ORDER BY `nombre` ASC");
		
		return $query;
	}

	public function ingredienteDetalle($idingrediente){
		
		$query = $this->consulta("SELECT `idingrediente`, `nombre`, `descripcion` FROM `ingredientes` WHERE `idingrediente`='$idingrediente'");
		
		return $query[0];
	}

	public function crearIngrediente($nombre,$descripcion){	
		
		$idingrediente = $this->insertar("INSERT INTO `ingredientes`(										
										`nombre`, 
										`descripcion`) VALUES (										
										'$nombre',
										'$descripcion')");
		
		return $idingrediente;	
	}

	public function actualizarIngrediente($idingrediente,$nombre,$descripcion){
		
		$query = $this->actualizar("UPDATE `ingredientes` SET
									`nombre`='$nombre',
									`descripcion`='$descripcion'
									WHERE `idingrediente`='$idingrediente'");
		
		return $query;
	}

	/****PROTOCOLOS*****/

	public function listarProtocolos(){
		
		$query = $this->consulta("SELECT `idprotocolo`, `nombre`, `descripcion`, `estado` FROM `protocolos` ORDER BY `idprotocolo` ASC");
		
		return $query;
	}

	public function protocoloDetalle($idprotocolo){
		
		$query = $this->consulta("SELECT `idprotocolo`, `nombre`, `descripcion`, `estado` FROM `protocolos` WHERE `idprotocolo`='$idprotocolo'");
		
		return $query[0];
	}

	public function crearProtocolo($nombre,$descripcion,$estado){
		
		$idprotocolo = $this->insertar("INSERT INTO `protocolos`(										
										`nombre`, 
										`descripcion`,
										`estado`) VALUES (
										'$nombre',
										'$descripcion',
										'$estado')");
		
		return $idprotocolo;	
	}

	public function actualizarProtocolo($idprotocolo,$nombre,$descripcion,$estado){
		
		$query = $this->actualizar("UPDATE `protocolos` SET
									`nombre`		=	'$nombre',
									`descripcion`	=	'$descripcion',
									`estado`		=	'$estado'
									WHERE 
									`idprotocolo`	=	'$idprotocolo'");
		
		return $query;
	}

	/*****LIDER***********/
	public function zonaUsuario($idusuario){
		
		$query = $this->consulta("SELECT `idzona`, `zona`, `estado`, `lider` FROM `zonas` WHERE `lider`='$idusuario'");		
		return $query[0];
	}

	/****NEWSLETTER****/
	public function suscribirNewsletter($nombre, $email, $fecha){
		
		$idsuscriptor = $this->insertar("INSERT INTO `boletines`(
										`nombre`, 
										`email`, 
										`fecha`) 
										VALUES (
										'$nombre',
										'$email',
										'$fecha')");		
		return $idsuscriptor;
	}

	public function listarSuscriptores(){

		$query = $this->consulta("SELECT `id`, `nombre`, `email`, `fecha` FROM `boletines`");
		return $query;
	}

	public function suscriptorDetalle($idsuscriptor){

		$query = $this->consulta("SELECT `id`, `nombre`, `email`, `fecha` FROM `boletines` WHERE `id`='$idsuscriptor'");
		return $query[0];
	}

	public function crearSuscriptor($nombre,$email,$fecha){
		
		$idsuscriptor = $this->insertar("INSERT INTO `boletines`(
											`nombre`,
											`email`,
											`fecha`) 
											VALUES (
											'$nombre',
											'$email',
											'$fecha')");
		
		return $idsuscriptor;
	}

	public function actualizarSuscriptor($idsuscriptor,$nombre,$email){
		
		$query = $this->actualizar("UPDATE `boletines` SET 
										`nombre`='$nombre',
										`email`='$email'
										WHERE `id`='$idsuscriptor'");
		return $query;
	}

	/******ORGANIZACIONES******/
	public function crearOrganizacion($nit, $razon_social, $direccion, $telefono, $ciudad){

		$idorganizacion = $this->insertar("INSERT INTO `organizaciones`(
										`nit`, 
										`razon_social`, 
										`direccion`, 
										`telefono`,
										`ciudades_idciudad`) VALUES (
										'$nit',
										'$razon_social',
										'$direccion',
										'$telefono',
										'$ciudad')");
		return $idorganizacion;
	}

	public function detalleOrganizacionUsuario($idorganizacion){
		
		$query = $this->consulta("SELECT `organizaciones`.`idorganizacion`, `organizaciones`.`nit`, `organizaciones`.`razon_social`, `organizaciones`.`direccion`, `organizaciones`.`telefono`, `organizaciones`.`ciudades_idciudad`, `ciudades`.`ciudad` AS 'ciudad' FROM `organizaciones` INNER JOIN `ciudades` ON(`organizaciones`.`ciudades_idciudad`=`ciudades`.`idciudad`) WHERE `organizaciones`.`idorganizacion`='$idorganizacion'");

		return $query[0];
	}

	public function actualizarOrganizacion($idorganizacion, $razon_social, $telefono, $direccion, $ciudad){
		$query = $this->actualizar("UPDATE `organizaciones` SET 
										`razon_social`='$razon_social',
										`direccion`='$direccion',
										`telefono`='$telefono',
										`ciudades_idciudad`='$ciudad'
										WHERE `idorganizacion`='$idorganizacion'");
		return $query;
	}


	/*****DOCUMENTOS*****/
	public function crearDocumento($idusuario,$nombre,$url){
		
		$iddocumento = $this->insertar("INSERT INTO `documentos`(										
										`nombre`, 
										`url`, 
										`usuarios_idusuario`) VALUES (										
										'$nombre',
										'$url',
										'$idusuario')");		
		return $iddocumento;
	}

	public function actualizarDocumento($iddocumento,$nombre,$url){
		
		$query = $this->actualizar("UPDATE `documentos` SET 
									`nombre`='$nombre',
									`url`='$url'
									WHERE `iddocumento`='$iddocumento'");
		return $query;
	}

	public function listarDocumentos($idusuario){

		$query = $this->consulta("SELECT `iddocumento`, `nombre`, `url`, `usuarios_idusuario` FROM `documentos` WHERE `usuarios_idusuario`='$idusuario'");
		return $query;
	}

}
?>