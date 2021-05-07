<?php

function cargador($clase)
{
  $dir = ["clases", "contracts"];
  $fileExist = false;

  foreach ($dir as $directory) {
    $fichero = "$directory/{$clase}.php";
    if (file_exists($fichero)) {
      require_once $fichero;
      $fileExist = true;
    }
  }

  if (!$fileExist) {
    die("el fichero de clase {$clase}.php no existe");
  }
}

spl_autoload_register("cargador");

 ?>
