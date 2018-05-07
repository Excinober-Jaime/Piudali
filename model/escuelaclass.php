<?php


/**
* 
*/
class Escuela
{

	/*private $host = 'localhost';
	private $db = 'linkgm_escuelapiudali';
	private $user = 'root';
	private $pass = '';*/

	private $host = 'localhost';
	private $db = 'linkgm_escuelapiudali';
	private $user = 'linkgm_escuela';
	private $pass = 'EZQ?SN~=[VD(';

	private $conexion;

	public function getUsers(){

		$query = $this->consulta('SELECT `ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name` FROM `cur_users`');

		return $query;
	}

	public function createUser($num_identificacion = '', $password = '', $nombre ='', $email =''){

		$iduser = $this->insertar("INSERT INTO `cur_users`(
									`user_login`, 
									`user_pass`, 
									`user_nicename`, 
									`user_email`, 
									`user_url`, 
									`user_registered`, 
									`user_activation_key`, 
									`user_status`, 
									`display_name`) VALUES (						
									'$num_identificacion',
									'$password',
									'$nombre',
									'$email',
									'',
									'',
									'',
									'0',
									'$nombre')");

		return $iduser;
	}

	public function createUserMeta($userid = 0, $meta_key = '', $meta_value = ''){

		$idusermeta = $this->insertar("INSERT INTO `cur_usermeta`(						 
									`user_id`, 
									`meta_key`, 
									`meta_value`) VALUES (						
									'$userid',
									'$meta_key',
									'$meta_value')");

		return $idusermeta;
	}

	/***FUNCIONES DE BASE DE DATOS***/

	private function connect(){

		if(!isset($this->conexion)) {

		    $this->conexion = new PDO(
		    'mysql:host='.$this->host.';dbname='.$this->db.'',
		    $this->user,
		    $this->pass,
		    array(
		        PDO::ATTR_PERSISTENT => false
		      )
		    );

		    $this->conexion->exec("SET CHARACTER SET utf8");
		  }
	}

	private function disconnect(){

    	$this->conexion = null;
  	}

  	public function consulta($sql){

	    $this->connect();
	    $result = $this->conexion->prepare($sql);
	    $result->execute();
	    $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
	    $this->disconnect();

	    return $resultado;
	 }

	 public function insertar($sql){

	    $this->connect();
	    $result = $this->conexion->prepare($sql);
	    $result->execute();
	    $id = $this->conexion->lastInsertId();
	    $this->disconnect();

	    return $id;
	 }

	 public function actualizar($sql){

	    $this->connect();
	    $count = $this->conexion->exec($sql);
	    $this->disconnect();

	    return $count;
	 }
}
?>