<?php

if (!isset($_POST["tasaFinanciamiento"]) || !isset($_POST["enganche"])  || !isset($_POST["plazoMaximo"])) {
    exit();
}

include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();

$tasaFinanciamiento = $_POST["tasaFinanciamiento"];
$enganche = $_POST["enganche"];
$plazoMaximo = $_POST["plazoMaximo"];



$consulta ="select juan.Funcion_Configuracion(0,$tasaFinanciamiento,$enganche,$plazoMaximo,1);";
$result =  $connection->prepare($consulta); 
$result->execute(); 

if ($result = 1) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>