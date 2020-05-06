
<?php
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("SELECT idu_venta, num_empleado, total, fecha FROM juan.cat_ventas;",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
?>

<div class="table-responsive" style="float:none; margin:auto;">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Folio</th>
                <th>Empleado ID</th>
                <th>Total</th>
                <th>Fecha</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($ventas = $consulta->fetchObject()) { ?>
            <tr>
                <td><?php echo $ventas->idu_venta?></td>
                <td><?php echo $ventas->num_empleado?></td>
                <td><?php echo number_format($ventas->total,2);?></td>
                <td><?php echo $ventas->fecha?></td>

                <td>
                    <a  href="<?php echo "./log_eliminarVen.php?idu_ven=" . $ventas->idu_venta ?>" onclick="return confirm('Are you sure to delete this Venta?');"><i class="fa fa-trash fa-lg btn-outline-danger" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

