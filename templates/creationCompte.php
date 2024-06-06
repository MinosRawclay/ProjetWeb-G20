<?php
// auteur Paul-Emile

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

// Chargement eventuel des données en cookies
$login = valider("login", "COOKIE");
$passe = valider("passe", "COOKIE"); 
if ($checked = valider("remember", "COOKIE")) $checked = "checked"; 

?>
<img class="right" src="ressources/images/perso/persodoodle.png" alt="doodle perso left to right">
<div class="page-header">
	<h1>Connexion</h1>
</div>

<p class="lead">

 <form role="form" action="controleur.php" methode="get">
  <div class="form-group">
    <label for="email">Login</label>
    <input type="text" class="form-control" id="email" name="login" value="" >
  </div>
  <div class="form-group">
    <label for="pwd">Passe</label>
    <input type="password" class="form-control" id="pwd" name="passe" value="">
  </div>
  <div class="form-group">
    <label for="pwd">Vérification du Mot de Passe</label>
    <input type="password" class="form-control" id="pwdverif" name="passeverif" value="">
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="remember" <?php echo $checked;?> >Se souvenir de moi</label>
  </div>
  <button type="submit" name="action" value="creation_compte" class="btn btn-default">Créer mon compte</button>
</form>

</p>




