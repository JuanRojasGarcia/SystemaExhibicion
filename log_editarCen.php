<?php

if (!isset($_POST["numCentro"]) || !isset($_POST["nombreCentro"])) {
    exit();
}
 

include_once "../CapaDatos/conexion.php";
$numCentro = $_POST["numCentro"];
$nombreCentro = $_POST["nombreCentro"];


$consulta = $connection->prepare("UPDATE juan.cat_centros SET nombre_centro=? WHERE idu_centro = ?;");
$resultado = $consulta->execute([$nombreCentro, $numCentro]); 


if ($resultado === true) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>