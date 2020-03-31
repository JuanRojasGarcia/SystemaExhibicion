<?php
include_once "../CapaDatos/conexion.php";
$consulta = $connection->prepare("SELECT num_empleado, idu_centro, nombre_empleado, apellido_empleado, email_empleado FROM juan.cat_empleados;",[
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$consulta->execute();
?>

<table class="table table-striped col-md-6" style="float:left;margin:auto;margin-left:30px;">
    <thead>
        <tr>
            <th>Numero Empleado</th>
            <th>Centro</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php while ($empleados = $consulta->fetchObject()) { ?>
        <tr>
            <td><?php echo $empleados->num_empleado?></td>
            <td><?php echo $empleados->idu_centro?></td>
            <td><?php echo $empleados->nombre_empleado?></td>
            <td><?php echo $empleados->apellido_empleado?></td>
            <td><?php echo $empleados->email_empleado?></td>

            <td>
                <a  href="<?php echo "./frm_editarEmp.php?id_emp=" . $empleados->num_empleado ?>"><i class="fa fa-pencil fa-lg btn-outline-warning" aria-hidden="true"></i></a>
                <a  href="<?php echo "./log_eliminarEmp.php?id_emp=" . $empleados->num_empleado ?>" onclick="return confirm('Are you sure to delete this Article?');"><i class="fa fa-trash fa-lg btn-outline-danger" aria-hidden="true"></i></a>
            </td>
        </tr>
        <?php } ?>

    </tbody>
</table>

