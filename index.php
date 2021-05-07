<?php
//Llamamos al autoloader
  require_once 'autoloader.php';
//Instanciamos el objeto
  $database = new Import();
//Llamamos al método init() para que limpie y rellene de nuevo la BBDD
  $database->init();
//Una vez limpiada e importada la BBDD redirigimos a la lista de datos
  header("location: lista.php")
 ?>
