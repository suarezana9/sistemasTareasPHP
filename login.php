<?php require ("conexion.php");


    $email = $_POST['email'];
    $password= $_POST['password'];
    
        $sql="SELECT COUNT(*) as contar FROM  users WHERE email='$email' AND password='$password'";
            $consulta=mysqli_query($con,$sql);
            $array=mysqli_fetch_array($consulta);
         

            if($array['contar']>0){

                $_SESSION['email']=$email;

                header("location: index.php");
            }
            
                if( $_POST['email']=='' or $_POST['password']==''){
                    echo '<script language="javascript">alert("Existen campos vacios, llene todos los campos");</script>'; 
                }
    
            
            else{
                echo '<script language="javascript">alert("Usuario no registrado");</script>'; 

            }
        
 ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
 
<h1>login</h1>
<form action="login.php" method="post">
    <input type="text" name="email" value="introduzca su email" autofocus>
    <input type="password" name="password" placeholder="Enter your password" >
    <input type="submit" name="entrar "value="entrar">
</form>

<a href="#signup.php">Registrarse</a>

</body>
<?php include("includes/footer.php")?>

</html>