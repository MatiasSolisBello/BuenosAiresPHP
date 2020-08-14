<?php
  require_once("../config/conexion.php");
  require_once("../include/header.php"); 

  if (isset($_POST['usuario_guardar'])) {
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $password = $_POST['password'];
    $id_rol = $_POST['id_rol'];

    //ENCRIPTAMOS LA VARIABLE PASSWORD
    $hash = md5($password);

    //INGRESO A LA BD
    $query = "INSERT INTO usuario
    (rut, nombre, apellidos, telefono, correo, direccion, password, id_rol) 
    VALUES
    ('$rut','$nombre', '$apellidos', '$telefono', '$correo', '$direccion',  '$hash', '$id_rol')";

    $result = mysqli_query($mysqli, $query);
    if(!$result) {
      die("Insercion de cliente ha fallado. Intenta denuevo");
    }
    header("location: ../vistas/usuario.php");
  }
?>

<!-- BOOTSTRAP 4 -->
<link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">


<!--FORMULARIO-->
<div class="container h-50">
  <!-- ADD TASK FORM -->
  <div class="row h-50 justify-content-center align-items-center">
    <!--GUARDAR-->
    <form action="../modelo/usuario_guardar.php" method="POST">
    <br>
    <br>
    <h1>Registre usuario</h1>
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
          <input type="tel" name="telefono" class="form-control" 
          placeholder="Telefono" autofocus required>
      </div>
      <div class="form-group">
          <input type="email" name="correo" class="form-control" 
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

      <div class="form-group">
        <select class="form-control" id="id_rol" name="id_rol" required>
          <option value="">-- Selecciona--</option>
          <option value="1">Admin</option>
          <option value="2">Cliente</option>
          <option value="3">Tecnico</option>

      </select>
      </div>

      <input type="submit" name="usuario_guardar" class="btn btn-success btn-block" value="Guardar">
    </form>
  </div>
</div>
<?php require_once("../include/footer.php"); ?>


