<?php
class Service extends base {

    public function select(){
    $sql = "SELECT * FROM services";
        $resultat = $this->connect()->query($sql);
        if($resultat->rowCount()> 0){
            while($ligne= $resultat->fetch()){
                $elemetent[] = $ligne;
            }
            return $elemetent;
        } 
    }

    public function DoublonsService($serv,$spec){
        $sql = "SELECT * FROM services";
            $resultat = $this->connect()->query($sql);
            if($resultat->rowCount()> 0){
                while($ligne= $resultat->fetch()){
                    if(($ligne['nomserv']==$serv) || ($ligne['nomserv']==$serv && $ligne['nomserv']==$spec)){
                        return true;
                    }
                }
            } 
            return false;
        }

        // public function Employe_Service($serv){
        //     $sql = "SELECT * FROM services";
        //         $resultat = $this->connect()->query($sql);
        //         if($resultat->rowCount()> 0){
        //             while($ligne= $resultat->fetch()){
        //                 if(($ligne['nomserv']==$serv) || ($ligne['nomserv']==$serv && $ligne['nomserv']==$spec)){
        //                     return true;
        //                 }
        //             }
        //         } 
        //         return false;
        //     }

    public function insertion($tabDonnee){

        $elementDB = implode(', ',array_keys($tabDonnee));
        $elementFormulaire = implode(", :",array_keys($tabDonnee));
        // preparation  de la requette et execution
        $requet = "INSERT INTO services ($elementDB) VALUES (:".$elementFormulaire.")";
        $result = $this->connect()->prepare($requet);

        foreach($tabDonnee as $key => $value){
            $result->bindValue(':'.$key,$value);
        }
        $resultExec = $result->execute();
        if($resultExec){
            header('location:eservice.php');
        }else{
            echo "erreur";
        }
    }

    public function SelectDomaine($iddomaine){
        $sql = "SELECT * FROM services s,domaine d WHERE s.idserv=d.idserv AND d.iddomaine=$iddomaine";
            $resultat = $this->connect()->query($sql);
            if($resultat->rowCount()> 0){
                return $resultat->fetch();
                  
            } 
        }
        public function ServiceBYDomaine($idServ){
            $sql = "SELECT * FROM services WHERE idserv=$idServ";
                $resultat = $this->connect()->query($sql);
                if($resultat->rowCount()> 0){
                    return $resultat->fetch();
                      
                } 
            }
        public function FindServiceBYID($idServ){
            $sql = "SELECT * FROM services WHERE idserv=$idServ";
                $resultat = $this->connect()->query($sql);
                if($resultat->rowCount()> 0){
                    return $resultat->fetch();
                      
                } 
        }

        public function UpDateService($fields,$idserv){
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
            $sql.= "UPDATE services SET ".$st;
            $sql.= " WHERE idserv = ".$idserv;
            $requete = $this->connect()->prepare($sql);
            foreach($fields as $key => $value){
                $requete->bindValue(':'.$key, $value);
            }
            $totalExeceute = $requete->execute();
            if($totalExeceute){
                header('location:eservice.php');
            }
        }    
    
}