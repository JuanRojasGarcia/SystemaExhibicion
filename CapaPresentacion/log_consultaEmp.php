<?php

include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=localhost port=5433 dbname=postgres user=postgres") or die('Could not connect: ' . pg_last_error());
$output = '';
if(isset($_POST["query"])){
    $search = pg_escape_string($connect, $_POST["query"]);
    $query = "
    SELECT * FROM juan.cat_empleados 
    WHERE CAST(num_empleado AS TEXT) LIKE '%".$search."%'
    ";
}
else{
    $query = "
    SELECT * FROM juan.cat_empleados ORDER BY num_empleado
    ";
}
$result = pg_query($connect, $query);
if(pg_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive" style="text-align:center;">
   <table class="table">
   <thead class="thead-dark">
        <tr>
            <th># Empleado</th>
            <th>Centro</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
        </tr>
    </thead>
 ';
 while($row = pg_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["num_empleado"].'</td>
    <td>'.$row["idu_centro"].'</td>
    <td>'.$row["nombre_empleado"].'</td>
    <td>'.$row["apellido_empleado"].'</td>
    <td>'.$row["email_empleado"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
    echo "<script> console.log('Numero de empleado no existe'); </script>";
}

?>