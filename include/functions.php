<?php 
function convierte_url($url){
	// reemplaza cualquier cadena inválida por "-";
	$url = str_replace("&", "and", $url);
	$arrStupid = array('feat.', 'feat', '.com', '(tm)', ' ', '*', "'s", '"', ",", ":", ";", "@", "#", "(", ")", "?", "!", "_",
	"$","+", "=", "|", "'", '/', "~", "`s", "`", "\\", "^", "[","]","{", "}", "<", ">", "%", "&#8482;");

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
?>