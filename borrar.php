<?php
//Llamamos al autoloader
  require_once 'autoloader.php';
//Recogemos el id con $_POST
  if (count($_POST)) {
    $id = $_POST["id"];
  }
//Instanciamos el objeto
  $borrado = new Tarea();
//Le pasamos la id al método delete()
  $borrado->delete($id);
//Llamamos a lista.php para que vuelva a mostrar el listado
  header("location: lista.php");
 ?>
