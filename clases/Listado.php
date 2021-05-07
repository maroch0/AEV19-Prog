<?php
  /**
   *
   */
  class Listado extends Conexion implements ViewInterface
  {
    function __construct()
    {
      parent::__construct("conf.csv");
    }
//Método que contiene una query que devuelve todos los datos de la tabla tareas
    public function get()
    {
      $conn = $this->connect();
      $sql = "SELECT * FROM tareas";
      $result = $conn->query($sql);
      $lineasDatos = [];

      if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
          array_push($lineasDatos, $row);
        }
      } else {
        echo "0 resultados";
      }

      $conn->close();
      return $lineasDatos;
    }
//Método para mostrar el resultado de la query anterior en una tabla
    public function show()
    {
      $datos = $this->get();
      $output = "";

      foreach ($datos as $row) {
        $output.= "<tr>";
        $output.= "<td>".$row["id"]."</td>";
//Enlace a la información completa de un id
        $output.= "<td><a href='detalle.php?id=".$row["id"]."'>".$row["titulo"]."</a></td>";
//Conversión de la fecha a partir del método que da el formato indicado
        $output.= "<td>".Generica::toViewDate($row["fecha_vencimiento"])."</td>";
//Enlace para modificación de los datos de un id
        $output.= "<td><a href='form-modifica.php?id=".$row["id"]."'>Modificar</a></td>";
//Enlace para borrado de los datos de un id
        $output.= "<td><a href='form-borrado.php?id=".$row["id"]."'>Borrar</a></td>";
        $output.= "</tr>";
      }
      return $output;
    }

  }

 ?>
