<?php include_once "./menu.html"; ?>

<?php
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$consulta = $connection->prepare("select * from juan.get_data_Empleados();",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
$datos = $consulta->fetchAll();
// foreach($datos as $dato){
// echo "<script> console.log('".$dato[2]. " " . $dato[3] ."'); </script>";
// }
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
                                        <img src="https://image.flaticon.com/icons/png/512/401/401156.png"/>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <div class="product">
                                        <h1><?php echo $dato[2]. " " .$dato[3]?></h1>
                                        <p><?php echo $dato[0];?></p>
                                        <p><?php echo $dato[1];?></p>
                                        <p><?php echo $dato[4];?></p>
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


