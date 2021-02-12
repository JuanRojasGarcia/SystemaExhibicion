
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
                var iopcion = 1;
                var iopciondos = 2;
                var iSwitch = 4; 
                $.ajax({
                url: "./ajax/Proc_Empleado.php",  
                method:"POST",
                data:{query:query, iopcion:iopcion, iSwitch:iSwitch, iopciondos:iopciondos},
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
                var iopcion = 1;
                var iopciondos = 2;
                var iSwitch = 4; 
                $.ajax({
                url: "./ajax/Proc_Centro.php", 
                method:"POST",
                data:{query:query, iopcion:iopcion, iSwitch:iSwitch, iopciondos:iopciondos},
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

            // function load_data(query){
            //     $.ajax({
            //     url:"./log_consultaArt.php",
            //     method:"POST",
            //     data:{query:query},
            //     success:function(data){
            //         $('#resultArt').html(data);
            //     }
            //     });
            // }

            function load_data(query){
                var iopcion = 1;
                var iopciondos = 2;
                var iSwitch = 4; 
                $.ajax({
                url: "./ajax/Proc_Articulos.php",  
                method:"GET",
                data:{query:query, iopcion:iopcion, iSwitch:iSwitch, iopciondos:iopciondos},
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

   $('#btnPdf').on('click', function(e) { 
        // $.ajax({  
        //     url: "./ajax/fpdf_Example.php",  
        //     method:"POST",  
        //     data:{},  
        //     success: function(success) {
        //         console.log("success");
        //         console.log(success);   

        //     },
        //     error: function(error) {
        //         console.log("error");
        //         console.log(error);
        //     },	
        //     complete: function(complete) {
        //         console.log("complete");
        //         console.log(complete);

        //         // $("#getCode").html(complete);
        //         // $("#myModal").modal('show');
        //     }
        // });
        $.ajax({
            url: './ajax/fpdf_Example.php',
            success: function(data) {
              var blob=new Blob([data]);
              var link=document.createElement('a');
              link.href=window.URL.createObjectURL(blob);
              link.download="pruebas.pdf";
              link.click();
            }
          });

    });
   


});


