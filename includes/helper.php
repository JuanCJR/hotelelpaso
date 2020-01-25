<?php


//Funcion para obtener lista de usuarios
function getUsuarios(){
    //Creacion de conexion
    $con =mysqli_connect('localhost','root','','hoteldb');
   
    //query de query para conseguir lista de usuarios
    $query = "select idUsuario, Nombre, Apellido, ci, correo, tipoUsuario, telefono from usuarios
    join tipousuario
    on tipousuario.idTipoUsuario = usuarios.idTipoUsuario";

    //ejecucion de query
    $resultado = mysqli_query($con,$query);
    //while que devuelve el listado de todos los usuarios conseguidos
    while($row = mysqli_fetch_array($resultado)){
        echo '<form method="POST" action="includes/eliminaUsuario.php">';
        echo "<tr>";
        echo "<td>";
        echo '<input style="border:0px"; type="text" readonly name="txtID" value=';
        echo $row['idUsuario'];
        echo ' "/>';
        echo "</input>";
        echo "</td>";
        echo "<td>";
        echo '<input style="border:0px"; type="text" readonly name="txtNombre" value=';
        echo $row['Nombre'];
        echo ' "/>';
        echo "</td>";
        echo "<td>";
        echo $row['Apellido'];
        echo "</td>";
        echo "<td>";
        echo $row['ci'];
        echo "</td>";
        echo "<td>";
        echo $row['correo'];
        echo "</td>";
        echo "<td>";
        echo $row['telefono'];
        echo "</td>";
        echo "<td>";
        echo $row['tipoUsuario'];
        echo "</td>";
        echo "<td>";
        echo "<button class='btn btn-danger type='submit'>";
        echo 'Eliminar Usuario</button>';
        echo "</td>";
        echo "</tr>";
        echo "</form>";
    }


}



//funcion que obtiene habitaciones disponibles
function getHabDisponible($idtipoHabitacion){
    //Creacion de conexion
    $con =mysqli_connect('localhost','root','','hoteldb');
    //query para obtener habitaciones disponibles
    $query = "select * from disponibilidad where idTipoHabitacion=$idtipoHabitacion";
    //ejecucion de query
    $resultado = mysqli_query($con,$query);

    while($row=mysqli_fetch_array($resultado)){
        $disponibles = $row['disponibles'];//Rescatamos las habitaciones dispobibles del tipo de habitacion buscada
    }

    return $disponibles; // retornamos las habitaciones disponibles

} 

//funcion que obtiene reservas por id de usuario
function getReservas($id){
    //creacion de conexion
    $con =mysqli_connect('localhost','root','','hoteldb');
    //si el usuario es administrador puede ver todas las reservas de todos los usuarios
    if($_SESSION['tipoUsuario'] == 1){
        $query= "select idReservaciones, tipoHabitacion, noches, costo from reservaciones
        join tipohabitacion
        on tipohabitacion.idTipoHabitacion = reservaciones.idTipoHabitacion";
    }else{
        //si el usuario es cliente solo puede ver sus propias reservaciones
        $query= "select idReservaciones, tipoHabitacion, noches, costo from reservaciones
    join tipohabitacion
    on tipohabitacion.idTipoHabitacion = reservaciones.idTipoHabitacion
    where idUsuario = $id"; 
    }
    //ejecucion de query
    $resultado = mysqli_query($con,$query);

    //while que devuelve el listado de reservas
    while($row = mysqli_fetch_array($resultado)){
        echo '<form method="POST" action="includes/deleteReserva.php">';
        echo "<tr>";
        echo "<td>";
        echo '<input style="border:0px"; type="text" readonly name="txtID" value=';
        echo $row['idReservaciones'];
        echo ' "/>';
        echo "</input>";
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
        echo "<button class='btn btn-danger type='submit'>";
        echo 'Cancelar reserva</button>';
        echo "<a class='btn btn-success' href='./modificaReserva.php'>";
        echo 'Modificar Reserva</a>';
        echo "</td>";
        echo "</tr>";
        echo "</form>";

    }
}

// funcion para Modificar reserva
function modifica($id){
    //Creacion de conexion
    $con =mysqli_connect('localhost','root','','hoteldb');
    
    //si el usuario es administrador puede modificar todas las reservas
    if($_SESSION['tipoUsuario'] == 1){
        $query= "select idReservaciones, tipoHabitacion, noches, costo from reservaciones
        join tipohabitacion
        on tipohabitacion.idTipoHabitacion = reservaciones.idTipoHabitacion
        order by idReservaciones"; 
    }else{
        //si el usuario es cliente solo puede modificar sus reservas
        $query= "select idReservaciones, tipoHabitacion, noches, costo from reservaciones
        join tipohabitacion
        on tipohabitacion.idTipoHabitacion = reservaciones.idTipoHabitacion
        where idUsuario = $id
        order by idReservaciones"; 
    }
 
    //ejecucion de query
    $resultado = mysqli_query($con,$query);
   //while que devuelve lista de todas las reservaciones a modificar
    while($row = mysqli_fetch_array($resultado)){
        $tipohab=$row['tipoHabitacion'];
        echo '<form method="POST" action="includes/modificaReserva.php">';
        echo "<tr>";
        echo "<td>";
        echo '<input style="border:0px"; type="text"  name="txtID" readonly  value=';
        echo $row['idReservaciones'];
        echo ' "/>';
        echo "</input>";
        echo "</td>";
        echo "<td>";
        echo "<select name='txtTipoHabitacion'>";
        echo "<option>";
        echo $row['tipoHabitacion'];
        echo "</option>";
        echo "<option>";

        if($tipohab == "Simple"){
            $tipohab = "Suite";
            echo $tipohab;
        }else if ($tipohab=="Suite"){
            $tipohab="Simple";
            echo $tipohab;
        }

        echo "</option>";
        echo "</td>";
        echo "<td>";
        echo '<input type="number" name="txtNoches" value="';
        echo $row['noches'];
        echo '"/>';
        echo "</td>";
        echo "<td>";
        echo $row['costo'];
        echo "</td>";
        echo "<td>";
        echo "<button class='btn btn-danger type='submit'>";
        echo 'Modificar</button>';
      
        echo "</td>";
        echo "</tr>";
        echo "</form>";

    }
}
//funcion que Obtiene precio de habitacion
function getPrecio($idtipoHabitacion){
    //Creacion de conexion
    $con =mysqli_connect('localhost','root','','hoteldb');
    //query para obtener informacion de la tabla de tipohabitacion por id de tipo de habitacion
    $query = "select * from tipohabitacion where idTipoHabitacion=$idtipoHabitacion";
    //ejecucion de consulta
    $resultado = mysqli_query($con,$query);
    while($row=mysqli_fetch_array($resultado)){
        $precio = $row['precio']; //rescatamos precio de la habitacion buscada
    }
    return $precio; //Retornamos el precio de la habitacion buscada
}


?>