$(document).ready(function(){      

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
        $('#iduCentro').val('');
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
        $('#iduCentro').val('');
        $('#nombreEmp').val('');
        $('#apellidoEmp').val('');
        $('#correoEmp').val('');


    });

    // Articulos

    $('#saveArticulo').on('click', function(e) {        
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
            succes: function(sucess) {
                console.log("success");
                console.log(sucess);
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
            succes: function(sucess) {
                console.log("success");
                console.log(sucess);
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
        var iduCentro = $('#numCentro').val();
        var nomCentro = $('#nombreCen').val();
        var iopcion = 1;
        var iSwitch = 1;



        $.ajax({  
            url: "./ajax/Proc_Centro.php",  
            method:"POST", 
            data:{iduCentro: iduCentro, nomCentro:nomCentro, iopcion:iopcion, iSwitch:iSwitch},  
            succes: function(respuesta) {
                console.log("success");
                console.log(respuesta);
                
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

    
    $('#editarCentro').on('click', function(e) {   
        var iduCentro = $('#numCentro').val();
        var nomCentro = $('#nombreCen').val();
        var iopcion = 2;
        var iSwitch = 2;

        $.ajax({  
            url: "./ajax/Proc_Centro.php",  
            method:"POST",  
            data:{iduCentro:iduCentro,nomCentro:nomCentro,iopcion:iopcion,iSwitch:iSwitch},  
            succes: function(sucess) {
                console.log("success");
                console.log(sucess);
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
        var numEmpleado = $('#numEmpleado').val();
        var iduCentro = $('#iduCentro').val();
        var nombre = $('#nombreEmp').val();
        var apellido = $('#apellidoEmp').val();
        var email = $('#correoEmp').val();
        var iopcion = 1;
        var iSwitch = 1;

        $.ajax({  
            url: "./ajax/Proc_Empleado.php",  
            method:"POST",  
            data:{numEmpleado:numEmpleado, iduCentro:iduCentro, nombre:nombre, apellido:apellido, email:email, iopcion:iopcion, iSwitch:iSwitch},  
            succes: function(sucess) {
                console.log("success");
                console.log(sucess);
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

    $('#editarEmpleado').on('click', function(e) {        
        var numEmpleado = $('#numEmpleado').val();
        var iduCentro = $('#iduCentro').val();
        var nombre = $('#nombreEmp').val();
        var apellido = $('#apellidoEmp').val();
        var email = $('#correoEmp').val();
        var iopcion = 2;
        var iSwitch = 2;

        $.ajax({  
            url: "./ajax/Proc_Empleado.php",  
            method:"POST",  
            data:{numEmpleado:numEmpleado, iduCentro:iduCentro, nombre:nombre, apellido:apellido, email:email, iopcion:iopcion, iSwitch:iSwitch},  
            succes: function(sucess) {
                console.log("success");
                console.log(sucess);
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

