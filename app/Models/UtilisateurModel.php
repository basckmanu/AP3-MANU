<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    protected $table            = 'utilisateur';
    protected $primaryKey       = 'IDUTILISATEUR';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'IDCOMMUNE',
        'IDENTIFIANT',
        'MOTDEPASSE',
        'MAIL',
        'ROLE'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
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
            ->select('commune.IDCOMMUNE as IDCOMMUNE, commune.NOM as NOMCOMMUNE, commune.DEPARTEMENT as DEPARTEMENT, 
            utilisateur.IDUTILISATEUR, utilisateur.IDENTIFIANT, utilisateur.MAIL, utilisateur.ROLE')
            ->join('commune', 'commune.IDCOMMUNE = utilisateur.IDCOMMUNE')
            ->findAll();
    }

    // public function deleteId($userId)
    // {
    //     return $this
    //         ->delete('IDUTILISATEUR = '.$userId['IDUTILISATEUR']);
    // }
}
