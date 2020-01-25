<?php
include('includes/helper.php');
session_start();
?>


<!DOCTYPE html>
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
  <!-- Barra de navegacion -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="img/logo.png" width="120" height="40" class="d-inline-block align-top" alt="" />
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <?php
                //Si el usuario es de tipo cliente podra tener la opcion de nueva reserva

if ($_SESSION['tipoUsuario'] == 2) {
  echo '
<li class="nav-item active">
<a class="nav-link" href="nuevaReservacion.php">Nueva reserva <span class="sr-only">(current)</span></a>
</li>';
}
?>
        <li class="nav-item">
          <a class="nav-link" href="reservas.php">Lista de Reservas</a>
        </li>
        <?php
                //Si el usuario es de tipo administrador podra tener la opcion de usuarios
      
        if ($_SESSION['tipoUsuario'] == 1) {

          echo '
          <li class="nav-item">
          <a class="nav-link" href="usuarios.php">Usuarios</a>
          </li>';
        }
        ?>
      </ul>
      <div class="my-2 my-lg-0">
        <form action="includes/cerrarSesion.php">

          <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Salir</button>
        </form>

      </div>
    </div>
  </nav>






  <!-- Nueva reservacion -->
  <div class="container  ">
    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-header text-center">Lista de reservaciones</div>
          <div class="card-body">
            <table class="table table-hover table-bordered">
              <thead>
                <th>N° de reserva</th>
                <th>Tipo de habitacion</th>
                <th>Noches</th>
                <th>Costo</th>
                <th></th>

              </thead>
              <tbody>
                <?php
                $id = $_SESSION['id'];
                //Retorna lista de reservas por id de usuario
                getReservas($id);

                ?>
              </tbody>
            </table>


          </div>
        </div>



      </div>
    </div>
  </div>





  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>