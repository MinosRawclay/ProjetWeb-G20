<?php


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");

function getLastIndexAnnuaire() {
	$sql  = "SELECT annuaireNiveau.idNiveau FROM annuaireNiveau ORDER BY annuaireNiveau.idNiveau DESC
	LIMIT 1;";
	return parcoursRs(SQLSelect($sql));
}

function AjouterNivTable($pseudo, $nomTable) {
	$sql = "CREATE TABLE $nomTable(
		idElement INTEGER,
		TypeEle INTEGER  NOT NULL,
		Xpos INTEGER NOT NULL,
		Ypos INTEGER NOT NULL,
	PRIMARY KEY (idElement)
	);";
	SQLCreateTable($sql);

	$index = getLastIndexAnnuaire();
	$index = $index[0]["idNiveau"] + 1;

	 $sql = "INSERT INTO annuaireNiveau 
	 VALUES ($index,'$pseudo','$nomTable',0,1)";
	return SQLInsert($sql);
}

function AjouterLigneNiv($niv,$idElement,$TypeEle,$Xpos,$Ypos){
	$sql = "INSERT INTO $niv VALUES ($idElement,$TypeEle,$Xpos,$Ypos);";
	return SQLInsert($sql);

}

function getALLniv(){
	$sql = "SELECT * FROM annuaireNiveau";
	return parcoursRs(SQLSelect($sql));	
}

function getListNiv($pseudo) {
	$sql = "SELECT Nom FROM annuaireNiveau WHERE NomAuteur = '$pseudo'";
	return parcoursRs(SQLSelect($sql));	
}




function listerUtilisateurs($classe = "both")
{
	// NB : la présence du symbole '=' indique la valeur par défaut du paramètre s'il n'est pas fourni
	// Cette fonction liste les utilisateurs de la base de données 
	// et renvoie un tableau d'enregistrements. 
	// Chaque enregistrement est un tableau associatif contenant les champs 
	// id,pseudo,blacklist,connecte,couleur

	// Lorsque la variable $classe vaut "both", elle renvoie tous les utilisateurs
	// Lorsqu'elle vaut "bl", elle ne renvoie que les utilisateurs blacklistés
	// Lorsqu'elle vaut "nbl", elle ne renvoie que les utilisateurs non blacklistés

	$SQL = "select * from joueur";
	// echo $SQL;
	return parcoursRs(SQLSelect($SQL));

}

function listerTexturePack() {
	$sql = "
    SELECT *
    FROM texture ";

  return parcoursRs(SQLSelect($sql));
}

function listerNiveau($nomNiveau){
	$sql = "
	SELECT * FROM $nomNiveau"  ;
	return parcoursRs(SQLSelect($sql));
}

function listerAmis($pseudo){
	$sql = 'SELECT * FROM `ami` WHERE ami.bloque = 0 AND ami.accepte = 1 AND ami.pseudo = "'.$pseudo.'";';
	return parcoursRs(SQLSelect($sql));
}

function listerAmisBloque($pseudo){
	$sql = 'SELECT * FROM `ami` WHERE ami.bloque = 1 AND ami.pseudo = "'.$pseudo.'";';
	return parcoursRs(SQLSelect($sql));
}

function listerDemandesAmis($pseudo){
	$sql = 'SELECT * FROM `ami` WHERE ami.bloque = 0 AND ami.accepte = 0 AND ami.pseudo = "'.$pseudo.'";';
	return parcoursRs(SQLSelect($sql));
}


/********
 *  $pseudoAmi est le pseudo de la personne qui fait la demande d'amis, $pseudo la personne qui recoit la demande d'ami
 ********/
function EnvoyerDemandeAmi($pseudoAmi, $pseudo)  {
	
	// On cherche si on n'a pas deja recu de demande de la part de la persone	
	$sql = 'SELECT * FROM `ami` WHERE ami.pseudo_ami = "'.$pseudo.'" AND ami.pseudo = "'.$pseudoAmi.'";';
	$val = parcoursRs(SQLSelect($sql)) ;

	// On cherche si on n'a pas deja envoyer de demande
	$sql = 'SELECT * FROM `ami` WHERE ami.pseudo_ami = "'.$pseudoAmi.'" AND ami.pseudo = "'.$pseudo.'";';
	$val2 = parcoursRs(SQLSelect($sql));

	// print_r($val); print_r($val2);
		
	if ((isset($val[0]) || isset($val2[0]))) {
		 echo "Demande Deja envoyer !";
	}	
	else {
		 echo "Demande en cours d'envoi";
		
		$sql = "INSERT INTO `ami` (`pseudo`, `pseudo_ami`, `bloque`, `accepte`) VALUES ('".$pseudo."', '".$pseudoAmi."', '0', '0');";
		SQLInsert($sql);
	}
}

