<?php
//Mentions.php
$titrePage = "Mentions Légales";
include 'include/myheader.php';

// Lecture facile
echo file_get_contents('mentionslegales.txt');

// Lecture ligne par ligne
$fd = fopen('mentionslegales.txt', 'r');

// Boucle de parcours du fichier
while(!feof($fd))      // feof = fin du fichier
{
    $ligne = fgets($fd,4096);  // Lecture de la ligne courante
    echo '<p>'.$ligne.'</p>'; // Affichage dans un paragraphe
}

// Lecture en tableau
$tabMentions = file('mentionslegales.txt');

// Verification
//echo '<pre>';
//print_r($tabMentions);
//echo '</pre>';

foreach($tabMentions as $mention)
{
//    echo '<p>'.$mention.'</p>';
    
    //on remplace les ligne vides par un <hr>
    if(trim($mention) == '')
    {
        echo '<hr class="h30" >';
        continue; // on passe a la ligne suivante
    }
//    // on cherche les ':' pour séparer la ligne dans un tableau
    $tLigne = explode(':', $mention);
    
    // on compte le nombre d'élément dans le tableau
    if(count($tLigne) ==2)
    {
        echo '<strong>'.$tLigne[0].': </strong>'.htmlentities($tLigne[1]).'<br>';
    }
    else  // si la ligne ne contenait pas ':'
    {
        echo '<em>'.$tLigne[0].'</em><br>';
    }
    
    //écrire dans un fichier
    $fd =fopen('monFichier.txt','w');//mode écriture
    
    //contenu
    $content = "hello world";
    
    //écriture
    fwrite($fd, $content);
    
    //fermeture!!!
    fclose($fd);
    
//    echo file_get_contents('monFicher.txt');
    
    //écrire dans une fichier existant
    $fd = fopen('monFichier.txt', 'a+');
    
    //contenu. PHP_EOL = saut de ligne selon le serveur
    $content = PHP_EOL.'je suis le contenu';
    //écriture
    fputs($fd, $content);
    
    //fermeture
    fclose($fd);
    
    // écriture CSV
    $data = array (
    array(10,10,10,10),
    array(20,20,20,20),
    array(30,30,30,30),
    array(40,40,40,40),
    array(50,50,50,50),
    );
    
    // ouverture du fichier CSV
    $fd = fopen('monFichier.txt','w');
    
    //boucle sur le tableau
    foreach($data as $ligneCSV)
    {
        fputcsv($fd, $ligneCSV, ';');
    }
    
    //fermeture
    fclose($fd);

}

/////////////////[travail sur repertoires]/////////////
$dir = 'images';

//si$dir est un repertoire
if(is_dir($dir))
{
    //ouvrerture du repertoire
    $dh = opendir($dir);
    //boucle sur le contenu du repertoire
    while(($fichier = readdir($dh)) !== false)
    {
        //virer le '.' et le '..'
        if($fichier == '.' OR $fichier == '..') continue;
        //afficher le nom du fichier (ou repertoire)
        echo '<p>'.$fichier.'</p>';
    }
    //fermeture du repertoire
    closedir($dh);
}

//répertoire dans un tableau
$t1 = scandir($dir);//ordre croissant
$t2 = scandir($dir, 1);//ordre décroissant
array_splice($t1, 0, 2);//suppression . et ..
array_splice($t2, -2);//suppression des deus derniers ligne du tableau
echo '<pre>';
print_r($t1);
print_r($t2);
echo '</pre>';



include 'include/footer.php';
?>