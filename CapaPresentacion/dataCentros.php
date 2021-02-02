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