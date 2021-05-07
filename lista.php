<?php
//Llamamos al autoloader
  require_once 'autoloader.php';
//Instanciamos el objeto
  $listaTareas = new Listado();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tareas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<table class="greenTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Fecha Vencimiento</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="5">
                &nbsp;
            </td>
        </tr>
    </tfoot>
    <tbody>
<!-- Llamamos al método show() para que genere la tabla con los datos de la BBDD -->
      <?= $listaTareas->show() ?>
    </tbody>
</table>
<!-- Botón para acceder al form para añadir nueva tarea desde la lista -->
<a href="form.html"><input type="button" value="Añadir Nueva Tarea"></a>
</body>
</html>
