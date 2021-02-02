<?php include_once ('./menu.html'); ?> <br><br>

<?php
 include_once "../CapaDatos/conexion.php";
 $connect = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin357") or die('Could not connect: ' . pg_last_error());
 $consulta = "SELECT num_empleado, idu_centro, nombre_empleado, apellido_empleado, email_empleado FROM juan.cat_empleados";
 $resultset = pg_query($connect, $consulta) 
?>


<div id="layoutSidenav">
    <div id="layoutSidenav_content">    
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                        
                    <div class="container card">
                        <div class="card-body">
                            <div>
                                <form action="./log_ventas.php"  method="GET" autocomplete="off" id="form">
                                    <div class="form-group row">
                                        <div class="col input-group mb-6">
                                            <select class="input-group-append custom-select" id="selectEmp" name="selectEmp">
                                                <option value="" selected="selected">Choose...</option>
                                                <?php while( $rows = pg_fetch_assoc($resultset)) { ?>
                                                <option value="<?php echo $rows["num_empleado"]; ?>"><?php echo $rows["nombre_empleado"]. " " .$rows["apellido_empleado"]; ?>  </option>
                                                <?php } ?>
                                            </select>
                                        </div>                        
                                        <div class="col">                            
                                            <span id="emailEmp"> Email: </span>
                                        </div>
                                    </div>
                                                        
                                    <div class="form-group " style="display:none;">
                                        <input type="text" id="fecha" name="fecha" >
                                    </div>

                                    <div class="form-group row">
                                        <div class="col input-group mb-3">
                                            <select class="input-group-append custom-select" id="selectArt" >
                                                
                                                <?php
                                                include_once "../CapaDatos/conexion.php";
                                                $connect = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin357") or die('Could not connect: ' . pg_last_error());
                                                $consultaArt = "SELECT idu_articulo, descripcion, modelo, precio, existencia FROM juan.cat_articulos;";
                                                $resultsetArt = pg_query($connect, $consultaArt) ;

                                                ?>

                                                <option value="" selected>Choose...</option>
                                                <?php while( $rowsArt = pg_fetch_assoc($resultsetArt)) {  $existencia = $rowsArt["existencia"]; ?>
                                                
                                                <option value="<?php echo $rowsArt["idu_articulo"]; ?>"><?php echo $rowsArt["descripcion"]?>   </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-success" id="btnAddArt">+</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive" style="float:none; margin:auto;">
                                        <table class="table text-black">
                                            <thead>
                                                <tr>
                                                    <th>Descripcion</th>
                                                    <th>Modelo</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Importe</th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody id="tableBodyForm">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="container text-black">
                                        <div class="row">
                                            <div class="col-lg-8"></div>
                                            <div class="col-lg-4 container">
                                                <div class="row">

                                                    <div class="col-lg-7">
                                                        <p class="">Enganche:</p>
                                                        <p class="">Enganche Bonus:</p>                    
                                                        <p class="">Total:</p>                    
                                                        
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <p class="text-right pr-4" id="enganche">0</p>
                                                        <p class="text-right pr-4" id="egbonus">0</p>
                                                        <input type="numeric" class="text-right" id="total" name="total" value="0" style=" background-color: #ffff;border: 0; width:110px;">
                                                        <!--<p class="text-right pr-4" id="total" name="total">0</p>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="divNext" class="table-responsive d-none">
                                        <table class="table text-black">
                                            <thead >
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Pagos Mensuales</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody id="tableBodyPayments">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row" style="float:right;">
                                        <div class="col-lg-10"></div>
                                        <div>
                                            <a class="btn btn-danger" href="./index.php"><i ></i>Cancel</a>
                                            <button type="submit" class='btn btn-success' id="btnSave">Save</button>
                                            <!-- <button class='btn btn-primary' id="btnNext">Next</button>-->
                                            <a class="btn btn-primary" id="btnNext" style="color:white;"><i ></i>Next</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-2"></div>
                            <br>
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                    <div class="alert" role="alert" id = "message"></div>
                                    <div class="alert" role="alert" id = "messagee"></div>

                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </div>
                    </div>


                     
                </div>
            </div>
        </div>
    </div>
</div>
                    

    
    <script>           
    $(document).ready(function(){              

        $('#btnSave').hide(); 
        $('#btnNext').show();

        const f = new Date();
        //$('#fecha').text(`${f.getDate()}/${f.getMonth()+1}/${f.getFullYear()}`);
        $("#fecha").val(`${f.getDate()}/${f.getMonth()+1}/${f.getFullYear()}`);

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

        $('#selectArt').change(function(){  
            const selectArt = $('#selectArt');
            selectArt.prop('disabled', true)
        });

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
    </script>

<style>
    body{
        background:#F1EEEE;
        font-family: Muli,Arial,sans-serif;
    }

    /* .card{
        border-radius: 6px;
        box-shadow: 0 6px 10px -4px rgba(0,0,0,.15);
        background-color: #fff;
        color: #252422;
        margin-top: 20px;
    } */

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 6px;
        box-shadow: 0 6px 10px -4px rgba(0,0,0,.50);
        margin-top: 10px;

    }

    /* .row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -0.75rem;
    margin-left: -0.75rem;
    } */
    .row{
        margin-top: 20px;
        text-align:center;
        
    }

    .sb-nav-fixed #layoutSidenav #layoutSidenav_content {
        padding-left: 225px;
        top: 8px;
    }
    


    

}


</style>