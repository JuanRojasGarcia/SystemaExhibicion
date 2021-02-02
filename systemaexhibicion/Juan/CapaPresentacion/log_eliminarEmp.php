<?php 
if (!isset($_GET["id_emp"])) {
    exit();
}

$id = $_GET["id_emp"];
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();

$consulta = "select juan.Funcion_Empleado($id,0,'','','',3);";
$result =  $connection->prepare($consulta); 
$result->execute();

if ($result = 1) {
    header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}
?>