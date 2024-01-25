<?php
session_start();


class Controller_calendar extends Controller{
    public function action_affiche(){
        $m = Model::getModel();
        
        // Récupérer id_composante depuis l'URL
        $id_composante = isset($_GET['id_composante']) ? $_GET['id_composante'] : null;
        $id_interlocuteur = $m->getCompInter(["id_composante" => $id_composante]);
        $id_gestionnaire = $m->getIdGestBDL0(["id_composante" => $id_composante]);
        $id_prestataire = $m->getId();
        $mois_url = isset($_GET['mois']) ? $_GET['mois'] : null;
        $_SESSION['id_composante'] = $id_composante;
        $data=[];
        $data["mois"] = $mois_url;
        $role = $m->getrole();

     


    
       
        switch ($role) {
            case 'gestionnaire':
            case 'admin':
                $id_presta = $m->getIdPrestataire(["mois" => $mois_url, "id_composante" => $id_composante]);
                $infos_val=["id_prestataire"=>$id_presta,"id_gestionnaire" => $id_gestionnaire[0]['pp'],"id_composante"=>$id_composante,"id_interlocuteur"=> $id_interlocuteur[0]['po'],"mois" => $mois_url];

                $data = [
                    "role" => $role,
                    "nom" => $m->getnom(),
                     "bdl"=>$m->getBDLagci(['id_prestataire'=>$id_presta,'id_composante'=>$id_composante]),
                     "periodes" => $m->getallperiodes(['id_prestataire' => $id_presta, 'id_composante' => $id_composante]),

 
                ];
                break;

            case 'commercial':
                $id_presta = $m->getIdPrestataire(["mois" => $mois_url, "id_composante" => $id_composante]);
                $infos_val=["id_prestataire"=>$id_presta,"id_gestionnaire" => $id_gestionnaire[0]['pp'],"id_composante"=>$id_composante,"id_interlocuteur"=> $id_interlocuteur[0]['po'],"mois" => $mois_url];

                $data = [
                    "role" => $role,
                    "nom" => $m->getnom(),
                    "bdl"=>$m->getBDLagci(['id_prestataire'=>$id_presta,'id_composante'=>$id_composante]),
                    "periodes" => $m->getallperiodes(['id_prestataire' => $id_presta, 'id_composante' => $id_composante]),


                ];
                break;

            case 'prestataire':

                $data = [
                    "role" => $m->getrole(),
                    "nom" =>$m->getnom(),
                    "periodes" => $m->getallperiodes(['id_prestataire' => $id_prestataire, 'id_composante' => $id_composante]),
                    "bdl"=>$m->getBDL(['id_prestataire'=>$id_prestataire,'id_composante'=>$id_composante]),
          
             
                ];
                break;

            case 'interlocuteur':
                $id_presta = $m->getIdPrestataire(["mois" => $mois_url, "id_composante" => $id_composante]);
                $infos_val=["id_prestataire"=>$id_presta,"id_gestionnaire" => $id_gestionnaire[0]['pp'],"id_composante"=>$id_composante,"id_interlocuteur"=> $id_interlocuteur[0]['po'],"mois" => $mois_url];

                $data = [
                    "role" => $role,
                    "nom" => $m->getnom(),
                     "bdl"=>$m->getBDLagci(['id_prestataire'=>$id_presta,'id_composante'=>$id_composante]),
                     "periodes" => $m->getallperiodes(['id_prestataire' => $id_presta, 'id_composante' => $id_composante]),


                 ];
                 $m->valideInter($infos_val);

                break;

            default:
                // Gestion des rôles inconnus
                $data = [
                    "role" => $role,
                    "nom" => $m->getnom(),

                ];
                break;
        }
      
        $this->render("calendar", $data);
    }
    public function action_default()
    {
        $this->action_affiche();
    }

    public function action_add(){
        $m = Model::getModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            $jour=$_POST['jour'];
            $mois = sprintf("%02d", $_POST['mois']);
            $annee=$_POST['annee'];
            $date=$annee."-".$mois."-".$jour;
            $id_composante = isset($_SESSION['id_composante']) ? $_SESSION['id_composante'] : null;
            $id_rec=$id_composante;
            $id_prestataire = $m->getId();
            $tab=$m->getNomPrest([ "id_personne" => $id_prestataire]);
            $id_commercial = $m->getCompCom(["id_composante" => $id_composante]);            
            $id_interlocuteur = $m->getCompInter(["id_composante" => $id_composante]);
            $id_gestionnaire = $m->getIdGestBDL0(["id_composante" => $id_composante]);
            $matinChecked = isset($_POST['matin']) ? 1 : 0; // Si coché, la valeur est 1, sinon 0
            $heure_depart = isset($_POST['heure_arrivee']) ? $_POST['heure_arrivee'] : '';
            $heure_arrivee = isset($_POST['heure_depart']) ? $_POST['heure_depart'] : '';        
            $periode = $m->getallperiodes(['id_prestataire' => $id_prestataire, 'id_composante' => $id_composante]); // la liste des periodes que le presta a le droit
        
            echo $periode[0]['typeemission'];

            $numero = $m->getIdMaxNumero();


            $BDLP = $m->getBDL(["id_personne_1" => $m->getId()]);



            $infos = [
                "id_personne_1" => $id_prestataire,
                "id_personne_2" => $id_interlocuteur[0]['po'],
                "id_personne" => $id_gestionnaire[0]['pp'],
                "id_prestataire" =>$m->getId(),
                "id_composante" => $id_rec,

                "id_gestionnaire" => $id_gestionnaire[0]['pp'],

                "id_commercial" => $id_commercial[0]['p'],
                "id_interlocuteur" => $id_interlocuteur[0]['po'],

                "annee" => $_POST["annee"],
                "mois" => $date,
                "jourDuMois" =>$jour,
                "commentaire" => $_POST["commentaire"],
                "signatureInterlocuteur" => "",
                "signaturePrestataire" =>"",
                "nom"=>$tab[0]['nom'],
                "prenom"=>$tab[0]['prenom'],
                "statut" => 'En cours',
                "Numero" => $numero,
                "heure_arrivee" => $heure_arrivee,
               "heure_depart" => $heure_depart,
               "id_type"=>$matinChecked,
        ];

        $t =  $m->issetBDL($infos);

        if ($t[0]['exists'] == false){
            $m->creerBDL($infos);
        }
        echo json_encode(['commentaire' => $infos["commentaire"]]); 
        $_SESSION['bdl_infos'] = $infos;

            switch($periode[0]['typeemission']){

                case "Journee": 
                    $m->creerPeriode($infos);
                    $m->creerjournee($infos);
                    break;


                case "Demijournee": // pareil


                    $m->creerPeriode($infos);
                    $m->creerdemijournee($infos);
                    break;
                case "Creneau": //same
                    $m->creerPeriode($infos);
                    $m->creercreneau($infos);
                    break;

            }
            header("Location: index.php?controller=calendar&action=affiche&id_composante=$id_rec");



} 
}

public function action_valid(){
    
    header("Location: index.php?controller=bdl&action=affiche");

}
}
?>