/********
 *  $pseudoAmi est le pseudo de la personne qui a fait la demande d'amis, $pseudo la personne qui a reçu la demande d'ami
 ********/
function AccepterDemandeAmi($pseudoAmi, $pseudo)  {

	// On cherche si on a recu une demande de la part de la persone	
	$sql = 'SELECT * FROM `ami` WHERE ami.accepte = 0 AND ami.pseudo_ami = "'.$pseudoAmi.'" AND ami.pseudo = "'.$pseudo.'";';
	$val = parcoursRs(SQLSelect($sql)) ;

	// print_r($val);

	if (!(isset($val[0]))) {
		echo "ERROR !";
 	}	
  	else {
		echo "Demande Acceptée";
	   
		// On actualise la l'etat de la demande d'ami
		$sql = "UPDATE ami SET accepte = 1 WHERE ami.pseudo = '$pseudo' AND ami.pseudo_ami = '$pseudoAmi'";
		SQLUpdate($sql);

		// On ajoute $pseudo dans les amis de $pseudoAmi, et on marque que la demande est accepter	
		$sql = "INSERT INTO `ami` (`pseudo`, `pseudo_ami`, `bloque`, `accepte`) VALUES ('".$pseudoAmi."', '".$pseudo."', '0', '1');";
		SQLInsert($sql);
   	}
}

/********
 *  $pseudoAmi est le pseudo de la personne qui va etre bloqué, $pseudo la personne qui bloque
 ********/
function BloqueAmi($pseudoAmi, $pseudo)  {
	// On bloque $pseudoAmi dans la listes des ami de $pseudo
	$sql = "UPDATE ami SET bloque = 1 WHERE ami.pseudo = '$pseudo' AND ami.pseudo_ami = '$pseudoAmi'";
	SQLUpdate($sql);

	// On supprime $pseudo de la liste des amis de $pseudoAmi
	$sql = "DELETE FROM ami WHERE ami.pseudo = '$pseudoAmi' AND ami.pseudo_ami = '$pseudo'";
	SQLDelete($sql);
}

/********
 *  $pseudoAmi est le pseudo de la personne qui va etre bloqué, $pseudo la personne qui bloque
 ********/
function refuserDemandeAmi($pseudoAmi, $pseudo)  {
	$sql = "DELETE FROM ami WHERE ami.pseudo = '$pseudo' AND ami.pseudo_ami = '$pseudoAmi'";
	SQLDelete($sql);
}

/********
 *  $pseudoAmi est le pseudo de la personne qui va etre bloqué, $pseudo la personne qui bloque
 ********/
function retirerAmi($pseudoAmi, $pseudo)  {
	$sql = "DELETE FROM ami WHERE ami.pseudo = '$pseudo' AND ami.pseudo_ami = '$pseudoAmi'";
	SQLDelete($sql);
}







function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT pseudo FROM joueur WHERE pseudo='$login' AND mdp='$passe'";

	return SQLGetChamp($SQL);
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}

function ajouter_joueur($pseudo, $mdp){
	$SQL = "INSERT INTO joueur VALUES ('$pseudo', '$mdp');";
	return SQLInsert($SQL);
}

function Niv(){
	$sql = 'SELECT * FROM annuaireNiveau WHERE campagne=1;';
	return parcoursRs(SQLSelect($sql));
}

function pb($pseudo, $niveau){
	$SQL = "SELECT temps FROM run JOIN annuaireNiveau ON idNiveau = id_niveau WHERE pseudo = '$pseudo' AND Nom = '$niveau';";
	return parcoursRs(SQLSelect($SQL));
}

function nbrNiv(){
	$sql = 'SELECT COUNT(*) FROM annuaireNiveau WHERE campagne=1;';
	return parcoursRs(SQLSelect($sql));
}

function maxNiv($niveau){
	$SQL = "SELECT run1.pseudo,run1.temps FROM run as run1 JOIN annuaireNiveau ON idNiveau = id_niveau JOIN run as run2 ON run1.id_niveau = run2.id_niveau WHERE Nom = '$niveau' HAVING run1.temps = MIN(run2.temps);";
	return parcoursRs(SQLSelect($SQL));
}

function creerPack($nom, $createur, $perso, $persogauche, $persocasq, $persocasqgauche, $monstre1, $monstre2, $bombe, $casquette, $trampo, $plat1, $plat2, $fond){
	$SQL = "INSERT INTO texture VALUES ('$nom', '$createur', '$plat1', '$plat2', '$monstre1', '$monstre2', '$trampo', '$casquette', '$bombe', '$fond', '$perso', '$persogauche', '$persocasq', '$persocasqgauche');";
	return SQLInsert($SQL);
}

