<?php

if (!isset($_POST["numEmpleado"]) || !isset($_POST["iduCentro"])  || !isset($_POST["nombreEmp"]) || !isset($_POST["apellidoEmp"]) || !isset($_POST["correoEmp"])) {
    exit();
}
 
include_once "../CapaDatos/conexion.php";
$numEmpleado = $_POST["numEmpleado"];
$nombreEmp = $_POST["nombreEmp"];
$apellidoEmp = $_POST["apellidoEmp"];
$correoEmp = $_POST["correoEmp"];
$iduCentro = $_POST["iduCentro"];


$consulta = $connection->prepare("INSERT INTO juan.cat_empleados(num_empleado, idu_centro, nombre_empleado, apellido_empleado,email_empleado) VALUES (?, ?, ?, ?, ?);");
$resultado = $consulta->execute([$numEmpleado, $iduCentro, $nombreEmp, $apellidoEmp, $correoEmp]); 


if ($resultado === true) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>