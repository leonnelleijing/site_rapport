<?php
include_once '../template.php';
require_once '../functions.php';
session_start();
$cl=connectLogin();  

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
            $url= getParamsUrl();
            if ($url!=null) {
                $userId= $url['id'];
                $userNom= nomEm($cl,$userId);
                Navigation($userNom);
                $_SESSION['userId']=$userId;
                $_SESSION['userNom']=$userNom;
            }elseif(isset($_SESSION['userNom'])){
                $userNom=$_SESSION['userNom'];
                $userId=$_SESSION['userId'];
                Navigation($userNom);
            } else {
                header("Location: ../index.html");
            }    
            
        // chercher le service où le login travaille
            $sql="SELECT idService FROM employee where idEm =$userId";
            $resultat= sqlSelect($cl, $sql);
            $idService=$resultat[0][0];
            $_SESSION['idService']=$idService;
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
					<div class="card my-4 mx-4">
						<!-- les nouveaux rapports à faire -->
						<div class="card-body">
							<h3 class="card-title">Les nouveaux rapports</h3>
							<?php
                                                            //afficher tous les raports avec un état ouvert pour cette service 
                                                            $sql="SELECT date(dateRapport)as dateCreation, idRapport,nomRapport,etatRapport,urlRapport "
                                                                    . "from rapport where idService=$idService and etatRapport ='ouvert'" ;
                                                            tableRapport($cl, $sql);
                                                            
                                                        ?>
						</div>
                                                <!-- les rapports à rédiger -->
						<div class="card-body">
							<h3 class="card-title">Les rapports à rééditer</h3>
							<?php
                                                            $sql="SELECT date(dateRapport)as dateCreation, idRapport,nomRapport,etatRapport,urlRapport "
                                                                               . "from rapport where idService=$idService and etatRapport ='edit'" ;
                                                            tableRapport($cl, $sql);
                                                        ?>
						</div>                                              
						<!-- les rapports en attende de validation -->
						<div class="card-body">
							<h3 class="card-title">Les rapports en attente de valideation</h3>
							<?php
                                                            $sql="SELECT date(dateRapport)as dateCreation, idRapport,nomRapport,etatRapport,urlRapport "
                                                                               . "from rapport where idService=$idService and etatRapport ='soumis'" ;
                                                            tableRapport($cl, $sql);
                                                        ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>