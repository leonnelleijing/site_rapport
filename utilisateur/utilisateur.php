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
            if(isset($_SESSION['userNom'])){
                $userNom=$_SESSION['userNom'];
                $userId=$_SESSION['userId'];
                $idService=$_SESSION['idService'];
                $srcImg=$_SESSION['srcImg'];
                Navigation($userNom,$srcImg);
            }elseif (isset ($_SESSION['idService'])) {
                 header("Location: ../complete_info.php");
            }else {
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