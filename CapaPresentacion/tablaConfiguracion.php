
<?php
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("SELECT idu_configuracion, tasa_financiamiento, enganche, plazo_maximo FROM juan.configuracion;",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
?>

<div class="table-responsive" style="float:none; margin:auto;">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Tasa Financiamiento</th>
                <th>% Enganche</th>
                <th>Plazo Maximo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($configuracion = $consulta->fetchObject()) { ?>
            <tr>
                <td><?php echo $configuracion->tasa_financiamiento?></td>
                <td><?php echo $configuracion->enganche?></td>
                <td><?php echo $configuracion->plazo_maximo?></td>

                <td>
                    <a  href="<?php echo "./log_eliminarConf.php?id_conf=" . $configuracion->idu_configuracion ?>" onclick="return confirm('Are you sure to delete this Article?');"><i class="fa fa-trash fa-lg btn-outline-danger" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

