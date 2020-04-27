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

                        <!-- Contanu à droit -->
			<div class="col-md-10">
				<div class="container">
					<div class="card-body">
					        	<div class="card">
					        		<div class="card-body">
					        			<!-- Histoirque daté -->
					        			<div class="His-msg pre-scrollable">
                                                                            <?php
                                                                                $sql="SELECT DISTINCT L.idEm, L.idDirecteur,H.ContenuComm "
                                                                                        . "from historique H, login L where H.userId=L.userId  ORDER by date DESC";
                                                                                $result= sqlSelect($cl, $sql);
                                                                                foreach ($result as $row){
                                                                                    if($row[0]==null){
                                                                                        $imgDirecteur= srcImg($cl, $row[1],true);
                                                                                        echo'<div class="card-text border-secondary">'.
                                                                                                "<img src='../img/$imgDirecteur' class='img-thumbnail personnage'>".
                                                                                                '<small>2020-02-13 17:02:47 </small>'.
                                                                                                $row[2].
                                                                                            '</div>';
                                                                                    }else{                                                                                            
                                                                                        $imgEm= srcImg($cl, $row[0],false);
                                                                                        echo'<div class="card-text border-secondary">'.
                                                                                                "<img src='../img/$imgEm' class='img-thumbnail personnage'>".
                                                                                                '<small>2020-02-13 17:02:47 </small>'.
                                                                                                $row[2].
                                                                                            '</div>';
                                                                                    }
                                                                                }
                                                                            ?>
					        			</div>
					        		</div>
					        	</div>
					     	</div>


					     	<!-- Conmmentaire -->
					     	<?php
                                                    commentaire()
                                                ?>
				</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>