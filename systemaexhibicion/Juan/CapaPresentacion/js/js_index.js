$(document).ready(function(){
    dataArticulo();
    dataEmpleados();
    dataCentro();
    dataVenta()
});

function dataArticulo(){
    var iSwitch = 8; 
    var iopcion = 2;

    $.ajax({  
        url:"./ajax/Proc_Articulos.php",  
        method:"POST",  
        data:{iopcion:iopcion, iSwitch:iSwitch},  
        success:function(respuesta){  
            // console.log(respuesta);
            $('#dataArticulo').html(respuesta);  
            //selectEmp.prop('disabled', true)
        }  
    }); 
}

function dataEmpleados(){
    var iSwitch = 8; 
    var iopcion = 1;

    $.ajax({  
        url:"./ajax/Proc_Empleado.php",  
        method:"POST",  
        data:{iopcion:iopcion, iSwitch:iSwitch},  
        success:function(respuesta){  
            // console.log(respuesta);
            $('#dataEmpleado').html(respuesta);  
            //selectEmp.prop('disabled', true)
        }  
    }); 
}

function dataCentro(){
    var iSwitch = 8; 
    var iopcion = 4;

    $.ajax({  
        url:"./ajax/Proc_Centro.php",  
        method:"POST",  
        data:{iopcion:iopcion, iSwitch:iSwitch},  
        success:function(respuesta){  
            // console.log(respuesta);
            $('#dataCentro').html(respuesta);  
            //selectEmp.prop('disabled', true)
        }  
    }); 
}

function dataVenta(){
    var iSwitch = 9; 
    var iopcion = 3;

    $.ajax({  
        url:"./ajax/Proc_Venta.php",  
        method:"POST",  
        data:{iopcion:iopcion, iSwitch:iSwitch},  
        success:function(respuesta){  
            // console.log(respuesta);
            $('#dataVenta').html(respuesta);  
            //selectEmp.prop('disabled', true)
        }  
    }); 
}