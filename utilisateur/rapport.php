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
            if(isset($_SESSION['nom'])){
                $nom=$_SESSION['nom'];
                $id=$_SESSION['id'];
                Navigation($nom);
            } else {
                header("Location: ../index.html");
            }     
        ?>
    
    <!-- Section pincipale-->
	<div class="container-fluid">
		<div class="row no-gutters">
			<!-- Sidebar -->
                        <?php
                             sidebarUtilisateur();
                        ?>

			<div class="col-md-10">
				<div class="container">
					<div class="row">
						<div class="col-3" id="paramRapport">
							<!-- Historique -->
							<div class="card" style="margin-bottom: 2em">
								<div class="card-header">
									<h4>Historiques</h4>
								</div>
								<div class="card-body">
                                                                    <a class="btn btn-info" href="historique.php">Historique</a>
								</div>
							</div>
							<!-- ajouter un KPI -->
							<div class="card">
								<div class="card-header">
									<h5>Sélectionner vos indicateur</h5>
								</div>
								<div class="card-body">
                                                                    <form id="paramAnalyse">
									<div class="form-group">
									    <label for="NomPU">Nom de publication</label>
									    <select class="form-control" name="CodePU">
     
                                                                              <?php
                                                                              require_once '../functions.php';
                                                                              $ca= connectAnalyse();
                                                                              $query="SELECT CodePU, NomPU FROM publication";
                                                                              $result= mysqli_query($ca, $query);
                                                                              if($result==false){
                                                                              die("Erreur sélection statuts : " . mysqli_error($cl));
                                                                              }
                                                                              while ($row= mysqli_fetch_array($result)){
                                                                                 echo"<option value='$row[CodePU]'>"
                                                                                         . "$row[NomPU]"
                                                                                         . "</option>";
                                                                              }
                                                                              ?>
									    </select>
									</div>
									<div class="form-group">
									    <label for="indicateur">KPI</label>
									    <select class="form-control" name="idKPI">
                                                                                <?php
                                                                                $idService=$_SESSION['idService'];
                                                                                $cl= connectLogin();
                                                                                $query="SELECT idKPI,nomKPI FROM kpi where idService=$idService";
                                                                                $result= mysqli_query($cl, $query);
                                                                                if($result==false){
                                                                                    die("Erreur sélection statuts : " . mysqli_error($cl));
                                                                                }
                                                                                while ($row= mysqli_fetch_array($result)){
                                                                                   echo"<option value='$row[idKPI]'>$row[nomKPI]</option>";
                                                                                }
                                                                                ?>
                                                                                
									      
									    </select>
									</div>
									<div class="form-group">
									    <label for="analyseDate">SQL personnalisé</label>
                                                                            <textarea class="form-control" id="customizeSql" placeholder="Entrer le votre requête sql personnalisée" rows="5"></textarea>
									</div>
		  							<button type="button" class="btn btn-info" id="btnR">Ajouter</button>
								</form>
								</div>
							</div>
						</div>
						<div class="col-9" id="contenuRapport">
							<div class="card">
								<div class="card-header">
									<div class="input-group">
                                                                                <?php
                                                                                    $query_str = $_SERVER['QUERY_STRING'];
                                                                                    parse_str($query_str);
                                                                                    parse_str($query_str, $query_arr);
                                                                                    echo"<input type='text' id='nomRapport' name='nomRapport' class='form-control' value='$nomRapport' aria-label='Analyse de vente' aria-describedby='btnModifier'>";
                                                                                ?>
										<div class="input-group-append">
											<button class="btn btn-outline-info" id="btnModifier">Modifier</button>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="container" id="analyseBody">
										
	  								</div>
	  								<div class="float-right" id="soumettreAnalyse">
                                                                            <button class="btn btn-info" type="button">Soumettre</button>
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