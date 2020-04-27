<?php
require_once 'functions.php';
$cl=connectLogin();  
session_start();

?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/open-iconic-bootstrap.css">
	<link rel="stylesheet" href="./css/custom.css">
	<script type="text/javascript" src="./js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/validator.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-6 offset-3 my-4">
            <div class="card">
                <div class="card-header">
                    <h4>Compléter mes informations</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="insert_completeinfo.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomEm">Mon nom</label>
                        <input class="form-control" name="nomEm">
                    </div>
                    <div class="form-group">
                        <label for="prenomEm">Mon prénom</label>
                        <input class="form-control" name="prenomEm">
                    </div>
                    <div class="form-group">
                        <label for="telEm">Mon téléphone</label>
                        <input class="form-control" name="telEm">
                    </div>
                    <div class="form-group">
                        <label for="imgEm">Mon image</label>
                        <input type="file" single class="form-control-file" name="imgEM" capture="camera" accept=".jpg,.jpeg,.png">
                    </div>
                    <div class="form-inline mb-3">
                        <input class="form-control" name="codeImg">
                        <img src="codeImg.php" class="mx-3" onclick="this.src='codeImg.php'+'?idImg='+Math.random().toString().replace('.','')">
                    </div>
                    <button type="submit" class="btn btn-info">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
