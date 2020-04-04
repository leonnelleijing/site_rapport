<?php
$arr=array('msg'=>'ok');

require_once 'functions.php';
$cx=connectLogin();

$email=$_POST['email'];
$mdp=$_POST['mdp'];
$query="SELECT userMdp FROM login where userMail='$email'";
$result=mysqli_query($cx,$query);

if($result==false){
    $arr['info']='Vérifier votre connexion';  
}else{
    $row= mysqli_fetch_array($result);
    if($row==null){
        $arr['info']='Email n\'existe pas';
    }else{
        if($row['userMdp']!=$mdp){
           $arr['info']='Mot de passe incorrect';
        } else {
            $arr['info']='./direteur/admin.html';
        }
    }
}

echo json_encode($arr);