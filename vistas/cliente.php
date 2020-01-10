<?php
session_start();
if (!isset($_SESSION['Cliente'])){
    header("location: ../login.php"); 
}
require_once("../config/conexion.php");
require_once("../include/cliente.php"); 

$sql1="SELECT COUNT(*) total from usuario where id_rol = 2";
$result1 = mysqli_query($mysqli, $sql1);
$fila1 = mysqli_fetch_assoc($result1);

$sql2="SELECT COUNT(*) solicitud from solicitud";
$result2 = mysqli_query($mysqli, $sql2);
$fila2 = mysqli_fetch_assoc($result2);

$sql3="SELECT COUNT(*) producto from producto";
$result3 = mysqli_query($mysqli, $sql3);
$fila3 = mysqli_fetch_assoc($result3);

$sql4="SELECT COUNT(*) boleta from compra";
$result4 = mysqli_query($mysqli, $sql4);
$fila4 = mysqli_fetch_assoc($result4);



?>
<br>
<h1 class="text-lg-center">Bienvenido <?php echo $_SESSION['Cliente']; ?></h1>
<!--*********************CADS**********
<div class="col main pt-5 mt-3">
    <div class="row mb-3">
        <div class="col-xl-3 col-sm-6 py-2">
            <div class="card bg-success text-white h-100">
                <div class="card-body bg-success">
                    <div class="rotate">
                        <i class="fa fa-user fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">N° Clientes</h6>
                    <h1 class="display-4"><?php echo $fila1['total']; ?></h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 py-2">
            <div class="card text-white bg-danger h-100">
                <div class="card-body bg-danger">
                    <div class="rotate">
                        <i class="fas fa-dolly fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">N° Solicitudes</h6>
                    <h1 class="display-4"><?php echo $fila2['solicitud']; ?></h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 py-2">
            <div class="card text-white bg-info h-100">
                <div class="card-body bg-info">
                    <div class="rotate">
                        <i class="fas fa-hand-holding-usd fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">N° de productos ofrecidos</h6>
                    <h1 class="display-4"><?php echo $fila3['producto']; ?></h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 py-2">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <div class="rotate">
                        <i class="far fa-sticky-note fa-4x"></i>
                    </div>
                    <h6 class="text-uppercase">N° de boletas emitidas</h6>
                    <h1 class="display-4"><?php echo $fila4['boleta']; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>-->
<?php include('../include/footer.php'); ?>
