<?php

/**
* 
*/
class Mailchimp
{
	
	public $api_key = '11da7b41f5afb512170d3cb4d7986132-us16';
 	

 	public function suscribir($list_id = '', $email ='', $fname = '', $lname = '', $id = 0, $genero = '', $cumpleanos = '', $cedula = '', $direccion = '', $celular = '', $segmento = '', $estado = 1, $registro = '', $organizacion = 0, $ciudad = '', $tipo = 'DISTRIBUIDOR DIRECTO'){

 		switch ($tipo) {

 			case 'DISTRIBUIDOR DIRECTO':

 				$data = array(

		 			'email_address' => $email,
				    'status'        => 'subscribed',

				    'merge_fields'  => array(

				      'FNAME'       => $fname,
				      'LNAME'       => $lname,
				      'ID'       	=> $id,
				      'GÉNERO'      => $genero,
				      'CUMPLEAÑOS'  => $cumpleanos,
				      'CÉDULA'      => $cedula,
				      'DIRECCIÓN'   => $direccion,
				      'CELULAR'     => $celular,
				      'SEGMENTO'    => $segmento,
				      'ESTADO'     	=> $estado,
				      'REGISTRO'    => $registro,
				      'ORGANIZACION'=> $organizacion,
				      'CIUDAD'		=> $ciudad

				    )
		 		);
 				break;

 			case 'REPRESENTANTE COMERCIAL':
 				
 				$data = array(

		 			'email_address' => $email,
				    'status'        => 'subscribed',

				    'merge_fields'  => array(

				      'FNAME'       => $fname,
				      'LNAME'       => $lname,
				      'ID'       	=> $id,				      
				      'SEGMENTO'    => $segmento,				      
				      'REGISTRO'    => $registro,				      
				      'CIUDAD'		=> $ciudad

				    )
		 		);

 				break;
 			
 			default:
 				
 				$data = array();
 				break;
 		}

 		// Encode the data
  		$encoded_pfb_data = json_encode($data);

  		// Setup cURL sequence
		$ch = curl_init();

		/* ================
		* cURL OPTIONS
		* The tricky one here is the _USERPWD - this is how you transfer the API key over
		* _RETURNTRANSFER allows us to get the response into a variable which is nice
		* This example just POSTs, we don't edit/modify - just a simple add to a list
		* _POSTFIELDS does the heavy lifting
		* _SSL_VERIFYPEER should probably be set but I didn't do it here
		* ================
		*/
		curl_setopt($ch, CURLOPT_URL, 'https://us16.api.mailchimp.com/3.0/lists/'.$list_id.'/members/');
		curl_setopt($ch, CURLOPT_USERPWD, 'user:'.$this->api_key);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_pfb_data);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$result_info = curl_exec($ch); // store response
		$response = curl_getinfo($ch, CURLINFO_HTTP_CODE); // get HTTP CODE
		$errors = curl_error($ch); // store errors

		curl_close($ch);

		// Returns info back to jQuery .ajax or just outputs onto the page

		$results = array(
			'results' => $result_info,
			'response' => $response,
			'errors' => $errors
		);

		// Sends data back to the page OR the ajax() in your JS
		return json_encode($results);
 	}
}
?>