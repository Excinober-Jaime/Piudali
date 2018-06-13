<?php

/**
 * 
 */
class ControllerLandingsTiendas
{

	public $alerta = array();
	public $tienda = '';

	public function __construct($tienda){

		$this->tienda = $tienda;

		$this->usuarios = new Usuarios();

		if (isset($_POST['registrarConsumidor'])) {

			extract($_POST);

			if (count($this->usuarios->validarUsuario($num_identificacion, $email))>0) {

				$this->alert = array(
								'tipo'		=>	'CUENTA_YA_EXISTE',
								'mensaje'	=>	'Usted ya posee una cuenta. Acceda al 10% de descuento en productos Piudalí dando click <a href="'.$urltienda.'">click aquí</a>'
							);
			}else{

				$sexo = '';
				$fecha_nacimiento = '';
				$boletines = 0;
				$condiciones = 0;				
				$mapa = 0;
				$telefono = '';
				$telefono_m = '';
				$tipo = 'CONSUMIDOR';
				$segmento = '';
				$foto = '';
				$estado = 1;
				$fecha_registro = fecha_actual('datetime');
				$referente = 0;
				$lider = 0;
				$cod_lider = 0;
				$nivel = 0;
				$organizacion = 0;
				$password = '';
				$direccion = '';

				$password = $this->usuarios->generarContrasena();

				$idusuario = $this->usuarios->crearUsuario($nombre, $apellido, $sexo, $fecha_nacimiento, $email, md5($password), $num_identificacion, $boletines, $condiciones, $direccion, $mapa, $telefono, $telefono_m, $tipo, $segmento, $foto, $estado, $fecha_registro, $referente, $lider, $cod_lider, $nivel, $ciudad, $organizacion);

				if ($idusuario) {

					//Asignar puntos de regalo

					$nuevos_puntos = 1000;
					$fecha_adquirido = fecha_actual('datetime');
					$redimido = 0;
					$estado_puntos = 1;
					$idorden = 0;

					$idnuevospuntos = $this->usuarios->asignarNuevosPuntos($nuevos_puntos, "OBSEQUIO PIUDALÍ - ".$this->tienda, $fecha_adquirido, $redimido, $estado_puntos, $idusuario, $idorden);

					//Enviar email con acceso para redimir puntos
					require_once 'include/PHPMailer-master/PHPMailerAutoload.php';

					$mensaje = '<!DOCTYPE html>
					<html lang="es">
					<head>
						<meta charset="utf-8">
    					<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
						<title>Acceso a Club Piudalí</title>
					</head>
					<body>
						<p>Hola '.$nombre.', te hemos obsequiado 1.000 puntos que podrás redimir ya mismo en espectaculares premios mundialistas o en productos en nuestras tiendas aliadas.</p>
						<p>Mira todos los premios disponibles para ti ingresando a <a href="https://piudali.com.co/Club">https://piudali.com.co/Club</a></p>
						<hr>
						<p>Tus datos de acceso son los siguientes:<br>
						Email: '.$email.'<br>
						Contraseña: '.$password.'
						</p>
					</body>
					</html>';

					//Create a new PHPMailer instance
					$mail = new PHPMailer;
					//Set who the message is to be sent from
					$mail->setFrom("contacto@piudali.com.co", "Piudali Amazonian Skincare");
					//Set an alternative reply-to address
					//$mail->addReplyTo('replyto@example.com', 'First Last');
					//Set who the message is to be sent to
					$mail->addAddress($email, $nombre." ".$apellido);
					//Set the subject line
					$mail->Subject = "Estos son tus 1.000 puntos de obsequio";
					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->msgHTML($mensaje);
					//Replace the plain text body with one created manually
					//$mail->AltBody = 'This is a plain-text message body';
					//Attach an image file
					//$mail->addAttachment('images/phpmailer_mini.png');

					//send the message, check for errors
					if (!$mail->send()) {

					   //echo $mail->ErrorInfo;

					} else {

						$this->alert = array(
								'tipo'		=>	'REGISTRO_OK',
								'mensaje'	=>	'Felicidades!. Ahora tienes '.number_format($nuevos_puntos).' puntos. Te enviaremos las instrucciones a tu email para que puedas redimirlos en cualquier tienda '.$this->tienda.' o en espectaculares premios mundialistas.<br><br>Para acceder al 10% de descuento en productos Piudalí da <a href="'.$urltienda.'">click aquí</a>'
							);
						
					}	



					//$info_ciudad = $this->usuarios->nombreCiudad($ciudad);

					//$this->usuarios->actualizarSesion($idusuario, $nombre, $apellido, $email, $telefono, '', $direccion, $ciudad, $info_ciudad['ciudad'], $tipo, 0, 0);
				}
			}
		}

	}
	
	public function inicio(){

		$ciudades = $this->usuarios->listarCiudades();

		if (!empty($this->tienda)) {	

			switch ($this->tienda) {

				case 'Artemisa':
					# code...
					break;

				case 'Supermercados-Naturista':
					# code...
					break;

				
				default:
					# code...
					break;
			}
		

			include 'views/landings-tiendas/inicio.php';
		}
	}
	
}