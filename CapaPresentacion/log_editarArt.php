<?php

echo "<script> console.log('aqui'); </script>";

if (!isset($_POST["iduArticulo"]) || !isset($_POST["descripcion"]) || !isset($_POST["modelo"])  || !isset($_POST["precio"]) || !isset($_POST["existencia"])) {
    echo "<script> console.log('aqui no exit'); </script>";

    exit();

    echo "<script> console.log('aqui no '); </script>";

}

echo "<script> console.log('aqui no dos'); </script>";

include_once "../CapaDatos/conexion.php";
$descripcion = $_POST["descripcion"];
$modelo = $_POST["modelo"];
$precio = $_POST["precio"];
$existencia = $_POST["existencia"];
$iduArticulo = $_POST["iduArticulo"];

echo "<script> console.log('aqui no tres'); </script>";


$consulta = $connection->prepare("UPDATE juan.cat_articulos SET descripcion=?, modelo=?, precio=?, existencia=? WHERE idu_articulo = ?;");
$resultado = $consulta->execute([$descripcion, $modelo, $precio, $existencia, $iduArticulo]); 

echo "<script> console.log('aqui no cuatro'); </script>";


if ($resultado === true) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>

