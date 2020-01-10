<?php
include('../config/conexion.php');
$estado = '';
$precio = '';

if(isset($_GET['id_solicitud'])) {
    $id_solicitud = $_GET['id_solicitud'];
    $query = "SELECT * FROM solicitud WHERE id_solicitud= $id_solicitud";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $estado = $row['estado'];
        $precio = $row['precio'];
    }
}

if (isset($_POST['update'])) {
    $id_solicitud = $_GET['id_solicitud'];
    $estado = $_POST['estado'];
    $precio = $_POST['precio'];

    $query = "UPDATE solicitud SET 
    estado = '$estado',
    precio = '$precio'
    WHERE id_solicitud = $id_solicitud";

    mysqli_query($mysqli, $query);
    header('Location: ../vistas/tsolicitud.php');
}
?>
<!-- BOOTSTRAP 4 -->
<link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
<div class="container p-4">
<div class="row">
<div class="col-md-6 mx-auto">
<div class="card card-body">
    <!--FORMULARIO-->
    <form action="solicitud_actualizar.php?id_solicitud=
    <?php echo $_GET['id_solicitud']; ?>" method="POST">
        <br>
        <br>
        <h1 class="text-lg-center">Actualizar solicitud</h1>
        <br>
        <div class="form-group">
            <input type="text" name="estado" class="form-control" 
            value="<?php echo $estado; ?>" placeholder="Estado">
        </div>
        <div class="form-group">
            <input type="number" name="precio" class="form-control" 
            value="<?php echo $precio; ?>" placeholder="Precio">
        </div>
        <input type="submit" name="update" class="btn btn-success btn-block" value="Actualizar">
    </form>
</div>
</div>
</div>
</div>
<?php include('../include/footer.php'); ?>