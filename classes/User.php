<?php

class User extends base {
    //  selection de tous les donnees de la base
    
    public function select(){
        $sql = "SELECT * FROM user ";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;
        }
    }

        //  MEDECIN
        public function DoublonsMedecin($nom,$prenom,$tel,$email){
            $sql = "SELECT * FROM user WHERE idprofil=3";
                $resultat = $this->connect()->query($sql);
                if($resultat->rowCount()> 0){
                    while($ligne= $resultat->fetch()){
                        if(($ligne['telephone']==$tel) || ($ligne['email']==$email) || ($ligne['telephone']==$tel && $ligne['nom']==$nom && $ligne['prenom']==$prenom )){
                            return true;
                        }
                    }
                } 
                return false;
        }

    public function AllMedecin(){
        $sql = "SELECT * FROM user WHERE idprofil=3 ORDER BY iduser DESC";

        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;
        } 
    }
    
    public function InsertMedecin($fields){

        $elementDB = implode(', ',array_keys($fields));
        $elementFormulaire = implode(", :",array_keys($fields));
        // preparation  de la requette et execution
        $requet = "INSERT INTO user ($elementDB) VALUES (:".$elementFormulaire.")";
        $result = $this->connect()->prepare($requet);

        foreach($fields as $key => $value){
            $result->bindValue(':'.$key,$value);
        }
        $resultExec = $result->execute();
        if($resultExec){
            return $resultExec;
       }
    }

    public function FindUtilisateurBYid($idUser){
        $sql = "SELECT * FROM user WHERE iduser=$idUser";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            return $result->fetch();   
        }
    }

    public function FindMedecinBYid($idmed){
        $sql = "SELECT * FROM user WHERE idprofil=3 AND iduser=$idmed";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            return $result->fetch();   
        }
    }

    public function FindServiceBYDomaine($idservice){
        $sql = "SELECT m.iduser, m.nom, m.prenom FROM user m,domaine d WHERE m.idprofil=3 AND m.iddomaine=d.iddomaine AND d.idserv=$idservice";
        $result = $this->connect()->query($sql);
        if($result->rowCount()> 0){
            while($ligne= $result->fetch()){
                $data[] = $ligne;
            }
            return $data;   
        }
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
        $sql.= "UPDATE user SET ".$st;
        $sql.= " WHERE iduser = ".$idm;
        $requete = $this->connect()->prepare($sql);
        foreach($fields as $key => $value){
            $requete->bindValue(':'.$key, $value);
        }
        $totalExeceute = $requete->execute();
        if($totalExeceute){
            header('location:listeMedecin.php');
        }

    }




        //      SECRETAIRE

        public function InsertSecretaire($fields){

            $elementDB = implode(', ',array_keys($fields));
            $elementFormulaire = implode(", :",array_keys($fields));
            // preparation  de la requette et execution
            $requet = "INSERT INTO user ($elementDB) VALUES (:".$elementFormulaire.")";
            $result = $this->connect()->prepare($requet);
    
            foreach($fields as $key => $value){
                $result->bindValue(':'.$key,$value);
            }
            $resultExec = $result->execute();
            if($resultExec){
                return $resultExec;
           }
        }
        
        public function DoublonsSecretaire($nom,$prenom,$tel,$email){
            $sql = "SELECT * FROM user WHERE idprofil=2";
                $resultat = $this->connect()->query($sql);
                if($resultat->rowCount()> 0){
                    while($ligne= $resultat->fetch()){
                        if(($ligne['telephone']==$tel) || ($ligne['email']==$email) || ($ligne['telephone']==$tel && $ligne['nom']==$nom && $ligne['prenom']==$prenom )){
                            return true;
                        }
                    }
                } 
                return false;
        }

        public function AllSecretaire(){
            $sql = "SELECT * FROM user WHERE idprofil=2 ORDER BY iduser DESC";
    
            $result = $this->connect()->query($sql);
            if($result->rowCount()> 0){
                while($ligne= $result->fetch()){
                    $data[] = $ligne;
                }
                return $data;
            } 
        }

        public function Employe_Service($serv){
            $sql = "SELECT u.iduser FROM user u,domaine d WHERE u.iddomaine=d.iddomaine AND u.iddomaine IN (SELECT iddomaine FROM domaine WHERE idserv=$serv)";
                $resultat = $this->connect()->query($sql);
                if($resultat->rowCount()> 0){
                    return $resultat;    
                } 
                return 0;
            }

        public function FindSecretaireBYid($idsec){
            $sql = "SELECT * FROM user WHERE idprofil=2 AND iduser=$idsec";
            $result = $this->connect()->query($sql);
            if($result->rowCount()> 0){
                return $result->fetch();   
            }
        }

        public function UpDateSecretaire($fields,$idsec){
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
            $sql.= "UPDATE user SET ".$st;
            $sql.= " WHERE iduser = ".$idsec;
            $requete = $this->connect()->prepare($sql);
            foreach($fields as $key => $value){
                $requete->bindValue(':'.$key, $value);
            }
            $totalExeceute = $requete->execute();
            if($totalExeceute){
                header('location:listeSecretaire.php');
            }
        }    

        public function Suppression($idm){
            $sql = "DELETE FROM user WHERE iduser = :idm ";
            $result = $this->connect()->prepare($sql);
            $result->bindValue(":idm", $idm);
            return $result->execute();        
        }

}