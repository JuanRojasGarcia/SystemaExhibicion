<?php include_once ('./menu.html'); ?> <br><br>

<?php
 include_once "../CapaDatos/conexion.php";
 $connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
 $consulta = "SELECT num_empleado, idu_centro, nombre_empleado, apellido_empleado, email_empleado FROM juan.cat_empleados";
 $resultset = pg_query($connect, $consulta) 
?>

<div class="container">
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
                                $connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
                                $consultaArt = "SELECT idu_articulo, descripcion, modelo, precio, existencia FROM juan.cat_articulos;";
                                $resultsetArt = pg_query($connect, $consultaArt) 
                                ?>

                                <option value="" selected>Choose...</option>
                                <?php while( $rowsArt = pg_fetch_assoc($resultsetArt)) { ?>
                                <option value="<?php echo $rowsArt["idu_articulo"]; ?>"><?php echo $rowsArt["descripcion"]?>  </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-success" id="btnAddArt">+</button>
                        </div>
                    </div>
                    <div class="container">
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
                                        <input type="text" class="text-right" id="total" name="total" value="0" style=" background-color: #ffff;border: 0; width:100px;">
                                        <!--<p class="text-right pr-4" id="total" name="total">0</p>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="divNext" class="container ">
                        <table class="table text-black">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Pagos Mensuales</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tableBodyPayments">
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-10"></div>
                        <div>
                            <a class="btn btn-danger" href="./index.php"><i ></i>Cancel</a>
                            <button type="submit" class='btn btn-primary'>Next</button>
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
                </div>
                <div class="col-lg-2"></div>
            </div>

    </div>
 

    
    <script>           
        $(document).ready(function(){  
            const f = new Date();
            //$('#fecha').text(`${f.getDate()}/${f.getMonth()+1}/${f.getFullYear()}`);
            $("#fecha").val(`${f.getDate()}/${f.getMonth()+1}/${f.getFullYear()}`);

            $('#selectEmp').change(function(){  
                const selectEmp = $('#selectEmp');
                var id = $(this).val();  
                $.ajax({  
                    url:"./log_get_dataEmp.php",  
                    method:"POST",  
                    data:{id:id},  
                    success:function(data){  
                        $('#emailEmp').html(data);  
                        selectEmp.prop('disabled', true)

                    }  
                }); 


            });

                //console.log($('#cantidadArt').val());


            $('#btnAddArt').on('click', function(e) {
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

            //$("input[type=submit]").click(function(){
                

            //});





            


        });  
    </script>