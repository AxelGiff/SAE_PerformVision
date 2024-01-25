INSERT INTO personne VALUES(1,'Thurairajasingam', 'Kavusikan','kavusikan@gmail.com','kavu02','0607080910');
INSERT INTO personne VALUES(2,'Rizaoglu','Fulya', 'fulya@gmail.com','fulya04','0780954521');
INSERT INTO personne VALUES(3, 'Giffard','Axel','axel@gmail.com','axel01','0654362574');
INSERT INTO personne VALUES(4, 'Camara', 'Moustapha','moustapha@gmail.com','mous04','0614263574');
INSERT INTO personne VALUES(5, 'Ouchallal','Samia','samia@gmail.com','samsam05','0695364218');
INSERT INTO personne VALUES(0,'CAA','SuperAdmin','choco@gmail.com','compteadmin','0148573625');

insert into commercial values(1); 
insert into gestionnaire values(2);
insert into prestataire values(3);
insert into interlocuteur values(4);

/* Commerciaux et interlocuteurs supplémentaires */
INSERT INTO personne VALUES(6,'Ayanokoji','Kiyotaka','ayanokoji@gmail.com','ayanokoji','0685254365'); 
INSERT INTO personne VALUES(7,'Jager','Eren','eren@gmail.com','erreh','0666854732');
INSERT INTO personne VALUES(8,'Yagami','Light','light@gmail.com','light','0658362152');
INSERT INTO personne VALUES(9,'Tachibana', 'Hinata','hina@gmail.com','takemichou02','0584632587');
INSERT INTO personne VALUES(10,'Garden', 'Shadow', 'Shadow@gmail.com', 'shadow', '123456789');
INSERT INTO personne VALUES(11,'Sung', 'JinWoo', 'JinWoo@gmail.com', 'JinWoo.Sung', '0215489562');
INSERT INTO personne VALUES(12,'Garden','Alpha','Alpha@gmail.com','alpha.shadow','123456710');

insert into commercial values(6); 
insert into commercial values(7); 
insert into interlocuteur values(8);
insert into interlocuteur values(9);
insert into interlocuteur values(10);
insert into gestionnaire values(11);
insert into prestataire values(12);

/* Création des clients et de leurs adresses */

insert into client values (1,'Client1','0123549687');
insert into client values (2,'Client2','0145854721');
insert into client values (3,'Client3','0196547123');

insert into localite values(1,'95140','Garges');
insert into localite values (2,'95100','Argenteuil');
insert into localite values(3,'78200','Mantes');

insert into typevoie values(1);
insert into typevoie values(2);
insert into typevoie values(3);

insert into adresse values(1,15,'Victor Hugo',1,1);
insert into adresse values(2,12,'du Stade',2,2);
insert into adresse values(3,7,'de la Fontaine',3,3);

insert into composante values(1,'RH',1,1);
insert into composante values(2,'Service client',1,1); /* Client 1 divisé en 3 composantes */
insert into composante values(3,'Finance',1,1);

insert into composante values(4,'RH',2,2); /* Pour montrer que la même composante peut se retrouver chez plusieurs clients */
insert into composante values(5,'Informatique',2,2); /* Client 2 divisé en 2 composantes */

insert into composante values(6,'Finance',3,3); /* Divisé en une seule composante */

/* Type */

insert into type values (1, 'matin');
insert into type values (2, 'soir');

-- Requête avec bdl 0
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (12, 2, 0001, '0001-01-01' ,10);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (3, 3, 0001, '0001-02-01' ,10);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (12, 4, 0001, '0001-03-01', 9);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (3, 5, 0001, '0001-04-01', 9);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (3, 6, 0001, '0001-05-01', 9);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (12, 6, 0001, '0001-06-01', 8);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (12, 1, 0001, '0001-07-01', 4);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (12, 2, 0001, '0001-08-01', 4);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (3, 1, 0001, '0001-09-01', 4);

-- Requête bdl

insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, statut, id_personne, id_personne_2) values (12, 2, 2024, '2024-01-10', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire','En cours', 11, 10);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, statut, id_personne, id_personne_2) values (3, 3, 2024, '2024-02-22', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire','En cours', 11, 10);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, statut, id_personne, id_personne_2) values (12, 4, 2024, '2024-01-10', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire','En cours', 11, 9);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, statut, id_personne, id_personne_2) values (3, 5, 2024, '2024-02-17', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire','En cours', 2, 9);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, statut, id_personne, id_personne_2) values (3, 6, 2024, '2024-03-20', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire','En cours', 11, 9);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, statut, id_personne, id_personne_2) values (12, 6, 2024, '2024-02-18', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire','En cours', 11, 8);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, statut, id_personne, id_personne_2) values (12, 1, 2024, '2024-02-12', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 'En cours', 11, 4);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, statut, id_personne, id_personne_2) values (12, 2, 2024, '2024-03-15', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire','En cours', 11, 4);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, statut, id_personne, id_personne_2) values (3, 1, 2024, '2024-04-05', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 'En cours', 2, 4);

-- Requête période
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (12, 2, 2024, '2024-01-10', 10);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (3, 3, 2024, '2024-02-22', 22);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (12, 4, 2024, '2024-01-10', 10);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (3, 5, 2024, '2024-02-17', 17);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (3, 6, 2024, '2024-03-20', 20);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (12, 6, 2024, '2024-02-18', 18);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (12, 1, 2024, '2024-02-12', 12);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (12, 2, 2024, '2024-03-15', 15);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (3, 1, 2024, '2024-04-05', 05);


-- Requête affectation des périodes aux prestataires.

insert into CRENEAU( Numero, heure_arrivee, heure_depart, id_personne, id_composante, annee, mois, jourDuMois ) VALUES (0, '9:00', '17:00', 12, 2, 2024, '2024-01-10', 10);
insert into JOURNEE( id_personne, id_composante, annee, mois, jourDuMois ) values ( 3, 3, 2024, '2024-02-22', 22);
insert into DEMIJOURNEE( id_personne, id_composante, annee, mois, jourDuMois, idType) values (12, 4, 2024, '2024-01-10', 10, 1);
insert into CRENEAU( Numero, heure_arrivee, heure_depart, id_personne, id_composante, annee, mois, jourDuMois ) VALUES (1, '9:00', '17:00', 3, 5, 2024, '2024-02-17', 17);
insert into JOURNEE( id_personne, id_composante, annee, mois, jourDuMois ) values ( 3, 6, 2024, '2024-03-20', 20);
insert into DEMIJOURNEE( id_personne, id_composante, annee, mois, jourDuMois, idType) values (12, 6, 2024, '2024-02-18', 18, 2);
insert into CRENEAU( Numero, heure_arrivee, heure_depart, id_personne, id_composante, annee, mois, jourDuMois ) VALUES (2, '9:00', '17:00', 12, 1, 2024, '2024-02-12', 12);
insert into JOURNEE( id_personne, id_composante, annee, mois, jourDuMois ) values ( 12, 2, 2024, '2024-03-15', 15);
insert into DEMIJOURNEE( id_personne, id_composante, annee, mois, jourDuMois, idType) values (3, 1, 2024, '2024-04-05', 05, 1);




/* Quel commercial est affecté à quelle composante ? */ 

INSERT INTO affecte VALUES(1,6);
INSERT INTO affecte VALUES(1,2);
INSERT INTO affecte VALUES(6,1);
INSERT INTO affecte VALUES(6,4);
INSERT INTO affecte VALUES(7,5);
INSERT INTO affecte VALUES(7,3);

/* Quel interlocuteur  represente quelle/quelles composante(s) ? */ 

INSERT INTO represente VALUES(10,2);
INSERT INTO represente VALUES(10,3);
INSERT INTO represente VALUES(9,4); /*L'interlocuteur 9 gère 3 composantes pour 2 clients différents */
INSERT INTO represente VALUES(9,5);
INSERT INTO represente VALUES(9,6); /* 2 interlocuteurs gèrent la même composante */
INSERT INTO represente VALUES(8,6);
INSERT INTO represente VALUES(4,1);
INSERT INTO represente VALUES(4,2);
INSERT INTO represente VALUES(4,3);/* Moustapha est le responsable de 3 composantes: RH, service client et Finance, chez le client1 */


/* Test 
-- Requête avec bdl 0
/*c*/insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (3, 2, 0001, '0001-01-01' ,10);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (3, 3, 0001, '0001-02-01' ,10);
/*c*/insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (3, 4, 0001, '0001-03-01', 9);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (3, 5, 0001, '0001-04-01', 9);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (3, 6, 0001, '0001-05-01', 9);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (12, 6, 0001, '0001-06-01', 8);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (12, 1, 0001, '0001-07-01', 4);
/*c*/insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (3, 2, 0001, '0001-08-01', 4);
insert into bdl (id_personne_1, id_composante, annee, mois, id_personne_2) values (3, 3, 0001, '0001-09-01', 4);

-- Requête période
/*c*/insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (3, 2, 0001, '0001-01-01', 01);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (3, 3, 0001, '0001-02-01', 01);
/*c*/insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (3, 4, 0001, '0001-03-01', 01);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (3, 5, 0001, '0001-04-01', 02);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (3, 6, 0001, '0001-05-01', 01);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (12, 6, 0001, '0001-06-01', 01);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (12, 1, 0001, '0001-07-01', 03);
/*c*/insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (3, 2, 0001, '0001-08-01', 01);
insert into PERIODE( id_personne, id_composante, annee, mois, jourDuMois) values (3, 3, 0001, '0001-09-01', 02);


-- Requête affectation des périodes aux prestataires.

/*c*/insert into CRENEAU( Numero, heure_arrivee, heure_depart, id_personne, id_composante, annee, mois, jourDuMois ) VALUES (0, '9:00', '17:00', 3, 2, 0001, '0001-01-01', 01);
insert into JOURNEE( id_personne, id_composante, annee, mois, jourDuMois ) values ( 3, 3, 0001, '0001-02-01', 01);
/*c*/insert into DEMIJOURNEE( id_personne, id_composante, annee, mois, jourDuMois, idType) values (3, 4, 0001, '0001-03-01', 01, 1);
insert into CRENEAU( Numero, heure_arrivee, heure_depart, id_personne, id_composante, annee, mois, jourDuMois ) VALUES (1, '9:00', '17:00', 3, 5, 0001, '0001-04-01', 02);
insert into JOURNEE( id_personne, id_composante, annee, mois, jourDuMois ) values ( 3, 6, 0001, '0001-05-01', 01);
insert into DEMIJOURNEE( id_personne, id_composante, annee, mois, jourDuMois, idType) values (12, 6, 0001, '0001-06-01', 01, 2);
insert into CRENEAU( Numero, heure_arrivee, heure_depart, id_personne, id_composante, annee, mois, jourDuMois ) VALUES (2, '9:00', '17:00', 12, 1, 0001, '0001-07-01', 03);
/*c*/insert into JOURNEE( id_personne, id_composante, annee, mois, jourDuMois ) values ( 3, 2, 0001, '0001-08-01', 01);
insert into DEMIJOURNEE( id_personne, id_composante, annee, mois, jourDuMois, idType) values (3, 3, 0001, '0001-09-01', 02, 1);


-- Requête bdl

/*c*/insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, id_personne, id_personne_2) values (3, 2, 2024, '2024-01-10', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 11, 10);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, id_personne, id_personne_2) values (3, 3, 2024, '2024-02-22', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 11, 10);
/*c*/insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, id_personne, id_personne_2) values (3, 4, 2024, '2024-01-10', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 11, 9);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, id_personne, id_personne_2) values (3, 5, 2024, '2024-02-17', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 2, 9);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, id_personne, id_personne_2) values (3, 6, 2024, '2024-03-20', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 11, 9);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, id_personne, id_personne_2) values (12, 6, 2024, '2024-02-18', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 11, 8);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, id_personne, id_personne_2) values (12, 1, 2024, '2024-02-12', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 11, 4);
/*c*/insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, id_personne, id_personne_2) values (3, 2, 2024, '2024-03-15', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 11, 4);
insert into bdl (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, id_personne, id_personne_2) values (3, 3, 2024, '2024-04-05', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 2, 4);
*/

