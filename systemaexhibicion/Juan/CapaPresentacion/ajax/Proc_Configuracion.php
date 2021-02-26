<?php 
    include_once "../../CapaNegocio/Configuracion.php";
    $configuracion = new Configuracion();


    switch ($_REQUEST["iSwitch"]){
        case 1:
            $configuracion->set_TasaFinancimiento($_REQUEST["tasaFinanc"]);
            $configuracion->set_Enganche($_REQUEST["enganche"]);
            $configuracion->set_PlazoMaximo($_REQUEST["plazoMaximo"]);
            $configuracion->set_Opcion($_REQUEST["iopcion"]);
        
            $respuesta = $configuracion->Func_Agregar_Configuracion();
            $respuesta = pg_fetch_array($respuesta);
            $mensajeSuccess = "Se Agrego Correctamente";
            $mensajeError = "Configuracion Existente";
        
            if ($respuesta[0] == 1){
                echo $mensajeSuccess;
            }elseif($respuesta[0] == 2){
                echo $mensajeError;
            }

        break;
        case 2:
            $configuracion->set_IduConfig($_REQUEST["iduconfig"]);
            $configuracion->set_TasaFinancimiento($_REQUEST["tasaFinanc"]);
            $configuracion->set_Enganche($_REQUEST["enganche"]);
            $configuracion->set_PlazoMaximo($_REQUEST["plazoMaximo"]);
            $configuracion->set_Opcion($_REQUEST["iopcion"]);
        
            $respuesta = $configuracion->Func_Actualizar_Configuracion();
            $respuesta = pg_fetch_array($respuesta);
            $mensajeSuccess = "Se Modifico Correctamente";
            $mensajeError = "Configuracion no Existe";
        
            if ($respuesta[0] == 1){
                echo $mensajeSuccess;
            }elseif($respuesta[0] == 2){
                echo $mensajeError;
            }
        break;


}

?>
