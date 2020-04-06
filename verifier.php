<?php
$arr=array('msg'=>'ok','contenu'=>$_POST);

require_once 'functions.php';
$cx=connectLogin();

$email=$_POST['email'];
$mdp=$_POST['mdp'];
$query="SELECT userMdp,idEm,idDirecteur FROM login where userMail='$email'";
$result=mysqli_query($cx,$query);

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