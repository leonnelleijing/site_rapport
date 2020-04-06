<!DOCTYPE html>
<html>
<!-- head -->
    <?php
        include_once 'template.php';
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
                            sidebar();
                        ?>
			
			<!-- Contanu à droit -->
			<div class="col-md-10">
				<div class="container">
					<div class="card">
						<div class="card-header">
							<h5> Créer un rapport</h5>
						</div>
						<div class="card-body">
							<form>
								<div class="form-group">
								    <label for="TypeRapport">Type rapport</label>
								    <select class="form-control" id="TypeRapport">
								      <option>1</option>
								      <option>2</option>
								      <option>3</option>
								      <option>4</option>
								      <option>5</option>
								    </select>
								</div>
								<div class="form-group">
								    <label for="sujetRapport">Sujet</label>
								    <input type="text" class="form-control" id="sujetRapport">
								</div>
								<div class="form-group">
	    							<label for="dscpRapport">Description</label>
	    							<textarea class="form-control" id="dscpRapport" rows="3"></textarea>
	  							</div>
	  							<button type="submit" class="btn btn-info">Créer</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
