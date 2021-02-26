<?php include_once "./menu.html"; ?> 

<link href="../NuevosRecursos/css/index.css" rel="stylesheet" />
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pull-left">
                                <i class="fa fa-user-o" id="iconUser"></i>
                            </div>

                            <div class="pull-right">
                                <p class="mb-0" style="font-size: 16px; line-height: 1.4em; opacity: 0.5;">Empleados</p>
                                <p class="mb-0" style="text-align:center; font-size: 2em;" id="dataEmpleado" onload="dataEmpleados()"></p>
                            </div>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link" href="#">View Details</a>
                            <div class="small"><i class="fa fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pull-left">
                                <i class="fa fa-shopping-bag" id="iconArticle"></i>
                            </div>

                            <div class="pull-right">
                                <p class="mb-0" style="font-size: 16px; line-height: 1.4em; opacity: 0.5;">Articulos</p>
                                <p class="mb-0" style="text-align:center; font-size: 2em;" id="dataArticulo" onload="dataArticulo()"></p>
                            </div>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link" href="#">View Details</a>
                            <div class="small"><i class="fa fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pull-left">
                                <i class="fa fa-line-chart" id="iconSales"></i>
                            </div>

                            <div class="pull-right">
                                <p class="mb-0" style="font-size: 16px; line-height: 1.4em; opacity: 0.5;">Ventas</p>
                                <p class="mb-0" style="text-align:center; font-size: 2em;" id="dataVenta" onload="dataVenta()"></p>
                            </div>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link" href="#">View Details</a>
                            <div class="small"><i class="fa fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pull-left">
                                <i class="fa fa-building-o" id="iconCentros"></i>
                            </div>

                            <div class="pull-right">
                                <p class="mb-0" style="font-size: 16px; line-height: 1.4em; opacity: 0.5;">Centros</p>
                                <p class="mb-0" style="text-align:center; font-size: 2em;" id="dataCentro" onload="dataCentro()"></p>
                            </div>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link" href="#">View Details</a>
                            <div class="small"><i class="fa fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./js/js_index.js"></script>
<!-- <div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Primary Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Warning Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Success Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Danger Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


