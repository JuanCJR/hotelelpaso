<?php


function getHabDisponible($idtipoHabitacion){
    $con =mysqli_connect('localhost','root','','hoteldb');
    $query = "select * from disponibilidad where idTipoHabitacion=$idtipoHabitacion";
    $resultado = mysqli_query($con,$query);

    while($row=mysqli_fetch_array($resultado)){
        $disponibles = $row['disponibles'];
    }

    return $disponibles;

}
function deleteReserva($id){
    echo "ok";
}

function getReservas($id){
    $con =mysqli_connect('localhost','root','','hoteldb');
    $query= "select idReservaciones, tipoHabitacion, noches, costo from reservaciones
    join tipohabitacion
    on tipohabitacion.idTipoHabitacion = reservaciones.idTipoHabitacion
    where idUsuario = $id"; 
    $resultado = mysqli_query($con,$query);
    $arreglo = array();
    $i = 1;
    while($row = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>";
        echo $row['idReservaciones'];
        $arreglo[$i] = $row['idReservaciones'];
        echo "</td>";
        echo "<td>";
        echo $row['tipoHabitacion'];
        echo "</td>";
        echo "<td>";
        echo $row['noches'];
        echo "</td>";
        echo "<td>";
        echo $row['costo'];
        echo "</td>";
        echo "<td>";
        echo "<button class='btn btn-danger' onclick='delete($arreglo[$i]);'>";
        echo 'Cancelar reserva</button>';
        echo "</td>";
        echo "</tr>";
        $i++;
    }
}

function getPrecio($idtipoHabitacion){
    $con =mysqli_connect('localhost','root','','hoteldb');
    $query = "select * from tipohabitacion where idTipoHabitacion=$idtipoHabitacion";
    $resultado = mysqli_query($con,$query);
    while($row=mysqli_fetch_array($resultado)){
        $precio = $row['precio'];
    }
    return $precio;
}


?>