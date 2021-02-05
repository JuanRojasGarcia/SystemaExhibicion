<?php include_once "./menu.html"; ?>


<div id="layoutSidenav">
    <div id="layoutSidenav_content">    
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-6">
                        <div class="card-header"><i class="fa fa-user mr-1"></i>Empleados</div>
                        <div class="card-body">
                            <?php include_once "./tablaEmpleado.php"; ?> 
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card mb-4" >
                        <div class="card-header"><i class="fa fa-line-chart mr-1"></i>Ventas</div>
                        <div class="card-body">
                            <?php include_once "./tablaVentas.php"; ?> 
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fa fa-shopping-bag mr-1"></i>Articulos</div>
                        <div class="card-body">
                            <?php include_once "./tablaArticulos.php"; ?> 
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header"><i class="fa fa-building-o mr-1"></i>Centros</div>
                        <div class="card-body">
                            <?php include_once "./tablaCentro.php"; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fa fa-cog mr-1"></i>Configuracion</div>
                        <div class="card-body">
                            <?php include_once "./tablaConfiguracion.php"; ?> 
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

