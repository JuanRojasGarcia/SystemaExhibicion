<?php include_once ('./menu.html'); ?>

<link href="../NuevosRecursos/css/frmConfig.css" rel="stylesheet" />
<div id="layoutSidenav">
    <div id="layoutSidenav_content">    
        <div class="container-fluid">
            <div class="row">

                <form action="./log_configuracion.php" method="POST" autocomplete="off" class="col-xl-6 card"  style="float:none; margin:auto; margin-top:40px;">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tasa de Financiamiento</label>
                            <input type="number" min="2.8" max="2.8" class="form-control" name="tasaFinanciamiento" id="tasaFinanciamiento" placeholder="Tasa de Financiamiento" >

                        </div>
                        <div class="form-group">
                            <label>% Enganche</label>
                            <input type="number" min="0" max="100" class="form-control" id="enganche" name="enganche" placeholder="Enganche" >

                        </div>
                        <div class="form-group">
                            <label>Plazo Maximo</label>
                            <input type="number" min="3" max="12" class="form-control" id="plazoMaximo" name="plazoMaximo" placeholder="Plazo Maximo" >

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-save" ><i class="fa fa-floppy-o"></i>&nbsp; Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


