<?php
    include_once "../../CapaDatos/conexion.php";

    class Empleado{

        private $search;
        private $numEmpleado;
        private $iduCentro;
        private $nombre;
        private $apellido;
        private $email;
        private $iopcion;

        function __construct()
        {
            $this->search = ''; 
            $this->numEmpleado = 0;
            $this->iduCentro = "";
            $this->nombre = "";
            $this->apellido = 0;
            $this->email = 0;
            $this->iopcion = 0;
        }
        function set_Search($val){
            $this->search = $val;
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

        //Funciones para sanitizar inputs

        function FILTER_SANITIZE_NOMBRECOMPLETO($string)
        {
            return preg_replace('/[^a-zA-Z\s]/', '', $string); 

        }

        function FILTER_SANITIZE_ENTERO($string)
        {
            return preg_replace('/[^0-9,$*$]/', '', $string); 

        }

        
        //Funciones de consultas
        public function Func_Agregar_Empleado()
        {
            $consulta = "select juan.Funcion_Empleado('".filter_var($this->FILTER_SANITIZE_ENTERO($this->numEmpleado), FILTER_SANITIZE_NUMBER_INT  ) ."','".filter_var($this->FILTER_SANITIZE_ENTERO($this->iduCentro), FILTER_SANITIZE_NUMBER_INT  ) ."','".filter_var($this->FILTER_SANITIZE_NOMBRECOMPLETO($this->nombre), FILTER_SANITIZE_STRING  ) ."' , '".filter_var($this->FILTER_SANITIZE_NOMBRECOMPLETO($this->apellido), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)."' , '".filter_var($this->email, FILTER_SANITIZE_EMAIL)."' , ".filter_var($this->FILTER_SANITIZE_ENTERO($this->iopcion),FILTER_SANITIZE_NUMBER_INT )." );";
            return $this->db($consulta);
        }

        public function Func_Actualizar_Empleado()
        {
            $consulta = "select juan.Funcion_Empleado('".filter_var($this->FILTER_SANITIZE_ENTERO($this->numEmpleado), FILTER_SANITIZE_NUMBER_INT  ) ."','".filter_var($this->FILTER_SANITIZE_ENTERO($this->iduCentro), FILTER_SANITIZE_NUMBER_INT  ) ."','".filter_var($this->FILTER_SANITIZE_NOMBRECOMPLETO($this->nombre), FILTER_SANITIZE_STRING  ) ."' , '".filter_var($this->FILTER_SANITIZE_NOMBRECOMPLETO($this->apellido), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)."' , '".filter_var($this->email, FILTER_SANITIZE_EMAIL)."' , ".filter_var($this->FILTER_SANITIZE_ENTERO($this->iopcion),FILTER_SANITIZE_NUMBER_INT )." );";
            return $this->db($consulta);
        }

        public function Func_Consultar_Empleado()
        {
            $consulta = "select * from juan.Funcion_Consultar_Empleado('%".$this->search."%', ".$this->iopcion.");";
            return $this->db($consulta);
        }

        public function Func_Get_Empleados()
        {
            $consulta = "select * from juan.Funcion_Consultar_Empleado('', ".$this->iopcion.");";
            return $this->db($consulta);
        }

        public function Func_Filtar_Empleados()
        {
            $consulta = "select * from juan.Funcion_Filtro_Empleado('".$this->nombre."', '".$this->apellido."');";
            return $this->db($consulta);
        }


    }

?> 