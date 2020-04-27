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
			
			<!-- Contanu à droit -->
			<div class="col-md-10">
                            <div class="container">
                                <div class="card">
                                    <div class="card-header"><h4>Créer un login</h4></div>
                                    <div class="card-body">
                                        <form id="newLogin">
                                            <div class="form-group">
                                                <label for="nomService">Service</label>
                                                <select class="form-control" name="service">
                                                    <?php 
                                                        $query='SELECT * FROM service';
                                                        $result= mysqli_query($cl, $query);
                                                        while($nuplet=mysqli_fetch_array($result)){
                                                            echo "<option value='$nuplet[idService]'>"
                                                                    . "$nuplet[nomService]"
                                                                    . "</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="mailLogin">Mail</label>
                                                <input class="form-control" name="mailLogin">
                                            </div>
                                            <button type="button" class="btn btn-info" id="creerLogin"> Créer</button>
                                        </form>                                        
                                    </div>
                                </div>
                            </div>
                            <?php
                                modal();
                            ?>
                        </div>
                </div>
        </div>
</body>
</html>