<?php
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$consulta = $connection->prepare("select * from juan.get_data_Articulos();",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
$datos = $consulta->fetchAll();
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
            <?php foreach($datos as $dato) {  ?>
            <tr>
                <td><?php  echo $dato[1]; ?></td>
                <td><?php  echo $dato[2]; ?></td>
                <td><?php echo number_format($dato[3],2);?></td>
                <td><?php echo $dato[4]; ?></td>

                <td>
                    <a  href="<?php echo "./frm_editarArt.php?id_art=" .  $dato[0]; ?>"><i class="fa fa-pencil fa-lg btn-outline-warning" aria-hidden="true"></i></a>
                    <a  href="<?php echo "./log_eliminarArt.php?id_art=" .  $dato[0];?>" onclick="return confirm('Are you sure to delete this Article?');" id="eliminarArticulo"><i class="fa fa-trash fa-lg btn-outline-danger" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>