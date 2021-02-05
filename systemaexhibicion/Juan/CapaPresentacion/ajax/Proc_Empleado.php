<?php 
    include_once "../../CapaNegocio/Empleados.php";
    $empleado = new Empleado();


    switch ($_REQUEST["iSwitch"]){
        case 1:
            $empleado->set_NumEmpleado($_REQUEST["numEmpleado"]);
            $empleado->set_IduCentro($_REQUEST["iduCentro"]);
            $empleado->set_Nombre($_REQUEST["nombre"]);
            $empleado->set_Apellido($_REQUEST["apellido"]);
            $empleado->set_Email($_REQUEST["email"]);
            $empleado->set_Opcion($_REQUEST["iopcion"]);
        
            $respuesta = $empleado->Func_Agregar_Empleado();
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
            $empleado->set_NumEmpleado($_REQUEST["numEmpleado"]);
            $empleado->set_IduCentro($_REQUEST["iduCentro"]);
            $empleado->set_Nombre($_REQUEST["nombre"]);
            $empleado->set_Apellido($_REQUEST["apellido"]);
            $empleado->set_Email($_REQUEST["email"]);
            $empleado->set_Opcion($_REQUEST["iopcion"]);
        
            $respuesta = $empleado->Func_Actualizar_Empleado();
            $respuesta = pg_fetch_array($respuesta);
            $mensaje = "Se Modifico Correctamente";
        
            // echo "<script> console.log('".print_r($respuesta)."'); </script>";

            if ($respuesta[0] = 1){
                echo $mensaje;
            }else{
                echo "Ocurrio un error.";
            }
        break;
    }

?>
