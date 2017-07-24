<?php
$titrePage = 'Authentification';
include 'include/myheader.php';


//Mot de password
$pwd ='A1bcdefg';

// Longeur du mot de password
$longeur = strlen($pwd);

echo '<p>Le mot de passe contient'.$longeur.'caractère</p>';

//compteur pour les nombres et Les majuscules
$nbInt = $nbMaj =0;

//Boucle sur le mot de passe
for($i = 0; $i < $longeur; $i++)
{
  //est-ce que le caractère est numérique?
  if(is_numeric($pwd[$i])) $nbInt++;//incrément du compteur

  //est-que le caractère est en majuscule?
  else if (strtoupper($pwd[$i]) == $pwd[$i]) $nbMaj++;

}
echo '<p>Nombre de majuscules: '.$nbMaj.'</p>';
echo '<p>Nombre de chiffres: '.$nbInt.'</p>';

//adresse mail
$email = 'mohamedkermiche@hotmail.fr';

//Controle de l'adresse mail
if(filter_var($email, FILTER_VALIDATE_EMAIL))
{
  echo '<p>Adresse mail valide</p>';
}
else echo '<p>Adresse mail non valide</p>';

//hashage dut mot de passe en blowfish (60 caractères)
$hash = password_hash($pwd, PASSWORD_DEFAULT);

echo $hash.'<br>';


//vérification du mot de passe
if(password_verify($pwd, $hash))
{
  echo '<p>Mot de passe correct</p>';
}
else echo '<p>Mot de passe incorrecte</p>';


include 'include/footer.php';
?>
