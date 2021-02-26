$(document).ready(function(){      
    var centrosEmp = '';


    $('#btnCentros').on('click', function(e) {
        $('#formCentros').show();
        $('#formArticulos').hide();
        $('#formEmpleados').hide();

        // values Articulos
        $('#descripcion').val('');
        $('#modelo').val('');
        $('#precio').val('');
        $('#existencia').val('');

        // values Empleados
        $('#numEmpleado').val('');
        $('#centrosEmp').val();
        $('#nombreEmp').val('');
        $('#apellidoEmp').val('');
        $('#correoEmp').val('');

    });

    $('#btnEmpleados').on('click', function(e) {
        $('#formEmpleados').show();
        $('#formCentros').hide();
        $('#formArticulos').hide();

        // values centro
        $('#numCentro').val('');
        $('#nombreCen').val('');

        // values Articulos
        $('#descripcion').val('');
        $('#modelo').val('');
        $('#precio').val('');
        $('#existencia').val('');

    });

    $('#btnArticulos').on('click', function(e) {
        $('#formArticulos').show();
        $('#formCentros').hide();
        $('#formEmpleados').hide();

        // values
        $('#numCentro').val('');
        $('#nombreCen').val('');

        // values Empleados
        $('#numEmpleado').val('');
        $('#centrosEmp').val('');
        $('#nombreEmp').val('');
        $('#apellidoEmp').val('');
        $('#correoEmp').val('');


    });


    // Articulos

    $('#saveArticulo').on('click', function(e) {     
        if ($('#descripcion').val() != '' && $('#modelo').val() != '' && $('#precio').val() != '' && $('#existencia').val() != ''){     
 
            var descripcion = $('#descripcion').val();
            var modelo = $('#modelo').val();
            var precio = $('#precio').val();
            var existencia = $('#existencia').val();
            var iopcion = 1;
            var iSwitch = 1; 

            $.ajax({  
                url: "./ajax/Proc_Articulos.php",  
                method:"POST",  
                data:{descripcion:descripcion,modelo:modelo,precio:precio,existencia:existencia,iopcion:iopcion,iSwitch:iSwitch},  
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
                                window.location="altas.php";
                                dialogRef.close();
                            }
                        }]
                    });


                    // $("#getCode").html(success);
                    // $("#myModal").modal('show');

                    // $('#cancelModal').on('click', function(e) {   
                    //     location.href = '../CapaPresentacion/altas.php';
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

    $('#saveEditar').on('click', function(e) {   
        var iduArticulo = $('#iduArticuloEdit').val();
        var descripcion = $('#descripcionEdit').val();
        var modelo = $('#modeloEdit').val();
        var precio = $('#precioEdit').val();
        var existencia = $('#existenciaEdit').val();
        var iopcion = 2;
        var iSwitch = 2;

        $.ajax({  
            url: "./ajax/Proc_Articulos.php",  
            method:"POST",  
            data:{iduArticulo:iduArticulo,descripcion:descripcion,modelo:modelo,precio:precio,existencia:existencia,iopcion:iopcion,iSwitch:iSwitch},  
            success: function(success) {
                console.log("success");
                console.log(success);

                if (success == "El Codigo no Existe"){
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
                                window.location="tableData.php";
                                dialogRef.close();
                            }
                        }]
                    });
                }

                                
                // $("#getCode").html(success);
                // $("#myModal").modal('show');

                // $('#cancelModal').on('click', function(e) {   
                //     location.href = '../CapaPresentacion/tableData.php';
                // });
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

    // Centros

    $('#saveCentro').on('click', function(e) {    
        if ($('#numCentro').val() != '' && $('#nombreCen').val() != ''){     

            var iduCentro = $('#numCentro').val();
            var nomCentro = $('#nombreCen').val();
            var iopcion = 1;
            var iSwitch = 1;

            $.ajax({  
                url: "./ajax/Proc_Centro.php",  
                method:"POST", 
                data:{iduCentro: iduCentro, nomCentro:nomCentro, iopcion:iopcion, iSwitch:iSwitch},  
                success: function(respuesta) {
                    console.log("success");
                    console.log(respuesta);

                    if (respuesta == "Codigo Existente"){
                        BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_DANGER,  
                            title: 'Exhibicion',
                            message: respuesta,
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
                            message: respuesta,
                            buttons: [{
                                label: 'Close',
                                action: function(dialogRef){
                                    window.location="altas.php";
                                    dialogRef.close();
                                }
                            }]
                        });
                    }





                    // $("#getCode").html(respuesta);
                    // $("#myModal").modal('show');


                    // $('#cancelModal').on('click', function(e) {   
                    //     location.href = '../CapaPresentacion/altas.php';
                        
                    // });
                    
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

    
    $('#editarCentro').on('click', function(e) {   
        var iduCentro = $('#numCentro').val();
        var nomCentro = $('#nombreCen').val();
        var iopcion = 2;
        var iSwitch = 2;

        $.ajax({  
            url: "./ajax/Proc_Centro.php",  
            method:"POST",  
            data:{iduCentro:iduCentro,nomCentro:nomCentro,iopcion:iopcion,iSwitch:iSwitch},  
            success: function(success) {
                console.log("success");
                console.log(success);

                if (success == "El Codigo no Existe"){
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
                                window.location="tableData.php";
                                dialogRef.close();
                            }
                        }]
                    });
                }

                                                
                // $("#getCode").html(success);
                // $("#myModal").modal('show');

                // $('#cancelModal').on('click', function(e) {   
                //     location.href = '../CapaPresentacion/tableData.php';
                // });
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

    // Empelado

    $('#saveEmpleado').on('click', function(e) {   
        if ($('#numEmpleado').val() != '' && $('#centrosEmp').val() != '' && $('#nombreEmp').val() != '' && $('#apellidoEmp').val() != '' && $('#correoEmp').val() != ''){     
            var numEmpleado = $('#numEmpleado').val();
            var iduCentro = $('#centrosEmp').val();
            var nombre = $('#nombreEmp').val();
            var apellido = $('#apellidoEmp').val();
            var email = $('#correoEmp').val();
            var iopcion = 1;
            var iSwitch = 1;


            $.ajax({  
                url: "./ajax/Proc_Empleado.php",  
                method:"POST",  
                data:{numEmpleado:numEmpleado, iduCentro:iduCentro, nombre:nombre, apellido:apellido, email:email, iopcion:iopcion, iSwitch:iSwitch},  
                success: function(success) {
                    console.log("success");
                    console.log(success);

                    if (success == " Numero Empelado Existente"){
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
                                    window.location="altas.php";
                                    dialogRef.close();
                                }
                            }]
                        });
                    }

                    // $("#getCode").html(success);
                    // $("#myModal").modal('show');

                    // $('#cancelModal').on('click', function(e) {   
                    //         location.href = '../CapaPresentacion/altas.php';

                    // });
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

    $('#editarEmpleado').on('click', function(e) {        
        var numEmpleado = $('#numEmpleado').val();
        var iduCentro = $('#centrosEmp').val();
        var nombre = $('#nombreEmp').val();
        var apellido = $('#apellidoEmp').val();
        var email = $('#correoEmp').val();
        var iopcion = 2;
        var iSwitch = 2;

        $.ajax({  
            url: "./ajax/Proc_Empleado.php",  
            method:"POST",  
            data:{numEmpleado:numEmpleado, iduCentro:iduCentro, nombre:nombre, apellido:apellido, email:email, iopcion:iopcion, iSwitch:iSwitch},  
            success: function(success) {
                console.log("success");
                console.log(success);

                if (success == " Numero Empleado no Existe"){
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
                                window.location="tableData.php";
                                dialogRef.close();
                            }
                        }]
                    });
                }

                                                
                // $("#getCode").html(success);
                // $("#myModal").modal('show');

                // $('#cancelModal').on('click', function(e) {   
                //     location.href = '../CapaPresentacion/tableData.php';
                // });
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

    var getAllCentrosiSwitch = "iSwitch=7";
    centrosEmp = $("#centrosEmp").kendoDropDownList({
        autoBind: false,
        cascadeFrom: "Centros",
        optionLabel: {  nombre_centro: "Selecione un Centro...",
                        idu_centro: -1
                     },
        dataTextField: "nombre_centro",
        dataValueField: "idu_centro",
        dataSource: {
            type: "json",
            serverFiltering: true,
            transport: {
                read: {
                    type: "GET",
                        url: function(){
                            return "./ajax/Proc_Centro.php?"+getAllCentrosiSwitch
                        },
                    dataType: "json",
                    cache: false
                }
            }
        }
    }).data("kendoDropDownList");



});



