<?php
        class Conexion{
                public $server = "10.27.113.159";
                public $dbEch = "pruebas";
                public $usr = "sysexhibicion";
                public $pass = "979fe4c465b2ed68f700ec7079cb120c";
                public $port = "5432";

                public $conexion;
        
            public static function Connect(){
                $server = "10.27.113.159";
                $dbEch = "pruebas";
                $usr = "sysexhibicion";
                $pass = "979fe4c465b2ed68f700ec7079cb120c";
                $port = "5432";
    
                try {
                    $connection = new PDO("pgsql:host=$server;port=$port;dbname=$dbEch", $usr, $pass);
                    // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    return $connection;
                } catch (Exception $e) {
                    echo "<script> console.log('Error Conexion'); </script>" . $e->getMessage();
                }
            }

            function Connectt(){
                return pg_connect("host=$this->server port=$this->port dbname=$this->dbEch user=$this->usr password=$this->pass");
            }

            function Consultar($cSql){
                $conexion = $this->Connectt();
                return pg_query($conexion, $cSql);
            }
        }
?>