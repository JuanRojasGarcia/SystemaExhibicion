<?php
    include_once "../../CapaDatos/conexion.php";

    class Articulo{

        private $search;
        private $iduArticulo;
        private $descripcion;
        private $modelo;
        private $precio;
        private $existencia;
        private $iopcion;

        function __construct()
        {
            $this->search = ''; 
            $this->iduArticulo = 0;
            $this->descripcion = "";
            $this->modelo = "";
            $this->precio = 0;
            $this->existencia = 0;
            $this->iopcion = 0;
        }
        
        function set_Search($val){
            $this->search = $val;
        }
        function set_Idu($val){
            $this->iduArticulo = $val;
        }
        function set_Descripcion($val){
            $this->descripcion = $val;
        }
        function set_Modelo($val){
            $this->modelo = $val;
        }
        function set_Precio($val){
            $this->precio = $val;
        }
        function set_Existencia($val){
            $this->existencia = $val;
        }
        function set_Opcion($val){
            $this->iopcion = $val;
        }

        private function db($cSql){
            $objeto = new Conexion();
            return $objeto->Consultar($cSql);
        }

        
        function FILTER_SANITIZE_DESCRIPTION($string)
        {
            return preg_replace('/[^a-zA-Z]/', '', $string); 
        }
        
        function FILTER_SANITIZE_MODELO($string)
        {
            return preg_replace('/[^0-9A-Za-z\s\-]/', '', $string); 
        }

        function FILTER_SANITIZE_ENTERO($string)
        {
            return preg_replace('/[^0-9,$*$]/', '', $string); 

        }

        public function Func_Agregar_Articulo()
        {
            $consulta = "select juan.Funcion_Articulo('".filter_var($this->FILTER_SANITIZE_DESCRIPTION($this->descripcion), FILTER_SANITIZE_STRING  ) ."' , '".filter_var($this->FILTER_SANITIZE_MODELO($this->modelo), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)."' , ".filter_var($this->precio, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)." , ".filter_var($this->FILTER_SANITIZE_ENTERO($this->existencia), FILTER_SANITIZE_NUMBER_INT)." ,".filter_var($this->FILTER_SANITIZE_ENTERO($this->iopcion),FILTER_SANITIZE_NUMBER_INT )." );";
            return $this->db($consulta);
        }

        public function Func_Actualizar_Articulo()
        {
            $consulta = "select juan.Funcion_Articulo('".filter_var($this->FILTER_SANITIZE_DESCRIPTION($this->descripcion), FILTER_SANITIZE_STRING  ) ."' , '".filter_var($this->FILTER_SANITIZE_MODELO($this->modelo), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)."' , ".filter_var($this->precio, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)." , ".filter_var($this->FILTER_SANITIZE_ENTERO($this->existencia), FILTER_SANITIZE_NUMBER_INT)." ,".filter_var($this->FILTER_SANITIZE_ENTERO($this->iopcion),FILTER_SANITIZE_NUMBER_INT )." );";
            return $this->db($consulta);
        }

        public function Func_Eliminar_Articulo()
        {
            $consulta = "select juan.Funcion_Articulo(".$this->iduArticulo.",'','',0,0, ".$this->iopcion.");";
            return $this->db($consulta);
        }

        public function Func_Consultar_Articulo()
        {
            $consulta = "select * from juan.Funcion_Consultar_Articulo('%".$this->search."%', ".$this->iopcion.");";
            return $this->db($consulta);
        }

        public function Func_Get_Articulos()
        {
            $consulta = "select * from juan.Funcion_Consultar_Articulo('', ".$this->iopcion.");";
            return $this->db($consulta);
        }



    } 
?>

