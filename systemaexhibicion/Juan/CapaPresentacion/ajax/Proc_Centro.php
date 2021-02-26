<?php 
    include_once "../../CapaNegocio/Centro.php";
    $centro = new Centros();

    switch ($_REQUEST["iSwitch"]){
        case 1:
                $centro->set_iduCentro($_REQUEST["iduCentro"]);
                $centro->set_nombreCentro($_REQUEST["nomCentro"]);
                $centro->set_Opcion($_REQUEST["iopcion"]);

                $respuesta = $centro->Func_Agregar_Centro();
                $respuesta = pg_fetch_array($respuesta);
                $mensajeSuccess = "Se Agrego Correctamente";
                $mensajeError = "Codigo Existente";

                // echo "<script> console.log('".$respuesta[0]."'); </script>";

                if ($respuesta[0] == 1){
                    echo $mensajeSuccess;
                }elseif($respuesta[0] == 2){
                    echo $mensajeError;
                } 
            
 
        break;
        case 2:

            $centro->set_iduCentro($_REQUEST["numCentroVal"]);
            $centro->set_nombreCentro($_REQUEST["nomCentroVal"]);
            $centro->set_Opcion($_REQUEST["iopcion"]);

            $respuesta = $centro->Func_Editar_Centro();
            $respuesta = pg_fetch_array($respuesta);
            $mensajeSuccess = "Se Modifico Correctamente";
            $mensajeError = "El Codigo no Existe";


            // echo "<script> console.log('".print_r($respuesta)."'); </script>";
            if ($respuesta[0] == 1){
                echo $mensajeSuccess;
            }elseif($respuesta[0] == 2){
                echo $mensajeError;
            }

        break;
        case 4:
            $output = '';
            if(isset($_REQUEST["query"])){
                $centro->set_Search($_REQUEST["query"]);
                $centro->set_Opcion($_REQUEST["iopcion"]);

                $respuesta = $centro->Func_Consultar_Centro();
                $row = pg_fetch_all($respuesta);
                echo json_encode($respuesta);
            }else{
                $centro->set_Opcion($_REQUEST["iopciondos"]);

                $respuesta= $centro->Func_Get_Centros();
                $row = pg_fetch_all($respuesta);
                echo json_encode($respuesta);

            }
            // echo "<script> console.log('".print_r($respuesta)."'); </script>";

            // while ($row=pg_fetch_row($respuesta)){
            //     echo $row[0]. " " . $row[1]. "<br />";
        
            // }

            if($respuesta > 0)
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
             while ($row=pg_fetch_row($respuesta)){
              $output .= '
               <tr>
                <td>'.$row[0].'</td>
                <td>'.$row[1].'</td>
               </tr>
              ';
             }
             echo $output;
            }
            else
            {
                echo "<script> console.log('Numero de Centro no existe'); </script>";
            }



        break;
        case 5:

            $centro->set_iduCentro($_REQUEST["iduCentro"]);
            $centro->set_nombreCentro($_REQUEST["nomCentro"]);

            $respuesta = $centro->Func_Filtar_Centros();
            $row = pg_fetch_all($respuesta);

            // echo "<script> console.log('".$respuesta[0])."'); </script>";

            // while ($row=pg_fetch_row($respuesta)){
            //     echo $row[0]. " " . $row[1]. "<br />";
        
            // }

            // echo "<script> console.log('".$respuesta[0]."'); </script>";


                while ($row=pg_fetch_row($respuesta))
                { 

                    echo $row[0];
                // $customers[] = array(
                //     'idu_centro' => $row[0],
                //     'nombre_centro' => $row[0]
                // );
                // echo json_encode($customers);
                // echo "<script> console.log('".print_r($customers)."'); </script>";

                }
            // echo json_encode($customers);
            // echo "<script> console.log('".$customers[0]."'); </script>";
        break;
        case 6:

            $centro->set_iduCentro($_REQUEST["iduCentro"]);
            $centro->set_Opcion($_REQUEST["iopcion"]);

            $respuesta = $centro->Func_Eliminar_Centro();
            $respuesta = pg_fetch_array($respuesta);
            $mensajeSuccess = "Se Elimino Correctamente";
            $mensajeError = "Ocurrio un Error. Numero centro no Existe";
        
            if ($respuesta[0] == 1){
                echo $mensajeSuccess;
            }elseif($respuesta[0] == 2){
                echo $mensajeError;
            }
    
        break;

        case 7:
            $respuesta = $centro->Func_Get_AllCentros();
            $row = pg_fetch_all($respuesta);

            $rows = [];

            while ($row = pg_fetch_row($respuesta)){
                $rows[] = array(
                    'idu_centro' => $row[0],
                    'nombre_centro' => $row[1]
                );
            }
            echo json_encode($rows);
        break;
        case 8:
            $centro->set_Opcion($_REQUEST["iopcion"]);
            $respuesta = $centro->Func_Count_Centros();
            $row = pg_fetch_row($respuesta);

            echo $row[0];
            
        break;
        
    }

?>
