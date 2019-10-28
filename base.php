<?php
class base {
    protected function connect(){
        // la connection a la base 
        $username = "khalilou";
        $pwd = "diop";
        $host = "localhost";
        $bd = "gestion_rv";
        try {
            $conn = new PDO("mysql:host=localhost;dbname=$bd", $username, $pwd);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "La Connection a reussi";
            return $conn;
            }
        catch(PDOException $e)
            {
            echo "Echec de Connection: " . $e->getMessage();
            }
    }
}