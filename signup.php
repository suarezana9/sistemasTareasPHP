<?php include ("includes/header.php") ?>
<?php  include ("conexion.php");
if(isset($_POST['enviar'])){
if($_POST['email']=='' or $_POST['password']=='' or $_POST['confirm_password']==''){
    echo 'Por favor llene todos los campos';
}
else{
    $sql='SELECT*FROM users';
    $rec=mysqli_query($con, $sql);
    $verificar_usuario=0;
    while($result=mysqli_fetch_object($rec)){
        if($result->email==$_POST['email']){
            $verificar_usuario=1;
        }
    }
    if($verificar_usuario==0){
        if($_POST['password']==$_POST['confirm_password']){
            $email=$_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $sql= "INSERT INTO users (email, password) VALUES ('$email','$password')";
            mysqli_query($con, $sql);
            echo 'usted se ha registrado correctamente';
        }
        else{
            echo 'las claves no son iguales, intente de nuevo';
        }
    }
    else{
        echo'este usuario ya ha sido registrado anteriormente';
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
 


<h1>SignUp</h1>
<span>or <a href="login.php">login</a></span>

<form action="signup.php" method="post">
    <input type="text" name="email" placeholder="Enter your email">
    <input type="password" name="password" placeholder="Enter your password" >
    <input type="password" name="confirm_password" placeholder="confirm your password" >

    <input type="submit"name="enviar" value="Send">
</form>
    
</body>
<?php include("includes/footer.php")?>

</html>