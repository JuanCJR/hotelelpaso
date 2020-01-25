<!DOCTYPE html>
<html lang="en">
<?php
        session_start();

?>
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
        <li class="nav-item ">
          <a class="nav-link" href="home.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <?php

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

  <!-- Carrusel -->
  <h1>Bienvenido

    <?php
    echo   $_SESSION['nombre'];
    ?>

  </h1>
  <div class=" mt-4 w-50  mx-auto">
    <div class="">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/h1.jpg" class="d-block w-100" alt="img" />
          </div>
          <div class="carousel-item">
            <img src="img/h2.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="img/h3.jpg" class="d-block w-100" alt="..." />
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>

  <?php
  //  session_start();
  // print $_SESSION['id'];
  ?>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>