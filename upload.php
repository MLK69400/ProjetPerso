<?php
// Upload.php
$titrePage = 'UPLOAD';
include 'include/myheader.php';

echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';

//si le ficher contien des erreur
if($_FILES['monFichier']['error'] > 0)
{
    // affiche une erreur
    echo '<p>Une erreur c\'est produit.</p>';
}
// sinon
else
{
    //récupérer le taille de l'image
    $size = getimagesize($_FILES['monFichier']['tmp_name']);
    echo '<pre>';
    print_r($size);
    echo '</pre>';
    
    //Si ce n'est pas une image affiche........
    if(!$size) echo '<p>ce n\'est pas une image</p>';
    
    //////////[Vérifier un fichier de type mime]/////////
    
    //récupérer le type mime
    $info = new finfo(FILEINFO_MIME_TYPE);
    
    //le mime du fichier monFichier
    $mime = $info->file($_FILES['monFichier']['tmp_name']);
    
    // donne les types et .exe en plus de print_r()
    var_dump($mime);
    
    // Changé le nom du fichier envoyer
    $extension = substr($_FILES['monFichier']['name'],
                       strrpos($_FILES['monFichier']['name'],'.'));
    
    echo $extension;
    $nomFichier = md5(uniqid(rand(),true));
    echo '<p>Nouveau nom:'.$nomFichier.$extension.'</p>';
    
    // bouge le fichier du dossier temp dans le dossier images
    $up = move_uploaded_file($_FILES['monFichier']['tmp_name'], 'images/'.$nomFichier.$extension);
    
    // Si le fichier a bougé affiche fichier tele...
    if($up) echo '<p>Fichier télécharger</p>';
}
?>