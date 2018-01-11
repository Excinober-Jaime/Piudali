<?php

/**
* 
*/
class Usuarios extends Database
{

	public function actualizarSesion($idusuario, $nombre, $apellido, $email, $telefono, $telefono_m, $direccion, $ciudades_idciudad, $ciudad, $tipo="", $lider=0, $idorganizacion=0, $usuarioremoto=array()){

		if (!empty($usuarioremoto)) {

			$_SESSION["idusuario_remoto"] = $usuarioremoto["idusuario"];
			$_SESSION["email_remoto"] = $usuarioremoto["email"];
			$_SESSION["nombre_remoto"] = $usuarioremoto["nombre"];
			$_SESSION["apellido_remoto"] = $usuarioremoto["apellido"];
			$_SESSION["tipo_remoto"] = $usuarioremoto["tipo"];
			
		}
		
		$_SESSION["idusuario"] = $idusuario;
		$_SESSION["nombre"] = $nombre;
		$_SESSION["apellido"] = $apellido;
		$_SESSION["email"] = $email;
		$_SESSION["telefono"] = $telefono;
		$_SESSION["telefono_m"] = $telefono_m;
		$_SESSION["direccion"] = $direccion;
		$_SESSION["ciudades_idciudad"] = $ciudades_idciudad;
		$_SESSION["ciudad"] = $ciudad;
		$_SESSION["lider"] = $lider;
		$_SESSION["idorganizacion"] = $idorganizacion;

		if (!empty($tipo)) {
			$_SESSION["tipo"] = $tipo;
		}		
	}

