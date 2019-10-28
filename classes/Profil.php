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
        header('location:profil.php');
    }else{
        echo "erreur";
    }
}
}
?>