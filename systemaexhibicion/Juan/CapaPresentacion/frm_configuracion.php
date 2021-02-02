<?php include_once ('./menu.html'); ?>


<div id="layoutSidenav">
    <div id="layoutSidenav_content">    
        <div class="container-fluid">
            <div class="row">

                <form action="./log_configuracion.php" method="POST" autocomplete="off" class="col-xl-6 card"  style="float:none; margin:auto; margin-top:40px;">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tasa de Financiamiento</label>
                            <input type="number" min="2.8" max="2.8" class="form-control" name="tasaFinanciamiento" id="tasaFinanciamiento" placeholder="Tasa de Financiamiento" >

                        </div>
                        <div class="form-group">
                            <label>% Enganche</label>
                            <input type="number" min="0" max="100" class="form-control" id="enganche" name="enganche" placeholder="Enganche" >

                        </div>
                        <div class="form-group">
                            <label>Plazo Maximo</label>
                            <input type="number" min="3" max="12" class="form-control" id="plazoMaximo" name="plazoMaximo" placeholder="Plazo Maximo" >

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-save" ><i class="fa fa-floppy-o"></i>&nbsp; Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    body{
        background:#F1EEEE;
        font-family: Helvetica,Arial,sans-serif;
    }

    .form-control{
        background:#F5F5F5;
    }

    .form-control::placeholder { 
        color: #D1D1D1;
        font-size: 16px;
        padding: 7px 18px;
    }

    .form-control:focus{
        background:#fff;
        -webkit-transition: all ease-in-out .55s;
        -o-transition: all ease-in-out .55s;
        transition: all ease-in-out .55s;
    }
    .form-control:not(focus){
        background:#F5F5F5;
        -webkit-transition: all ease-in-out .55s;
        -o-transition: all ease-in-out .55s;
        transition: all ease-in-out .55s;
    }

    .row{
        margin-top: 20px;
        
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

    .btn-save{
        font-size:18px;
        padding:4px 10px;
        color: #E1E1E1;
        background-color: #067F3C;
        border:none;
        justify-content: center;
        align-items: center;
        float: right;
        display: flex;
        width:100px;
        opacity: 0.80;
        border-radius:20px;
    }

    .btn-save:hover{
        opacity: 1;
    }


</style>

