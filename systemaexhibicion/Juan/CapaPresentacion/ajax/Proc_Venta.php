<?php 
    include_once "../../CapaNegocio/Ventas.php";
    $venta = new Venta();


    switch ($_REQUEST["iSwitch"]){
        case 1:
            $venta->set_Idu(0);
            $venta->set_NumEmpleado($_REQUEST["numEmpleado"]);
            $venta->set_Total($_REQUEST["totalApagar"]) ;
            $venta->set_Fecha($_REQUEST["fecha"]) ;
            $venta->set_Opcion($_REQUEST["iopcion"]);

            $respuesta = $venta->Func_Agregar_Venta();
            $respuesta = pg_fetch_array($respuesta);
            $mensaje = "Se Agrego Correctamente";
            $mesaggeError = "Error";
        
            // echo "<script> console.log('".print_r($respuesta)."'); </script>";

            if ($respuesta[0] == 1){
                echo $mensaje;
            }elseif($respuesta[0] == 2){
                echo $mesaggeError;
            }
        break;
        case 2:
            $venta->set_Idu($_REQUEST["iduArticulo"]);
            $venta->set_NumEmpleado($_REQUEST["descripcion"]);
            $venta->set_Total($_REQUEST["modelo"]) ;
            $venta->set_Fecha($_REQUEST["precio"]) ;
            $venta->set_Opcion($_REQUEST["iopcion"]);
        
            $respuesta = $venta->Func_Actualizar_Venta();
            $respuesta = pg_fetch_array($respuesta);
            $mensaje = "Se Modifico Correctamente";
        
            // echo "<script> console.log('".print_r($respuesta)."'); </script>";

            if ($respuesta[0] = 1){
                echo $mensaje;
            }else{
                echo "Error.";
            }
        break;
        case 3:
            $output = '';
            $venta->set_Idu($_REQUEST["id"]);

            $respuesta = $venta->Func_Get_Email();
            $respuesta = pg_fetch_array($respuesta);
            // echo "<script> console.log(' .$respuesta[0]. '); </script>";

            echo $output .= '<span> Email: </span>' . $respuesta[0];
        break; 
        case 4: 
            // $output = '';
            $respuestaConf = $venta->Func_Get_Data_Configuracion();
            $respuestaConf = pg_fetch_array($respuestaConf);

            $venta->set_Idu($_REQUEST["id"]);
            $respuesta = $venta->Func_Get_ArticuloById();
            $respuesta = pg_fetch_array($respuesta);

            $tasaFinanc = $respuestaConf[1];
            $plazoMaximo = $respuestaConf[3];

            $precio = $respuesta[3];
            $id = $respuesta[0];


            $precioInt = $precio * (1 + ($tasaFinanc * $plazoMaximo) / 100);

            // echo $output .= 
            // '<tr><td>' . $respuesta[1] . 
            // '</td><td>' . $respuesta[2] . 
            // '</td><td>' . '<input id="cantidadArt" name="cantidadArt" class="qty" value="0" type="number" min="0">' . 
            // '</td><td id="idPrecio" name="idPrecio">' .  number_format($precioInt,2)  .
            // '</td><td id="importeArt" class="rowAmount">' . '0' .
            // '</td></tr>';    
            echo ",".$respuesta[0].",".$respuesta[1].",". $respuesta[2].",".number_format($precioInt,2,'.','').",";


            // echo "<script> console.log(' .$respuesta[0]. '); </script>";
            // echo "<script> console.log(' .$respuestaConf[0]. '); </script>";

        break;
        case 5:

            $venta->set_NomEmpleado($_REQUEST["nomEmpleado"]);
            $venta->set_ApellEmpleado($_REQUEST["apellEmpleado"]) ;
            $venta->set_FechaIni($_REQUEST["fechaIni"]) ;
            $venta->set_FechaFin($_REQUEST["fechaFin"]);

            $respuesta = $venta->Func_Filtar_Venta();
            $row = pg_fetch_all($respuesta);

            // echo "<script> console.log('".$respuesta[0])."'); </script>";

            // while ($row=pg_fetch_row($respuesta)){
            //     echo $row[0]. " " . $row[1]. "<br />";
        
            // }

            // echo "<script> console.log('".$row[0]."'); </script>";


                while ($row=pg_fetch_row($respuesta))
                {

                    echo $row[0];
                    // echo json_encode($customers);


                    // $customers[] = array(
                    //     'idu_venta' => $row[0],
                    //     'num_empleado' => $row[1],
                    //     'nombre_empleado' => $row[2],
                    //     'apellido_empleado' => $row[3],
                    //     'total' => $row[4],
                    //     'fecha' => $row[5]
                    // );
                // echo json_encode($customers);
                // echo "<script> console.log('".print_r($customers)."'); </script>";

                }
            // echo json_encode($customers);
            // echo "<script> console.log('".$customers[0]."'); </script>";
        break;
        case 6:
            $respuestaConf = $venta->Func_Get_Data_Configuracion();
            $respuestaConf = pg_fetch_array($respuestaConf);

 

            $tasaFinanc =  $respuestaConf[1];
            $plazoMaximo = $respuestaConf[3];
            $enganchePor = $respuestaConf[2];
            

            $importe  = $_REQUEST["precioInt"] * $_REQUEST["cantidad"];
            $enganche = ($enganchePor / 100) * $importe;
            $bonEnganche = $enganche * (($tasaFinanc * $plazoMaximo) / 100);
            $total = $importe - $enganche - $bonEnganche;
            echo ",".number_format($importe,2, '.', '').",".number_format($enganche,2, '.', '').",".number_format($bonEnganche,2, '.', '').",".number_format($total,2, '.', '').","; 
        break;
        case 7:
            $output = '';
            $respuestaConf = $venta->Func_Get_Data_Configuracion();
            $respuestaConf = pg_fetch_array($respuestaConf);


            $tasaFinanc =$respuestaConf[1];;
            $plazoMaximo =$respuestaConf[3];;
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
        break;
    }


?>







