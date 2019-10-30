<?php
class Secretaire extends base {

    public function select(){
    $sql = "SELECT * FROM secretaire";
        $resultat = $this->connect()->query($sql);
        if($resultat->rowCount()> 0){
            while($ligne= $resultat->fetch()){
                $elemetent[] = $ligne;
            }
            return $elemetent;
        } 
    }

    public function FindSecretaireBYid($idsec){
        $sql = "SELECT * FROM secretaire WHERE idsecretaire=$idsec";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            return $result->fetch();   
        }
    }

    
}