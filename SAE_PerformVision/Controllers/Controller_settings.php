<?php
session_start();

class Controller_settings extends Controller{

    public function action_settings(){

        $m = Model::getModel();
        $data = [
            "role" => $m->getrole(),
            "nom" =>$m->getnom(),
        ];

        $this->render("settings", $data);


    }

    public function action_default(){
        $this->action_settings();
    }

}



?>
