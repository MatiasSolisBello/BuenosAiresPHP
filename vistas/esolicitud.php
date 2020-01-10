<?php
    //TABLA SOLICITUD: SOLO LECTURA
    session_start();
    if (!isset($_SESSION['Admin'])) {
        header("location:../login.php"); 
    }
    require_once("../config/conexion.php");
    require_once("../include/admin.php"); 
?>
<form class="text-center border border-light p-2">
    <p class="h4 mb-4">Estado de Solicitudes</p>
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
            <th>ID</th>
            <th>Fecha</th>
            <th>Detalles</th>
            <th>Estado</th>
            <th>Precio</th>
            <th>Rut Cliente</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody class="contenidobusqueda">
        <?php
            $query = "SELECT s.id_solicitud, s.fecha, s.detalles, 
            s.estado, s.precio, u.rut, concat_ws(' ',u.nombre, u.apellidos)
             as nombre FROM solicitud s INNER JOIN usuario u on u.rut = s.rut";
            $result_tasks = mysqli_query($mysqli, $query);    
            while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                    <td><?php echo $row['id_solicitud']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['detalles']; ?></td>
                    <td><?php echo $row['estado']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                    <td><?php echo $row['rut']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                   
                </tr>
        <?php } ?>
    </tbody>
</table>
<?php require_once("../include/footer.php"); ?>
