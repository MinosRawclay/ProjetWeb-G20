<?php


if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

?>


    <div class="page-header">
      <h1>Page des amis</h1>
    </div>

    <p class="lead">Contenu </p>