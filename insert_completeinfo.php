<?php
require_once 'functions.php';
$cl=connectLogin();  
session_start();
$idService=$_SESSION['idService'];
$idLogin=$_SESSION['idLogin'];

if(empty($idLogin)){
    header("Location:index.html");
    die();
}

//obtenir les données du tableau 
$nomEm=trim($_POST['nomEm']);
$prenomEm=trim($_POST['prenomEm']);
$telEm=trim($_POST['telEm']);
$codeImg=$_POST['codeImg'];
$imgEm=$_FILES['imgEM'];

//vérifier les données du tableau 
//vérifier type de document qui est une image
$finfo= finfo_open(FILEINFO_MIME_TYPE);
$uploadedfile = $imgEm['tmp_name'];
$content_type= finfo_file($finfo,$uploadedfile);
$arr=array("image/jpeg","image/jpg","image/png");
if(!in_array($content_type, $arr)){
    echo '<h3> Ce n\'est pas type de image </h3>';
    die();
}

//modifier la taille de l'image et l'enregistrer dans le fichier img
if($content_type==$arr[2]){
    $src = imagecreatefrompng($uploadedfile);
}else{
    $src = imagecreatefromjpeg($uploadedfile);
}
list($width,$height)=getimagesize($uploadedfile);
$newwidth=30;
$newheight=($height/$width)*30;
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
$filename=$nomEm.'_'.$prenomEm.'.png';
$path = "img/". $nomEm.'_'.$prenomEm.'.png';
imagejpeg($tmp,$path,100);
imagedestroy($src);
imagedestroy($tmp);


//mettre à jour les information de la table employee
$sql="INSERT INTO employee(nomEm,prenomEm,telEm,imgEm,idService) VALUES('$nomEm','$prenomEm','$telEm','$filename',$idService)";
$result=mysqli_query($cl,$sql);


//obtenir l'id
$sql="SELECT LAST_INSERT_ID()";
$result= mysqli_query($cl, $sql);
$row= mysqli_fetch_row($result);
$idEm=$row[0];

//mettre à jour les informations de la table login
$sql="UPDATE login set idEm=$idEm where userId=$idLogin";
mysqli_query($cl, $sql);

//
$_SESSION['userNom']=$nomEm;
$_SESSION['userId']=$idLogin;
$_SESSION['userImg']=$filename;

header("Location:./utilisateur/utilisateur.php");
