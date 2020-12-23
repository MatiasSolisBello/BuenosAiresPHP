<?php
    //TABLA USUARIO: TODOS LOS PERMISOS
    session_start();
    if (!isset($_SESSION['Admin'])){
        header("location:../login.php"); 
    }
    require_once("../config/conexion.php");
    require_once("../include/admin.php"); 
?>
<div class="container">
<form class="text-center border border-light p-2">
    <p class="h4 mb-4">Administrador de Usuarios</p>
    <div class="form-row mb-2">
        <div class="col">
            <input id="entradafilter" type="text" class="form-control" placeholder="Filtrado">
        </div>
        <div>
            <a href="../modelo/usuario_guardar.php" class="btn btn-success">Agregar Usuario</a>
        </div>
    </div>
</form>
<!-- ADD TASK FORM -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>RUN</th>
            <th>Nombres</th>
            <th>Contacto</th>
            <th>Comuna</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody class="contenidobusqueda">
        <?php
            $query = "SELECT u.rut, u.nombre, u.apellidos, u.telefono, u.correo,
            u.direccion, r.rol FROM usuario u INNER JOIN roles r on u.id_rol = r.id_rol";
            $result_tasks = mysqli_query($mysqli, $query);    
            while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                    <td><?php echo $row['rut']; ?></td>
                    <td><?php echo $row['nombre'].' '.$row['apellidos']; ?></td>
                    <td><?php echo $row['telefono'].' <br>'. $row['correo'];?></td>
                    <td><?php echo $row['direccion']; ?></td>
                    <td><?php echo $row['rol']; ?></td>
                    <td>
                        <!--BOTONES-->
                        
                        <a href="../modelo/usuario_actualizar.php?rut=<?php echo $row['rut']?>" 
                        class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                            <br>
                        <a href="../modelo/usuario_eliminar.php?rut=<?php echo $row['rut']?>" 
                        class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<?php require_once("../include/footer.php"); ?>