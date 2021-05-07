<?php
/**
 *
 */
class Generica
{
//Metodos para conversión de fechas con strtotime
  public static function toSQLDate($date){
    return date("Y-m-d", strtotime($date));
  }
  public static function toViewDate($date){
    return date("d/m/Y", strtotime($date));
  }

}

 ?>
