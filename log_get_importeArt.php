<?php  
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
$output = '';

    if(isset($_POST["cantidad"]) != null && isset($_POST["id"]) != '' && isset($_POST["precioInt"]) != null)  
    {  
        $consulta = "SELECT * FROM juan.cat_articulos WHERE CAST(idu_articulo AS TEXT) = '".$_POST["id"]."'";          
        $result = pg_query($connect, $consulta);  
        while( $row = pg_fetch_array($result))  
        { 
             
            $importe  = $_POST['precioInt'] *  $_POST['cantidad'];   
        }  
            echo $importe; 
            //echo "<script> console.log(' .$importe. '); </script>";
    }else{
        echo "<script> console.log('Cantidad no existe'); </script>";
    }
        //echo "<script> console.log( ".$_POST['id']."); </script>";



?>