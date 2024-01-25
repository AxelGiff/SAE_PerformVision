<?php
session_start();

class Controller_bdl extends Controller 
{
    public function action_bdl()
    {
        $m = Model::getModel();
        $role = $m->getrole();
        $data = [];

        switch ($role) {
            case 'gestionnaire':
            case 'admin':
                $data = [
                    "bdl" => $m->getPrestaBDL(),
                    "role" => $role,
                    "nom" => $m->getnom(),
                ];
                break;

            case 'commercial':
                $data = [
                    "bdl" => $m->getPrestaBDLComm(),
                    "role" => $role,
                    "nom" => $m->getnom(),
                ];
                break;

            case 'prestataire':
                $data = [
                    "bdl" => $m->BDLPresta(),
                    "role" => $role,
                    "nom" => $m->getnom(),
                    "clients" => $m->getCompPresta(),

                ];
                break;

            case 'interlocuteur':
                $data = [
                    "bdl" => $m->getBDLComp(),
                    "role" => $role,
                    "nom" => $m->getnom(),

                  ];
                break;

            default:
                $data = [
                    "role" => $role,
                    "nom" => $m->getnom(),
                ];
                break;
        }

        $this->render("bdl", $data);
    }

    public function action_default()
    {
        $this->action_bdl();
    }
}