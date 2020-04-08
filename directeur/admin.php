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
                $nom= nomAdmin($cl,$id);
                Navigation($nom);
                $_SESSION['id']=$id;
                $_SESSION['nom']=$nom;
            }elseif(isset($_SESSION['nom'])){
                $nom=$_SESSION['nom'];
                Navigation($nom);
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
                                <div class="card">
                                        <div class="card-body">
                                                <h3 class="card-title">Vos dernier rapport à valider</h3>
                                                <table class="table table-hover">
                                                        <thead class="thead-light">
                                                            <tr>
                                                              <th scope="col">Date de creation</th>
                                                              <th scope="col">Service</th>
                                                              <th scope="col">Numéro</th>
                                                              <th scope="col">Titre</th>
                                                              <th scope="col">Etat</th>
                                                              <th scope="col">Voir plus</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                              <th scope="row">2020-02-13</th>
                                                              <td>Merketing</td>
                                                              <td>mr_01</td>
                                                              <td>Evolution prix d'abonnement</td>
                                                              <td>Ouverture</td>
                                                              <td><a href="#">...</a></td>
                                                            </tr>
                                                            <tr>
                                                              <th scope="row">2020-02-13</th>
                                                              <td>Merketing</td>
                                                              <td>mr_01</td>
                                                              <td>Evolution prix d'abonnement</td>
                                                              <td>Cloture</td>
                                                              <td><a href="#">...</a></td>
                                                            </tr>
                                                        <tr>
                                                              <th scope="row">2020-02-13</th>
                                                              <td>Merketing</td>
                                                              <td>mr_01</td>
                                                              <td>Evolution prix d'abonnement</td>
                                                              <td>Cloture</td>
                                                              <td><a href="#">...</a></td>
                                                                </tr>
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