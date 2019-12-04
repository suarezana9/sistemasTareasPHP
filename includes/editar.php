<?php
include ("conexion.php");

if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tarea WHERE id=$id";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $titulo = $row['titulo'];
      $descripcion = $row['descripcion'];
      
    }
  }

if (isset($_POST['Update'])){
  $id=$_GET['id'];
  $titulo= $_POST['titulo'];
  $descripcion= $_POST['descripcion'];

  $query ="UPDATE tarea set titulo ='$titulo', descripcion= '$descripcion'  WHERE id=$id";
  mysqli_query($con, $query);
  
  header('Location: ../index.php');
}


?>
<?php include ("header.php") ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
            <input name="titulo" type="text" class="form-control" value="<?php echo $titulo; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control"  rows="2" placeholder="Update"><?php echo $descripcion;?></textarea>
        </div>
        <button class="btn btn-success" name="Update">
          Update
        </button>
            </div>
        </form>
        </div>
  
       </div>
    </div>
</div>

<?php include ("footer.php");?>
