<?php

function __autoload($class){
    require_once "classes/$class.php";
}

if(isset($_POST['BtnModifier'])){
  extract($_POST);

  $fields = [
    'nommed'=>$nom,
    'prenommed'=>$prenom,
    'adresse'=>$adresse,
    'specialite'=>$specialite,
    'tel'=>$tel,
    'sexe'=>$sexe,
    'disponibilite'=>1,
    'service'=>$service
  ];
  $idm = $mat;
//var_dump($idm);
  $medecin = new Medecin();
  $medecin->UpDateMedecin($fields,$idm);
}

if(isset($_GET['modif'])){
  $id = $_GET['modif'];

  $medecin = new Medecin();
  $result = $medecin->UnMembre($id);

}


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
    <title>Modification Medecin</title>

</head>
<body>
<!-- LA BARRE DE NAVIGATION -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Espace Employes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">A Propos</a>
      </li>  
    </ul>
    <span class="navbar-text">
      Navbar text with an inline element
    </span>
  </div>
</nav>

<form method="POST" action="">
<!--AJOUT DES MEDECIN (employes)-->
<div class="conteneur mt-4 ">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h4 class="md-4">AJOUTER UN(e) MEMBRE</h4>

                <input type="hidden" name="mat" value="<?=$result['matricule']?>" />
              <!--  
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Matricule:</label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" name="mat" >
                    </div>
                </div>

                -->
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Prenom:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="prenom" value="<?=$result['prenommed'];?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nom:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom" value="<?=$result['nommed'];?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Sexe:</label>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" value="Homme" checked>
                  <label class="form-check-label" for="inlineRadio1">Homme</label>
                </div>
                    <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sexe" value="Femme">
                  <label class="form-check-label" for="inlineRadio2">Femme</label>
                </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Adresse:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="adresse" value="<?=$result['adresse'];?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Specialite:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="specialite" value="<?=$result['specialite'];?>" >
                    </div>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Service:</label>
                  <div>
                    <select class="form-control" name="service" >
                    <?php
                          $service = new Service();
                          $ligne = $service->select();
                          foreach($ligne as $elt){ 
                          ?>
                      <option value="<?=$elt['idservice'];?>"><?=$elt['libelleserv'];?></option>
                      <?php   
                          }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Telephone:</label>
                    <div class= "col-sm-10">
                    <input type="text" class="form-control" name="tel" value="<?=$result['tel'];?>" >
                    </div>
                </div>
                <div class="col-auto">
                  <input type="submit" name="BtnModifier" class="btn btn-primary mb-2" value="Modifier" />
                </div>

              </form>       
            </div>
        </div>
    </div>
</div>


</body>
</html>