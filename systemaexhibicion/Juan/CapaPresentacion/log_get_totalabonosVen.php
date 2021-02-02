<?php  
include_once "../CapaDatos/conexion.php";
$objeto = new Conexion();
$connection = $objeto->Connect();
$output = '';

    if($_POST["totalAdeudo"] != null)  
    {  
        $consulta = "select * from juan.get_configuracion();"; 
        $result =  $connection->prepare($consulta); 
        $result->execute();
        $datos = $result->fetchAll();
        foreach($datos as $dato)   
        {
            $tasaFinanc =$dato[1];;
            $plazoMaximo =$dato[3];;
            $totalAdeudo = $_POST["totalAdeudo"];
            $precioContado = $totalAdeudo / (1+ (($tasaFinanc * $plazoMaximo) / 100));
        }


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