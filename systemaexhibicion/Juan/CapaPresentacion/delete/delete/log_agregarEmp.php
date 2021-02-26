<?php

if (!isset($_POST["numEmpleado"]) || !isset($_POST["iduCentro"])  || !isset($_POST["nombreEmp"]) || !isset($_POST["apellidoEmp"]) || !isset($_POST["correoEmp"])) {
    exit();
}
 
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();

$numEmpleado = $_POST["numEmpleado"];
$nombreEmp = $_POST["nombreEmp"];
$apellidoEmp = $_POST["apellidoEmp"];
$correoEmp = $_POST["correoEmp"];
$iduCentro = $_POST["iduCentro"];
$iOpcion = 1;



// $consulta = $connection->prepare("INSERT INTO juan.cat_empleados(num_empleado, idu_centro, nombre_empleado, apellido_empleado,email_empleado) VALUES (?, ?, ?, ?, ?);");
// $resultado = $consulta->execute([$numEmpleado, $iduCentro, $nombreEmp, $apellidoEmp, $correoEmp]); 

$consulta = "select juan.Funcion_Empleado($numEmpleado,$iduCentro,'$nombreEmp','$apellidoEmp','$correoEmp',$iOpcion);"; 
$result =  $connection->prepare($consulta); 
$result->execute();

if ($result = 1) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>