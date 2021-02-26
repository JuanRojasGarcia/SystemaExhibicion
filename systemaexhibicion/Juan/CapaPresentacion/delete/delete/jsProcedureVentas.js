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