	public function validarUsuario($num_identificacion,$email){
		
		$query = $this->consulta("SELECT `idusuario`
								FROM `usuarios`
								WHERE `num_identificacion`='$num_identificacion' OR `email`='$email'");
		
		return $query;
	}

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
		
		$query = $this->consulta("SELECT `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`sexo`, `usuarios`.`fecha_nacimiento`, `usuarios`.`email`, `usuarios`.`password`, `usuarios`.`num_identificacion`, `usuarios`.`boletines`, `usuarios`.`condiciones`, `usuarios`.`direccion`,  `usuarios`.`mapa`, `usuarios`.`telefono`, `usuarios`.`telefono_m`, `usuarios`.`tipo`, `usuarios`.`segmento`, `usuarios`.`foto`, `usuarios`.`estado`, `usuarios`.`fecha_registro`, `usuarios`.`referente`, `usuarios`.`lider`, `usuarios`.`nivel`, `usuarios`.`ciudades_idciudad`, `usuarios`.`organizaciones_idorganizacion`, `ciudades`.`ciudad` AS 'ciudad'
									FROM `usuarios`
									INNER JOIN `ciudades` ON (`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`) 
									$where 
									ORDER BY `fecha_registro` DESC");
		
		return $query;
	}

	public function listarUsuariosMapa($idciudad = 0){


		if (!empty($idciudad)) {
			$where_ciudad = "AND `ciudades_idciudad`='$idciudad'";
		}
				
		$query = $this->consulta("SELECT `idusuario`, `nombre`, `apellido`, `sexo`, `fecha_nacimiento`, `email`, `password`, `num_identificacion`, `boletines`, `condiciones`, `direccion`,  `mapa`, `telefono`, `telefono_m`, `tipo`, `segmento`, `foto`, `estado`, `fecha_registro`, `referente`, `lider`, `nivel`, `ciudades_idciudad`, `organizaciones_idorganizacion`, `ciudades`.`ciudad` AS 'ciudad'
									FROM `usuarios`
									INNER JOIN `ciudades` ON (`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`) 
									WHERE `mapa`=1 $where_ciudad
									ORDER BY `fecha_registro` DESC");
		
		return $query;
	}
	
	public function crearUsuario($nombre="", $apellido="", $sexo="", $fecha_nacimiento="", $email="", $password="", $num_identificacion="", $boletines=0, $condiciones=0, $direccion="", $mapa=0, $telefono="", $telefono_m="", $tipo="", $segmento="", $foto="", $estado=0, $fecha_registro="", $referente=0, $lider=0, $cod_lider=0, $nivel=0, $ciudad=0, $idorganizacion=0){	
		
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
										mapa,
										telefono, 
										telefono_m, 
										tipo,
										segmento,
										estado, 
										fecha_registro, 
										referente, 
										lider,
										cod_lider, 
										nivel, 
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
										'$mapa',
										'$telefono', 
										'$telefono_m', 
										'$tipo',										
										'$segmento',
										'$estado', 
										'$fecha_registro', 
										'$referente', 
										'$lider', 
										'$cod_lider', 
										'$nivel', 
										'$ciudad',
										'$idorganizacion')");

		if (!empty($foto)) {
			$foto = $this->insertar("INSERT INTO usuarios(foto) VALUES ('$foto')");
		}

		
		return $idusuario;	
	}

	public function actualizarUsuario($idusuario, $nombre, $apellido, $sexo, $fecha_nacimiento, $email, $num_identificacion, $boletines, $direccion, $mapa, $telefono, $telefono_m, $tipo, $segmento, $foto, $lider, $cod_lider, $ciudad, $estado = ''){
		
		$query = $this->actualizar("UPDATE `usuarios` SET 									
									`nombre`='$nombre',
									`apellido`='$apellido',
									`sexo`='$sexo',
									`fecha_nacimiento`='$fecha_nacimiento',
									`email`='$email',
									`num_identificacion`='$num_identificacion',
									`boletines`='$boletines',	
									`direccion`='$direccion',
									`mapa`='$mapa',
									`telefono`='$telefono',
									`telefono_m`='$telefono_m',
									`tipo`='$tipo',
									`segmento`='$segmento',
									`lider`='$lider',									
									`ciudades_idciudad`= '$ciudad'
									WHERE `idusuario`='$idusuario'");

		if (!empty($foto)) {
			$this->actualizar("UPDATE `usuarios` SET `foto`='$foto' WHERE `idusuario`='$idusuario'");
		}

		if (!empty($cod_lider)) {
			$this->actualizar("UPDATE `usuarios` SET `cod_lider`='$cod_lider' WHERE `idusuario`='$idusuario'");
		}

		if ($estado !='') {
			$this->actualizar("UPDATE `usuarios` SET `estado`='$estado' WHERE `idusuario`='$idusuario'");
		}
		
		return $query;
	}

	public function cambiarContrasenaUsuario($idusuario, $contrasena_actual, $nueva_contrasena){
		
		$query = $this->actualizar("UPDATE `usuarios` 
									SET `password`='$nueva_contrasena'
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

	public function listarCiudadesConDistribuidor(){
		
		$query = $this->consulta("SELECT `ciudades`.`idciudad`, `ciudades`.`codigo`, `ciudades`.`ciudad`, `ciudades`.`departamento` 
									FROM `ciudades` 
									INNER JOIN `usuarios` ON (`ciudades`.`idciudad`=`usuarios`.`ciudades_idciudad`) 
									GROUP BY `ciudades`.`idciudad`
									ORDER BY `ciudad` ASC");
		
		return $query;
	}

	public function loguearUsuario($email,$password){
		
		$query = $this->consulta("SELECT `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`sexo`, `usuarios`.`fecha_nacimiento`, `usuarios`.`email`, `usuarios`.`num_identificacion`, `usuarios`.`boletines`, `usuarios`.`condiciones`, `usuarios`.`direccion`, `usuarios`.`mapa`, `usuarios`.`telefono`, `usuarios`.`telefono_m`, `usuarios`.`tipo`, `usuarios`.`segmento`, `usuarios`.`foto`, `usuarios`.`estado`, `usuarios`.`fecha_registro`, `usuarios`.`lider`, `usuarios`.`ciudades_idciudad`, `usuarios`.`organizaciones_idorganizacion`, `ciudades`.`ciudad`
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
		
		$query = $this->consulta("SELECT  `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`sexo`, `usuarios`.`fecha_nacimiento`, `usuarios`.`email`, `usuarios`.`password`, `usuarios`.`num_identificacion`, `usuarios`.`boletines`, `usuarios`.`condiciones`, `usuarios`.`direccion`, `usuarios`.`mapa`, `usuarios`.`telefono`, `usuarios`.`telefono_m`, `usuarios`.`tipo`, `usuarios`.`segmento`, `usuarios`.`foto`, `usuarios`.`estado`, `usuarios`.`fecha_registro`,  `usuarios`.`referente`,  `usuarios`.`lider`, `usuarios`.`cod_lider`,  `usuarios`.`nivel`, `usuarios`.`ciudades_idciudad`, `usuarios`.`organizaciones_idorganizacion`,`ciudades`.`ciudad` 
									FROM `usuarios`
									INNER JOIN `ciudades` ON(`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`)
									WHERE `idusuario`='$idusuario'");
		
		return $query[0];
	}

	public function detalleUsuarioEmail($email){
		
		$query = $this->consulta("SELECT  `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`sexo`, `usuarios`.`fecha_nacimiento`, `usuarios`.`email`, `usuarios`.`password`, `usuarios`.`num_identificacion`, `usuarios`.`boletines`, `usuarios`.`condiciones`, `usuarios`.`direccion`, `usuarios`.`mapa`, `usuarios`.`telefono`, `usuarios`.`telefono_m`, `usuarios`.`tipo`, `usuarios`.`segmento`, `usuarios`.`foto`, `usuarios`.`estado`, `usuarios`.`fecha_registro`, `usuarios`.`lider`, `usuarios`.`ciudades_idciudad`, `ciudades`.`ciudad` 
									FROM `usuarios`
									INNER JOIN `ciudades` ON(`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`)
									WHERE `usuarios`.`email`='$email'");
		
		return $query[0];
	}


	public function detalleUsuarioCodLider($cod_lider){
		
		$query = $this->consulta("SELECT  `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`sexo`, `usuarios`.`fecha_nacimiento`, `usuarios`.`email`, `usuarios`.`password`, `usuarios`.`num_identificacion`, `usuarios`.`boletines`, `usuarios`.`condiciones`, `usuarios`.`direccion`, `usuarios`.`mapa`, `usuarios`.`telefono`, `usuarios`.`telefono_m`, `usuarios`.`tipo`, `usuarios`.`segmento`, `usuarios`.`foto`, `usuarios`.`estado`, `usuarios`.`fecha_registro`, `usuarios`.`lider`, `usuarios`.`ciudades_idciudad`, `ciudades`.`ciudad` 
									FROM `usuarios`
									INNER JOIN `ciudades` ON(`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`)
									WHERE `usuarios`.`cod_lider`='$cod_lider'");
		
		return $query[0];
	}

	public function listarOrdenes($inicio="", $fin="", $estado=""){

		if (!empty($inicio) && !empty($fin)) {
			$where = "WHERE `ordenes_pedidos`.`fecha_pedido` BETWEEN '$inicio' AND '$fin'";
		
			if (!empty($estado)) {
				$where .= " AND `ordenes_pedidos`.`estado`='$estado'";
			}
		}else{
			$where = "";

			if (!empty($estado)) {
				$where .= "WHERE `ordenes_pedidos`.`estado`='$estado'";
			}
		}		
		
		$query = $this->consulta("SELECT `ordenes_pedidos`.`idorden`, `ordenes_pedidos`.`num_orden`, `ordenes_pedidos`.`fecha_pedido`, `ordenes_pedidos`.`subtotal`, `ordenes_pedidos`.`subtotal_premios`, `ordenes_pedidos`.`descuentos`, `ordenes_pedidos`.`porc_escala`, `ordenes_pedidos`.`desc_escala`, `ordenes_pedidos`.`neto_sin_iva`, `ordenes_pedidos`.`impuestos`, `ordenes_pedidos`.`retencion`,`ordenes_pedidos`.`pago_puntos`, `ordenes_pedidos`.`valor_punto`, `ordenes_pedidos`.`costo_envio`, `ordenes_pedidos`.`total`, `ordenes_pedidos`.`estado`, `ordenes_pedidos`.`fecha_facturacion`, `ordenes_pedidos`.`num_factura`, `ordenes_pedidos`.`usuarios_idusuario`, `usuarios`.`nombre`,`usuarios`.`apellido`, `usuarios`.`organizaciones_idorganizacion`
									FROM `ordenes_pedidos`
									INNER JOIN `usuarios` ON (`ordenes_pedidos`.`usuarios_idusuario`=`usuarios`.`idusuario`)
									$where
									ORDER BY `ordenes_pedidos`.`fecha_pedido` DESC");
		
		return $query;
	}

	public function detalleOrden($idorden){
		
		$query = $this->consulta("SELECT `ordenes_pedidos`.`idorden`, `ordenes_pedidos`.`num_orden`, `ordenes_pedidos`.`fecha_pedido`, `ordenes_pedidos`.`subtotal`, `ordenes_pedidos`.`subtotal_premios`,`ordenes_pedidos`.`descuentos`, `ordenes_pedidos`.`porc_escala`, `ordenes_pedidos`.`desc_escala`, `ordenes_pedidos`.`neto_sin_iva`, `ordenes_pedidos`.`impuestos`, `ordenes_pedidos`.`retencion`, `ordenes_pedidos`.`pago_puntos`, `ordenes_pedidos`.`valor_punto`, `ordenes_pedidos`.`costo_envio`, `ordenes_pedidos`.`total`, `ordenes_pedidos`.`estado`, `ordenes_pedidos`.`fecha_facturacion`, `ordenes_pedidos`.`num_factura`, `ordenes_pedidos`.`guia_flete`, `ordenes_pedidos`.`usuarios_idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`email`, `usuarios`.`num_identificacion`, `usuarios`.`telefono`, `usuarios`.`telefono_m`, `usuarios`.`direccion`, `ciudades`.`ciudad`
									FROM `ordenes_pedidos` 
									INNER JOIN `usuarios` ON (`ordenes_pedidos`.`usuarios_idusuario`=`usuarios`.`idusuario`)
									INNER JOIN `ciudades` ON(`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`)
									WHERE `ordenes_pedidos`.`idorden`='$idorden'");


		$productos = $this->consulta("SELECT `detalle_orden`.`iddetalle_orden`, `detalle_orden`.`nombre_producto`, `detalle_orden`.`cod_producto`, `detalle_orden`.`cantidad`, `detalle_orden`.`precio`, `detalle_orden`.`precio_base`, `detalle_orden`.`descuento_cupon`, `detalle_orden`.`iva`, `detalle_orden`.`descuento_puntos`
										FROM `detalle_orden`
										WHERE `ordenes_pedidos_idorden`='$idorden'");

		

		$return = array('detalle' => $query[0], 'productos' => $productos);

		return $return;
	}

	public function actualizarOrden($idorden, $estado, $fecha_facturacion, $num_factura, $guia_flete){
		
		$query = $this->actualizar("UPDATE `ordenes_pedidos` SET 
									`estado`= '$estado',
									`fecha_facturacion`= '$fecha_facturacion',
									`num_factura`= '$num_factura',
									`guia_flete`= '$guia_flete'
									WHERE `idorden`='$idorden'");
		return $query;
	}

	public function listarOrdenesUsuario($idusuario,$inicio,$fin,$estados=array()){

		if (count($estados)>0) {

			$where_estados = "AND (";

			foreach ($estados as $key => $estado) {
				$where_estados .= "`ordenes_pedidos`.`estado`='$estado'";
			
				if (($key+1) <  count($estados)) {
					$where_estados .= " OR ";
				}
			}

			$where_estados .= ")";
		}else{
			$where_estados = "";
		}
		
		$query = $this->consulta("SELECT `idorden`, `num_orden`, `fecha_pedido`, `subtotal`, `subtotal_premios`, `descuentos`, `porc_escala`, `desc_escala`, `neto_sin_iva`, `impuestos`, `retencion`, `pago_puntos`, `valor_punto`, `costo_envio`, `total`, `estado`, `fecha_facturacion`, `num_factura`
									FROM `ordenes_pedidos` 
									WHERE `usuarios_idusuario`='$idusuario' $where_estados AND `fecha_pedido` BETWEEN '$inicio' AND '$fin'
									ORDER BY `fecha_pedido` DESC");
		
		return $query;
	}

	public function listarIncentivos($usuarios=array(), $inicio="", $fin=""){

		if (count($usuarios)>0) {

			$usuarios_select = "(";

			$count = 0;

			foreach ($usuarios as $usuario) {
				if ($count>0) {
					$usuarios_select .= " OR ";
				}

				$usuarios_select .= "`usuario` = '$usuario'";
				$count++;
			}

			$usuarios_select .= ")";						
		}else{

			$usuarios_select = "";
		}

		if (!empty($inicio) && !empty($fin)) {
			$between = "AND ((`inicio` BETWEEN '$inicio' AND '$fin') OR (`inicio` <= '$inicio' AND `fin` >= '$inicio')) ";
		}

		
		$query = $this->consulta("SELECT `idincentivo`, `incentivo`, `imagen`, `inicio`, `fin`, `meta`, `valoracion`, `descripcion`, `usuario` 
									FROM `incentivos`									 
									WHERE $usuarios_select $between
									ORDER BY `fin` DESC");
		
		return $query;
	}

	public function listarEscalasIncentivo($idincentivo=0){

		$query = $this->consulta("SELECT `idescala_incentivo`, `minimo`, `maximo`, `bono`, `incentivos_idincentivo` 
									FROM `escalas_incentivos` 
									WHERE `incentivos_idincentivo`='$idincentivo'");
		return $query;
	}

	public function crearEscalaIncentivo($idincentivo, $minimo, $maximo, $bono){

		$idescala = $this->insertar("INSERT INTO `escalas_incentivos`(										
										`minimo`, 
										`maximo`, 
										`bono`,
										`incentivos_idincentivo`) VALUES (										
										'$minimo',
										'$maximo',
										'$bono',
										'$idincentivo')");
		return $idescala;
	}

	public function incentivoDetalle($idincentivo=0){
		
		$query = $this->consulta("SELECT `idincentivo`, `incentivo`, `imagen`, `inicio`, `fin`, `meta`, `valoracion`, `descripcion`, `usuario` 
									FROM `incentivos` 
									WHERE `idincentivo`='$idincentivo'");
		
		return $query[0];
	}

	public function crearIncentivo($incentivo, $imagen, $inicio, $fin, $meta, $descripcion, $usuario){
		
		$idincentivo = $this->insertar("INSERT INTO `incentivos`(										
										`incentivo`, 
										`imagen`, 
										`inicio`, 
										`fin`, 
										`meta`, 
										`descripcion`, 
										`usuario`) VALUES (										
										'$incentivo',
										'$imagen',
										'$inicio',
										'$fin',
										'$meta',
										'$descripcion',
										'$usuario')");
		return $idincentivo;
	}

	public function actualizarIncentivo($idincentivo, $incentivo, $imagen, $inicio, $fin, $meta, $descripcion, $usuario){
		
		$query = $this->actualizar("UPDATE `incentivos` SET 									
									`incentivo`='$incentivo',									
									`inicio`='$inicio',
									`fin`='$fin',
									`meta`='$meta',
									`descripcion`='$descripcion',
									`usuario`='$usuario'
									WHERE `idincentivo`='$idincentivo'");


		if (!empty($imagen)) {
			
			$this->actualizar("UPDATE `incentivos` SET									
									`imagen`='$imagen'									
									WHERE `idincentivo`='$idincentivo'");	
		}
		
		return $query;
	}

	public function eliminarIncentivo($idincentivo){
		$filas_escalas = $this->actualizar("DELETE FROM `escalas_incentivos` WHERE `incentivos_idincentivo`='$idincentivo'");
		
		$filas = $this->actualizar("DELETE FROM `incentivos` WHERE `idincentivo`='$idincentivo'");
		return $filas;
	}

	public function comprasNetasPeriodo($inicio, $fin, $estado, $idusuario){
		
		$query = $this->consulta("SELECT SUM(`neto_sin_iva`) as 'compras_netas'
									FROM `ordenes_pedidos` 
									WHERE `usuarios_idusuario`='$idusuario' AND `estado`='$estado' AND `fecha_pedido` BETWEEN '$inicio' AND '$fin'");
		
		return $query[0];
	}
	
	public function listarCupones($estados = array(1), $expirados = true){

		if (count($estados)>0) {

			$where_estados = "(";

			foreach ($estados as $key => $estado) {
				$where_estados .= "`estado`='$estado'";
			
				if (($key+1) <  count($estados)) {
					$where_estados .= " OR ";
				}
			}

			$where_estados .= ")";
		}else{
			$where_estados = "";
		}

		if (!$expirados) {
			$where_expirados = "AND `fecha_expiracion`>= DATE(NOW())";
		}
		
		$query = $this->consulta("SELECT `idcodigo`, `titulo`, `aplicacion`, `val_descuento`, `fecha_expiracion`, `num_codigo_desc`, `estado`, `tipo`, `privado`, `monto_minimo` 
									FROM `codigos_descuento` WHERE  $where_estados $where_expirados");
		
		return $query;
	}

	public function eliminarCupon($idcupon){		
		$filas_cupones = $this->actualizar("DELETE FROM `codigos_descuento` WHERE `idcodigo`='$idcupon'");

		return $filas_cupones;

	}

	public function detalleCupon($idcupon){
		$query = $this->consulta("SELECT `idcodigo`, `titulo`, `aplicacion`, `val_descuento`, `fecha_expiracion`, `num_codigo_desc`, `estado`, `tipo`, `privado`, `monto_minimo` 
									FROM `codigos_descuento`
									WHERE `idcodigo`='$idcupon'");
		
		return $query[0];	
	}

	public function crearCupon($titulo="", $aplicacion=0, $val_descuento=0, $fecha_expiracion="", $num_codigo_desc="", $estado=0, $tipo=0, $privado=0, $monto_minimo=0){
		
		$idcupon = $this->insertar("INSERT INTO `codigos_descuento`(									
									`titulo`, 
									`aplicacion`, 
									`val_descuento`, 
									`fecha_expiracion`, 
									`num_codigo_desc`, 
									`estado`, 
									`tipo`, 
									`privado`, 
									`monto_minimo`) VALUES (									
									'$titulo',
									'$aplicacion',
									'$val_descuento',
									'$fecha_expiracion',
									'$num_codigo_desc',
									'$estado',
									'$tipo',
									'$privado',
									'$monto_minimo')");
		return $idcupon;
	}

	public function actualizarCupon($idcupon=0, $titulo="", $aplicacion=0, $val_descuento=0, $fecha_expiracion="", $num_codigo_desc="", $estado=0, $tipo=0, $privado=0, $monto_minimo=0){
		
		$query = $this->actualizar("UPDATE `codigos_descuento` SET 									
									`titulo`='$titulo',
									`aplicacion`='$aplicacion',
									`val_descuento`='$val_descuento',
									`fecha_expiracion`='$fecha_expiracion',
									`num_codigo_desc`='$num_codigo_desc',
									`estado`='$estado',
									`tipo`='$tipo',
									`privado`='$privado',
									`monto_minimo`='$monto_minimo'
									WHERE `idcodigo`='$idcupon'");
		
		return $query;
	}

	public function listarDistribuidoresLider($idlider,$estado="",$filtro_nombre=""){

		if ($estado!="") {
			$where_estado = "AND `usuarios`.`estado`='$estado'";
		}		

		if (!empty($filtro_nombre)) {
			$where_nombre = "AND `usuarios`.`nombre` LIKE '%".$filtro_nombre."%'";
		}else{
			$where_nombre = "";
		}
		
		$query = $this->consulta("SELECT  `usuarios`.`idusuario`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`sexo`, `usuarios`.`fecha_nacimiento`, `usuarios`.`email`, `usuarios`.`password`, `usuarios`.`num_identificacion`, `usuarios`.`boletines`, `usuarios`.`condiciones`, `usuarios`.`direccion`, `usuarios`.`mapa`, `usuarios`.`telefono`, `usuarios`.`telefono_m`, `usuarios`.`tipo`, `usuarios`.`segmento`, `usuarios`.`foto`, `usuarios`.`estado`, `usuarios`.`fecha_registro`, `usuarios`.`nivel`,`usuarios`.`ciudades_idciudad`, `ciudades`.`ciudad` 
									FROM `usuarios`
									INNER JOIN `ciudades` ON(`usuarios`.`ciudades_idciudad`=`ciudades`.`idciudad`) 
									WHERE `lider`='$idlider' $where_estado $where_nombre");
		
		return $query;
	}

	/**************PUNTOS******************/

	public function listarPuntosUsuario($idusuario, $estado=1, $idorden=0){

		if (!empty($idorden)) {
			$where_orden = "AND `ordenes_pedidos_idorden`='$idorden'";
		}else{
			$where_orden = "";
		}
		
		$query = $this->consulta("SELECT `idpuntos`, `puntos`, `concepto`, `fecha_adquirido`, `fecha_redimido`, `redimido`
					FROM `puntos` 
					WHERE `usuarios_idusuario` = '$idusuario' AND `estado`='$estado' $where_orden");
		
		return $query;
	}

	public function puntosDisponibles($idusuario){
		
		$query = $this->consulta("SELECT SUM(`puntos`-`redimido`) AS 'disponibles'
					FROM `puntos`
					WHERE `usuarios_idusuario` = '$idusuario' AND `estado`='1' AND NOW()<= DATE_ADD(`fecha_adquirido`, INTERVAL 365 DAY)");
		
		return $query[0];
	}

	

	public function actualizarPuntosEstado($idpuntos, $estado=0){
		
		$query = $this->actualizar("UPDATE `puntos` SET `estado` = '$estado' WHERE `idpuntos` = '$idpuntos'");
		return $query;
	}

	public function asignarNuevosPuntos($nuevos_puntos, $concepto, $fecha_adquirido, $redimido, $estado=0, $idusuario, $idorden=0){
		
		$idpuntos = $this->insertar("INSERT INTO `puntos`(
									`puntos`, 
									`concepto`, 
									`fecha_adquirido`, 									
									`redimido`, 
									`estado`, 									
									`usuarios_idusuario`,
									`ordenes_pedidos_idorden`) VALUES (									
									'$nuevos_puntos',
									'$concepto',
									'$fecha_adquirido',
									'$redimido',
									'$estado',
									'$idusuario',
									'$idorden')");
		
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

	public function eliminarIngrediente($idingrediente){
		$filas = $this->actualizar("DELETE FROM `ingredientes` WHERE `idingrediente`='$idingrediente'");
		return $filas;
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

	public function eliminarProtocolo($idprotocolo){
		$filas = $this->actualizar("DELETE FROM `protocolos` WHERE `idprotocolo`='$idprotocolo'");
		return $filas;
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
		
		$query = $this->consulta("SELECT `organizaciones`.`idorganizacion`, `organizaciones`.`nit`, `organizaciones`.`razon_social`, `organizaciones`.`direccion`, `organizaciones`.`telefono`, `organizaciones`.`ciudades_idciudad`, `ciudades`.`ciudad` AS 'ciudad' 
					FROM `organizaciones` 
					INNER JOIN `ciudades` ON(`organizaciones`.`ciudades_idciudad`=`ciudades`.`idciudad`) 
					WHERE `organizaciones`.`idorganizacion`='$idorganizacion'");

		return $query[0];
	}

	public function actualizarOrganizacion($idorganizacion, $nit, $razon_social, $telefono, $direccion, $ciudad){
		$query = $this->actualizar("UPDATE `organizaciones` SET 
										`nit`='$nit',
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

	public function eliminarDocumento($iddocumento){
		$query = $this->actualizar("DELETE FROM `documentos` WHERE `iddocumento`='$iddocumento'");
		return $query;
	}

	public static function usuarioCanalDistribucion($idusuario){
		
		$database = new Database;

		$query = $database->consulta("SELECT `canales_distribucion_idcanal`, `usuarios_idusuario` FROM `canales_distribucion_has_usuarios` WHERE `usuarios_idusuario`='$idusuario'");

		return $query[0];
	}

	public function detalleCredito($idusuario){

		$query = $this->consulta("SELECT `idcredito`, `cupo_asignado`, `cupo_usado`, `cupo_disponible`, `plazo`, `usuarios_idusuario` FROM `creditos` WHERE `usuarios_idusuario`='$idusuario'");

		return $query[0];

	}

	public function asignarCredito($idusuario, $cupo_asignado=0, $cupo_usado=0, $cupo_disponible=0, $plazo=0){

		$idcredito = $this->insertar("INSERT INTO `creditos`(					
										`cupo_asignado`, 
										`cupo_usado`, 
										`cupo_disponible`, 
										`plazo`, 
										`usuarios_idusuario`) VALUES (				
										'$cupo_asignado',
										'$cupo_usado',
										'$cupo_disponible',
										'$plazo',
										'$idusuario')");
		return $idcredito;

	}

	public function actualizarCredito($idcredito, $cupo_asignado=0, $cupo_usado=0, $cupo_disponible=0, $plazo=0){

		$query = $this->actualizar("UPDATE `creditos` SET 							
									`cupo_asignado` = '$cupo_asignado',
									`cupo_usado` = '$cupo_usado',
									`cupo_disponible` = '$cupo_disponible',
									`plazo` = '$plazo'
									WHERE `idcredito` = '$idcredito'");

		return $query;

	}

}
?>