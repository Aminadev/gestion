<?php

class RV extends base {
    //  selection de tous les donnees de la base
    
    public function Select_RV_NonTermine(){
        $sql = "SELECT * FROM rendez_vous WHERE datefin IS NULL";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;
        }
    }

    public function Doublons_RV($idp,$idmed,$date,$idsec){
        $sql = "SELECT * FROM rendez_vous WHERE datefin IS NULL";
            $resultat = $this->connect()->query($sql);
            if($resultat->rowCount()> 0){
                while($ligne= $resultat->fetch()){
                    if(substr($ligne['telephone'],0,10)==$date && $ligne['idmed']==$idmed && $ligne['idpatient']==$idp && $ligne['idsecretaire']==$idsec){
                        return true;
                    }
                }
            } 
            return false;
    }

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
    
    public function RV_Encours_ParMedecin($idmed){
        $sql = "SELECT * FROM rendez_vous WHERE etat=0 AND rvreporte=0 AND idmed=$idmed";
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

    public function RV_Reporte_ParMedecin($idmed){
        $sql = "SELECT * FROM rendez_vous WHERE etat=0 AND rvreporte=1 AND idmed=$idmed";
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

    public function RV_Valide_ParMedecin($idmed){
        $sql = "SELECT * FROM rendez_vous WHERE etat=1 AND rvreporte=0 AND idmed=$idmed";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;
        }
    }

    public function RV_Terminer(){
        $sql = "SELECT * FROM rendez_vous WHERE etat=1 AND rvreporte=1 AND datefin IS NOT null";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;
        }
    }

    public function RV_Terminer_ParMedecin($idmed){
        $sql = "SELECT * FROM rendez_vous WHERE etat=1 AND rvreporte=1 AND datefin IS NOT null AND idmed=$idmed";
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
        if(!$resultExec){
            echo "<script>alert('ERREUR !!!')</script>";
        }
    }

// fonction pour metre a jours un rendez-vous (reporter, valider, ou terminer)

    public function UpDateRV($fields,$idRV){
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
        $sql.= "UPDATE rendez_vous SET ".$st;
        $sql.= " WHERE idrv = ".$idRV;

        $requete = $this->connect()->prepare($sql);
        foreach($fields as $key => $value){
            $requete->bindValue(':'.$key, $value);
        }
        $totalExeceute = $requete->execute();
        if($totalExeceute){
            return $totalExeceute;
        }
    }

    public function FindRendez_Vous_BYID($idrv){
        $sql = "SELECT * FROM rendez_vous WHERE idrv=$idrv ";
            $resultat = $this->connect()->query($sql);
            if($resultat->rowCount()> 0){
                return $resultat->fetch();
            }
    }

    public function RV_DeLaJournnee(){
        $sql = "SELECT * FROM rendez_vous WHERE etat=1 AND rvreporte=0 AND DATE(date)=CURRENT_DATE()";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            return $result;
        }
            return 0;   
    }

    public function RV_DeLaSemaine(){
        $sql = "SELECT * FROM rendez_vous WHERE etat=1 AND rvreporte=0 GROUP BY WEEK(date)";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            // while($ligne= $result->fetch()){
            //     $data[] = $ligne;
            // }
            return $result;
        }
    }

    // public function RV_de_la_Semaine($idrv){
    //        $sql =  "SELECT WEEK(date) as semaine, MONTH(date) as mois"
    //     .", DAY(date) as jour, COUNT(*) AS Nb"
    //     ." FROM rendez_vous GROUP BY MONTH(date_creation) , WEEK(date_creation), DAY(date_creation) ";
    //     $result = $this->connect()->query($sql);
    //     if($result->rowCount()> 0){
    //         while($ligne= $result->fetch()){
    //             $data[] = $ligne;
    //         }
    //         return $data;
    //     }
    // }

// $tabDate = explode('-', $_POST['date']);
// $timestamp = mktime(0, 0, 0, $tabDate[1], $tabDate[2], $tabDate[0];
// $jour = date('w', $timestamp)


}

