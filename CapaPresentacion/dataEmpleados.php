<?php include_once "./menu.html"; ?>

<?php
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("SELECT num_empleado, idu_centro, nombre_empleado, apellido_empleado, email_empleado FROM juan.cat_empleados;",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
?>



<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <div class="row">

                <?php while ($empleados = $consulta->fetchObject()) { ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="pull-left">
                                    <div class="images">
                                        <img src="https://www.jakpost.travel/imgfiles/full/134/1347383/surrealismo-wallpaper.jpg"/>
                                    </div>


                                </div>

                                <div class="pull-right">
                                    <div class="product">
                                        <h1><?php echo$empleados->nombre_empleado. " " .$empleados->apellido_empleado ?></h1>
                                        <p><?php echo $empleados->num_empleado?></p>
                                        <p><?php echo $empleados->idu_centro?></p>
                                        <p><?php echo $empleados->email_empleado?></p>
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



<style>
    body{
        background:#F1EEEE;
        font-family: Muli,Arial,sans-serif;
    }

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

    p {
        font-size: 1em;
        color: #BA7E7E;
        letter-spacing: 1px;
    }

    h1 {
    font-size: 1.2em;
    color: #4E4E4E;
    margin-top: -5px;
    }

    h2 {
    color: #C3A1A0;
    margin-top: -5px;
    }

    img {
        width: 160px;
        margin-top: -4px;
    }

    .product {
        position: absolute;
        width: 44%;
        height: 100%;
        top: 8%;
        left: 58%;
    }

    .desc {
    text-transform: none;
    letter-spacing: 0;
    margin-bottom: 17px;
    color:#4E4E4E;
    font-size: .7em;
    line-height: 1.6em;
    margin-right: 25px;
    text-align: justify;
    }

    button {
    background: darken(#E0C9CB, 10%);
    padding: 10px;
    display: inline-block;
    outline: 0;
    border: 0;
    margin: -1px;
    border-radius: 2px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #F5F5F5;
    cursor: pointer;
    margin-top: 7px;
    margin-right: 20px;
    }

    button:hover{
        background:  #BA7E7E;
        transition: all .4s ease-in-out;
    }

    .add {
    width: 23%;
    }

    .like {
    width: 23%;
    }







</style>
