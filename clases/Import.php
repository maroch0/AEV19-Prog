<?php
  /**
   *
   */
  class Import extends Conexion implements ImportInterface
  {
    public function __construct(){
      parent::__construct("conf.csv");
    }

    public function clear(){
      $conn = $this->connect();
//query para limpiar la tabla tareas antes de la importación
      $delete = false;
      $sql = "TRUNCATE tareas";
      $conn->query($sql);
//Comprobación del borrado de datos completo
      $sql2 = "SELECT * FROM tareas";
      $result = $conn->query($sql2);

      if ($result->num_rows > 0) {
        echo "No se han borrado todos los datos"."<br>";
      } else {
        $delete = true;
        echo "Borrado completado correctamente"."<br>";
      }
      return $delete;
    }

    public function import($datos){
      $conn = $this->connect();
//estamento preparado para inserción de datos en la tabla
      $stmt = $conn->prepare("INSERT INTO tareas(titulo, descripcion, fecha_creacion, fecha_vencimiento) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $title, $description, $creationDate, $expirateDate);
//Importación de los datos a partir del fichero csv
      $datos = fopen($datos, "r") or die("Unable to open file");
      while (($linea = fgetcsv($datos)) !== false) {
          $title = $linea[1];
          $description = $linea[2];
//Conversión de la fecha a partir del método que da el formato indicado
          $creationDate = Generica::toSQLDate($linea[3]);
          $expirateDate = Generica::toSQLDate($linea[4]);

          $stmt->execute();
      }
      fclose($datos);
      $stmt->close();
      $conn->close();
    }
//Método que comprueba que el borrado a sido correcto para poder realizar la importación
    public function init(){
      $delete = $this->clear();
      if ($delete == true) {
        $this->import("tareas.csv");
        echo "Import successfully";
      }else {
        echo "La importación no ha podido realizarse";
      }
    }

  }

 ?>
