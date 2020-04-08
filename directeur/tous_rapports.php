<!DOCTYPE html>
<html>
<!-- head -->
    <?php
        include_once '../template.php';
        head();
    ?>
<body>
    <!-- Navigation et bandeau-->
        <?php
        // affihcer le nom de login
            session_start();
            $nom=$_SESSION['id'];
            Navigation($nom); 
        ?>

       <!-- Section pincipale-->

	<div class="container-fluid">
		<div class="row no-gutters">
                    <!-- Sidebar -->
                        <?php
                            sidebarUtilisateur();
                        ?>
                    <!-- Contenu principal -->
			<div class="col-md-10">
				<div class="accordion" id="accordionExample">
						<div class="card">
							<div class="card-header" id="headingOne">
							    <h2 class="mb-0">
							        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							          Service Marketing</span>
							        </button>
							    </h2>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      	<div class="card-body">
						        	<div class="card">
						        		<div class="card-body">
						        			<table class="table table-hover">
											  	<thead class="thead-light">
												    <tr>
												      <th scope="col">Date de creation</th>
												      <th scope="col">Numéro</th>
												      <th scope="col">Titre</th>
												      <th scope="col">Etat</th>
												      <th scope="col">Voir plus</th>
												    </tr>
												</thead>
												<tbody>
												    <tr>
												      <th scope="row">2020-02-13</th>
												      <td>mr_01</td>
												      <td>Evolution prix d'abonnement</td>
												      <td>Ouverture</td>
												      <td><a href="exemple_rapport.html">...</a></td>
												    </tr>
												    <tr>
												      <th scope="row">2020-02-13</th>
												      <td>mr_01</td>
												      <td>Evolution prix d'abonnement</td>
												      <td>Cloture</td>
												      <td><a href="exemple_rapport.html">...</a></td>
												    </tr>
											    	<tr>
												      <th scope="row">2020-02-13</th>
												      <td>mr_01</td>
												      <td>Evolution prix d'abonnement</td>
												      <td>Cloture</td>
												      <td><a href="exemple_rapport.html">...</a></td>
											   		</tr>
											  	</tbody>
											</table>
						        		</div>
						        	</div>
						     	</div>
						    </div>
					     	
							
						</div>
					  
						<div class="card">
							<div class="card-header" id="headingTwo">
							    <h2 class="mb-0">
							        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
							          Service Finance
							        </button>
							    </h2>
							</div>

							<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
					      	<div class="card-body">
					        	<div class="card">
					        		<div class="card-body">
					        			<table class="table table-hover">
										  	<thead class="thead-light">
											    <tr>
											      <th scope="col">Date de creation</th>
											      <th scope="col">Numéro</th>
											      <th scope="col">Titre</th>
											      <th scope="col">Etat</th>
											      <th scope="col">Voir plus</th>
											    </tr>
											</thead>
											<tbody>
											    <tr>
											      <th scope="row">2020-02-13</th>
											      <td>mr_01</td>
											      <td>Evolution prix d'abonnement</td>
											      <td>Ouverture</td>
											      <td><a href="exemple_rapport.html">...</a></td>
											    </tr>
											    <tr>
											      <th scope="row">2020-02-13</th>
											      <td>mr_01</td>
											      <td>Evolution prix d'abonnement</td>
											      <td>Cloture</td>
											      <td><a href="exemple_rapport.html">...</a></td>
											    </tr>
										    	<tr>
											      <th scope="row">2020-02-13</th>
											      <td>mr_01</td>
											      <td>Evolution prix d'abonnement</td>
											      <td>Cloture</td>
											      <td><a href="exemple_rapport.html">...</a></td>
										   		</tr>
										  	</tbody>
										</table>
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