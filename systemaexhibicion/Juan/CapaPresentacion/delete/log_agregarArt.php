<?php

if (!isset($_POST["descripcion"]) || !isset($_POST["modelo"])  || !isset($_POST["precio"]) || !isset($_POST["existencia"])) {
    exit();
}
 
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();


$descripcion = $_POST["descripcion"];
$modelo = $_POST["modelo"];
$precio = $_POST["precio"];
$existencia = $_POST["existencia"];
$iOpcion = 1;


// $consulta = $connection->prepare("INSERT INTO juan.cat_articulos(descripcion, modelo, precio, existencia) VALUES (?, ?, ?, ?);");
// $resultado = $consulta->execute([$descripcion, $modelo, $precio, $existencia]); 

$consulta = "select juan.Funcion_Articulo('$descripcion','$modelo',$precio,$existencia,$iOpcion);"; 
$result =  $connection->prepare($consulta);  
$result->execute();
// $result->execute([$descripcion, $modelo, $precio, $existencia,$iOpcion]);
echo "<script> console.log('".$result->execute()."'); </script>";

if ($result = 1) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>