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

    <p class="lead">Contenu </p>