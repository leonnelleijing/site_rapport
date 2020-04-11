<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../functions.php';
$ca= connectAnalyse();
$cl= connectLogin();
$success =array('info'=>'ok');
$CodePu=$_POST['CodePU'];
$idKPI=$_POST['idKPI'];
$sql="SELECT sqlKPI,contrainteKPI FROM kpi where idKPI=$idKPI";
$result = sqlSelect($cl, $sql);
$row=$result[0];
$newSql=$row[0].' '.$row[1].$CodePu;
$success['sql']=$newSql;
$resultatAnalyse= sqlSelect($ca, $newSql);
$success['resultat']=$resultatAnalyse;
echo json_encode($success);
