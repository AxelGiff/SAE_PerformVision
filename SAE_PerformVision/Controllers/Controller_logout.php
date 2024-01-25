<?php

class Controller_logout extends Controller{


    public function action_logout(){
        $m = Model::getModel();
        $data = [];

        $this->render("logout", $data);

    }



    public function action_default(){
        $this->action_logout();
    }

}




?>