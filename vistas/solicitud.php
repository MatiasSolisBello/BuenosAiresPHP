<?php 
  //SOLO ENVIO DE SOLICITUD
  session_start();
  if (!isset($_SESSION['Cliente'])) 
  {
    header("location:../login.php"); 
  }
  require_once("../config/conexion.php");
  require_once("../include/cliente.php"); 

?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <!--FORMULARIO-->
                <form action="../modelo/solicitud_guardar.php" method="POST">
                  <div class="form-group">
                    <strong class="text-center">
                      En el siguiente texto indique: <br>
                       - motivo de solicitud <br>
                       - fechas y horas en que usted estara disponible para la visita
                    </strong>
                    <textarea name="detalles" class="form-control" placeholder="Texto" cols="30" rows="5" required style="margin-top: 0px; margin-bottom: 0px; height: 80px;"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="text" name="rut" id="rut" class="form-control" placeholder="Ingrese su rut">
                  </div>
                  <input type="submit" name="solicitud_guardar" class="btn btn-success btn-block" value="Guardar">
                </form>
                </div>
        </div>
    </div>
</div>
<?php include('../include/footer.php'); ?>

