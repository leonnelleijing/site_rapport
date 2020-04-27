<?php
$arr=array('msg'=>'ok','contenu'=>$_POST);

require_once 'functions.php';
$cl=connectLogin();

$email=$_POST['email'];
$mdp=$_POST['mdp'];
$query="SELECT userId, userMdp,idEm,idDirecteur,idService FROM login where userMail='$email'";
$result=mysqli_query($cl,$query);

if($result==false){
    $arr['info']=0;  
}else{
    $row= mysqli_fetch_array($result);
    if($row==null){
        //mail inexiste
        $arr['info']=1;
    }else{
        if($row['userMdp']!=$mdp){
            //mot de passe incorrect
           $arr['info']=2;
        } else {
            // tous sont correctes 
            $arr['info']=3;    
            if($row['idDirecteur']==null){
                // c'est un utilisateur, enregistrer ces informations dans session
                $arr['directeur']=0;
                $userId=$row['idEm'];
                $idService=$row['idService'];
                $idLogin=$row['userId'];
                $userNom= nomEm($cl,$userId);
                $srcImg= srcImg($cl, $userId, false);
                session_start();
                $_SESSION['idLogin']=$idLogin;
                $_SESSION['idService']=$idService;
                $_SESSION['srcImg']=$srcImg;
                if($userNom==false){
                    $arr['userNom']=0;
                }else{
                    $_SESSION['userNom']=$userNom;
                    $_SESSION['userId']=$userId;
                }
            }else{
                //c'est un directeur,enregistrer ces informations dans session
                $arr['directeur']=1;
                $userId=$row['idDirecteur'];
                $userNom= nomAdmin($cl,$userId);
                $srcImg= srcImg($cl, $userId, true);
                session_start();
                $_SESSION['userId']=$userId;
                $_SESSION['userNom']=$userNom;
                $_SESSION['srcImg']=$srcImg;
            }
        }
    }
}

echo json_encode($arr);