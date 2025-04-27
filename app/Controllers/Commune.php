<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Commune extends BaseController
{

    private $communeModel;
    private $userModel;
    private $panneauModel;
    private $messageModel;

    public function __construct()
    {
        $this->communeModel = model('CommuneModel');
        $this->userModel = model('UserModel');
        $this->panneauModel = model('PanneauModel');
        $this->messageModel = model('MessageModel');
    }

    //----------------------------------------------------------------------------------------------------------------------------------------//

    public function clients() //get
    {
        $user = auth()->user();
        if (! $user->inGroup('admin')) {
            return redirect('index');
        }
        $communes = $this->communeModel->findAll();

        return view('communes/gestion_clients', [
            'listeCommune' => $communes
        ]);
    }
    //----------------------------------------------------------------------------------------------------------------------------------------//
    public function ajout() //get
    {
        $user = auth()->user();
        if (! $user->inGroup('admin')) {
            return redirect('index');
        }
        $communes = $this->communeModel->findAll();
        return view('communes/ajout_commune', [
            'listeCommune' => $communes
        ]);
    }
    public function create() //post
    {
        $commune = $this->request->getPost();
        $this->communeModel->insert($commune);

        return redirect('clients');
    }
    //----------------------------------------------------------------------------------------------------------------------------------------//
    public function modif($IDCOMMUNE) //get
    {
        $user = auth()->user();
        if (! $user->inGroup('admin')) {
            return redirect('index');
        }
        $communes = $this->communeModel->find($IDCOMMUNE);

        return view('communes/modifier_commune', [
            'commune' => $communes
        ]);
    }
    public function update() //post
    {
        $commune = $this->request->getPost();
        //         var_dump($commune);
        // die();  
        $this->communeModel->save($commune);

        return redirect('clients');
    }
    //----------------------------------------------------------------------------------------------------------------------------------------//
    public function delete() //post
    {
        $IDCOMMUNE = $this->request->getPost('IDCOMMUNE');
        $idUser = $this->userModel->getAllByIdCommune($IDCOMMUNE);

        // var_dump($IDCOMMUNE);
        // var_dump($idUser);
        // die();

        if (!empty($idUser)) {
            $this->userModel->deleteAuthIdentities($idUser[0]->id);
            $this->userModel->deleteAuthPermissionsUsers($idUser[0]->id);
            $this->userModel->deleteAuthGroupsUsers($idUser[0]->id);
            $this->userModel->deleteAuthRememberTokens($idUser[0]->id);
        }

        $this->userModel->deleteUsers($IDCOMMUNE);
        $this->messageModel->deleteMessage($IDCOMMUNE);
        $this->panneauModel->deletePanneau($IDCOMMUNE);
        $this->communeModel->deleteCommune($IDCOMMUNE);
        
        return redirect('clients');
    }
}
