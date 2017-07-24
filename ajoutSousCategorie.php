<?php
$titrePage = "Ajout d'une sous-catégories";
include "include/myheader.php";
include "formulaire.php";


// connexion PDO à la bdd
$dbh = new PDO('mysql:host=localhost;dbname=biovillefranche;charset=utf8', 'root', '');

//mode debug SQL
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
// pour forcer le type de récuperation
$dbh->setAttribute (PDO::ATTR_DEFAULT_FETCH_MODE,
                    PDO::FETCH_ASSOC);
//MR propre
$safe = array_map('strip_tags', $_POST);

//la sous categorie est deja ds la table 
$rqVerif = "SELECT COUNT(*) 
            FROM scategories 
            WHERE libSCategorie = ? AND idCategorie = ? ";

//preparation
$stmtVerif = $dbh->prepare($rqVerif);

//parametre
$params = array($safe['libSCategorie'],$safe['idCategorie']);

//execution
$stmtVerif->execute($params);

//recupêration d'une unique info
$exist = $stmtVerif->fetchColumn();

//verification
//echo $exist;
//print_r($safe);
//si la sous categorie n'existe pas ds la table
if($exist==0)
{

    //requete
    $rqAjout ="INSERT INTO scategories(idCategorie,libSCategorie) VALUES(:idCategorie ,:libSCategorie)";
    
    //preparation
    $stmtAjout =$dbh->prepare($rqAjout);
    
    //parametre
    $param2 =array(':idCategorie' => $safe['idCategorie'],':libSCategorie'=>$safe['libSCategorie']);
    
    //execution
    if( $stmtAjout->execute($param2)) {

        echo'<p>sous-categorie ajoutés</p>';
    } 
    else
        echo'<p>oups</p>';
    }
    else
        echo'<p>Sous categorie existe deja</p>';


?>
