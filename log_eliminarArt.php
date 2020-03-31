<?php 
if (!isset($_GET["id_art"])) {
    exit();
}

$id = $_GET["id_art"];
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("DELETE FROM juan.cat_articulos WHERE idu_articulo = ?;");
$resultado = $consulta->execute([$id]);
if ($resultado === true) {
    header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}
?>