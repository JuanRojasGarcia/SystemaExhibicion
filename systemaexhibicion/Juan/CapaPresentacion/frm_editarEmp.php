<?php 
   echo "<script> console.log('aqui'); </script>";
if (!isset($_GET['id_emp'])){
    echo "<script> console.log('aqui no man'); </script>";
    exit();
}
echo "<script> console.log('aqui no'); </script>";
$num_empleado = $_GET["id_emp"];
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();

$consulta = "select * from juan.get_empleado_id($num_empleado);";
$result =  $connection->prepare($consulta); 
$result->execute();
$datos = $result->fetchAll();

// if (!$empleados) {
//     echo "<script> console.log('No existe Empleado'); </script>";
//     exit();
// }
?>

<?php include_once ('./menu.html'); ?>

<form action="./log_editarEmp.php" method="POST" autocomplete="off" class="col-md-6" style="float:none; margin:auto; top: 10px;">
<input type="hidden" name="numEmpleado" value="<?php foreach($datos as $dato)   {echo $dato[0];} ?>">
   <div class="form-group">
        <label for="numEmpleado">Numero Empleado</label>
        <input value="<?php foreach($datos as $dato)   {echo $dato[0];} ?>" required name="numEmpleado" type="number" id="numEmpleado" class="form-control"  placeholder="Numero de Empleado" disabled="true">
    </div>
    <div class="form-group">
        <label for="iduCentro">Centro</label>
        <input value="<?php foreach($datos as $dato)   {echo $dato[1];}  ?>" required name="iduCentro" type="text" id="iduCentro" class="form-control"  placeholder="Numero Centro">
    </div>
    <div class="form-group">
        <label for="nombreEmp">Nombre</label>
        <input value="<?php foreach($datos as $dato)   {echo $dato[2];} ?>" required name="nombreEmp" type="text" id="nombreEmp" class="form-control"  placeholder="Nombre Completo">
    </div>
    <div class="form-group">
        <label for="apellidoEmp">Apellido</label>
        <input value="<?php foreach($datos as $dato)   {echo $dato[3];}  ?>" required name="apellidoEmp" type="text" id="apellidoEmp" class="form-control"  placeholder="Apellido Completo">
    </div>
    <div class="form-group">
        <label for="correoEmp">Email</label>
        <input value="<?php foreach($datos as $dato)   {echo $dato[4];}  ?>" required name="correoEmp" type="email" id="correoEmp" class="form-control"  placeholder="Correo Electronico">
    </div>

    <div class="form-group">
        <a class="btn btn-secondary" href="./index.php"><i ></i>Cancel</a>
        <button type="submit" class="btn btn-info" ><i ></i>Save</button>
    </div>
</form>

