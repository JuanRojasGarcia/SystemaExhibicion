<?php 
    include_once "../../CapaNegocio/Articulo.php";
    $articulo = new Articulo();


    switch ($_REQUEST["iSwitch"]){
        case 1:
            $articulo->set_Descripcion($_REQUEST["descripcion"]);
            $articulo->set_Modelo($_REQUEST["modelo"]);
            $articulo->set_Precio($_REQUEST["precio"]);
            $articulo->set_Existencia($_REQUEST["existencia"]);
            $articulo->set_Opcion($_REQUEST["iopcion"]);
        
            $respuesta = $articulo->Func_Agregar_Articulo();
            $respuesta = pg_fetch_array($respuesta);
            $mensaje = "Se Agrego Correctamente";
        
            echo "<script> console.log('".print_r($respuesta)."'); </script>";

            if ($respuesta[0] = 1){
                echo $mensaje;
            }else{
                echo "Ocurrio un error.";
            }
        break;
        case 2:
            $articulo->set_Idu($_REQUEST["iduArticulo"]);
            $articulo->set_Descripcion($_REQUEST["descripcion"]);
            $articulo->set_Modelo($_REQUEST["modelo"]);
            $articulo->set_Precio($_REQUEST["precio"]);
            $articulo->set_Existencia($_REQUEST["existencia"]);
            $articulo->set_Opcion($_REQUEST["iopcion"]);
        
            $respuesta = $articulo->Func_Actualizar_Articulo();
            $respuesta = pg_fetch_array($respuesta);
            $mensaje = "Se Modifico Correctamente";
        
            // echo "<script> console.log('".print_r($respuesta)."'); </script>";

            if ($respuesta[0] = 1){
                echo $mensaje;
            }else{
                echo "Ocurrio un error.";
            }
        break;
        // case 3:
        //     $articulo->set_Idu($_REQUEST["iduArticulo"]);
        
        //     $respuesta = $articulo->Func_Eliminar_Articulo();
        //     $respuesta = pg_fetch_array($respuesta);
        //     $mensaje = "Se Elimino Correctamente";
        
        //     // echo "<script> console.log('".print_r($respuesta)."'); </script>";

        //     if ($respuesta[0] = 1){
        //         echo $mensaje;
        //     }else{
        //         echo "Ocurrio un error.";
        //     }
        // break;
    }

?>
