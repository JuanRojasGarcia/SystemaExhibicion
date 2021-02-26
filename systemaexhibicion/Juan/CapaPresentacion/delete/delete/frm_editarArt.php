<?php 
   echo "<script> console.log('aqui'); </script>";
if (!isset($_GET['id_art'])){
    echo "<script> console.log('aqui no man'); </script>";
    exit();
}
echo "<script> console.log('aqui no'); </script>";
$idu_articulo = $_GET["id_art"];
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();

$consulta = "select * from juan.get_artciulo_id($idu_articulo);";
$result =  $connection->prepare($consulta); 
$result->execute();
$datos = $result->fetchAll();
// if (!$articulos) {
//     echo "<script> console.log('No existe Articulo'); </script>";
//     exit(); 
// }
?>

<?php include_once ('./menu.html'); ?>


<form  autocomplete="off" class="col-md-6" style="float:none; margin:auto; top: 30px;">
<input type="hidden" name="iduArticulo" value="<?php foreach($datos as $dato)   {echo $dato[0];}  ?>">
    <div class="form-group">
        <label for="iduArticulo">ID Articulo</label>
        <input value="<?php foreach($datos as $dato)   {echo $dato[0];} ?>" required name="iduArticulo" type="text" id="iduArticuloEdit" class="form-control"  placeholder="Idu Articulo" disabled="true">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input value="<?php foreach($datos as $dato)   {echo $dato[1];}?>" required name="descripcion" type="text" id="descripcionEdit" class="form-control"  placeholder="Descripcion">
    </div>
    <div class="form-group">
        <label for="modelo">Modelo</label>
        <input value="<?php  foreach($datos as $dato)   {echo $dato[2];} ?>" required name="modelo" type="text" id="modeloEdit" class="form-control"  placeholder="Modelo">
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input value="<?php  foreach($datos as $dato)   {echo $dato[3];}?>" required name="precio" type="text" id="precioEdit" class="form-control"  placeholder="Precio">
    </div>
    <div class="form-group">
        <label for="existencia">Existencia</label>
        <input value="<?php foreach($datos as $dato)   {echo $dato[4];}?>" required name="existencia" type="number" id="existenciaEdit" class="form-control"  placeholder="Existencia">
    </div>

    <div class="form-group">
        <a class="btn btn-secondary" href="./altas.php"><i ></i>Cancel</a>
        <button type="button" class="btn btn-info" id="saveEditar"><i ></i>Save</button>
    </div>
</form>
<script src="js/js_altas.js"></script>
