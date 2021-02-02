<?php  
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$output = '';

    if(isset($_POST["id"]) != '')  
    {  
        $consulta = "select * from juan.get_artciulo_id('".$_POST["id"]."');";  
        $result =  $connection->prepare($consulta); 
        $result->execute();
        $datosEmp = $result->fetchAll();

        $consultaConf = "select * from juan.get_configuracion();";
        $resultConf =  $connection->prepare($consultaConf); 
        $resultConf->execute();
        $datosConf = $resultConf->fetchAll();


 
        


        foreach($datosConf as $dato)   
        {
            $tasaFinanc = $dato[1];
            $plazoMaximo = $dato[3];
        }

        foreach($datosEmp as $dato)   
        { 
            
            $precio = $dato[3];
            $id = $dato[0];


            $precioInt = $precio * (1 + ($tasaFinanc * $plazoMaximo) / 100);

            $output .= 
            '<tr><td>' . $dato[1] . 
            '</td><td>' . $dato[2] . 
            '</td><td>' . '<input id="cantidadArt" name="cantidadArt" class="qty" value="0" type="number" min="0">' . 
            '</td><td id="idPrecio" name="idPrecio">' .  number_format($precioInt,2)  .
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
        var precioInt = <?php if(isset($precioInt)){echo $precioInt; } else { echo '0';}?> 
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