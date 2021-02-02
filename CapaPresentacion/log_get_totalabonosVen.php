<?php  
include_once "../CapaDatos/conexion.php";
$connect = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin357") or die('Could not connect: ' . pg_last_error());
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
                $valueRadio = $totalApagar;
                $output .= 
                '<tr><th scope="row">' . $i . ' Pagos de' .
                '</th><td>' . number_format($importeAbono,2) . 
                '</td><td>' . 'Total a Pagar ' . number_format($totalApagar,2) . 
                '</td><td>' . 'Se Ahorra ' . number_format($importeAhorra,2) . 
                '</td><td>' . "<input type='radio' value='$valueRadio' id='pay_$i'  name='optradio' >" . 
                '</td></tr>';


                

            }
            echo $output;
            //echo "<script> console.log('.$totalApagar.'); </script>";


            //$enganchePor = $rowConf['enganche'];      
            //echo "<script> console.log('.$importe.",".$enganche.'); </script>";
            //echo "<script> console.log(' .$importe. '); </script>";
    }else{
        echo "<script> console.log('Total adeudo 0'); </script>";
    }
        //echo "<script> console.log( ".$_POST['id']."); </script>";
?>

<script>
    $(document).ready(function(){

        $('input[type="radio"]').click(function() {
            if($(this).attr('id') == 'pay_3') {
                $('#btnSave').show(); 
                $('#btnNext').hide();
            
            }else if($(this).attr('id') == 'pay_6') {
                $('#btnSave').show(); 
                $('#btnNext').hide();
            }else if($(this).attr('id') == 'pay_9') {
                $('#btnSave').show(); 
                $('#btnNext').hide();
            }else{
                $('#btnSave').show(); 
                $('#btnNext').hide();
            }
        }); 
    });
</script>