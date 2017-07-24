<?php

session_start(); // Toujours en haut !


session_unset();// Suppression des variables de session 
// OU $_SESSION =array();


session_destroy(); //Destruction de la session

// Retour à session1.php
header('location: session1.php');


?>

<a href="session1.php">Session 1</a>
<a href="session2.php">Session 2</a>
<a href="session3.php">Session 3</a>


<?php
include 'include/footer.php';
?>