<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;
use App\Models\CommuneModel;
use CodeIgniter\Shield\Entities\User;

class Utilisateur extends BaseController
{
    private $userModel;
    private $communeModel;

    public function __construct()
    {
        $this->userModel = model('UserModel');
        $this->communeModel = model('CommuneModel');
    }

    public function index()
    {
        $user = auth()->user();
        if (! $user->inGroup('admin')) {
            return redirect('index');
        }
        // $user = $this->userModel->findJoinAll();
        $users = $this->userModel->getAll();

        // // Get the User Provider (UserModel by default)
        // $users = auth()->getProvider();

        // // Find by the user_id
        // $user = $users->findAll();
        // var_dump($users);
        // die();

        return view('utilisateurs/gestion_utilisateur', [
            'listeUtilisateur' => $users
        ]);
    }

    public function ajout()
    {
        $user = auth()->user();
        if (! $user->inGroup('admin')) {
            return redirect('index');
        }
        $commune = $this->communeModel->findAll();
        return view('utilisateurs/ajout_utilisateur', [
            'listeUtilisateur' => $commune
        ]);
    }

    public function create()
    {
        // $userData = $this->request->getPost();
        // // var_dump($userData);
        // // die();
        // $this->userModel->save($userData);


        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $user = new User([
            'username' => $this->request->getPost('IDENTIFIANT'),
            'email'    => $this->request->getPost('MAIL'),
            'password' => $this->request->getPost('MOTDEPASSE'),
            'IDCOMMUNE' => $this->request->getPost('IDCOMMUNE'),
        ]);
        // var_dump($userData);
        // die();
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $userId = $users->findById($users->getInsertID());

        // Add to default group
        $users->addToDefaultGroup($userId);

        return redirect('utilisateur');
    }

    public function modif($userId)
    {
        $user = auth()->user();
        if (! $user->inGroup('admin')) {
            return redirect('index');
        }
        $user = $this->userModel->getById($userId);
        $commune = $this->communeModel->findAll();
        $communeDefault = $this->userModel->getCommuneDefault($userId);
        // var_dump($communeDefault);
        // var_dump($users);
        // var_dump($commune);
        // die();
        return view('utilisateurs/modifier_utilisateur', [
            'utilisateurs' => $user,
            'listeCommune' => $commune,
            'commune' => $communeDefault
        ]);
    }

    public function update()
    {
        // $userData = $this->request->getPost();
        // // var_dump($userData);
        // // die();
        // $this->userModel->save($userData);
        // return redirect('utilisateur');

        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $userId = $this->request->getPost();

        // var_dump($userId);
        // die();

        $user = $users->getById($userId['IDUTILISATEUR']);
        // var_dump($this->request->getPost(['IDCOMMUNE']));
        // die();
        $userIdCommune = $this->request->getPost(['IDCOMMUNE']);
        // var_dump($userIdCommune);
        // die();
        if ($userIdCommune != 0) {
            $user->fill([
                'username' => $this->request->getPost('IDENTIFIANT'),
                'email' => $this->request->getPost('MAIL'),
                'password' => $this->request->getPost('MOTDEPASSE'),
                'IDCOMMUNE' => $this->request->getPost('IDCOMMUNE'),
            ]);
            $users->save($user);
        }
        return redirect('utilisateur');
    }

    public function delete()
    {
        $idUser = $this->request->getPost(['IDUTILISATEUR']);
        // $this->userModel->delete($userId);
        // return redirect('utilisateur');
        // var_dump($userId);
        // die();

        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $users->delete($idUser['IDUTILISATEUR'], true);
        return redirect('utilisateur');
    }
}
