<?php
$titrePage = 'Session 2';
include 'include/myheader.php';


session_start(); // Toujours en haut !

// Nouvelle variable de session
$_SESSION['test'] = 1;

//affichage
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

?>


<a href="session1.php">Session 1</a>
<a href="session3.php">Session 3</a>
<a href="session4.php">Session 4</a>

<?php
include 'include/footer.php';
?>