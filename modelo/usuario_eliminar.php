<?php
require_once("../config/conexion.php");

if(isset($_GET['rut'])) {
  $rut = $_GET['rut'];
  $query = "DELETE FROM usuario WHERE rut = $rut";
  $result = mysqli_query($mysqli, $query);
  if(!$result) {
    die("Conexion fallida al eliminar.");
  }

  header("location: ../vistas/usuario.php");
}

?>