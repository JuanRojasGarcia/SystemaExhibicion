<?php include_once ('./menu.html'); ?>

<form action="./log_agregarCen.php" method="POST" autocomplete="off" class="col-md-6" style="float:none; margin:auto; top: 10px;">
    <div class="form-group">
        <label for="numCentro">Numero Centro</label>
        <input required name="numCentro" type="number" id="numCentro" class="form-control"  placeholder="Numero de Centro">
    </div>
    <div class="form-group">
        <label for="nombreCen">Nombre</label>
        <input required name="nombreCentro" type="text" id="nombreCen" class="form-control"  placeholder="Nombre Centro">
    </div>
    <div class="form-group">
        <a class="btn btn-secondary" href="./altas.php"><i ></i>Cancel</a>
        <button type="submit" class="btn btn-info" ><i ></i>Save</button>
    </div>
</form>



