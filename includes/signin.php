<?php

$email = $_POST['txtEmail'];
$passwd = $_POST['txtContrasena'];

//Creacion de conexion
$con =mysqli_connect('localhost','root','','hoteldb');
$consulta = "SELECT * FROM usuarios where correo='$email' and contrasena='$passwd' ";
$resultado = mysqli_query($con,$consulta);
$counter=mysqli_num_rows($resultado);

if($counter==1){
    session_start();

    while($cliente=$resultado->fetch_assoc()){
        $_SESSION['id'] =$cliente["idUsuario"];
    }
   $_SESSION['user'] = $email;
    header('Location: ../home.php');
   //include("../home.html");
}else{
echo "chao";    
}
