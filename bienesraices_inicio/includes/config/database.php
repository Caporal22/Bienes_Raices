<?php
function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root', 'DanieliniCaporal1012#', 'bienesraices_crud');
//    if($db){
//        echo "Se conecto a la base de datos";
//    } else {
//        echo "Error al conectar a la base de datos";
//    }

    if(!$db){
        echo "Error en la base de datos";
        exit;
    }
    return $db;
}