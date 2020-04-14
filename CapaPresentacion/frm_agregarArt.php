<?php include_once ('./menu.html'); ?>

<form action="./log_agregarArt.php" method="POST" autocomplete="off" class="col-md-6" style="float:none; margin:auto; top: 30px;">
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input required name="descripcion" type="text" id="descripcion" class="form-control"  placeholder="Descripcion">
    </div>
    <div class="form-group">
        <label for="modelo">Modelo</label>
        <input required name="modelo" type="text" id="modelo" class="form-control"  placeholder="Modelo">
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input required name="precio" type="text" id="precio" class="form-control"  placeholder="Precio">
    </div>
    <div class="form-group">
        <label for="existencia">Existencia</label>
        <input required name="existencia" type="number" id="existencia" class="form-control"  placeholder="Existencia">
    </div>

    <div class="form-group">
        <a class="btn btn-secondary" href="./altas.php"><i ></i>Cancel</a>
        <button type="submit" class="btn btn-info" ><i ></i>Save</button>
    </div>
</form>

