<?php

class Profil extends base {

    public function select(){
    $sql = "SELECT * FROM profil";
        $resultat = $this->connect()->query($sql);
        if($resultat->rowCount()> 0){
            while($ligne= $resultat->fetch()){
                $elemetent[] = $ligne;
            }
            return $elemetent;
        } 
    }

    public function DoublonsProfil($nomProf){
        $sql = "SELECT * FROM profil";
            $resultat = $this->connect()->query($sql);
            if($resultat->rowCount()> 0){
                while($ligne= $resultat->fetch()){
                    if($ligne['libelle']==$nomProf){
                        return true;
                    }
                }
            } 
            return false;
        }

    public function insertion($tabDonnee){

        $elementDB = implode(', ',array_keys($tabDonnee));
        $elementFormulaire = implode(", :",array_keys($tabDonnee));
        // preparation  de la requette et execution
        $requet = "INSERT INTO profil ($elementDB) VALUES (:".$elementFormulaire.")";
        $result = $this->connect()->prepare($requet);

        foreach($tabDonnee as $key => $value){
            $result->bindValue(':'.$key,$value);
        }
        $resultExec = $result->execute();
        if($resultExec){
            //header('location:edomaine.php');
        }else{
            echo "erreur";
        }
    }

    public function UpDateProfil($fields,$idPr){
        $st = "";
        $cpt = 1;
        $total_fields = count($fields);
        foreach($fields as $key => $value){
            if($cpt  === $total_fields){
                $set = "$key = :".$key;
                $st = $st.$set;
            }else{
                $set = "$key = :".$key.", ";
                $st = $st.$set;
                $cpt ++;
            }
        }       

        $sql = "";
        $sql.= "UPDATE profil SET ".$st;
        $sql.= " WHERE idprofil = ".$idPr;
        $requete = $this->connect()->prepare($sql);
        foreach($fields as $key => $value){
            $requete->bindValue(':'.$key, $value);
        }
        $totalExeceute = $requete->execute();
        if($totalExeceute){
            header('location:profil.php');
        }
    }    

    public function FindProfilBYID($idp){
        $sql = "SELECT * FROM profil WHERE idprofil=$idp ";
            $resultat = $this->connect()->query($sql);
            if($resultat->rowCount()> 0){
                return $resultat->fetch();
            }else{
                return null;
            }
    }


}