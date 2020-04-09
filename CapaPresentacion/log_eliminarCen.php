<?php 
if (!isset($_GET["id_cen"])) {
    exit();
}

$id = $_GET["id_cen"];
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("DELETE FROM juan.cat_centros  WHERE idu_centro = ?;");
$resultado = $consulta->execute([$id]);
if ($resultado === true) {
    header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}
?>