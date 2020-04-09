<?php 
if (!isset($_GET["id_emp"])) {
    exit();
}

$id = $_GET["id_emp"];
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("DELETE FROM juan.cat_empleados WHERE num_empleado = ?;");
$resultado = $consulta->execute([$id]);
if ($resultado === true) {
    header("Location: index.php");
} else {
    echo "<script> console.log('Verificar si la tabla existe'); </script>";
}
?>