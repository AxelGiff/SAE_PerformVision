<?php
session_start();

class Controller_avatar extends Controller
{
    public function action_avatar(){

        // On récupère le modèle
        $m = Model::getModel();
        $data = [ "role" => $m->getrole()];

       
            
            $this->render("avatar", $data);
    }


    public function action_default()
    {
        $this->action_avatar();
    }

 
}



