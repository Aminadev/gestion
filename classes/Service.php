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

    
}
/*

