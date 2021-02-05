<?php
    include_once "../../CapaDatos/conexion.php";

    class Articulo{

        private $iduArticulo;
        private $descripcion;
        private $modelo;
        private $precio;
        private $existencia;
        private $iopcion;

        function __construct()
        {
            $this->iduArticulo = 0;
            $this->descripcion = "";
            $this->modelo = "";
            $this->precio = 0;
            $this->existencia = 0;
            $this->iopcion = 0;
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
        
        public function Func_Agregar_Articulo()
        {
            $consulta = "select juan.Funcion_Articulo('".$this->descripcion."' , '".$this->modelo."' , ".$this->precio." , ".$this->existencia." ,".$this->iopcion." );";
            return $this->db($consulta);
        }

        public function Func_Actualizar_Articulo()
        {
            $consulta = "select juan.Funcion_Articulo(".$this->iduArticulo.",'".$this->descripcion."' , '".$this->modelo."' , ".$this->precio." , ".$this->existencia." ,".$this->iopcion." );";
            return $this->db($consulta);
        }

        public function Func_Eliminar_Articulo()
        {
            $consulta = "select juan.Funcion_Articulo(".$this->iduArticulo.");";
            return $this->db($consulta);
        }
    }

?>