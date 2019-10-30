<?php 

function connect()
{
	$c=new PDO("mysql:host=127.0.0.1;dbname=sti3;charset=utf8","khalilou","diop");
 	return $c;
}

function finduserByMatricule($id)
{
 $base=connect();
  $sql=$base->query("SELECT * FROM utilisateur WHERE iduser='$id' ");
	if($sql)
  	{
	    return $sql->fetch();
 	}
}

function delete_User($id){
  $base=connect() ;
	$user=$base->query("DELETE FROM utilisateur WHERE iduser = '$id' ");
	return $user;
}

function findClassById($id)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM classe WHERE idcl='$id' ");
	if($sql)
  	{
		$c=$sql->fetch();
		return $c['codecl'];
	}
}

function AllCoursActive()
{
	$base=connect();
	$sql=$base->query("SELECT * FROM cours WHERE active=1 ");
	if($sql)
  	{
		return $sql;
	}
}

function CoursDejaEvaluer()
{
	$base=connect();
	$sql=$base->query("SELECT * FROM cours WHERE iduser IS NOT NULL AND active=1 AND evaluer=1 ");
	if($sql)
  	{
		return $sql;
	}
}

function CoursPasActive()
{
	$base=connect();
	$sql=$base->query("SELECT * FROM cours WHERE iduser IS NOT NULL AND active=0 AND evaluer=0 ");
	if($sql)
  	{
		return $sql;
	}
}

function findMatiereById($id)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM cours WHERE idcours='$id' ");
	if($sql)
  	{
		$c=$sql->fetch();
		return $c['libellec'];
	}
}
function findProfByMatiere($idMatiere)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM ligne_prof_cours WHERE idcours='$idMatiere' ");
	if($sql)
  	{
		$c=$sql->fetch();
		return $c['idprof'];
	}
}

function findQuestionnaireByDateTime($date)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM questionnaire WHERE date='$date' ");
	if($sql)
  	{
		$c=$sql->fetch();
		return $c['idquest'];
	}
}

function A_Evaluer($id,$idcours)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM ligne_score_cours_etu ");
	if($sql)
  	{
		if($sql){
			while($l=$sql->fetch())
            {
            	if($l['idetu']=='$id' AND $l['idcours']=='$idcours'){
            		return 1;
            	}
            }
		return 0; 
		}
	}
}

function findIdMatiereByCode($code)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM cours WHERE libellec='$code' ");
	if($sql)
  	{
		$c=$sql->fetch();
		return $c['idcours'];
	}
}

function DoublonUser($nom,$prenom,$profil,$login)
{
  $base=connect() ;
	$user=$base->query("SELECT * FROM utilisateur WHERE profil='$profil' ");
	if($user)
  	{	
	  while($l=$user->fetch())
	  {
	    if($l['nom']=='$nom' AND $l['prenom']=='$prenom' AND $l['profil']=='$profil' AND $l['login']=='$login')
	    {
	      return "oui";
	    }
	  }
      		return "non";
    }
}

function DoublonNiveau($code,$libelle)
{
  	$base=connect() ;
	$niv=$base->query("SELECT * FROM niveau ");
	if($niv)
  	{	
	  while($l=$niv->fetch())
	  {
	    if($l['codeniv']=='$code' AND $l['libelleniv']=='$libelle')
	    {
	      return "OK";
	    }
	  }
      		return "non";
    }
}

function AllClasse()
{
	$base=connect();
	$sql=$base->query("SELECT * FROM classe ");
	if($sql)
  	{
		return $sql->fetch();
	}
}

function AllFormateur()
{
	$base=connect();
	$sql=$base->query("SELECT * FROM utilisateur WHERE profil='prof' ");
	if($sql)
  	{
		return $sql;
	}
}

function findIdclassByCode($code)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM classe WHERE codecl='$code' ");
	if($sql)
  	{
		$cl=$sql->fetch();
		return $cl['idcl'];
	}
}
function findClassByIdEtudiant($id)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM ligne_classe lc WHERE lc.iduser='$id' ");
	if($sql)
  	{
		$c=$sql->fetch();
		return $c['idclasse'];
	}
}

function findClassByIdMatiere($id)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM cours WHERE idcours='$id' ");
	if($sql)
  	{
		$c=$sql->fetch();
		return $c['idcl'];
	}
}

function findEtudiantByLoginPwd($login,$pwd)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM utilisateur WHERE profil='etu' AND login='$login' AND pwd='$pwd' ");
	if($sql)
  	{
  		$etu=$sql->fetch();
		return $etu;
	}else{
		return NULL;
	}
}

function findProfByPrenom($prenom)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM utilisateur WHERE profil='prof' AND prenom='$prenom' ");
	if($sql)
  	{
  		$prof=$sql->fetch();
		return $prof;
	}else{
		return NULL;
	}
}


function findProfByLoginPwd($login,$pwd)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM utilisateur WHERE profil='prof' AND login='$login' AND pwd='$pwd' ");
	if($sql)
  	{
  		$etu=$sql->fetch();
		return $etu;
	}else{
		return NULL;
	}
}

function findEtudiantById($id)
{
	$base=connect();
	$sql=$base->query("SELECT * FROM utilisateur WHERE profil='etu' AND iduser='$id' ");
	if($sql)
  	{
  		$c=$sql->fetch();
		return $c;
	}else{
		return NULL;
	}
}
function UpdateEtudiant($id,$nom,$prenom,$login,$date,$profil){
	$base=connect();
	$sql=$base->exec("UPDATE utilisateur SET nom='$nom',prenom='$prenom',login='$login',iduser='$id',date='$date' WHERE iduser='$id' ");
	if($sql)
  	{
  		return $sql;
  	}
}

function ActiverCours($id,$libellec,$volume,$idcl,$iduser,$evaluer){
	$base=connect();
	$val=1;
	$req=$base->exec("UPDATE cours SET idcours='$id',libellec='$libellec',volumeHor='$volume',idcl='$idcl',iduser='$iduser',active='$val',evaluer='$evaluer' WHERE idcours='$id' ");
	if($req)
  	{
  		return $req;
  	}
}


