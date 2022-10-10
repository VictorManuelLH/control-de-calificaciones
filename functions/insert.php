<?php

//LLAMAMOS LA CONEXION
require("connection.php");

//INTRODUCIR POR AQUI LOS DATOS
$mi_nControl = "33";
$mi_nombres = "daniel ";
$mi_apellidoPaterno = "daniel";
$mi_apellidoMaterno = "daniel";
$mi_correoElectronico = "danieldanieldaniel@gmail.com";


$sql = "INSERT INTO alumno(numControl,nombreAlumno ,apellidoPaterno , apellidoMaterno ,correoElectronico) VALUES('$mi_nControl','$mi_nombres', '$mi_apellidoPaterno', '$mi_apellidoMaterno', '$mi_correoElectronico')";
$resultado =$mysqli->query($sql);

if($resultado){
    echo "Usuario se insertó correctamente";
} else{
    echo "Hubo un error al insertar al usuario".$mysqli->error;
}