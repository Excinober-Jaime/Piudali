<?php 
/**
* 
*/
class Personal extends Database
{
	public function listarPersonal(){
		
		$query = $this->consulta("SELECT `idpersona`, `nombre`, `cargo`, `usuario`, `password`, `rol`, `estado`, `companias_idcompania` FROM `personal`");
		
		return $query;
	}

	public function crearPersonal($nombre="", $cargo="", $usuario="", $password="", $rol="", $estado="", $compania=0){
		
		$idpersona = $this->insertar("INSERT INTO `personal`(										
										`nombre`, 
										`cargo`, 
										`usuario`, 
										`password`, 
										`rol`, 
										`estado`, 
										`companias_idcompania`) VALUES (										
										'$nombre',
										'$cargo',
										'$usuario',
										'$password',
										'$rol',
										'$estado',
										'$compania')");
		
		return $idpersona;
	}

	public function actualizarPersonal($idpersona=0, $nombre="", $cargo="", $usuario="", $password="", $rol="", $estado="", $compania=0){
		
		$query = $this->actualizar("UPDATE `personal` SET 
									`nombre`= '$nombre',
									`cargo`= '$cargo',
									`usuario`= '$usuario',
									`password`= '$password',
									`rol`= '$rol',
									`estado`= '$estado',
									`companias_idcompania`= '$compania'
								WHERE `idpersona`='$idpersona'");
		return $query;
	}



	public function detallePersona($idpersona){
		
		$query = $this->consulta("SELECT `idpersona`, `nombre`, `cargo`, `usuario`, `password`, `rol`, `estado`, `companias_idcompania` FROM `personal` WHERE `idpersona`='$idpersona'");
		
		return $query[0];
	}

	public function listarCompanias(){
		
		$query = $this->consulta("SELECT `idcompania`, `nombre`, `nit`, `direccion`, `email`, `telefono`, `representante_legal`, `estado` FROM `companias`");
		
		return $query;
	}
}
?>