<?php
session_start();
class Controller_admin extends Controller 
{
    public function action_admin(){
        $m = Model::getModel();

        $np = $m->getallpersonnes();
        $r = array();
        $current = $m->getrole();
        
        foreach($np as $n){
            $nom = $n['nom'];
            $prenom = $n['prenom'];
            $ro = $m->getallroles($nom,$prenom);

            $r[] = array(
                'nom' => $nom,
                'prenom' => $prenom,
                'roles' => $ro
            );
        }
        
        $availableRoles = ["prestataire", "gestionnaire", "interlocuteur", "commercial", "admin","client"];
        $allowedRoles = [];

        switch ($current) {
            case 'gestionnaire':
                $allowedRoles = ['prestataire'];
                break;
            case 'commercial':
                $allowedRoles = ['interlocuteur'];
                break;
            case 'admin':
                $allowedRoles = $availableRoles;
                break;
            default:
                $allowedRoles = [];
        }

        $data = [
            "personne" => $r,
            "roles" => $m->getallroles($nom, $prenom),
            "role" => $m->getrole(),
            "nom" => $m->getnom(),
            "allowedRoles" => $allowedRoles,  
            "availableRoles" => $availableRoles
        ];

        $data["composantes"] = $m->getAllCompo();

        $this->render("admin", $data);
    }

    public function action_default()
    {
        $this->action_admin();
    }
    public function action_aff(){
        $m = Model::getModel();

        $nomPresta = isset($_POST['nom']) ? $_POST['nom'] : '';
        $prenomPresta = isset($_POST['prenom']) ? $_POST['prenom'] : '';

        $inf = ['nom' => $nomPresta, 'prenom' =>$prenomPresta];
        $idPresta = $m->getIdPresta($inf);
     

        
        foreach($_POST['composantes'] as $p){
                    echo $p;
                    $id_interlocuteur=$m->getInterlocuteurRepresente(["id_composante"=>$p]);
               

                $periodes = isset($_POST["periodes"][0]) ? $_POST["periodes"] : [];
            
              

                            $infosBDL = [
                                'nom' =>$nomPresta,
                                'prenom' =>$prenomPresta,
                                'id_personne_1' => $idPresta,
                                'id_composante'=>$p,
                                'annee' => 1,
                                'mois' => '2019-01-10',
                                'signatureInterlocuteur' => '',
                                'signaturePrestataire' => '',
                                'commentaire' => '',
                                "id_personne_2"=>$id_interlocuteur,

                            ];
                            $m->creerBDL0($infosBDL);

            switch ($periodes) {
                case "journee":
                    $infosPeriode = [
                        'annee' => 1,
                        'mois' => 01,
                        'jourDuMois' => 01,
                    ];

                    $m->creerPeriode($infosPeriode);
                    $m->journee0($infosPeriode);


                    break;

                case "demijournee":
                    $infosPeriode = [
                        'annee' => 1,
                        'mois' => 01,
                        'jourDuMois' => 01,
                    ];

                    $m->creerPeriode($infosPeriode);

                    $m->demijournee0($infosPeriode);

                    break;

                case "creneau":
                    $infosCreneau = [
                        'Numero' => 0,
                        'heure_arrivee' => 0,
                        'heure_depart' => 0,
                        'annee' => 1,
                        'mois' => 01,
                        'jourDuMois' => 01,
                    ];

                    $m->creerPeriode($infosCreneau);
                    $m->creneau0($infosCreneau);


                    break;

                default:
                    break;
            }   
            };
    header("Location: index.php?controller=admin");

                
    }
    public function action_add(){
        if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) &&
            isset($_POST["motDePasse"]) && isset($_POST["telephone"])) {
    
            $m = Model::getModel();
    
            $isaisi = ['nom', 'prenom', 'mail', 'motDePasse', 'telephone'];
    
            $infos = [];
    
            foreach ($isaisi as $i) {
                if (isset($_POST[$i])) {
                    $infos[$i] = $_POST[$i];
                } else {
                    $infos[$i] = null;
                }
            }
                
    
                $id_personne = $m->getIdMaxP();
    
                $roles = $_POST["roles"];
                
                $currentRole = $m->getrole();

                foreach ($roles as $role) {
                    switch ($role) {
                        case "prestataire":

                            $m->addPresta(["nom" => $infos["nom"],
                        "prenom" => $infos["prenom"],
                        "mail" => $infos["mail"],
                        "motDePasse" => $infos["motDePasse"],
                        "telephone" => $infos["telephone"]]);
                            
                            break;
                        case "gestionnaire":

                            $m->addGestionnaire(["nom" => $infos["nom"],
                            "prenom" => $infos["prenom"],
                            "mail" => $infos["mail"],
                            "motDePasse" => $infos["motDePasse"],
                            "telephone" => $infos["telephone"]]);
                            
                           
                            break;
                        case "interlocuteur":
                            $m->addInter(["nom" => $infos["nom"],
                            "prenom" => $infos["prenom"],
                            "mail" => $infos["mail"],
                            "motDePasse" => $infos["motDePasse"],
                            "telephone" => $infos["telephone"]]);
                            break;
                        case "client":
                            $m->addClient(["nom" => $infos["nom"],
                            "telephone" => $infos["telephone"]]);
                            break;
                    }   
                }
            
    
            header("Location: index.php?controller=admin");
        }
       
}
 public function action_update_interlocuteur()
{
    $m = Model::getModel();

    if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) &&
        isset($_POST["telephone"])) {
        

        $nomInter=$_POST['nom'];
        $prenomInter=$_POST['prenom'];

        $nouveauNomInter = $_POST['newnom'];
        $nouveaupreNomInter = $_POST['newprenom'];
        
        $mail=$_POST['mail'];
        $tel=$_POST['telephone'];

        $inf_id = ['nom' => $nomInter,'prenom' =>$prenomInter];

        $idInter = $m->getIdInter($inf_id);
        $data['id_personne']=$idInter;
             $inf=['nom' => $nouveauNomInter,'prenom' =>$nouveaupreNomInter,'mail'=>$mail,'telephone'=>$tel];
        $m->updateInterCommercial($idInter, $inf);

            echo $idInter['id_personne'];
        header("Location: index.php?controller=admin");
    }

}
    }
  
