<?php
  session_start();
  if (!isset($_SESSION['Tecnico'])) 
  {
    header("location:../login.php"); 
  }
  require_once("../config/conexion.php");
  require_once("../include/tecnico.php");
?>
<br>
<h1 class="text-lg-center">Bienvenido tecnico!</h1>