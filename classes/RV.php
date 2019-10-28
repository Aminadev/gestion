<?php

class RV extends base {
    //  selection de tous les donnees de la base
    
    // public function select(){
    //     $sql = "SELECT * FROM rendez_vous";
    //     $result = $this->connect()->query($sql);
    //     if($result->rowCount()> 0){
    //         while($ligne= $result->fetch()){
    //             $data[] = $ligne;
    //         }
    //         return $data;
    //     }
    // }

    public function RV_Encours(){
        $sql = "SELECT * FROM rendez_vous WHERE etat=0 AND rvreporte=0";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;
        }
    }
    
    public function RV_Reporte(){
        $sql = "SELECT * FROM rendez_vous WHERE etat=0 AND rvreporte=1";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;
        }
    }

    public function RV_Valide(){
        $sql = "SELECT * FROM rendez_vous WHERE etat=1 AND rvreporte=0";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;
        }
    }

    public function RV_Terminer(){
        $sql = "SELECT * FROM rendez_vous WHERE etat=1 AND rvreporte=1";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;
        }
    }

    public function insertion($fields){

        $elementDB = implode(', ',array_keys($fields));
        $elementFormulaire = implode(", :",array_keys($fields));
        // preparation  de la requette et execution
        $requet = "INSERT INTO rendez_vous ($elementDB) VALUES (:".$elementFormulaire.")";
        $result = $this->connect()->prepare($requet);

        foreach($fields as $key => $value){
            $result->bindValue(':'.$key,$value);
        }
        $resultExec = $result->execute();
        if($resultExec){
            echo "<script>alert('Bon !!!')</script>";
        }else{
            echo "<script>alert('ERREUR !!!')</script>";
        }
    }



}