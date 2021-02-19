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
                                { text: 'Email', datafield: 'email_empleado', width: 170, cellsalign: 'center', align: 'center' }]
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
                                      { text: 'Nombre', datafield: 'nombre_centro', width: 200, cellsalign: 'center', align: 'center' }]
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
                                { text: 'Stock', datafield: 'existencia', width: 100, cellsalign: 'center', align: 'center' }]
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
                              { text: 'Fecha', datafield: 'fecha', width: 100, cellsalign: 'center', align: 'center' }]
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



 