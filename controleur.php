<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 

	$addArgs = "";

	if ($action = valider("action"))
	{
		ob_start ();
		echo "Action = '$action' <br />";
		// ATTENTION : le codage des caractères peut poser PB si on utilise des actions comportant des accents... 
		// A EVITER si on ne maitrise pas ce type de problématiques

		/* TODO: A REVOIR !!
		// Dans tous les cas, il faut etre logue... 
		// Sauf si on veut se connecter (action == Connexion)

		if ($action != "Connexion") 
			securiser("login");
		*/

		// Un paramètre action a été soumis, on fait le boulot...
		echo $action;
		switch($action)
		{
			
			
			// Connexion //////////////////////////////////////////////////
			case 'Connexion' :		
				// On verifie la presence des champs login et passe
				if ($login = valider("login")){
				if ($passe = valider("passe"))
				{
					// On verifie l'utilisateur, 
					// et on crée des variables de session si tout est OK
					// Cf. maLibSecurisation
					if (verifUser($login,$passe)) {
						// tout s'est bien passé, doit-on se souvenir de la personne ? 

						if (valider("remember")) {
							setcookie("login",$login , time()+60*60*24*30);
							setcookie("passe",$password, time()+60*60*24*30);
							setcookie("remember",true, time()+60*60*24*30);
						} else {
							setcookie("login","", time()-3600);
							setcookie("passe","", time()-3600);
							setcookie("remember",false, time()-3600);
						}
						}	
					}
				}

				// On redirigera vers la page index automatiquement
			break;

			case 'Logout' :
				session_destroy();
			break;

			case 'creation_compte' :
				if ($login = valider("login"))
				if ($passe = valider("passe"))
				if ($passeverif = valider("passeverif"))
				if ($passe == $passeverif){
					ajouter_joueur($login, $passe);
					if (verifUser($login,$passe)) {
						if (valider("remember")) {
							setcookie("login",$login , time()+60*60*24*30);
							setcookie("passe",$password, time()+60*60*24*30);
							setcookie("remember",true, time()+60*60*24*30);
						} else {
							setcookie("login","", time()-3600);
							setcookie("passe","", time()-3600);
							setcookie("remember",false, time()-3600);
						}
					}
				}
			break;

			case 'demande_ami' :
				if ($loginami = valider("login")) EnvoyerDemandeAmi(valider("pseudo","SESSION"), $loginami);
				$addArgs = "?view=amis";
			break;

			case 'accepterDemandeAmi' :
				if ($loginami = valider("pseudoAmi")) {
					AccepterDemandeAmi($loginami, valider("pseudo","SESSION"));
				}
				
				$addArgs = "?view=amis";
			break;	

			case 'refuserDemandeAmi':
				if ($loginami = valider("pseudoAmi")) {
					refuserDemandeAmi($loginami, valider("pseudo","SESSION"));
				}
				
				$addArgs = "?view=amis";
			break;
		
			case 'retirerAmi' :
				if ($loginami = valider("pseudoAmi")) {
					retirerAmi($loginami, valider("pseudo","SESSION"));
				}
				
				$addArgs = "?view=amis";
			break;	

			case 'bloqueAmi':
				if ($loginami = valider("pseudoAmi")) {
					BloqueAmi($loginami, valider("pseudo","SESSION"));
				}
				
				$addArgs = "?view=amis";
			break;
		}

	}

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	header("Location:" . $urlBase . $addArgs);
	// On écrit seulement après cette entête
	ob_end_flush();
	
?>









