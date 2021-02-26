$(document).ready(function(){              

        var bRegresa = false;
        var selectVacioEmp = -1;
        var selectVacioArt = -1;
        // $('#btnSave').hide(); 
        // $('#btnNext').show();

        const f = new Date();
        //$('#fecha').text(`${f.getDate()}/${f.getMonth()+1}/${f.getFullYear()}`);
        $("#fecha").val(`${f.getMonth()+1}/${f.getDate()}/${f.getFullYear()}`);



        //Funcion para Obtener el nombre del empleado

        // $('#selectEmp').change(function(){  
        //     //const selectEmp = $('#selectEmp');
        //     var id = $(this).val();  
        //     $.ajax({  
        //         url:"./log_get_dataEmp.php",  
        //         method:"POST",  
        //         data:{id:id},  
        //         success:function(data){  
        //             $('#emailEmp').html(data);  
        //             //selectEmp.prop('disabled', true)
        //         }  
        //     }); 


        // });}

        selectEmp = $("#selectEmp").kendoDropDownList({
            autoBind: false,
            cascadeFrom: "Centros",
            optionLabel: {  nombre_empleado: "Selecione un Empleado...",
                            num_empleado: -1
                            },
            dataTextField: "nombre_empleado",
            dataValueField: "num_empleado",
            dataSource: {
                type: "json",
                serverFiltering: true,
                transport: {
                    read: {
                        type: "GET",
                            url: function(){
                                return "./ajax/Proc_Empleado.php?iSwitch=7"
                            },
                        dataType: "json",
                        cache: false
                    }
                }
            }
        }).data("kendoDropDownList");
    
        selectArt = $("#selectArt").kendoDropDownList({
            autoBind: false,
            cascadeFrom: "Centros",
            optionLabel: {  descripcion: "Selecione un Articulo...",
                            idu_articulo: -1
                            },
            dataTextField: "descripcion",
            dataValueField: "idu_articulo",
            dataSource: {
                type: "json",
                serverFiltering: true,
                transport: {
                    read: {
                        type: "GET",
                            url: function(){
                                return "./ajax/Proc_Articulos.php?iSwitch=7"
                            },
                        dataType: "json",
                        cache: false
                    }
                }
            }
        }).data("kendoDropDownList");

        var selectArtEnable = $("#selectArt").data("kendoDropDownList");
        var selectEmpEnable = $("#selectEmp").data("kendoDropDownList");

        $('#selectEmp').change(function(){  
            //const selectEmp = $('#selectEmp');
            selectVacioEmp = selectEmp.value();

            if ($(this).val() == ""){
                $('#requestEmail').html('');  
            }else{
                id = $(this).val();
                var iSwitch = 3; 
                $.ajax({  
                    url:"./ajax/Proc_Venta.php",  
                    method:"POST",  
                    data:{id:id, iSwitch:iSwitch},  
                    success:function(data){  
                        $('#requestEmail').html(data);  
                        //selectEmp.prop('disabled', true)
                    }  
                }); 
            }
            


        });  

        $('#selectArt').change(function()
        {
            selectVacioArt = selectArt.value();
            if(selectVacioArt == -1)
            {
                $('#descripcion').html('');
                $('#modelos').html('');
                $('#cantidadArt').val(0);
                $('#idPrecio').val(0);
                $('#enganche').html('0');
                $('#egbonus').html('0');
                $('#total').val(0);
                $('#tableBodyForm').addClass('d-none');

            
            }else{
                selectArtEnable.enable(false);

            }
        });

        //console.log($('#cantidadArt').val());

        //Funcon para agregar articulo al tableBodyForm

        $('#btnAddArt').on('click', function(e) {
            
            if ($('#selectArt').val() == ''){
                // const message = $('#message');
                // message.html('Necesitas Seleccionar Articulo Antes de Agregarlo').show();
                // message.addClass('alert-danger');
                // setTimeout( function ( ) { 
                //     message.html('Necesitas Seleccionar Articulo Antes de Agregarlo').hide();  
                // }, 4000 );
                // return
                BootstrapDialog.show({
                    type: BootstrapDialog.TYPE_INFO,  
                    title: 'Exhibicion',
                    message: 'Necesitas Seleccionar Articulo Antes de Agregarlo',
                    buttons: [{
                        label: 'Close',
                        action: function(dialogRef){
                            dialogRef.close();
                        }
                    }]
                });

            }else{
                
  
                $('#tableBodyForm').removeClass('d-none');
                $('#cantidadArt').val(0);
                selectArtEnable.enable(true);

                // $('#selectArt').prop('disabled', false);
                // $('#selectArt').selectpicker('refresh');




                bRegresa = true;
                const enganche = $('#enganche');
                const bonEnganche = $('#egbonus');
                const total = $('#total');
    
                // var id = $('#selectArt').val();  
                // $.ajax({  
                //     url:"./log_get_dataArt.php",  
                //     method:"POST",  
                //     data:{id:id},  
                //     success:function(data){           
                //         $('#tableBodyForm').html(data) ;
    
                //         $('#enganche').empty() ;
                //         $('#egbonus').empty() ;
                //         $('#total').val('0') ;
    
                //         $('#enganche').append('0') ;
                //         $('#egbonus').append('0') ;
                //     }  
                // }); 
    
                var id = $('#selectArt').val(); 
                var iSwitch = 4;  
                $.ajax({   
                    url:"./ajax/Proc_Venta.php",  
                    method:"POST",  
                    data:{id:id, iSwitch:iSwitch},  
                    success:function(respuesta){  
                        var data = respuesta.split(",");
                        console.log("success");
                        console.log(data[1]);    
    
                        // console.log(data[0]);    
                        // console.log(data[1]);
                        // console.log(data[2]);   
                        // $('#tableBodyForm').html(respuesta) ;
    
                        $('#descripcion').html(data[2]) ;
                        $('#modelos').html(data[3]) ;
                        $('#idPrecio').val(data[4]) ;
                        $('#importeArt').html('0') ;
    
                        // console.log($('#descripcion').val());    
                        // console.log($('#modelos').val());
                        // console.log($('#idPrecio').val()); 
                        // console.log($('#importeArt').val()); 
                        // console.log($('#cantidadArt').val());              
    
                        $('#enganche').empty() ;
                        $('#egbonus').empty() ;
                        $('#total').val('0') ;
    
                        $('#enganche').append('0') ;
                        $('#egbonus').append('0') ;
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
    
                // const selectArt = $('#selectArt');
                // selectArt.prop('disabled', false)
            }
            

            
        });

        

        $("#cantidadArt").bind('click keyup',function(e) {
            if ($('#cantidadArt').val() >= 0 ){
                var precioInt = $('#idPrecio').val();
                var cantidad = $('#cantidadArt').val();
                var iSwitch = 6;  
    
                // var id = <?php if(isset($id)){echo $id; }else { echo '0';} ?> ;
    
                $.ajax({  
                    // url:"./log_get_importeArt.php",  
                    url:"./ajax/Proc_Venta.php",  
                    method:"POST",  
                    data:{cantidad:cantidad, precioInt:precioInt,iSwitch:iSwitch},  
                    success:function(value){    
                        var data = value.split(",");  
                        console.log(data);  
                        $('#importeArt').html(data[1]);
                        $('#enganche').html(data[2]);
                        $('#egbonus').html(data[3]);
                        $('#total').val(data[4]);
                    }  
                }); 
            }
        });




            




        //Funcion para desabilitar el combobox cuando el boton Agregar articulo haya sido precionado
        // $('#selectArt').change(function(){  
        //     const selectArt = $('#selectArt');
        //     selectArt.prop('disabled', true)
        // });



        

        //Funcion para desplegar los abonos mensuales y validar el boton "Siguiente"
        $('#btnNext').on('click', function(e) {
            // console.log(selectVacioEmp);
            // console.log(selectVacioArt);
            const message = $('#message');

            if(selectVacioEmp == -1){
                // message.html('Necesitas seleccionar un Empleado').show();
                // message.addClass('alert-danger');
                // setTimeout( function ( ) { 
                //     message.html('Necesitas seleccionar un Empleado').hide();  
                // }, 4000 ); 
                // return
                BootstrapDialog.show({
                    type: BootstrapDialog.TYPE_INFO,  
                    title: 'Exhibicion',
                    message: 'Necesitas seleccionar un Empleado',
                    buttons: [{
                        label: 'Close',
                        action: function(dialogRef){
                            dialogRef.close(); 
                        }
                    }]
                });
            }else if (selectVacioArt == -1){
                // const message = $('#message');
                // message.html('Necesitas seleccionar un Articulo').show();
                // message.addClass('alert-danger');
                // setTimeout( function ( ) { 
                //     message.html('Necesitas seleccionar un Articulo').hide();  
                // }, 4000 ); 
                // return
                BootstrapDialog.show({
                    type: BootstrapDialog.TYPE_INFO,  
                    title: 'Exhibicion',
                    message: 'Necesitas seleccionar un Articulo',
                    buttons: [{
                        label: 'Close',
                        action: function(dialogRef){
                            dialogRef.close();
                        }
                    }]
                });
            }else if (bRegresa == false){

                bRegresaNext = false;
                BootstrapDialog.show({
                    type: BootstrapDialog.TYPE_INFO,  
                    title: 'Exhibicion',
                    message: 'Necesitas Agregar un Articulo',
                    buttons: [{
                        label: 'Close',
                        action: function(dialogRef){
                            dialogRef.close();
                        }
                    }]
                });

            }else if ($('#cantidadArt').val() <= 0){
                // const message = $('#message');
                // message.html('La cantidad debe ser mayor a 0').show();
                // message.addClass('alert-danger');
                // setTimeout( function ( ) { 
                //     message.html('La cantidad debe ser mayor a 0').hide();  
                // }, 4000 ); 
                // return

                BootstrapDialog.show({
                    type: BootstrapDialog.TYPE_INFO,  
                    title: 'Exhibicion',
                    message: 'La cantidad debe ser mayor a 0',
                    buttons: [{
                        label: 'Close',
                        action: function(dialogRef){
                            dialogRef.close();
                        }
                    }]
                });
            }else{

                // if ($('#cantidadArt').val() > <?php //echo $existencia; ?>){
                //     message.html('Compras mas de lo Existe').show();
                //     message.addClass('alert-danger');
                //     setTimeout( function ( ) { 
                //         message.html('Compras mas de lo Existe').hide();  
                //     }, 4000 ); 
                //     return
                // }

                

                // const selectArt = $('#selectArt');
                // const selectEmp = $('#selectEmp');
                // const btnAddArt = $('#btnAddArt');
                // selectArt.prop('disabled', true);
                // btnAddArt.prop('disabled', true); 
                // selectEmp.prop('disabled', true);

                // $('#selectEmp').prop('disabled', true);
                // $('#selectArt').prop('disabled', true);
                $('#cantidadArt').prop('disabled', true);
                $('#btnAddArt').prop('disabled', true);

                


                // $('.selectpicker').selectpicker('refresh');

                selectArtEnable.enable(false);
                selectEmpEnable.enable(false);
                
                $('#divNext').removeClass('d-none')
                $('#btnSave').removeClass('d-none')
                $('#btnNext').addClass('d-none')



                var totalAdeudo = $('#total').val();
                var iSwitch = 7;  
                console.log(totalAdeudo);
                $.ajax({  
                    // url:"./log_get_totalabonosVen.php",  
                    url:"./ajax/Proc_Venta.php",  
                    method:"POST",  
                    data:{totalAdeudo:totalAdeudo,iSwitch:iSwitch},  
                    success:function(data){  
                        console.log(data);
                        $('#tableBodyPayments').html(data);
                    }
                });   

                // $('#btnSave').show(); 
                // $('#btnNext').hide();

                // if (!$('#pay_3').is('checked') || !$('#pay_6').is('checked') || !$('#pay_9').is('checked') || !$('#pay_12').is('checked')){
                //     const message = $('#message');
                //     message.html('Necesitas seleccionar un Pago mensual').show();
                //     message.addClass('alert-danger');
                //     setTimeout( function ( ) { 
                //         message.html('Necesitas seleccionar un Pago mensual').hide();  
                //     }, 4000 ); 
                //     return
                // }
            }

           
        }); 

 

        $('#btnSave').on('click', function(e) {
            
            if ($('#total').val() != 0 ){

            var numEmpleado = $('#selectEmp').val();
            var totalApagar = $('#total').val();
            var fecha =  $("#fecha").val();
            var iopcion = 1;
            var iSwitch = 1;
    
            $.ajax({  
                url:"./ajax/Proc_Venta.php",  
                method:"POST",  
                data:{numEmpleado:numEmpleado,totalApagar:totalApagar,fecha:fecha,iopcion:iopcion,iSwitch:iSwitch},  
                success: function(success) {
                    console.log("success");
                    console.log(success);   

                    if (success == "Error"){
                        BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_DANGER,  
                            title: 'Exhibicion',
                            message: success,
                            buttons: [{
                                label: 'Close',
                                action: function(dialogRef){
                                    dialogRef.close();
                                }
                            }]
                        });
                    }else{
    
                        BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_SUCCESS, 
                            title: 'Exhibicion',
                            message: success,
                            buttons: [{
                                label: 'Close',
                                action: function(dialogRef){
                                    window.location="index.php";
                                    dialogRef.close();
                                }
                            }]
                        });
                    }
                    
                    
                    // $("#getCode").html(success);
                    // $("#myModal").modal('show');
    
                    // $('#cancelModal').on('click', function(e) {   
                    //     location.href = '../CapaPresentacion/frm_ventas.php';
                    // });
                },
                error: function(error) {
                    console.log("error");
                    console.log(error);
                },	
                complete: function(complete) {
                    console.log("complete");
                    console.log(complete);
    
                    // $("#getCode").html(complete);
                    // $("#myModal").modal('show');
                }
            });
        }else{
            BootstrapDialog.show({
              type: BootstrapDialog.TYPE_INFO,  
              title: 'Exhibicion',
              message: 'No se ha calculado el Total',
              buttons: [{
                  label: 'Close',
                  action: function(dialogRef){
                      dialogRef.close();
                  }
              }]
          });
        }
            
    
        });

    


});  
