
<?php
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$consulta = $connection->prepare("select * from juan.get_data_Ventas();",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
$datos = $consulta->fetchAll();
?>

<div class="table-responsive" style="float:none; margin:auto;">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Folio</th>
                <th>Empleado</th>
                <th>Total</th>
                <th>Fecha</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos as $dato) { ?>
            <tr>
                <td><?php echo $dato[0];?></td>
                <td><?php echo $dato[1]. " " .$dato[2]?></td>
                <td><?php echo number_format($dato[3],2);?></td>
                <td><?php echo $dato[4];?></td>

                <td>
                    <a  href="<?php echo "./log_eliminarVen.php?idu_ven=" . $dato[0];  ?>" onclick="return confirm('Are you sure to delete this Venta?');"><i class="fa fa-trash fa-lg btn-outline-danger" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
</div>