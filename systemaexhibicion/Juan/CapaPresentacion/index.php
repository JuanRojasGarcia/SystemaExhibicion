<?php include_once "./menu.html"; ?> 

<?php 
include_once "../CapaDatos/conexion.php";
$iOpcionEmp = 1;
$objeto = new Conexion();
$connection = $objeto->Connect();
$consultaEmp = "select juan.get_Total_Tablas($iOpcionEmp);"; 
$resultEmp =  $connection->prepare($consultaEmp); 
$resultEmp->execute();
$datosEmp = $resultEmp->fetchAll();
// echo $rowEmp['total']. " Empleados";
// foreach($datosEmp as $dato){
// echo "<script> console.log('".$dato[0]."'); </script>";
// }
?>

<?php 
include_once "../CapaDatos/conexion.php";
$iOpcionArt = 2;
$objeto = new Conexion();
$connection = $objeto->Connect();
$consultaArt = "select juan.get_Total_Tablas($iOpcionArt);"; 
$resultArt =  $connection->prepare($consultaArt); 
$resultArt->execute();
$datosArt = $resultArt->fetchAll();

// echo $rowArt['total']. " Articulos";
// echo "<script> console.log('".$rowArt["total"]."'); </script>";

?>

<?php 
include_once "../CapaDatos/conexion.php";
$iOpcionVen = 3;
$objeto = new Conexion();
$connection = $objeto->Connect();
$consultaVen = "select juan.get_Total_Tablas(3);"; 
$resultVen =  $connection->prepare($consultaVen); 
$resultVen->execute();
$datosVen = $resultVen->fetchAll();

// echo $rowVen['total']. " Ventas";
// echo "<script> console.log('".$rowVen["total"]."'); </script>";

?>

<?php 
include_once "../CapaDatos/conexion.php";
$iOpcionCen = 4;
$objeto = new Conexion();
$connection = $objeto->Connect();
$consultaCen = "select juan.get_Total_Tablas(4);"; 
$resultCen =  $connection->prepare($consultaCen); 
$resultCen->execute();
$datosCen = $resultCen->fetchAll();

// echo $rowCen['total']. " Centros";
// echo "<script> console.log('".$rowCen["total"]."'); </script>";

?>


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
                                <p class="mb-0" style="text-align:center; font-size: 2em;" ><?php foreach($datosEmp as $dato){ echo $dato[0]; }?></p>
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
                                <p class="mb-0" style="text-align:center; font-size: 2em;" ><?php foreach($datosArt as $dato){ echo $dato[0]; }?></p>
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
                                <p class="mb-0" style="text-align:center; font-size: 2em;" ><?php foreach($datosVen as $dato){ echo $dato[0]; }?></p>
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
                                <p class="mb-0" style="text-align:center; font-size: 2em;" ><?php foreach($datosCen as $dato){ echo $dato[0]; }?></p>
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

<style>
    body{
        background:#F1EEEE;
        font-family: Muli,Arial,sans-serif;
    }

    /* .card{
        border-radius: 6px;
        box-shadow: 0 6px 10px -4px rgba(0,0,0,.15);
        background-color: #fff;
        color: #252422;
        margin-top: 20px;
    } */

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

    /* .row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -0.75rem;
    margin-left: -0.75rem;
    } */

    #iconUser{
        color: #059D48;
        font-size: 3em;
        font-style: normal;
        font-weight: bold; 
        /* text-align: center; */
        padding-left: 20px;
        padding-top: 10px;


    }

    #iconArticle{
        color: #f3bb45;
        font-size: 3em;
        font-style: normal;
        font-weight: bold; 
        /* text-align: center; */
        padding-left: 20px;
        padding-top: 10px;


    }

    #iconSales{
        color: #eb5e28;
        font-size: 3em;
        font-style: normal;
        font-weight: bold; 
        /* text-align: center; */
        padding-left: 20px;
        padding-top: 10px;


    }

    #iconCentros{
        color: #432F02;
        font-size: 3em;
        font-style: normal;
        font-weight: bold; 
        /* text-align: center; */
        padding-left: 20px;
        padding-top: 10px;


    }
    

    

    .card-footer{
        background-color: #fff;
        color: #252422;
    }




</style>