

<?php
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("SELECT idu_articulo, descripcion, modelo, precio, existencia FROM juan.cat_articulos;",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
?>

<div class="table-responsive" style="float:none; margin:auto;">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Descripcion</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($articulos = $consulta->fetchObject()) { ?>
            <tr>
                <td><?php echo $articulos->descripcion?></td>
                <td><?php echo $articulos->modelo?></td>
                <td><?php echo $articulos->precio?></td>
                <td><?php echo $articulos->existencia?></td>

                <td>
                    <a  href="<?php echo "./frm_editarArt.php?id_art=" . $articulos->idu_articulo ?>"><i class="fa fa-pencil fa-lg btn-outline-warning" aria-hidden="true"></i></a>
                    <a  href="<?php echo "./log_eliminarArt.php?id_art=" . $articulos->idu_articulo ?>" onclick="return confirm('Are you sure to delete this Article?');"><i class="fa fa-trash fa-lg btn-outline-danger" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
