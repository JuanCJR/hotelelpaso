<?php
//recepcion de valor del formulario
$id = $_POST['txtID'];

//Creacion de conexion a bd
$con =mysqli_connect('localhost','root','','hoteldb');

//query para obtener informacion de reservaciones por el id de reservacion
$query = "Select * from reservaciones where idReservaciones=$id";
//ejecucion de consulta
$resultado1 = mysqli_query($con,$query);
//recorrido del resultado de la query
while($row = mysqli_fetch_array($resultado1)){

  $idTipoHab = $row['idTipoHabitacion']; //rescatamos id del tipo de habitacion de la reservacion buscada
  $noches = $row['noches']; // rescatamos las noches de la reservacion buscada

}
//query para obtener datos de la disponibilidad por el id del tipo de habitacion
$query2 = "Select * from disponibilidad where idTipoHabitacion=$idTipoHab";
//ejecucion de query
$resultado2 = mysqli_query($con,$query2);
//recorrido de resultado
while($row = mysqli_fetch_array($resultado2)){

  $disponibles  = $row['disponibles'];//Rescatamos las habitaciones disponibles del tipo de habitacion buscada

}
//query para actualizar la disponibilidad del tipo de habitacion buscada
$queryActualizaDisp = "update disponibilidad set disponibles = $disponibles+$noches where idTipoHabitacion=$idTipoHab";
//Ejecucion de query
$resultado3 = mysqli_query($con,$queryActualizaDisp);
//query para eliminacion de reserva por id de reservacion
$deleteQuery = "delete from reservaciones where idReservaciones=$id";
//ejecucion de query
$resultado4 = mysqli_query($con,$deleteQuery);



echo '
<html lang="en">

<head>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
<link rel="stylesheet" href="main.css" />

<title>Hotel el Paso</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">
  <img src="../img/logo.png" width="120" height="40" class="d-inline-block align-top" alt="" />
</a>
</nav>

';
echo "<h1 class='m-4'>Reserva Eliminada!!</h1>";
echo "<a class='btn btn-success m-4' href='../reservas.php'>Volver..</a>";


echo '
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>';


?>