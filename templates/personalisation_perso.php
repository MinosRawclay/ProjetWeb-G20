<?php
// auteur Paul-Emile


if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

?>


    <div class="page-header">
      <h1>Page de création d'un pack de textures</h1>
    </div>
    <p>Pour créer un pack de textures, veuillez mettre le lien web de votre image dans les champs correspondants</p>
    <form role="form" action="controleur.php" methode="get">
      <p>Nom du pack</p>
      <input type="text" name="nom">
      <p>Fond du jeu</p>
      <input type="text" name="fond">
      <p>Personage</p>
      <input type="text" name="perso">
      <p>Personage allant à gauche</p>
      <input type="text" name="persogauche">
      <p>Personage avec casquette</p>
      <input type="text" name="persocasq">
      <p>Personage avec casquette allant à gauche</p>
      <input type="text" name="persocasqgauche">
      <p>Monstre de type 1</p>
      <input type="text" name="monstre1">
      <p>Monstre de type 2</p>
      <input type="text" name="monstre2">
      <p>Bombe</p>
      <input type="text" name="bombe">
      <p>Casquette</p>
      <input type="text" name="casquette">
      <p>Trampline</p>
      <input type="text" name="trampo">
      <p>Plateforme de type 1</p>
      <input type="text" name="plat1">
      <p>Plateforme de type 1</p>
      <input type="text" name="plat1">
      <button type="submit" name="action" value="texture">Créer mon pack de texture</button>
    </form>