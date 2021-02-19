<?php

if (!isset($_POST["numCentro"]) || !isset($_POST["nombreCentro"])) {
    exit();
}
 

include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();

$numCentro = $_POST["numCentro"];
$nombreCentro = $_POST["nombreCentro"];


$consulta = "select juan.Funcion_Centro($numCentro,'$nombreCentro',2);";
$result =  $connection->prepare($consulta); 
$result->execute();


if ($result = 1) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>