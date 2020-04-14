  
<?php

if ( $_GET["selectEmp"] != '' &&  $_GET["fecha"] != '' ) {
    include_once "../CapaDatos/conexion.php";
    $empleado = $_GET["selectEmp"];
    $totalApagar = $_GET["optradio"]; 
    $fecha = $_GET["fecha"];


    $consulta = $connection->prepare("INSERT INTO juan.cat_ventas(num_empleado, total, fecha) VALUES (?, ?, ?);");
    $resultado = $consulta->execute([$empleado, $totalApagar , $fecha]); 


    if ($resultado === true) {
        header("Location: index.php");
    } else {
        echo "<script> console.log('Verificar si la tabla existe'); </script>";
    }


}else{
    
}
?>

  
