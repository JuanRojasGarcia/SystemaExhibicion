<?php  
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=localhost port=5433 dbname=postgres user=postgres") or die('Could not connect: ' . pg_last_error());

    if($_POST["cantidad"] != null && $_POST["id"] != null)  
    {  
        $consulta = "SELECT * FROM juan.cat_articulos;"; 
        $result = pg_query($connect, $consulta); 
        $row = pg_fetch_array($result);

        $existencia = $row["existencia"];
        $cantidad = $_POST["cantidad"];


        $existenciaStock = ($existencia) - ($cantidad);
        $consultaupdateArt = $connection->prepare("UPDATE juan.cat_articulos SET existencia=? WHERE CAST(idu_articulo AS TEXT) = '".$_POST["id"]."'");
        $resultado = $consultaupdateArt->execute([$existenciaStock]);

    }else{
        echo "<script> console.log('Total adeudo 0'); </script>";
    }
?>