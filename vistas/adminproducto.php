<?php
    //CRUD COMPLETO A LA TABLA PRODUCTO
    session_start();
    if (!isset($_SESSION['Admin'])){
        header("location: ../login.php"); 
    }
    require_once("../config/conexion.php");
    require_once("../include/admin.php"); 
?>
<div class="container">
<form class="text-center border border-light p-2">
    <p class="h4 mb-4">Administrador de Productos</p>
    <div class="form-row mb-2">
        <div class="col">
            <input id="entradafilter" type="text" class="form-control" placeholder="Filtrado">
        </div>
        <div>
            <a href="../modelo/prod_agregar.php" class="btn btn-success">Agregar producto</a>
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
            <th>Imagen</th>
            <th>Acciones</th>
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
                    <td><?php echo '$', $row['precio']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td><?php echo '<img src="../images/upload/'.$row['imagen'].'"?" alt="Img" style="height: 12%;"/>'; ?></td>
                    <td>
                        <!--BOTONES-->
                        <a href="../modelo/prod_actualizar.php?id_producto=<?php 
                        echo $row['id_producto']?>" class="btn btn-secondary">
                        EDITAR
                         </a>           
                        <br>
                        
                        <a href="../modelo/prod_eliminar.php?id_producto=<?php 
                        echo $row['id_producto']?>" class="btn btn-danger">
                        BORRAR 
                        </a>
                    </td>
                </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<?php require_once("../include/footer.php"); ?>