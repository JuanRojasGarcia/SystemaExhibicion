<?php include_once "./menu.html"; ?>


<?php
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$consulta = $connection->prepare("select * from juan.get_data_Centros()",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
$datos = $consulta->fetchAll();
?>

<link href="../NuevosRecursos/css/data.css" rel="stylesheet" />
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <div class="row">

                <?php foreach($datos as $dato) { ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pull-left">
                                <p class="mb-0" style="text-align:center; font-size: 1.5em;" ><?php  echo $dato[0];  ?></p>

                            </div>

                            <div class="pull-right">
                                <!-- <p class="mb-0" style="font-size: 16px; line-height: 1.4em; opacity: 0.5;">Empleados</p> -->
                                <p class="mb-0" style="text-align:center; font-size: 2em;" ><?php  echo $dato[1]; ?></p>

                            </div>

                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

