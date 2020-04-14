<?php  
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());

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