<?php
/**
* 
*/
class Campanas extends Database
{
	public function getCamapanaActual(){

		$fecha_actual = date("Y-m-d");
		
		$query = $this->consulta("SELECT `idcampana`, `nombre`, `fecha_ini`, `fecha_fin`, `monto_minimo`, `estado` 
									FROM `campanas` 
									WHERE `fecha_ini`<='$fecha_actual' AND `fecha_fin`>='$fecha_actual'");
		
		return $query[0];
	}

	public function listarCampanas(){
		
		
		$query = $this->consulta("SELECT `idcampana`, `nombre`, `fecha_ini`, `fecha_fin`, `monto_minimo`, `estado` 
									FROM `campanas`");
		
		return $query;
	}

	public function detalleCampana($idcampana){
		
		
		$query = $this->consulta("SELECT `idcampana`, `nombre`, `fecha_ini`, `fecha_fin`, `monto_minimo`, `estado` 
									FROM `campanas`
									WHERE `idcampana`='$idcampana'");
		
		return $query[0];
	}

	public function getPorcEscalaDistribuidor($monto=0,$idcampana){
		
		$query = $this->consulta("SELECT `porcentaje`
								FROM `escalas_distribuidores`
								WHERE `campanas_idcampana`='$idcampana' AND `minimo`<= '$monto' AND `maximo`>='$monto'");
		
		return $query[0];
	}

	public function crearCampana($nombre="", $fecha_ini="", $fecha_fin="", $monto_minimo=0, $estado=0){
		
		$idcampana = $this->insertar("INSERT INTO `campanas`(										
										`nombre`, 
										`fecha_ini`, 
										`fecha_fin`, 
										`monto_minimo`, 
										`estado`) VALUES (										
										'$nombre',
										'$fecha_ini',
										'$fecha_fin',
										'$monto_minimo',
										'$estado')");
		
		return $idcampana;
	}

		public function actualizarCampana($idcampana=0, $nombre="", $fecha_ini="", $fecha_fin="", $monto_minimo=0, $estado=0){
		
		$query = $this->actualizar("UPDATE `campanas` SET 									
									`nombre`='$nombre',
									`fecha_ini`='$fecha_ini',
									`fecha_fin`='$fecha_fin',
									`monto_minimo`='$monto_minimo',
									`estado`='$estado' 
									WHERE `idcampana`='$idcampana'");
		
		return $query;
	}


	/*****************ESCALAS**********************/

	public function crearEscalaDis($minimo=0, $maximo=0, $porcentaje=0, $fecha="", $idcampana){
		
		$idescala = $this->insertar("INSERT INTO `escalas_distribuidores`(										
										`minimo`, 
										`maximo`, 
										`porcentaje`, 
										`fecha`, 
										`campanas_idcampana`) VALUES (										
										'$minimo',
										'$maximo',
										'$porcentaje',
										'$fecha',
										'$idcampana')");
		
		return $idescala;
	}

	public function crearEscalaLider($minimo=0, $maximo=0, $porcentaje=0, $fecha="", $idcampana){
		
		$idescala = $this->insertar("INSERT INTO `escalas_lideres`(										
										`minimo`, 
										`maximo`, 
										`porcentaje`, 
										`fecha`, 
										`campanas_idcampana`) VALUES (										
										'$minimo',
										'$maximo',
										'$porcentaje',
										'$fecha',
										'$idcampana')");
		
		return $idescala;
	}

	public function listarEscalasDis($idcampana){
		
		$query = $this->consulta("SELECT `idescala`, `minimo`, `maximo`, `porcentaje`, `fecha`
									FROM `escalas_distribuidores` 
									WHERE `campanas_idcampana` = '$idcampana'");
		
		return $query;
	}

	public function listarEscalasLider($idcampana){
		
		$query = $this->consulta("SELECT `idescala`, `minimo`, `maximo`, `porcentaje`, `fecha`
									FROM `escalas_lideres` 
									WHERE `campanas_idcampana` = '$idcampana'");
		
		return $query;	
	}

}
?>