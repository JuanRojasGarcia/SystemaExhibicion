<?php 

if (!isset($_GET['id_cen'])){
    exit();
}
$idu_centro = $_GET["id_cen"];
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();

$consulta ="select * from juan.get_centro_id($idu_centro);";
$result =  $connection->prepare($consulta); 
$result->execute();
$datos = $result->fetchAll();


// if (!$centros) {
//     echo "<script> console.log('No existe Centro'); </script>";
//     exit();
// }
?>

<?php include_once ('./menu.html'); ?>


<form action="./log_editarCen.php" method="POST" autocomplete="off" class="col-md-6" style="float:none; margin:auto; top: 10px;">
<input type="hidden" name="numCentro" value="<?php foreach($datos as $dato)   {echo $dato[0];} ?>">
    <div class="form-group">
        <label for="numCentro">Numero Centro</label>
        <input value="<?php foreach($datos as $dato)   {echo $dato[0];} ?>" required name="numCentro" type="number" id="numCentro" class="form-control"  placeholder="Numero de Centro" disabled="true">
    </div>
    <div class="form-group">
        <label for="nombreCen">Nombre</label>
        <input value="<?php foreach($datos as $dato)   {echo $dato[1];} ?>" required name="nombreCentro" type="text" id="nombreCen" class="form-control"  placeholder="Nombre Centro">
    </div>
    <div class="form-group">
        <a class="btn btn-secondary" href="./index.php"><i ></i>Cancel</a>
        <button type="submit" class="btn btn-info" ><i ></i>Save</button>
    </div>
</form>
