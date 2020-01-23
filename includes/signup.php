<?php

$email = $_POST['txtEmail'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$tlf = $_POST['txtTelefono'];
$passwd = $_POST['txtContrasena'];

//Creacion de conexion

$con =mysqli_connect('localhost','root','','hoteldb');
$consulta = "select * from usuarios";
$resultado = mysqli_query($con,$consulta);
$id = mysqli_num_rows($resultado)+1;

$consulta2="INSERT INTO usuarios VALUES ($id,'$nombre','$apellido',$tlf,'$email',2,$passwd)";
$resultado2 = mysqli_query($con,$consulta2);

if($resultado2==1){
    echo "<a href='../index.html'>Usuario creado</a>";
}else{
    echo "no ingresado menor";
}

?>