<?php
include_once "../../CapaNegocio/Configuracion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$consulta = $connection->prepare("select * from juan.get_all_Centros();");
$consulta->execute();
$datos = $consulta->fetchAll();

$rows = [];
// while ($row = pg_fetch_array($temp))
// {

// // echo $row[0];
// $rows[] = array(
//     'idu_centro' => $row[0],
//     'nombre_centro' => $row[1]
// );
// // echo json_encode($customers);
// // echo "<script> console.log('".print_r($customers)."'); </script>";

// }
// $json = json_encode($rows);

foreach ($datos as $dato){
    $rows[] = array(
            'idu_centro' => $dato[0],
            'nombre_centro' => $dato[1]
        );
}
echo json_encode($rows);
?>