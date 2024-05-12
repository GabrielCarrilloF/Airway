<?php
    class Connection{
        Function ConnectionBDPG(){
            $host = "localhost";
            $DBName = "Ariway";
            $UserName = "postgres";
            $Password = "root";
            try{
                $conn = new PDO ("pgsql:host = $host; dbname = $DBName; $UserName, $Password");
                echo"Conexion corecta";
            }catch(PDOException $e){
                echo ("Error: "$e);
            }
            return $conn;
        }
    }
?>