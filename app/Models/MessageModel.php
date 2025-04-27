<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table            = 'message';
    protected $primaryKey       = 'IDMESSAGE';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['IDCOMMUNE', 'ETAT', 'TEXTE', 'COULEUR', 'TAILLE'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function findJoinAll()
    {
        return $this
            ->select('message.IDMESSAGE, message.IDCOMMUNE, message.ETAT, message.TEXTE, message.COULEUR, message.TAILLE, 
        panneau.IDPANNEAU, panneau.REFERENCE')
            ->join('commune', 'commune.IDCOMMUNE = message.IDCOMMUNE')
            ->join('panneau', 'commune.IDCOMMUNE = panneau.IDCOMMUNE')
            ->findAll();
    }

    public function getAllMessageByCommune($IDCOMMUNE)
    {
        return $this->select('message.IDMESSAGE, message.IDCOMMUNE, message.ETAT, message.TEXTE, message.COULEUR, message.TAILLE, 
        panneau.IDPANNEAU')
            ->join('commune', 'commune.IDCOMMUNE = message.IDCOMMUNE')
            ->join('panneau', 'commune.IDCOMMUNE = panneau.IDCOMMUNE')
            ->where('message.IDCOMMUNE = ', $IDCOMMUNE)
            ->findAll();
    }

    public function deleteMessage($IDCOMMUNE)
    {
        $this->where('message.IDCOMMUNE', $IDCOMMUNE)
            ->delete();
    }
}
