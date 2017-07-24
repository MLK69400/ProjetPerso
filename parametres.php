<?php
$titrePage = 'Paramètres URI';
include 'include/myheader.php';

/////////////////[écrire un cookie]////////////

//On écrit dans un cookie
//setcookie('nom', 'valeur');
// nom valeur et durer de vie du cookie
setcookie('monCookie', 'valeur',time()+3600);
//le true a la fin est pour empecher l'acces du cookie via javascript(faille XSS);
setcookie('monCookie', 'valeur',time() + 365*20*3600, null, null, false, true);

echo $_COOKIE['monCookie'];

////////////////////[Suprimer un cookie]///////////////
unset($_COOKIE['monCookie']);

setcookie('monCookie', 'valeur',time()-3600);

//serialisation de tableau
$tableau = array('a'=>1, 'b'=>2, 'c'=>3);
$serie = serialize($tableau);
echo $serie.'<br>';

//Deserialisation
print_r(unserialize($serie));

// Parametres
echo '<pre>';
print_r($_GET);// Affichage des parametres de l'URI
echo '</pre>';
//http://localhosr/php2/parametres.php?eleve=5&test=2&truc=muche&toto=4
//http://localhosr/php2/parametres.php?id=1


//Connexion
$dbh = new pdo('mysql:host=localhost;dbname=biovillefranche;charset=utf8','root', '');

//requete
//$req = "SELECT libCategorie
//        FROM categories
//        WHERE idCategorie = ?";
//
////préparation
//$stmt = $dbh->prepare($req);
//
////parametres
//$params = array($_GET['id']);
//
////execution
//$stmt->execute($params);
//$libelle = $stmt->fetchColumn();
//
////Affichage
//echo '<h2>'.$libelle.'</h2>';


//rechercher la liste des catégories pour afficher les liens
$rqMenu = "SELECT idCategorie, libCategorie
            FROM categories";

//Aucun paramètre exterieur = query
$stmtMenu = $dbh->query($rqMenu);

//Récupérer la liste
$liste = $stmtMenu->fetchAll();

//Affichage avec une boucle
foreach($liste as $cat)
{
    echo '<a href="parametres.php?id='.$cat['idCategorie'].'">'.$cat['libCategorie'].'</a>';
}


?>


<!--
<a href="parametres.php?id=1">lien 1</a>
<a href="parametres.php?id=2">lien 2</a>
<a href="parametres.php?id=3">lien 3</a>
-->


<?php include 'include/footer.php'; ?>