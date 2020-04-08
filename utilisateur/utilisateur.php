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
            require_once '../functions.php';
            $query_str = $_SERVER['QUERY_STRING'];
            parse_str($query_str);
            parse_str($query_str, $query_arr);
            session_start();
            if ($query_arr!=null) {
                $cl=connectLogin(); 
                $nom= nomEm($cl,$id);
                Navigation($nom);
                $_SESSION['id']=$id;
                $_SESSION['nom']=$nom;
            }elseif(isset($_SESSION['nom'])){
                $nom=$_SESSION['nom'];
                $id=$_SESSION['id'];
                Navigation($nom);
            } else {
                header("Location: ../index.html");
            }    
        ?>
    
    
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
							<table class="table table-hover">
							  	<thead class="thead-light">
								    <tr>
								      <th scope="col">Date de creation</th>
								      <th scope="col">Numéro</th>
								      <th scope="col">Titre</th>
								      <th scope="col">Etat</th>
								      <th scope="col">Voir plus</th>
								    </tr>
								</thead>
								<tbody>
                                                                    <?php
                                                                        // chercher le service où le login travaille
                                                                       $sql="SELECT idService FROM employee where idEm =$id";
                                                                       $row= sqlSelect($cl, $sql);
                                                                       $idService=$row['idService'];
                                                                       
                                                                       //afficher tous les raports avec une état ouverte pour cette service 
                                                                       $sql="SELECT date(dateRapport)as dateCreation, idRapport,nomRapport,etatRapport "
                                                                               . "from rapport where idService=$idService and etatRapport ='ouvert'" ;
                                                                       $result= mysqli_query($cl, $sql);
                                                                        if($result==false){
                                                                            die("Erreur sélection statuts : " . mysqli_error($cl));
                                                                        }
                                                                        while($row= mysqli_fetch_array($result)){
                                                                            echo "<tr>".
                                                                                "<th scope='row'>".$row['dateCreation']."</th>".
                                                                                "<td>".$row['idRapport']."</td>".
                                                                                "<td>".$row['nomRapport']."</td>".
                                                                                "<td>".$row['etatRapport']."</td>".
                                                                                "<td><a href='exemple_rapport.php'>...</a></td>".
                                                                                "</tr>";
                                                                        }     
 
                                                                    ?>
								    
							  	</tbody>
							</table>
						</div>

						<!-- les rapports en attende de validation -->
						<div class="card-body">
							<h3 class="card-title">Les rapports en attente de valideation</h3>
							<table class="table table-hover">
							  	<thead class="thead-light">
								    <tr>
                                                                      <th scope="col">Date de creation</th>
								      <th scope="col">Numéro</th>
								      <th scope="col">Titre</th>
								      <th scope="col">Etat</th>
								      <th scope="col">Voir plus</th>
								    </tr>
								</thead>
								<tbody>
                                                                <?php
								   $sql="SELECT date(dateRapport)as dateCreation, idRapport,nomRapport,etatRapport "
                                                                               . "from rapport where idService=$idService and etatRapport ='à valider'" ;
                                                                       $result= mysqli_query($cl, $sql);
                                                                        if($result==false){
                                                                            die("Erreur sélection statuts : " . mysqli_error($cl));
                                                                        }
                                                                        while($row= mysqli_fetch_array($result)){
                                                                            echo "<tr>".
                                                                                "<th scope='row'>".$row['dateCreation']."</th>".
                                                                                "<td>".$row['idRapport']."</td>".
                                                                                "<td>".$row['nomRapport']."</td>".
                                                                                "<td>".$row['etatRapport']."</td>".
                                                                                "<td><a href='exemple_rapport.html'>"."..."."</a></td>".
                                                                                "</tr>";
                                                                        }  
                                                                 ?>
							  	</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>