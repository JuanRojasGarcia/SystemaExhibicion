<?php include_once "./menu.html"; ?> 

<?php
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$consulta = $connection->prepare("select juan.get_all_Centros();",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
$datos = $consulta->fetchAll();
// foreach($datos as $dato){
// echo "<script> console.log('".$dato[0]."'); </script>";
// }
// $objeto = new Conexion();
// $connection = $objeto->Connect();
// $consulta = "SELECT idu_centro FROM juan.cat_centros;"; 
// $result =  $connection->prepare($consulta,[
//         PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
//     ]); 
// $result->execute();

?>


<link href="../NuevosRecursos/css/altas.css" rel="stylesheet" />

<div id="layoutSidenav">
    <div id="layoutSidenav_content">    
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <button class="btn-empleados" style="margin-left: 0px"  id="btnEmpleados">
                        <span class="btn-gradient radius-btn">
                        <i class="fa fa-plus-circle"></i>
                        </span>
                        <i class="fa fa-user-o"></i>
                        <span class="btn-text">Empleados</span>
                    </button>
                    <!-- <h1><a class="btn-snapchat" style="margin-left: 20px" href="./frm_agregarEmp.php"><i class="fa fa-plus "></i> Empleados</a></h1>  -->
                </div>
                <div class="col-xl-4 col-md-4">
                    <button class="btn-centros" style="margin-left: 0px"  id="btnCentros">
                        <span class="btn-gradient radius-btn">
                        <i class="fa fa-plus-circle"></i>
                        </span>
                        <i class="fa fa-building-o"></i>
                        <span class="btn-text">Centros</span>
                    </button>
                    <!-- <h1><a class="btn btn-info " style="margin-left: 20px" href="./frm_agregarCen.php"><i class="fa fa-plus"></i> Centros</a></h1>  -->
                </div>
                <div class="col-xl-4 col-md-4">
                    <button class="btn-articulos" style="margin-left: 0px"  id="btnArticulos">
                        <span class="btn-gradient radius-btn">
                        <i class="fa fa-plus-circle"></i>
                        </span>
                        <i class="fa fa-shopping-bag"></i>
                        <span class="btn-text">Articulos</span>
                    </button>
                    <!-- <h1><a class="btn btn-info " style="margin-left: 20px" href="./frm_agregarArt.php"><i class="fa fa-plus"></i> Articulos</a></h1>  -->
                </div>
            </div>

            <!-- Altas Centros -->

            <form autocomplete="off" class="col-xl-6 card " id="formCentros" style="float:none; margin:auto; margin-top:40px; display:none;">
                <div class="card-body">
                    <h4 style="text-align:center;">Alta Centro</h4>

                    <div class="form-group">
                        <label for="numCentro">Numero Centro</label>
                        <input required name="numCentro" type="text" id="numCentro" class="form-control"  placeholder="Enter Numero" onkeypress="return soloNumeros(event)">
                    </div>
                    <div class="form-group">
                        <label for="nombreCen">Nombre Centro</label>
                        <input required name="nombreCentro" type="text" id="nombreCen" class="form-control"  placeholder="Enter Nombre" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn-save" id="saveCentro"><i class="fa fa-floppy-o" ></i>&nbsp;Save </button>
                    </div>
                </div>
            </form>

            <!-- Altas Articulos -->

            <form autocomplete="off" class="col-xl-6 card" id="formArticulos" style="float:none; margin:auto; margin-top:40px; display:none;">
                <div class="card-body">

                    <h4 style="text-align:center;">Alta Articulo</h4>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input required name="descripcion" type="text" id="descripcion" class="form-control"  placeholder="Enter Descripcion" value="" onkeypress="return soloLetras(event)" />
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input required name="modelo" type="text" id="modelo" class="form-control"  placeholder="Enter Modelo" value="" onkeypress="return Modelo(event)"> 
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input required name="precio" type="text" id="precio" class="form-control"  placeholder="Enter Precio"  onkeypress="return Precio(event)">
                    </div>
                    <div class="form-group">
                        <label for="existencia">Existencia</label>
                        <input required name="existencia" type="text" id="existencia" class="form-control"  placeholder="Enter Existencia" value="" onkeypress="return soloNumeros(event)">
                    </div>

                    <div class="form-group">
                        <!-- <button type="submit" class="btn-save" href="./index.php"><i class="fa fa-floppy-o"></i>&nbsp; Save</button> -->
                        <button type="button" class="btn-save" id="saveArticulo"><i class="fa fa-floppy-o"></i>&nbsp; Save</button>

                    </div>
                </div>
            </form>

            <!-- Alta Empleados -->

            <form autocomplete="off" class="col-xl-6 card" id="formEmpleados" style="float:none; margin:auto; margin-top:40px; display:none;">
                <div class="card-body">

                    <h4 style="text-align:center;">Alta Empleado</h4>
                    <div class="form-group">
                        <label for="numEmpleado">Numero Empleado</label>
                        <input required name="numEmpleado" type="text" id="numEmpleado" class="form-control"  placeholder="Enter Numero" onkeypress="return soloNumeros(event)">
                    </div>
                    <div class="form-group ">
                        <label for="iduCentro">Centros</label> <br>
                        <select class="input-group-append" name="iduCentro" id="iduCentro">
                            <option value="" selected="selected">Choose....</option>  
                            <?php foreach($datos as $dato) { ?>
                            <option value="<?php echo $dato[0];?> "> <?php echo $dato[0];?> </option>  
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombreEmp">Nombre</label>
                        <input required name="nombreEmp" type="text" id="nombreEmp" class="form-control"  placeholder="Enter Nombre Completo" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group">
                        <label for="apellidoEmp">Apellido</label>
                        <input required name="apellidoEmp" type="text" id="apellidoEmp" class="form-control"  placeholder="Enter Apellido Completo" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group">
                        <label for="correoEmp">Email</label>
                        <input required name="correoEmp" type="text" id="correoEmp" class="form-control"  placeholder="Enter Email" onkeypress="return Correo(event)">
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn-save" id="saveEmpleado"><i class="fa fa-floppy-o" ></i>&nbsp; Save</button>
                    </div>
                </div>
            </form> <br>

                <!-- <div class="container">
                    <div class="modal" id="myModal" style="align-content: center;">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        
                            <div class="modal-body" id="getCode">
                            </div>
                            
                            <div class="modal-footer">
                            <button type="button" id="cancelModal" class="btn btn-success" data-dismiss="modal" >Close</button>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div> -->

    </div>
</div>
<script src="js/js_altas.js"></script>
<script src="js/js_funcGenerales.js"></script>







