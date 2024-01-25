<?php



session_start();
class Controller_tb extends Controller{

    public function action_tb(){
        $m = Model::getModel();
        $role = $m->getrole();

        $data = [
            "role" => $m->getrole(),
            "nom" =>$m->getnom(),
            "count" => $m->countmembre(),
            "countclient" => $m->countclient(),
            "countbdl" => $m->getnbBDLValide(),
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
        $this->render("tb",$data);
    }



    public function action_default(){

        $this->action_tb();
    }

}




?>
