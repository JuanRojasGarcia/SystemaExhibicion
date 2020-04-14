<?php include_once ('./menu.html'); ?>

<form action="./log_configuracion.php" method="POST" autocomplete="off" class="col-md-6" style="float:none; margin:auto; top: 10px;">
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
        <a class="btn btn-secondary" href="./index.php"><i ></i>Cancel</a>
        <button type="submit" class="btn btn-info" ><i ></i>Save</button>
    </div>

</form>


