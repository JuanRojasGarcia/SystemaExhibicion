<?php include_once "./menu.html"; ?> 

<?php 
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
$consultaEmp = "SELECT Count(*) As total from juan.cat_empleados"; 
$resultÉmp = pg_query($connect, $consultaEmp); 
$rowEmp = pg_fetch_assoc($resultÉmp);
echo $rowEmp['total']. " Empleados";
echo "<script> console.log('".$rowEmp["total"]."'); </script>";

?>

<?php 
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
$consultaArt = "SELECT Count(*) As total from juan.cat_articulos"; 
$resultArt = pg_query($connect, $consultaArt); 
$rowArt = pg_fetch_assoc($resultArt);
echo $rowArt['total']. " Articulos";
echo "<script> console.log('".$rowArt["total"]."'); </script>";

?>

<?php 
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
$consultaVen = "SELECT Count(*) As total from juan.cat_ventas"; 
$resultVen = pg_query($connect, $consultaVen); 
$rowVen = pg_fetch_assoc($resultVen);
echo $rowVen['total']. " Ventas";
echo "<script> console.log('".$rowVen["total"]."'); </script>";

?>

<?php 
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
$consultaCen = "SELECT Count(*) As total from juan.cat_centros"; 
$resultCen = pg_query($connect, $consultaCen); 
$rowCen = pg_fetch_assoc($resultCen);
echo $rowCen['total']. " Centros";
echo "<script> console.log('".$rowCen["total"]."'); </script>";

?>

<!-- <div class="col-xl-3 col-md-6">
    <div class="card mb-4">
        <div class="text-align-left fa fa-user" ></div>
        <div class="text-align-left">Registros</div>

        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small stretched-link" href="#">View Details</a>
            <div class="small"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>
</div> -->

<div class=" col-xl-3 col-md-6">
    <div class="card mb-4">
        <div class="card-body">
        <div class="pull-left">
            <i class="fa fa-user"></i>
        </div>

        <div class="pull-right">
                <p class="mb-0">Registros</p>
                <p class="mb-0"><?php echo $rowEmp['total'];?></p>
            </div>
        </div>
    </div>
</div>


<style>
    body{
        background:#F1EEEE;
    }

    .card{
        border-radius: 6px;
        box-shadow: 0 6px 10px -4px rgba(0,0,0,.15);
        background-color: #fff;
        color: #252422;
        margin-bottom: 20px;
        margin-left: 30px;
    }

    .fa-user{
        color: #059D48;
        font-size: 3em;
    }
</style>
