<?php 
if (!isset($_GET["idu_ven"])) {
    exit();
}

$id = $_GET["idu_ven"];
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("DELETE FROM juan.cat_ventas WHERE idu_venta = ?;");
$resultado = $consulta->execute([$id]);
if ($resultado === true) {
    header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}
?>