<?php
$titrePage = 'Session 1';
include 'include/myheader.php';

session_start();//toujours en haut!

//Enregistrement d'une variable de session
$_SESSION['auth'] = 'ok';

//affichage de la variable de session
echo $_SESSION['auth'];

// Si le compteur est defini
if(isset($_SESSION['compteur']))
{
    $_SESSION['compteur']++; // Incrémentation du compteur
}
else $_SESSION['compteur'] = 1; // Initialisation

// header("Refresh:0");
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

?>


<a href="session2.php">Session 2</a>
<a href="session3.php">Session 3</a>
<a href="session4.php">Session 4</a>

<?php
include 'include/footer.php';
?>
