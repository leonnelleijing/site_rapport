<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utd-8">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/open-iconic-bootstrap.css">
	<link rel="stylesheet" href="../css/custom.css">
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/validator.js"></script>
</head>
<body>
    <div id="main">
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
   				<li class="nav-item">
        			<div class="nav-link mx-4"><img src="../img/utilsateur.png" class="img-thumbnail personnage">Julie</div>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link mx-4" href="#">Déconnexion <span class="oi oi-power-standby"></span></a>
      			</li>
     		</ul>
		</div>
		</nav>	
	</div>

	<div class="container-fluid">
		<div class="row no-gutters">
			<div class="col-md-2 bg-dark" id="sidebar">
				<ul class="navbar-nav navbar-dark">
		 			<li role="presentation" class="active">
		                <a href="admin.html" class="active"><span class="oi oi-dashboard"></span>Table de bord</a>
		            </li>
		            <li role="presentation">
		            	<a href="Messagerie.html"><span class="oi oi-chat"></span>Messagerie</a></li>
		            </li>
		            <li role="presentation">
		            	<a href="#" data-toggle="collapse" data-target="#list2"><span class="oi oi-bar-chart"></span>Rapport</a>
			            <ul id="list2" class="collapse in">
			                <li><a href="tous_rapports.html"><span class="oi oi-list"></span>Tous les rapports</a></li>
			                <li><a href="faire_rapport.html"><span class="oi oi-task"></span>Faire un rapport</a></li>
			            </ul>
		            </li>
		            <li role="presentation">
			            <a href="information.html"><span class="oi oi-monitor"></span>Informations</a></li>
		            </li>
		 		</ul>	
			</div>

			<div class="col-md-10">
				<div class="container">
					<div class="card">
						<div class="card-header">
							<h5> Créer un rapport</h5>
						</div>
						<div class="card-body">
							<form>
								<div class="form-group">
								    <label for="TypeRapport">Type rapport</label>
								    <select class="form-control" id="TypeRapport">
								      <option>1</option>
								      <option>2</option>
								      <option>3</option>
								      <option>4</option>
								      <option>5</option>
								    </select>
								</div>
								<div class="form-group">
								    <label for="sujetRapport">Sujet</label>
								    <input type="text" class="form-control" id="sujetRapport">
								</div>
								<div class="form-group">
	    							<label for="dscpRapport">Description</label>
	    							<textarea class="form-control" id="dscpRapport" rows="3"></textarea>
	  							</div>
	  							<button type="submit" class="btn btn-info">Créer</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>