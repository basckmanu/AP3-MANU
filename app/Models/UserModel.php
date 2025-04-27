<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{

    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields,
            'IDCOMMUNE',

        ];
    }

    public function getAll() //pour index utilisateur
    {
        return $this->select('commune.NOM, commune.DEPARTEMENT, auth_identities.secret AS user_mail, users.id')
            ->join('auth_identities', 'users.id = auth_identities.user_id')
            ->join('auth_groups_users', 'users.id = auth_groups_users.user_id AND auth_groups_users.group <> "admin"')
            ->join('commune', 'users.IDCOMMUNE = commune.IDCOMMUNE')
            ->findAll();
    }

    public function getById($userId) //pour modif
    {
        return $this->select('users.id, users.IDCOMMUNE, users.username, auth_identities.secret AS user_mail, auth_identities.secret2 as passwd')
        ->join('auth_identities', 'users.id = auth_identities.user_id')
        ->join('auth_groups_users', 'users.id = auth_groups_users.user_id AND auth_groups_users.group <> "admin"')
        ->join('commune', 'users.IDCOMMUNE = commune.IDCOMMUNE')
        ->where('users.id = '. $userId)
        ->find($userId);
    }

    public function getCommuneDefault($userId) //aussi pour modif car besoin de l'idcommune
    {
        return $this->select('*')
        ->join('commune', 'commune.IDCOMMUNE = users.IDCOMMUNE')
        ->where('users.id = ' .$userId)
        ->find();
    }

    public function getIdUser($IDCOMMUNE){
        return $this->select('*')
        ->where('users.IDCOMMUNE', $IDCOMMUNE);
        
    }

    public function getAllByIdCommune($IDCOMMUNE) //pour index utilisateur
    {
        return $this->select('commune.NOM, commune.DEPARTEMENT, auth_identities.secret AS user_mail, users.id, users.IDCOMMUNE')
            ->join('auth_identities', 'users.id = auth_identities.user_id')
            ->join('auth_groups_users', 'users.id = auth_groups_users.user_id AND auth_groups_users.group <> "admin"')
            ->join('commune', 'users.IDCOMMUNE = commune.IDCOMMUNE')
            ->where('users.IDCOMMUNE', $IDCOMMUNE)
            ->findAll();
    }

    public function deleteAuthIdentities($idUser){
        $db = \Config\Database::Connect();
        $builder = $db->table('auth_identities');
        $builder->where('auth_identities.user_id', $idUser);
        $builder->delete();
    }

    public function deleteAuthPermissionsUsers($idUser){
        $db = \Config\Database::Connect();
        $builder = $db->table('auth_permissions_users');
        $builder->where('auth_permissions_users.user_id', $idUser);
        $builder->delete();
    }
    
    public function deleteAuthGroupsUsers($idUser){
        $db = \Config\Database::Connect();
        $builder = $db->table('auth_groups_users');
        $builder->where('auth_groups_users.user_id', $idUser);
        $builder->delete();
    }
    
    public function deleteAuthRememberTokens($idUser){
        $db = \Config\Database::Connect();
        $builder = $db->table('auth_remember_tokens');
        $builder->where('auth_remember_tokens.user_id', $idUser);
        $builder->delete();
    }

    public function deleteUsers($IDCOMMUNE){
        $db = \Config\Database::Connect();
        $builder = $db->table('users');
        $builder->where('users.IDCOMMUNE', $IDCOMMUNE);
        $builder->delete();
    }
}
