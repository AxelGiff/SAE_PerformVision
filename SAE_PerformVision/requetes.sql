/* Ici, on trouvera les requêtes intéressantes */
CREATE VIEW VueClient AS
SELECT
    C.id_client,
    I.id_personne AS id_interlocuteur,
    BDL.id_personne_1 AS id_prestataire,
    BDL.signatureInterlocuteur,
    BDL.commentaire
FROM
    CLIENT C
JOIN
    COMPOSANTE Comp ON C.id_client = Comp.id_client
LEFT JOIN
    REPRESENTE R ON Comp.id_composante = R.id_composante
LEFT JOIN
    INTERLOCUTEUR I ON R.id_personne = I.id_personne
LEFT JOIN
    BDL ON Comp.id_composante = BDL.id_composante
WHERE
    C.id_client = :id_client;  -- :id_client identifiant du client 

/* */ 


/* */


/* */



/* */



/* */



/*Générer des bons de livraisons pour un client spécifique*/

INSERT INTO BDL (id_personne_1, id_composante, annee, mois, signatureInterlocuteur, signaturePrestataire, commentaire, id_personne, id_personne_2)
VALUES
    (
        (SELECT id_personne FROM PRESTATAIRE WHERE /* conditions pour sélectionner le prestataire */ LIMIT 1), /* exemple condition id_personne = 3 */
        (SELECT id_composante FROM COMPOSANTE WHERE /* conditions pour sélectionner la composante */ LIMIT 1), /* exemple condition id_composante = 1 */ 
        2024, -- Remplacez par l'année désirée
        '2024-01-01', -- Remplacez par le mois désiré
        'Signature Interlocuteur',
        'Signature Prestataire',
        'Commentaire',
        (SELECT id_personne FROM GESTIONNAIRE WHERE /* conditions pour sélectionner un gestionnaire */ LIMIT 1), /* exemple condition id_personne = 2 */
        (SELECT id_personne FROM INTERLOCUTEUR WHERE /* conditions pour sélectionner l'interlocuteur */ LIMIT 1) /* exemple condition id_personne = 4 */
    );

/* */

-- Requête pour obtenir la liste des prestataires affectés à la composante de l'interlocuteur
SELECT
    p.id_personne AS id_prestataire
FROM
    INTERLOCUTEUR i
JOIN
    REPRESENTE r ON i.id_personne = r.id_personne
JOIN
    COMPOSANTE c ON r.id_composante = c.id_composante
JOIN
    PRESTATAIRE p ON c.id_client = p.id_personne
WHERE
    i.id_personne = /* id_interlocuteur */;

/* */

-- Requête affichant les bons de livraison ainsi que les prestataires associés de l'interlocuteur demandé.
SELECT
    b.id_personne_1 AS id_prestataire,
    pe.nom AS nom_prestataire,
    pe.prenom AS prenom_prestataire,
    b.annee,
    b.mois,
    b.signatureInterlocuteur,
    b.signaturePrestataire,
    b.commentaire
FROM
    INTERLOCUTEUR i
JOIN
    REPRESENTE r ON i.id_personne = r.id_personne
JOIN
    COMPOSANTE c ON r.id_composante = c.id_composante
JOIN
    BDL b ON c.id_composante = b.id_composante
JOIN
    PRESTATAIRE p ON b.id_personne_1 = p.id_personne
JOIN 
    PERSONNE pe ON pe.id_personne = p.id_personne
WHERE
    i.id_personne = /* ID_INTERLOCUTEUR */;

/*A vérifier*/

-- Requête commercial pour lequel vous souhaitez obtenir la liste
SELECT DISTINCT
    c.id_client,
    c.nomClient AS nom_client,
    comp.id_composante,
    comp.nomComposante AS nom_composante,
    i.id_personne AS id_interlocuteur,
    p.id_personne AS id_prestataire,
    pe.nom AS nom_prestataire,
    pe.prenom AS prenom_prestataire
FROM
    CLIENT c
LEFT JOIN
    COMPOSANTE comp ON c.id_client = comp.id_client
LEFT JOIN
    REPRESENTE r ON comp.id_composante = r.id_composante
LEFT JOIN
    INTERLOCUTEUR i ON r.id_personne = i.id_personne
LEFT JOIN
    PRESTATAIRE p ON r.id_personne = p.id_personne
LEFT JOIN 
    PERSONNE pe ON pe.id_personne = p.id_personne 
WHERE
    r.id_personne = VOTRE_ID_COMMERCIAL OR i.id_personne = VOTRE_ID_COMMERCIAL;

/* */

-- Requête pour ajouter ou mettre a jour les informations concernant un interlocuteur client
DO $$
DECLARE
    id_new INT;
