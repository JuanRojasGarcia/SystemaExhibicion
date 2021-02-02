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

// $objeto = new Conexion();
// $connection = $objeto->Connect();
// $consulta = "SELECT idu_centro FROM juan.cat_centros;"; 
// $result =  $connection->prepare($consulta,[
//         PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
//     ]); 
// $result->execute();

?>

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

            <form action="./log_agregarCen.php" method="POST" autocomplete="off" class="col-xl-6 card " id="formCentros" style="float:none; margin:auto; margin-top:40px; display:none;">
                <div class="card-body">
                    <h4 style="text-align:center;">Alta Centro</h4>

                    <div class="form-group">
                        <label for="numCentro">Numero Centro</label>
                        <input required name="numCentro" type="number" id="numCentro" class="form-control"  placeholder="Enter Numero" >
                    </div>
                    <div class="form-group">
                        <label for="nombreCen">Nombre Centro</label>
                        <input required name="nombreCentro" type="text" id="nombreCen" class="form-control"  placeholder="Enter Nombre" >
                    </div>
                    <div class="form-group">
                        <button  class="btn-save"><i class="fa fa-floppy-o" ></i>&nbsp;Save </button>
                    </div>
                </div>
            </form>

            <!-- Altas Articulos -->

            <form action="./log_agregarArt.php" method="POST" autocomplete="off" class="col-xl-6 card" id="formArticulos" style="float:none; margin:auto; margin-top:40px; display:none;">
                <div class="card-body">

                    <h4 style="text-align:center;">Alta Articulo</h4>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input required name="descripcion" type="text" id="descripcion" class="form-control"  placeholder="Enter Descripcion">
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input required name="modelo" type="text" id="modelo" class="form-control"  placeholder="Enter Modelo">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input required name="precio" type="text" id="precio" class="form-control"  placeholder="Enter Precio">
                    </div>
                    <div class="form-group">
                        <label for="existencia">Existencia</label>
                        <input required name="existencia" type="number" id="existencia" class="form-control"  placeholder="Enter Existencia">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-save" ><i class="fa fa-floppy-o"></i>&nbsp; Save</button>
                    </div>
                </div>
            </form>

            <!-- Alta Empleados -->

            <form action="./log_agregarEmp.php" method="POST" autocomplete="off" class="col-xl-6 card" id="formEmpleados" style="float:none; margin:auto; margin-top:40px; display:none;">
                <div class="card-body">

                    <h4 style="text-align:center;">Alta Empleado</h4>
                    <div class="form-group">
                        <label for="numEmpleado">Numero Empleado</label>
                        <input required name="numEmpleado" type="number" id="numEmpleado" class="form-control"  placeholder="Enter Numero">
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
                        <input required name="nombreEmp" type="text" id="nombreEmp" class="form-control"  placeholder="Enter Nombre Completo">
                    </div>
                    <div class="form-group">
                        <label for="apellidoEmp">Apellido</label>
                        <input required name="apellidoEmp" type="text" id="apellidoEmp" class="form-control"  placeholder="Enter Apellido Completo">
                    </div>
                    <div class="form-group">
                        <label for="correoEmp">Email</label>
                        <input required name="correoEmp" type="email" id="correoEmp" class="form-control"  placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-save" ><i class="fa fa-floppy-o"></i>&nbsp; Save</button>
                    </div>
                </div>
            </form> <br>

        </div>
    </div>
</div>




<script>
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
    
});
</script>


<style>
    body{
        background:#F1EEEE;
        font-family: Helvetica,Arial,sans-serif;
    }

    .form-control{
        background:#F5F5F5;
    }

    .form-control::placeholder { 
        color: #D1D1D1;
        font-size: 16px;
        padding: 7px 18px;
    }

    .form-control:focus{
        background:#fff;
        -webkit-transition: all ease-in-out .55s;
        -o-transition: all ease-in-out .55s;
        transition: all ease-in-out .55s;
    }
    .form-control:not(focus){
        background:#F5F5F5;
        -webkit-transition: all ease-in-out .55s;
        -o-transition: all ease-in-out .55s;
        transition: all ease-in-out .55s;
    }

    .row{
        margin-top: 20px;
        text-align:center;
        
    }

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

    .btn-empleados{
        font-size:18px;
        padding:0px 20px;
        color: #fff;
        background-color: #5a5a5a;
        border:none;
        justify-content: center;
        align-items: center;
        display: flex;
        width:230px;
        opacity: 0.94;
        border-radius:30px;
    }

    .btn-centros{
        font-size:18px;
        padding:0px 20px;
        color: #fff;
        background-color: #EA0808;
        border:none;
        justify-content: center;
        align-items: center;
        display: flex;
        width:230px;
        opacity: 0.94;
        border-radius:30px;
    }

    .btn-articulos{
        font-size:18px;
        padding:0px 20px;
        color: #fff;
        background-color: #088FEA;
        border:none;
        justify-content: center;
        align-items: center;
        display: flex;
        width:230px;
        opacity: 0.94;
        border-radius:30px;
    }

    .btn-save{
        font-size:18px;
        padding:4px 10px;
        color: #E1E1E1;
        background-color: #067F3C;
        border:none;
        justify-content: center;
        align-items: center;
        float: right;
        display: flex;
        width:100px;
        opacity: 0.80;
        border-radius:20px;
    }

    .btn-empleados:hover{
        opacity: 1;
    }
    .btn-centros:hover{
        opacity: 1;
    }
    .btn-articulos:hover{
        opacity: 1;
    }
    .btn-save:hover{
        opacity: 1;
    }

    .btn-gradient {    
        width:40%;
        position: relative;
        display: inline-block;
        left:-20px;
        background: rgba(0, 0, 0, 0.20);
        border-top-right-radius: 60px;
        padding: 8px 24px 8px 16px;
        box-shadow: 2px 0px 0px 0px rgba(78, 72, 72, 0.4);
    }

    .btn-gradient i{
        font-size:25px;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .radius-btn{
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
    }

    .btn-text{
        width:60%;
    }

</style>