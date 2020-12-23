<?php
  require_once("config/conexion.php"); 
  require_once("include/header2.php"); 
  if (isset($_POST['usuario_guardar'])) { 
    
    //GUARDAMOS LAS VARIABLES INGRESADAS VIA POST
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $password = $_POST['password'];

    //ENCRIPTAMOS LA VARIABLE PASSWORD
    $hash = md5($password);

    //INGRESO A LA BD
    $query = "INSERT INTO usuario
    (rut, nombre, apellidos, telefono, correo, direccion, password, id_rol) 
    VALUES
    ('$rut', '$nombre', '$apellidos', '$telefono', '$correo', '$direccion', '$hash', 2)";
    $result = mysqli_query($mysqli, $query);
    if(!$result) {
      die("Query Failed.");
    }
    header("location: login.php");
  }
?>
<!--FORMULARIO-->
<div id="login">
<div class="container">
<div id="login-row" class="row justify-content-center align-items-center">
<div id="login-column" class="col-md-6">
<div id="login-box" class="col-md-12">
<!--GUARDAR-->
<form id="login-form" class="form" action="singup.php" method="POST" >
  <br>
  <h3 class="text-center">Registrese</h3>
  <br>
  <div class="form-group">
      <input type="text" name="rut" class="form-control" 
      placeholder="Rut" autofocus required>
  </div>
  <div class="form-group">
    <input type="text" name="nombre" class="form-control" 
    placeholder="Nombres" autofocus required>
  </div>
  <div class="form-group">
    <input type="text" name="apellidos" class="form-control" 
    placeholder="Apellidos" autofocus required>
  </div>
  <div class="form-group">
    <input type="text" name="telefono" class="form-control" 
    placeholder="Telefono" autofocus required>
  </div>
  <div class="form-group">
    <input type="text" name="correo" class="form-control" 
    placeholder="Correo" autofocus required>
  </div>
  <div class="form-group">
    <input type="text" name="direccion" class="form-control" 
    placeholder="Direccion" autofocus required>
  </div>

  <div class="form-group">
    <input type="password" name="password" class="form-control" 
      placeholder="Password" autofocus required>
  </div>

  <input type="submit" name="usuario_guardar" 
  class="btn btn-success btn-block" value="Guardar">
</form>
</div>
</div>
</div>
</div>
</div>
<!--FOOTER-->
<?php require_once("include/footer.php"); ?>