<?php
    include_once '../template.php';
    require_once '../functions.php';
    $ca= connectAnalyse();
    $cl= connectLogin();
    session_start();
    
    // get idRapport et le mettre dans la session

    $url= getParamsUrl();
    $nomRapport=$url['nomRapport'];
    $idRapport=$url['idRapport'];
    $_SESSION['idRapport']=$idRapport;
    
    //obtenir le idService où l'employee travaille  
    $idService=$_SESSION['idService'];
?>
<!DOCTYPE html>
<html>
<!-- head -->
    <?php
        head();
    ?>
<body>
    <!-- Navigation et bandeau-->
        <?php
        // affihcer le nom de login
            if(isset($_SESSION['userNom'])){
                $userNom=$_SESSION['userNom'];
                $id=$_SESSION['userId'];
                $srcImg=$_SESSION['srcImg'];
                Navigation($userNom,$srcImg);
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
                                                                                <option value='null'>-Tous les publications-</option>
                                                                              <?php
                                                                              $query="SELECT CodePU, NomPU FROM publication";
                                                                              $result= sqlSelect($ca, $query);
                                                                              foreach ($result as $row) {
                                                                                  echo"<option value='$row[0]'>$row[1]</option>";
                                                                              }
                                                                              ?>
									    </select>
									</div>
									<div class="form-group">
									    <label for="indicateur">KPI</label>
									    <select class="form-control" name="idKPI">
                                                                                <?php
                                                                                $idService=$_SESSION['idService'];
                                                                                
                                                                                $query="SELECT idKPI,nomKPI FROM kpi where idService=$idService";
                                                                                $result= sqlSelect($cl, $query);
                                                                                foreach ($result as $row) {
                                                                                    echo"<option value='$row[0]'>$row[1]</option>";

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
                                                                                    echo "<input type='text' id='nomRapport' name='nomRapport' class='form-control'"
                                                                                            ."value='$nomRapport'"
                                                                                            ."aria-label='Analyse de vente' aria-describedby='btnModifier'>";
                                                                                ?>
										<div class="input-group-append">
											<button class="btn btn-outline-info" id="btnModifier">Modifier</button>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="container" id="analyseBody">
                                                                            <?php
                                                                                $sql="SELECT idContenu,nomContenu,tableAnalyse,synthese FROM contenu where idRapport=$idRapport";
                                                                                $result= sqlSelect($cl, $sql);
                                                                                foreach ($result as $row) {
                                                                                    echo "<div class='my-4' id=$row[0]>".
                                                                                        "<h4> $row[1]</h4>".
                                                                                        $row[2].
                                                                                        '<div class="form-group">'.
                                                                                                '<label for="commentaireRapport">'.
                                                                                                '<small>Synthèse</small></label>'.
                                                                                                '<textarea class="form-control" id="commentaireRapport" rows="3">'.$row[3].'</textarea>'.
                                                                                        '</div>'.
                                                                                        '<button class="btn btn-warning" id="btn" onclick="removeAll(this)">Supprimer</button><hr>'.
                                                                                        '</div>';
                                                                                }
                                                                            ?>
	  								</div>
	  								<div class="float-right" id="soumettreAnalyse">
                                                                            <button class="btn btn-info" type="button" id="soumettre">Soumettre</button>
	  								</div>
								</div>
                                                            <?php
                                                              modal();
                                                            ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>
</html>