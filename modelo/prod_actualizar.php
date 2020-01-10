<?php
require_once("../config/conexion.php");

$id_producto = '';
$nombre = '';
$precio = '';
$stock = '';

if(isset($_GET['id_producto'])){
    $id_producto = $_GET['id_producto'];
    $query = "SELECT * FROM producto WHERE id_producto= $id_producto";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $precio = $row['precio'];
        $stock = $row['stock'];
    }
}

if(isset($_POST['update'])){
    $id_producto = $_GET['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $query = "UPDATE producto SET 
    nombre = '$nombre', 
    precio = '$precio',
    stock = '$stock'
    WHERE id_producto = $id_producto";

    mysqli_query($mysqli, $query);
    header('Location: ../vistas/adminproducto.php');
}
?>

<!-- BOOTSTRAP 4 -->
<link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">

<!--FORMULARIO-->
<div class="container h-50">
    <div class="row h-50 justify-content-center align-items-center">
    <form action="../modelo/prod_actualizar.php?id_producto=<?php echo $_GET['id_producto']; ?>" method="POST">
    <br>
    <br>
    <h1>Actualizar producto</h1>
    <br>
    <div class="form-group">
        <input type="number" name="id_producto" class="form-control" 
        value="<?php echo $id_producto; ?>" placeholder="id_producto">
    </div>
    <div class="form-group">
        <input type="text" name="nombre" class="form-control" 
        value="<?php echo $nombre; ?>" placeholder="Nombre">
    </div>
    <div class="form-group">
        <input type="number" name="precio" class="form-control" 
        value="<?php echo $precio; ?>" placeholder="Precio">
    </div>

    <div class="form-group">
        <input type="number" name="stock" class="form-control" 
        value="<?php echo $stock; ?>" placeholder="Stock disponible">
    </div>

    <input type="submit" name="update" class="btn btn-success btn-block" value="Actualizar">
    </form>
    </div>
</div>
<?php require_once("../include/footer.php"); ?>