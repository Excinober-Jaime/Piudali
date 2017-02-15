<?php 
function convierte_url($url){
	// reemplaza cualquier cadena inválida por "-";
	$url = str_replace("&", "and", $url);	
	$arrStupid = array('feat.', 'feat', '.com', '(tm)', ' ', '*', "'s", '"', ",", ":", ";", "@", "#", "(", ")", "?", "!", "_",
	"$","+", "=", "|", "'", '/', "~", "`s", "`", "\\", "^", "[","]","{", "}", "<", ">", "%", "&#8482;");

	//tildes
	$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
	$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
	$url = str_replace($no_permitidas, $permitidas ,$url);

	$url = htmlentities($url);
	$url = preg_replace('/&([a-zA-Z])(.*?);/','$1',$url);
	$url = strtolower("$url");
	$url = str_replace(".", "", $url);
	$url = str_replace($arrStupid, "-", $url);
	$flag = 1;
	while($flag){
		$newurl = str_replace("--","-",$url);
		if($url != $newurl) {
			$flag = 1;
		}
		else $flag = 0;
		$url = $newurl;
	}
	$len = strlen($url);
	if($url[$len-1] == "-") {
		$url = substr($url, 0, $len-1);
	}
	return $url;
}

function shorcodes_orden_compra($nombre,$orden,$mensaje,$productos,$estado){
		
	$mensaje = str_replace("[nombre_completo]",$nombre,$mensaje);		
	$mensaje = str_replace("[orden]",$orden,$mensaje);		
	$mensaje = str_replace("[productos]",$productos,$mensaje);		
	$mensaje = str_replace("[estado_pago]",$estado,$mensaje);		
	return $mensaje;
}

function shorcodes_registro_usuario($nombre,$email,$password,$mensaje){
		
	$mensaje = str_replace("[email]",$email,$mensaje);		
	$mensaje = str_replace("[nombre_completo]",$nombre,$mensaje);
	$mensaje = str_replace("[password]",$password,$mensaje);		
	
	return $mensaje;	
}

function shorcodes_restaurar_contrasena($nombre,$email,$password,$mensaje){
		
	$mensaje = str_replace("[email]",$email,$mensaje);		
	$mensaje = str_replace("[nombre_completo]",$nombre,$mensaje);
	$mensaje = str_replace("[nueva_contrasena]",$password,$mensaje);		
	
	return $mensaje;
}

function convertir_pesos($valor_entero){

	$valor_pesos = number_format($valor_entero,0,".",",");

	return "$".$valor_pesos;
}

function fecha_actual($tipo="date"){

	if ($tipo == "date") {		
		$fecha = date("Y-m-d");	

	}elseif ($tipo == "datetime") {
		$fecha = date("Y-m-d H:i:s");

	}
	
	return $fecha;
}
?>