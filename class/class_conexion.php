<?php
   abstract class Conexion {

      public function conectar(){
         $mysqli = new mysqli('localhost','robert7_tuclased','mxNfei?g+kox','robert7_tuclasedebaile',3306);

         if ($mysqli->connect_errno)
            header('Location: offline.html');

         $mysqli->set_charset('utf8');

         return $mysqli;
      }



   }
   /*
   abstract class Conexion {

      public function conectar(){
         $mysqli = new mysqli('localhost','root','','easydance',3306);

         if ($mysqli->connect_errno)
            header('Location: offline.html');

         $mysqli->set_charset('utf8');

         return $mysqli;
      }



   }*/
?>