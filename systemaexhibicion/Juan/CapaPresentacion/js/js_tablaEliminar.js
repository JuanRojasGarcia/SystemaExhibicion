$(document).ready(function(){      

    $('#eliminarArticulo').on('click', function(e) {        
        var iduArticulo = $('#eliminarArticulo').val();
        var iopcion = 3;
        var iSwitch = 3;

        console.log(iduArticulo);

        $.ajax({  
            url: "./ajax/Proc_Articulos.php",  
            method:"POST",  
            data:{iduArticulo:iduArticulo, iopcion:iopcion, iSwitch:iSwitch},  
            success: function(success) {
                console.log("success");
                console.log(success);

                                                
                $("#getCode").html(success);
                $("#myModal").modal('show');

                $('#cancelModal').on('click', function(e) {   
                    location.href = '../CapaPresentacion/tableData.php';
                });
            },
            error: function(error) {
                console.log("error");
                console.log(error);
            },	
            complete: function(complete) {
                console.log("complete");
                console.log(complete);
            }
        });

    });


});



 