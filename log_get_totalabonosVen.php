<?php  
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=10.27.113.159 port=5432 dbname=pruebas user=sysexhibicion password=979fe4c465b2ed68f700ec7079cb120c") or die('Could not connect: ' . pg_last_error());
$output = '';

    if($_POST["totalAdeudo"] != null)  
    {  
        $consulta = "SELECT idu_configuracion, tasa_financiamiento, enganche, plazo_maximo FROM juan.configuracion;"; 
        $result = pg_query($connect, $consulta); 
        $row = pg_fetch_array($result);

        $tasaFinanc = $row["tasa_financiamiento"];
        $plazoMaximo = $row["plazo_maximo"];
        $totalAdeudo = $_POST["totalAdeudo"];
        $precioContado = $totalAdeudo / (1+ (($tasaFinanc * $plazoMaximo) / 100));

            for ($i = 3; $i <= $plazoMaximo; $i += 3) {
                $totalApagar = $precioContado * (1 + ($tasaFinanc * $i) / 100);
                $importeAbono = $totalApagar / $i;
                $importeAhorra = $totalAdeudo - $totalApagar;
                $valueRadio = $i / 3 - 1;
                $output .= 
                '<tr><th scope="row">' . $i . ' Pagos de' .
                '</th><td>' . $importeAbono . 
                '</td><td>' . 'Total a Pagar ' . $totalApagar . 
                '</td><td>' . 'Se Ahorra ' . $importeAhorra . 
                '</td><td>' . "<input type='radio' class='form-check-input' value='$valueRadio' id='pay_$i' name='payment'>" . 
                '</td></tr>';


            }
            echo $output;

            //$enganchePor = $rowConf['enganche'];      
            //echo "<script> console.log('.$importe.",".$enganche.'); </script>";
            //echo "<script> console.log(' .$importe. '); </script>";
    }else{
        echo "<script> console.log('Total adeudo 0'); </script>";
    }
        //echo "<script> console.log( ".$_POST['id']."); </script>";
?>
