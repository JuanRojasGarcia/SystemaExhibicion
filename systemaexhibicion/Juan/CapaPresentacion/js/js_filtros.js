$(document).ready(function () {
    $('#selectTipo').change(function(){
        if($(this).val() == 'optEmp'){ // or this.value == 'volvo'
            $('#resEmp').show();
            $('#resCen').hide(); 
            $('#restArt').hide();
            $('#resVen').hide(); 
            $('#jqxgrid').jqxGrid('clear');
            $('#jqxgrid').hide();
            $('#btnPdf').hide();            

        }else if($(this).val() == 'optCen'){ // or this.value == 'volvo'
            $('#resEmp').hide();
            $('#resCen').show(); 
            $('#restArt').hide();
            $('#resVen').hide(); 
            $('#jqxgrid').jqxGrid('clear');
            $('#jqxgrid').hide();
            $('#btnPdf').hide();

        }else if($(this).val() == 'optArt'){ // or this.value == 'volvo'
            $('#resEmp').hide();
            $('#resCen').hide(); 
            $('#restArt').show();
            $('#resVen').hide(); 
            $('#jqxgrid').jqxGrid('clear');
            $('#jqxgrid').hide();
            $('#btnPdf').hide();

          }else if($(this).val() == 'optVen'){ // or this.value == 'volvo'
            $('#resEmp').hide();
            $('#resCen').hide(); 
            $('#restArt').hide();
            $('#resVen').show();
            $('#jqxgrid').jqxGrid('clear');
            $('#jqxgrid').hide();
            $('#btnPdf').hide();

        }else if($(this).val() == 'optDefault'){ // or this.value == 'volvo'
            $('#resEmp').hide();
            $('#resCen').hide(); 
            $('#restArt').hide();
            $('#resVen').hide(); 
            $('#jqxgrid').jqxGrid('clear');
            $('#jqxgrid').hide();
            $('#btnPdf').hide();

        }
      });

      $('#btnGenerar').on('click', function(e) {   
       
        if($('#selectTipo').val() == "optEmp"){
          if ($('#inpnomEmp').val() != '' || $('#inpapellEmp').val() != ''){
            $('#jqxgrid').show();
            $('#btnPdf').show();

            var nomEmpleado = $('#inpnomEmp').val();
            var apellEmpleado = $('#inpapellEmp').val();
            var iSwitch = 5; 
            // console.log($('#inpnumCen').val());
    
            $.ajax({  
                url: "./ajax/Proc_Empleado.php",  
                method:"POST",  
                data:{nomEmpleado:nomEmpleado,apellEmpleado:apellEmpleado,iSwitch:iSwitch},  
                success: function(success) {
                    console.log("success");
                    console.log(success);   

                    // prepare the data
                    var source = {
                        localdata:success,
                        datatype:"json"
                      };
                    $("#jqxgrid").jqxGrid({
                        source: source,
                        theme: 'classic',
                        width: getWidth('Grid'),
                        pageable: true,
                        autorowheight: true,
                        autoheight: true,
                        autowidth:true,
                        altrows: true,
                        columns: [{ text: 'Numero Empleado', datafield: 'num_empleado', width: 150, cellsalign: 'center',  align: 'center' },
                                  { text: 'Centro', datafield: 'idu_centro', width: 100, cellsalign: 'center', align: 'center' },
                                  { text: 'Nombre', datafield: 'nombre_empleado', width: 150 , cellsalign: 'center', align: 'center'},
                                  { text: 'Apellido', datafield: 'apellido_empleado', width: 150 , cellsalign: 'center', align: 'center'},
                                  { text: 'Email', datafield: 'email_empleado', width: 170, cellsalign: 'center', align: 'center' },
                                  { text: '', dataField: 'buttonDelete', width: 100, columntype:'button', cellsrenderer: function () {
                                    return 'Eliminar';
                                    }, buttonclick: function (row, event) {

                                    var button = $(event.currentTarget);
                                    var grid = button.parents("[id^=jqxgrid]");
                                    // var GetRows = grid.jqxGrid('getrowdata', row);
                                    // var data =[];
                                    var nomEmpleado = grid.jqxGrid('getcelltext', row, "nombre_empleado");                                 
                                    var apellEmpleado = grid.jqxGrid('getcelltext', row, "apellido_empleado");                                 
                                    var numEmpleado = grid.jqxGrid('getcelltext', row, "num_empleado");                                 
                                    var iSwitch = 6;
                                    var iopcion = 3;

                                    var rowIndex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                                    var rowCount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;        
                                       

                                    BootstrapDialog.confirm({
                                      title: 'WARNING',
                                      message: 'Esta seguro que desea eliminar al Empleado "'+nomEmpleado+ " " +apellEmpleado+'" ?',
                                      type: BootstrapDialog.TYPE_WARNING, 
                                      closable: true, 
                                      draggable: true,
                                      btnCancelLabel: 'Cancelar', 
                                      btnOKLabel: 'Eliminar', 
                                      btnOKClass: 'btn-danger',
                                      class: 'modal-dialog-centered',
                                      callback: function(result) {
                                        if(result) {
                                          $.ajax({  
                                            url: "./ajax/Proc_Empleado.php",  
                                            method:"POST",  
                                            data:{numEmpleado:numEmpleado,iSwitch:iSwitch,iopcion:iopcion},  
                                            success: function(success) {
                                                console.log("success");
                                                console.log(success);
                                                
        
                                                
                                                if (success == " Se Elimino Correctamente"){
                                                  BootstrapDialog.show({
                                                    type: BootstrapDialog.TYPE_SUCCESS, 
                                                    title: 'Exhibicion',
                                                    message: success,
                                                    buttons: [{
                                                        label: 'Close',
                                                        action: function(dialogRef){
                                                            
                                                            dialogRef.close();
                                                            
                                                        }
                                                    }]
                                                  });
                                                // $('#jqxgrid').jqxGrid('deleterow', row);                                                
                                                
                                                  if (rowIndex >= 0 && rowIndex < rowCount) {
                                                    var id = $("#jqxgrid").jqxGrid('getrowid', rowIndex);
                                                    var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                                                  }

                                                }else{
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
                                        }                                        
                                      }
                                    });     
                                  }},
                                  { text: '', dataField: 'buttonUpdate', width: 100, columntype:'button', cellsrenderer: function () {
                                    return 'Actualizar';
                                    }, buttonclick: function (row, event) {
                                      var button = $(event.currentTarget);
                                      var grid = button.parents("[id^=jqxgrid]");
                                      // var getRowData = grid.jqxGrid('getrowdata', row);
                                      // console.log(getRowData);
                                      // var data =[];
  
                                      // var numEmpleado = grid.jqxGrid('getcelltext', row, "num_empleado");      
                                      
                                      var numEmpleado = grid.jqxGrid('getcelltext', row, "num_empleado");
                                      var iduCentro = grid.jqxGrid('getcelltext', row, "idu_centro");
                                      var nombre = grid.jqxGrid('getcelltext', row, "nombre_empleado");
                                      var apellido = grid.jqxGrid('getcelltext', row, "apellido_empleado");
                                      var email = grid.jqxGrid('getcelltext', row, "email_empleado");

                                      // console.log(getRowData,numEmpleado,iduCentro,nombre,apellido,email);
                                      BootstrapDialog.confirm({
                                        type: BootstrapDialog.TYPE_INFO, 
                                        title: 'Exhibicion',
                                        message: 'Numero Empleado: <input value="'+numEmpleado+'" type="number" id="numEmpleado" class="form-control" placeholder="Numero de Empleado" disabled="true">'+
                                                  " "+'Centro: <input value="'+iduCentro+'" name="iduCentro" type="text" id="iduCentro" class="form-control"  placeholder="Numero Centro">'+
                                                  " "+'Nombre: <input value="'+nombre+'"  name="nombreEmp" type="text" id="nombreEmp" class="form-control"  placeholder="Nombre Completo">'+
                                                  " "+'Apellido: <input value="'+apellido+'" name="apellidoEmp" type="text" id="apellidoEmp" class="form-control"  placeholder="Apellido Completo">'+
                                                  " "+'Correo: <input value="'+email+'" name="correoEmp" type="text" id="correoEmp" class="form-control"  placeholder="Correo Electronico">',
                                        closable: true, 
                                        draggable: true,
                                        btnCancelLabel: 'Cancelar', 
                                        btnOKLabel: 'Actualizar', 
                                        btnOKClass: 'btn-success',
                                        callback: function(result) {
                                          if(result) {        
                                            // var nombreTest = $('#nombreEmp').val();
                                            // console.log(nombreTest)
                                            var numEmpleadoVal = $('#numEmpleado').val();
                                            var iduCentroVal = $('#iduCentro').val();
                                            var nombreVal = $('#nombreEmp').val();
                                            var apellidoVal = $('#apellidoEmp').val();
                                            var emailVal = $('#correoEmp').val();
                                            var iSwitch = 2;
                                            var iopcion = 2; 
                                            // console.log(numEmpleadoVal,iduCentroVal,nombreVal,apellidoVal,emailVal);
                                   
                                            $.ajax({  
                                                url: "./ajax/Proc_Empleado.php",  
                                                method:"POST",  
                                                data:{numEmpleadoVal:numEmpleadoVal,iduCentroVal:iduCentroVal,nombreVal:nombreVal,apellidoVal:apellidoVal,emailVal:emailVal,iSwitch:iSwitch,iopcion:iopcion},  
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
                                          }
                                        }
                                      });
                                    }}]
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

            $("#inpnomEmp").val("");
            $("#inpapellEmp").val("");
          }else{
            BootstrapDialog.show({
              type: BootstrapDialog.TYPE_INFO,  
              title: 'Exhibicion',
              message: 'Agrege un Filtro',
              buttons: [{
                  label: 'Close',
                  action: function(dialogRef){
                      dialogRef.close();
                  }
              }]
            });
          }
        }else if ($('#selectTipo').val() == "optCen"){


          if ($('#inpnumCen').val() != '' || $('#inpnomCen').val() != ''){
            $('#jqxgrid').show();
            $('#btnPdf').show();

                var iduCentro = $('#inpnumCen').val();
                var nomCentro = $('#inpnomCen').val();
                var iSwitch = 5; 
                console.log($('#inpnumCen').val());
        
                $.ajax({  
                    url: "./ajax/Proc_Centro.php",  
                    method:"POST",  
                    data:{iduCentro:iduCentro,nomCentro:nomCentro,iSwitch:iSwitch},  
                    success: function(success) {
                        console.log("success");
                        console.log(success);   
        
                        // prepare the data
                        var source = {
                            localdata:success,
                            datatype:"json"
                          };
        
                        $("#jqxgrid").jqxGrid({
                            source: source,
                            theme: 'classic',
                            width: getWidth('Grid'),
                            pageable: true,
                            autorowheight: true,
                            autoheight: true,
                            autowidth:true,
                            altrows: true,
                            columns: [{ text: 'Numero Centro', datafield: 'idu_centro', width: 150, cellsalign: 'center', align: 'center' },
                                      { text: 'Nombre', datafield: 'nombre_centro', width: 200, cellsalign: 'center', align: 'center' },
                                      { text: '', dataField: 'buttonDelete', width: 100, columntype:'button', cellsrenderer: function () {
                                        return 'Eliminar';
                                        }, buttonclick: function (row, event) {
    
                                        var button = $(event.currentTarget);
                                        var grid = button.parents("[id^=jqxgrid]");
                                        // var GetRows = grid.jqxGrid('getrowdata', row);
                                        // var data =[];
    
                                        var iduCentro = grid.jqxGrid('getcelltext', row, "idu_centro");   
                                        var nombreCentro = grid.jqxGrid('getcelltext', row, "nombre_centro");                                 
                              
                                        var iSwitch = 6;
                                        var iopcion = 3;

                                        var rowIndex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                                        var rowCount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;        
                                                                
    
                                        BootstrapDialog.confirm({
                                          title: 'WARNING',
                                          message: 'Esta seguro que desea eliminar el Centro "'+nombreCentro+'"?',
                                          type: BootstrapDialog.TYPE_WARNING, 
                                          closable: true, 
                                          draggable: true,
                                          btnCancelLabel: 'Cancelar', 
                                          btnOKLabel: 'Eliminar', 
                                          btnOKClass: 'btn-danger',
                                          callback: function(result) {
                                            if(result) {
                                              $.ajax({  
                                                url: "./ajax/Proc_Centro.php",  
                                                method:"POST",  
                                                data:{iduCentro:iduCentro,iSwitch:iSwitch,iopcion:iopcion},  
                                                success: function(success) {
                                                    console.log("success");
                                                    console.log(success);
                                                    
            
                                                    
                                                    if (success == "Se Elimino Correctamente"){
                                                      BootstrapDialog.show({
                                                        type: BootstrapDialog.TYPE_SUCCESS, 
                                                        title: 'Exhibicion',
                                                        message: success,
                                                        buttons: [{
                                                            label: 'Close',
                                                            action: function(dialogRef){
                                                                
                                                                dialogRef.close();
                                                                
                                                            }
                                                        }]
                                                      });
                                                      // $('#jqxgrid').jqxGrid('deleterow', row);                                                
                                                    
                                                      if (rowIndex >= 0 && rowIndex < rowCount) {
                                                        var id = $("#jqxgrid").jqxGrid('getrowid', rowIndex);
                                                        var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                                                      }

                                                    }else{
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
                                            }                                        
                                          }
                                        });     
                                      }},
                                      { text: '', dataField: 'buttonUpdate', width: 100, columntype:'button', cellsrenderer: function () {
                                        return 'Actualizar';
                                        }, buttonclick: function (row, event) {
                                          var button = $(event.currentTarget);
                                          var grid = button.parents("[id^=jqxgrid]");
                                          // var getRowData = grid.jqxGrid('getrowdata', row);
                                          // console.log(getRowData);
                                          // var data =[];
      
                                          // var numEmpleado = grid.jqxGrid('getcelltext', row, "num_empleado");      
                                          
                                          var iduCentro = grid.jqxGrid('getcelltext', row, "idu_centro");
                                          var nomCentro = grid.jqxGrid('getcelltext', row, "nombre_centro");
    
                                          // console.log(getRowData,numEmpleado,iduCentro,nombre,apellido,email);
                                          BootstrapDialog.confirm({
                                            type: BootstrapDialog.TYPE_INFO, 
                                            title: 'Exhibicion',
                                            message: 'Numero Centro: <input value="'+iduCentro+'" name="numCentro" type="text" id="numCentro" class="form-control"  placeholder="Numero de Centro" disabled="true">'+
                                                      " "+'Nombre: <input value="'+nomCentro+'" name="nombreCentro" type="text" id="nombreCen" class="form-control"  placeholder="Nombre Centro">',
                                            closable: true, 
                                            draggable: true,
                                            btnCancelLabel: 'Cancelar', 
                                            btnOKLabel: 'Actualizar', 
                                            btnOKClass: 'btn-success',
                                            callback: function(result) {
                                              if(result) {        
                                                // var nombreTest = $('#nombreEmp').val();
                                                // console.log(nombreTest)
                                                var numCentroVal = $('#numCentro').val();
                                                var nomCentroVal = $('#nombreCen').val();
                          
                                                var iSwitch = 2;
                                                var iopcion = 2; 
                                                // console.log(numEmpleadoVal,iduCentroVal,nombreVal,apellidoVal,emailVal);
                                       
                                                $.ajax({  
                                                    url: "./ajax/Proc_Centro.php",  
                                                    method:"POST",  
                                                    data:{numCentroVal:numCentroVal,nomCentroVal:nomCentroVal,iSwitch:iSwitch,iopcion:iopcion},  
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
                                              }
                                            }
                                          });
                                        }}]
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
                

                $("#inpnumCen").val("");
                $("#inpnomCen").val("");
            }else{
              BootstrapDialog.show({
                type: BootstrapDialog.TYPE_INFO,  
                title: 'Exhibicion',
                message: 'Agrege un Filtro',
                buttons: [{
                    label: 'Close',
                    action: function(dialogRef){
                        dialogRef.close();
                    }
                }]
            });
            }
        }else if ($('#selectTipo').val() == "optArt"){ 


          if ($('#inpskuArt').val() != '' || $('#inpdesArt').val() != '' || $('#inpmodArt').val() != ''){
            $('#jqxgrid').show();
            $('#btnPdf').show();
  

          var skuArt = $('#inpskuArt').val();
          var descArt = $('#inpdesArt').val();
          var modelArt = $('#inpmodArt').val();

          var iSwitch = 5; 
          // console.log($('#inpnumCen').val());
  
          $.ajax({  
              url: "./ajax/Proc_Articulos.php",  
              method:"POST",  
              data:{skuArt:skuArt,descArt:descArt,modelArt:modelArt,iSwitch:iSwitch},  
              success: function(success) {
                  console.log("success");
                  console.log(success);   
  
                  // prepare the data
                  var source = {
                      localdata:success,
                      datatype:"json"
                  };
  
                  $("#jqxgrid").jqxGrid({
                      source: source,
                      theme: 'classic',
                      width: getWidth('Grid'),
                      pageable: true,
                      autorowheight: true,
                      autoheight: true,
                      autowidth:true,
                      altrows: true,
                      columns: [{ text: 'SKU', datafield: 'idu_articulo', width: 100, cellsalign: 'center', align: 'center' },
                                { text: 'Descripcion', datafield: 'descripcion', width: 150, cellsalign: 'center', align: 'center' },
                                { text: 'Modelo', datafield: 'modelo', width: 150, cellsalign: 'center', align: 'center' },
                                { text: 'Precio', datafield: 'precio', width: 100, cellsformat: 'c2', cellsalign: 'center', align: 'center' },
                                { text: 'Stock', datafield: 'existencia', width: 100, cellsalign: 'center', align: 'center' },
                                { text: '', dataField: 'buttonDelete', width: 100, columntype:'button', cellsrenderer: function () {
                                  return 'Eliminar';
                                  }, buttonclick: function (row, event) {

                                  var button = $(event.currentTarget);
                                  var grid = button.parents("[id^=jqxgrid]");
                                  // var GetRows = grid.jqxGrid('getrowdata', row);
                                  // var data =[];
                                  var descripcion = grid.jqxGrid('getcelltext', row, "descripcion");                                 
                                  var modelo = grid.jqxGrid('getcelltext', row, "modelo");                                 
                                  var skuArticulo = grid.jqxGrid('getcelltext', row, "idu_articulo");                                 
                                  var iSwitch = 6;
                                  var iopcion = 3;

                                  // console.log(deletRow);
                                  var rowIndex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                                  var rowCount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;

                                  // console.log(rowIndex);
                                  // console.log(rowCount);
 

                                  BootstrapDialog.confirm({
                                    title: 'WARNING',
                                    message: 'Esta seguro que desea eliminar el Articulo "'+descripcion+ " " +modelo+'" ?',
                                    type: BootstrapDialog.TYPE_WARNING, 
                                    closable: true, 
                                    draggable: true,
                                    btnCancelLabel: 'Cancelar', 
                                    btnOKLabel: 'Eliminar', 
                                    btnOKClass: 'btn-danger',
                                    class: 'modal-dialog-centered',
                                    callback: function(result) {
                                      if(result) {
                                        $.ajax({  
                                          url: "./ajax/Proc_Articulos.php",  
                                          method:"POST",  
                                          data:{skuArticulo:skuArticulo,iSwitch:iSwitch,iopcion:iopcion},  
                                          success: function(success) {
                                              console.log("success");
                                              console.log(success);
                                              
      
                                              
                                              if (success == "Se Elimino Correctamente"){
                                                BootstrapDialog.show({
                                                  type: BootstrapDialog.TYPE_SUCCESS, 
                                                  title: 'Exhibicion',
                                                  message: success,
                                                  buttons: [{
                                                      label: 'Close',
                                                      action: function(dialogRef){
                                                          
                                                          dialogRef.close();
                                                          
                                                      }
                                                  }]
                                                });
                                                // $('#jqxgrid').jqxGrid('deleterow', row);
                                                // console.log(deletRow);
                                                if (rowIndex >= 0 && rowIndex < rowCount) {
                                                  var id = $("#jqxgrid").jqxGrid('getrowid', rowIndex);
                                                  var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                                                }


                                              
                                              }else{
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
                                      }                                        
                                    }
                                  });     
                                }},
                                { text: '', dataField: 'buttonUpdate', width: 100, columntype:'button', cellsrenderer: function () {
                                  return 'Actualizar';
                                  }, buttonclick: function (row, event) {
                                    var button = $(event.currentTarget);
                                    var grid = button.parents("[id^=jqxgrid]");
                                    // var getRowData = grid.jqxGrid('getrowdata', row);
                                    // console.log(getRowData);
                                    // var data =[];

                                    // var numEmpleado = grid.jqxGrid('getcelltext', row, "num_empleado");      
                                    
                                    var skuArticulo = grid.jqxGrid('getcelltext', row, "idu_articulo");
                                    var descripcion = grid.jqxGrid('getcelltext', row, "descripcion");
                                    var modelo = grid.jqxGrid('getcelltext', row, "modelo");
                                    var precio = grid.jqxGrid('getcelltext', row, "precio");
                                    var existencia = grid.jqxGrid('getcelltext', row, "existencia");

                                    // console.log(getRowData,numEmpleado,iduCentro,nombre,apellido,email);
                                    BootstrapDialog.confirm({
                                      type: BootstrapDialog.TYPE_INFO, 
                                      title: 'Exhibicion',
                                      message: 'Sku: <input value="'+skuArticulo+'" name="iduArticulo" type="text" id="iduArticuloEdit" class="form-control"  placeholder="Idu Articulo" disabled="true">'+
                                                " "+'Descripcion: <input value="'+descripcion+'" name="descripcion" type="text" id="descripcionEdit" class="form-control"  placeholder="Descripcion">'+
                                                " "+'Modelo: <input value="'+modelo+'"  name="modelo" type="text" id="modeloEdit" class="form-control"  placeholder="Modelo">'+
                                                " "+'Precio: <input value="'+precio+'" name="precio" type="text" id="precioEdit" class="form-control"  placeholder="Precio">'+
                                                " "+'Existencia: <input value="'+existencia+'" name="existencia" type="number" id="existenciaEdit" class="form-control"  placeholder="Existencia">',
                                      closable: true, 
                                      draggable: true,
                                      btnCancelLabel: 'Cancelar',  
                                      btnOKLabel: 'Actualizar', 
                                      btnOKClass: 'btn-success',
                                      callback: function(result) {
                                        if(result) {        
                                          // var nombreTest = $('#nombreEmp').val();
                                          // console.log(nombreTest)
                                          var skuVal = $('#iduArticuloEdit').val();
                                          var descripcionVal = $('#descripcionEdit').val();
                                          var modeloVal = $('#modeloEdit').val();
                                          var precioVal = $('#precioEdit').val();
                                          var existenciaVal = $('#existenciaEdit').val();
                                          var iSwitch = 2;
                                          var iopcion = 2; 
                                          // console.log(numEmpleadoVal,iduCentroVal,nombreVal,apellidoVal,emailVal);
                                 
                                          $.ajax({  
                                              url: "./ajax/Proc_Articulos.php",  
                                              method:"POST",  
                                              data:{skuVal:skuVal,descripcionVal:descripcionVal,modeloVal:modeloVal,precioVal:precioVal,existenciaVal:existenciaVal,iSwitch:iSwitch,iopcion:iopcion},  
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
                                        }
                                      }
                                    });
                                  }}]
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
          $('#inpskuArt').val('');
          $('#inpdesArt').val('');
          $('#inpmodArt').val('');
        }else{

          BootstrapDialog.show({
            type: BootstrapDialog.TYPE_INFO,  
            title: 'Exhibicion',
            message: 'Agrege un Filtro',
            buttons: [{
                label: 'Close',
                action: function(dialogRef){
                    dialogRef.close();
                }
            }]
        });

        }
        }else if ($('#selectTipo').val() == "optVen"){
          $('#btnPdf').show();
          $('#jqxgrid').show();


          var nomEmpleado = $('#inpnomVen').val();
          var apellEmpleado = $('#inpapellVen').val();
          var fechaIni = $('#inpfecVen').val();
          var fechaFin = $('#inpfecFinVen').val();

          console.log(fechaIni);
          console.log(fechaFin);


          var iSwitch = 5; 
          console.log( $('#inpfecFinVen').val());
  
          $.ajax({  
              url: "./ajax/Proc_Venta.php",  
              method:"POST",  
              data:{nomEmpleado:nomEmpleado,apellEmpleado:apellEmpleado,fechaIni:fechaIni,fechaFin:fechaFin,iSwitch:iSwitch},  
              success: function(success) {
                  console.log("success");
                  console.log(success);   

                    var source = {
                      localdata:success,
                      datatype:"json"
                    };
                  

                  $("#jqxgrid").jqxGrid({
                    source: source,
                    theme: 'classic',
                    width: getWidth('Grid'),
                    pageable: true,
                    autorowheight: true,
                    autoheight: true,
                    autowidth:true,
                    altrows: true,
                    columns: [{ text: 'Folio', datafield: 'idu_venta', width: 100, cellsalign: 'center', align: 'center' },
                              { text: 'Numero Empleado', datafield: 'num_empleado', width: 150, cellsalign: 'center', align: 'center' },
                              { text: 'Nombre', datafield: 'nombre_empleado', width: 150, cellsalign: 'center', align: 'center' },
                              { text: 'Apellido', datafield: 'apellido_empleado', width: 150, cellsalign: 'center', align: 'center' },
                              { text: 'Total', datafield: 'total', width: 100, cellsformat: 'c2', cellsalign: 'center', align: 'center'},
                              { text: 'Fecha', datafield: 'fecha', width: 100, cellsalign: 'center', align: 'center' },
                              { text: '', dataField: 'buttonDelete', width: 100, columntype:'button', cellsrenderer: function () {
                                return 'Eliminar';
                                }, buttonclick: function (row, event) {

                                var button = $(event.currentTarget);
                                var grid = button.parents("[id^=jqxgrid]");
                                // var GetRows = grid.jqxGrid('getrowdata', row);
                                // var data =[];
                                var folio = grid.jqxGrid('getcelltext', row, "idu_venta"); 
                                var iSwitch = 8;
                                var iopcion = 3;

                                var rowIndex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                                var rowCount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;                              

                                BootstrapDialog.confirm({
                                  title: 'WARNING',
                                  message: 'Esta seguro que desea eliminar el Folio "'+folio+'" ?',
                                  type: BootstrapDialog.TYPE_WARNING, 
                                  closable: true, 
                                  draggable: true,
                                  btnCancelLabel: 'Cancelar', 
                                  btnOKLabel: 'Eliminar', 
                                  btnOKClass: 'btn-danger',
                                  class: 'modal-dialog-centered',
                                  callback: function(result) {
                                    if(result) {
                                      $.ajax({  
                                        url: "./ajax/Proc_Venta.php",  
                                        method:"POST",  
                                        data:{folio:folio,iSwitch:iSwitch,iopcion:iopcion},  
                                        success: function(success) {
                                            console.log("success");
                                            console.log(success);

                                            if (success == "\r\nSe Elimino Correctamente\r\n\r\n\r\n\r\n\r\n\r\n\r\n"){
                                              BootstrapDialog.show({
                                                type: BootstrapDialog.TYPE_SUCCESS, 
                                                title: 'Exhibicion',
                                                message: success,
                                                buttons: [{
                                                    label: 'Close',
                                                    action: function(dialogRef){
                                                        
                                                        dialogRef.close();
                                                        
                                                    }
                                                }]
                                              });

                                              // $('#jqxgrid').jqxGrid('deleterow', row);                                             
                                              if (rowIndex >= 0 && rowIndex < rowCount) {
                                                var id = $("#jqxgrid").jqxGrid('getrowid', rowIndex);
                                                var commit = $("#jqxgrid").jqxGrid('deleterow', id);
                                              }

                                            }else{
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
                                    }                                        
                                  }
                                });     
                              }},
                              { text: '', dataField: 'buttonUpdate', width: 100, columntype:'button', cellsrenderer: function () {
                                return 'Actualizar';
                                }, buttonclick: function (row, event) {
                                  var button = $(event.currentTarget);
                                  var grid = button.parents("[id^=jqxgrid]");
                                  // var getRowData = grid.jqxGrid('getrowdata', row);
                                  // console.log(getRowData);
                                  // var data =[];

                                  // var numEmpleado = grid.jqxGrid('getcelltext', row, "num_empleado");      
                                  
                                  var folio = grid.jqxGrid('getcelltext', row, "idu_venta");   
                                  var numEmpleado = grid.jqxGrid('getcelltext', row, "num_empleado");                                                                 
                                  var nomEmpleado = grid.jqxGrid('getcelltext', row, "nombre_empleado");                                                                 
                                  var apellEmpleado = grid.jqxGrid('getcelltext', row, "apellido_empleado");                                                                 
                                  var total = grid.jqxGrid('getcelltext', row, "total");                                                                 
                                  var fecha = grid.jqxGrid('getcelltext', row, "fecha"); 

                                  // console.log(getRowData,numEmpleado,iduCentro,nombre,apellido,email);
                                  BootstrapDialog.confirm({
                                    type: BootstrapDialog.TYPE_INFO, 
                                    title: 'Exhibicion',
                                    message: 'Folio: <input value="'+folio+'" type="number" id="folioVenta" class="form-control" placeholder="Folio" disabled="true">'+
                                              " "+'Num. Empleado: <input value="'+numEmpleado+'" name="numEmpleado" type="text" id="numEmpleado" class="form-control"  placeholder="Numero Empleado">'+
                                              " "+'Nombre : <input value="'+nomEmpleado+'"  name="nomEmpleado" type="text" id="nomEmpleado" class="form-control"  placeholder="Nombre Completo"  disabled="true">'+
                                              " "+'Apellido : <input value="'+apellEmpleado+'" name="apellEmpleado" type="text" id="apellEmpleado" class="form-control"  placeholder="Apellido Completo"  disabled="true">'+
                                              " "+'Total: <input value="'+total+'" name="totalVenta" type="text" id="totalVenta" class="form-control"  placeholder="Total"  disabled="true">'+
                                              " "+'Fecha: <input value="'+fecha+'" name="fecha" type="date" id="fecha" class="form-control"  placeholder="Fecha">',
                                    closable: true, 
                                    draggable: true,
                                    btnCancelLabel: 'Cancelar', 
                                    btnOKLabel: 'Actualizar', 
                                    btnOKClass: 'btn-success',
                                    callback: function(result) {
                                      if(result) {        
                                        // var nombreTest = $('#nombreEmp').val();
                                        // console.log(nombreTest)
                                        var folioVal = $('#folioVenta').val();
                                        var numEmpleadoVal = $('#numEmpleado').val();
                                        var nomEmpleadoVal = $('#nomEmpleado').val();
                                        var apellEmpleadoVal = $('#apellEmpleado').val();
                                        var totalVal = $('#totalVenta').val();
                                        var fechaVal = $('#fecha').val();
                                        var iSwitch = 2;
                                        var iopcion = 2; 
                                        // console.log(numEmpleadoVal,iduCentroVal,nombreVal,apellidoVal,emailVal);
                               
                                        $.ajax({  
                                            url: "./ajax/Proc_Venta.php",  
                                            method:"POST",  
                                            data:{folioVal:folioVal,numEmpleadoVal:numEmpleadoVal,nomEmpleadoVal:nomEmpleadoVal,apellEmpleadoVal:apellEmpleadoVal,totalVal:totalVal,fechaVal:fechaVal,iSwitch:iSwitch,iopcion:iopcion},  
                                            success: function(success) {
                                                console.log("success");
                                                console.log(success);
                                                
        
                                                
                                                if (success == "\r\nFolio Venta no Existe\r\n\r\n\r\n\r\n\r\n\r\n\r\n"){
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
                                      }
                                    }
                                  });
                                }}]
                  });

                  
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
          $('#inpnomVen').val('');
          $('#inpapellVen').val('');
        }else{
          $('#jqxgrid').hide();
          $('#btnPdf').hide();

          BootstrapDialog.show({
            type: BootstrapDialog.TYPE_INFO,  
            title: 'Exhibicion',
            message: 'Seleccione Una Consulta',
            buttons: [{
                label: 'Close',
                action: function(dialogRef){
                    dialogRef.close();
                }
            }]
        });
        }
      });

    $("#btnPdf").on('click', function(){

      if($('#selectTipo').val() == "optEmp"){

        var pdf = new jsPDF();
        pdf.text(80,20,"Reporte Empleados");

        var columns =["Numero Empleado","Centro","Nombre","Apellido","Email"];
        var GetRows = $('#jqxgrid').jqxGrid('getrows');
        var data =[];
        for(var i = 0; i < GetRows.length; i++){
          var datos =[$('#jqxgrid').jqxGrid('getcelltext', i, "num_empleado"),
                      $('#jqxgrid').jqxGrid('getcelltext', i, "idu_centro"),
                      $('#jqxgrid').jqxGrid('getcelltext', i, "nombre_empleado"),
                      $('#jqxgrid').jqxGrid('getcelltext', i, "apellido_empleado"),
                      $('#jqxgrid').jqxGrid('getcelltext', i, "email_empleado")];

          data.push(datos);
        }
        pdf.autoTable(
          columns,
          data,
          {
          margin:{top:25},
          headerStyles:{fillColor: [79,73,72],
          halign: 'center'
          },
          bodyStyles:{ 
            halign: 'center'
          }
        });
        pdf.save('ReporteEmpleados.pdf')

    }else if ($('#selectTipo').val() == "optCen"){
        var pdf = new jsPDF();
        pdf.text(80,20,"Reporte Centros");

        var columns =["Numero Centro","Nombre"];
        var GetRows = $('#jqxgrid').jqxGrid('getrows');
 
        var data =[];
        for(var i = 0; i< GetRows.length; i++){
          var datos =[$('#jqxgrid').jqxGrid('getcelltext', i, "idu_centro"),
                      $('#jqxgrid').jqxGrid('getcelltext', i, "nombre_centro")];

          data.push(datos);
        }
        pdf.autoTable(
          columns,
          data,
          {
          margin:{top:25},
          headerStyles:{fillColor: [79,73,72],
          halign: 'center'
          },
          bodyStyles:{ 
            halign: 'center'
          }
        });
        pdf.save('ReporteCentros.pdf')

    }else if ($('#selectTipo').val() == "optArt"){ 
      var pdf = new jsPDF();
      pdf.text(80,20,"Reporte Articulos");

      var columns =["Sku","Descripcion","Modelo","Precio","Existencia"];
      var GetRows = $('#jqxgrid').jqxGrid('getrows');

      var data =[];
      for(var i = 0; i< GetRows.length; i++){
        var datos =[$('#jqxgrid').jqxGrid('getcelltext', i, "idu_articulo"),
                    $('#jqxgrid').jqxGrid('getcelltext', i, "descripcion"),
                    $('#jqxgrid').jqxGrid('getcelltext', i, "modelo"),
                    $('#jqxgrid').jqxGrid('getcelltext', i, "precio"),
                    $('#jqxgrid').jqxGrid('getcelltext', i, "existencia")];
        data.push(datos);
      }
      pdf.autoTable(
        columns,
        data,
        {
        margin:{top:25},
        headerStyles:{fillColor: [79,73,72],
        halign: 'center'
        },
        bodyStyles:{ 
          halign: 'center'
        }
      });
      pdf.save('ReporteArticulos.pdf');
    }else if ($('#selectTipo').val() == "optVen"){
      var pdf = new jsPDF();
      pdf.setFontType("bold");

      pdf.text(73,30,$('#inpfecVen').val()); 
      pdf.text(113,30,$('#inpfecFinVen').val()); 

      pdf.setFontType("normal");

      pdf.text(83,20,"Reporte Ventas");
      pdf.text(60,30," Del "); 
      pdf.text(103,30," Al "); 

      var columns =["Folio","Numero Empleado","Nombre","Apellido","Total","Fecha"];
      var GetRows = $('#jqxgrid').jqxGrid('getrows');

      var data =[];
      for(var i = 0; i< GetRows.length; i++){
        var datos =[$('#jqxgrid').jqxGrid('getcelltext', i, "idu_venta"),
                    $('#jqxgrid').jqxGrid('getcelltext', i, "num_empleado"),
                    $('#jqxgrid').jqxGrid('getcelltext', i, "nombre_empleado"),
                    $('#jqxgrid').jqxGrid('getcelltext', i, "apellido_empleado"),
                    $('#jqxgrid').jqxGrid('getcelltext', i, "total"),
                    $('#jqxgrid').jqxGrid('getcelltext', i, "fecha")];
        data.push(datos);
      }
      pdf.autoTable(
        columns,
        data,
        {
        margin:{top:35},
        headerStyles:{fillColor: [79,73,72],
        halign: 'center'
        },
        bodyStyles:{ 
          halign: 'center'
        }
      });
      pdf.save('ReporteVentas.pdf');
    }else{
      var pdf = new jsPDF();
      pdf.text(20,20,"No DATA");
      pdf.save('NoData.pdf');
    }
    });
});



 