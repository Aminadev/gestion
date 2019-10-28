<?php

//print_r($_SESSION);

$date="";
$nom="";
$prenom="";
$login="";
$password="";
$profil="";

$date=$_POST["date"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$login=$_POST["login"];
$profil=$_POST["profil"];




$hostname = 'localhost';
$username = 'root'; 
$password = '';  

//try {   
//include('cnnx.php');


  $db = new PDO("mysql:host=$hostname;dbname=sti3", $username, $password);    
  session_start();
    $conn= new PDO("mysql:host=127.0.0.1;dbname=sti3;charset=utf8","root","");
    $date=DATE('Y-m-j');
    extract($_POST);
                    if(isset($_POST['btnEnregister']))
                    {
                       // $m=TrouvIDviaMatricule($matricul);
                        if(empty($profil) || $profil===0){
                             echo "<script>alert('veuillez choisir un profil')</script>";
                        }elseif(empty($login)){
                             echo "<script>alert('veuillez saisir votre login')</script>";
                        }elseif(empty($pwd1)){
                             echo "<script>alert('veuillez saisir votre mot de passe')</script>";
                        }elseif(!empty($pwd1) && empty($pwd2) ){
                             echo "<script>alert('veuillez confirmer votre mot de passe')</script>";
                        }else{

                            if(!($pwd2==$pwd1)){
                                 echo "<script>alert('Les deux mot de passe saisie ne correspond pas')</script>";
                            }else{
                                    $date=DATE('Y-m-j');
                                    $pwd1=sha1($pwd1);
                                    $requete=$conn->exec("INSERT INTO utilisateur(nom,prenom,date,login,pwd,profil) VALUES('$nom','$prenom','$date','$login','$pwd1','$profil' ) ");
                                    if($requete){
                                        echo "<script>alert(\"Les données sont bien enregistrées !\")</script>";
                                        header("location:indexN.php");
                                       // echo "<script>window.location.href='gescotisation.php';</script>";
                                    }else{
                                        echo "<script>alert(\"Les données ne sont pas enregistrées !\")</script>";
                                    }
                            }
                        }
                    } 	
  // $sql2 = "INSERT INTO utilisateur(nom,prenom,date,login,pwd,profil) VALUES ('$nom','$prenom','$date', '$login','".$_POST['password']."','$profil')"; 
  //   $q=$db->exec($sql2);  
  // if($q){
  //   echo "<script>alert(\"Les données sont bien enregistrées!\")</script>"; 
  //   include("indexN.php");
  // }else{
  //   echo "<script>alert(\"Les données ne sont pas enregistrées!\")</script>"; 
  // }


//print_r($_POST);







?>