<?php include_once ('./menu.html'); ?> <br><br>

<?php
 include_once "../CapaDatos/conexion.php";
 $objeto = new Conexion();
 $connection = $objeto->Connect();
 $consultaEmp =  $connection->prepare("select * from juan.get_data_Empleados();"); 
 $consultaEmp->execute();
 $datosEmp = $consultaEmp->fetchAll();

?>

<link href="../NuevosRecursos/css/ventas.css" rel="stylesheet" />
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
                                                <?php foreach($datosEmp as $datoemp){  ?>
                                                <option value="<?php echo $datoemp[0]; ?>"><?php echo $datoemp[2]. " " .$datoemp[3] ?>  </option>
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
                                                $objeto = new Conexion();
                                                $connection = $objeto->Connect();
                                                $consultaArt =  $connection->prepare("select * from juan.get_data_Articulos();"); 
                                                $consultaArt->execute();
                                                $datosArt = $consultaArt->fetchAll();

                                                ?>

                                                <option value="" selected>Choose...</option>
                                                <?php foreach($datosArt as $datoArt){   $existencia = $datoArt[4]; ?>
                                                
                                                <option value="<?php echo $datoArt[0]; ?>"><?php echo $datoArt[1];?>   </option>
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
<script src="js/js_ventas.js"></script>

    
    
 