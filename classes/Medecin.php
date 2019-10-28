<?php
class Medecin extends base {
    //  selection de tous les donnees de la base
    public function select(){
        $sql = "SELECT * FROM medecin";

        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;
        } 
    }

    public function FindMedecinBYid($idmed){
        $sql = "SELECT * FROM medecin WHERE idmed=$idmed";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            return $result->fetch();   
        }
    }
    // service du mdecin

    public function FindServiceBYDomaine($idservice){
        $sql = "SELECT m.idmed, m.nom, m.prenom FROM medecin m,domaine d WHERE m.iddomaine=d.iddomaine AND d.idserv=$idservice";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;   
        }
    }

// Methode d'insertion des methodes
    public function insertion($fields){

        $elementDB = implode(', ',array_keys($fields));
        $elementFormulaire = implode(", :",array_keys($fields));
        // preparation  de la requette et execution
        $requet = "INSERT INTO medecin ($elementDB) VALUES (:".$elementFormulaire.")";
        $result = $this->connect()->prepare($requet);

        foreach($fields as $key => $value){
            $result->bindValue(':'.$key,$value);
        }
        $resultExec = $result->execute();
        if($resultExec){
            header('location:index.php');
        }else{
            echo "erreur";
        }
    }

    public function UnMembre($id){
        $sql = "SELECT * FROM medecin WHERE idmed=:id";
        $requet = $this->connect()->prepare($sql);
        $requet->bindValue(":id",$id);
        $requet->execute();
        $resultat = $requet->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    }    

    public function UpDateMedecin($fields,$idm){
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
        $sql.= "UPDATE medecin SET ".$st;
        $sql.= " WHERE matricule = ".$idm;

        $requete = $this->connect()->prepare($sql);
        foreach($fields as $key => $value){
            $requete->bindValue(':'.$key, $value);
        }
        $totalExeceute = $requete->execute();
        if($totalExeceute){
            header('location:index.php');
        }

    }

    public function suppression($idm){
        $sql = "DELETE FROM medecin WHERE matricule = :idm ";

        $result = $this->connect()->prepare($sql);
        $result->bindValue(":idm", $idm);
        $result->execute();        
    }
    

}
  