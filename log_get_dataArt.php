<?php  
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
$output = '';
    if(isset($_POST["id"]) != '')  
    {  
        $consulta = "SELECT * FROM juan.cat_articulos WHERE CAST(idu_articulo AS TEXT) = '".$_POST["id"]."'";          
        $result = pg_query($connect, $consulta);  
        while( $row = pg_fetch_array($result))  
        { 
            $output .= 
            '<tr><td>' . $row["descripcion"] . 
            '</td><td>' . $row["modelo"] . 
            '</td><td>' . "<input id='cantidadArt' class='qty' value='0' type='number' min='0' required></input>" . 
            '</td><td>' . $row["precio"] .
            '</td><td id="importeArt" class="rowAmount">' . "0" .
            '</td></tr>';       
        }  
        echo $output;  
    }else{
        echo "<script> console.log('Email Empleado no Existe'); </script>";
    }
 ?>  

