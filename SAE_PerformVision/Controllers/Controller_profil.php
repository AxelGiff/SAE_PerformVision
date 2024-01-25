<?php
session_start();

class Controller_profil extends Controller
{
    public function action_profil(){

        // On récupère le modèle
        $m = Model::getModel();
        $data = [ "role" => $m->getrole(),
        "nom" =>$m->getnom(),
    ];

       
            
            $this->render("profil", $data);
    }


    public function action_default()
    {
        $this->action_profil();
    }
    public function action_update()
    {
        $m = Model::getModel();
    
        $error = "";
    
        if (isset($_POST['nom'], $_POST['prenom'], $_POST['password'], $_POST['password_confirm'])) {
            // Validation du mot de passe
            if ($_POST['password'] === $_POST['password_confirm']) {

                $idPersonne = $m->getId();
    
                $infos = [
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'motDePasse' => $_POST['password'],
                ];
    
                    $updated = $m->updatePersonne($idPersonne, $infos);
    
                    if ($updated) {
                        header('Location: ?controller=profil&action=profil');
                        exit;
                    } else {
                        $error = "Erreur lors de la mise à jour du profil.";
                    }
                } else {
                    $error = "Les mots de passe ne correspondent pas.";
                }
            } 
    
        $data = [
            'error' => $error,
        ];
    
        $this->render("profil", $data);
    }
 
}



