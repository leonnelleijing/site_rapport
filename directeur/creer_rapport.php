<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../functions.php';
$cx=connectLogin();

$idService=$_POST['idService'];
$nomRapport=$_POST['nomRapport'];
$descripRapport=$_POST['descripRapport'];

$query="INSERT INTO rapport(nomRapport,descripRapport, idService) VALUES ('$nomRapport','$descripRapport',$idService)";
$result= mysqli_query($cx, $query);

$success = array('msg' =>'ok');
$success['etat']=$result;
echo json_encode($success);