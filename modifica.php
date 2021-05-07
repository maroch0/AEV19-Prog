<?php
//Llamamos al autoloader
require_once 'autoloader.php';
//Recogemos los datos del formulario
if (count($_POST)) {
  $id = $_POST["id"]; //variable para redirigir a la tarea modificada en el form
  $values = $_POST; //array asociativo con los datos insertados en el form
}
//Instanciamos el objeto
$tareaModificar = new Tarea();
//Pasamos los datos al método update() para que los procese
$tareaModificar->update($values);
//Llamamos a form-modifica.php con la id de la tarea modificada para que vuelva a mostrarse en el form
header("location: form-modifica.php?id=$id");

 ?>
