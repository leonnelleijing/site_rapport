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
		 			<li role="presentation">
		                <a href="admin.html"><span class="oi oi-dashboard"></span>Table de bord</a>
		            </li>
		            <li role="presentation" class="active">
						<a href="tous_rapports.html"><span class="oi oi-list"></span>Tous mes rapports</a>
		            </li>
		            <li role="presentation">
			            <a href="information.html"><span class="oi oi-monitor"></span>Informations</a></li>
		            </li>
		 		</ul>	
			</div>

			<div class="col-md-10">
				<div class="container">
					<div class="row">
						<div class="col-3">
							<!-- Historique -->
							<div class="card" style="margin-bottom: 2em">
								<div class="card-header">
									<h4>Historiques</h4>
								</div>
								<div class="card-body">
                                                                    <a class="btn btn-info" href="historique.html">Historique</a>
								</div>
							</div>
							<!-- ajouter un KPI -->
							<div class="card">
								<div class="card-header">
									<h5>Sélectionner vos indicateur</h5>
								</div>
								<div class="card-body">
									<form>
									<div class="form-group">
									    <label for="nomPub">Nom de publication</label>
									    <select class="form-control" id="nomPub">
									      <option>Publication 1</option>
									      <option>Publication 2</option>
									      <option>Publication 3</option>
									      <option>Publication 4</option>
									      <option>Publication 5</option>
									    </select>
									</div>
									<div class="form-group">
									    <label for="indicateur">KPI</label>
									    <select class="form-control" id="indicateur">
									      <option>indicateur 1</option>
									      <option>indicateur 2</option>
									      <option>indicateur 3</option>
									      <option>indicateur 4</option>
									      <option>indicateur 5</option>
									    </select>
									</div>
									<div class="form-group">
									    <label for="analyseDate">Date</label>
									    <input type="text" class="form-control" id="analyseDate">
									</div>
		  							<button type="button" class="btn btn-info">Ajouter</button>
								</form>
								</div>
							</div>
						</div>
						<div class="col-9">
							<div class="card">
								<div class="card-header">
									<div class="input-group">
										<input type="text" name="nomRapport" class="form-control" value="Analyse de vente" placeholder="Analyse de vente" aria-label="Analyse de vente" aria-describedby="btnModifier">
										<div class="input-group-append">
											<button class="btn btn-outline-info" id="btnModifier">Modifier</button>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="container" id="analyseBody">
										<div id="section1" class="my-4">
											<table class="table table-hover">
											  	<thead class="thead-light">
												    <tr>
												      <th scope="col">Vente</th>
												      <th scope="col">2016</th>
												      <th scope="col">2017</th>
												      <th scope="col">2018</th>
												      <th scope="col">2019</th>
												      <th scope="col">2020</th>
												    </tr>
												</thead>
												<tbody>
												    <tr>
												      <th scope="row">Le parisian</th>
												      <td>345210</td>
												      <td>345210</td>
												      <td>345210</td>
												      <td>345210</td>
												      <td>345210</td>
												    </tr>
											  	</tbody>
											</table>
											<div class="form-group">
		   										<label for="commentaireRapport"><small>Commentaire</small></label>
		    									<textarea class="form-control" id="commentaireRapport" rows="3"></textarea>
		  									</div>
		  									<button class="btn btn-warning">Supprimer</button>
		  									<hr>
		  								</div>
		  								<div id="section2">
											<table class="table table-hover">
											  	<thead class="thead-light">
												    <tr>
												      <th scope="col">Vente</th>
												      <th scope="col">2016</th>
												      <th scope="col">2017</th>
												      <th scope="col">2018</th>
												      <th scope="col">2019</th>
												      <th scope="col">2020</th>
												    </tr>
												</thead>
												<tbody>
												    <tr>
												      <th scope="row">Le Monde</th>
												      <td>345210</td>
												      <td>345210</td>
												      <td>345210</td>
												      <td>345210</td>
												      <td>345210</td>
												    </tr>
											  	</tbody>
											</table>
											<div class="form-group">
		   										<label for="commentaireRapport"><small>Commentaire</small></label>
		    									<textarea class="form-control" id="commentaireRapport" rows="3"></textarea>
		  									</div>
		  									<button class="btn btn-warning">Supprimer</button>
		  									</hr>
		  								</div>
	  								</div>
	  								<div class="float-right" id="soumettreAnalyse">
	  									<button class="btn btn-info" type="submit">Soumettre</button>
	  								</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>
</html>