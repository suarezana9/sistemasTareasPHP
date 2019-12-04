<?php 
include ("conexion.php");

  if (isset($_POST['save_task'])){
     $titulo = $_POST['titulo'];
     $descripcion=$_POST['descripcion'];
     
     $query="INSERT INTO tarea(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
     $result = mysqli_query($con, $query);
    

     if(!$result){
       die("query failed");
       
     
     }
     
      $_SESSION['message'] = 'Task Saved Successfully';
      $_SESSION['message_type'] = 'success';
    
      header('Location: ../index.php'); 
  
    }  
?>