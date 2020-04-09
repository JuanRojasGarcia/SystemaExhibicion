<?php

if (!isset($_POST["descripcion"]) || !isset($_POST["modelo"])  || !isset($_POST["precio"]) || !isset($_POST["existencia"])) {
    exit();
}
 
include_once "../CapaDatos/conexion.php";
$descripcion = $_POST["descripcion"];
$modelo = $_POST["modelo"];
$precio = $_POST["precio"];
$existencia = $_POST["existencia"];


$consulta = $connection->prepare("INSERT INTO juan.cat_articulos(descripcion, modelo, precio, existencia) VALUES (?, ?, ?, ?);
");
$resultado = $consulta->execute([$descripcion, $modelo, $precio, $existencia]); 


if ($resultado === true) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>