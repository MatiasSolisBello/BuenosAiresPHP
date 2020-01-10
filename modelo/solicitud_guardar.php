<?php require_once("../config/conexion.php");

if (isset($_POST['solicitud_guardar'])) {
    $rut = $_POST['rut'];
    $detalles = $_POST['detalles'];

    $query = "INSERT INTO solicitud(id_solicitud, 
    fecha, detalles, estado, rut) 
    VALUES('', NOW(), '$detalles', 'En Revision', '$rut')";

    $result = mysqli_query($mysqli, $query);
    if(!$result) {
        die("Query Failed.");
    }
    echo 
    "<script>
        alert('Solicitud entregada correctamente. Pronto nos comunicaremos en usted para confirmar la cita');
        window.location.href='../vistas/solicitud.php';
    </script>";
}



?>