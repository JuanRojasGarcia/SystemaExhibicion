<?php
    include_once "../../CapaDatos/conexion.php";

    class Empleado{

        private $numEmpleado;
        private $iduCentro;
        private $nombre;
        private $apellido;
        private $email;
        private $iopcion;

        function __construct()
        {
            $this->numEmpleado = 0;
            $this->iduCentro = "";
            $this->nombre = "";
            $this->apellido = 0;
            $this->email = 0;
            $this->iopcion = 0;
        }
        
        function set_NumEmpleado($val){
            $this->numEmpleado = $val;
        }
        function set_IduCentro($val){
            $this->iduCentro = $val;
        }
        function set_Nombre($val){
            $this->nombre = $val;
        }
        function set_Apellido($val){
            $this->apellido = $val;
        }
        function set_Email($val){
            $this->email = $val;
        }
        function set_Opcion($val){
            $this->iopcion = $val;
        }

        private function db($cSql){
            $objeto = new Conexion();
            return $objeto->Consultar($cSql);
        }
        
        public function Func_Agregar_Empleado()
        {
            $consulta = "select juan.Funcion_Empleado(".$this->numEmpleado." , ".$this->iduCentro." , '".$this->nombre."' , '".$this->apellido."' ,'".$this->email."',".$this->iopcion." );";
            return $this->db($consulta);
        }

        public function Func_Actualizar_Empleado()
        {
            $consulta = "select juan.Funcion_Empleado(".$this->numEmpleado." , ".$this->iduCentro." , '".$this->nombre."' , '".$this->apellido."' ,'".$this->email."',".$this->iopcion.");";
            return $this->db($consulta);
        }


    }

?>