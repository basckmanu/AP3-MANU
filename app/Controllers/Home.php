<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;
use App\Models\CommuneModel;

class Home extends BaseController
{
    private $userModel;
    private $communeModel;

    public function __construct()
    {
        $this->userModel = new UtilisateurModel;
        $this->communeModel = new CommuneModel;

    }

    public function index(): string
    {
        return view('welcome_message');
    }

    public function connexion(): string
    {
        return view('connexion');
    }

    public function utilisateur(): string
    {
        return view('utilisateurs/gestion_utilisateur');
        
    }
    public function clients(): string
    {
        return view('communes/gestion_clients');
        
    }

}
