<?php


if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

?>
<img class="right" src="ressources/images/perso/persodoodle.png" alt="doodle perso left to right">

    <div class="page-header">
      <h1>Page des amis</h1>
    </div>

    <p class="lead">Contenu </p>



    <form role="form" action="controleur.php" methode="get">
      <div class="form-group">
        <label for="email">Login</label>
        <input type="text" class="form-control" id="email" name="login" value="" >
      </div>
      <button type="submit" name="action" value="demande_ami" class="btn btn-default">Faire une demande d'ami</button>
    </form>


    
    <div class="affichage demande">
  <?php 
    // echo "test0--";
  $pseudo = valider("pseudo","SESSION");
  //  echo $pseudo;
  //  echo "test1--";
  $amis = listerDemandesAmis($pseudo);
  //  print_r($amis);
  //  echo "test2--";

  foreach ($amis as $ami) {
    echo '<div class="holderAmi">';
    echo "<p class='ami'>". $ami["pseudo_ami"] ."</p>";  
    echo '<form action="controleur.php" method="get">
    <input type="hidden" name="pseudoAmi" value="'.$ami["pseudo_ami"].'">
    <button type="submit" name="action" value="accepterDemandeAmi" class="bouttonDemandeAmiY">Y</button>
    </form>';
    echo '<form action="controleur.php" method="get">
    <input type="hidden" name="pseudoAmi" value="'.$ami["pseudo_ami"].'">
    <button type="submit" name="action" value="refuserDemandeAmi" class="bouttonDemandeAmiN">N</button>
    </form>';
    echo '</div>';
  }

  $amis = listerAmis($pseudo);
 
  foreach ($amis as $ami) {
    echo '<div class="holderAmi">';
    echo "<p class='ami'>". $ami["pseudo_ami"] ."</p>";  
    echo '<form action="controleur.php" method="get">
    <input type="hidden" name="pseudoAmi" value="'.$ami["pseudo_ami"].'">
    <button type="submit" name="action" value="retirerAmi" class="bouttonRetirerAmi">R</button>
    </form>';
    echo '<form action="controleur.php" method="get">
    <input type="hidden" name="pseudoAmi" value="'.$ami["pseudo_ami"].'">
    <button type="submit" name="action" value="bloqueAmi" class="bouttonbloqueAmi">B</button>
    </form>';
    echo '</div>';
  }
  ?>


  