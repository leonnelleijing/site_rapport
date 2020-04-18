<?php
require_once '../functions.php';
session_start();
$cl=connectLogin();
$idContenu=$_POST['idContenu'];

$sql="DELETE FROM contenu WHERE idContenu = $idContenu";
$result= mysqli_query($cl, $sql);

$success = array('msg' =>'ok');
$success['resultat']=$result;
echo json_encode($success);