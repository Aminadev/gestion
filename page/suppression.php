<?php

        session_start();
         if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!=1) {
           sleep(1);
           echo "<script>window.location.href='../index.php';</script>";
          }
        if(isset($_REQUEST['BtnDeconnect']))
        {
          unset($_SESSION);
          session_destroy();
          echo"<script>window.location.href='../index.php';</script>";
        }


    function __autoload($class){
        require_once "../classes/$class.php";

      }

        $idmed = $_GET['delete_id'];

     if(isset($_POST['BtnSupprimer'])){
        $medecin = new User();
        $sup = $medecin->Suppression($idmed);
        if($sup){
          header('location:listeMedecin.php');
        }
      }

?>
