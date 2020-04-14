<?php  
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=localhost port=5433 dbname=postgres user=postgres") or die('Could not connect: ' . pg_last_error());
$output = '';

    if(isset($_POST["cantidad"]) != null && isset($_POST["id"]) != '' && isset($_POST["precioInt"]) != null)  
    {  
        $consulta = "SELECT * FROM juan.cat_articulos WHERE CAST(idu_articulo AS TEXT) = '".$_POST["id"]."'";  
        $consultaConf = "SELECT idu_configuracion, tasa_financiamiento, enganche, plazo_maximo FROM juan.configuracion;"; 
        $resultConf = pg_query($connect, $consultaConf); 
        $result = pg_query($connect, $consulta);  
        $rowConf = pg_fetch_array($resultConf);

        while( $row = pg_fetch_array($result))  
        { 
            $alertExistencia = "Exediste Stock Producto";
            $existencia = $row["existencia"];
            $id = $row["idu_articulo"];
            $tasaFinanc = $rowConf["tasa_financiamiento"];
            $plazoMaximo = $rowConf["plazo_maximo"];
            $enganchePor = $rowConf['enganche'];

            
            if($_POST['cantidad'] <= $existencia){
                $importe  = $_POST['precioInt'] *  $_POST['cantidad'];
                $enganche = ($enganchePor / 100) * $importe;
                $bonEnganche = $enganche * (($tasaFinanc * $plazoMaximo) / 100);
                $total = $importe - $enganche - $bonEnganche;
                echo $importe.",".$enganche.",".$bonEnganche.",".$total.","; 
                //echo "<script> console.log('.$importe.",".$enganche.'); </script>";
            } else{
                echo "<script> console.log('Exediste Stock Producto'); </script>";
                echo "<script> alert('$alertExistencia'); </script>";
                $importe  = $_POST['precioInt'] *  $_POST['cantidad'];  
                $enganche = ($enganchePor / 100) * $importe;
                $bonEnganche = $enganche * (($tasaFinanc * $plazoMaximo) / 100);
                $total = $importe - $enganche - $bonEnganche;
                echo $importe.",".$enganche.",".$bonEnganche.",".$total.","; 


            }

 
        }  
            //echo "<script> console.log(' .$importe. '); </script>";
    }else{
        echo "<script> console.log('Cantidad no existe'); </script>";
    }
        //echo "<script> console.log( ".$_POST['id']."); </script>";
?>
