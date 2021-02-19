<?php  
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();

    if($_POST["cantidad"] != null && $_POST["id"] != null)  
    {  
        $consulta = "select * from juan.get_data_Articulos();"; 
        $result =  $connection->prepare($consulta); 
        $result->execute();
        $datos = $result->fetchAll();

        $existencia = $datos[4];
        $cantidad = $_POST["cantidad"];


        $existenciaStock = $existencia - $cantidad;

        $consultaupdateArt = $connection->prepare("select * from juan.update_existencia_Articulo('".$_POST["id"]."',$existenciaStock);");
        $resultaupdateArt =  $connection->prepare($consultaupdateArt); 
        $resultaupdateArt->execute();
        // $consultaupdateArt->execute([$existenciaStock]);
        //echo "<script> console.log('.$existenciaStock.'); </script>";

    }else{
        echo "<script> console.log('Total adeudo 0'); </script>";
    }

    echo  $existenciaStock;

?>