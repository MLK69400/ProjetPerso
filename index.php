<?php

// Titre de la page
$titrePage = "Ma première page dynamique";

// Entete de la page
include "include/myheader.php";

?>


<!-- Plein de HTML
lorem ipsum




-->

<h1>Hello World</h1>

<?php 

// section de la page 
include "include/mainsection.php";



?>
<?php

// Tableau de langages
$tLangages = array(
    array('langage' => 'COBOL', 'age' => 50),
    array('langage' => 'C', 'age' => 50),
    array('langage' => 'C++', 'age' => 30),
    array('langage' => 'JAVA', 'age' => 20),
    array('langage' => 'PHP', 'age' => 20),
    array('langage' => 'C#', 'age' => 15)
);

// Affichage méthode 1
echo '<table>
        <thead>
            <tr>
                <th>Langage</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>';
foreach($tLangages as $langage)
{
    echo'<tr>
            <td>'.$langage['langage'].'</td>
            <td>'.$langage['age'].'</td>
        </tr>';
}
echo '</tbody>
    </table>';

// Affichage methode 2
?>
<table>
    <thead>
        <tr>
            <th>Langage</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($tLangages as $langage): ?>
<tr>
    <td><?= $langage['langage'];?></td>
    <td><?= $langage['age'];?></td>
</tr>
<?php endforeach; ?>
    </tbody>
</table>

<?php 

// Cherche la toolbox
include 'include/toolbox.php';
echo double(456);

echo '<pre>';
echo dateUS ('04/07/2017');
echo '</pre>';

echo '<pre>';
echo dateFR ('2017-07-04');
echo '</pre>';

////////////////////////////////////////////////////////////////////

// Fonction sur les tableau
$t1 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$t2 = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4);

//////////////////////////////////

//tri sur les tableaux 
$t3 = array_filter($t1, 'even');
$t4 = array_filter($t2, 'odd');
echo '<pre>';
print_r($t3);
print_r($t4);
echo '</pre>';

/////////////////////////////////////

// Fonction sur le tableau
$t5 = array_map('double', $t1);
$t6 = array_map('double', $t2);
echo '<pre>';
print_r($t5);
print_r($t6);
echo '</pre>';
// aside de la page 
include "include/mainaside.php";



?>
<?php 

// pied de la page 
include "include/footer.php";



?>