<?php include_once "./menu.html"; ?> <br> <br>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">    
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form style="word-spacing: 200pt;"> 
                        <label class="label"><input type="radio" name="optradio" id="radEmp" >Empleados</label>
                        <label class="label"><input type="radio" name="optradio" id="radCen" >Centros</label>
                        <label class="label"><input type="radio" name="optradio" id="radArt" >Articulos</label>
                    </form>
                </div>
            </div>

            <form class="card" style="float:none; margin:auto; margin-top:40px; display:none;" id="formSearch">
                <div class="card-body">
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
            </form>

        </div>
    </div>
</div>


<script>
$(document).ready(function(){

    $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'radEmp') {
            $('#formSearch').show();

            $('#search_text').show();
            $('#search_textCen').hide(); 
            $('#search_textArt').hide(); 
            $('#resultCen').hide(); 
            $('#resultArt').hide(); 
            $('#result').show(); 

            // values 
            $('#search_textCen').val(''); 
            $('#search_textArt').val(''); 


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
            $('#formSearch').show();

            $('#search_text').hide();
            $('#search_textCen').show(); 
            $('#search_textArt').hide(); 
            $('#resultCen').show(); 
            $('#resultArt').hide(); 
            $('#result').hide(); 

            // values 
            $('#search_text').val(''); 
            $('#search_textArt').val(''); 

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
            $('#formSearch').show();

            $('#search_text').hide();
            $('#search_textCen').hide(); 
            $('#search_textArt').show(); 
            $('#resultCen').hide(); 
            $('#resultArt').show(); 
            $('#result').hide(); 

            // values 
            $('#search_text').val(''); 
            $('#search_textCen').val(''); 

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

<style>
    body{
        background:#F1EEEE;
        font-family: Helvetica,Arial,sans-serif;
    }

    .form-control{
        background:#F5F5F5;
    }
    
    .form-control::placeholder { 
        color: #D1D1D1;
        font-size: 16px;
        padding: 7px 18px;
    }

    .form-control:focus{
        background:#fff;
        -webkit-transition: all ease-in-out .55s;
        -o-transition: all ease-in-out .55s;
        transition: all ease-in-out .55s;
    }
    .form-control:not(focus){
        background:#F5F5F5;
        -webkit-transition: all ease-in-out .55s;
        -o-transition: all ease-in-out .55s;
        transition: all ease-in-out .55s;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 6px;
        box-shadow: 0 6px 10px -4px rgba(0,0,0,.50);
        margin-top: 10px;
    }

    .radius-btn{
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
    }

    #layoutSidenav_content{
        margin-top: -48px;
    }

    .row{
        margin-top: 30px;
        text-align: center;


    }



</style>