BEGIN
    -- Réinitialiser le nombre max associée à la colonne id_personne de la table personne
        PERFORM setval('personne_id_personne_seq', (SELECT MAX(id_personne) FROM personne));
    -- Vérifier si l'interlocuteur existe déjà
    IF EXISTS (
        SELECT 1
        FROM INTERLOCUTEUR i
        JOIN PERSONNE p ON i.id_personne = p.id_personne
        WHERE p.nom = 'Garden' AND p.prenom = 'Shadow'
    ) THEN
        -- Mise à jour des champs si l'interlocuteur existe déjà
        UPDATE PERSONNE
        SET
            nom = 'Garden',
            prenom = 'Shadow',
            mail = 'Shadow@gmail.com',
            motdepasse = 'shadow',
            telephone = '123456789'
        WHERE
            nom = 'Garden' AND prenom = 'Shadow';
    ELSE
        -- Ajouter un nouvel interlocuteur si celui-ci n'existe pas
        INSERT INTO PERSONNE (nom, prenom, mail, motdepasse, telephone)
        VALUES ('Garden', 'Shadow', 'Shadow@gmail.com', 'shadow', '123456789')
        RETURNING id_personne INTO id_new;

        -- Ajouter un nouvel interlocuteur avec l'ID de la nouvelle personne
        INSERT INTO INTERLOCUTEUR (id_personne)
        VALUES (id_new);
    END IF;
END $$;

/* */


--  requête retournant les BDL des prestataires affectés aux interlocuteurs clients du commercial spécifié
SELECT
    b.*,
    pe.nom AS nom_prestataire,
    pe.prenom AS prenom_prestataire
FROM
    BDL b
JOIN
    INTERLOCUTEUR i ON b.id_personne_2 = i.id_personne
JOIN
    REPRESENTE r ON i.id_personne = r.id_personne
JOIN
    COMPOSANTE c ON r.id_composante = c.id_composante
JOIN
    AFFECTE a ON c.id_composante = a.id_composante
JOIN
    PRESTATAIRE p ON a.id_personne = p.id_personne
JOIN 
    PERSONNE pe ON p.id_personne = pe.id_personne
WHERE
    a.id_personne = /* id_commercial */;

/* */
--Requête pour ajouter ou mettre a jour les informations concernant un Prestataire
DO $$
DECLARE
    id_new INT;
BEGIN
    -- Réinitialiser le nombre max associée à la colonne id_personne de la table personne
        PERFORM setval('personne_id_personne_seq', (SELECT MAX(id_personne) FROM personne));
    -- Vérifier si le prestataire existe déjà
    IF EXISTS (
        SELECT 1
        FROM PRESTATAIRE pr
        JOIN PERSONNE p ON pr.id_personne = p.id_personne
        WHERE p.nom = 'Garden' AND p.prenom = 'Alpha'
    ) THEN
        -- Mise à jour des champs si le prestataire existe déjà
        UPDATE PERSONNE
        SET
            nom = 'Garden',
            prenom = 'Alpha',
            mail = 'Alpha@gmail.com',
            motdepasse = 'alpha.shadow',
            telephone = '123456710'
        WHERE
            nom = 'Garden' AND prenom = 'Alpha';
    ELSE
        -- Ajouter un nouvel prestataire si celui-ci n'existe pas
        INSERT INTO PERSONNE (nom, prenom, mail, motdepasse, telephone)
        VALUES ('Garden', 'Alpha', 'Alpha@gmail.com', 'alpha.shadow', '123456710')
        RETURNING id_personne INTO id_new;

        -- Ajouter un nouvel prestataire avec l'ID de la nouvelle personne
        INSERT INTO PRESTATAIRE (id_personne)
        VALUES (id_new);
    END IF;
END $$;

/* */
-- Requête pour mettre à jour l'affectation d'une composante à un commerciale.
UPDATE AFFECTE
SET id_personne = /*id_commerciale*/ 
WHERE id_composante = /*id_composante*/

-- Requête pour voir quelle  composante est affecter à quel prestataire.
SELECT
    c.id_composante,
    c.nomComposante,
    a.id_personne AS id_prestataire,
    p.nom AS nom_prestataire,
    p.prenom AS prenom_prestataire
FROM
    COMPOSANTE c
JOIN AFFECTE a ON c.id_composante = a.id_composante
JOIN PERSONNE p ON a.id_personne = p.id_personne
JOIN GESTIONNAIRE g ON g.id_personne = /*id_gestionnaire*/
WHERE
    AND c.id_composante = /*id_composante*/ 
    AND c.nomComposante = 'Nom_de_la_Composante'; 

/* */

-- Reqête pour ajouter/modifier un client
DO $$
DECLARE
    id_new INT;
BEGIN
    -- Vérifier si le client existe déjà
    IF EXISTS (
        SELECT 1
        FROM CLIENT 
        WHERE nomClient = 'Hebert'
    ) THEN
        -- Mise à jour des champs si le client existe déjà
        UPDATE CLIENT
        SET
            nomClient = 'Hebert',
            telClient = '0628478095'
        WHERE
            nomClient = 'Hebert';
    ELSE
        -- Ajouter un nouveau client si celui-ci n'existe pas
        INSERT INTO CLIENT (nomClient, telClient)
        VALUES ('Hebert' , '0628478095')
        RETURNING id_client INTO id_new;

        -- Ajouter un nouvel client avec le nouveau ID 
        INSERT INTO CLIENT (id_client)
        VALUES (id_new);
    END IF;
END $$;

