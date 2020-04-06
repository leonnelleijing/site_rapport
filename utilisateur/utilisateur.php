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
			<!-- Sidebar -->
			<div class="col-md-2 bg-dark" id="sidebar">
				<ul class="navbar-nav navbar-dark">
		 			<li role="presentation" class="active">
		                <a href="admin.html" class="active"><span class="oi oi-dashboard"></span>Table de bord</a>
		            </li>
		            <li role="presentation">
						<a href="tous_rapports.html"><span class="oi oi-list"></span>Tous mes rapports</a>
		            </li>
		            <li role="presentation">
			            <a href="information.html"><span class="oi oi-monitor"></span>Informations</a></li>
		            </li>
		 		</ul>	
			</div>

			<div class="col-md-10">
				<div class="container">
					<div class="card my-4 mx-4">
						<!-- les nouveaux rapports à faire -->
						<div class="card-body">
							<h3 class="card-title">Les nouveaux rapports</h3>
							<table class="table table-hover">
							  	<thead class="thead-light">
								    <tr>
								      <th scope="col">Date de creation</th>
								      <th scope="col">Service</th>
								      <th scope="col">Numéro</th>
								      <th scope="col">Titre</th>
								      <th scope="col">Etat</th>
								      <th scope="col">Voir plus</th>
								    </tr>
								</thead>
								<tbody>
								    <tr>
								      <th scope="row">2020-02-13</th>
								      <td>Merketing</td>
								      <td>mr_01</td>
								      <td>Evolution prix d'abonnement</td>
								      <td>Ouverture</td>
								      <td><a href="#">...</a></td>
								    </tr>
								    <tr>
								      <th scope="row">2020-02-13</th>
								      <td>Merketing</td>
								      <td>mr_01</td>
								      <td>Evolution prix d'abonnement</td>
								      <td>Cloture</td>
								      <td><a href="#">...</a></td>
								    </tr>
							    	<tr>
								      <th scope="row">2020-02-13</th>
								      <td>Merketing</td>
								      <td>mr_01</td>
								      <td>Evolution prix d'abonnement</td>
								      <td>Cloture</td>
								      <td><a href="#">...</a></td>
							   		</tr>
							  	</tbody>
							</table>
						</div>

						<!-- les rapports en attende de validation -->
						<div class="card-body">
							<h3 class="card-title">Les rapports en attente de valideation</h3>
							<table class="table table-hover">
							  	<thead class="thead-light">
								    <tr>
								      <th scope="col">Date de creation</th>
								      <th scope="col">Service</th>
								      <th scope="col">Numéro</th>
								      <th scope="col">Titre</th>
								      <th scope="col">Etat</th>
								      <th scope="col">Voir plus</th>
								    </tr>
								</thead>
								<tbody>
								    <tr>
								      <th scope="row">2020-02-13</th>
								      <td>Merketing</td>
								      <td>mr_01</td>
								      <td>Evolution prix d'abonnement</td>
								      <td>Ouverture</td>
								      <td><a href="#">...</a></td>
								    </tr>
								    <tr>
								      <th scope="row">2020-02-13</th>
								      <td>Merketing</td>
								      <td>mr_01</td>
								      <td>Evolution prix d'abonnement</td>
								      <td>Cloture</td>
								      <td><a href="#">...</a></td>
								    </tr>
							    	<tr>
								      <th scope="row">2020-02-13</th>
								      <td>Merketing</td>
								      <td>mr_01</td>
								      <td>Evolution prix d'abonnement</td>
								      <td>Cloture</td>
								      <td><a href="#">...</a></td>
							   		</tr>
							  	</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>