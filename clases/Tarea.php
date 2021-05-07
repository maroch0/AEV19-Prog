<?php
  /**
   *
   */
  class Tarea extends Conexion implements CrudInterface, ViewInterface
  {
    public function __construct()
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

    public function update($values){
      $conn = $this->connect();

      $title = $values["title"];
      $description = $values["description"];
      $expirateDate = $values["dueDate"];
      $id = $values["id"];
//estamento preparado para actualización de la tabla que, en caso de no realizarse correctamente, devolverá el error
      if ($stmt2 = $conn->prepare("UPDATE tareas SET titulo=?, descripcion=?,fecha_vencimiento=?  WHERE id=?")) {
        $stmt2->bind_param("sssi",$title, $description,$expirateDate, $id);
      } else {
        echo "Error: " . $conn->error;
      }

      $stmt2->execute();

      $stmt2->close();
      $conn->close();
    }
    public function delete($id){
      $conn = $this->connect();
//estamento preparado para borrado de un id que pasaremos por parámetro
      $stmt = $conn->prepare("DELETE FROM tareas WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();

      $stmt->close();
      $conn->close();
    }
    public function add($values){
      $conn = $this->connect();
//estamento preparado para inserción de nuevos datos que pasaremos por parámetro
      $stmt = $conn->prepare("INSERT INTO tareas(titulo, descripcion, fecha_creacion, fecha_vencimiento) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $title, $description, $creationDate, $expirateDate);

      $title = $values["title"];
      $description = $values["description"];
      $creationDate = date("Y-m-d");
      $expirateDate = $values["dueDate"];
      $stmt->execute();

      $stmt->close();
      $conn->close();
    }
//Método que vuelca en detalle.php todos los datos que coinciden con la id que se pasa por $_GET
    public function show()
    {
      $datos = $this->get();

      foreach ($datos as $row) {
        if ($row["id"] == $_GET["id"]) {
          return $row;
        }
      }
      return null;
    }

  }

 ?>
