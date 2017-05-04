<?php
/**
* 
*/
class Geolocalizacion extends Database
{
	public function listarZonas($ids = array(), $lideres=array(), $ciudades=array()){

		if (count($ids)>0 || count($lideres)>0 || count($ciudades)>0) {
			$where = "WHERE ";
		}else{
			$where = "";
		}

		if (count($ids)>0) {

			$where .= "(";

			foreach ($ids as $key => $id) {
				$where .= "`zonas`.`idzona`='$id'";

				if (($key+1) <  count($ids)) {
					$where .= " OR ";
				}
			}

			$where .= ")";
		}

		if ((count($ids)>0 && count($lideres)>0) || (count($ids)>0 && count($ciudades)>0)) {
			$where .= " OR ";
		}

		if (count($lideres)>0) {

			$where .= "(";

			foreach ($lideres as $key => $idlider) {
				$where .= "`zonas`.`lider`='$idlider'";

				if (($key+1) <  count($lideres)) {
					$where .= " OR ";
				}
			}

			$where .= ")";
		}

		if (count($lideres)>0 && count($ciudades)>0) {
			$where .= " OR ";
		}

		if (count($ciudades)>0) {
			$where .= "(";

			foreach ($ciudades as $key => $idciudad) {
				$where .= "`zonas`.`ciudades_idciudad`='$idciudad'";

				if (($key+1) <  count($ciudades)) {
					$where .= " OR ";
				}
			}

			$where .= ")";
		}

		$query = $this->consulta("SELECT `zonas`.`idzona`, `zonas`.`zona`, `zonas`.`estado`, `zonas`.`lider`, `zonas`.`ciudades_idciudad`, `usuarios`.`nombre`, `ciudades`.`ciudad`
									FROM `zonas` 
									INNER JOIN `usuarios` ON (`zonas`.`lider` = `usuarios`.`idusuario`)
									INNER JOIN `ciudades` ON (`zonas`.`ciudades_idciudad` = `ciudades`.`idciudad`)
									$where");

		return $query;		
	}

	public function actualizarZona($idzona, $zona, $estado, $lider, $ciudad){

		$query = $this->actualizar("UPDATE `zonas` 
									SET `zona`= '$zona',
										`estado`= '$estado',
										`lider`= '$lider',
										`ciudades_idciudad`= '$ciudad'
									WHERE `idzona`='$idzona'");
		return $query;
	}

	public function crearZona($zona, $estado, $lider, $ciudad){

		$idzona = $this->insertar("INSERT INTO `zonas`(									 
									`zona`, 
									`estado`, 
									`lider`, 
									`ciudades_idciudad`) VALUES (									
									'$zona',
									'$estado',
									'$lider',
									'$ciudad')");
		return $idzona;
	}

	public function listarRegiones($ids=array(), $directores = array()){

		if (count($ids)>0 || count($directores)>0) {
			$where = "WHERE ";
		}else{
			$where = "";
		}

		if (count($ids)>0) {

			$where .= "(";

			foreach ($ids as $key => $id) {
				$where .= "`regiones`.`idregion`='$id'";

				if (($key+1) <  count($ids)) {
					$where .= " OR ";
				}
			}

			$where .= ")";
		}

		if (count($ids)>0 && count($directores)>0) {
			$where .= " OR ";
		}

		if (count($directores)>0) {
			$where .= "(";

			foreach ($directores as $key => $director) {
				$where .= "`regiones`.`director`='$director'";

				if (($key+1) <  count($directores)) {
					$where .= " OR ";
				}
			}

			$where .= ")";
		}

		$query = $this->consulta("SELECT `regiones`.`idregion`, `regiones`.`region`, `regiones`.`estado`, `regiones`.`director`, `usuarios`.`nombre` 
									FROM `regiones` 
									INNER JOIN `usuarios` ON (`regiones`.`director` = `usuarios`.`idusuario`)
									$where");
		return $query;
	}

	public function actualizarRegion($idregion, $region, $estado, $director){

		$query = $this->actualizar("UPDATE `regiones` SET 
										`region`= '$region',
										`estado`= '$estado',
										`director`='$director' 
									WHERE `idregion`='$idregion'");
		return $query;
	}

	public function crearRegion($region, $estado, $director){

		$idregion = $this->insertar("INSERT INTO `regiones`(									 
									`region`, 
									`estado`, 
									`director`) VALUES (									
									'$region',
									'$estado',
									'$director')");
		return $idregion;
	}

	public function listarCiudadesRegion($idregion){

		$query = $this->consulta("SELECT `ciudades_idciudad` AS 'idciudad'
									FROM `regiones_has_ciudades`
									WHERE `regiones_idregion`='$idregion'");
		return $query;
	}

	public function agregarCiudadRegion($idregion, $idciudad){

		$idciudadregion = $this->insertar("INSERT INTO `regiones_has_ciudades`(`regiones_idregion`, `ciudades_idciudad`) 
										VALUES ('$idregion','$idciudad')");
		return $idciudadregion;
	}

	public function eliminarCiudadesRegion($idregion){

		$query = $this->actualizar("DELETE FROM `regiones_has_ciudades` WHERE `regiones_idregion`='$idregion'");
		return $query;
	}

	public function detalleRegionCiudad($idciudad){
		$query = $this->consulta("SELECT `regiones`.`idregion`, `regiones`.`region`, `regiones`.`estado`, `regiones`.`director`, `usuarios`.`nombre`, `usuarios`.`apellido`, `usuarios`.`email`, `usuarios`.`telefono`, `usuarios`.`telefono_m`
									FROM `regiones`
									INNER JOIN `usuarios` ON (`regiones`.`director`=`usuarios`.`idusuario`)
									INNER JOIN `regiones_has_ciudades` ON (`regiones`.`idregion`=`regiones_has_ciudades`.`regiones_idregion`)
									WHERE `regiones_has_ciudades`.`ciudades_idciudad`='$idciudad'");
		return $query;
	}

	public function eliminarRegion($idregion){
		
		$filas_ciudades = $this->actualizar("DELETE FROM `regiones_has_ciudades` WHERE `regiones_idregion`='$idregion'");

		$filas = $this->actualizar("DELETE FROM `regiones` WHERE `idregion`='$idregion'");
		return $filas;
	}
}
?>