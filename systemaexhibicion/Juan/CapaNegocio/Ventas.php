<?php
    include_once "../../CapaDatos/conexion.php";

    class Venta{

        private $iduVenta;
        private $numEmpleado;
        private $total;
        private $fecha;
        private $iopcion;

        function __construct()
        {
            $this->iduVenta = 0;
            $this->numEmpleado = 0;
            $this->total = 0;
            $this->fecha = '';
            $this->iopcion = 0;
        }
        
        function set_Idu($val){
            $this->iduVenta = $val;
        }
        function set_NumEmpleado($val){
            $this->numEmpleado = $val;
        }
        function set_Total($val){
            $this->total = $val;
        }
        function set_Fecha($val){
            $this->fecha = $val;
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
        // function FILTER_SANITIZE_FECHA($string)
        // {
        //     return preg_replace('/[^0-9/]/', '', $string); 

        // }

        public function Func_Agregar_Venta()
        {
            $consulta = "select juan.Funcion_Ventas(".filter_var($this->FILTER_SANITIZE_ENTERO($this->numEmpleado), FILTER_SANITIZE_NUMBER_INT)." , ".filter_var($this->total, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)." , '".$this->fecha."' ,".filter_var($this->FILTER_SANITIZE_ENTERO($this->iopcion),FILTER_SANITIZE_NUMBER_INT )." );";
            return $this->db($consulta);
        }

        public function Func_Actualizar_Venta()
        {
            $consulta = "select juan.Funcion_Ventas(".filter_var($this->FILTER_SANITIZE_ENTERO($this->numEmpleado), FILTER_SANITIZE_NUMBER_INT)." , ".filter_var($this->total, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)." , '".$this->fecha."' ,".filter_var($this->FILTER_SANITIZE_ENTERO($this->iopcion),FILTER_SANITIZE_NUMBER_INT )." );";
            return $this->db($consulta);
        }

        public function Func_Eliminar_Venta()
        {
            $consulta = "select juan.Funcion_Ventas(".$this->iduVenta.");";
            return $this->db($consulta);
        }

        public function Func_Get_Email(){
            $consulta = "select * from juan.get_email_empleado('".$this->iduVenta."');"; 
            return $this->db($consulta);
        }

        public function Func_Get_ArticuloById(){
            $consulta = "select * from juan.get_artciulo_id('".$this->iduVenta."');";  
            return $this->db($consulta);
        }

        public function Func_Get_Data_Configuracion(){
            $consulta = "select * from juan.get_configuracion();";
            return $this->db($consulta);
        }
    }

?>

