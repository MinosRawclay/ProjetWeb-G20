

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
	temps FLOAT NOT NULL,
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


INSERT INTO `joueur` (`pseudo`, `mdp`) VALUES ('default', 'default');
INSERT INTO `joueur` (`pseudo`, `mdp`) VALUES ('rallo', 'rallo');
INSERT INTO `joueur` (`pseudo`, `mdp`) VALUES ('ppotin', 'ppotin');



INSERT INTO `texture` (`nom`, `createur`, `plateforme1`, `plateforme2`, `monstre1`, `monstre2`, `trampoline`, `casquette`, `bombe`, `fond`, `perso`) 
VALUES ('default', 'default', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


CREATE TABLE niveau1(
	idElement INTEGER,
	TypeEle INTEGER  NOT NULL,
	Xpos INTEGER NOT NULL,
	Ypos INTEGER NOT NULL,
PRIMARY KEY (idElement)
);

CREATE TABLE niveau2(
	idElement INTEGER,
	TypeEle INTEGER  NOT NULL,
	Xpos INTEGER NOT NULL,
	Ypos INTEGER NOT NULL,
PRIMARY KEY (idElement)
);

CREATE TABLE niveau3(
	idElement INTEGER,
	TypeEle INTEGER  NOT NULL,
	Xpos INTEGER NOT NULL,
	Ypos INTEGER NOT NULL,
PRIMARY KEY (idElement)
);

INSERT INTO niveau1 VALUES (1,1,0,1);
INSERT INTO niveau1 VALUES (2,1,1,1);
INSERT INTO niveau1 VALUES (3,1,2,1);
INSERT INTO niveau1 VALUES (4,1,3,1);
INSERT INTO niveau1 VALUES (5,1,4,1);
INSERT INTO niveau1 VALUES (6,0,4,2);
INSERT INTO niveau1 VALUES (7,1,3,3);
INSERT INTO niveau1 VALUES (8,1,2,4);
INSERT INTO niveau1 VALUES (9,1,5,5);
INSERT INTO niveau1 VALUES (10,1,4,7);
INSERT INTO niveau1 VALUES (11,1,3,9);
INSERT INTO niveau1 VALUES (12,1,5,11);
INSERT INTO niveau1 VALUES (13,1,4,14);
INSERT INTO niveau1 VALUES (14,1,5,16);
INSERT INTO niveau1 VALUES (15,-3,4,17);
INSERT INTO niveau1 VALUES (16,-2,9,18);
INSERT INTO annuaireNiveau VALUES (1,'default',"niveau1",1,1);

INSERT INTO niveau2 VALUES (1,1,3,1);
INSERT INTO niveau2 VALUES (2,1,4,1);
INSERT INTO niveau2 VALUES (3,1,5,1);
INSERT INTO niveau2 VALUES (4,1,6,1);
INSERT INTO niveau2 VALUES (5,0,4,2);
INSERT INTO niveau2 VALUES (6,1,4,3);
INSERT INTO niveau2 VALUES (7,1,2,4);
INSERT INTO niveau2 VALUES (8,1,4,5);
INSERT INTO niveau2 VALUES (9,4,1,6);
INSERT INTO niveau2 VALUES (10,1,6,6);
INSERT INTO niveau2 VALUES (11,1,3,7);
INSERT INTO niveau2 VALUES (12,3,8,7);
INSERT INTO niveau2 VALUES (13,1,0,8);
INSERT INTO niveau2 VALUES (14,1,5,8);
INSERT INTO niveau2 VALUES (15,1,0,10);
INSERT INTO niveau2 VALUES (16,1,3,11);
INSERT INTO niveau2 VALUES (17,1,4,12);
INSERT INTO niveau2 VALUES (18,3,0,13);
INSERT INTO niveau2 VALUES (19,1,2,13);
INSERT INTO niveau2 VALUES (20,1,4,14);
INSERT INTO niveau2 VALUES (21,1,2,15);
INSERT INTO niveau2 VALUES (22,1,5,17);
INSERT INTO niveau2 VALUES (23,1,3,18);
INSERT INTO niveau2 VALUES (24,-3,4,19);
INSERT INTO niveau2 VALUES (25,-2,9,20);
INSERT INTO annuaireNiveau VALUES (2,'default',"niveau2",1,1);

INSERT INTO niveau3 VALUES (1,1,4,1);
INSERT INTO niveau3 VALUES (2,0,4,2);
INSERT INTO niveau3 VALUES (3,1,3,3);
INSERT INTO niveau3 VALUES (4,2,5,3);
INSERT INTO niveau3 VALUES (5,5,4,4);
INSERT INTO niveau3 VALUES (6,2,3,5);
INSERT INTO niveau3 VALUES (7,1,5,5);
INSERT INTO niveau3 VALUES (8,3,7,6);
INSERT INTO niveau3 VALUES (9,4,2,7);
INSERT INTO niveau3 VALUES (10,1,4,7);
INSERT INTO niveau3 VALUES (11,3,9,7);
INSERT INTO niveau3 VALUES (12,1,6,8);
INSERT INTO niveau3 VALUES (13,1,4,10);
INSERT INTO niveau3 VALUES (14,1,6,11);
INSERT INTO niveau3 VALUES (15,1,6,13);
INSERT INTO niveau3 VALUES (16,1,4,15);
INSERT INTO niveau3 VALUES (17,1,6,17);
INSERT INTO niveau3 VALUES (18,1,5,19);
INSERT INTO niveau3 VALUES (19,1,6,21);
INSERT INTO niveau3 VALUES (20,1,2,23);
INSERT INTO niveau3 VALUES (21,1,5,23);
INSERT INTO niveau3 VALUES (22,1,3,25);
INSERT INTO niveau3 VALUES (23,1,2,27);
INSERT INTO niveau3 VALUES (24,1,4,29);
INSERT INTO niveau3 VALUES (25,2,2,30);
INSERT INTO niveau3 VALUES (26,1,6,30);
INSERT INTO niveau3 VALUES (27,1,5,32);
INSERT INTO niveau3 VALUES (28,-3,6,34);
INSERT INTO niveau3 VALUES (29,-2,9,35);
INSERT INTO annuaireNiveau VALUES (3,'default',"niveau3",1,1);
