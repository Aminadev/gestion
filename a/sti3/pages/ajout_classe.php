<?php
    session_start();
    if(!isset($_SESSION['login']) and !isset($_SESSION['profil']) OR $_SESSION['profil']!="admin") {
      sleep(1);
      echo "<script>window.location.href='../index.php';</script>";
  }
  if(isset($_REQUEST['logout']))
  {
    unset($_SESSION);
    session_destroy();
    echo"<script>window.location.href='../index.php';</script>";
  }

    $date=DATE('Y-m-j');
    $conn= new PDO("mysql:host=127.0.0.1;dbname=sti3;charset=utf8","root","");
    extract($_POST);
                    if(isset($_POST['btnAjout']))
                    {
                        $requete=$conn->exec("INSERT INTO classe(codecl,libellecl,idniv) VALUES('$codecl','$libellecl','$niveau') ");
                        if($requete){
                            echo "<script>alert('VOUS VENEZ D'/AJOUTER UNE CLASSE')</script>";
                            echo"<script>window.location.href='liste_classe.php';</script>";
                        }else{
                            echo "<script>alert('AJOUT NON EFFECTUER  REESSEYER !!')</script>";
                        }


                    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ajout classe</title>


<link href="../css/styles.css" rel="stylesheet">
<link href="../LoginCss/style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="../js/html5shiv.js"></script>
<script src="../js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<br><br><br>	
 <form action="" method="POST">		
			<div class=" panel ">


  <div class="box" style="height: 490px; top:-50px">
  <div id="header">
  <h1 id="logintoregister">Ajouter Classe</h1>
  </div> 
  
    <?php
    //session_start();
    $base= new PDO("mysql:host=127.0.0.1;dbname=sti3;charset=utf8","root","");
    extract($_POST);
    $req=$base->query("SELECT * FROM niveau ");
    if($req)
                {
                
    ?>
    <div class="group">      
    <select class="inputMaterial" name="niveau" >
        <option class="inputMaterial" value="">Choisissez votre niveau</option>
        <?php 
            while($lg=$req->fetch())
            { ?>
            <option value="<?=$lg['idniveau']?>"><?php echo $lg['libelleniv'];?> </option>
            <?php }
                }
            ?>
    </select>
      
    </div>
     <div class="group">      
      <input class="inputMaterial" type="text" name="codecl" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Code classe</label>
    </div>
    <div class="group">      
      <input class="inputMaterial" type="text" name="libellecl" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Libelle</label>
    </div> 
    
    <button name="btnAjout"   type="submit">AJOUTER</button>
</form>  
<br/>
<br/>
  <div id="footer-box" ><p class="footer-text"><a href="#"><span class="sign-up" > </span></a></p>
  </div>
</div>

	
</body>

</html>
