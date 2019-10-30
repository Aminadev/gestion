<?php

class Patient extends base {

    public function FindPatientBYid($idpatient){
        $sql = "SELECT * FROM patient WHERE idpatient=$idpatient";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            return $result->fetch();
        }
    }

    public function insertion($fields){

        $elementDB = implode(', ',array_keys($fields));
        $elementFormulaire = implode(", :",array_keys($fields));
        // preparation  de la requette et execution
        $requet = "INSERT INTO patient ($elementDB) VALUES (:".$elementFormulaire.")";
        $result = $this->connect()->prepare($requet);

        foreach($fields as $key => $value){
            $result->bindValue(':'.$key,$value);
        }
        $resultExec = $result->execute();
        if(!$resultExec){
            echo "<script>alert('ERREUR !!!')</script>";
        }
    }

    public function FindPatientBYDateAjout($dateajout){
        $sql = "SELECT idpatient FROM patient WHERE dateajout like '$dateajout'";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            return $result->fetch();   
        }
    }



}