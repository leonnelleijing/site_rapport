<?php
$arr=array('msg'=>'ok','contenu'=>$_POST);

require_once 'functions.php';
$cx=connectLogin();

$email=$_POST['email'];
$mdp=$_POST['mdp'];

// Ici, les restrictions utilisées avec JavaScript (par exemple l'écriture du mail), interdit aux utilisateurs certains caractères
// Pas besoin donc de sécuriser les requêtes requêtes préparées comme les fonctions "prepare" et "execute", on peut directement écrire la requête
$query="SELECT userMdp,idEm,idDirecteur FROM login where userMail='$email'";
$result=mysqli_query($cx,$query);

// Avec la requête, on regarde la ligne de la BD correspondant à l'email entré par l'utilisateur, et on attribut un chiffre à la variable $arr en fonction du contenu de la ligne
if($result==false){
    $arr['info']=0;  
}else{
    $row= mysqli_fetch_array($result);
    if($row==null){
        //mail inexistant
        $arr['info']=1;
    }else{
        if($row['userMdp']!=$mdp){
            //mot de passe incorrect
           $arr['info']=2;
        } else {
            // tous sont corrects 
            $arr['info']=3;    
            if($row['idDirecteur']==null){
                // c'est pas un directeur
                $arr['directeur']=0;
                $arr['id']=$row['idEm'];

            }else{
                //c'est un directeur
                $arr['directeur']=1;
                $arr['id']=$row['idDirecteur'];
            }
        }
    }
}

echo json_encode($arr);