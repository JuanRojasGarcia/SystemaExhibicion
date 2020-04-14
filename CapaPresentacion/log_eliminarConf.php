<?php 
if (!isset($_GET["id_conf"])) {
    exit();
}

$id = $_GET["id_conf"];
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("DELETE FROM juan.configuracion WHERE idu_configuracion = ?;");
$resultado = $consulta->execute([$id]);
if ($resultado === true) {
    header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}
?>