<?php  
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
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