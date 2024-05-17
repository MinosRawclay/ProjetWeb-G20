



<?php

/*
Name : index.php

Description :
    This page create differents views for the aplication using some templates int the "templates" repertory
    The view created by the index page is define by the "view" parameter who is needed in the querry string. 
    We need to checkup if we have enought data for incluing the template, then we inclue it.

    Forms of views will send their data to the page contoleur.php for work, who will next rederect to index.pho
*/



session_start();



	include_once "libs/maLibUtils.php";

	// on récupère le paramètre view éventuel 
	$view = valider("view"); 
	

	// S'il est vide, on charge la vue accueil par défaut
	if (!$view) $view = "accueil"; 

	// NB : il faut que view soit défini avant d'appeler l'entête

	// Dans tous les cas, on affiche l'entete, 
	// qui contient les balises de structure de la page, le logo, etc. 
	// Le formulaire de recherche ainsi que le lien de connexion 
	// si l'utilisateur n'est pas connecté 

	include("templates/header.php");

	// En fonction de la vue à afficher, on appelle tel ou tel template
	switch($view)
	{		

		case "accueil" : 
			include("templates/accueil.php");
		break;


		default : // si le template correspondant à l'argument existe, on l'affiche
			if (file_exists("templates/$view.php"))
				include("templates/$view.php");

	}
    include("templates/gamePage.php");

	// Dans tous les cas, on affiche le pied de page
	// Qui contient les coordonnées de la personne si elle est connectée
	include("templates/footer.php");


	
?>
