<?php

/* 
ce fichier est pour réaliser des fonction d'affichage des sections de html 
 */


function head(){
    echo '<head lang="en">
	<meta charset="utd-8">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/open-iconic-bootstrap.css">
	<link rel="stylesheet" href="../css/custom.css">
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/validator.js"></script>
        </head>';
}

function Navigation($nom){
    echo'<div id="main">
		<nav class="navbar navbar-expand-lg navbar-light">
  			<a class="navbar-brand" href="#">
    			<img src="../img/lagardere_active_logo.jpg" width="180" height="30" class="d-inline-block align-top" alt="">
  			</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
 			</button>

	  		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <form class="form-inline my-2 mx-4 my-lg-0">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Chercher un rapport..." aria-label="Search">
                                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Chercher</button>
                                </form>
                                <li class="nav-item">';
    echo"
                                    <div class='nav-link mx-4'><img src='../img/personnage.png' class='img-thumbnail personnage'> $nom </div>";
    echo'
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-4" href="#">Déconnexion <span class="oi oi-power-standby"></span></a>
                                </li>
                            </ul>
			</div>
		</nav>	
        </div>';
}


function sidebar(){
    echo '<div class="col-md-2 bg-dark" id="sidebar">
                <ul class="navbar-nav navbar-dark">
                    <li role="presentation" class="active">
		        <a href="admin.php" class="active"><span class="oi oi-dashboard"></span>Table de bord</a><span class="badge badge-danger mx-1">4</span>
		    </li>

                    <li role="presentation">
                        <a href="#" data-toggle="collapse" data-target="#list2"><span class="oi oi-bar-chart"></span>Rapport</a>
                            <ul id="list2" class="collapse in">
                                <li><a href="tous_rapports.php"><span class="oi oi-list"></span>Tous mes rapports</a></li>
                                <li><a href="faire_rapport.php"><span class="oi oi-task"></span>Faire un rapport</a></li>
                            </ul>
                    </li>
		            
                    <li role="presentation">
                        <a href="#" data-toggle="collapse" data-target="#list3"><span class="oi oi-cog"></span>Paramètre</a>
                            <ul id="list3" class="collapse in">
                                <li><a href="information.html"><span class="oi oi-monitor"></span>Informations</a></li>
                                <li><a href="utilisateurs.html"><span class="oi oi-people"></span>Tous les utilisateurs</a></li>
                            </ul>
                    </li>
		</ul>	
        </div>';
}

