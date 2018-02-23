<?php
/**
* 
*/

include_once "include/phpqrcode/qrlib.php";

class CodigosPuntos extends Database
{

	/***Lotes***/

	public function crearLote($idproducto = 0){

		$idlote = $this->insertar("INSERT INTO `lotes_codigos_puntos`(		
									`productos_idproducto`
									) VALUES (
									'$idproducto')");
		
		return $idlote;

	}

	public function listarLotes(){

		$query = $this->consulta("SELECT 
								`lotes_codigos_puntos`.`idlote`, 
								`productos`	.`nombre`,
								(SELECT COUNT(`codigos_puntos`.`idcodigo`) FROM `codigos_puntos` WHERE `codigos_puntos`.`lotes_codigos_puntos_idlote` = `lotes_codigos_puntos`.`idlote`) AS 'codigos'
								FROM `lotes_codigos_puntos`
								INNER JOIN `productos` ON (`lotes_codigos_puntos`.`productos_idproducto` = `productos`.`idproducto`)");
		
		return $query;

	}

	/***Codigos****/

	public function generaCodigo(){

	    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $caracteres .= "1234567890";
	    $final = array();
	    $longitud = 5;
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

	public function listarCodigos($idlote = 0){
		
		$query = $this->consulta("SELECT `idcodigo`, `codigo`, `puntos`, `redimido`, `qr`, `fecha_creacion`, `fecha_vencimiento`, `idredentor` 
								FROM `codigos_puntos`
								INNER JOIN `lotes_codigos_puntos` ON (`lotes_codigos_puntos`.`idlote` = `codigos_puntos` .`lotes_codigos_puntos_idlote`)
								WHERE `codigos_puntos` .`lotes_codigos_puntos_idlote`='$idlote'");
		
		return $query;
	}

	public function datalleCodigo($codigo){
		$query = $this->consulta("SELECT `idcodigo`, `codigo`, `puntos`, `redimido`, `qr`, `fecha_creacion`, `fecha_vencimiento`, `idredentor` 
								FROM `codigos_puntos` 
								WHERE `codigo`='$codigo'");
		
		return $query[0];
	}

	public function crearCodigo($codigo="", $puntos=0, $redimido=0, $qr=0, $creacion="", $vencimiento="", $idredentor=0, $idlote = 0){
		
		$idcodigo = $this->insertar("INSERT INTO `codigos_puntos`(									
									`codigo`, 
									`puntos`, 
									`redimido`, 
									`qr`, 									
									`fecha_creacion`,
									`fecha_vencimiento`,
									`idredentor`,
									`lotes_codigos_puntos_idlote`) VALUES (
									'$codigo',
									'$puntos',
									'$redimido',
									'$qr',									
									'$creacion',
									'$vencimiento',
									'$idredentor',
									'$idlote')");
		
		return $idcodigo;
	}

	public function generarQR($codigo) {

		//$PNG_TEMP_DIR = "assets/img/codigospuntosqr/";
		//$PNG_WEB_DIR = 'assets/img/codigospuntosqr/';
		$PNG_TEMP_DIR = "assets/img/codigosqrpuntos/";
		$PNG_WEB_DIR = 'assets/img/codigosqrpuntos/';

		$data = URL_SITIO.URL_CLUB."?codigopuntos=".$codigo;
		$errorCorrectionLevel = 'Q';
		$matrixPointSize = 2;
		$filename = $PNG_TEMP_DIR.$codigo.'.png';
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 0);

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