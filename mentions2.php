<?php
$titrePage = "exo";
include 'include/myheader.php';

//faire un export CSV de la table produits (id,prix,description,sous-categorie, fournisseur, nom, dateCreation et date de modif)



//connection
$dbh = new pdo('mysql:host=localhost;dbname=biovillefranche;charset=utf8','root', '');

//requete
$req = "SELECT p.idProduit, p.prix, s.libSCategorie, f.RS, p.description,  p.nom, p.dateCrea, p.dateModif
                  FROM produits as p
                  JOIN scategories as s
                  ON s.idSCategorie = p.idSCategorie
                  JOIN fournisseurs as f
                  ON f.idFournisseur = p.idFournisseur";

//query
$stmt = $dbh ->query($req);

//recuperation
$liste = $stmt->fetchAll(PDO::FETCH_NUM);

//fichier
$fd = fopen('produit.csv','w');

//boucle sur le tableau
foreach($liste as $produit)
{
    fputcsv($fd, $produit, ';');
}

//fermeture
fclose($fd);


include 'include/footer.php';
?>