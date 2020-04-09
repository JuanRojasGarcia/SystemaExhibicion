<?php

    if ($_GET["total"] != 0 && $_GET["selectEmp"] != '' &&  $_GET["fecha"] != '') {
        include_once "../CapaDatos/conexion.php";
        $empleado = $_GET["selectEmp"];
        $total = $_GET["total"];
        $fecha = $_GET["fecha"];


        $consulta = $connection->prepare("INSERT INTO juan.cat_ventas(num_empleado, total, fecha) VALUES (?, ?, ?);");
        $resultado = $consulta->execute([$empleado, $total, $fecha]); 


        if ($resultado === true) {
            header("Location: index.php");
        } else {
            echo "<script> console.log('Verificar si la tabla existe'); </script>";
        }


    }else{
        
    }
?>