<?php
  // connexion
  $dbh = new PDO('mysql:host=localhost;dbname=biovillefranche;charset=utf8', 'root', '');
  // debug
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
  // mode de recupération
  $dbh ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
 ?>
