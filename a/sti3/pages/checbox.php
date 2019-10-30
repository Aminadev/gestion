<?php
###############################
# Formulaire : Choix paramètres
###############################
echo '<div id="params_id">' ;
if(isset($_POST["util_id"]) && $_POST["util_id"] != "" ) {
    # Requete : Liste des parametres
    $parametres = array() ;
    $param = array() ;
    $req = "SELECT param_id, param_util_id, param_nom FROM parametres WHERE param_util_id='$_POST[util_id]';" ;
    $req = mysql_query($req) ;
    while($data = mysql_fetch_array($req)) {
        $parametres[$data["param_id"]] = $data["param_nom"] ;
        $param[$data["param_id"]] = $data["param_util_id"] ;
    }
     
    foreach( $parametres as $id=>$nom ) {
        $checked = "none" ;
        if(isset($_POST["param_id"]) && $_POST["param_id"] == $id) { $checked = " checked" ;}
        echo '<input type="radio" name="param_id" value="'.$id.'"'.$checked.' onClick="submit();"/> '.$nom.' <br />' ;
    }
}
 
echo '</div>' ;





	<input type=\"checkbox\" name=\"machine_id[]\" value=\"$id\" checked=".$checked." /> ".<code>$nom." <br />"</code><code>;</code>