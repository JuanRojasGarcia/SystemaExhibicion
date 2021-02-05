<?php
    include_once "../../CapaDatos/conexion.php";

    class Centros{

        private $iduCentro;
        private $nomCentro;
        private $iopcion;

        function __construct()
        {
             $this->iduCentro = 0;
             $this->nomCentro = "";
             $this->iopcion = 0;
        }

        function set_iduCentro($val){
            $this->iduCentro = $val;
        }
        function set_nombreCentro($val){
            $this->nomCentro = $val;
        }
        function set_Opcion($val){
            $this->iopcion = $val;
        }

        private function db($cSql){
            $objeto = new Conexion();
            return $objeto->Consultar($cSql);
        }

        // public function Funcion_obtener_centros()
        // {

        //    $consulta = "select * from juan.get_data_centros()";
        //    return $this->db($consulta);
        // //    $consulta->execute();
        // //    while ($filas = $consulta->fetchAll()){
        // //         $this->articulos=$filas;
        // //    }
        // //    return $this->articulos;
        // }
        
        public function Func_Agregar_Centro()
        {
            $consulta = "select * from  juan.Funcion_Centro(".$this->iduCentro.", '".$this->nomCentro."', ".$this->iopcion.");";
            return $this->db($consulta);
        }

        public function Func_Editar_Centro()
        {
            $consulta = "select * from  juan.Funcion_Centro(".$this->iduCentro.", '".$this->nomCentro."', ".$this->iopcion.");";
            return $this->db($consulta);
        }



    }

?>