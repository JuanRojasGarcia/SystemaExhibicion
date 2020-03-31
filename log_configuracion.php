<?php

if (!isset($_POST["tasaFinanciamiento"]) || !isset($_POST["enganche"])  || !isset($_POST["plazoMaximo"])) {
    exit();
}

include_once "../CapaDatos/conexion.php";
$tasaFinanciamiento = $_POST["tasaFinanciamiento"];
$enganche = $_POST["enganche"];
$plazoMaximo = $_POST["plazoMaximo"];



$consulta = $connection->prepare("INSERT INTO juan.configuracion(tasa_financiamiento, enganche, plazo_maximo) VALUES (?, ?, ?);");
$resultado = $consulta->execute([$tasaFinanciamiento, $enganche, $plazoMaximo]); 


if ($resultado === true) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>