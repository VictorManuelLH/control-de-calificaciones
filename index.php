<?php
    require('functions/connection.php');
    $errors = array();

    if(isset($_POST['enviar'])){
        //Si existe enviar en POST
        $mi_numeroControl = $_POST['miNumeroControl'];
        $mi_nombre = $_POST['miNombre'];
        $mi_apellidoPaterno = $_POST['miApellidoPaterno'];
        $mi_apellidoMaterno = $_POST['miApellidoPaterno'];
        $mi_correoElectronico = $_POST['miCorreoElectronico'];

        if(!empty($mi_numeroControl) && !empty($mi_nombre) && !empty($mi_apellidoPaterno) && !empty($mi_apellidoMaterno) && !empty($mi_correoElectronico)){
            $sql = "INSERT INTO alumno(numControl, nombreAlumno, apellidoPaterno, apellidoMaterno, correoElectronico) VALUES('$mi_numeroControl', '$mi_nombre', '$mi_apellidoPaterno', '$mi_apellidoMaterno', '$mi_correoElectronico')";
            $result = $mysqli -> query($sql);
        }else{
            $errors[] = "Rellena todos los campos";
        }

    }

    if(isset($_POST['enviar'])){
        //Si existe enviar en POST
        $mi_Idmateria = $_POST['miIdMateriaAlumno'];
        $mi_numeroControl = $_POST['miNumeroControl'];
        $mi_materiaId = $_POST['miMateriaId'];

        if(!empty($mi_materiaId) && !empty($mi_nombreMateria)){
            $sql = "INSERT INTO materiaAlumno(id, alumno_id, materia_id) VALUES('$mi_Idmateria','$mi_numeroControl', '$mi_materiaId')";
            $result = $mysqli -> query($sql);
        }else{
            $errors[] = "Rellena todos los campos";
        }

    }

    if(isset($_POST['enviar'])){
        //Si existe enviar en POST
        $mi_materiaId = $_POST['miMateriaId'];
        $mi_nombreMateria = $_POST['miNombreMateria'];

        if(!empty($mi_materiaId) && !empty($mi_nombreMateria)){
            $sql = "INSERT INTO materia(id, nombreMateria) VALUES('$mi_materiaId', '$mi_nombreMateria')";
            $result = $mysqli -> query($sql);
        }else{
            $errors[] = "Rellena todos los campos";
        }

    }

    if(isset($_POST['enviar'])){
        //Si existe enviar en POST
        $mi_parcialId = $_POST['miParcialId'];
        $mi_nombreParcial = $_POST['miNombreParcial'];

        if(!empty($mi_parcialId) && !empty($mi_nombreParcial)){
            $sql = "INSERT INTO parcial(id, nombre) VALUES('$mi_parcialId', '$mi_nombreParcial')";
            $result = $mysqli -> query($sql);
        }else{
            $errors[] = "Rellena todos los campos";
        }

    }

    if(isset($_POST['enviar'])){
        //Si existe enviar en POST
        $mi_semestreId = $_POST['miSemestreId'];
        $mi_nombreSemestre = $_POST['miNombreSemestre'];

        if(!empty($mi_semestreId) && !empty($mi_nombreSemestre)){
            $sql = "INSERT INTO semestre(id, nombre) VALUES('$mi_semestreId', '$mi_nombreSemestre')";
            $result = $mysqli -> query($sql);
        }else{
            $errors[] = "Rellena todos los campos";
        }

    }

    if(isset($_POST['enviar'])){
        //Si existe enviar en POST
        $mi_semestreId = $_POST['miSemestreId'];
        $mi_nombreSemestre = $_POST['miNombreSemestre'];

        if(!empty($mi_semestreId) && !empty($mi_nombreSemestre)){
            $sql = "INSERT INTO semestre(id, nombre) VALUES('$mi_semestreId', '$mi_nombreSemestre')";
            $result = $mysqli -> query($sql);
        }else{
            $errors[] = "Rellena todos los campos";
        }

    }

    // if(isset($_POST['enviar'])){
    //     //Si existe enviar en POST
    //     $mi_calificacion = $_POST['miCalificacion'];

    //     if(!empty($mi_calificacion)){
    //         $sql = "INSERT INTO calificacion(calificaciones) VALUES('$mi_calificacion')";
    //         $result = $mysqli -> query($sql);
    //     }else{
    //         $errors[] = "Rellena todos los campos";
    //     }

    // }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

tr:nth-child(even) {
  background-color: #dddddd;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="comentarios">
            <h2>Tablas</h2> 
            <a href="alumnos.php" target="_blank">alumnos</a>
            <a href="semestres.php" target="_blank">semestres</a>
            <a href="alistarAlumnos.php" target="_blank">alistarAlumnos</a>
            <a href="verCalificacionesAlumno.php" target="_blank">verCalificacionesAlumno</a>
            <div class="formulario">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <table>
                        <tr>
                            <th>Alumno</th>
                            <th>Materia del alumno</th>
                            <th>Materia</th>
                            <th>Parcial</th>
                            <th>Semestre</th>
                            <th>Calificacion</th>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Numero de control</label>
                                <input type="text" name="miNumeroControl">
                            </td>
                            <td>
                                <label for="">ID de la materiaAlumno</label>
                                <input type="text" name="miIdMateriaAlumno">
                            </td>
                            <td>
                                <label for="">ID materia</label>
                                <input type="text" name="miMateriaId">
                            </td>
                            <td>
                                <label for="">ID Parcial</label>
                                <input type="text" name="miParcialId">
                            </td>
                            <td>
                                <label for="">ID del Semestre</label>
                                <input type="text" name="miSemestreId">
                            </td>
                            <td>
                                <label for="">ID del semestre</label>
                                <input type="text" name="miSemestreId">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Nombre alumno</label>
                                <input type="text" name="miNombre">
                            </td>
                            <td>
                                <label for="">Alumno id</label>
                                <input type="text" name="miAlumnoId">
                            </td>
                            <td>
                                <label for="">Nombre de la materia</label>
                                <input type="text" name="miNombreMateria">
                            </td>
                            <td>
                                <label for="">Nombre del parcial</label>
                                <input type="text" name="miNombreParcial">
                            </td>
                            <td>
                                <label for="">Nombre del semestre</label>
                                <input type="text" name="miNombreSemestre">
                            </td>
                            <td>
                                <label for="">ID materia</label>
                                <input type="text" name="miMateriaId">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Apellido paterno</label>
                                <input type="text" name="miApellidoPaterno">
                            </td>
                            <td>
                                <label for="">Materia id</label>
                                <input type="text" name="miMateriaId">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <label for="">Materia id</label>
                                <input type="text" name="miMateriaId">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Apellido materno</label>
                                <input type="text" name="miApellidoMaterno">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <label for="">Alumno id</label>
                                <input type="text" name="miAlumnoId">
                            </td>
                        </tr>
                            <tr>
                                <td>
                                    <label for="">Correo electronico</label>
                                    <input type="text" name="miCorreoElectronico">
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <label for="">Calificaciones</label>
                                    <input type="text" name="miCalificacion">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <label for="">ID Parcial</label>
                                    <input type="text" name="miParcialId">
                                </td>
                            </tr>
                    </table>
                    <input type="submit" value="Enviar" name="enviar">
                </form>
            </div>
            
                <?php
                    if(count($errors) > 0){
                        echo "<div class='error'>";
                        foreach($errors as $error){
                            echo "<i class='fas fa-exclamation-circle'></i>".$error."<br>";
                        }
                        echo "</div>";
                    }
                    $mysqli -> close();
                ?>

        </div>
    </div>
</body>
</html>