<?php

require('connection.php');


$mi_nControl= 33; //Este es el id que queremos modificar
$nombreAlunnno= 'NOMBRE'; //Este es el id que queremos modificar

$sql = "UPDATE alumno SET nombreAlumno =  '$nombreAlunnno' WHERE numControl = '$mi_nControl'";

$resultado = $mysqli->query($sql);

if($resultado){
    if($mysqli->affected_rows > 0){
        echo "Usuario Modificado correctamente ";

    } else{
        echo "Este usuario no existe";
    }


}else{
    echo "Hubo un error";
}