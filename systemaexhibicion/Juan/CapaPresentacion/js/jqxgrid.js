$(document).ready(function () {
    // // prepare the data
    // var data = new Array();
    // var firstNames =
    // [
    //     "Andrew", "Nancy", "Shelley", "Regina", "Yoshi", "Antoni", "Mayumi", "Ian", "Peter", "Lars", "Petra", "Martin", "Sven", "Elio", "Beate", "Cheryl", "Michael", "Guylene"
    // ];
    // var lastNames =
    // [
    //     "Fuller", "Davolio", "Burke", "Murphy", "Nagase", "Saavedra", "Ohno", "Devling", "Wilson", "Peterson", "Winkler", "Bein", "Petersen", "Rossi", "Vileid", "Saylor", "Bjorn", "Nodier"
    // ];
    // var productNames =
    // [
    //     "Black Tea", "Green Tea", "Caffe Espresso", "Doubleshot Espresso", "Caffe Latte", "White Chocolate Mocha", "Cramel Latte", "Caffe Americano", "Cappuccino", "Espresso Truffle", "Espresso con Panna", "Peppermint Mocha Twist"
    // ];
    // var priceValues =
    // [
    //     "2.25", "1.5", "3.0", "3.3", "4.5", "3.6", "3.8", "2.5", "5.0", "1.75", "3.25", "4.0"
    // ];
    // for (var i = 0; i < 100; i++) {
    //     var row = {};
    //     var productindex = Math.floor(Math.random() * productNames.length);
    //     var price = parseFloat(priceValues[productindex]);
    //     var quantity = 1 + Math.round(Math.random() * 10);
    //     row["firstname"] = firstNames[Math.floor(Math.random() * firstNames.length)];
    //     row["lastname"] = lastNames[Math.floor(Math.random() * lastNames.length)];
    //     row["productname"] = productNames[productindex];
    //     row["price"] = price;
    //     row["quantity"] = quantity;
    //     row["total"] = price * quantity;
    //     data[i] = row;
    // }
    // var source =
    // {
    //     localdata: data,
    //     datatype: "array"
    // };
    // var dataAdapter = new $.jqx.dataAdapter(source, {
    //     loadComplete: function (data) { },
    //     loadError: function (xhr, status, error) { }      
    // });
    // $("#jqxgrid").jqxGrid(
    // {
    //     source: dataAdapter,
    //     columns: [
    //       { text: 'First Name', datafield: 'firstname', width: 100 },
    //       { text: 'Last Name', datafield: 'lastname', width: 100 },
    //       { text: 'Product', datafield: 'productname', width: 180 },
    //       { text: 'Quantity', datafield: 'quantity', width: 80, cellsalign: 'right' },
    //       { text: 'Unit Price', datafield: 'price', width: 90, cellsalign: 'right', cellsformat: 'c2' },
    //       { text: 'Total', datafield: 'total', width: 100, cellsalign: 'right', cellsformat: 'c2' }
    //     ]
    // });
    // $("#pdfExport").jqxButton();
    // $("#pdfExport").click(function () {
    //     $("#jqxgrid").jqxGrid('exportdata', 'pdf', 'jqxGrid');
    // });

    $('#selectTipo').change(function(){
        if($(this).val() == 'optEmp'){ // or this.value == 'volvo'
            $('#resEmp').show();
            $('#resCen').hide(); 
            $('#restArt').hide();
            $('#resVen').hide(); 

        }else if($(this).val() == 'optCen'){ // or this.value == 'volvo'
            $('#resEmp').hide();
            $('#resCen').show(); 
            $('#restArt').hide();
            $('#resVen').hide(); 

        }else if($(this).val() == 'optArt'){ // or this.value == 'volvo'
            $('#resEmp').hide();
            $('#resCen').hide(); 
            $('#restArt').show();
            $('#resVen').hide(); 

        }else if($(this).val() == 'optVen'){ // or this.value == 'volvo'
            $('#resEmp').hide();
            $('#resCen').hide(); 
            $('#restArt').hide();
            $('#resVen').show();

        }else if($(this).val() == 'optDefault'){ // or this.value == 'volvo'
            $('#resEmp').hide();
            $('#resCen').hide(); 
            $('#restArt').hide();
            $('#resVen').hide(); 

        }
      });

      $('#btnGenerar').on('click', function(e) {      
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
                    columns: [{ text: 'idu_centro', datafield: 'idu_centro', width: 250 },{ text: 'nombre_centro', datafield: 'nombre_centro', width: 150 }]
                });



                // var source ={
                //     datatype: "json",
                //     datafields: [{ name: 'idu_centro' },{ name: 'nombre_centro' },],
                //     url: "./ajax/Proc_Centro.php", 
                // };
                // $("#jqxgrid").jqxGrid({
                //     source: source,
                //     theme: 'classic',
                //     columns: [{ text: 'idu_centro', datafield: 'idu_centro', width: 250 },{ text: 'nombre_centro', datafield: 'nombre_centro', width: 150 }]
                // });
                
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

    });

    $("#btnPdf").on('click', function(){
        var titulo = "Centros PDF";
        var data = $("#jqxgrid").jqxGrid('exportdata', 'json');
        
      $.ajax({
        url: './ajax/fpdf_Example.php',
        type: 'POST',
        data:{titulo:titulo,data:data}
      })
      .done(function(respuesta) {
        console.log("success");
        console.log(respuesta);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      });

});