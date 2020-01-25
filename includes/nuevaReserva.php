<?php
session_start();
$idUsuario=$_SESSION['id']; 
$noches = $_POST['txtNoches'];
$tipoHabitacion = $_POST['txtTipo'];

//Creacion de conexion
$con =mysqli_connect('localhost','root','','hoteldb');

$hoy = getdate();
$id= $hoy['0'];

$queryTipoHabitacion = "select * from tipohabitacion where idTipoHabitacion=$tipoHabitacion";
$rs2 = mysqli_query($con,$queryTipoHabitacion);

while($row=mysqli_fetch_array($rs2)){{
    $precio = $row['precio'];
}}

$precioFinal = $precio*$noches;


$queryDisponibilidad = "Select * from disponibilidad where idTipoHabitacion=$tipoHabitacion" ;
$rs3 = mysqli_query($con,$queryDisponibilidad);

while($row2 =mysqli_fetch_array($rs3)){
    $disponibles=$row2['disponibles'];
   
}
if($disponibles<$noches){
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
        echo "<h1 class='m-4'>No se encuentra disponibilidad para el tipo de habitacion que selecciono.. </h1>";
        echo "<a class='btn btn-success m-4' href='../nuevaReservacion.php'>Volver..</a>";
      
      
        echo '
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      </body>
      
      </html>';
}else{
    $queryNuevaReserva = "insert into reservaciones values($id,$tipoHabitacion,$idUsuario,$precioFinal,$noches)";
   
    $queryActualizaDisp = "UPDATE disponibilidad set disponibles=$disponibles-1 where idTipoHabitacion=$tipoHabitacion";
    $rs4 = mysqli_query($con,$queryNuevaReserva);
    $rs5 = mysqli_query($con,$queryActualizaDisp);
    if($rs4==1){
        echo '
        
        <!DOCTYPE html>
        <html lang="en">
        <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous"/>
        <link rel="stylesheet" href="main.css" />
        <body>

        <div class="mx-auto">

        <h1>Ha realizado la reserva con exito</h1>


        <table class=" mt-3 w-50 table table-hover table-bordered table-sm">
        <thead>
        <tr>
        <th scope="col">Valor por habitacion        
        </th>
        <td>
        ';
        echo $precio;

        echo '$
        </td>
        </tr
        <tr>
        <th scope="col">Valor final</th>     
        <td>';
        echo $precioFinal;
        echo'$
        </tr>
        <tr>
        <th scope="col">Numero de noches</th>
        <td>';
        echo $noches;
        echo'
        </td>
        </tr>
        </table>
        <a href="../home.php" class="btn btn-primary">Volver</a>
        <div>
        </body>
        </html>
        
        ';
        
    }else{
       
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
        echo "<h1 class='m-4'>Error!! No se pudo realizar la reserva </h1>";
        echo "<a class='btn btn-success m-4' href='../home.php'>Volver..</a>";
      
      
        echo '
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      </body>
      
      </html>';
        
    }
}








?>