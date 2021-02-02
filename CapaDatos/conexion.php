<?php
    class Conexion{
        

        function Connect(){
            $host = "localhost";
            $port = "5432";
            $database = "postgres";
            $username = "postgres";
            $password = "admin357";

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