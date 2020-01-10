<?php
    session_start();
    if (!isset($_SESSION['Cliente'])){
        header("location:../login.php"); 
    }
    include('../config/conexion.php');
    include('../include/cliente.php');  
    $correo= $_SESSION['Cliente'];
    $query = "SELECT * FROM usuario WHERE correo = '$correo'";
    $result_tasks = mysqli_query($mysqli, $query);    
    while($row = mysqli_fetch_assoc($result_tasks)) { 
?>  

<!--DISEÑO-->
<div class="container p-4">
<div class="row">
<div class="col-md-4 mx-auto">
<div class="card card-body">
    <!--FORMULARIO-->
    <form action="../modelo/mis_datos2.php" method="POST">
        <div class="form-group">
        <h1 class="text-lg-center">Mis Datos</h1>
        <strong class="text-center">Rut:<?php echo $row['rut']; ?></strong><br>
        <strong class="text-center">Nombre: <?php echo $row['nombre']; ?></strong><br>
        <strong class="text-center">Apellido: <?php echo $row['apellidos']; ?></strong><br>
        <strong class="text-center">Telefono: <?php echo $row['telefono']; ?></strong><br>
        <strong class="text-center">Correo: <?php echo $row['correo']; ?></strong><br>
        <strong class="text-center">Direccion: <?php echo $row['direccion']; ?></strong><br><br>
        <a href="../modelo/mis_datos2.php?rut=<?php echo $row['rut']?>" class="btn btn-success">Editar</a>
    </form>
    </div>
</div>
</div>
</div>
<?php } ?>
<?php include('../include/footer.php'); ?>