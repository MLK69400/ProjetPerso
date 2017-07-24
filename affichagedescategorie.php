<?php 

$titrePage = "Affichage des catégories";
include 'include/myheader.php'; 

?> 


<ul>
    <?php
    $baseInfo = array('localhost','root','','biovillefranche');
    $dnh = new PDO('mysql:host='.$baseInfo[0].';dbname='.$baseInfo[3].';charset=utf8', $baseInfo[1], $baseInfo[2], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
    $req1 = "SELECT libCategorie FROM categories";
    $stmt1 = $dnh->query($req1);
    $categorie = $stmt1->fetchAll();
    foreach($categorie as $value){
        echo'<li>'.$value['libCategorie'].'</li>';
    }
    unset($dnh);
    ?>
</ul>
<ul>
    <?php
    $baseInfo = array('localhost','root','','biovillefranche');
    $dnh = new PDO('mysql:host='.$baseInfo[0].';dbname='.$baseInfo[3].';charset=utf8', $baseInfo[1], $baseInfo[2], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
    $req1 = "SELECT idCategorie, libCategorie FROM categories";
    $stmt1 = $dnh->query($req1);
    $categorie1 = $stmt1->fetchAll();
    foreach($categorie1 as $value1)
    {
        echo'<li>';
        echo $value1['libCategorie'];
        echo'<ul>';
        
        $req2 = "SELECT libSCategorie FROM scategories WHERE idCategorie = ".$value1['idCategorie'];
        $stmt2 = $dnh->query($req2);
        $categorie2 = $stmt2->fetchAll();
        foreach($categorie2 as $value2)
        {
            echo'<li>'.$value2['libSCategorie'].'</li>';
        }

        echo'</ul>';
        echo'</li>';
    }
    unset($dnh);
    ?>
</ul>


<?php   $titrePage = 'Divers liste';   
include 'include/myheader.php';    
include 'include/connexion.php';   // Affiche la liste des catégories 

// recuperation des catégories   
$req = "SELECT libCategorie FROM categories"; 

// execution   
$stmt = $dbh->query($req);

// recuperation   
$listeCategorie = $stmt->fetchAll();     
echo '<ul> Les catégories:';   
foreach ($listeCategorie as $cat) 
{     
    echo '<li>' . ucfirst($cat['libCategorie']) . '</li>';   
}   
echo '</ul>';   unset($dbh);   

// Affiche la liste des sous-categories dans un tableau HTML en récupérant le nom des catégories associées   
include 'include/connexion.php';   
$req2 ="SELECT s.idSCategorie, s.libSCategorie, c.libCategorie FROM scategories AS s JOIN categories AS c ON s.idCategorie = c.idCategorie ORDER BY s.idCategorie ASC";   

// execution   
$stmt2 = $dbh->query($req2);   

// recuperation   
$listeS = $stmt2-> fetchAll(); 

unset($dbh);   
// print_r($listeS); 
?>   
<br>   
<table>     
    <thead>       
        <tr>         
            <th>Catégorie</th>         
            <th>Sous-catégorie</th>       
        </tr>     
    </thead>     
    <tbody>       
        <?php         foreach ($listeS as $liste) 
{           
    echo '<tr><td>' . $liste['idSCategorie'] . '</td><td>' . $liste['libCategorie'] . '</td><td>' . $liste['libSCategorie'] . '</td></tr>';         
}        
        ?>     
    </tbody>   
</table> 
<?php   
include 'include/footer.php';  
?>

<?php

//PARTIE 2
//LISTE DES SOUS CATEGORIES DANS TABLEAU HTML
include 'include/connexion.php';
//requête
$rqSCategories = "SELECT s.idSCategorie, s.libSCategorie, c.libCategorie
                 FROM scategories as s
                 JOIN categories as c
                 ON s.idCategorie = c.idCategorie
                 ORDER BY s.idCategorie ASC";

//exécution
$stmtSCategorie = $dbh->query($rqSCategories);

//récupération
$listeSCategories = $stmtSCategorie->fetchAll();

//affichage
//print_r($listeSCategories);
?>

<table>
    <thead>
        <tr>
            <th>ID Categorie</th>
            <th>Sous-Catégorie</th>
            <th>Categorie</th>
        </tr>
    </thead>
    <tbody>
        <?php //boucle d'affichage
        foreach($listeSCategories as $scat):?>
        <tr>
            <td><?= $scat['idSCategorie']; ?></td>
            <td><?= $scat['libSCategorie']; ?></td>
            <td><?= $scat['libCategorie']; ?></td>
        </tr>
        <?php endforeach; //ne pas oublier ?>
    </tbody>
</table>


<?php
//deconnexion
unset($dbh);

include "include/footer.php";
?>

