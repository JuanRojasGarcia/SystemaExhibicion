<?php  
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
$output = '';

    if(isset($_POST["id"]) != '')  
    {  
        $consulta = "SELECT * FROM juan.cat_articulos WHERE CAST(idu_articulo AS TEXT) = '".$_POST["id"]."'";        
        $consultaConf = "SELECT idu_configuracion, tasa_financiamiento, enganche, plazo_maximo FROM juan.configuracion;";
        $resultConf = pg_query($connect, $consultaConf);
        $result = pg_query($connect, $consulta);  
        $rowConf = pg_fetch_array($resultConf);
        while( $row = pg_fetch_array($result))  
        { 
            $tasaFinanc = $rowConf["tasa_financiamiento"];
            $plazoMaximo = $rowConf["plazo_maximo"];
            
            $precio = $row["precio"];
            $id = $row["idu_articulo"];
            $precioInt = $precio * (1 + ($tasaFinanc * $plazoMaximo) / 100);

            $output .= 
            '<tr><td>' . $row["descripcion"] . 
            '</td><td>' . $row["modelo"] . 
            '</td><td>' . '<input id="cantidadArt" name="cantidadArt" class="qty" value="0" type="number" min="0">' . 
            '</td><td id="idPrecio" name="idPrecio">' .  $precioInt  .
            '</td><td id="importeArt" class="rowAmount">' . '0' .
            '</td></tr>';    
            
        }  
        echo $output; 
        echo '<script>console.log("'.$_POST['cantidad'].'"); </script>';


    }else{
        echo "<script> console.log('Email Empleado no Existe'); </script>";
    }
 

    //function caclularImp($precioArt){
    //   $importe  = $precioArt *  $_POST['cantidad'];
    //    return $importe;
    //}  


?>

<script>
    $("#cantidadArt").on('input', (e) => {
            var cantidad = $('#cantidadArt').val();
            var precioInt = <?php echo $precioInt; ?> ;
            var id = <?php echo $id; ?> ;
            $.ajax({  
                url:"./log_get_importeArt.php",  
                method:"POST",  
                data:{cantidad:cantidad, id:id, precioInt:precioInt},  
                success:function(data){           
                   $('#importeArt').html(data) ;
                }  
            }); 
    });
</script>
