<?php

// pdo.php
$titrePage = 'PDO';
include 'include/myheader.php';

// Connexion PDO
$dbh = new PDO ('mysql:host=localhost;dbname=biovillefranche;charset=utf8','root', '');

// Vérification
echo '<br>';
print_r($dbh); // Affiche PDO Object() si ok


// Ajout d'un utilisateur
$req = "INSERT INTO clients(nomClient, prenomClient, mailClient, actif)
    VALUES('truc', 'muche', 'truc@muche.com', 1)";
echo '<br>';

$nb = $dbh -> exec($req); // Exécution
echo $nb.'client ajouté';

// Récupération de l'ID du client ajouté
echo $dbh->lastInsertId();
echo '<br>';

$req2 = "DELETE FROM clients
         WHERE mailClient = 'truc@muche.com'";
$nb2 = $dbh->exec($req2);
echo $nb2.'clients effacés <br>';


// Récupérer une seule valeur
$req3 = "SELECT libCategorie from categories
         WHERE idCategorie = 1";

$stmt = $dbh->query($req3);
$resultat = $stmt->fetchColumn();
echo '<p>'.$resultat.'</p>';

// Récupérer une seule ligne
$req4 = "SELECT nomClient, prenomClient, mailClient, dateCrea, dateModif FROM clients 
            WHERE idClient = 1";
$stmt2 = $dbh->query($req4);
$resultat = $stmt2->fetch(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($resultat);
echo '</pre>';


// Récupérer toutes les lignes
$req5 = "SELECT idProduit, prix, nom
         FROM produits";
$stmt3 = $dbh ->query($req5);
$produits = $stmt3->fetchAll(PDO::FETCH_NUM);

echo '<pre>';
print_r($produits);
echo '</pre>';


///////////[Requetes préparées 1]//////////
$req6 = "SELECT idProduit, prix, nom
         FROM produits
         WHERE nom = ?";
// Préparation
$stmt4=$dbh->prepare($req6);
// Execution
$stmt4 ->execute(array('bananes'));
// Récupération
$fruit = $stmt4->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($fruit);
echo '</pre>';

///////////[Requetes préparées 2]//////////
$req7 = "SELECT idProduit, prix, nom
         FROM produits
         WHERE nom = :nom";
// Préparation
$stmt5 = $dbh->prepare($req7);
// Execution
$params = array(':nom' => 'bananes');
$stmt5 ->execute($params);
// Récupération
$fruit2 = $stmt5->fetchAll(PDO::FETCH_NUM);
echo '<pre>';
print_r($fruit2);
echo '</pre>';


///////////[Requetes préparées 3]//////////
$req8 = "SELECT idProduit, prix, nom
         FROM produits
         WHERE nom = ?";
// Préparation
$stmt6 = $dbh->prepare($req8);
// Execution
$val = 'bananes';
$stmt6 ->bindParam(1, $val, PDO::PARAM_STR, 50);
$stmt6 ->execute();
// Récupération
$fruit3 = $stmt6->fetch();
echo '<pre>';
print_r($fruit3);
echo '</pre>';


///////////[Requetes préparées 4]//////////
$req9 = "SELECT idProduit, prix, nom
         FROM produits
         WHERE nom = :nom OR prix < :prix";
// Préparation
$stmt7 = $dbh->prepare($req9);
$prix = '2.00';
// Execution
$stmt7 ->bindParam(':nom', $val, PDO::PARAM_STR, 50);
$stmt7 ->bindParam(':prix', $prix, PDO::PARAM_STR, 5);
$stmt7 ->execute();
// Récupération
$fruit4 = $stmt7->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($fruit4);
echo '</pre>';


// Pour forcer le type de récupération
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


// Mode debug SQL
$dbh-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


// Déconextion
unset($dbh);




include 'include/footer.php';

?>