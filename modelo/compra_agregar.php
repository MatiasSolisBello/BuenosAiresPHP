<?php
require_once("../config/conexion.php");

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

if(isset($_POST['comprar'])){
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
<form action="../modelo/compra_agregar.php?id_producto=<?php 
    echo $_GET['id_producto']; ?>" method="POST">
    <br>
    <br>
    <h1>Comprar producto</h1>
    <br>
    <strong class="text-center">ID producto:   
    <?php echo $row['id_producto']; ?></strong><br>

    <strong class="text-center">Producto:   
    <?php echo $row['nombre']; ?></strong><br>

    <strong class="text-center">Precio:   
    $<?php echo $row['precio']; ?></strong>

    <div class="form-group">
        <p>Cantidad:</p>
        <input type="number" name="cantidad" class="form-control" >
    </div>
    <div class="form-group">
        <p>Ingrese su rut:</p>
        <input type="text" name="rut" class="form-control" >
    </div>

    <input type="submit" name="comprar" class="btn btn-success btn-block" 
    value="Comprar">
</form>
</div>
</div>
<?php require_once("../include/footer.php"); ?>