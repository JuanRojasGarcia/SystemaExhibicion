<?php  
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=localhost port=5433 dbname=postgres user=postgres") or die('Could not connect: ' . pg_last_error());
$output = '';
    if(isset($_POST["id"]) != '')  
    {  
        $consulta = "SELECT * FROM juan.cat_empleados WHERE CAST(num_empleado AS TEXT) = '".$_POST["id"]."'";          
        $result = pg_query($connect, $consulta);  
        while( $row = pg_fetch_array($result))  
        { 
            $output .= '<span> Email: </span>' . $row["email_empleado"];       
        }  
        echo $output;  
    }else{
        echo "<script> console.log('Email Empleado no Existe'); </script>";
    }
 ?>  