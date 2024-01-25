<?php

class Model
{
    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;

    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;

    /**
     * Constructeur du modèle : permet d'effectuer la connexion à la base de données
     */
    private function __construct()
    {
        include "credentials.php";
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    /**
     * Méthode permettant de récupérer le modèle
     */
    public static function getModel()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Méthode qui permet de récupérer le mot de passe associé à l'adresse mail d'un professeur
     * @param string $adr qui représente l'adresse mail du professeur
     * @return mixed
     */
    public function loginP($m) {
        $requete = $this->bd->prepare('SELECT motDePasse FROM personne where mail = :m');
        $requete->bindValue(":m", $m);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function getId(){
        
        $usr_saisi = $_SESSION['username'];
        $requete = $this->bd->prepare("SELECT   p.id_personne,
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
                                                    p.mail = :mail");

        $requete->bindValue(":mail",$usr_saisi);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);
        return $tab['id_personne'];
    }

    public function getrole(){
        $usr_saisi = $_SESSION['username'];
        $requete = $this->bd->prepare("SELECT   p.id_personne,
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
                                                    p.mail = :mail");

        $requete->bindValue(":mail",$usr_saisi);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);
        return $tab['role'];

    }

    // Pour avoir le rôle d'une personne lambda
    public function getallroles($nom,$prenom){
        $requete = $this->bd->prepare("SELECT   p.id_personne,
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
                                            p.nom = :nom and p.prenom = :prenom");

        $requete->bindValue(":nom",$nom);
        $requete->bindValue(":prenom",$prenom);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);
        return $tab['role'];

    }

    public function getallpersonnes(){
        $requete = $this->bd->prepare('SELECT nom, prenom from personne');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);

    }

    public function verifmdp(){
        $usr_saisi = e($_POST['username']);
        $mdp_saisi = e($_POST['password']);
        $mdp = $this->loginP($usr_saisi);

        foreach($mdp as $m){
        if ($mdp_saisi == $m){
            return True;
        }
        elseif($mdp !=$m){
            echo '<p> Mot de passe incorrect </p>';
            return False;
        }
    }
    }

    public function getClient(){
        $requete = $this->bd->prepare('SELECT nomclient, telclient from client');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getIdMaxP(){
        $requete = $this->bd->prepare('select max(id_personne) from personne');
        $requete->execute();
        $id = $requete->fetch(PDO::FETCH_ASSOC);
        return $id['max'] + 1;
    }

    public function getIdMaxC(){
        $requete = $this->bd->prepare('select max(id_client) from client');
        $requete->execute();
        $id = $requete->fetch(PDO::FETCH_ASSOC);
        return $id['max'] + 1;
    }

    // Pour créer une personne
    public function addPersonne($infos){
        $id = $this->getIdMaxP();

        $requete = $this->bd->prepare('INSERT INTO personne VALUES (:id, :nom, :prenom, :mail, :motDePasse, :telephone)');
        $m = ['nom', 'prenom', 'mail', 'motDePasse','telephone'];
        $requete->bindValue(':id',$id);
        foreach ($m as $value) {
            $requete->bindValue(':' . $value, $infos[$value]);
        }
        $requete->execute();
        return (bool) $requete->rowCount();
    }

    //Pour créer un interlocuteur
    public function addInter($infos){
        $this->addPersonne($infos);
        $requete = $this->bd->prepare('SELECT id_personne from personne where nom = :nom');
        $requete->bindValue(':nom',$infos['nom']);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);

        $r2 = $this->bd->prepare('INSERT INTO interlocuteur VALUES (:id)');
        $r2->bindValue(':id',$tab['id_personne']);
        $r2->execute();

        return (bool) $r2->rowCount();
    }
    public function addComm($infos){
        $this->addPersonne($infos);
        $requete = $this->bd->prepare('SELECT id_personne from personne where nom = :nom');
        $requete->bindValue(':nom',$infos['nom']);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);

        $r2 = $this->bd->prepare('INSERT INTO commercial VALUES (:id)');
        $r2->bindValue(':id',$tab['id_personne']);
        $r2->execute();
        return (bool) $r2->rowCount();
    }

    //Pour créer un prestataire
    public function addPresta($infos){
        $this->addPersonne($infos);
        $requete = $this->bd->prepare('SELECT id_personne from personne where nom = :nom');
        $requete->bindValue(':nom',$infos['nom']);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);

        $r2 = $this->bd->prepare('INSERT INTO prestataire VALUES (:id)');
        $r2->bindValue(':id',$tab['id_personne']);
        $r2->execute();
        return (bool) $r2->rowCount();
    }

    //Pour créer un client
    public function addClient($infos){
        $id = $this->getIdMaxC();
        $requete = $this->bd->prepare('INSERT INTO client VALUES(:id, :nom,:tel)');
        $requete->bindValue(':id',$id);
        $requete->bindValue(':nom',$infos['nomclient']);
        $requete->bindValue(':tel',$infos['telclient']);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);

        return (bool) $requete->rowCount();
    }

    //Pour créer un gestionnaire
    public function addGestionnaire($infos){
        $this->addPersonne($infos);
        $requete = $this->bd->prepare('SELECT id_personne from personne where nom = :nom');
        $requete->bindValue(':nom',$infos['nom']);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);

        $r2 = $this->bd->prepare('INSERT INTO gestionnaire VALUES (:id)');
        $r2->bindValue(':id',$tab['id_personne']);
        $r2->execute();

        return (bool) $r2->rowCount();
    }


    public function modifmdp($nvmdp){

        $requete = $this->bd->prepare('');
        $requete->bindValue(':mdp',$nvmdp);
        $requete->execute();
    }

