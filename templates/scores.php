<?php


if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

?>


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
  foreach ($niveaux as $niveau) {}// TO DO : faire une requete dans modele permettant d'avoir le meilleur score d'un niveau
?>