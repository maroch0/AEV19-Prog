<?php

abstract class Conexion
{
  private $serverName;
  private $userName;
  private $password;
  private $dbName;

//El constructor abre el archivo csv indicado en modo lectura y de él se extraen los datos de cada atributo
  public function __construct($myfile)
  {
    $myfile = fopen($myfile, "r");
    $datosServer = fgetcsv($myfile);

    $this->serverName = $datosServer[0];
    $this->userName = $datosServer[1];
    $this->password = $datosServer[2];
    $this->dbName = $datosServer[3];

    fclose($myfile);
  }
//Metodo para la conexion a la base de datos
  public function connect(){
    $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }

}


 ?>
