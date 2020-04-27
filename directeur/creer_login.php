<?php

require_once '../functions.php';
$cl=connectLogin();

$idService=$_POST['service'];
$mail=$_POST['mailLogin'];

$success=array('request'=>'Créer un nouveau login');

// obtenir un mot de passe initiale 
$mdp= SixRandomChiffre();
//$mdphash= password_hash($mdp,PASSWORD_DEFAULT);
$sql="insert into login (userMail,userMdp,idService) VALUES('$mail','$mdp',$idService)";
$result= mysqli_query($cl, $sql);

if(!$result){
   $success['fail']=1;    
   $success['resultat']='Echouer, veillez réessayer !';
} else {
   $success['resultat']=array('mail'=>$mail, 'mdp'=>$mdp); 
}

echo json_encode($success);