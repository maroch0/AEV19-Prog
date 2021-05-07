<?php
//Llamamos al autoloader
require_once 'autoloader.php';
//Instanciamos el objeto
$lista = new Tarea();
//Llamamos al método show() para que rellene una tabla con todos los datos del título seleccionado
$detalles = $lista->show();

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<table class="greenTable">
    <thead>
        <tr>
            <th>Titulo: <?=$detalles["titulo"]?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
          <!-- Damos el formato indicado a la fecha a través del método toViewDate() -->
            <td>Fecha Vencimiento: <?=Generica::toViewDate($detalles["fecha_vencimiento"])?></td>
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <td>Fecha Creacion: <?=Generica::toViewDate($detalles["fecha_creacion"])?></td>
        </tr>
        <tr>
            <td> <?=$detalles["descripcion"]?></td>
        </tr>
    </tbody>
</table>
<a href="lista.php"><input type="button" value="Volver a la lista"></a>
</body>
</html>
