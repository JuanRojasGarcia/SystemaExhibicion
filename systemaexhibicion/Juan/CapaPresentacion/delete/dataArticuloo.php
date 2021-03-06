<?php include_once "./menu.html"; ?>
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
    font-size: 0.6em;
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