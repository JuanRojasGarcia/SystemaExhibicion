<?php 
   echo "<script> console.log('aqui'); </script>";
if (!isset($_GET['id_art'])){
    echo "<script> console.log('aqui no man'); </script>";
    exit();
}
echo "<script> console.log('aqui no'); </script>";
$idu_articulo = $_GET["id_art"];
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("SELECT idu_articulo, descripcion, modelo, precio, existencia FROM juan.cat_articulos WHERE idu_articulo = ?;");
$consulta->execute([$idu_articulo]);
$articulos = $consulta->fetchObject();
if (!$articulos) {
    echo "<script> console.log('No existe Articulo'); </script>";
    exit();
}
?>

<?php include_once ('./menu.html'); ?>


<form action="./log_editarArt.php" method="POST" autocomplete="off" class="col-md-6" style="float:none; margin:auto; top: 30px;">
<input type="hidden" name="iduArticulo" value="<?php echo $articulos->idu_articulo; ?>">
    <div class="form-group">
        <label for="iduArticulo">ID Articulo</label>
        <input value="<?php echo $articulos->idu_articulo; ?>" required name="iduArticulo" type="text" id="iduArticulo" class="form-control"  placeholder="Idu Articulo" disabled="true">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input value="<?php echo $articulos->descripcion; ?>" required name="descripcion" type="text" id="descripcion" class="form-control"  placeholder="Descripcion">
    </div>
    <div class="form-group">
        <label for="modelo">Modelo</label>
        <input value="<?php echo $articulos->modelo; ?>" required name="modelo" type="text" id="modelo" class="form-control"  placeholder="Modelo">
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input value="<?php echo $articulos->precio; ?>" required name="precio" type="text" id="precio" class="form-control"  placeholder="Precio">
    </div>
    <div class="form-group">
        <label for="existencia">Existencia</label>
        <input value="<?php echo $articulos->existencia; ?>" required name="existencia" type="number" id="existencia" class="form-control"  placeholder="Existencia">
    </div>

    <div class="form-group">
        <a class="btn btn-secondary" href="./altas.php"><i ></i>Cancel</a>
        <button type="submit" class="btn btn-info" ><i ></i>Save</button>
    </div>
</form>