<?php include ("./conexion.php") ?>
<?php include ("includes/header.php") ?>
<link rel="stylesheet" href="assets/css/style.css">

<?php 

$email= $_SESSION['email'];
echo "<h1> Bienvenido $email </h1>";
echo '<a href="logout.php">logout</a>';
?> 
<div class="container p-4">
<div class="row">
    <div class="col-md-4">

    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

        <div class=" card card-body">
        <form action="includes/save_task.php" method="POST">
            <div class="form-group">
                <input type="text" name="titulo" class="form-control" placeholder="task title" autofocus>
            </div>
            <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="task-description"></textarea>
            </div>
            <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task"  onclick="alert('guardado');"/>
        </form>
        
        </div>

    </div>
    <div class="col-md-8">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>   
    </thead>
        <tbody>
            <?php 
                $query="SELECT * FROM tarea";
                $result_tasks= mysqli_query($con, $query);
                while($row= mysqli_fetch_assoc($result_tasks)){ ?>
                    <tr>
                        <td><?php echo $row['titulo'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td>
                            <a href="includes/editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                        </td>

                        <td>
                            <a href="includes/eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>


                <?php } ?>
        
        </tbody>
    </table>
    </div>
</div>
</div>

<?php include("includes/footer.php")?>
