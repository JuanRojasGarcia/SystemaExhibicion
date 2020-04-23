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

        //echo '<script>console.log("'.$_POST['cantidad'].'"); </script>';


    }else{
        echo "<script> console.log('Email Empleado no Existe'); </script>";
    }
 

    //function caclularImp($precioArt){
    //   $importe  = $precioArt *  $_POST['cantidad'];
    //    return $importe;
    //}  


?>

<script>
$(document).ready(function(){              


    $("#cantidadArt").on('click', function(e) {
        var precioInt = <?php if(isset($precioInt)){echo $precioInt; } else { echo '0';}?> ;
        var cantidad = $('#cantidadArt').val();
        var id = <?php if(isset($id)){echo $id; }else { echo '0';} ?> ;
        $.ajax({  
            url:"./log_get_importeArt.php",  
            method:"POST",  
            data:{cantidad:cantidad, id:id, precioInt:precioInt},  
            success:function(value){       
                var data = value.split(",");    
                $('#importeArt').html(data[0]);
                $('#enganche').html(data[1]);
                $('#egbonus').html(data[2]);
                $('#total').val(data[3]);
            }  
        }); 
             

            
    });

    $('#btnSave').on('click', function(e) {  
        var cantidad = $('#cantidadArt').val();
        var id = <?php if(isset($id)){echo $id; }else { echo '0';} ?> ;             
            $.ajax({  
                url:"./log_edit_cantidadStock.php",  
                method:"POST",  
                data:{id:id, cantidad:cantidad},  
                success:function(data){    
                    $('#cantidadStock').html(data);

                }  
            }); 
    }); 

});
</script>