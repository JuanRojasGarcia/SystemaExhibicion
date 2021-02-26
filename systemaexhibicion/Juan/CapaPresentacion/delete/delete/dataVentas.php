<?php include_once "./menu.html"; ?>

<?php
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$consulta = $connection->prepare("select * from juan.get_data_Ventas();",[
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
                                    <div class="images">
                                        <img src="https://www.gesmark.cl/wp-content/uploads/2019/05/ventas-onlline_publicidad-gesmark_empresa_de_marketing_y_publicidad-1067x800.jpg"/>
                                    </div>
                                </div>

                                <div class="pull-right">
                                    <div class="product">
                                        <h1><?php echo $dato[4];?></h2>
                                        <p><?php  echo $dato[1]. " " .$dato[2]?></p>
                                        <h2>$<?php echo number_format($dato[3],2);?></h2>
                                    </div>
                                </div>

                            </div>
                        </div>    
                    </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>




