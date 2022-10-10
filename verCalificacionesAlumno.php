<?php
    require('functions/connection.php');
    $errors = array();

    if(isset($_POST['enviar'])){
      //Si existe enviar en POST
      $mi_nombreMateria = $_POST['nombreMateria'];

      if(!empty($mi_nombreMateria)){
          $sql = "INSERT INTO materia(nombreMateria) VALUES('$mi_nombreMateria')";
          $result = $mysqli -> query($sql);
      }else{
          $errors[] = "Rellena todos los campos de la materia linea 13";
      }
    }

    $sql = "SELECT * FROM materia";
    $result_materias = $mysqli -> query($sql);

    // Inserta parcial

    if(isset($_POST['enviar'])){
      //Si existe enviar en POST
      $mi_nombreParcial = $_POST['parcial'];

      if(!empty($mi_nombreParcial)){
          $sql = "INSERT INTO parcial(nombre) VALUES('$mi_nombreParcial')";
          $result_parcialNombre = $mysqli -> query($sql);
      }else{
          $errors[] = "Rellena todos los campos del parcial linea 30";
      }
    }

    $sql = "SELECT * FROM parcial";
    $result_parcial = $mysqli -> query($sql);

    $sql_semestre = "SELECT * FROM semestre";
    $result_semestre = $mysqli -> query($sql_semestre);

    

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

    $sql = "SELECT * FROM alumno WHERE numControl = '$mi_id'";
      $result = $mysqli -> query($sql);

          // Inserta calificacion

    if(isset($_POST['enviar'])){
      //Si existe enviar en POST
      $mi_semestreid = $semestre['id'];
      $mi_materiaid = $materia['id'];
      $mi_alumnoid = $result;
      $mi_calificacion = $_POST['calificacion'];
      $mi_parcialid = $parcial['id'];

      if(!empty($mi_calificacion)){
          $sql = "INSERT INTO calificacion(semestre_id, materia_id, alumno_id, calificaciones, parcial_id) VALUES('$mi_semestreid', '$mi_materiaid', '$mi_alumnoid', '$mi_calificacion', '$mi_parcialid')";
          $result_calificacion = $mysqli -> query($sql);
      }else{
          $errors[] = "Rellena todos los campos de la calificacion linea 67";
      }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calificaciones alumnos</title>
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
            <button class="btn btn-success position-absolute top-0 end-0 translate-middle-x" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Registrar calificacion</button>
            <h1 class="text-primary">
              <?php
                if($result){
                  if($result -> num_rows > 0){
                    while($alumno = $result -> fetch_assoc()){
              ?>
              <tbody>
                <tr>
                  <td><?php echo $alumno['nombreAlumno']; ?></td>
                  <td><?php echo $alumno['apellidoPaterno']; ?></td>
                  <td><?php echo $alumno['apellidoMaterno']; ?></td>
                </tr>
              </tbody>
              <?php
                    }
                  }else{
                    $errors[] = "No hay ningun alumno aqui linea 123";
                  }
                }else{
                  $errors[] = "Hubo un error";
                }
              ?>
            </h1>
          </div>
          <div class="shadow-lg p-3 mb-5 bg-body rounded">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <table class="table">
                <thead>
                  <tr>
                    <h4>Semestre 1</h4>
                  </tr>
                  <tr>
                    <th>Materias</th>
                    <?php
                    if($result_parcial){
                      if($result_parcial -> num_rows > 0){
                        while($parcial = $result_parcial -> fetch_assoc()){
                    ?>
                    <th><?php echo $parcial['nombre']; ?></th>
                  <?php
                    }
                    }else{
                      $errors[] = "No hay ninguna parcial";
                    }
                    }else{
                      $errors[] = "Hubo un error";
                    }
                  ?>
                  <th>Promedio</th>
                  </tr>
                </thead>
                <?php
                if($result_materias){
                  if($result_materias -> num_rows > 0){
                    while($materia = $result_materias -> fetch_assoc()){
                ?>
                 <tbody>
                  <tr>
                    <td><?php echo $materia['nombreMateria']; ?></td>
                  </tr>
                </tbody>
                <?php
                    }
                  }else{
                    $errors[] = "No hay ninguna materia";
                  }
                }else{
                  $errors[] = "Hubo un error";
                }
              ?>
              </table>
              <?php
              if(count($errors) > 0){
                echo "<div class='error'>";
                  foreach($errors as  $error){
                    echo $error."<br>";
                  }
                    echo "</div>";
              }
              ?>
            </form>
          </div>
      </div>
    </div> 
  
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Registrar calificaciones</h5>
  </div>
  <div class="offcanvas-body">
  <div class="container" style="margin-top: 13rem">
        <div class="registro position-relative top-50 start-50 translate-middle">
            <div class="tittle text-center">
                <h1 class="text-primary">Calificacion</h1>
            </div>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h3 class="fs-4">Registrar calificacion</h3>
                    <span class="">Materia</span>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                      <?php
                      $sql = "SELECT * FROM materia";
                      $result_materias = $mysqli -> query($sql);

                      if($result_materias){
                        if($result_materias -> num_rows > 0){
                          while($materia = $result_materias -> fetch_assoc()){
                      ?>
                      <option name="<?php echo $materia['nombreMateria']; ?>"  selected><?php echo $materia['id']."- "; echo $materia['nombreMateria']; ?></option>
                      <?php
                            }
                          }else{
                            $errors[] = "No hay ninguna materia";
                          }
                        }else{
                          $errors[] = "Hubo un error";
                        }
                      ?>
                    </select><br>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                      <?php
                      $sql_semestre = "SELECT * FROM semestre";
                      $result_semestre = $mysqli -> query($sql_semestre);

                      if($result_semestre){
                        if($result_semestre -> num_rows > 0){
                          while($semestre = $result_semestre -> fetch_assoc()){
                      ?>
                      <option value="<?php echo $semestre['nombre'] ?>" name="<?php echo $semestre['nombre']; ?>" selected><?php echo $semestre['nombre']; ?></option>
                      <?php
                            }
                          }else{
                            $errors[] = "No hay ninguna semestre";
                          }
                        }else{
                          $errors[] = "Hubo un error";
                        }
                      ?>
                    </select><br>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                      <?php
                      $sql = "SELECT * FROM parcial";
                      $result_parcial = $mysqli -> query($sql);

                      if($result_parcial){
                        if($result_parcial -> num_rows > 0){
                          while($parcial = $result_parcial -> fetch_assoc()){
                      ?>
                      <option value="<?php echo $parcial['nombre'] ?>" name="<?php echo $parcial['nombre']; ?>" selected><?php echo $parcial['nombre']; ?></option>
                      <?php
                            }
                          }else{
                            $errors[] = "No hay ninguna parcial";
                          }
                        }else{
                          $errors[] = "Hubo un error";
                        }
                      ?>
                    </select><br>
                    <span class="">Calificacion</span>
                    <input type="number" name="calificacion" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"><br>
                      <button type="submit" name="enviar">Guardar</button>
                      <?php
                  if(count($errors) > 0){
                    echo "<div class='error'>";
                      foreach($errors as  $error){
                        echo $error."<br>";
                      }
                        echo "</div>";
                  }
                  ?>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>