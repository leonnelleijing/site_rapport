<?php
// definition des constantes de connexion
define ("host", "localhost");//nom de serveur 
define ("uid","root");//id
define ("pwd","");//mdp
define ("dbLA","lagardere_active");
define ("dbSW","site_web");


function connecter($dbname){
    $connec= mysqli_connect(host,uid,pwd);
    if ($connec == NULL) {
        die("Erreur connexion à MySQL/Maria DB : " . mysqli_connect_error());
    } else { // connexion réussie
        mysqli_query($connec, 'set names utf8');
        mysqli_query($connec, 'set character_set_client = utf-8');
        mysqli_query($connec, 'set character_set_results = utf-8');

        if (mysqli_select_db($connec, $dbname) == FALSE) {
            die("Choix base impossible : " . mysqli_error($connec));
        } else { // base est correctement - Tout OK
            return $connec;
        }
    }

}
// connecter à la base de donner "lagardere_active"
function connectAnalyse(){
    return connecter(dbLA);
}

// connecter à la base de donner "site_web"
function connectLogin(){
    return connecter(dbSW);
}

//afficher le nom d'un directeur avec un id donnée
function nomAdmin($cl,$id){
    $query="SELECT nomDirecteur FROM directeur WHERE idDirecteur=$id ";
    $result=mysqli_query($cl,$query);
    $row= mysqli_fetch_array($result);
    return $row['nomDirecteur'];
}

//afficher le nom d'un employee avec un id donnée
function nomEm($cl,$id){
    $query="SELECT nomEm FROM employee WHERE idEm=$id ";
    $result=mysqli_query($cl,$query);
    $row= mysqli_fetch_array($result);
    return $row['nomEm'];
}


// function sql select des donnés 
function sqlSelect($cl,$sql){
    $result= mysqli_query($cl, $sql);
    if($result==false){
        die("Erreur sélection statuts : " . mysqli_error($cl));
    }
    $final=array();
    while($row= mysqli_fetch_row($result)){
        array_push($final,$row);
    }
    return $final;   
}