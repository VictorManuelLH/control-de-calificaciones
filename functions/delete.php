<?php

require('connection.php');

$mi_nControl = 33; //El id q queremos eliminar

$sql = ("DELETE FROM alumno WHERE numControl= '$mi_nControl'");

$resultado = $mysqli->query($sql);

if($resultado){

    if($mysqli -> affected_rows > 0){
        echo "Se borro el usuario";
    } else { 
        echo "Este usuario no se pudo borrar porque no existe";
    }
}else{
    echo "Hubo un error".$mysqli->error;
}