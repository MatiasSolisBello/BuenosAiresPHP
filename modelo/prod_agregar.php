<?php 
require_once("../config/conexion.php");
if (isset($_POST['prod_agregar'])) {
  $id_producto = $_POST['id_producto'];
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $stock = $_POST['stock'];
  $image = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];


  move_uploaded_file($image_tmp,"../images/upload/$image");
  $query = "INSERT INTO producto
  (id_producto,nombre, precio, stock, imagen) 
  VALUES('$id_producto', '$nombre', '$precio', '$stock', '$image')";
  $result = mysqli_query($mysqli, $query);
  if(!$result) {
    die("Query Failed.");
  }
  header("location: ../vistas/adminproducto.php");
  
}
?>
<!-- BOOTSTRAP 4 -->
<link rel="stylesheet" 
href="https://bootswatch.com/4/yeti/bootstrap.min.css">
<!--FORMULARIO-->
<div class="container h-50">
  <!-- ADD TASK FORM -->
  <div class="row h-50 justify-content-center align-items-center">
    <!--GUARDAR-->
    <form action="../modelo/prod_agregar.php" method="POST" 
    enctype="multipart/form-data">
    <br>
    <br>
    <h1>Agrege producto</h1>
    <br>
        <div class="form-group">
          <input type="number" name="id_producto" class="form-control" 
          placeholder="Id Producto" autofocus required>
         </div>
         <div class="form-group">
          <input type="text" name="nombre" class="form-control" 
          placeholder="Nombre" autofocus required>
        </div>
        <div class="form-group">
          <input type="number" name="precio" class="form-control" 
          placeholder="Precio" autofocus required>
        </div>
        <div class="form-group">
          <input type="number" name="stock" class="form-control" 
          placeholder="Stock" autofocus required>
        </div>
        <div class="form-group">
          <input type="file" name="image" id="profile-img" class="form-control" 
          placeholder="Imagen" autofocus required>
        </div>
        <img src="" id="profile-img-tag" width="100px" />

        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#profile-img-tag').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#profile-img").change(function(){
                readURL(this);
            });
        </script><br>
        
      <input type="submit" name="prod_agregar" 
      class="btn btn-success btn-block" value="Guardar">
    </form>
  </div>
</div>
<?php require_once("../include/footer.php"); ?>