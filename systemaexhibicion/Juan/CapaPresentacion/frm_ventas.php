<?php include_once ('./menu.html'); ?> <br><br>



<link href="../NuevosRecursos/css/ventas.css" rel="stylesheet" />
<div id="layoutSidenav">
    <div id="layoutSidenav_content">    
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-xl-12">
                         
                    <div class="container card">
                        <div class="card-body">
                            <div>
                                <form  autocomplete="off" id="form">
                                    <div class="form-group row">
                                        <div class="col input-group mb-6">
                                            <input id="selectEmp" style="width: 100%;" />
                                        </div>                        
                                        <div class="col">                            
                                            <span id="emailEmp"> Email: </span> <span id="requestEmail"> </span>
                                        </div>
                                    </div>
                                                        
                                    <div class="form-group " style="display:none;">
                                        <input type="text" id="fecha" name="fecha" >
                                    </div>

                                    <div class="form-group row">
                                        <div class="col input-group mb-3">
                                            <input id="selectArt" style="width: 100%;" />
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-success" id="btnAddArt" >+</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive" style="float:none; margin:auto;">
                                        <table class="table text-black" style="text-align: center;">
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

                                            <tbody id="tableBodyForm" class="d-none">
                                                <tr>
                                                    <td><p id="descripcion"  name="descripcion"></p> </td>
                                                    <td><p id="modelos"  name="modelos"></p> </td>
                                                    <td><input id="cantidadArt" name="cantidadArt" class="qty" value="0" type="number" min="0" onkeypress="return soloNumeros(event)"></td>
                                                    <td><input id="idPrecio" name="idPrecio" value="0" type="text"></td>

                                                    <!-- <td id="idPrecio" name="idPrecio"> </td> -->
                                                    <td id="importeArt" class="rowAmount"> </td>
                                                </tr>
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
                                                        <input type="numeric" class="text-right" id="total" name="total" value="0" style=" background-color: #ffff;border: 0; width:105px;">
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
                                            <button type="button" class='btn btn-success d-none' id="btnSave">Save</button>
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
<script src="js/js_funcGenerales.js"></script>

     
    
 