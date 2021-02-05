<?php 
    include_once "../../CapaNegocio/Centro.php";
    $centro = new Centros();

    switch ($_REQUEST["iSwitch"]){
        case 1:
            $centro->set_iduCentro($_REQUEST["iduCentro"]);
            $centro->set_nombreCentro($_REQUEST["nomCentro"]);
            $centro->set_Opcion($_REQUEST["iopcion"]);



            $respuesta = $centro->Func_Agregar_Centro();
            $mensaje = "Se Agrego Correctamente";
            $respuesta = pg_fetch_array($respuesta);


            // echo "<script> console.log('".print_r($respuesta)."'); </script>";

            if ($respuesta[0] = 1){
                echo $mensaje;
            }else{
                echo "Ocurrio un error.";
            }

        break;
        case 2:

            $centro->set_iduCentro($_REQUEST["iduCentro"]);
            $centro->set_nombreCentro($_REQUEST["nomCentro"]);
            $centro->set_Opcion($_REQUEST["iopcion"]);

            $respuesta = $centro->Func_Editar_Centro();
            $mensaje = "Se Modifico Correctamente";
            $respuesta = pg_fetch_array($respuesta);


            // echo "<script> console.log('".print_r($respuesta)."'); </script>";

            if ($respuesta[0] = 1){
                echo $mensaje;
            }else{
                echo "Ocurrio un error.";
            }

        break;
    }

?>
