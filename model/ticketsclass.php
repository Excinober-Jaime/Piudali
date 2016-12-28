<?php 
/**
* 
*/
class Tickets extends Database
{
	public function generarCodTicket(){

		$prefijo = "TK";
		$stamp = date("Ymdhis");
		$rnd = str_pad(rand(0,999999),6, "0", STR_PAD_LEFT);
		$codigo = "$stamp-$rnd";
		$codigo = $prefijo.$codigo;
		return $codigo;
	}

	public function listarTickets($idusuario=0){

		if (!empty($idusuario)) {
			 $where = "WHERE `usuarios_idusuario`='$idusuario'";
		}else{
			$where = "";
		}
		
		$query = $this->consulta("SELECT `idticket`, `codigo`, `tipo`, `descripcion`, `estado`, `fecha_registro`, `usuarios_idusuario` FROM `tickets` $where ORDER BY `fecha_registro` DESC");
		
		return $query;
	}

	public function crearTicket($codigo="", $tipo="", $descripcion="", $estado="", $fecha_registro="", $usuario=0){
		
		$idticket = $this->insertar("INSERT INTO `tickets`(									
									`codigo`, 
									`tipo`, 
									`descripcion`, 
									`estado`, 
									`fecha_registro`, 
									`usuarios_idusuario`) VALUES (									
									'$codigo',
									'$tipo',
									'$descripcion',
									'$estado',
									'$fecha_registro',
									'$usuario')");
		
		return $idticket;
	}

	public function actualizarTicket($idticket=0, $estado=""){
		
		$query = $this->actualizar("UPDATE `tickets` SET 								
									`estado`='$estado'							
									WHERE `idticket`='$idticket'");
		return $query;
	}



	public function detalleTicket($idticket){
		
		$query = $this->consulta("SELECT `idticket`, `codigo`, `tipo`, `descripcion`, `estado`, `fecha_registro`, `usuarios_idusuario` FROM `tickets` WHERE `idticket`='$idticket'");
		
		return $query[0];
	}

	public function listarMensajesTickets($idticket){
		
		$query = $this->consulta("SELECT `idmensaje`, `mensaje`, `emisor`, `fecha_registro`, `tickets_idticket` FROM `mensajes_tickets` WHERE `tickets_idticket`='$idticket' ORDER BY `fecha_registro` DESC");
		
		return $query;
	}

	public function crearMensajeTicket($mensaje="", $emisor="", $fecha_registro="", $idticket=0){
		
		$idmensaje = $this->insertar("INSERT INTO `mensajes_tickets`(										
										`mensaje`, 
										`emisor`, 
										`fecha_registro`, 
										`tickets_idticket`) VALUES (
										'$mensaje',
										'$emisor',
										'$fecha_registro',
										'$idticket')");
		
		return $idmensaje;
	}
}
?>