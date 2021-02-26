<?php

include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$output = '';
if(isset($_POST["query"])){
    $search = $_POST["query"];
    $query = "select * from juan.Funcion_Consultar_Centro('%".$search."%',1);";
}
else{
    $query = "select * from juan.Funcion_Consultar_Centro('',2);";
}
$result =  $connection->prepare($query); 
$result->execute();
$datos = $result->fetchAll();
if($datos > 0)
{
 $output .= '
  <div class="table-responsive" style="text-align:center;">
   <table class="table table bordered">
   <thead class="thead-dark">
        <tr>
            <th># Centro</th>
            <th>Nombre</th>
        </tr>
    </thead>
 ';
 foreach($datos as $dato) 
 {
  $output .= '
   <tr>
    <td>'.$dato[0].'</td>
    <td>'.$dato[1].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
    echo "<script> console.log('Numero de Centro no existe'); </script>";
}

?>