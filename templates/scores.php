<?php


if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

?>

<img class="right" src="ressources/images/perso/persodoodle.png" alt="doodle perso left to right">
    <div class="page-header">
      <h1>Page des scores</h1>
    </div>
  
<?php 
$pseudo = valider("pseudo","SESSION");
$amis = listerAmis($pseudo);
$niveaux = Niv();
$nbrniveau = nbrNiv();
if ($nbrniveau[0]["COUNT(*)"] != 0){
foreach ($amis as $ami) {
  echo '<div class="scoreAmi">';
  echo "<p class='ami'>". $ami["pseudo_ami"] ."</p>";  
  foreach ($niveaux as $niveau) {
    if (isset(pb($ami["pseudo_ami"],$niveau["Nom"])[0]["temps"]))
    echo "<p>".$niveau["Nom"]." : ".pb($ami["pseudo_ami"],$niveau["Nom"])[0]["temps"]."s</p>";
  }
  echo '</div>';
}
} else {
  ?><p>Vous n'avez pas d'amis :,(</p><?php }
foreach ($niveaux as $niveau) {
  echo '<div class="scoreMonde">';
  echo "<p class='monde'>".$niveau["Nom"]."</p>";  
  $meilleur = maxNiv($niveau["Nom"]);
  if (isset($meilleur[0]["pseudo"]) && isset($meilleur[0]["temps"]))
    echo "<p>".$meilleur[0]["pseudo"]." : ".$meilleur[0]["temps"]."s</p>";
  foreach ($niveaux as $niveau) {
    
  }
  echo '</div>';
}// TO DO : faire une requete dans modele permettant d'avoir le meilleur score d'un niveau
?>