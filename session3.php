<?php
$titrePage = 'Session 3';
include 'include/myheader.php';


session_start(); // Toujours en haut !

// Nouvelle variable de session
$_SESSION['test'] = 1;

session_regenerate_id(); // Regenerer id de session 

//header("Refresh:0");

//affichage
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

echo '<pre>';
print_r($_SERVER); //Info serveur
echo '</pre>';

// Affichage du numéro de session
echo '<p>Vous avez le numero de session '.session_id().'</p>';

?>


<a href="session1.php">Session 1</a>
<a href="session2.php">Session 2</a>
<a href="session4.php">Session 4</a>


<?php
include 'include/footer.php';
?>