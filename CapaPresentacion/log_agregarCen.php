<?php

if (!isset($_POST["numCentro"]) || !isset($_POST["nombreCentro"])) {
    exit();
}
 

include_once "../CapaDatos/conexion.php";
$numCentro = $_POST["numCentro"];
$nombreCentro = $_POST["nombreCentro"];


$consulta = $connection->prepare("INSERT INTO juan.cat_centros(idu_centro, nombre_centro) VALUES (?, ?);");
$resultado = $consulta->execute([$numCentro, $nombreCentro]); 


if ($resultado === true) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>