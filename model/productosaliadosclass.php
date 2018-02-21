<?php

/**
* 
*/
class ProductosAliados extends Database
{
	
	public function listarProductos($estados = array()){

		if (count($estados)>0) {

			$estados_select = "WHERE (";

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

		$query = $this->consulta("SELECT `idproducto`, `nombre`, `url`, `img_principal`, `descripcion`, `mas_info`, `estado`, `organizaciones_idorganizacion`, `organizaciones`.`razon_social`
								FROM `productos_aliados`
								INNER JOIN `organizaciones` ON (`organizaciones`.`idorganizacion` = `productos_aliados`.`organizaciones_idorganizacion`)
								$estados_select;
								");
		
		return $query;
	}

	public function detalleProducto($idproducto){

		$query = $this->consulta("
									SELECT `idproducto`, `nombre`, `url`, `img_principal`, `descripcion`, `mas_info`, `estado`, `organizaciones_idorganizacion`, `organizaciones`.`razon_social`
									FROM `productos_aliados` 
									INNER JOIN `organizaciones` ON (`organizaciones`.`idorganizacion` = `productos_aliados`.`organizaciones_idorganizacion`)
									WHERE `idproducto` = '$idproducto'
									");
		
		return $query[0];
	}

	public function detalleProductoUrl($url){

		$query = $this->consulta("
									SELECT `idproducto`, `nombre`, `url`, `img_principal`, `descripcion`, `mas_info`, `estado`, `organizaciones_idorganizacion`, `organizaciones`.`razon_social`
									FROM `productos_aliados` 
									INNER JOIN `organizaciones` ON (`organizaciones`.`idorganizacion` = `productos_aliados`.`organizaciones_idorganizacion`)
									WHERE `url` = '$url'
									");
		
		return $query[0];
	}

	public function crearProducto($nombre = '', $url = '', $img_principal = '', $descripcion = '', $mas_info ='', $estado = 1, $idorganizacion = 0){

		$idproducto = $this->insertar("INSERT INTO `productos_aliados`(							
										`nombre`, 
										`url`, 
										`img_principal`, 
										`descripcion`, 
										`mas_info`, 
										`estado`, 
										`organizaciones_idorganizacion`
										) VALUES (							
										'$nombre',
										'$url',
										'$img_principal',
										'$descripcion',
										'$mas_info',
										'$estado',
										'$idorganizacion')");
		
		return $idproducto;
	}

	public function actualizarProducto($idproducto = 0, $nombre = '', $url = '', $img_principal = '', $descripcion = '', $mas_info ='', $estado = 1, $idorganizacion = 0){

		$query = $this->actualizar("UPDATE `productos_aliados` SET
									`nombre`= '$nombre',
									`url`= '$url',									
									`descripcion`= '$descripcion',
									`mas_info`= '$mas_info',
									`estado`= '$estado',
									`organizaciones_idorganizacion`= '$idorganizacion'			
									WHERE `idproducto` = '$idproducto'");	


		if (!empty($img_principal)) {
			
			$this->actualizar("UPDATE `productos_aliados` SET									
									`img_principal`= '$img_principal'							
									WHERE `idproducto` = '$idproducto'");	
		}

		return $query;
	}
}
?>