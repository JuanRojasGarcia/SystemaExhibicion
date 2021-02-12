<?php     
include_once "../../CapaNegocio/Centro.php";


            $objeto = new Conexion();
            $connection = $objeto->Connect();
            
            $query = "select idu_centro, nombre_centro from juan.cat_centros;";
            $result = $connection->prepare($query);

            $result->execute();
            $datos = $result->fetchAll();

            // $row = $stresultmt->fetch(PDO::FETCH_ASSOC);
            // echo $row['total_rows'];

            // $result->bindColumn($idu_centro, $nombre_centro);

            foreach ($datos as $dato)
                {
                $customers[] = array(
                    'idu_centro' => $dato[0],
                    'nombre_centro' => $dato[1]
                );

                // echo json_encode($customers);
                // echo "<script> console.log('".print_r($customers)."'); </script>";

                }
            echo json_encode($customers);
            // echo "<script> console.log('".$customers[0]."'); </script>";


?>