-- Requête pour ajouter une composante pour le client
INSERT INTO COMPOSANTE (nomComposante, id_client, id_adresse)
VALUES ('Nom_de_la_Composante', /* id_client*/, /*id_adresse*/);

-- Affecter la composante à un commercial
INSERT INTO AFFECTE (id_personne, id_composante)
VALUES (/*id_commerciale*/, /*id_composante*/);

/* */

-- Requête pour consulter les BDLs d'un prestataire.
SELECT
    b.id_personne_1 AS id_prestataire,
    pe.nom AS nom_prestataire,
    pe.prenom AS prenom_prestataire,
    b.id_composante,
    c.nomComposante,
    b.annee,
    b.mois,
    b.signatureInterlocuteur,
    b.signaturePrestataire,
    b.commentaire
FROM
    BDL b
JOIN
    PRESTATAIRE p ON b.id_personne_1 = p.id_personne
JOIN
	PERSONNE pe ON pe.id_personne = p.id_personne
JOIN
    COMPOSANTE c ON b.id_composante = c.id_composante
WHERE 
    p.id_personne = /*id_prestataire*/;

/* */

-- Requête pour consulter les BDLs de tous les prestataires.

SELECT
    b.id_personne_1 AS id_prestataire,
    pe.nom AS nom_prestataire,
    pe.prenom AS prenom_prestataire,
    b.id_composante,
    c.nomComposante,
    b.annee,
    b.mois,
    b.signatureInterlocuteur,
    b.signaturePrestataire,
    b.commentaire
FROM
    BDL b
JOIN
    PRESTATAIRE p ON b.id_personne_1 = p.id_personne
JOIN
    PERSONNE pe ON pe.id_personne = p.id_personne
JOIN
    COMPOSANTE c ON b.id_composante = c.id_composante


/* */

--Requête pour ajouter ou mettre a jour les informations concernant un gestionnaire.
DO $$
DECLARE
    id_new INT;
BEGIN
    -- Réinitialiser le nombre max associée à la colonne id_personne de la table personne
        PERFORM setval('personne_id_personne_seq', (SELECT MAX(id_personne) FROM personne));
    -- Vérifier si le gestionnaire existe déjà
    IF EXISTS ( 
        SELECT 1
        FROM GESTIONNAIRE g
        JOIN PERSONNE p ON g.id_personne = p.id_personne
        WHERE p.nom = 'Sung' AND p.prenom = 'Jin Woo'
    ) THEN
        -- Mise à jour des champs si le gestionnaire existe déjà
        UPDATE PERSONNE
        SET
            nom = 'Sung',
            prenom = 'Jin Woo',
            mail = 'JinWoo@gmail.com',
            motdepasse = 'JinWoo.Sung',
            telephone = '0215489562'
        WHERE
            nom = 'Sung' AND prenom = 'Jin Woo';
    ELSE
        -- Ajouter un nouvel gestionnaire si celui-ci n'existe pas
        INSERT INTO PERSONNE (nom, prenom, mail, motdepasse, telephone)
        VALUES ('Sung', 'Jin Woo', 'JinWoo@gmail.com', 'JinWoo.Sung', '0215489562')
        RETURNING id_personne INTO id_new;

        -- Ajouter un nouvel gestionnaire avec l'ID de la nouvelle personne
        INSERT INTO GESTIONNAIRE (id_personne)
        VALUES (id_new);
    END IF;
END $$;

/* */
--Requête pour savoir à quel role appartient l'utilisateur.
SELECT
    p.id_personne,
    p.mail,
    i.id_personne AS id_interlocuteur,
    g.id_personne AS id_gestionnaire,
    pr.id_personne AS id_prestataire,
    c.id_personne AS id_commercial,
    CASE
        WHEN p.id_personne = 0 THEN 'admin'
        WHEN i.id_personne IS NOT NULL THEN 'interlocuteur'
        WHEN g.id_personne IS NOT NULL THEN 'gestionnaire'
        WHEN pr.id_personne IS NOT NULL THEN 'prestataire'
        WHEN c.id_personne IS NOT NULL THEN 'commercial'
        ELSE NULL
    END AS role
FROM
    PERSONNE p
LEFT JOIN INTERLOCUTEUR i ON p.id_personne = i.id_personne
LEFT JOIN GESTIONNAIRE g ON p.id_personne = g.id_personne
LEFT JOIN PRESTATAIRE pr ON p.id_personne = pr.id_personne
LEFT JOIN COMMERCIAL c ON p.id_personne = c.id_personne
WHERE
    p.mail = 'email@example.com';



/* */
-- Requête pour voir quels sont les interlocuteurs 
SELECT nom, prenom, P.id_personne FROM personne P JOIN interlocuteur I ON I.id_personne = P.id_personne;

-- Requête pour voir quels sont les Prestataires
SELECT nom, prenom, P.id_personne FROM personne P JOIN prestataire Pr ON Pr.id_personne = P.id_personne;

/* */
-- Réinitialiser le nombre max associée à la colonne id_personne de la table personne
SELECT setval('personne_id_personne_seq', (SELECT MAX(id_personne) FROM personne));
/* */
