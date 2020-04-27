<?php
    include_once '../template.php';
    require_once '../functions.php';
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
                                                            <?php
                                                                $sql="SELECT date(R.dateRapport)as dateCreation, R.idRapport,R.nomRapport,R.etatRapport,R.urlRapport "
                                                                        . "from rapport R, service S where R.idService=S.idService and S.nomService='Marketing'";
                                                                tableRapport($cl, $sql)
                                                            ?>
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
                                                        <?php
                                                            $sql="SELECT date(R.dateRapport)as dateCreation, R.idRapport,R.nomRapport,R.etatRapport,R.urlRapport "
                                                                    . "from rapport R, service S where R.idService=S.idService and S.nomService='Finance'";
                                                            tableRapport($cl, $sql)
                                                        ?>
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