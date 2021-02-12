<?php  
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$output = '';

    if(isset($_POST["cantidad"]) != null && isset($_POST["id"]) != '' && isset($_POST["precioInt"]) != null)  
    {  
        $consulta = "select * from juan.get_artciulo_id('".$_POST["id"]."');";  
        $result =  $connection->prepare($consulta); 
        $result->execute();
        $datos = $result->fetchAll();

        $consultaConf = "select * from juan.get_configuracion();";
        $resultConf =  $connection->prepare($consultaConf); 
        $resultConf->execute();
        $datosConf = $resultConf->fetchAll();


        foreach($datosConf as $dato)   
        {
            $tasaFinanc =  $dato[1];
            $plazoMaximo = $dato[3];
            $enganchePor = $dato[2];
        }

        foreach($datos as $dato)   
        { 
            $alertExistencia = "Exediste Stock Producto";
            $existencia =$dato[4];
            $id = $dato[0];

            
            if($_POST['cantidad'] <= $existencia){
                $importe  = $_POST['precioInt'] *  $_POST['cantidad'];
                $enganche = ($enganchePor / 100) * $importe;
                $bonEnganche = $enganche * (($tasaFinanc * $plazoMaximo) / 100);
                $total = $importe - $enganche - $bonEnganche;
                echo number_format($importe,2, '.', '').",".number_format($enganche,2, '.', '').",".number_format($bonEnganche,2, '.', '').",".number_format($total,2, '.', '').","; 
                //echo "<script> console.log('.$importe.",".$enganche.'); </script>";
            } else{
                echo "<script> console.log('Exediste Stock Producto'); </script>";
                echo "<script> alert('$alertExistencia'); </script>";
                $importe  = $_POST['precioInt'] *  $_POST['cantidad'];  
                $enganche = ($enganchePor / 100) * $importe;
                $bonEnganche = $enganche * (($tasaFinanc * $plazoMaximo) / 100);
                $total = $importe - $enganche - $bonEnganche;
                echo number_format($importe,2, '.', '').",".number_format($enganche,2, '.', '').",".number_format($bonEnganche,2, '.', '').",".number_format($total,2, '.', '').","; 


            }

 
        }  
            //echo "<script> console.log(' .$importe. '); </script>";
    }else{
        echo "<script> console.log('Cantidad no existe'); </script>";
    }
        //echo "<script> console.log( ".$_POST['id']."); </script>";
?>