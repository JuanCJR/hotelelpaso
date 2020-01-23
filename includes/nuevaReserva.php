<?php
session_start();
$idUsuario=$_SESSION['id']; 
$noches = $_POST['txtNoches'];
$tipoHabitacion = $_POST['txtTipo'];

//Creacion de conexion
$con =mysqli_connect('localhost','root','','hoteldb');
$queryReservaciones = "select * from reservaciones";
$rs1 = mysqli_query($con,$queryReservaciones);
$id = mysqli_num_rows($rs1)+1;

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
    echo "Chupalo no hay habitaciones";
}else{
    $queryNuevaReserva = "insert into reservaciones values($id,$tipoHabitacion,$idUsuario,$precioFinal,$noches)";
    $queryActualizaDisp = "UPDATE disponibilidad set disponibles=$disponibles-$noches where idTipoHabitacion=$tipoHabitacion";
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
        echo'$
        </td>
        </tr>
        </table>
        <a href="../home.php" class="btn btn-primary">Volver</a>
        <div>
        </body>
        </html>
        
        ';
        
    }else{
        echo "no se creo un coño";
    }
}








?>