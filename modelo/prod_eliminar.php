<?php
require_once("../config/conexion.php");

if(isset($_GET['id_producto'])) {
  $id_producto = $_GET['id_producto'];
  $query = "DELETE FROM producto WHERE id_producto = $id_producto";
  $result = mysqli_query($mysqli, $query);
  if(!$result) {
    die("Conexion fallida al eliminar.");
  }
  header('Location: ../vistas/adminproducto.php');
}

?>