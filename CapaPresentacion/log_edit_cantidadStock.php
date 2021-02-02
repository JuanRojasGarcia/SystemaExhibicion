<?php  
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin357") or die('Could not connect: ' . pg_last_error());

    if($_POST["cantidad"] != null && $_POST["id"] != null)  
    {  
        $consulta = "SELECT * FROM juan.cat_articulos;"; 
        $result = pg_query($connect, $consulta); 
        $row = pg_fetch_array($result);

        $existencia = $row["existencia"];
        $cantidad = $_POST["cantidad"];


        $existenciaStock = $existencia - $cantidad;
        $consultaupdateArt = $connection->prepare("UPDATE juan.cat_articulos SET existencia=? WHERE CAST(idu_articulo AS TEXT) = '".$_POST["id"]."'");
        $consultaupdateArt->execute([$existenciaStock]);
        //echo "<script> console.log('.$existenciaStock.'); </script>";

    }else{
        echo "<script> console.log('Total adeudo 0'); </script>";
    }

    echo  $existenciaStock;

?>