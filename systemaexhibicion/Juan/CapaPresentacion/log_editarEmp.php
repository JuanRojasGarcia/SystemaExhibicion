<?php

if (!isset($_POST["numEmpleado"]) || !isset($_POST["iduCentro"]) || !isset($_POST["nombreEmp"])  || !isset($_POST["apellidoEmp"]) || !isset($_POST["correoEmp"])) {
    exit();
}
 

include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();


$numEmpleado = $_POST["numEmpleado"];
$iduCentro = $_POST["iduCentro"];
$nombreEmp = $_POST["nombreEmp"];
$apellidoEmp = $_POST["apellidoEmp"];
$correoEmp = $_POST["correoEmp"];


$consulta = "select juan.Funcion_Empleado($numEmpleado,$iduCentro,'$nombreEmp','$apellidoEmp','$correoEmp',2);";
$result =  $connection->prepare($consulta); 
$result->execute();

if ($result = 1) {
	header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}


?>