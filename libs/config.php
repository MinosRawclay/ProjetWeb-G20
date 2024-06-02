<?php

/*
IMPORTANT : pour créer de nouvelles bases sur les installations de mysql sur les postes de l'ig2i, il faut nommer les bases 'testdb_<nom>', et utiliser le fichier de configuration suivant :

$BDD_host="localhost;port=3307";
$BDD_user="administrateur";
$BDD_password=""; // pas de mot de passe
$BDD_base="testdb_<nom>";
*/


// MACHINE LINUX 
$BDD_host="localhost";
$BDD_user="ppotin";
$BDD_password="ppotin"; // vide sous windows
$BDD_base="IG2I";

?>