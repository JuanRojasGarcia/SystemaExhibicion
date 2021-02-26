<?php 
if (!isset($_GET["id_cen"])) {
    exit();
}

$id = $_GET["id_cen"];
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();

$consulta ="select juan.Funcion_Centro($id,'',3);";
$result =  $connection->prepare($consulta); 
$result->execute();

if ($result = 1) {
    header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}
?>