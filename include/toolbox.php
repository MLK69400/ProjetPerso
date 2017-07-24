<?php

//boite a outils.php

// Une fonction pour calculer le double d'un nombre
function double($number)
{
    return $number *2;
}

// Fonction pour convertir une date FR en EN

function dateUS($dte)
{
    $jour = substr($dte, 0, 2);
    $mois = substr($dte, 3, 2);
    $annee = substr($dte, 6, 4);
    return $annee.'-'.$mois.'-'.$jour;
}

// Fonction pour convertir une date EN en FR avec explode

function dateFR($dte)
{
    $tDte = explode('-', $dte);
    $dteFR = $tDte[2].'/'.$tDte[1].'/'.$tDte[0];
    return $dteFR;
    //     $tDteFR = array_reverse($tDte);
    //     return implode('/', $tDteFR);
}

// Fonction qui retourne vrai si pair
function even($nb)
{
    return (!($nb & 1));
}

// Fonction qui retourne vrai si impair
function odd($nb)
{
    return ($nb & 1);
}

?>