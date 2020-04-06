<?php

echo "<script> console.log('aqui'); </script>";

if (!isset($_GET["fecha"]) || !isset($_GET["fecha"]) || !isset($_GET["total"])) {
    echo "<script> console.log('aqui no'); </script>";
    exit();
}
echo "<script> console.log('aqui otra vez'); </script>";

include_once "../CapaDatos/conexion.php";
$empleado = $_GET["selectEmp"];
$total = $_GET["total"];
$fecha = $_GET["fecha"];


$consulta = $connection->prepare("INSERT INTO juan.cat_ventas(num_empleado, total, fecha) VALUES (?, ?, ?);");
$resultado = $consulta->execute([$empleado, $total, $fecha]); 


if ($resultado === true) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>