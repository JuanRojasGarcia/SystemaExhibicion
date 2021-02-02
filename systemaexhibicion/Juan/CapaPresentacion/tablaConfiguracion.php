
<?php
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$consulta = $connection->prepare("select * from juan.get_configuracion();",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
$datos = $consulta->fetchAll();
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
            <?php foreach($datos as $dato) {  ?>
            <tr>
                <td><?php echo $dato[1];?></td>
                <td><?php echo $dato[2];?></td>
                <td><?php echo $dato[3];?></td>

                <td>
                    <a  href="<?php echo "./log_eliminarConf.php?id_conf=" . $dato[0] ?>" onclick="return confirm('Are you sure to delete this Article?');"><i class="fa fa-trash fa-lg btn-outline-danger" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

