$(document).ready(function(){      
    // var bRegresa;
    // console.log(bRegresa);
    var bRegresa = $.cookie("bRegresa")


    $('#btnConfGuardar').on('click', function(e) {    
        if ($('#tasaFinanciamiento').val() != '' && $('#enganche').val() != '' && $('#plazoMaximo').val() != ''){     
            if ($('#tasaFinanciamiento').val() > 0 && $('#enganche').val() > 0 && $('#plazoMaximo').val() > 0){  


                var tasaFinanc = $('#tasaFinanciamiento').val();
                var enganche = $('#enganche').val();
                var plazoMaximo = $('#plazoMaximo').val();
                var iopcion = 1;
                var iSwitch = 1; 

                $.ajax({  
                    url: "./ajax/Proc_Configuracion.php",  
                    method:"POST",  
                    data:{tasaFinanc:tasaFinanc,enganche:enganche,plazoMaximo:plazoMaximo,iopcion:iopcion,iSwitch:iSwitch},  
                    success: function(success) {
                        console.log("success");
                        console.log(success);   
                        
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
                        $.cookie("bRegresa", 'true',{expiries: 4});

                        // bRegresa = true;
                        // console.log(bRegresa);
                        

                        

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
            }else{
                BootstrapDialog.show({
                    type: BootstrapDialog.TYPE_INFO, 
                    title: 'Exhibicion',
                    message: 'No se permiten esos valores. Intente Nuevamente',
                    buttons: [{
                        label: 'Close',
                        action: function(dialogRef){
                            dialogRef.close();
                        }
                    }]
                });
            }
        }else{
            BootstrapDialog.show({
                type: BootstrapDialog.TYPE_INFO, 
                title: 'Exhibicion',
                message: 'Agrege todos los Campos',
                buttons: [{
                    label: 'Close',
                    action: function(dialogRef){
                        dialogRef.close();
                    }
                }]
            });
        }

    });


    $('#btnConfActualizar').on('click', function(e) {   
        if ($('#tasaFinanciamientoEdit').val() != '' && $('#engancheEdit').val() != '' && $('#plazoMaximoEdit').val() != ''){     
            if ($('#tasaFinanciamientoEdit').val() > 0 && $('#engancheEdit').val() > 0 && $('#plazoMaximoEdit').val() > 0){  
                var iduconfig = $('#iduConfig').val();
                var tasaFinanc = $('#tasaFinanciamientoEdit').val();
                var enganche = $('#engancheEdit').val();
                var plazoMaximo = $('#plazoMaximoEdit').val();
                var iopcion = 2;
                var iSwitch = 2;



                $.ajax({  
                    url: "./ajax/Proc_Configuracion.php",  
                    method:"POST",  
                    data:{iduconfig:iduconfig,tasaFinanc:tasaFinanc,enganche:enganche,plazoMaximo:plazoMaximo,iopcion:iopcion,iSwitch:iSwitch},  
                    success: function(success) {
                        console.log("success");
                        console.log(success);

                        if (success == "Configuracion no Existe"){
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
            }else{
                BootstrapDialog.show({
                    type: BootstrapDialog.TYPE_INFO, 
                    title: 'Exhibicion',
                    message: 'No se permiten esos valores. Intente Nuevamente',
                    buttons: [{
                        label: 'Close',
                        action: function(dialogRef){
                            dialogRef.close();
                        }
                    }]
                });
            }
        }else{
            BootstrapDialog.show({
                type: BootstrapDialog.TYPE_INFO, 
                title: 'Exhibicion',
                message: 'Agrege todos los Campos',
                buttons: [{
                    label: 'Close',
                    action: function(dialogRef){
                        dialogRef.close();
                    }
                }]
            });
        }

    });

    if (bRegresa === "true"){
        $('#confDeletUpda').removeClass('d-none');
        $('#confAdd').addClass('d-none');
        // $.cookie("bRegresa", null);

    }
    // console.log(bRegresa);

  


});



 