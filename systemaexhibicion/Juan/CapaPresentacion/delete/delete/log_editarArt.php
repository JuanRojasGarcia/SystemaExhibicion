<?php

echo "<script> console.log('aqui'); </script>";

if (!isset($_POST["iduArticulo"]) || !isset($_POST["descripcion"]) || !isset($_POST["modelo"])  || !isset($_POST["precio"]) || !isset($_POST["existencia"])) {
    echo "<script> console.log('aqui no exit'); </script>";

    exit();

    echo "<script> console.log('aqui no '); </script>";

}

echo "<script> console.log('aqui no dos'); </script>";

include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();

$descripcion = $_POST["descripcion"];
$modelo = $_POST["modelo"];
$precio = $_POST["precio"];
$existencia = $_POST["existencia"];
$iduArticulo = $_POST["iduArticulo"];

echo "<script> console.log('aqui no tres'); </script>";


$consulta = "select juan.update_Articulo($iduArticulo,'$descripcion','$modelo',$precio,$existencia);"; 
$result =  $connection->prepare($consulta); 
$result->execute();

echo "<script> console.log('aqui no cuatro'); </script>";


if ($result = 1) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>

