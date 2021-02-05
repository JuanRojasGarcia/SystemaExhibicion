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


