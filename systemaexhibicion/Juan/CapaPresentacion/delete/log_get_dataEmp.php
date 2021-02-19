<?php  
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$output = '';
    if(isset($_POST["id"]) != '')  
    {  
        $consulta = "select * from juan.get_email_empleado('".$_POST["id"]."');"; 
        $result =  $connection->prepare($consulta); 
        $result->execute();
        $datos = $result->fetchAll();
        foreach($datos as $dato) 
        { 
            $output .= '<span> Email: </span>' . $dato[0];       
        }  
        echo $output;  
    }else{
        echo "<script> console.log('Email Empleado no Existe'); </script>";
    }
 ?>   