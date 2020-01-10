<?php
    //SOLO SE VISUALIZA LOS PRODUCTOS, NO SE AGREGA NI ACTUALIZA NI ELIMINA
    session_start();
    if (!isset($_SESSION['Tecnico'])) 
    {
      header("location:../login.php"); 
    }
    require_once("../config/conexion.php");
    require_once("../include/tecnico.php"); 
?>

<form class="text-center border border-light p-2">
    <p class="h4 mb-4">Administrador de Productos</p>
    <div class="form-row mb-2">
        <div class="col">
            <input id="entradafilter" type="text" class="form-control" placeholder="Filtrado">
        </div>
    </div>
</form>
<!-- ADD TASK FORM -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody class="contenidobusqueda">
        <?php
            $query = "SELECT * from producto";
            $result_tasks = mysqli_query($mysqli, $query);    
            while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                    <td><?php echo $row['id_producto']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php require_once("../include/footer.php"); ?>