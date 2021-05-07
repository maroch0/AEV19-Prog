<?php
//Llamamos al autoloader
  require_once 'autoloader.php';
//Recogemos los datos del formulario
  if (count($_POST)) {
    $values = $_POST; //array asociativo con los datos insertados en el form
  }
  //Instanciamos el objeto
  $tareaNueva = new Tarea();
  //Pasamos los datos al método add() para que los procese
  $tareaNueva->add($values);
  //Llamamos a lista.php para que muestre el listado
  header("location: lista.php")

 ?>
