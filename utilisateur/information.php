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


			<div class="col-md-10">
                            
                        </div>
                </div>
        </div>
</body>
</html>
