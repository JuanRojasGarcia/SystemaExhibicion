$(document).ready(function(){              

        $('#btnSave').hide(); 
        $('#btnNext').show();

        const f = new Date();
        //$('#fecha').text(`${f.getDate()}/${f.getMonth()+1}/${f.getFullYear()}`);
        $("#fecha").val(`${f.getDate()}/${f.getMonth()+1}/${f.getFullYear()}`);



        //Funcion para Obtener el nombre del empleado

        $('#selectEmp').change(function(){  
            //const selectEmp = $('#selectEmp');
            var id = $(this).val();  
            $.ajax({  
                url:"./log_get_dataEmp.php",  
                method:"POST",  
                data:{id:id},  
                success:function(data){  
                    $('#emailEmp').html(data);  
                    //selectEmp.prop('disabled', true)
                }  
            }); 


        });

            //console.log($('#cantidadArt').val());

        //Funcon para agregar articulo al tableBodyForm

        $('#btnAddArt').on('click', function(e) {

            if ($('#selectArt').val() === ''){
                const message = $('#message');
                message.html('Necesitas Seleccionar Articulo Antes de Agregarlo').show();
                message.addClass('alert-danger');
                setTimeout( function ( ) { 
                    message.html('Necesitas Seleccionar Articulo Antes de Agregarlo').hide();  
                }, 4000 );
                return
            }

            const enganche = $('#enganche');
            const bonEnganche = $('#egbonus');
            const total = $('#total');

            var id = $('#selectArt').val();  
            $.ajax({  
                url:"./log_get_dataArt.php",  
                method:"POST",  
                data:{id:id},  
                success:function(data){           
                    $('#tableBodyForm').html(data) ;

                    $('#enganche').empty() ;
                    $('#egbonus').empty() ;
                    $('#total').val('0') ;

                    $('#enganche').append('0') ;
                    $('#egbonus').append('0') ;
                }  
            });

            const selectArt = $('#selectArt');
            selectArt.prop('disabled', false)
        });



        //Funcion para desabilitar el combobox cuando el boton Agregar articulo haya sido precionado
        $('#selectArt').change(function(){  
            const selectArt = $('#selectArt');
            selectArt.prop('disabled', true)
        });


        //Funcion para desplegar los abonos mensuales y validar el boton "Siguiente"
        $('#btnNext').on('click', function(e) {

            const message = $('#message');

            if($('#selectEmp option:selected').val() == ''){
                message.html('Necesitas seleccionar un Empleado').show();
                message.addClass('alert-danger');
                setTimeout( function ( ) { 
                    message.html('Necesitas seleccionar un Empleado').hide();  
                }, 4000 ); 
                return
            }
            if ($('#selectArt option:selected').val() == ''){
                const message = $('#message');
                message.html('Necesitas seleccionar un Articulo').show();
                message.addClass('alert-danger');
                setTimeout( function ( ) { 
                    message.html('Necesitas seleccionar un Articulo').hide();  
                }, 4000 ); 
                return
            }
            if ($('#cantidadArt').val() == 0){
                const message = $('#message');
                message.html('La cantidad debe ser mayor a 0').show();
                message.addClass('alert-danger');
                setTimeout( function ( ) { 
                    message.html('La cantidad debe ser mayor a 0').hide();  
                }, 4000 ); 
                return
            }

            // if ($('#cantidadArt').val() > <?php //echo $existencia; ?>){
            //     message.html('Compras mas de lo Existe').show();
            //     message.addClass('alert-danger');
            //     setTimeout( function ( ) { 
            //         message.html('Compras mas de lo Existe').hide();  
            //     }, 4000 ); 
            //     return
            // }

            const selectArt = $('#selectArt');
            const selectEmp = $('#selectEmp');
            const btnAddArt = $('#btnAddArt');
            selectArt.prop('disabled', true)
            btnAddArt.prop('disabled', true)
            //selectEmp.prop('disabled', true)

            
            $('#divNext').removeClass('d-none')

            var totalAdeudo = $('#total').val();
            console.log(totalAdeudo);
            $.ajax({  
                url:"./log_get_totalabonosVen.php",  
                method:"POST",  
                data:{totalAdeudo:totalAdeudo},  
                success:function(data){       
                    $('#tableBodyPayments').html(data);
                }
                
            
        });   

        if (!$('#pay_3').is('checked') || !$('#pay_6').is('checked') || !$('#pay_9').is('checked') || !$('#pay_12').is('checked')){
            const message = $('#message');
            message.html('Necesitas seleccionar un Pago mensual').show();
            message.addClass('alert-danger');
            setTimeout( function ( ) { 
                message.html('Necesitas seleccionar un Pago mensual').hide();  
            }, 4000 ); 
            return
            }

    }); 


});  
