<?php

namespace App\Controllers;

class Panneau extends BaseController
{

    private $panneauxModel;
    private $communeModel;

    public function __construct()
    {
        $this->panneauxModel = model('PanneauModel');
        $this->communeModel = model('CommuneModel');
    }

    public function index(): string
    {
        $user = auth()->user();
        if (! $user->inGroup('admin')) {
            $userId = $user->IDCOMMUNE;
            // dd($userId);
            $listePanneau = $this->panneauxModel->getAllPanneauByCommune($userId);
            // var_dump($user);
            // var_dump($listePanneau);
            // var_dump($panneaux);
            // die();
            return view('panneaux/gestion_panneaux', [
                'listePanneaux' => $listePanneau
            ]);
        }
        else {

        $panneaux = $this->panneauxModel->findJoinAll();

        return view('panneaux/gestion_panneaux', [
            'listePanneaux' => $panneaux
        ]);
    }
    }


    public function ajout(): string
    {
        $user = auth()->user();
        if (!$user->inGroup('admin')) {
            $userId = $user->IDCOMMUNE;
            // dd($userId);
            $communeData = $this->communeModel->findCommuneNomAndDepart($userId);
            // dd($communeData);
            $communeNom = $communeData[0]['NOM'];
            // dd($communeNom);
            $deptNum = $communeData[0]['DEPARTEMENT'];
            // dd($deptNum);


            return view('panneaux/ajout_panneaux', [
                'communeId' => $userId,
                'nomCommune' => $communeNom,
                'deptNum' => $deptNum
            ]);
        } else {
            $communes = $this->communeModel->findCommune();
            // dd($communes);
            return view('panneaux/ajout_panneaux', [
                'commune' => $communes
            ]);
        }
    }

    public function create()
    {

        $panneauAjout = $this->request->getPost();

        $this->panneauxModel->save($panneauAjout);
        return redirect('panneaux');
    }

    public function modif($idPanneau): string
    {
        $panneauId = $this->panneauxModel->find($idPanneau);
        $communes = $this->communeModel->findCommune();
        return view('panneaux/modifier_panneaux', [
            'panneau' => $panneauId,
            'commune' => $communes
        ]);
    }
    public function update()
    {
        $panneau = $this->request->getPost();
        // var_dump($panneau);
        // die();
        $this->panneauxModel->save($panneau);

        return redirect('panneaux');
    }

    public function delete()
    {
        $idPanneau = $this->request->getPost('IDPANNEAU');
        $this->panneauxModel->delete($idPanneau);
        return redirect('panneaux');
    }
}
