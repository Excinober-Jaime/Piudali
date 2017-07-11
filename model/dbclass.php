<?php
/*
CLASE PARA LA CONEXION Y LA GESTION DE LA BASE DE DATOS Y LA PAGINA WEB
*/
class Database {

 public $conexion;

  /* METODO PARA CONECTAR CON LA BASE DE DATOS*/
 public function connect()
 {
  if(!isset($this->conexion))
  {
/*   
    $this->conexion = new PDO(
    'mysql:host=localhost;dbname=linkgm_piudaliBlog',
    'linkgm_piudali',
    'Graciasdios1',
    array(
        PDO::ATTR_PERSISTENT => false
      )
    );*/

    $this->conexion = new PDO(
    'mysql:host=localhost;dbname=piudali2',
    'root',
    '',
    array(
        PDO::ATTR_PERSISTENT => false
      )
    );

    $this->conexion->exec("SET CHARACTER SET utf8");
  }
 }

 public function consulta($sql)
 {

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

  public function disconnect(){
    $this->conexion = null;
  }

}
?>