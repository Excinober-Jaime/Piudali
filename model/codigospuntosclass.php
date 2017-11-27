<?php
/**
* 
*/

include_once "include/phpqrcode/qrlib.php";

class CodigosPuntos extends Database
{

	public function generaCodigo(){

	    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $caracteres .= "1234567890";
	    $final = array();
	    $longitud = 10;
	    $carac_desordenada = str_shuffle($caracteres);
	    
	    for($i=0;$i<$longitud;$i++) {
		    $final[$i] = $carac_desordenada[$i]; 
		}
		//recorremos la array e imprimimos
	    foreach($final as $datos) {
	    	$codigo .= $datos;
		}


		return $codigo;
	}

	public function listarCodigos(){
		
		$query = $this->consulta("SELECT `idcodigo`, `codigo`, `puntos`, `redimido`, `qr`, `fecha_creacion`, `fecha_vencimiento`, `idredentor` 
								FROM `codigos_puntos` 
								");
		
		return $query;
	}

	public function datelleCodigo($codigo){
		$query = $this->consulta("SELECT `idcodigo`, `codigo`, `puntos`, `redimido`, `qr`, `fecha_creacion`, `fecha_vencimiento`, `idredentor` 
								FROM `codigos_puntos` 
								WHERE `codigo`='$codigo'");
		
		return $query[0];
	}

	public function crearCodigo($codigo="", $puntos=0, $redimido=0, $qr=0, $creacion="", $vencimiento="", $idredentor=0){
		
		$idcodigo = $this->insertar("INSERT INTO `codigos_puntos`(									
									`codigo`, 
									`puntos`, 
									`redimido`, 
									`qr`, 									
									`fecha_creacion`,
									`fecha_vencimiento`,
									`idredentor`) VALUES (									
									'$codigo',
									'$puntos',
									'$redimido',
									'$qr',									
									'$creacion',
									'$vencimiento',
									'$idredentor')");
		
		return $idcodigo;
	}

	public function generarQR($codigo) {

		$PNG_TEMP_DIR = "assets/img/codigospuntosqr/";
		$PNG_WEB_DIR = 'assets/img/codigospuntosqr/';

		$data = URL_SITIO.URL_CODIGOS_PUNTOS."/".$codigo;
		$errorCorrectionLevel = 'L';
		$matrixPointSize = 7;
		$filename = $PNG_TEMP_DIR.$codigo.'.png';
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);

        return $PNG_WEB_DIR.basename($filename);
	}

	public function detalleCodigo($codigo) {

		$query = $this->consulta("SELECT `idcodigo`, `codigo`, `puntos`, `redimido`, `qr`, `fecha_creacion`, `fecha_vencimiento`, `idredentor` FROM `codigos_puntos` WHERE `codigo`='$codigo'");
		
		return $query[0];

	}

	public function redimirCodigo($codigo, $idredentor){

		$query = $this->actualizar("UPDATE `codigos_puntos` SET `redimido`='1', `idredentor`='$idredentor' WHERE `codigo` = '$codigo'");

		return $query;

	}
			
}
?>