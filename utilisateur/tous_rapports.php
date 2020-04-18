<?php
    include_once '../template.php';
    require_once '../functions.php';
    $ca= connectAnalyse();
    $cl= connectLogin();
    session_start();
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
                Navigation($userNom);
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
				<div class="card">
					<div class="card-header" id="headingOne">
					    <h2>Tous mes rapports</h2>
					</div>

				    <div class="card-body">
			        	<div class="card">
			        		<div class="card-body">
                                                    <?php
                                                        $sql="SELECT date(dateRapport)as dateCreation, idRapport,nomRapport,etatRapport from rapport where idService=$idService" ;
                                                        tableRapport($cl, $sql);
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