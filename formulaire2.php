<?php
$titrePage = "Ajout d'une Sous-catégorie";
include "include/myheader.php";
?>
<form method="post" action="ajoutSousCategorie.php">
    <p>
        <label>Sous-Catégorie</label>
        <input type="text" name="libSCategorie" />
    </p>
    <p> 
        <label>Catégorie</label>  
        <select name="idCategorie" required>       
            <option value="" disabled selected>Selectionnez une catégorie</option>       
            <?php         
            // boucle sur les catégories         
            foreach ($listeCategories as $cat) 
            {           
                echo '<option value="' . $cat['idCategorie'].'">' . $cat['libCategorie'] . '</option>';         
            }        
            ?>     
        </select>  
    </p>
    <p>
        <input type="submit" name="bntSub" value="Ajouter" />
    </p>
</form>



<?php
include "include/footer.php";

?>

