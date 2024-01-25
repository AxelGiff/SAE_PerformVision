DROP TABLE IF EXISTS typevoie CASCADE;
DROP TABLE IF EXISTS localite CASCADE;
DROP TABLE IF EXISTS adresse CASCADE;
DROP TABLE IF EXISTS creneau CASCADE;
DROP TABLE IF EXISTS journee CASCADE;
DROP TABLE IF EXISTS type CASCADE;
DROP TABLE IF EXISTS demijournee CASCADE;
DROP TABLE IF EXISTS periode CASCADE;
DROP TABLE IF EXISTS prestataire CASCADE;
DROP TABLE IF EXISTS gestionnaire CASCADE;
DROP TABLE IF EXISTS interlocuteur CASCADE;
DROP TABLE IF EXISTS commercial CASCADE;
DROP TABLE IF EXISTS client CASCADE;
DROP TABLE IF EXISTS composante CASCADE;
DROP TABLE IF EXISTS personne CASCADE;
DROP TABLE IF EXISTS bdl CASCADE;
DROP TABLE IF EXISTS represente CASCADE;
DROP TABLE IF EXISTS affecte CASCADE;



CREATE TABLE PERSONNE(
   id_personne SERIAL,
   nom CHAR(50) NOT NULL,
   prenom CHAR(50),
   mail CHAR(50),
   motDePasse VARCHAR(255),
   telephone CHAR(15),
   PRIMARY KEY(id_personne)
);

CREATE TABLE COMMERCIAL(
   id_personne INT,
   PRIMARY KEY(id_personne),
   FOREIGN KEY(id_personne) REFERENCES PERSONNE(id_personne)
);

CREATE TABLE INTERLOCUTEUR(
   id_personne INT,
   PRIMARY KEY(id_personne),
   FOREIGN KEY(id_personne) REFERENCES PERSONNE(id_personne)
);

CREATE TABLE GESTIONNAIRE(
   id_personne INT,
   PRIMARY KEY(id_personne),
   FOREIGN KEY(id_personne) REFERENCES PERSONNE(id_personne)
);

CREATE TABLE PRESTATAIRE(
   id_personne INT,
   PRIMARY KEY(id_personne),
   FOREIGN KEY(id_personne) REFERENCES PERSONNE(id_personne)
);

CREATE TABLE CLIENT(
   id_client INT,
   nomClient CHAR(50) NOT NULL,
   telClient CHAR(15),
   IdMdp INT,
   UNIQUE(IdMdp),
   PRIMARY KEY(id_client)
);

CREATE TABLE TYPE(
   idType INT,
   libelle CHAR(50),
   PRIMARY KEY(idType)
);

CREATE TABLE TypeVoie(
   id INT,
   libelle CHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE LOCALITE(
   idLocalite INT,
   cp INT,
   ville CHAR(50),
   PRIMARY KEY(idLocalite)
);

CREATE TABLE ADRESSE(
   id_adresse INT,
   numero INT,
   nomVoie CHAR(50),
   idLocalite INT NOT NULL,
   id INT NOT NULL,
   PRIMARY KEY(id_adresse),
   FOREIGN KEY(idLocalite) REFERENCES LOCALITE(idLocalite),
   FOREIGN KEY(id) REFERENCES TypeVoie(id)
);

CREATE TABLE COMPOSANTE(
   id_composante INT,
   nomComposante VARCHAR(50) NOT NULL,
   id_client INT NOT NULL,
   id_adresse INT NOT NULL,
   PRIMARY KEY(id_composante),
   FOREIGN KEY(id_client) REFERENCES CLIENT(id_client),
   FOREIGN KEY(id_adresse) REFERENCES ADRESSE(id_adresse)
);

CREATE TABLE BDL(
   id_personne_1 INT,
   id_composante INT,
   annee INT,
   mois DATE,
   signatureInterlocuteur CHAR(50),
   signaturePrestataire CHAR(50),
   commentaire VARCHAR(50),
   statut Varchar(50),
   id_personne INT,
   id_personne_2 INT NOT NULL,
   PRIMARY KEY(id_personne_1, id_composante, annee, mois),
   FOREIGN KEY(id_personne_1) REFERENCES PRESTATAIRE(id_personne),
   FOREIGN KEY(id_composante) REFERENCES COMPOSANTE(id_composante),
   FOREIGN KEY(id_personne) REFERENCES GESTIONNAIRE(id_personne),
   FOREIGN KEY(id_personne_2) REFERENCES INTERLOCUTEUR(id_personne)
);

CREATE TABLE PERIODE(
   id_personne INT,
   id_composante INT,
   annee INT,
   mois DATE,
   jourDuMois INT,
   PRIMARY KEY(id_personne, id_composante, annee, mois, jourDuMois),
   FOREIGN KEY(id_personne, id_composante, annee, mois) REFERENCES BDL(id_personne_1, id_composante, annee, mois)
);

CREATE TABLE CRENEAU(
   Numero INT,
   heure_arrivee TIME,
   heure_depart TIME,
   id_personne INT NOT NULL,
   id_composante INT NOT NULL,
   annee INT NOT NULL,
   mois DATE NOT NULL,
   jourDuMois INT NOT NULL,
   PRIMARY KEY(Numero),
   FOREIGN KEY(id_personne, id_composante, annee, mois, jourDuMois) REFERENCES PERIODE(id_personne, id_composante, annee, mois, jourDuMois)
);

CREATE TABLE JOURNEE(
   id_personne INT,
   id_composante INT,
   annee INT,
   mois DATE,
   jourDuMois INT,
   PRIMARY KEY(id_personne, id_composante, annee, mois, jourDuMois),
   FOREIGN KEY(id_personne, id_composante, annee, mois, jourDuMois) REFERENCES PERIODE(id_personne, id_composante, annee, mois, jourDuMois)
);

CREATE TABLE DEMIJOURNEE(
   id_personne INT,
   id_composante INT,
   annee INT,
   mois DATE,
   jourDuMois INT,
   idType INT NOT NULL,

   PRIMARY KEY(idType, jourDuMois),
   FOREIGN KEY(id_personne, id_composante, annee, mois, jourDuMois) REFERENCES PERIODE(id_personne, id_composante, annee, mois, jourDuMois),

   FOREIGN KEY(idType) REFERENCES TYPE(idType)
);


CREATE TABLE REPRESENTE(
   id_personne INT,
   id_composante INT,
   PRIMARY KEY(id_personne, id_composante),
   FOREIGN KEY(id_personne) REFERENCES INTERLOCUTEUR(id_personne),
   FOREIGN KEY(id_composante) REFERENCES COMPOSANTE(id_composante)
);

CREATE TABLE AFFECTE(
   id_personne INT,
   id_composante INT,
   PRIMARY KEY(id_personne, id_composante),
   FOREIGN KEY(id_personne) REFERENCES COMMERCIAL(id_personne),
   FOREIGN KEY(id_composante) REFERENCES COMPOSANTE(id_composante)
);
