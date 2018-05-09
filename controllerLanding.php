<?php

/**
* 
*/
class ControllerLanding
{

	public $alerta = array();
	
	function __construct()
	{
		
		$this->usuarios = new Usuarios();
		$this->mailchimp = new Mailchimp();
	}

	public function landing_distribuidores_virtuales($alerta = ''){

		if (!empty($alerta)) {
			
			switch ($alerta) {

				case 'INVALIDO':
					$this->alerta = array('INVALIDO', 'Usted ya posee una cuenta');
					break;

				case 'EXITOSO':
					$this->alerta = array('EXITOSO','Tu registro fue exitoso. Por favor ingresa con tus datos');
					break;

				case 'FALLIDO':
					$this->alerta = array('FALLIDO','No fue posible realizar el registro. Por favor intenta de nuevo.');
					break;
				
				default:
					# code...
					break;
			}
		}


		if (isset($_POST['registrarse'])) {

			extract($_POST);

			if (!empty($nombre) && !empty($num_documento) && !empty($email) && !empty($telefono_m) && !empty($apellido) && !empty($ciudad)) {
				
				if (count($this->usuarios->validarUsuario($num_documento, $email))>0) {

					header('Location: '.URL_SITIO.URL_LANDING.'/'.URL_LANDING_DISTRIBUIDORES_VIRTUALES.'/INVALIDO');

				}else{

					$tipo = "DISTRIBUIDOR DIRECTO";
					$segmento = '';
					$foto = "";
					$estado = 1;
					$fecha_registro = fecha_actual("datetime");
					$passwordmd5 = md5($password);
					$idorganizacion = 0;				
					$fecha_nacimiento = "0000-00-00";
					$boletines = 1;
					$condiciones = 1;
					$direccion = '';
					$referente = 0;
					$lider = 0;
					$nivel = 0;

					$idusuario = $this->usuarios->crearUsuario(strtoupper($nombre), strtoupper($apellido), '', $fecha_nacimiento, $email, $passwordmd5, $num_documento, $boletines, $condiciones, $direccion, 0, '', $telefono_m, $tipo, $segmento, $foto, $estado, $fecha_registro, $referente, $lider, 0, $nivel, $ciudad, $idorganizacion);

					if (!empty($idusuario)) {

						//Crear usuario en escuela virtual
						$escuela = new Escuela();

						$iduserescuela = $escuela->createUser($num_documento, $passwordmd5, strtoupper($nombre), $email);

						if (!empty($iduserescuela)) {
							
							$escuela->createUserMeta($iduserescuela, 'cur_capabilities', 'a:1:{s:10:"subscriber";b:1;}');

							$escuela->createUserMeta($iduserescuela, 'empresa', '1511');

							$escuela->createUserMeta($iduserescuela, 'num_ident', $num_documento);

							$escuela->createUserMeta($iduserescuela, 'first_name', strtoupper($nombre));

							$escuela->createUserMeta($iduserescuela, 'last_name', strtoupper($apellido));

							$escuela->createUserMeta($iduserescuela, 'cargo', 'DISTRIBUIDOR DIRECTO');

						}

						//Suscribir en Mailchimp
						$suscribir = $this->mailchimp->suscribir('b8ebc5f9f4',$email, strtoupper($nombre), strtoupper($apellido), $idusuario, '', '', $num_documento, strtoupper($direccion), $telefono_m, $segmento, 1, fecha_actual('date'), $idorganizacion, $tipo);
						
						//Enviar email Bienvenida
						$idplantilla=2;
						$plantilla = $this->usuarios->detallePlantilla($idplantilla);
						$mensaje = shorcodes_registro_usuario($nombre." ".$apellido,$email,$password,$plantilla["mensaje"]);

						require_once 'include/PHPMailer-master/PHPMailerAutoload.php';

						//Create a new PHPMailer instance
						$mail = new PHPMailer;
						//Set who the message is to be sent from
						$mail->setFrom($plantilla["email"], "Piudali");
						//Set an alternative reply-to address
						//$mail->addReplyTo('replyto@example.com', 'First Last');
						//Set who the message is to be sent to
						$mail->addAddress($email, $nombre." ".$apellido);
						//Set the subject line
						$mail->Subject = $plantilla["asunto"];
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

						    //echo 'Por favor revisa tu correo';
						}

						header('Location: '.URL_SITIO.URL_LANDING.'/'.URL_LANDING_DISTRIBUIDORES_VIRTUALES.'/EXITOSO');
						
					}else{

						header('Location: '.URL_SITIO.URL_LANDING.'/'.URL_LANDING_DISTRIBUIDORES_VIRTUALES.'/FALLIDO');
					}
				}
			}
		}

		$ciudades = $this->usuarios->listarCiudades();

		include 'views/landings/distribuidores_virtuales/index.php';

	}


	public function landing_biopharma(){

		include 'views/landings/biopharma/index.php';
	}


}

?>