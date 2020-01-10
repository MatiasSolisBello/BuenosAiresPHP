<?php
include('../config/conexion.php');

$nombre= '';
$apellidos= '';
$telefono= '';
$correo= '';
$direccion= '';
$password = '';

if(isset($_GET['rut'])) {
    $rut = $_GET['rut'];
    $query = "SELECT * FROM usuario WHERE rut= $rut";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $apellidos = $row['apellidos'];
        $telefono = $row['telefono'];
        $correo = $row['correo'];
        $direccion = $row['direccion'];
        $password = $row['password'];    
    }
}

if (isset($_POST['update'])) {
    $rut = $_GET['rut'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];   
    $password = $_POST['password'];

    $query = "UPDATE usuario SET 
    nombre = '$nombre',
    apellidos = '$apellidos',
    telefono = '$telefono',
    correo = '$correo',
    direccion = '$direccion',    
    password = '$password'
    WHERE rut = $rut";

    mysqli_query($mysqli, $query);
    header('Location: ../modelo/mis_datos.php');
}
?>

<!-- BOOTSTRAP 4 -->
<link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">

<div class="container p-4">
<div class="row">
<div class="col-md-4 mx-auto">
<div class="card card-body">
    <!--FORMULARIO-->
    <form action="mis_datos2.php?rut=<?php echo $_GET['rut']; ?>" method="POST">

        <div class="form-group">
            <input type="text" name="nombre" class="form-control" 
            value="<?php echo $nombre; ?>" placeholder="nombre ">
        </div>

        <div class="form-group">
            <input type="text" name="apellidos" class="form-control" 
            value="<?php echo $apellidos; ?>" placeholder="apellidos ">
        </div>

        <div class="form-group">
            <input type="tel" name="telefono" class="form-control" 
            value="<?php echo $telefono; ?>" placeholder="telefono ">
        </div>

        <div class="form-group">
            <input type="email" name="correo" class="form-control" 
            value="<?php echo $correo; ?>" placeholder="correo ">
        </div>

        <div class="form-group">
            <input type="text" name="direccion" class="form-control" 
            value="<?php echo $direccion; ?>" placeholder="direccion ">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" 
            value="<?php echo $password; ?>" placeholder="Titulo ">
        </div>

        <input type="submit" name="update" class="btn btn-success btn-block" value="Actualizar">
    </form>
</div>
</div>
</div>
</div>
<?php include('../include/footer.php'); ?>