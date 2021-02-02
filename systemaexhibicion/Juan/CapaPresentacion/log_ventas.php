  
<?php

if ( $_GET["selectEmp"] != '' &&  $_GET["fecha"] != '' ) {

    include_once "../CapaDatos/conexion.php";
    $objeto = new Conexion();
    $connection = $objeto->Connect();

    $empleado = $_GET["selectEmp"];
    $totalApagar = $_GET["optradio"]; 
    $fecha = $_GET["fecha"];
    $iOpcion = 1;


    $consulta = ("select juan.Funcion_Ventas($empleado,$totalApagar,'$fecha',$iOpcion);");
    $result =  $connection->prepare($consulta); 
    $result->execute();

    echo "<script> console.log('".$result->execute()."'); </script>";


    if ($result = 1) {
        header("Location: index.php");
    } else {
        echo "<script> console.log('Verificar si la tabla existe'); </script>";
    }


}
?>

  
