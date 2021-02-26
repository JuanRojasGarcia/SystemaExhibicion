<?php
    include_once "../../CapaDatos/conexion.php";

    class Configuracion{

        private $iduConfiguracion;
        private $tasaFinanciamiento;
        private $enganche;
        private $plazoMaximo;
        private $iopcion;

        function __construct()
        {
             $this->iduConfiguracion = 0;
             $this->tasaFinanciamiento = 0;
             $this->enganche = 0;
             $this->plazoMaximo = 0;
             $this->iopcion = 0;
        }

        function set_IduConfig($val){
            $this->iduConfiguracion = $val;
        }
        function set_TasaFinancimiento($val){
            $this->tasaFinanciamiento = $val;
        }
        function set_Enganche($val){
            $this->enganche = $val;
        }
        function set_PlazoMaximo($val){
            $this->plazoMaximo = $val;
        }
        function set_Opcion($val){
            $this->iopcion = $val;
        }

        private function db($cSql){
            $objeto = new Conexion();
            return $objeto->Consultar($cSql);
        }

        function FILTER_SANITIZE_ENTERO($string)
        {
            return preg_replace('/[^0-9,$*$]/', '', $string); 
 
        }
        
        public function Func_Agregar_Configuracion()
        {
            $consulta = "select juan.Funcion_Configuracion(0,".filter_var($this->tasaFinanciamiento, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION  ) ." , ".filter_var($this->FILTER_SANITIZE_ENTERO($this->enganche), FILTER_SANITIZE_NUMBER_INT)." , ".filter_var($this->FILTER_SANITIZE_ENTERO($this->plazoMaximo), FILTER_SANITIZE_NUMBER_INT)." , ".filter_var($this->FILTER_SANITIZE_ENTERO($this->iopcion),FILTER_SANITIZE_NUMBER_INT )." );";
            return $this->db($consulta);
        }

        public function Func_Actualizar_Configuracion()
        {
            $consulta = "select juan.Funcion_Configuracion(".filter_var($this->iduConfiguracion, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION  ) .",".filter_var($this->tasaFinanciamiento, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION  ) ." , ".filter_var($this->FILTER_SANITIZE_ENTERO($this->enganche), FILTER_SANITIZE_NUMBER_INT)." , ".filter_var($this->FILTER_SANITIZE_ENTERO($this->plazoMaximo), FILTER_SANITIZE_NUMBER_INT)." , ".filter_var($this->FILTER_SANITIZE_ENTERO($this->iopcion),FILTER_SANITIZE_NUMBER_INT )." );";
            return $this->db($consulta);
        }

        public function Func_Eliminar_Configuracion()
        {
            $consulta = "select juan.Funcion_Configuracion(".$this->iduConfiguracion.",0,0,0, ".$this->iopcion.");";
            return $this->db($consulta);
        }





    }

?>