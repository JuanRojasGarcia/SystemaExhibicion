<?php include_once "./menu.html"; ?>


<?php
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$consulta = $connection->prepare("select * from juan.get_data_Articulos();",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
$datos = $consulta->fetchAll();
// foreach($datos as $dato){
// echo "<script> console.log('".$dato[3]."'); </script>";
// }
?>

<link href="../NuevosRecursos/css/data.css" rel="stylesheet" />
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <div class="row">

                <?php foreach($datos as $dato){ ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="pull-left">
                                    <div class="images">
                                        <img src="https://img.favpng.com/20/18/18/product-icon-delivery-icon-png-favpng-pBB7CAb06q1NXvZLdeVZQ1vyF.jpg"/>
                                    </div>
                                </div>

                                <div class="pull-right">
                                    <div class="product">
                                        <h1><?php  echo $dato[1];  //echo $articulos->descripcion?></h1>
                                        <p><?php  echo $dato[2];  //echo $articulos->modelo?></p>
                                        <h2>$<?php  echo $dato[3]; //echo $articulos->precio?></h2>
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





