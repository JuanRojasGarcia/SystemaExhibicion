<?php
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("SELECT idu_centro, nombre_centro FROM juan.cat_centros;",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
?>

<table class="table table-striped col-md-4" style="float:right;margin:auto;margin-right:60px;">
    <thead>
        <tr>
            <th>Numero Centro</th>
            <th>Nombre</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php while ($centros = $consulta->fetchObject()) { ?>
        <tr>
            <td><?php echo $centros->idu_centro?></td>
            <td><?php echo $centros->nombre_centro?></td>

            <td>
                <a  href="<?php echo "./frm_editarCen.php?id_cen=" . $centros->idu_centro ?>"><i class="fa fa-pencil fa-lg btn-outline-warning" aria-hidden="true"></i></a>
                <a  href="<?php echo "./log_eliminarCen.php?id_cen=" . $centros->idu_centro ?>" onclick="return confirm('Are you sure to delete this Article?');"><i class="fa fa-trash fa-lg btn-outline-danger" aria-hidden="true"></i></a>
            </td>
        </tr>
        <?php } ?>

    </tbody>
</table>

