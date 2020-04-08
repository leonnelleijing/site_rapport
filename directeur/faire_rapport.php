<!DOCTYPE html>
<html>
<!-- head -->
    <?php
        include_once '../template.php';
        head();
    ?>
<body>
     <!-- Navigation et bandeau-->
        <?php
        // affihcer le nom de login
            session_start();
            $nom=$_SESSION['id'];
            Navigation($nom); 
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
						<div class="card-header">
							<h5> Créer un rapport</h5>
						</div>
						<div class="card-body">
							<form id="crerRapport">
								<div class="form-group">
								    <label for="TypeRapport">Service</label>
								    <select class="form-control" name="idService">
								      <?php
                                                                        require_once '../functions.php';
                                                                        $cl=connectLogin();
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
								    <label for="nomRapport">Nom de rapport</label>
								    <input type="text" class="form-control" name="nomRapport">
								</div>
								<div class="form-group">
	    							<label for="dscpRapport">Description</label>
	    							<textarea class="form-control" name="descripRapport" rows="3"></textarea>
	  							</div>
	  							<button type="button" class="btn btn-info" id="btnRapport">Créer</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
