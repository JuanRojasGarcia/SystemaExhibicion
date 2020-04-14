<?php 
   echo "<script> console.log('aqui'); </script>";
if (!isset($_GET['id_emp'])){
    echo "<script> console.log('aqui no man'); </script>";
    exit();
}
echo "<script> console.log('aqui no'); </script>";
$num_empleado = $_GET["id_emp"];
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("SELECT num_empleado, idu_centro, nombre_empleado, apellido_empleado, email_empleado FROM juan.cat_empleados WHERE num_empleado = ?;");
$consulta->execute([$num_empleado]);
$empleados = $consulta->fetchObject();
if (!$empleados) {
    echo "<script> console.log('No existe Empleado'); </script>";
    exit();
}
?>

<?php include_once ('./menu.html'); ?>

<form action="./log_editarEmp.php" method="POST" autocomplete="off" class="col-md-6" style="float:none; margin:auto; top: 10px;">
<input type="hidden" name="numEmpleado" value="<?php echo $empleados->num_empleado; ?>">
   <div class="form-group">
        <label for="numEmpleado">Numero Empleado</label>
        <input value="<?php echo $empleados->num_empleado; ?>" required name="numEmpleado" type="number" id="numEmpleado" class="form-control"  placeholder="Numero de Empleado" disabled="true">
    </div>
    <div class="form-group">
        <label for="iduCentro">Centro</label>
        <input value="<?php echo $empleados->idu_centro; ?>" required name="iduCentro" type="text" id="iduCentro" class="form-control"  placeholder="Numero Centro">
    </div>
    <div class="form-group">
        <label for="nombreEmp">Nombre</label>
        <input value="<?php echo $empleados->nombre_empleado; ?>" required name="nombreEmp" type="text" id="nombreEmp" class="form-control"  placeholder="Nombre Completo">
    </div>
    <div class="form-group">
        <label for="apellidoEmp">Apellido</label>
        <input value="<?php echo $empleados->apellido_empleado; ?>" required name="apellidoEmp" type="text" id="apellidoEmp" class="form-control"  placeholder="Apellido Completo">
    </div>
    <div class="form-group">
        <label for="correoEmp">Email</label>
        <input value="<?php echo $empleados->email_empleado; ?>" required name="correoEmp" type="email" id="correoEmp" class="form-control"  placeholder="Correo Electronico">
    </div>

    <div class="form-group">
        <a class="btn btn-secondary" href="./index.php"><i ></i>Cancel</a>
        <button type="submit" class="btn btn-info" ><i ></i>Save</button>
    </div>
</form>

