<?php

    require('functions/connection.php');
      $errors = array();

  if(isset($_POST['enviar'])){
    //Si existe enviar en POST
    $mi_nombreSemestre = $_POST['nombreSemestre'];

    if(!empty($mi_nombreSemestre)){
        $sql = "INSERT INTO semestre(nombre) VALUES('$mi_nombreSemestre')";
        $result = $mysqli -> query($sql);
    }else{
        $errors[] = "Rellena todos los campos";
    }
  }

  $sql_semestre = "SELECT * FROM semestre";
  $result_semestre = $mysqli -> query($sql_semestre);

  $sql_parcial = "SELECT * FROM parcial";
    $result_parcial = $mysqli -> query($sql_parcial);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semestres</title>
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
            <a class="nav-link active" href="semestres.php">Gestion</a>
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
    <div class="container">
        <div class="registro col-10 position-absolute top-50 start-50 translate-middle">
            <div class="tittle">
            <button class="btn btn-success position-absolute top-0 end-0 translate-middle-x" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Registrar semestre</button>
              <h1 class="text-primary">Semestres y parciales</h1>
            </div>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">Semestres</th>
                          <th scope="col">Parciales</th>
                          <th scope="col">Editar || Ver Calificaciones || Borrar</a></th>
                        </tr>
                      </thead>
                      <?php
                        if($result_semestre){
                          if($result_semestre -> num_rows > 0){
                            while($parcial = $result_parcial -> fetch_assoc()){
                                while($semestre = $result_semestre -> fetch_assoc()){
                      ?>
                      <tbody>
                        <tr>
                          <th><?php echo $semestre['nombre']; ?></th>
                          <th><?php echo $parcial['nombre']; ?></th>
                          <td>
                            <!-- <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="editar.php?id=<?php echo $alumno['numControl'];?>">Editar</a> -->
                            <a name="enviar" href="editar.php?id=<?php echo $alumno['numControl'];?>">Editar</a>
                            ||
                            <a name="enviar" href="borrar.php?id=<?php echo $alumno['numControl'];?>">Borar</a>
                             || 
                            <a href="verCalificacionesAlumno.php?id=<?php echo $alumno['numControl'];?>">Ver calificaciones</a>
                          </td>
                        </tr>
                      </tbody>
                      <?php
                            }
                          }
                          }else{
                            $errors[] = "No hay ningun alumno";
                          }
                        }else{
                          $errors[] = "Hubo un error";
                        }
                        if(count($errors) > 0){
                          echo "<div class='error'>";
                          foreach($errors as  $error){
                            echo $error."<br>";
                          }
                          echo "</div>";
                        }
                      ?>
                    </table>
                </form>
            </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Registrar</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <div class="container" style="margin-top: 20rem">
        <div class="registro position-relative top-50 start-50 translate-middle">
            <div class="tittle text-center">
                <h1 class="text-primary">Alumno</h1>
            </div>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h3 class="fs-4">Alumno nuevo</h3>
                    <span class="">Semestre</span>
                    <input type="text" name="semestre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"><br>
                    <span class="">Nombre del alumno</span>
                    <input type="text" name="nombreAlumno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"><br>
                    <span class="">Apellido paterno</span>
                    <input type="text" name="apellidoPaterno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"><br>
                    <span class="">Apellido materno</span>
                    <input type="text" name="apellidoMaterno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"><br>
                    <span class="">Correo electronico</span>
                    <input type="text" name="correoElectronico" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"><br>
                    <button type="submit" name="enviar" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
      </div>
  </div>
</div>
</html>