<?php
    include_once "../../CapaDatos/conexion.php";

    class Centros{

        private $search;
        private $iduCentro;
        private $nomCentro;
        private $iopcion;

        function __construct()
        {
             $this->search = '';
             $this->iduCentro = 0;
             $this->nomCentro = "";
             $this->iopcion = 0;
        }

        function set_Search($val){
            $this->search = $val;
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

        function FILTER_SANITIZE_NOMCENTRO($string)
        {
            return preg_replace('/[^a-zA-Z\s]/', '', $string); 
        } 

        function FILTER_SANITIZE_ENTERO($string)
        {
            return preg_replace('/[^0-9,$*$]/', '', $string); 

        } 
        
        public function Func_Agregar_Centro()
        {
            $consulta = "select * from  juan.Funcion_Centro(".filter_var($this->FILTER_SANITIZE_ENTERO($this->iduCentro), FILTER_SANITIZE_NUMBER_INT).", '".filter_var($this->FILTER_SANITIZE_NOMCENTRO($this->nomCentro), FILTER_SANITIZE_STRING  ) ."', ".filter_var($this->FILTER_SANITIZE_ENTERO($this->iopcion),FILTER_SANITIZE_NUMBER_INT ).");";
            return $this->db($consulta);
        }

        public function Func_Editar_Centro()
        {
            $consulta = "select * from  juan.Funcion_Centro(".filter_var($this->FILTER_SANITIZE_ENTERO($this->iduCentro), FILTER_SANITIZE_NUMBER_INT).", '".filter_var($this->FILTER_SANITIZE_NOMCENTRO($this->nomCentro), FILTER_SANITIZE_STRING  ) ."', ".filter_var($this->FILTER_SANITIZE_ENTERO($this->iopcion),FILTER_SANITIZE_NUMBER_INT ).");";
            return $this->db($consulta);
        }

        public function Func_Eliminar_Centro()
        {
            $consulta = "select * from juan.Funcion_Centro(".$this->iduCentro.",' ',".$this->iopcion." );";
            return $this->db($consulta);
        }


        public function Func_Consultar_Centro()
        {
            $consulta = "select * from juan.Funcion_Consultar_Centro('%".$this->search."%', ".$this->iopcion.");";
            return $this->db($consulta);
        }

        public function Func_Get_Centros()
        {
            $consulta = "select * from juan.Funcion_Consultar_Centro('', ".$this->iopcion.");";
            return $this->db($consulta);
        }

        public function Func_Filtar_Centros()
        {
            $consulta = "select * from juan.Funcion_Filtro_Centro('".filter_var($this->FILTER_SANITIZE_ENTERO($this->iduCentro), FILTER_SANITIZE_NUMBER_INT)."', '".filter_var($this->FILTER_SANITIZE_NOMCENTRO($this->nomCentro), FILTER_SANITIZE_STRING  )."');";
            return $this->db($consulta);
        }

        public function Func_Get_AllCentros()
        {
            $consulta = "select * from juan.get_all_Centros();";
            return $this->db($consulta);
        }

        public function Func_Count_Centros()
        {
            $consulta = "select juan.get_Total_Tablas(".$this->iopcion.");";
            return $this->db($consulta);
        }
        





    }

?>