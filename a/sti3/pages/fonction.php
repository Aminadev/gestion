<?php 
define("serveur","127.0.0.1");  //definition du serveur
define("user","root");         //definition du super utilisateur root
define("paseword","");           
define("base","sti3");     //nom de la base

function connect()
{
	$c=mysqli_connect(serveur,user,paseword,base) or die(mysqli_error($c));
 	return $c;
}

function deconnect($conn)     // c'est une variable 
{
	mysqli_close($conn);
}

function execute($req)
{
    $conn=connect();
    $exe=mysqli_query($conn,$req);
    return $exe;
}

function findMembreByMatricule($mat)
{
  $c=connect();
  $sql="SELECT * FROM membre WHERE mat='$mat' ";
  $exe=mysqli_query($c,$sql);
  if($exe)
  {
    $tab=mysqli_fetch_array($exe);
    return $tab;
  }
}
// TROUVER L'IDENTIFIAN DU MEMBRE A L'AIDE DE SON MATRICULE
function TrouvIDviaMatricule($mat)
{
  $c=connect();
  $sql="SELECT * FROM membre WHERE mat='$mat' ";
  $exe=mysqli_query($c,$sql);
  if($exe)
  {
    $tab=mysqli_fetch_array($exe);
    return $tab['id'];
  }
}
//  recuperation des membres active de l'association pour eviter la SUPRESSION
function allMembre()
{
	$conn=connect() or die(mysqli_error($conn));
	$exe=mysqli_query($conn,"SELECT *FROM membre WHERE actif=1");
	return $exe;
}

//  je l'utilise pour trier les membre en ordre deccroissant
function allMembreTri()
{
  $conn=connect() or die(mysqli_error($conn));
  $exe=mysqli_query($conn,"SELECT *FROM membre WHERE actif=1 ORDER BY datead DESC");
  return $exe;
}

// gerer les doublons dans la base

function DoublonMembre($nom,$prenom,$adresse,$email,$tel,$datenaiss,$lieunaiss,$nationalite,$nin)
{
  $conn=connect() or die(mysqli_error($conn));
  $membre=allMembre();
  
  while($l=mysqli_fetch_array($membre))
  {
    if($l['nom']=='$nom' && $l['prenom']=='$prenom' && $l['adresse']=='$adresse' && $l['email']=='$email' && $l['tel']=='$tel' && $l['datenaiss']=='$datenaiss' && $l['lieunaiss']=='$lieunaiss' && $l['nationalite']=='$nationalite' && $l['nin']=='$nin')
    {
      return "oui";
    }    
  }
      return "non";
}

function allUser(){
  $conn=connect() or die(mysqli_error($conn));
  $exe=mysqli_query($conn,"SELECT *FROM utilisateur ");
  return $exe;
  }
   

//  recuperation DU BUGET de l'association pour 

function allBudget()
{
  $conn=connect() or die(mysqli_error($conn));
  $exe=mysqli_query($conn,"SELECT *FROM cotisation ");
  return $exe;
}

function results($rech)
{
  $c=connect();
  $where="";
   $rech=preg_split('/[\s\-]/', $rech);
   $countmotcle=count($rech); //pur tester le nombre des mot cle
   // print_r($countmotcle);
   foreach ($rech as $key => $i) {
     $where .="membre LIKE '%$i%'";
     if($key!=($countmotcle-1)){
        $where.=" AND ";
     }
   }
   $query=mysqli_query($c,"SELECT * FROM membre WHERE $where"); 
   $rows=mysqli_num_rows($query);
   if($rows==fals){
      while ($l=mysqli_fetch_array($query)) {
        echo "<strong>".$l['mat']."</strong><br/><u>prenom:</u>".$l['prenom']."<br/> nom:".$l['nom'];
      }
   }else{
    echo"pas de resultat trouve";
   }
}
function allAides()
{
  $conn=connect() or die(mysqli_error($conn));
  $exe=mysqli_query($conn,"SELECT *  FROM aideautre ");
  return $exe;
}

function postermessage($contenu,$detail,$auteur)
{
	
	$cnx = connect();
	$query ="INSERT INTO `message`( `contenu`, `detail`, `auteur`) VALUES ($contenu,$detail,$auteur)";
	$exe=mysqli_query($cnx, $query);
	if ($exe){
		            echo "<script>alert('Post avec succés')</script>";
					}
					else
					{
			         echo "<script>alert('echec')</script>";
          }
}
function getAllPosts()
{
	$cnx = connect();
	$select =  "SELECT * FROM message";
	return mysqli_query($cnx, $select);
}

function genererMatricule()
{
  $conn=connect() or die(mysqli_error($conn));
  $mat="A00";
  $date=Date('y');
  $req="SELECT MAX(id) AS mat FROM membre" ;
  $exe=mysqli_query($conn,$req) or die(mysqli_error($conn));
  if($exe)
  {
      if(mysqli_num_rows($exe)>0)
      {
        $tab=mysqli_fetch_array($exe);
        $max_mat=$tab['mat'];
      }
      else
      {
        $max_mat=1;
      }
      
      return $mat."".$date."".($max_mat+1);
  }
}

function update_membre($id,$mat,$nom, $prenom,$nation,$nin,$actif,$tel,$datenaiss,$lieunaiss,$datead,$email,$adresse,$profession,$sitmat,$sexe,$bureau,$mttcotisation,$photo)
{
  $cnx = connect() or die(mysqli_error($cnx));
  $req="UPDATE membre SET id='$id',mat='$mat',nom='$nom',prenom='$prenom',nationalite='$nation',nin='$nin',actif='$actif',tel='$tel',datenaiss='$datenaiss',lieunaiss='$lieunaiss',datead='$datead',email='$email',adresse='$adresse',profession='$profession',sitmat='$sitmat',sexe='$sexe',bureau='$bureau',mttcotisation='$mttcotisation',photo='$photo' WHERE mat='$mat'";
  return mysqli_query($cnx,$req);
}

function desactive_membre($id,$mat,$nom, $prenom,$nation,$nin,$actif,$tel,$datenaiss,$lieunaiss,$datead,$email,$adresse,$profession,$sitmat,$sexe,$bureau,$mttcotisation,$photo)
{
  $actif=0;
  $cnx = connect();
  $req="UPDATE membre SET id='$id',mat='$mat',nom='$nom',prenom='$prenom',nationalite='$nation',nin='$nin',actif='$actif',tel='$tel',datenaiss='$datenaiss',lieunaiss='$lieunaiss',datead='$datead',email='$email',adresse='$adresse',profession='$profession',sitmat='$sitmat',sexe='$sexe',bureau='$bureau',mttcotisation='$mttcotisation',photo='$photo' WHERE mat='$mat' ";
  return mysqli_query($cnx,$req);
}

function delete_membre($mat){
  $cnx = connect();
  $delet ="DELETE FROM membre WHERE mat = '$mat' ";
  return  mysqli_query($cnx, $delet);
  
}

function nb_ligne($exe)
{
  $lign=mysql_num_rows($exe);
  return $lign;
}

function adduser($login,$pwd,$nom,$prenom)
{
  $pwd=md5($pwd);
  $sql="INSERT INTO user(login,pwd,prenom,nom) VALUES('$login','$pwd','$nom','$prenom')";
  $exe=execute($sql);
  return $exe;
}

function update($login,$nom,$pwd)
{
  $pwd=md5($pwd);
  $upd="UPDATE FROM user SET login='$login',pwd='$pwd' WHERE iduser='$id'";
  return execute($upd);
}

function deluser($id)
{
  $del="DELETE from user WHERE iduser='$id' ";
  return execute($del);
}

 ?>