// Pour avoir le nom, prénom de l'utilisateur connecté
    public function getnom(){
        $requete = $this->bd->prepare('SELECT nom,prenom from personne where mail = :mail');
        $requete->bindValue(':mail',$_SESSION['username']);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);
        return $tab['nom'].$tab['prenom'];
    }
    


    // Pour consulter les BDL:

    // Consulter les BDL des prestataires : pour les gestionnaires et admin
    public function getPrestaBDL(){
        $requete = $this->bd->prepare('SELECT
            b.id_personne_1 AS id_prestataire,
            pe.nom AS nom_prestataire,
            pe.prenom AS prenom_prestataire,
            b.id_composante,
            c.nomComposante,
            b.annee,
            b.mois,
            b.signatureInterlocuteur,
            b.signaturePrestataire,
            b.commentaire,
            b.statut
            FROM
                BDL b
            JOIN
                PRESTATAIRE p ON b.id_personne_1 = p.id_personne
            JOIN
                PERSONNE pe ON pe.id_personne = p.id_personne
            JOIN
                COMPOSANTE c ON b.id_composante = c.id_composante');
    
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }


    public function updateClient($idClient,$infos) {
        $requete = $this->bd->prepare('UPDATE client SET nomclient = :nom, telclient = :tel WHERE id_client = :id');
        $requete->bindValue(':id', $idClient['id_client']);
        $requete->bindValue(':nom', $infos['nomclient']);
        $requete->bindValue(':tel', $infos['telclient']);
        $requete->execute();
        return (bool) $requete->rowCount();
    }


    public function getPrestaBDLComm() {
        $idUtilisateur = $this->getId();
        $role = $this->getrole();
    
        if ($role === 'commercial') {
            $requete = $this->bd->prepare('SELECT
                b.id_personne_1 AS id_prestataire,
                pe.nom AS nom_prestataire,
                pe.prenom AS prenom_prestataire,
                b.id_composante,
                c.nomComposante,
                b.annee,
                b.mois,
                b.signatureInterlocuteur,
                b.signaturePrestataire,
                b.commentaire,
                b.statut
                FROM
                    BDL b
                JOIN
                    PRESTATAIRE p ON b.id_personne_1 = p.id_personne
                JOIN
                    PERSONNE pe ON pe.id_personne = p.id_personne
                JOIN
                    COMPOSANTE c ON b.id_composante = c.id_composante
                JOIN
                    AFFECTE a ON c.id_composante = a.id_composante
                JOIN
                    COMMERCIAL co on a.id_personne = co.id_personne
                WHERE
                    co.id_personne = :id_commercial;');
    
            $requete->bindValue(":id_commercial", $idUtilisateur);
            $requete->execute();
    
            return $requete->fetchAll(PDO::FETCH_ASSOC);

        }
    }
    
    public function getBDLComp() {
        $idUtilisateur = $this->getId();
        $role = $this->getrole();
    
        if ($role === 'interlocuteur') {
            $requeteComp = $this->bd->prepare('SELECT DISTINCT
    c.id_composante,
    c.nomComposante,
    i.id_personne AS id_interlocuteur
FROM
    PRESTATAIRE pr
JOIN
    BDL b ON pr.id_personne = b.id_personne_1
JOIN
    COMPOSANTE c ON b.id_composante = c.id_composante
JOIN
    REPRESENTE r ON c.id_composante = r.id_composante
JOIN
    INTERLOCUTEUR i ON r.id_personne = i.id_personne
WHERE
    i.id_personne = :id_interlocuteur;');
            $requeteComp->bindValue(":id_interlocuteur", $idUtilisateur);
            $requeteComp->execute();
            $idComposante = $requeteComp->fetch(PDO::FETCH_ASSOC)['id_composante'];
    
            $requeteBDL = $this->bd->prepare('SELECT
                b.id_personne_1 AS id_prestataire,
                pe.nom AS nom_prestataire,
                pe.prenom AS prenom_prestataire,
                b.id_composante,
                c.nomComposante,
                b.annee,
                b.mois,
                b.signatureInterlocuteur,
                b.signaturePrestataire,
                b.commentaire,
                b.statut
                FROM
                    BDL b
                JOIN
                    PRESTATAIRE p ON b.id_personne_1 = p.id_personne
                JOIN
                    PERSONNE pe ON pe.id_personne = p.id_personne
                JOIN
                    COMPOSANTE c ON b.id_composante = c.id_composante
                WHERE
                    b.id_composante = :id_composante');
    
            $requeteBDL->bindValue(":id_composante", $idComposante);
            $requeteBDL->execute();
    
            return $requeteBDL->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function BDLPresta() {
        $idPrestataire = $this->getId();
        $role = $this->getrole();
    
        if ($role === 'prestataire') {
            $requeteBDL = $this->bd->prepare('SELECT
                b.id_personne_1 AS id_prestataire,
                pe.nom AS nom_prestataire,
                pe.prenom AS prenom_prestataire,
                b.id_composante,
                c.nomComposante,
                b.annee,
                b.mois,
                b.signatureInterlocuteur,
                b.signaturePrestataire,
                b.commentaire,
                b.statut
                FROM
                    BDL b
                JOIN
                    PRESTATAIRE p ON b.id_personne_1 = p.id_personne
                JOIN
                    PERSONNE pe ON pe.id_personne = p.id_personne
                JOIN
                    COMPOSANTE c ON b.id_composante = c.id_composante
                WHERE
                    b.id_personne_1 = :id_prestataire');
    
            $requeteBDL->bindValue(":id_prestataire", $idPrestataire);
            $requeteBDL->execute();
    
            return $requeteBDL->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getAllCompo(){
        $requete = $this->bd->prepare('select id_composante, nomcomposante, id_client from composante;');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllPresta(){
        $requete = $this->bd->prepare('SELECT nom,prenom from personne join prestataire on prestataire.id_personne = personne.id_personne');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPrestaAClient(){
        $requete = $this->bd->prepare("SELECT DISTINCT pe.nom AS nom_prestataire, pe.prenom prenom_prestataire, c.nomClient
        FROM PRESTATAIRE p
        JOIN 
            PERSONNE pe ON p.id_personne = pe.id_personne
        JOIN 
            BDL b ON pe.id_personne = b.id_personne_1
        JOIN 
            COMPOSANTE co ON b.id_composante = co.id_composante
        JOIN 
            CLIENT c ON co.id_client = c.id_client; ");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);

    }


    public function getClientPresta() {
        $idPrestataire = $this->getId();
        $role = $this->getrole();
    
        if ($role === 'prestataire') {
            $requeteClients = $this->bd->prepare('SELECT DISTINCT c.*
FROM CLIENT c
JOIN 
    COMPOSANTE co ON c.id_client = co.id_client
JOIN 
    BDL b ON co.id_composante = b.id_composante
JOIN
    PRESTATAIRE p ON b.id_personne_1 = p.id_personne
JOIN 
    PERSONNE pe ON p.id_personne = pe.id_personne
WHERE pe.id_personne = :id_prestataire ;');
    
            $requeteClients->bindValue(":id_prestataire", $idPrestataire);
            $requeteClients->execute();
    
            // Vérifier si la requête a renvoyé des résultats
            $resultats = $requeteClients->fetchAll(PDO::FETCH_ASSOC);
    
            return $resultats ? $resultats : []; // Retourner un tableau vide si aucun résultat
        }
    
        return []; // Retourner un tableau vide si le rôle n'est pas 'prestataire'
    }
    
    
    public function getPrestaC() {
        $idInterlocuteur = $this->getId();
        $role = $this->getrole();
    
        if ($role === 'interlocuteur') {
            $requeteComp = $this->bd->prepare('SELECT DISTINCT
            c.id_composante,
            c.nomComposante,
            i.id_personne AS id_interlocuteur
        FROM
            PRESTATAIRE pr
        JOIN
            BDL b ON pr.id_personne = b.id_personne_1
        JOIN
            COMPOSANTE c ON b.id_composante = c.id_composante
        JOIN
            REPRESENTE r ON c.id_composante = r.id_composante
        JOIN
            INTERLOCUTEUR i ON r.id_personne = i.id_personne
        WHERE
            i.id_personne = :id_interlocuteur;');
            $requeteComp->bindValue(":id_interlocuteur", $idInterlocuteur);
            $requeteComp->execute();
            $idComposante = $requeteComp->fetch(PDO::FETCH_ASSOC)['id_composante'];
    
            $requetePrestataires = $this->bd->prepare('SELECT DISTINCT
            c.id_composante,
            c.nomComposante,
            b.id_personne_1 AS id_prestataire,
            p.nom AS nom_prestataire,
            p.prenom AS prenom_prestataire
        FROM
            COMPOSANTE c
        JOIN BDL b ON c.id_composante = b.id_composante
        JOIN PERSONNE p ON b.id_personne_1 = p.id_personne
        WHERE
             c.id_composante = :id_composante ;');
    
            $requetePrestataires->bindValue(":id_composante", $idComposante);
            $requetePrestataires->execute();
    
            return $requetePrestataires->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function updatePersonne($idPersonne,$infos)
        {
            $requete = $this->bd->prepare('UPDATE personne SET nom = :nom, prenom = :prenom, motDePasse = :motDePasse WHERE id_personne = :id');
            $requete->bindValue(':id', $idPersonne);
            $requete->bindValue(':nom', $infos['nom']);
            $requete->bindValue(':prenom', $infos['prenom']);
            $requete->bindValue(':motDePasse', $infos['motDePasse']);
            $requete->execute();
        
            return (bool) $requete->rowCount();
    }
    // Met à jour des informations d'un Prestataire par un gestionnaire ou administrateur.
public function updatePrestGest ($id, $infos)
{
    $rDemandeur= $this->getrole();

   
    if ($rDemandeur === 'gestionnaire'|| $rDemandeur === 'admin' ) {
        $requete = $this->bd->prepare('UPDATE personne SET nom = :nom, prenom = :prenom, mail = :mail, telephone = :telephone WHERE id_personne = :id');

        $m = ['nom', 'prenom', 'mail', 'telephone'];

        $requete->bindValue(':id', $id);

        foreach ($m as $value) {
            $requete->bindValue(':' . $value, $infos[$value]);
        }

        $requete->execute();
    }
}

// Met à jour des informations d'un  commercial par l'administrateur.
public function updateCom($id, $infos)
{
    $rDemandeur= $this->getrole();

   
    if ($rDemandeur === 'admin' ) {
        $requete = $this->bd->prepare('UPDATE personne SET nom = :nom, prenom = :prenom, mail = :mail, telephone = :telephone WHERE id_personne = :id');

        $m = ['nom', 'prenom', 'mail', 'telephone'];

        $requete->bindValue(':id', $id);

        foreach ($m as $value) {
            $requete->bindValue(':' . $value, $infos[$value]);
        }

        $requete->execute();
    }
}

// Met à jour des informations d'un gestionnaire ou administrateur.
public function updateGest($id, $infos)
{
    $rDemandeur= $this->getrole();

   
    if ($rDemandeur === 'admin' ) {
        $requete = $this->bd->prepare('UPDATE personne SET nom = :nom, prenom = :prenom, mail = :mail, telephone = :telephone WHERE id_personne = :id');

        $m = ['nom', 'prenom', 'mail', 'telephone'];

        $requete->bindValue(':id', $id);

        foreach ($m as $value) {
            $requete->bindValue(':' . $value, $infos[$value]);
        }

        $requete->execute();
    }
}



    public function getcommerciaux(){
        $requete = $this->bd->prepare('SELECT nom, prenom, personne.id_personne from personne join commercial on personne.id_personne = commercial.id_personne');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getAllCommercial(){
        $id_commercial = $this->getId();
        $requete = $this->bd->prepare('SELECT DISTINCT
        p.id_personne AS id_commercial,
        p.nom AS nom_commercial,
        p.prenom AS prenom_commercial,
        pe.id_personne AS id_prestataire,
        pe.nom AS nom_prestataire,
        pe.prenom AS prenom_prestataire,
        cl.id_client,
        cl.nomClient,
        per.id_personne AS id_interlocuteur,
        per.nom AS nom_interlocuteur,
        per.prenom AS prenom_interlocuteur,
        co.id_composante,
        co.nomComposante
    FROM
        COMMERCIAL c
    LEFT JOIN
        AFFECTE a ON c.id_personne = a.id_personne
    LEFT JOIN
        COMPOSANTE co ON a.id_composante = co.id_composante
    LEFT JOIN
        REPRESENTE r ON co.id_composante = r.id_composante
    LEFT JOIN
        INTERLOCUTEUR i ON r.id_personne = i.id_personne
    LEFT JOIN
        PERSONNE per ON i.id_personne = per.id_personne
    LEFT JOIN
        CLIENT cl ON co.id_client = cl.id_client
    LEFT JOIN 
        BDL b ON co.id_composante = b.id_composante
    LEFT JOIN
        PRESTATAIRE pr ON b.id_personne_1 = pr.id_personne
    LEFT JOIN
        PERSONNE pe ON pr.id_personne = pe.id_personne
    LEFT JOIN
        PERSONNE p ON c.id_personne = p.id_personne
    WHERE
        c.id_personne = :id_commercial;');
        $requete->bindValue(':id_commercial',$id_commercial);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAllInterlo(){
        $id_interlocuteur = $this->getId();
        $requete = $this->bd->prepare('SELECT DISTINCT
        pe.id_personne AS id_prestataire,
        pe.nom AS nom_prestataire,
        pe.prenom AS prenom_prestataire,
        cl.id_client,
        cl.nomClient,
        per.id_personne AS id_interlocuteur,
        per.nom AS nom_interlocuteur,
        per.prenom AS prenom_interlocuteur,
        co.id_composante,
        co.nomComposante
    FROM
        INTERLOCUTEUR i 
    LEFT JOIN
        PERSONNE per ON i.id_personne = per.id_personne
    LEFT JOIN
        REPRESENTE r ON per.id_personne = r.id_personne
    LEFT JOIN
        COMPOSANTE co ON r.id_composante = co.id_composante
    LEFT JOIN
        CLIENT cl ON co.id_client = cl.id_client
    LEFT JOIN 
        BDL b ON co.id_composante = b.id_composante
    LEFT JOIN
        PRESTATAIRE pr ON b.id_personne_1 = pr.id_personne
    LEFT JOIN
        PERSONNE pe ON pr.id_personne = pe.id_personne
    WHERE
        per.id_personne = :id_interlocuteur; -- exemple 4 / 8 / 9 / 10');
        $requete->bindValue(':id_interlocuteur',$id_interlocuteur);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getIdMaxTypeVoie(){
        $requete = $this->bd->prepare('select max(id) from TypeVoie');
        $requete->execute();
        $id = $requete->fetch(PDO::FETCH_ASSOC);
        return $id['max'] + 1;        
    }

    public function creerTypeVoie(){
        $id = $this->getIdMaxTypeVoie();
        $requete = $this->bd->prepare('INSERT INTO TypeVoie (id) VALUES (:id)');
        $requete->bindValue(':id',$id);
        $requete->execute();
    }

    public function getIdMaxLocalite(){
        $requete = $this->bd->prepare('select max(idLocalite) from localite');
        $requete->execute();
        $id = $requete->fetch(PDO::FETCH_ASSOC);
        return $id['max'] + 1; 
    }

    public function creerLocalite($infos){
        $id = $this->getIdMaxLocalite();
        $requete = $this->bd->prepare('INSERT INTO LOCALITE VALUES (:id, :cp, :ville)');
        $requete->bindValue(':id',$id);
        $requete->bindValue(':cp',$infos['cp']);
        $requete->bindValue(':ville', $infos['ville']);
        $requete->execute();
    }

    public function getIdMaxAdresse(){
        $requete = $this->bd->prepare('select max(id_adresse) from adresse');
        $requete->execute();
        $id = $requete->fetch(PDO::FETCH_ASSOC);
        return $id['max'] + 1; 
    }

    // pour accéder à toutes les villes enregistrées (pour les formulaires)
    public function getallLocalite(){
        $requete = $this->bd->prepare('SELECT * from Localite');
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function creerAdresse($infos){
        $idadresse = $this->getIdMaxAdresse();
        $requete = $this->bd->prepare('INSERT INTO adresse VALUES
                                    (:id_adresse, :numero, :nomVoie, :idLocalite, :id)');
                
        $requete->bindValue(':id_adresse',$idadresse);
        $requete->bindValue(':numero',$infos['numero']);
        $requete->bindValue(':nomVoie',$infos['nomVoie']);
        $requete->bindValue(':idLocalite', $infos['idLocalite']);
        $requete->bindValue(':id',$infos['id']);

        $requete->execute();
    }

    // Pour créer une composante
    public function creerComposante($infos){
        $idcomposante = $this->getIdMaxComp();
        $requete = $this->bd->prepare('INSERT INTO composante VALUES 
                ( :id, :nomComposante, :id_client, :id_adresse) ');

        $requete->bindValue(':id',$idcomposante);
        $requete->bindValue(':nomComposante',$infos['nomComposante']);
        $requete->bindValue(':id_client',$infos['id_client']); 
        # on crée la composante au même moment qu'un client, donc pas possible. 
        #Il faudrait d'abord crée le client, puis lui ajouter des composantes
        $requete->bindValue(':id_adresse',$infos['id_adresse']); #comment accéder à id_adresse ?
            
        $requete->execute();
    }


    public function affecteComposanteCommercial($infos){
        $requete = $this->bd->prepare('INSERT INTO affecte values (:id_personne, :id_composante)');
        $requete->bindValue(':id_personne',$infos['id_personne']);
        $requete->bindValue('id_composante',$infos['id_composante']);
        $requete->execute();
    }

    public function seeCommercialCompo($infos){
        $requete = $this->bd->prepare('SELECT * from affecte where id_personne = :id_personne');
        $requete->bindValue(':id_personne',$infos['id_personne']);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getIdMaxComp(){
        $requete = $this->bd->prepare('select max(id_composante) from composante');
        $requete->execute();
        $id = $requete->fetch(PDO::FETCH_ASSOC);
        return $id['max'] + 1;
    }

    public function getIdClient($nom){
        $requete = $this->bd->prepare('SELECT 
        id_client
        FROM CLIENT
        where nomClient = :nomClient');
        $requete->bindValue(':nomClient',$nom);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
                
            }

   /* public function getIdComposante($infos) {
        $requete = $this->bd->prepare("SELECT id_composante FROM COMPOSANTE where nomComposante = :nomcomposante");
    
        $requete->bindValue(":nomComposante", $infos['nomcomposante']);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);

        if ($tab === false) {
            // Aucun résultat trouvé, vous pouvez gérer cela ici
            return null;
        }
        
        return $tab['id_composante'];
    } */


    public function getNomComposante($infos) {
        $requete = $this->bd->prepare("SELECT nomcomposante FROM COMPOSANTE WHERE id_composante = :id_composante");
            $requete->bindValue(":id_composante", $infos['id_composante']);
            $requete->execute();
            
            $tab = $requete->fetch(PDO::FETCH_ASSOC);
        return $tab['nomcomposante'];
        }
    public function getIdMaxType(){
        $requete = $this->bd->prepare('select max(idType) from type');
        $requete->execute();
    $id = $requete->fetch(PDO::FETCH_ASSOC);
    return $id['max'] + 1;
    }
    

    public function creerBDL($infos) {
        $id_prestataire = $this->getIdPresta($infos);
        $id_composante = $infos['id_composante']; 
        #$id_commercial = $this->getIdCom($infos);
        # $id_interlocuteur = $this->getIdInter($infos);
        $id_gestionnaire = $infos['id_gestionnaire'];
        $id_interlocuteur = $infos['id_interlocuteur'];
    
        $r1 = $this->bd->prepare('INSERT INTO BDL
        VALUES (:id_personne_1, :id_composante, :annee, :mois, :signatureInterlocuteur, :signaturePrestataire, :commentaire, :statut, :id_personne, :id_personne_2)');
    
        $m = ['id_personne_1', 'id_composante', 'annee', 'mois', 'signatureInterlocuteur', 'signaturePrestataire', 'commentaire', 'id_personne', 'id_personne_2'];
    
        $r1->bindValue(':id_personne_1', $id_prestataire);
        $r1->bindValue(':id_composante', $id_composante);
        $r1->bindValue(':annee', $infos['annee']);
        $r1->bindValue(':mois', $infos['mois']);
        $r1->bindValue(':statut', $infos['statut']);
        $r1->bindValue(':signatureInterlocuteur', $infos['signatureInterlocuteur']);
        $r1->bindValue(':signaturePrestataire', $infos['signaturePrestataire']);
        $r1->bindValue(':commentaire', $infos['commentaire']);
        $r1->bindValue(':id_personne', $id_gestionnaire);
        $r1->bindValue(':id_personne_2', $id_interlocuteur);
    
        $r1->execute();
    
    }
    

    public function creerPeriode($infos) {
        $id_prestataire = $this->getIdPresta($infos); 
        $id_composante = $infos['id_composante']; 
    
        $requete = $this->bd->prepare('INSERT INTO PERIODE VALUES (:id_personne, :id_composante, :annee, :mois, :jourDuMois)');
        $requete->bindValue(':id_personne', $id_prestataire);
        $requete->bindValue(':id_composante', $id_composante);
        $requete->bindValue(':annee', $infos['annee']);
        $requete->bindValue(':mois', $infos['mois']);
        $requete->bindValue(':jourDuMois', $infos['jourDuMois']);
        
        $requete->execute();
    
    }

    public function journee0($infos){
        $id_prestataire = $this->getIdPresta($infos);
        $id_composante = $this->getIdMaxComp();
        $requete = $this->bd->prepare('INSERT INTO JOURNEE values ( :id_personne, :id_composante, :annee, :mois, :jourDuMois)');
        $requete->bindValue(':id_personne',$id_prestataire);
        $requete->bindValue(':id_composante', $id_composante);
        $requete->bindValue(':annee', $infos['annee']);
        $requete->bindValue(':mois', $infos['mois']);
        $requete->bindValue(':jourDuMois', $infos['jourDuMois']);

        $requete->execute();
    }

    public function demijournee0($infos){
        $id_prestataire = $this->getIdPresta($infos);
        $id_composante = $this->getIdMaxComp();
        $id_type = 0;
        $requete = $this->bd->prepare('INSERT INTO DEMIJOURNEE values ( :id_personne, :id_composante, :annee, :mois, :jourDuMois, :idType );');
        $requete->bindValue(':id_personne', $id_prestataire);
        $requete->bindValue(':id_composante', $id_composante);
        $requete->bindValue(':annee', $infos['annee']);
        $requete->bindValue(':mois', $infos['mois']);
        $requete->bindValue(':jourDuMois', $infos['jourDuMois']);
        $requete->bindValue(':idType', $id_type);
        $requete->execute();
    }

    public function creneau0($infos){
        $id_prestataire = $this->getIdPresta($infos);
        $id_composante = $this->getIdMaxComp();
        $requete = $this->bd->prepare('INSERT INTO CRENEAU values ( :Numero, :heure_arrivee, :heure_depart, :id_personne, :id_composante, :annee, :mois, :jourDuMois);');
        $requete->bindValue(':Numero', $infos['Numero']);
        $requete->bindValue(':heure_arrivee', $infos['heure_arrivee']);
        $requete->bindValue(':heure_depart', $infos['heure_depart']);
        $requete->bindValue(':id_personne', $id_prestataire);
        $requete->bindValue(':id_composante', $id_composante);
        $requete->bindValue(':annee', $infos['annee']);
        $requete->bindValue(':mois', $infos['mois']);
        $requete->bindValue(':jourDuMois', $infos['jourDuMois']);
        $requete->execute();
    }
    

     public function getIdPresta($infos){
        $requete = $this->bd->prepare('SELECT personne.id_personne as id_personne from personne join prestataire on personne.id_personne = prestataire.id_personne where personne.nom = :nom and personne.prenom = :prenom
        ');
        $requete->bindValue(':nom', $infos['nom']);
        $requete->bindValue(':prenom', $infos['prenom']);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);
        return $tab['id_personne'];
    } 

    public function getIdInter($infos){
        $requete = $this->bd->prepare('SELECT personne.id_personne from personne join interlocuteur on personne.id_personne = interlocuteur.id_personne where personne.nom = :nom and personne.prenom = :prenom');
        $requete->bindValue(':nom', $infos['nom']);
        $requete->bindValue(':prenom', $infos['prenom']);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);
        return $tab['id_personne'];
    }
    public function getIdCom($infos){
        $requete = $this->bd->prepare('SELECT personne.id_personne from personne join commercial on personne.id_personne = commercial.id_personne where personne.nom = :nom and personne.prenom = :prenom');
        $requete->bindValue(':nom', $infos['nom']);
        $requete->bindValue(':prenom', $infos['prenom']);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);
        return $tab['id_personne'];
    }
    public function updateBDL(){

    }
/* 
    public function creerBDL0($infos){
        $id_prestataire = $this->getIdPresta($infos); 
        $id_composante = $infos['id_composante']; 
        $id_gestionnaire = $this->getIdGest();
        $id_interlocuteur = $this->getInterlocuteurRepresente($infos);
    
        $requete = $this->bd->prepare('INSERT INTO bdl(id_personne_1,id_composante,annee,mois, id_personne, id_personne_2)
        values (:id_personne_1, :id_composante, :annee, :mois, :id_personne_2)');
        $requete->bindValue(':id_personne_1', $id_prestataire);
        $requete->bindValue(':id_composante', $id_composante);
        $requete->bindValue(':annee', $infos['annee']);
        $requete->bindValue(':mois', $infos['mois']);
        $requete->bindValue(':id_personne', $id_gestionnaire);
        $requete->bindValue(':id_personne_2', $id_interlocuteur);
        
        $requete->execute();
    }
     */
    public function creerBDL0($infos){
        $id_prestataire = $this->getIdPresta($infos); 
        $id_composante = $infos['id_composante']; 
        $id_interlocuteur = $this->getInterlocuteurRepresente($infos);
    
        $requete = $this->bd->prepare('INSERT INTO bdl(id_personne_1,id_composante,annee,mois,id_personne_2)
        values (:id_personne_1, :id_composante, :annee, :mois, :id_personne_2)');
        $requete->bindValue(':id_personne_1', $id_prestataire);
        $requete->bindValue(':id_composante', $id_composante);
        $requete->bindValue(':annee', $infos['annee']);
        $requete->bindValue(':mois', $infos['mois']);
        $requete->bindValue(':id_personne_2', $id_interlocuteur);
        
        $requete->execute();
    }

  
    public function getInterlocuteurRepresente($infos){
        $requete = $this->bd->prepare('SELECT id_personne from represente where id_composante = :idcomposante');
        $requete->bindValue('idcomposante',$infos['id_composante']);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);
        return $tab['id_personne'];
    }

    public function updateInterCommercial ($id, $infos)
    {
        $rDemandeur= $this->getrole();
    
       
        if ($rDemandeur === 'commercial'|| $rDemandeur === 'admin' ) {
            $requete = $this->bd->prepare('UPDATE personne SET nom = :nom, prenom = :prenom, mail = :mail, telephone = :telephone WHERE id_personne = :id');
    
            $m = ['nom', 'prenom', 'mail', 'telephone'];
    
            $requete->bindValue(':id', $id);
    
            foreach ($m as $value) {
                $requete->bindValue(':' . $value, $infos[$value]);
            }
    
            $requete->execute();
        }
}
public function getallperiodes($infos){
    $requete = $this->bd->prepare("SELECT
BDL.id_personne_1 AS id_prestataire,
BDL.id_composante,
BDL.annee,
BDL.mois,
CASE
    WHEN Creneau.Numero IS NOT NULL THEN 'Creneau'
    WHEN Journee.jourDuMois IS NOT NULL THEN 'Journee'
    WHEN Demijournee.idType IS NOT NULL THEN 'Demijournee'
END AS TypeEmission
FROM BDL
LEFT JOIN Creneau ON BDL.id_personne_1 = Creneau.id_personne AND BDL.id_composante = Creneau.id_composante AND BDL.annee = Creneau.annee AND BDL.mois = Creneau.mois
LEFT JOIN Journee ON BDL.id_personne_1 = Journee.id_personne AND BDL.id_composante = Journee.id_composante AND BDL.annee = Journee.annee AND BDL.mois = Journee.mois
LEFT JOIN Demijournee ON BDL.id_personne_1 = Demijournee.id_personne AND BDL.id_composante = Demijournee.id_composante AND BDL.annee = Demijournee.annee AND BDL.mois = Demijournee.mois
WHERE BDL.id_personne_1 = :id_prestataire AND BDL.id_composante = :id_composante AND BDL.annee != 1;");

    $requete->bindValue(':id_prestataire',$infos['id_prestataire']);
    $requete->bindValue(':id_composante',$infos['id_composante']);
    $requete->execute();


    return $requete->fetchAll(PDO::FETCH_ASSOC);
}


public function getCompPresta() {
    $id_Prestataire = $this->getId();
    $requetePrestataires = $this->bd->prepare('SELECT DISTINCT
    c.id_composante,
    c.nomComposante,
    b.id_personne_1 AS id_prestataire,
    p.nom AS nom_prestataire,
    p.prenom AS prenom_prestataire
FROM
    COMPOSANTE c
JOIN BDL b ON c.id_composante = b.id_composante
JOIN PERSONNE p ON b.id_personne_1 = p.id_personne
WHERE
     p.id_personne = :id_prestataire;');

    $requetePrestataires->bindValue(":id_prestataire", $id_Prestataire);
    $requetePrestataires->execute();

    return $requetePrestataires->fetchAll(PDO::FETCH_ASSOC);

}

public function creerjournee($infos){
    $id_prestataire = $this->getIdPresta($infos);

    $requete = $this->bd->prepare('INSERT INTO JOURNEE values ( :id_personne, :id_composante, :annee, :mois, :jourDuMois)');
    $requete->bindValue(':id_personne',$id_prestataire);
    $requete->bindValue(':id_composante', $infos['id_composante']);
    $requete->bindValue(':annee', $infos['annee']);
    $requete->bindValue(':mois', $infos['mois']);
    $requete->bindValue(':jourDuMois', $infos['jourDuMois']);

    $requete->execute();
}

public function creerdemijournee($infos){
    $id_prestataire = $this->getIdPresta($infos);

    $id_type = $infos['id_type'];
    $requete = $this->bd->prepare('INSERT INTO DEMIJOURNEE values ( :id_personne, :id_composante, :annee, :mois, :jourDuMois, :idType );');
    $requete->bindValue(':id_personne', $id_prestataire);
    $requete->bindValue(':id_composante', $infos['id_composante']);
    $requete->bindValue(':annee', $infos['annee']);
    $requete->bindValue(':mois', $infos['mois']);
    $requete->bindValue(':jourDuMois', $infos['jourDuMois']);
    $requete->bindValue(':idType', $id_type);
    $requete->execute();
}

public function creercreneau($infos){
    $id_prestataire = $this->getIdPresta($infos);

    $requete = $this->bd->prepare('INSERT INTO CRENEAU values ( :Numero, :heure_arrivee, :heure_depart, :id_personne, :id_composante, :annee, :mois, :jourDuMois);');
    $requete->bindValue(':Numero', $infos['Numero']);
    $requete->bindValue(':heure_arrivee', $infos['heure_arrivee']);
    $requete->bindValue(':heure_depart', $infos['heure_depart']);
    $requete->bindValue(':id_personne', $id_prestataire);
    $requete->bindValue(':id_composante', $infos['id_composante']);
    $requete->bindValue(':annee', $infos['annee']);
    $requete->bindValue(':mois', $infos['mois']);
    $requete->bindValue(':jourDuMois', $infos['jourDuMois']);
    $requete->execute();
}


public function getCompInter($infos) {
    $id_Composante = $infos['id_composante'];
    $requeteInter = $this->bd->prepare('SELECT DISTINCT
    pe.id_personne as po
FROM
    PERSONNE pe 
JOIN
    INTERLOCUTEUR i ON pe.id_personne = i.id_personne
JOIN
    REPRESENTE r ON  i.id_personne = r.id_personne
JOIN
    COMPOSANTE c ON r.id_composante = c.id_composante
WHERE
    r.id_composante = :id_composante;');

    $requeteInter->bindValue(":id_composante", $id_Composante);
    $requeteInter->execute();

    return $requeteInter->fetchAll(PDO::FETCH_ASSOC);
}


public function getCompCom($infos) {
    $id_Composante = $infos['id_composante'];
    $requeteCom = $this->bd->prepare('SELECT DISTINCT
    pe.id_personne as p
FROM
    PERSONNE pe 
JOIN
    COMMERCIAL co ON pe.id_personne = co.id_personne
JOIN
    AFFECTE a ON  co.id_personne = a.id_personne
JOIN
    COMPOSANTE c ON a.id_composante = c.id_composante
WHERE
    a.id_composante = :id_composante;');

    $requeteCom->bindValue(":id_composante", $id_Composante);
    $requeteCom->execute();

    return $requeteCom->fetchAll(PDO::FETCH_ASSOC);
}

    public function getNomPrest($infos) {
        $id_Personne = $infos['id_personne'];
        $requetePrest = $this->bd->prepare('SELECT 
        pe.nom,
        pe.prenom
    FROM
        PERSONNE pe 
    JOIN
        PRESTATAIRE p ON pe.id_personne = p.id_personne
    WHERE
        pe.id_personne = :id_personne;');

        $requetePrest->bindValue(":id_personne", $id_Personne);
        $requetePrest->execute();

        return $requetePrest->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getIdGestBDL0($infos){
        $requete = $this->bd->prepare('SELECT DISTINCT
        g.id_personne as pp
    FROM
        PERSONNE pe 
    JOIN
        GESTIONNAIRE g ON pe.id_personne = g.id_personne
    JOIN
        BDL b ON  g.id_personne = b.id_personne
    JOIN 
        COMPOSANTE c ON b.id_composante = c.id_composante
    WHERE
        b.id_composante = :id_composante;');
        $requete->bindValue(':id_composante', $infos['id_composante']);
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }


    public function issetBDL($infos){
        $requete = $this->bd->prepare('SELECT EXISTS (
            SELECT 1
            FROM BDL
            WHERE id_personne_1 = :id_prestataire
              AND id_composante = :id_composante
              AND annee = :annee
              AND mois = :mois
         );');

        $requete->bindValue(':id_prestataire', $infos['id_prestataire']);
        $requete->bindValue(':id_composante', $infos['id_composante']);
        $requete->bindValue(':annee', $infos['annee']);
        $requete->bindValue(':mois', $infos['mois']);

        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);

    }


    public function getIdMaxNumero(){
        $requete = $this->bd->prepare('SELECT max(Numero) from creneau');
        $requete->execute();
        $id = $requete->fetch(PDO::FETCH_ASSOC);
        return $id['max'] + 1;
    }
 public function getBDL($infos) {
        $id_prestataire = $this->getId();
    
        $r1 = $this->bd->prepare('SELECT * FROM BDL b WHERE b.id_personne_1 = :id_personne_1 and id_composante = :id_composante;');

        $r1->bindValue(':id_personne_1', $id_prestataire);
        $r1->bindValue('id_composante', $infos['id_composante']);
    
        $r1->execute();
        return $r1->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function valideInter($infos){
        $requete = $this->bd->prepare("UPDATE BDL set statut = 'Valide' 
        where id_personne_1 = :id_prestataire and id_personne = :id_gestionnaire and id_personne_2 = :id_interlocuteur
        and id_composante = :id_composante and mois = :mois");

        $id_interlocuteur = $this->getId();

        $requete->bindValue(':id_prestataire',$infos['id_prestataire']);
        $requete->bindValue('id_gestionnaire',$infos['id_gestionnaire']);
        $requete->bindValue('id_interlocuteur',$id_interlocuteur);
        $requete->bindValue('id_composante',$infos['id_composante']);
        $requete->bindValue('mois',$infos['mois']);

        $requete->execute();
        
    }

    public function refuseInter(){
        $requete = $this->bd->prepare("UPDATE BDL set statut = 'Refuse' 
        where id_prestataire = and id_composante = ... and idmois = ...");
        $requete->execute();
    }


    public function countmembre(){
        $requete =$this->bd->prepare('SELECT count(*) from personne');
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);

    }

    public function countclient(){
        $cm = $this->countmembre();
        $cm = $cm['count'];
        $requete = $this->bd->prepare('SELECT count(*) from client');
        $requete->execute();
        $c = $requete->fetch(PDO::FETCH_ASSOC);
        $c = $c['count'];
        return "$c / $cm";
    }


    public function getnbBDLValide(){
        $requete = $this->bd->prepare("SELECT count(*) from bdl where statut = 'Valide'");
        $requete->execute();
        $b = $requete->fetch(PDO::FETCH_ASSOC);
        $b = $b['count'];

        $r2 =  $this->bd->prepare('SELECT count(*) from bdl');
        $r2->execute();
        $c = $r2->fetch(PDO::FETCH_ASSOC);
        $c = $c['count'];

        return "$b / $c";

    }


    public function getBDLagci($infos)
    {
        $id =$infos['id_prestataire'];
        $bDemandeur= $this->getrole();
        $id_composante =$infos['id_composante'];

        $resultat = [];
       

        if ($bDemandeur === 'gestionnaire'|| $bDemandeur === 'admin' || $bDemandeur === 'commercial' || $bDemandeur === 'interlocuteur' ) {
            $requete = $this->bd->prepare('SELECT
            b.id_personne_1 AS id_prestataire,
            pe.nom AS nom_prestataire,
            pe.prenom AS prenom_prestataire,
            b.id_composante,
            c.nomComposante,
            b.annee,
            b.mois,
            b.statut,
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
                pe.id_personne = :id
                AND b.id_composante = :id_composante');
    
            $requete->bindValue(':id', $id);
            $requete->bindValue(':id_composante', $id_composante);
            $requete->execute();

            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        }

        return $resultat;
}
public function getIdPrestataire($infos){
    $requete = $this->bd->prepare('SELECT
    p.id_personne
FROM
    Personne p
JOIN
    PRESTATAIRE pr ON p.id_personne = pr.id_personne
JOIN
    BDL b ON pr.id_personne = b.id_personne_1
JOIN
    COMPOSANTE c ON b.id_composante = c.id_composante
JOIN        
    INTERLOCUTEUR i ON b.id_personne_2 = i.id_personne 
WHERE 
    b.id_composante = :id_composante and b.mois = :mois;');
    $requete->bindValue(':id_composante', $infos['id_composante']);
    $requete->bindValue(':mois', $infos['mois']);
    $requete->execute();
    $tab = $requete->fetch(PDO::FETCH_ASSOC);
    return $tab['id_personne'];
}



} 
