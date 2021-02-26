<?php include_once ('./menu.html'); ?>

<?php
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$consulta = $connection->prepare("select * from juan.get_configuracion();",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
$datos = $consulta->fetchAll();
?>

<link href="../NuevosRecursos/css/frmConfig.css" rel="stylesheet" />
<!-- Agregar Configuracion  -->
<div id="confAdd"  class="">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">    
            <div class="container-fluid">
                <div class="row">

                    <form autocomplete="off" class="col-xl-6 card"  style="float:none; margin:auto; margin-top:40px;">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tasa de Financiamiento</label>
                                <input type="number" min="2.8" max="2.8" class="form-control" value= "2.8" name="tasaFinanciamiento" id="tasaFinanciamiento" placeholder="Tasa de Financiamiento" disabled="true">

                            </div>
                            <div class="form-group">
                                <label>% Enganche</label>
                                <input type="number" min="0" max="100" class="form-control" id="enganche" name="enganche" placeholder="Enganche" >

                            </div>
                            <div class="form-group">
                                <label>Plazo Maximo</label>
                                <input type="number" min="3" max="12" class="form-control" id="plazoMaximo" name="plazoMaximo" placeholder="Plazo Maximo" step="3">

                            </div>
                            <div class="form-group" style="float: right;">
                                <a class="btn btn-danger"  href="./index.php"><i ></i>Cancel</a>
                                <button type="button" class="btn btn-success" id="btnConfGuardar">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Actualizar Configuracion -->
<div id="confDeletUpda"  class="d-none" > 
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">    
            <div class="container-fluid">
                <div class="row">
                    <?php foreach($datos as $dato) {  ?>
                        <form autocomplete="off" class="col-xl-6 card"  style="float:none; margin:auto; margin-top:40px;">
                            <div class="card-body">
                                <div class="form-group" style="display: none;">
                                    <input type="text" class="form-control" value= "<?php echo $dato[0];?>" name="iduConfig" id="iduConfig" disabled="true">
                                </div>
                                <div class="form-group">
                                    <label>Tasa de Financiamiento</label>
                                    <input type="number" min="2.8" max="2.8" class="form-control" value= "<?php echo $dato[1];?>" name="tasaFinanciamientoEdit" id="tasaFinanciamientoEdit" placeholder="Tasa de Financiamiento" disabled="true">

                                </div>
                                <div class="form-group">
                                    <label>% Enganche</label>
                                    <input type="number" min="0" max="100" class="form-control" value="<?php echo $dato[2];?>" id="engancheEdit" name="engancheEdit" placeholder="Enganche" >

                                </div>
                                <div class="form-group">
                                    <label>Plazo Maximo</label>
                                    <input type="number" min="3" max="12" class="form-control" value="<?php echo $dato[3];?>" id="plazoMaximoEdit" name="plazoMaximoEdit" placeholder="Plazo Maximo" step="3" >

                                </div>
                                <div class="form-group" style="float: right;">
                                    <button type="button" class="btn btn-warning" id="btnConfActualizar">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./js/js_configuracion.js"></script>