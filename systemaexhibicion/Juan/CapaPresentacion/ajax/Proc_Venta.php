<?php 
    include_once "../../CapaNegocio/Ventas.php";
    $venta = new Venta();


    switch ($_REQUEST["iSwitch"]){
        case 1:

            $venta->set_NumEmpleado($_REQUEST["numEmpleado"]);
            $venta->set_Total($_REQUEST["totalApagar"]) ;
            $venta->set_Fecha($_REQUEST["fecha"]) ;
            $venta->set_Opcion($_REQUEST["iopcion"]);

            $respuesta = $venta->Func_Agregar_Venta();
            $respuesta = pg_fetch_array($respuesta);
            $mensaje = "Se Agrego Correctamente";
        
            // echo "<script> console.log('".print_r($respuesta)."'); </script>";

            if ($respuesta[0] = 1){
                echo $mensaje;
            }else{
                echo "Error.";
            }
        break;
        case 2:
            $venta->set_Idu($_REQUEST["iduArticulo"]);
            $venta->set_NumEmpleado($_REQUEST["descripcion"]);
            $venta->set_Total($_REQUEST["modelo"]) ;
            $venta->set_Fecha($_REQUEST["precio"]) ;
            $venta->set_Opcion($_REQUEST["iopcion"]);
        
            $respuesta = $venta->Func_Actualizar_Venta();
            $respuesta = pg_fetch_array($respuesta);
            $mensaje = "Se Modifico Correctamente";
        
            // echo "<script> console.log('".print_r($respuesta)."'); </script>";

            if ($respuesta[0] = 1){
                echo $mensaje;
            }else{
                echo "Error.";
            }
        break;
        case 3:
            $output = '';
            $venta->set_Idu($_REQUEST["id"]);

            $respuesta = $venta->Func_Get_Email();
            $respuesta = pg_fetch_array($respuesta);
            // echo "<script> console.log(' .$respuesta[0]. '); </script>";

            echo $output .= '<span> Email: </span>' . $respuesta[0];
        break;
        case 4: 
            $output = '';
            $respuestaConf = $venta->Func_Get_Data_Configuracion();
            $respuestaConf = pg_fetch_array($respuestaConf);

            $venta->set_Idu($_REQUEST["id"]);
            $respuesta = $venta->Func_Get_ArticuloById();
            $respuesta = pg_fetch_array($respuesta);

            $tasaFinanc = $respuestaConf[1];
            $plazoMaximo = $respuestaConf[3];

            $precio = $respuesta[3];
            $id = $respuesta[0];


            $precioInt = $precio * (1 + ($tasaFinanc * $plazoMaximo) / 100);

            echo $output .= 
            '<tr><td>' . $respuesta[1] . 
            '</td><td>' . $respuesta[2] . 
            '</td><td>' . '<input id="cantidadArt" name="cantidadArt" class="qty" value="0" type="number" min="0">' . 
            '</td><td id="idPrecio" name="idPrecio">' .  number_format($precioInt,2)  .
            '</td><td id="importeArt" class="rowAmount">' . '0' .
            '</td></tr>';    

            // echo "<script> console.log(' .$respuesta[0]. '); </script>";
            // echo "<script> console.log(' .$respuestaConf[0]. '); </script>";

        break;

    }


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




