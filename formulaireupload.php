<?php
// Formulaireupload.php
$titrePage = 'upload de fichier';
include 'include/myheader.php';
?>


<form method="post" action="upload.php" enctype="multipart/form-data">
  
<!--  Taille maxi du fichier que l'on peut envoyer-->
   <input type="hidden" name="MAX_FILE_SIZE" value="99999">
    <p>
        <label>Nom</label>
        <input type="text" name="nom">
    </p>
    <p>
        <label>Fichier</label>
        <input type="file" name="monFichier">
    </p>
    <p>
        <input type="submit" name="btnSub" value="Go">
    </p>
</form>