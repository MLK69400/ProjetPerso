


<?php
$titrePage = "Ajout d'une catégorie";
include "include/myheader.php";
?>
<form method="post" action="ajoutCategorie.php">
    <p>
        <label>Catégorie</label>
        <input type="text" name="libCategorie" />
    </p>
    <p>
        <input type="submit" name="bntSub" value="Ajouter" />
</form>
<?php
include "include/footer.php";
?>