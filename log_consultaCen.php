<?php

include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
$output = '';
if(isset($_POST["query"])){
    $search = pg_escape_string($connect, $_POST["query"]);
    $query = "
    SELECT * FROM juan.cat_centros
    WHERE CAST(idu_centro AS TEXT) LIKE '%".$search."%'
    ";
}
else{
    $query = "
    SELECT * FROM juan.cat_centros ORDER BY idu_centro
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
            <th># Centro</th>
            <th>Nombre</th>
        </tr>
    </thead>
 ';
 while($row = pg_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["idu_centro"].'</td>
    <td>'.$row["nombre_centro"].'</td>
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