<?php
session_start();
class Controller_login extends Controller
{
    
    public function action_login(){

        // On récupère le modèle
        $m = Model::getModel();
        $data = [];

        if (isset($_POST['username']) && isset($_POST['password']) ){
                $usr_saisi = e($_POST['username']);
                $data = [
                    //On récupère le mot de passe saisi
                    "log" => $m-> loginP($usr_saisi),
                    
                ];
            }
            $this->render("login", $data);
    } 


    public function action_default()
    {
        $this->action_login();
    }

    public function action_affiche()
    {
        $m = Model::getModel();
    
        // Vérifie si la connexion est réussie
        if ($m->verifmdp()) {

            $_SESSION['username'] = $_POST['username'];
            header("Location: index.php?controller=tb&action=tb");
        
        } else {
            // Redirige vers la page de connexion en cas d'échec de la connexion

            header("Location: index.php?controller=login&action=login");
            exit;            
            
        }
    }
}



