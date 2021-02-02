<?php

include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin357") or die('Could not connect: ' . pg_last_error());
$output = '';
if(isset($_POST["query"])){
    $search = pg_escape_string($connect, $_POST["query"]);
    $query = "
    SELECT * FROM juan.cat_articulos 
    WHERE descripcion LIKE '%".$search."%'
    ";
}
else{
    $query = "
    SELECT * FROM juan.cat_articulos ORDER BY idu_articulo
    ";
}
$result = pg_query($connect, $query);
if(pg_num_rows($result) > 0)
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
 while($row = pg_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["idu_articulo"].'</td>
    <td>'.$row["descripcion"].'</td>
    <td>'.$row["modelo"].'</td>
    <td>'.$row["precio"].'</td>
    <td>'.$row["existencia"].'</td>
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