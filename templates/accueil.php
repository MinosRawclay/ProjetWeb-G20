<?php

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

 print_r($_SESSION);




?>

<img class="left" src="ressources/images/perso/persodoodle.png" alt="doodle perso right to left">
    <div class="page-header">
      <h1>Bienvenu dans IG2I !</h1>
    </div>

    <p class="lead">Contenu </p>
<?php
    if (!valider("connecte","SESSION")){
		?><form role="form" action="index.php" methode="get">
      <input type="hidden" name="view" value="gamePage">
    <button class="BOUTTON" type="submit" name="action" >Jouer en tant qu'invité</button>
  </form><?php
    } else {
      ?><form role="form" action="index.php" methode="get">
        <input type="hidden" name="view" value="gamePage">
      <button class="BOUTTON" type="submit" name="action" >Jouer</button>
      </form>
      <form role="form" action="index.php" methode="get">
        <input type="hidden" name="view" value="amis">
      <button class="BOUTTON" type="submit" name="action" >Gestion des amis</button>
      </form>
      <?php
	}
	?>


<div class="affichage">
  <?php 
  $pseudo = valider("pseudo");
  print_r($pseudo);
  $amis = listerAmis($pseudo);
  print_r($amis);
  foreach ($amis as $ami) {
    echo "<p class='ami'>". $ami["pseudo"] ."</p>";  
  }

  ?>


</div>


