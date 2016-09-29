<?php 

/**
* 
*/
class Productos extends Database
{
	public function crearProducto($nombre,$cantidad,$costo,$precio,$iva,$aplica_cupon,$precio_oferta,$presentacion,$registro,$codigo,$tipo,$descripcion,$img_principal,$url,$estado,$uso,$mas_info,$metas,$categoria,$compania,$relevancia){
		
		$idproducto = $this->insertar("INSERT INTO `productos`(
										`nombre`, 
										`cantidad`, 
										`costo`, 
										`precio`, 
										`iva`, 
										`aplica_cupon`, 
										`precio_oferta`, 
										`presentacion`, 
										`registro`, 
										`codigo`, 
										`tipo`, 
										`descripcion`, 
										`img_principal`, 
										`url`, 
										`estado`, 
										`uso`, 
										`mas_info`, 
										`metas`, 
										`categorias_idcategoria`, 
										`companias_idcompania`, 
										`relevancias_idrelevancia`) VALUES (
										'$nombre', 
										'$cantidad', 
										'$costo',
										'$precio',
										'$iva',
										'$aplica_cupon', 
										'$precio_oferta', 
										'$presentacion', 
										'$registro', 
										'$codigo', 
										'$tipo', 
										'$descripcion', 
										'$img_principal', 
										'$url', 
										'$estado', 
										'$uso', 
										'$mas_info', 
										'$metas', 
										'$categoria', 
										'$compania', 
										'$relevancia')");
		
		return $idproducto;
	}

	public function listarProductos($tipos=array(), $estados=array(1), $idcategoria=0){

		if (count($tipos)>0) {

			$tipos_select = "AND (";

			$count = 0;

			foreach ($tipos as $tipo) {
				if ($count>0) {
					$tipos_select .= " OR ";
				}

				$tipos_select .= "`tipo` = '$tipo'";
				$count++;
			}
			$tipos_select .= ")";
		}else{
			$tipos_select = "";
		}

		if (count($estados)>0) {

			$estados_select = "(";

			$count = 0;

			foreach ($estados as $estado) {
				if ($count>0) {
					$estados_select .= " OR ";
				}

				$estados_select .= "`estado` = '$estado'";
				$count++;
			}
			$estados_select .= ")";
		}else{
			$estados_select = "";
		}

		if (!empty($idcategoria)) {
			$categoria_where = " AND `categorias_idcategoria`='$idcategoria'";
		}else{
			$categoria_where = "";
		}

		
		$query = $this->consulta("SELECT `idproducto`, `nombre`, `cantidad`, `costo`, `precio`, `iva`, `aplica_cupon`, `precio_oferta`, `presentacion`, `registro`, `codigo`, `descripcion`, `img_principal`, `url`, `estado`, `uso`, `mas_info`, `metas`, `categorias_idcategoria`, `companias_idcompania`, `relevancias_idrelevancia` 
								FROM `productos`
								WHERE $estados_select $tipos_select $categoria_where");
		
		return $query;

	}

	public function detalleProductos($idproducto=0,$url=""){
		

		if (!empty($url)) {
			$where = "WHERE `idproducto`='$idproducto' OR `url`='$url'";
		}else{
			$where = "WHERE `idproducto`='$idproducto'";
		}

		$query = $this->consulta("SELECT `productos`.`idproducto`, `productos`.`nombre`, `productos`.`cantidad`, `productos`.`costo`, `productos`.`precio`, `productos`.`iva`, `productos`.`aplica_cupon`, `productos`.`precio_oferta`, `productos`.`presentacion`, `productos`.`registro`, `productos`.`codigo`, `productos`.`tipo`, `productos`.`descripcion`, `productos`.`img_principal`, `productos`.`url`, `productos`.`estado`, `productos`.`uso`, `productos`.`mas_info`, `productos`.`metas`, `productos`.`categorias_idcategoria`, `productos`.`companias_idcompania`, `productos`.`relevancias_idrelevancia`, `companias`.`nombre` AS 'compania' 
								FROM `productos`
								INNER JOIN `companias` ON (`productos`.`companias_idcompania`=`companias`.`idcompania`)
								$where");
		
		return $query;
	}

	public function actualizarProducto($idproducto,$nombre,$cantidad,$costo,$precio,$iva,$aplica_cupon,$precio_oferta,$presentacion,$registro,$codigo,$tipo,$descripcion,$img_principal,$url,$estado,$uso,$mas_info,$metas,$categoria,$compania,$relevancia){
		
		$query = $this->actualizar("UPDATE `productos` SET 
										`nombre`='$nombre',
										`cantidad`='$cantidad',
										`costo`='$costo',
										`precio`='$precio',
										`iva`='$iva',
										`aplica_cupon`='$aplica_cupon',
										`precio_oferta`='$precio_oferta',
										`presentacion`='$presentacion',
										`registro`='$registro',
										`codigo`='$codigo',
										`tipo`='$tipo',
										`descripcion`='$descripcion',										
										`url`='$url',
										`estado`='$estado',
										`uso`='$uso',
										`mas_info`='$mas_info',
										`metas`='$metas',
										`categorias_idcategoria`='$categoria',
										`companias_idcompania`='$compania',
										`relevancias_idrelevancia`='$relevancia'
										WHERE `idproducto`='$idproducto'");
		if (!empty($img_principal)) {
			$img = $this->actualizar("UPDATE `productos` SET 										
										`img_principal`='$img_principal'										
										WHERE `idproducto`='$idproducto'");	
		}		

		
		return $query;
	}


	/****categorias***/

	public function crearCategoria($nombre="",$url="",$imagen="",$estado=0){
		
		$idcategoria = $this->insertar("INSERT INTO `categorias`(											
											`nombre`,
											`url`,
											`imagen`, 
											`estado`) VALUES (
											'$nombre',
											'$url',
											'$imagen',
											'$estado')");
		
		return $idcategoria;
	}

	public function listarCategorias($menu=1){
		

		if (!empty($menu)) {
			$where = "WHERE `menu`='$menu'";
		}else{
			$where = "";
		}

		$query = $this->consulta("SELECT `idcategoria`, `nombre`, `url`, `imagen`, `estado` FROM `categorias` $where");

		
		
		return $query;

	}

	public function detalleCategoria($idcategoria){
		
		$query = $this->consulta("SELECT `nombre`, `url`, `imagen`, `estado` FROM `categorias` WHERE `idcategoria`='$idcategoria'");
		
		return $query;
	}

	public function detalleCategoriaUrl($url){
		
		$query = $this->consulta("SELECT `idcategoria`, `nombre`, `imagen`, `estado` FROM `categorias` WHERE `url`='$url'");
		
		return $query[0];
	}

	public function actualizarCategoria($idcategoria,$nombre="",$url="",$imagen="",$estado=0){
		
		$query = $this->actualizar("UPDATE `categorias` SET 
										`nombre`='$nombre',
										`url`='$url',
										`imagen`='$imagen',
										`estado`='$estado'										
										WHERE `idcategoria`='$idcategoria'");

		
		return $query;
	}


	
}
?>