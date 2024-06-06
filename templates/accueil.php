<?php
// auteur Paul-Emile

//C'est la propriété php_self qui nous l'indique : 
// Quand on vient de index : 
// [PHP_SELF] => /chatISIG/index.php 
// Quand on vient directement par le répertoire templates
// [PHP_SELF] => /chatISIG/templates/accueil.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

//  print_r($_SESSION);




?>

<img class="right" src="ressources/images/perso/persodoodle.png" alt="doodle perso left to right">

<div class="page-header">
  <h1>Bienvenu dans IG2I !</h1>
</div>

<?php
  if (!valider("connecte","SESSION")){
?>
<div class="orga">
  <form role="form" action="index.php" methode="get">
    <input type="hidden" name="view" value="listeniveau">
    <button class="BOUTTONjouer" type="submit" name="action" >Jouer en tant qu'invité</button>
  </form>
</div>
<?php
  } else {
?>
<div class="orga">
  <div class="orga2">
    <form role="form" action="index.php" methode="get">
      <input type="hidden" name="view" value="listeniveau">
      <button class="BOUTTONjouer" type="submit" name="action" >Jouer</button>
    </form>
  </div>
  <div class="orga2 orga3">
    <div class="affichage">
      <?php 
        $pseudo = valider("pseudo","SESSION");
        $amis = listerAmis($pseudo);
        foreach ($amis as $ami) {
          echo "<p class='ami'>". $ami["pseudo_ami"] ."</p>";  
        }
      ?>
    </div>
    <form role="form" action="index.php" methode="get">
      <input type="hidden" name="view" value="amis">
      <button class="BOUTTONamis" type="submit" name="action" >Gestion des amis</button>
    </form>
  </div>
</div>
<?php
	}
?>



