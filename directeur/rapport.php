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
                $nom=$_SESSION['userNom'];
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
                            sidebarDirecteur();
                        ?>
		<div class="col-md-10">
				<div class="container">
					<div class="row">
						<div class="col-3">
							<div class="card">
								<div class="card-header">
									<h5>Actions</h5>
								</div>
								<div class="card-body">
									<div class="my-4">
										<a class="btn btn-info" href="historique.php">Historique</a>
									</div>
									<form method="post" action="../nouvelle_historique.php">
									<div class="form-group">
		    							<label for="commmRapport">Commentaire</label>
		    							<textarea class="form-control" name="commentaire" rows="3"></textarea>
		  							</div>
                                                                            <button type="submit" class="btn btn-info">Envoyer</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-9">
							<div class="card">
								<div class="card-header">
									<div class="input-group">
										<h4 id="nomRapport"> 
                                                                                <?php
                                                                                    echo "$nomRapport";
                                                                                ?>
                                                                                </h4>
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
                                                                                                '<div>'.$row[3].'</div>'.
                                                                                        '</div>'.
                                                                                        '</div>';
                                                                                }
                                                                            ?>
	  								</div>
								</div>
							</div>
                                                        <div class="float-right">
                                                            <button class="btn btn-info"  id="validerAnalyse" type="button">Valider</button>
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
</body>
</html>