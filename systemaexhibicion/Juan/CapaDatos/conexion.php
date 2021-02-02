<?php
        class Conexion{
        
            function Connect(){
                $host = "10.27.113.159";
                $database = "pruebas";
                $username = "sysexhibicion";
                $password = "979fe4c465b2ed68f700ec7079cb120c";
                $port = "5432";
    
                try {
                    $connection = new PDO("pgsql:host=$host;port=$port;dbname=$database", $username, $password);
                    // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    return $connection;
                } catch (Exception $e) {
                    echo "<script> console.log('Error Conexion'); </script>" . $e->getMessage();
                }
            }
        }
?>