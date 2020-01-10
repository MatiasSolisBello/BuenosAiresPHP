<?php
require_once("config/conexion.php");
require_once("include/header2.php");
session_start();

if (isset($_POST['login'])) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    
    $rol = "SELECT * FROM USUARIO WHERE 
    correo = '$correo'  AND password = '$password'";

    $consulta = mysqli_query($mysqli, $rol);
    $array = mysqli_fetch_array($consulta);
    //REDIRECCIONA
    if($array['id_rol'] == 1){
        $_SESSION['Admin'] = $correo;
        header("location: vistas/admin.php");  //TECNICO
    }elseif($array['id_rol'] == 2){
        $_SESSION['Cliente'] = $correo;
        $_SESSION['nombre'] = $nombre;
        header("location: vistas/cliente.php");  //CLIENTE
    }elseif($array['id_rol'] == 3){
        $_SESSION['Tecnico'] = $correo;
        header("location: vistas/tecnico.php");   //ADMIN
    }else{
        echo'<script type="text/javascript">
        alert("Datos erroneos");
        window.location.href="login.php";
        </script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div id="login">
<div class="container">
<div id="login-row" class="row justify-content-center align-items-center">
<div id="login-column" class="col-md-6">
<div id="login-box" class="col-md-12">
    <form id="login-form" class="form" 
    action="login.php" method="POST">
        <h3 class="text-center text-info">Ingrese</h3>
        <div class="form-group">
            <label for="correo" class="text-info">Correo:</label><br>
            <input type="text" name="correo" id="correo" 
            class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="text-info">Contraseña:</label><br>
            <input type="password" name="password" id="password" 
            class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="login" class="btn btn-info btn-md" 
            value="Ingrese">
            <!--<a class="form-inline lg-0" href="recupera.php">Recuperacion de Contraseña</a>-->
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>