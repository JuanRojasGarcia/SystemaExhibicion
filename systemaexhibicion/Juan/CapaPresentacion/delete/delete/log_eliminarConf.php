<?php 
if (!isset($_GET["id_conf"])) {
    exit();
}

$id = $_GET["id_conf"];
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();

$consulta = "select juan.Funcion_Configuracion($id,0,0,0,2);";
$result =  $connection->prepare($consulta); 
$result->execute();

if ($result = 1) {
    header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}
?>