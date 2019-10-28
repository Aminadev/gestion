<?php


class Domaine extends base {

    public function select(){
        $sql = "SELECT * FROM domaine ORDER BY iddomaine DESC";
            $resultat = $this->connect()->query($sql);
            if($resultat->rowCount()> 0){
                while($ligne= $resultat->fetch()){
                    $elemetent[] = $ligne;
                }
                return $elemetent;
            } 
        }

    public function insertion($tabDonnee){

        $elementDB = implode(', ',array_keys($tabDonnee));
        $elementFormulaire = implode(", :",array_keys($tabDonnee));
        // preparation  de la requette et execution
        $requet = "INSERT INTO domaine ($elementDB) VALUES (:".$elementFormulaire.")";
        $result = $this->connect()->prepare($requet);

        foreach($tabDonnee as $key => $value){
            $result->bindValue(':'.$key,$value);
        }
        $resultExec = $result->execute();
        if($resultExec){
            header('location:edomaine.php');
        }else{
            echo "erreur";
        }
    }

    public function UpDateDomaine($fields,$iddom){
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
        $sql.= "UPDATE domaine SET ".$st;
        $sql.= " WHERE iddomaine = ".$iddom;

        $requete = $this->connect()->prepare($sql);
        foreach($fields as $key => $value){
            $requete->bindValue(':'.$key, $value);
        }
        $totalExecute = $requete->execute();
        if($totalExecute){
            header('location:edomaine.php');
        }

    }

    public function FindDomaineBYid($iddom){
        $sql = "SELECT * FROM domaine WHERE iddomaine=$iddom";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            return $result->fetch();   
        }
    }


    // public function Doublons($idservice,$domaine){
        
    //     $sql = "SELECT * FROM domaine WHERE idserv='$idservice' AND nomdomaine='$domaine' ";
    //     $result = $this->connect()->query($sql);
    //     if($result->rowCount()> 0){
    //         return 1;
    //     }else{
    //         return 0;
    //     }
    // }

}