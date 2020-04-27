<?php
include_once '../template.php';
require_once '../functions.php';
$cl=connectLogin();  
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
            if(isset($_SESSION['userId'])){
                $userNom=$_SESSION['userNom'];
                $userId=$_SESSION['userId'];
                $srcImg=$_SESSION['srcImg'];
                Navigation($userNom,$srcImg);
            } else {
                header("Location: ../index.html");
            }     
        ?>
    
    <!-- Sidebar et contenu-->
	<div class="container-fluid">
            <div class="row no-gutters">
            <!-- Sidebar -->
                    <?php
                        sidebarDirecteur();
                    ?>
            <!-- Contenu principal -->
                <div class="col-md-10">
                        <!-- dernière rapport à valider -->
                        <div class="container">
                            <?php
                            //afficher les rapports avec un état de soumis
                            $sql="SELECT date(R.dateRapport)as dateCreation,S.nomService, R.idRapport,R.nomRapport,R.etatRapport 
                                                            from rapport R, service S where R.idService=S.idService and etatRapport ='soumis'" ;
                            $title='Des rapports reste à valider';
                            tableRapportAdmin($cl, $sql, $title);

                            //afficher les rapports avec un état d'ouvert 
                            $sql="SELECT date(R.dateRapport)as dateCreation,S.nomService, R.idRapport,R.nomRapport,R.etatRapport 
                                                            from rapport R, service S where R.idService=S.idService and etatRapport ='ouvert'" ;
                            $title='Des nouveaux rapports';
                            tableRapportAdmin($cl, $sql, $title);
                            ?>
                                       
                                
                        </div>
                </div>
            </div>
        </div>
</body>
</html>