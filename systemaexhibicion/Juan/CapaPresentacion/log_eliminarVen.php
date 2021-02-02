<?php 
if (!isset($_GET["idu_ven"])) {
    exit();
}

$id = $_GET["idu_ven"];
include_once "../CapaDatos/conexion.php";

$objeto = new Conexion();
$connection = $objeto->Connect();

$consulta = "select juan.Funcion_Ventas($id ,0,0.0,'01/01/1900',3);";
$result =  $connection->prepare($consulta); 
$result->execute();

if ($result = 1) {
    header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}
?>