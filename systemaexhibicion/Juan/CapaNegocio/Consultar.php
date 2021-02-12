<?php
    include_once "../../CapaDatos/conexion.php";

    class Articulo{

        private $search;
        private $iopcion;

        function __construct()
        {
            $this->search = 0;
            $this->iopcion = 0;
        }
        
        function set_Search($val){
            $this->search = $val;
        }
        function set_Opcion($val){
            $this->iopcion = $val;
        }

        private function db($cSql){
            $objeto = new Conexion();
            return $objeto->Consultar($cSql);
        }


        public function Func_Consultar()
        {
            $consulta = "select * from juan.Funcion_Consultar_Articulo('%".$this->search."%', ".$this->iopcion.");";
            return $this->db($consulta);
        }

    }

?>

