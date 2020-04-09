<?php
        $host = "localhost";
        $port = "5433";
        $database = "postgres";
        $username = "postgres";
        try {
            $connection = new PDO("pgsql:host=$host;port=$port;dbname=$database", $username);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "<script> console.log('Error Conexion'); </script>" . $e->getMessage();
        }
?>