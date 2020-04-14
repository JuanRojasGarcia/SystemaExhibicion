<?php

if (!isset($_POST["numEmpleado"]) || !isset($_POST["iduCentro"]) || !isset($_POST["nombreEmp"])  || !isset($_POST["apellidoEmp"]) || !isset($_POST["correoEmp"])) {
    exit();
}
 

include_once "../CapaDatos/conexion.php";
$numEmpleado = $_POST["numEmpleado"];
$iduCentro = $_POST["iduCentro"];
$nombreEmp = $_POST["nombreEmp"];
$apellidoEmp = $_POST["apellidoEmp"];
$correoEmp = $_POST["correoEmp"];


$consulta = $connection->prepare("UPDATE juan.cat_empleados SET idu_centro=?, nombre_empleado=?, apellido_empleado=?, email_empleado=? WHERE num_empleado = ?;");
$resultado = $consulta->execute([ $iduCentro, $nombreEmp, $apellidoEmp, $correoEmp,  $numEmpleado]); 


if ($resultado === true) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>