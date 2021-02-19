<?php

include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$output = '';
if(isset($_POST["query"])){
    $search = $_POST["query"];
    $query = "select * from juan.Funcion_Consultar_Articulo('%".$search."%',1);";
}
else{
    $query = "select * from juan.Funcion_Consultar_Articulo('',2);";
}
$result =  $connection->prepare($query); 
$result->execute();
$datos = $result->fetchAll();
// $result = pg_query($connection, $query);
if($datos > 0)
{
 $output .= '
  <div class="table-responsive" style="text-align:center;">
   <table class="table table bordered">
   <thead class="thead-dark">
        <tr>
            <th># Articulo</th>
            <th>Descripcion</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Existencia</th>
        </tr>
    </thead>
 ';
 foreach($datos as $dato) 
 {
  $output .= '
   <tr>
    <td>'.$dato[0].'</td>
    <td>'.$dato[1].'</td>
    <td>'.$dato[2].'</td>
    <td>'.$dato[3].'</td>
    <td>'.$dato[4].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
    echo "<script> console.log('No Existe Producto'); </script>";
}

?>