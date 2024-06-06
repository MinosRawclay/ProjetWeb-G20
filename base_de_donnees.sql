
-- BASE DE DONNER



CREATE TABLE joueur (
    pseudo VARCHAR(20),
    mdp VARCHAR(40) NOT NULL,
PRIMARY KEY (pseudo)
);

CREATE TABLE texture (
    nom VARCHAR(20),
    createur VARCHAR(20),
    plateforme1 VARCHAR(255),
    plateforme2 VARCHAR(255),
    monstre1 VARCHAR(255),
    monstre2 VARCHAR(255),
    trampoline VARCHAR(255),
    casquette VARCHAR(255),
    bombe VARCHAR(255),
    fond VARCHAR(255),
    perso VARCHAR(255),
    perso_J VARCHAR(255),
    perso_casquette VARCHAR(255),
    perso_casquette_J VARCHAR(255),

PRIMARY KEY (nom, createur),
FOREIGN KEY (createur) REFERENCES joueur(pseudo)
);

CREATE TABLE annuaireNiveau (
    idNiveau INTEGER,
    NomAuteur VARCHAR (50)  NOT NULL,
    Nom VARCHAR (50)  NOT NULL,
    campagne INTEGER,
    publique INTEGER,
PRIMARY KEY (idNiveau),
FOREIGN KEY (NomAuteur) REFERENCES joueur(pseudo)
);




CREATE TABLE run (
	pseudo VARCHAR(20),
    id_niveau INTEGER,
	temps INTEGER NOT NULL,
    commandes VARCHAR(1000),
PRIMARY KEY (pseudo, id_niveau),
FOREIGN KEY (pseudo) REFERENCES joueur(pseudo),
FOREIGN KEY (id_niveau) REFERENCES annuaireNiveau(idNiveau)
);

CREATE TABLE ami(
	pseudo VARCHAR(20),
    pseudo_ami VARCHAR(20),
	bloque INTEGER,
	accepte INTEGER,
PRIMARY KEY (pseudo, pseudo_ami),
FOREIGN KEY (pseudo) REFERENCES joueur(pseudo),
FOREIGN KEY (pseudo_ami ) REFERENCES joueur(pseudo)
);




CREATE TABLE niveauTest (
	idElement INTEGER,
	TypeEle INTEGER  NOT NULL,
	Xpos INTEGER NOT NULL,
	Ypos INTEGER NOT NULL,
PRIMARY KEY (idElement)
);


INSERT INTO `joueur` (`pseudo`, `mdp`) VALUES ('default', 'default');
INSERT INTO `texture` (`nom`, `createur`, `plateforme1`, `plateforme2`, `monstre1`, `monstre2`, `trampoline`, `casquette`, `bombe`, `fond`, `perso`) 
VALUES ('default', 'default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);