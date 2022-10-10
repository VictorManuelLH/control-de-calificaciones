<?php

require('connection.php');


$sql = "SELECT * FROM alumno";



$resultado = $mysqli->query($sql);

if($resultado->num_rows > 0) {

    while($fila = $resultado->fetch_assoc()){

        echo $fila ['numControl'];
        echo "<br>";
        echo $fila ['nombreAlumno'];
        echo "<br>";
        echo $fila ['apellidoPaterno'];
        echo "<br>";
        echo $fila ['apellidoMaterno'];
        echo "<br>";
        echo $fila ['correoElectronico'];
        echo "<br>";
        

    }
}
