<?php 
    include_once "../../CapaNegocio/Empleados.php";
    $empleado = new Empleado();


    switch ($_REQUEST["iSwitch"]){
        case 1:
            if (!isset($_REQUEST["numEmpleado"]) ||  $_REQUEST["numEmpleado"] == 0 || $_REQUEST["iduCentro"] == '' || $_REQUEST["nombre"] == '' || $_REQUEST["apellido"] == '' || $_REQUEST["email"] == ''){
                echo $messageValid = "Agrege Todos Los Campos";
                exit();
            }

            $empleado->set_NumEmpleado($_REQUEST["numEmpleado"]);
            $empleado->set_IduCentro($_REQUEST["iduCentro"]);
            $empleado->set_Nombre($_REQUEST["nombre"]);
            $empleado->set_Apellido($_REQUEST["apellido"]);
            $empleado->set_Email($_REQUEST["email"]);
            $empleado->set_Opcion($_REQUEST["iopcion"]);
        
            $respuesta = $empleado->Func_Agregar_Empleado();
            $respuesta = pg_fetch_array($respuesta);
            $mensajeSuccess = "Se Agrego Correctamente";
            $mensajeError = "Numero Empelado Existente";
        
            // echo "<script> console.log('".print_r($respuesta)."'); </script>";

            if ($respuesta[0] == 1){
                echo $mensajeSuccess;
            }elseif($respuesta[0] == 2){
                echo $mensajeError;
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
            $mensajeSuccess = "Se Modifico Correctamente";
            $mensajeError = "Numero Empleado no Existe";
        
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
                $empleado->set_Search($_REQUEST["query"]);
                $empleado->set_Opcion($_REQUEST["iopcion"]);

                $respuesta = $empleado->Func_Consultar_Empleado();
                $row = pg_fetch_all($respuesta);
                //echo json_encode($respuesta);
            }else{
                $empleado->set_Opcion($_REQUEST["iopciondos"]);

                $respuesta= $empleado->Func_Get_Empleados();
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
                echo "<script> console.log('Numero de empleado no existe'); </script>";
            }

        break;
}

?>
