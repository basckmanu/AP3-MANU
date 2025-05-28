<?php

namespace App\Controllers;

use App\Models\MessageModel;
use App\Models\CommuneModel;

class Message extends BaseController
{
    private $messageModel;
    private $communeModel;

    public function __construct()
    {
        $this->messageModel = model('MessageModel');
        $this->communeModel = model('CommuneModel');
    }

    // Afficher tous les messages
    public function index(): string
    {
        $user = auth()->user();
        $filtreNonExpire = $this->request->getGet('non_expire');

        // Si l'utilisateur n'est pas admin, on filtre par sa commune
        if (!$user->inGroup('admin')) {
            $userId = $user->IDCOMMUNE;

            if ($filtreNonExpire) {
                // Récupérer les messages non expirés 
                $listeMessages = $this->messageModel
                    ->where('IDCOMMUNE', $userId)
                    ->groupStart()
                    ->where('EXPIRATION', null)
                    ->orWhere('EXPIRATION >', date('Y-m-d H:i:s'))
                    ->groupEnd()
                    ->findAll();
            } else {
                // Récupérer tous les messages de sa commune
                $listeMessages = $this->messageModel->getAllMessageByCommune($userId);
            }

            return view('messages/gestion_message', ['messages' => $listeMessages]);
        }

        // on récupère tous les messages (filtrés ou non selon la requête)
        if ($filtreNonExpire) {
            $messages = $this->messageModel
                ->groupStart()
                ->where('EXPIRATION', null)
                ->orWhere('EXPIRATION >', date('Y-m-d H:i:s'))
                ->groupEnd()
                ->findAll();
        } else {
            $messages = $this->messageModel->findAll();
        }

        return view('messages/gestion_message', ['messages' => $messages]);
    }



    // Afficher le formulaire pour ajouter un message
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


            return view('messages/ajout_message', [
                'communeId' => $userId,
                'nomCommune' => $communeNom,
                'deptNum' => $deptNum
            ]);
        } else {

            $communes = $this->communeModel->findAll();
            // dd($communes);

            return view('messages/ajout_message', [
                'listeCommunes' => $communes
            ]);
        }
    }

    // Créer un nouveau message
    public function create()
    {
        $message = $this->request->getPost();

        // Vérifier si une date d'expiration est fournie et si elle est déjà passée
        if (!empty($message['EXPIRATION']) && strtotime($message['EXPIRATION']) < time()) {
            // Redirection vers le formulaire avec message d'erreur et anciennes données conservées
            return redirect()->back()->withInput()->with('error', 'La date d\'expiration ne peut pas être déjà passée.');
        }

        // Insérer le message dans la base de données
        $this->messageModel->insert($message);

        // Rediriger vers la liste des messages
        return redirect('message');
    }


    // Afficher le formulaire pour modifier un message
    public function modif($id): string
    {
        $message = $this->messageModel->find($id);
        return view('messages/modifier_message', [
            'message' => $message,
            'listeCommune' => $this->communeModel->findAll()
        ]);
    }

    // Mettre à jour un message
    public function update()
    {
        $messageData = $this->request->getPost();
        $this->messageModel->save($messageData);  // Sauvegarde directement les données envoyées
        return redirect('message');
    }

    // Supprimer un message
    public function delete()
    {
        $this->messageModel->delete($this->request->getPost('IDMESSAGE'));  // Suppression du message avec l'ID via POST
        return redirect('message');
    }

    // Afficher les détails d'un message
    public function view($id): string
    {
        $message = $this->messageModel->find($id);
        return view('messages/view_message', [
            'message' => $message
        ]);
    }
}
