<?php
    //ADMINISTRACION DE LA TABLA SOLICITUD DESDE LA VISTA DEL TECNICO
    session_start();
    if (!isset($_SESSION['Tecnico'])) 
    {
      header("location:../login.php"); 
    }
  require_once("../config/conexion.php");
  require_once("../include/tecnico.php");
?>
<form class="text-center border border-light p-2">
    <p class="h4 mb-4">Administrador de Solicitudes</p>
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
            <th>Fecha</th>
            <th>Detalles</th>
            <th>Estado</th>
            <th>Precio</th>
            <th>Rut</th>
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
                    <td>
                        <!--BOTONES-->
                        
                        <a href="../modelo/solicitud_actualizar.php?id_solicitud=<?php echo $row['id_solicitud']?>" 
                        class="btn btn-secondary">Editar
                            <i class="fas fa-marker"></i>
                          
                    </td>
                </tr>
        <?php } ?>
    </tbody>
</table>
<?php include('../include/footer.php'); ?>