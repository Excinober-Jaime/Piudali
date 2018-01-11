<?php


/**
* 
*/
class Puntos extends Database
{

	public function listarPuntosDisponibles($idusuario){
		
		$query = $this->consulta("SELECT (`puntos`-`redimido`) AS 'disponibles', idpuntos, puntos, redimido, `fecha_adquirido`, `concepto`, `estado`
					FROM `puntos`
					WHERE `usuarios_idusuario` = '$idusuario' AND `estado`='1' AND NOW()<= DATE_ADD(`fecha_adquirido`, INTERVAL 365 DAY)
					ORDER BY fecha_adquirido ASC");
		
		return $query;
	}

	public function actualizarPuntosRedimidos($idpuntos, $puntos_redimidos){
		
		$query = $this->actualizar("UPDATE `puntos` SET `redimido` = $puntos_redimidos WHERE `idpuntos` = '$idpuntos'");		
		return $query;
	}
	
	public function descontarPuntos($puntos = 0, $idusuario = 0){

		if (!empty($puntos) && !empty($idusuario)) {

			$puntos_sin_redimir = $puntos;
			$puntos_disponibles = $this->listarPuntosDisponibles($idusuario);

			foreach ($puntos_disponibles as $puntos_fila) {
				
				if ($puntos_sin_redimir>=$puntos_fila["disponibles"]) {

					$puntos_redimidos = $puntos_fila["disponibles"];
					$puntos_actualizar = $puntos_fila["puntos"];

				}else{

					$puntos_restantes = $puntos_sin_redimir;
					$puntos_actualizar = $puntos_fila["redimido"]+$puntos_restantes;
					$puntos_redimidos = $puntos_sin_redimir;
				}

				$puntos_sin_redimir=$puntos_sin_redimir-$puntos_redimidos;

				$this->actualizarPuntosRedimidos($puntos_fila["idpuntos"],$puntos_actualizar);
				
				if ($puntos_sin_redimir==0) {
					break;
				}
			}
		}		
	}
}
?>