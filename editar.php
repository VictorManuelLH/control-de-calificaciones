<?php
    require('functions/connection.php');
    $errors = array();

    $flag = 0;

    if(isset($_GET['id'])){
        $mi_id = $mysqli -> real_escape_string($_GET['id']);
        if(!empty($mi_id)){
            $sql = "SELECT * FROM alumno WHERE numControl = '$mi_id'";
            $result = $mysqli -> query($sql);
            if($result -> num_rows > 0){
                $flag = 1;
                $datos = $result -> fetch_assoc();
            }else{
                $errors[] = "No hay usuarios";
            }
        }else{
            $errors[] = "ID vacio";
        }
    }else{
        $errors[] = "No envias ningun ID";
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
            <?php
                if(count($errors) > 0){
                    echo "<div>";
                    foreach($errors as $error){
                        echo $error."<br>";
                    }
                    echo "</div>";
                }
                
                if($flag = 1){

            ?>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <form action="modifica.php" method="POST">
                    <h3 class="fs-4">Alumno nuevo</h3>
                    <span class="">Numero de control</span>
                    <input type="text" name="numeroControl" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="<?php echo $datos['numControl']; ?>"><br>
                    <span class="">Nombre del alumno</span>
                    <input type="text" name="nombreAlumno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="<?php echo $datos['nombreAlumno']; ?>"><br>
                    <span class="">Apellido paterno</span>
                    <input type="text" name="apellidoPaterno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="<?php echo $datos['apellidoPaterno']; ?>"><br>
                    <span class="">Apellido materno</span>
                    <input type="text" name="apellidoMaterno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="<?php echo $datos['apellidoMaterno']; ?>"><br>
                    <span class="">Correo electronico</span>
                    <input type="text" name="correoElectronico" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="<?php echo $datos['correoElectronico']; ?>"><br>
                    <input type="hidden" name="miId" value="<?php echo $datos['numControl']; ?>">
                    <button type="submit" name="enviar" class="btn btn-primary btn-lg">Guardar</button>
                </form>
            </div>
            <?php
                    }
            if(count($errors) > 0){
                echo "<div class='error'>";
                foreach($errors as  $error){
                echo $error."<br>";
                }
                echo "</div>";
            }
            ?>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>