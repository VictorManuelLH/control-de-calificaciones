<?php
    require('functions/connection.php');
    $errors = array();

    if(isset($_GET['id'])){
        $numControl_alumno = $_GET['id'];
        if(empty($numControl_alumno)){
            $errors[] = "Vacio";
        }else{
            $sql = "DELETE FROM  alumno WHERE numControl = $numControl_alumno";
            $result = $mysqli -> query($sql);
        }
    }else{
        $errors[] = "NO";
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de alumnos</title>
    <link rel="stylesheet" href="style.css">
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
    <div class="container">
        <div class="registro col-10 position-absolute top-50 start-50 translate-middle">
            <div class="tittle">
            <button class="btn btn-success position-absolute top-0 end-0 translate-middle-x" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Registrar alumno</button>
              <h1 class="text-primary">Lista de alumnos</h1>
            </div>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="usuario">
                    <?php
                        if(isset($result)){
                            if($result){
                                if($mysqli -> affected_rows > 0){
                                    echo "<div class='success'>Se borro el usuario</div>";
                                }else{
                                    $errors[] = "Este usuario no existe";
                                }
                            }else{
                                $errors[] = "Error en la consulta";
                            }
                        }
                    ?>
                      <?php
                        if(count($errors) > 0){
                          echo "<div class='error'>";
                          foreach($errors as  $error){
                            echo $error."<br>";
                          }
                          echo "</div>";
                        }
                        $mysqli -> close();
                      ?>
                </div>
                </form>
            </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>

  <!-- <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Registrar alumno</h5>
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
                    <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Registrar alumno</h5>
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
                    <button type="submit" name="enviar" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
      </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</html>