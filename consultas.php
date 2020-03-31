<?php include_once "./menu.html"; ?> <br> <br>


  <div class="container">
        <form style="word-spacing: 100pt;"  align="center" >
            <label class="radio-inline"><input type="radio" name="optradio" id="radEmp" >Empleados</label>
            <label class="radio-inline"><input type="radio" name="optradio" id="radCen">Centros</label>
            <label class="radio-inline"><input type="radio" name="optradio" id="radArt">Articulos</label>
        </form><br>
   <div class="form-group">
    <div class="input-group">
        <!--<div class="fa fa-search"></div>-->
        <input type="text" name="search_text" id="search_text" placeholder="Buscar Numero Empleado" class="form-control" style="border-radius: 25px; display:none;">
        <input type="text" name="search_text" id="search_textCen" placeholder="Buscar Numero Centro" class="form-control" style="border-radius: 25px; display:none;">
        <input type="text" name="search_text" id="search_textArt" placeholder="Buscar Descripcion" class="form-control" style="border-radius: 25px; display:none;">
    </div>
   </div>
   <div id="result" style="display:none;"></div>
   <div id="resultCen" style="display:none;"></div>
   <div id="resultArt" style="display:none;"></div>

  </div>



<script>
$(document).ready(function(){

    $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'radEmp') {
            $('#search_text').show();
            $('#search_textCen').hide(); 
            $('#search_textArt').hide(); 
            $('#resultCen').hide(); 
            $('#resultArt').hide(); 
            $('#result').show(); 


            load_data();

            function load_data(query){
                $.ajax({
                url:"./log_consultaEmp.php",
                method:"POST",
                data:{query:query},
                success:function(data){
                    $('#result').html(data);
                }
                });
            }
            
            $('#search_text').keyup(function(){
                var search = $(this).val();    

                    if(search != ''){
                        load_data(search);
                    }else{
                        load_data();
                    }
            });
       }else if($(this).attr('id') == 'radCen') {
            $('#search_text').hide();
            $('#search_textCen').show(); 
            $('#search_textArt').hide(); 
            $('#resultCen').show(); 
            $('#resultArt').hide(); 
            $('#result').hide(); 


            load_data();

            function load_data(query){
            $.ajax({
            url:"./log_consultaCen.php",
            method:"POST",
            data:{query:query},
            success:function(data){
                $('#resultCen').html(data);
            }
            });
            }
            
            $('#search_textCen').keyup(function(){
            var search = $(this).val();            
                if(search != ''){
                    load_data(search);
                }
                else{
                    load_data();
                }
            });
       }else{
            $('#search_text').hide();
            $('#search_textCen').hide(); 
            $('#search_textArt').show(); 
            $('#resultCen').hide(); 
            $('#resultArt').show(); 
            $('#result').hide(); 


            load_data();

            function load_data(query){
                $.ajax({
                url:"./log_consultaArt.php",
                method:"POST",
                data:{query:query},
                success:function(data){
                    $('#resultArt').html(data);
                }
                });
            }
            
            $('#search_textArt').keyup(function(){
                var search = $(this).val();    
                        
                if(search != ''){
                    load_data(search);
                }else{
                    load_data();
                }
                });
            }
   }); 


});

</script>