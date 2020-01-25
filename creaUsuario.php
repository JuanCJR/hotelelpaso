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






  <!-- -->
  <div class="container-fluid  ">
    <div class="row w-100">
      <div class="col w-100">

        <div class="card w-100">
          <div class="card-header text-center">Creacion de usuario</div>
          <div class="card-body">
            <!-- formulario -->
            <form class="text-left" method="POST" action="includes/creaUsuario.php">
              <div class="form-group">
                <label for="txtNombre">Nombres</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre" required />
              </div>
              <div class="form-group">
                <label for="txtApellido">Apellidos</label>
                <input type="text" class="form-control" name="txtApellido" id="txtApellido" required />
              </div>
              <div class="form-group">
                <label for="txtCI">C.I</label>
                <input type="number" class="form-control" name="txtCI" id="txtCI" required />
              </div>
              <div class="form-group">
                <label for="txtTelefono">Telefono</label>
                <input type="number" class="form-control" name="txtTelefono" id="txtTelefono" required />
              </div>

              <div class="form-group">
                <label for="txtEmail">Email</label>
                <input type="email" class="form-control" name="txtEmail" id="txtEmail" required />
              </div>
              <div class="form-group">
                <label for="txtTipoUsuario">Tipo de Usuario</label>
                <select name="txtTipoUsuario">
                  <option value="1">administrador</option>
                  <option value="2">cliente</option>

                </select>
              </div>
              <div class="
                <div class=" form-group">
                <label for="txtContrasena">Contraseña</label>
                <input type="password" name="txtContrasena" class="form-control" id="txtContrasena" required />
              </div>

              <button type="submit" class="btn btn-primary mt-3" style="margin-left: 45%;">
                Crear
              </button>
            </form>
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