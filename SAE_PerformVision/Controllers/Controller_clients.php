<?php
session_start();

class Controller_clients extends Controller 
{

    
    public function action_client()
    {
        $m = Model::getModel();
        $role = $m->getrole();
        
        $data = [
            "role" => $role,
            "nom" => $m->getnom(),
        ];

        switch ($role) {
            case 'admin':
                $data["clients"] = $m->getClient();
                $data["commerciaux"] = $m->getcommerciaux();

                break;
                case 'gestionnaire':
                    $data["clients"] = $m->getAllPrestaAClient();
                                    $data["commerciaux"] = $m->getcommerciaux();

                    break;
                    

            case 'commercial':
                $data["clients"] = $m->getAllCommercial(); 
                break; 

            case 'prestataire':
                $data["clients"] = $m->getCompPresta();
                break;

            case 'interlocuteur':
                $data["clients"] = $m->getPrestaC();
                $data["bdl"]=$m->getBDLComp();
                break;
        }

        $this->render("clients", $data);
    }


    public function action_addClient(){
        if (isset($_POST["nomclient"]) && isset($_POST["telclient"]) ) {

        $m = Model::getModel();

        $isaisi = ['nomclient', 'telclient'];

        $infos = [];

        foreach ($isaisi as $i) {
            if (isset($_POST[$i])) {
                $infos[$i] = $_POST[$i];
            } else {
                $infos[$i] = null;
            }
        }
        $m->addClient([
            "nomclient" => $infos["nomclient"],
            "telclient" => $infos["telclient"],
        ]);
        header("Location: index.php?controller=clients&action=pagination");
    }
}

public function action_update()
{
    $m = Model::getModel();

    $error = "";
    
   
    if (isset($_POST['nomclient'], $_POST['telclient'])) {
        $ancienNomClient = $_POST['nomclient'];
        $nouveauNomClient = $_POST['nomclientedit'];
        $telClient = $_POST['telclient'];
        $composantes = $_POST['composantes'];
        $idClient = $m->getIdClient($ancienNomClient);
        $numero_rue = $_POST['numero_rue'];
        $rue = $_POST['rue'];
        $ville = $_POST['ville'];
        $cp= $_POST['cp'];
        $commercialIds = $_POST['commerciaux']; // Si le formulaire envoie un tableau de commerciaux
      echo $idClient['id_client'];
        $m->creerTypeVoie();

        $localiteInfos = [
            'ville' => $ville,
            'cp' => $cp,
            'id'=>$m->getIdMaxLocalite(),
        ];

        $m->creerLocalite($localiteInfos);

        $adresseInfos = [
            'numero' => $numero_rue,
            'nomVoie' => $rue,
            'idLocalite' => $localiteInfos['id'],
            'id_adresse' => $m->getIdMaxAdresse(),
            'id' => $m->getIdMaxTypeVoie() - 1,
        ];
        $m->creerAdresse($adresseInfos);
        $idAdresse = $adresseInfos['id_adresse'];

        $id_composante = $m->getIdMaxComp(); // Assurez-vous de récupérer correctement l'ID max de composante ici
        $composanteInfos = [
            'id_composante' => $id_composante,
            'nomComposante' => $composantes,
            'id_client' => $idClient['id_client'],
            'id_adresse' => $idAdresse,
        ];
        $m->creerComposante($composanteInfos);
        
        // Étape 4 : Affecter la composante au(x) commercial(aux)
        foreach ($commercialIds as $commercialId) {
            $affectationInfos = [
                'id_personne' => $commercialId,
                'id_composante' => $id_composante, // Utilisez l'ID de la composante que vous venez de créer
            ];
            $m->affecteComposanteCommercial($affectationInfos);
        }


        $infos = [
            'nomclient' => $nouveauNomClient,
            'telclient' => $telClient,
            'id_client' => $idClient['id_client'],
        ];
            $data['idClient'] = $idClient;

            $updated = $m->updateClient($data['idClient'],$infos);

                if ($updated) {
                    header('Location: ?controller=clients&action=pagination');
                    exit;
                } else {
                    $error = "Erreur lors de la mise à jour du profil.";
                }
           
    }

    $data = [
        'error' => $error,
    ];

    $this->render("clients", $data);

}

    public function action_default()
    {
        $this->action_client();
    }
}
?>