<?php
  require('functions/connection.php');
      $errors = array();

      if(isset($_POST['enviar'])){
          //Si existe enviar en POST
          $mi_numeroControl = $_POST['numeroControl'];
          $mi_nombre = $_POST['nombreAlumno'];
          $mi_apellidoPaterno = $_POST['apellidoPaterno'];
          $mi_apellidoMaterno = $_POST['apellidoMaterno'];
          $mi_correoElectronico = $_POST['correoElectronico'];

          if(!empty($mi_numeroControl) && !empty($mi_nombre) && !empty($mi_apellidoPaterno) && !empty($mi_apellidoMaterno) && !empty($mi_correoElectronico)){
              $sql = "INSERT INTO alumno(numControl, nombreAlumno, apellidoPaterno, apellidoMaterno, correoElectronico) VALUES('$mi_numeroControl', '$mi_nombre', '$mi_apellidoPaterno', '$mi_apellidoMaterno', '$mi_correoElectronico')";
              $result = $mysqli -> query($sql);
          }else{
              $errors[] = "Rellena todos los campos";
          }

      }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <header>
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Menu</a>
      <button class="navbar-toggler botonRegistro" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <li class="nav-item">
            <a class="nav-link" href="semestres.php">Gestion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="alistarAlumnos.php">Alumnos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </header>
  <body>
    <div class="container" style="margin-top: 20rem">
        <div class="registro col-4 position-relative top-50 start-50 translate-middle">
            <div class="tittle text-center">
                <h1 class="text-primary">Alumno</h1>
            </div>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h3 class="fs-4">Alumno nuevo</h3>
                    <span class="">Numero de control</span>
                    <input type="text" name="numeroControl" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"><br>
                    <span class="">Nombre del alumno</span>
                    <input type="text" name="nombreAlumno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"><br>
                    <span class="">Apellido paterno</span>
                    <input type="text" name="apellidoPaterno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"><br>
                    <span class="">Apellido materno</span>
                    <input type="text" name="apellidoMaterno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"><br>
                    <span class="">Correo electronico</span>
                    <input type="text" name="correoElectronico" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"><br>
                    <button type="submit" name="enviar" class="btn btn-primary btn-lg">Guardar</button>
                </form>
            </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>