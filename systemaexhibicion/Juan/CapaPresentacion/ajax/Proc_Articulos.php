<?php 
    include_once "../../CapaNegocio/Articulo.php";
    $articulo = new Articulo();


    switch ($_REQUEST["iSwitch"]){
        // Agregar Articulo
        case 1:
            if (!isset($_REQUEST["descripcion"]) || !isset($_REQUEST["precio"]) || !isset($_REQUEST["existencia"])){
                echo $messageValid = "Agrege Todos Los Campos";
                exit();
            }

            $articulo->set_Descripcion($_REQUEST["descripcion"]);
            $articulo->set_Modelo($_REQUEST["modelo"]) ;
            $articulo->set_Precio($_REQUEST["precio"]) ;
            $articulo->set_Existencia($_REQUEST["existencia"]);
            $articulo->set_Opcion($_REQUEST["iopcion"]);

            $respuesta = $articulo->Func_Agregar_Articulo();
            $respuesta = pg_fetch_array($respuesta);
            $mensajeSuccess = "Se Agrego Correctamente";
            $mensajeError = "Codigo Existente";

            // echo "<script> console.log('".$respuesta[0]."'); </script>";


            if ($respuesta[0] == ''){
                echo $mensajeSuccess;
            }elseif($respuesta[0] == 2){
                echo $mensajeError;
            }

        break; 
        // Modificar Articulo
        case 2:
            $articulo->set_Idu($_REQUEST["iduArticulo"]);
            $articulo->set_Descripcion($_REQUEST["descripcion"]);
            $articulo->set_Modelo($_REQUEST["modelo"]);
            $articulo->set_Precio($_REQUEST["precio"]);
            $articulo->set_Existencia($_REQUEST["existencia"]);
            $articulo->set_Opcion($_REQUEST["iopcion"]);
        
            $respuesta = $articulo->Func_Actualizar_Articulo();
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
        //Eliminar Articulo
        case 3:
            $articulo->set_Idu($_REQUEST["iduArticulo"]);
            $articulo->set_Opcion($_REQUEST["iopcion"]);
        
            $respuesta = $articulo->Func_Eliminar_Articulo();
            // $respuesta = pg_fetch_array($respuesta);
            $mensaje = "Se Elimino Correctamente";
        
            // echo "<script> console.log('".print_r($respuesta)."'); </script>";

            if ($respuesta[0] = 1){
                echo $mensaje;
            }else{
                echo "Ocurrio un error.";
            }
        break; 
        //Consultar Articulo 
        case 4:
            $output = '';
            if(isset($_REQUEST["query"])){
                $articulo->set_Search($_REQUEST["query"]);
                $articulo->set_Opcion($_REQUEST["iopcion"]);

                $respuesta = $articulo->Func_Consultar_Articulo();
                $row = pg_fetch_all($respuesta);
                //echo json_encode($respuesta);
            }else{
                $articulo->set_Opcion($_REQUEST["iopciondos"]);

                $respuesta= $articulo->Func_Get_Articulos();
                $row = pg_fetch_all($respuesta);
                //echo json_encode($respuesta);

            }
            // echo "<script> console.log('".json_encode($respuesta[0])."'); </script>";

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
                        <th># Articulo</th>
                        <th>Descripcion</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Existencia</th>
                    </tr>
                </thead>
             ';
             while ($row=pg_fetch_row($respuesta)){
              $output .= '
               <tr>
                <td>'.$row[0].'</td>
                <td>'.$row[1].'</td>
                <td>'.$row[2].'</td>
                <td>'.$row[3].'</td>
                <td>'.$row[4].'</td>
               </tr>
              ';
             }
             echo $output;
            }
            else
            {
                echo "<script> console.log('No Existe Producto'); </script>";
            }



        break;
        case 5:

            $articulo->set_Idu($_REQUEST["skuArt"]);
            $articulo->set_Descripcion($_REQUEST["descArt"]);
            $articulo->set_Modelo($_REQUEST["modelArt"]);


            $respuesta = $articulo->Func_Filtar_Articulo();
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
    }
?>
