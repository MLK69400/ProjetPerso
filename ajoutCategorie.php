<?php
$titrePage = "Ajout d'une catégorie";
include "include/myheader.php";
include "formulaire.php";

// connexion PDO
$dbh = new PDO('mysql:host=localhost;dbname=biovillefranche;charset=utf8', 'root', '');

//mode debug SQL
$dbh->setAttribute(PDO::ATTR_ERRMODE,
									 PDO::ERRMODE_WARNING);

//Mr Propre
$safe = array_map('strip_tags', $_POST);

//vérification si existe déjà
$rqVerif = "SELECT COUNT(*) 
					  FROM categories
					  WHERE libCategorie = ?";
$stmtVerif = $dbh->prepare($rqVerif); //préparation
$stmtVerif->execute(array($safe['libCategorie'])); //execution
$exists = $stmtVerif->fetchColumn(); //contient 0 ou 1
if($exists == 0){
	//ajout 
	$rqAjout = "INSERT INTO categories(libCategorie)
							VALUES(?)";	
	//préparation
	$stmtAjout = $dbh->prepare($rqAjout);
	//exécution
	$add = $stmtAjout->execute(array($safe['libCategorie']));
	if($add !== false)
	{
		echo '<p>catégorie ajoutée</p>';
	}
	else echo '<p>oups</p>';
}
else echo '<p>La catégorie existe déjà</p>';



//déconnexion
unset($dbh);
?>
