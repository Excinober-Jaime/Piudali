<?php
/**
* 
*/
class Banners extends Database
{
	
	public function listarBanners($posicion="", $estados=array()){
			

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

		if (!empty($posicion)) {
			$posicion = "AND `posicion`='$posicion'";
		}else{
			$posicion = "";
		}

		
		$query = $this->consulta("SELECT `idbanner`, `nombre`, `imagen`, `link`, `posicion`, `estado` FROM `banners` WHERE $estados_select $posicion");
		
		return $query;
	}

	public function crearBanner($nombre="",$imagen="",$link="",$posicion="",$estado=0){
		
		$idbanner = $this->insertar("INSERT INTO `banners`(									
									`nombre`, 
									`imagen`, 
									`link`, 
									`posicion`, 									
									`estado`) VALUES (									
									'$nombre',
									'$imagen',
									'$link',
									'$posicion',									
									'$estado')");
		
		return $idbanner;
	}

	public function actualizarBanner($idbanner=0,$nombre="",$imagen="",$link="",$posicion="",$estado=0){
		

		if (!empty($imagen)) {
			
			$query = $this->actualizar("UPDATE `banners` SET
									`nombre`='$nombre',
									`imagen`='$imagen',
									`link`='$link',
									`posicion`='$posicion',
									`estado`='$estado' 
									WHERE `idbanner`='$idbanner'");

		}else{

			$query = $this->actualizar("UPDATE `banners` SET
									`nombre`='$nombre',									
									`link`='$link',
									`posicion`='$posicion',
									`estado`='$estado' 
									WHERE `idbanner`='$idbanner'");	
		}

		
		
		return $query;
	}



	public function detalleBanner($idbanner){
		
		$query = $this->consulta("SELECT `nombre`, `imagen`, `link`, `posicion`, `estado` FROM `banners` WHERE `idbanner`='$idbanner'");
		
		return $query;
	}

	
}
?>
