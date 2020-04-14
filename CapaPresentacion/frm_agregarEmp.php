<?php include_once ('./menu.html'); ?>

<?php
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("SELECT idu_centro FROM juan.cat_centros;",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();

?>

<form action="./log_agregarEmp.php" method="POST" autocomplete="off" class="col-md-6" style="float:none; margin:auto; top: 10px;">
    <div class="form-group">
        <label for="numEmpleado">Numero Empleado</label>
        <input required name="numEmpleado" type="number" id="numEmpleado" class="form-control"  placeholder="Numero de Empleado">
    </div>
    <div class="form-group">
        <label for="iduCentro">Centros</label> <br>
        <select name="iduCentro" id="iduCentro">
            <option value=""> Choose </option>  
            <?php while ($centros = $consulta->fetchObject()) { ?>
            <option value="<?php echo $centros->idu_centro?> "> <?php echo $centros->idu_centro?> </option>  
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nombreEmp">Nombre</label>
        <input required name="nombreEmp" type="text" id="nombreEmp" class="form-control"  placeholder="Nombre Completo">
    </div>
    <div class="form-group">
        <label for="apellidoEmp">Apellido</label>
        <input required name="apellidoEmp" type="text" id="apellidoEmp" class="form-control"  placeholder="Apellido Completo">
    </div>
    <div class="form-group">
        <label for="correoEmp">Email</label>
        <input required name="correoEmp" type="email" id="correoEmp" class="form-control"  placeholder="Correo Electronico">
    </div>

    <div class="form-group">
        <a class="btn btn-secondary" href="./altas.php"><i ></i>Cancel</a>
        <button type="submit" class="btn btn-info" ><i ></i>Save</button>
    </div>
</form>



