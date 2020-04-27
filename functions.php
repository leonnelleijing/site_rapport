<?php

// definition des constantes de connexion
define("host", "localhost"); //nom de serveur 
define("uid", "root"); //id
define("pwd", ""); //mdp
define("dbLA", "lagardere_active");
define("dbSW", "site_web");

function connecter($dbname) {
    $connec = mysqli_connect(host, uid, pwd);
    if ($connec == NULL) {
        die("Erreur connexion à MySQL/Maria DB : " . mysqli_connect_error());
    } else { // connexion réussie
        mysqli_query($connec, 'set names utf8');
        mysqli_query($connec, 'set character_set_client = utf-8');
        mysqli_query($connec, 'set character_set_results = utf-8');

        if (mysqli_select_db($connec, $dbname) == FALSE) {
            die("Choix base impossible : " . mysqli_error($connec));
        } else { // base est correctement - Tout OK
            return $connec;
        }
    }
}

// connecter à la base de donner "lagardere_active"
function connectAnalyse() {
    return connecter(dbLA);
}

// connecter à la base de donner "site_web"
function connectLogin() {
    return connecter(dbSW);
}

//afficher le nom d'un directeur avec un id donnée
function nomAdmin($cl, $id) {
    $query = "SELECT nomDirecteur FROM directeur WHERE idDirecteur=$id ";
    $result = mysqli_query($cl, $query);
    $row = mysqli_fetch_array($result);
    return $row['nomDirecteur'];
}

//afficher le nom d'un employee avec un id donnée
function nomEm($cl, $id) {
    $query = "SELECT nomEm FROM employee WHERE idEm=$id ";
    $result = mysqli_query($cl, $query);
    if (!$result) {
        return false;
    } else {
        $row = mysqli_fetch_array($result);
        return $row['nomEm'];
    }
}

//determiner si une personne est directeur 
function isDirecteur($cl, $userId) {
    $sql = "SELECT idDirecteur FROM login WHERE userId=$userId";
    $row = sqlSelect($cl, $sql);
    if ($row[0][0] == null) {
        return false;
    } else {
        return true;
    }
}

//source d'image d'un emloyer
function srcImg($cl, $idUser, $type) {
    if ($type) {
        $sql = "SELECT imgDirecteur FROM directeur WHERE idDirecteur=$idUser";
        $row = sqlSelect($cl, $sql);
        return $row[0][0];
    } else {
        $sql = "SELECT imgEm FROM employee WHERE idEm=$idUser";
        $row = sqlSelect($cl, $sql);
        return $row[0][0];
    }
}

//afficher un tableau conteannt des informations sur des rapports
function tableRapport($cl, $sql) {
    echo'<table class="table table-hover">
            <thead class="thead-light">
                <tr>
                  <th scope="col">Date de creation</th>
                  <th scope="col">Numéro</th>
                  <th scope="col">Titre</th>
                  <th scope="col">Etat</th>
                  <th scope="col">Voir plus</th>
                </tr>
            </thead>
            <tbody>';
    $result = sqlSelect($cl, $sql);
    foreach ($result as $row) {
        echo "<tr>" .
        "<th scope='row'>" . $row[0] . "</th>" .
        "<td class='idRapport'>" . $row[1] . "</td>" .
        "<td class='nomRapport'>" . $row[2] . "</td>" .
        "<td>" . $row[3] . "</td>";
        if ($row[4] == null) {
            echo "<td><a href='rapport.php' class='hrefRappport'>" . "..." . "</a></td>" .
            "</tr>";
        } else {
            $href = '../rapport_valide/' . $row[4];
            echo "<td><a href='$href'>" . "..." . "</a></td>";
        }
    }
    echo '</tbody>
        </table>';
}

//afficher un tableau contenant des informations sur des rapports
function tableRapportAdmin($cl, $sql, $title) {
    echo '<div class="card">
            <div class="card-body">';
    echo "<h3 class='card-title'>$title</h3>";
    echo '<table class="table table-hover">
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
            <tbody>';
    $result = sqlSelect($cl, $sql);
    foreach ($result as $row) {
        echo "<tr>" .
        "<th scope='row'>" . $row[0] . "</th>" .
        "<td>" . $row[1] . "</td>" .
        "<td  class='idRapport'>" . $row[2] . "</td>" .
        "<td class='nomRapport'>" . $row[3] . "</td>" .
        "<td>" . $row[4] . "</td>" .
        "<td><a href='rapport.php' class='hrefRappport'>...</a></td>" .
        "</tr>";
    }
    echo '</tbody>
        </table>
       </div>
     </div>';
}

// function sql select des donnés 
function sqlSelect($cl, $sql) {
    $result = mysqli_query($cl, $sql);
    if ($result == false) {
        die("Erreur sélection statuts : " . mysqli_error($cl));
    }
    $final = array();
    while ($row = mysqli_fetch_row($result)) {
        array_push($final, $row);
    }
    return $final;
}

function getParamsUrl() {
    $query_str = $_SERVER['QUERY_STRING'];
    parse_str($query_str);
    parse_str($query_str, $query_arr);
    return $query_arr;
}

function SixRandomChiffre() {
    $arr = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
    shuffle($arr);
    $arr2 = array_rand($arr, 6);
    $random = '';
    foreach ($arr2 as $index) {
        $random .= $arr[$index];
    }
    return $random;
}
