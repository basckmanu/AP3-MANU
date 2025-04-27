<?php

namespace App\Models;

use CodeIgniter\Model;

class PanneauModel extends Model
{
    protected $table            = 'panneau';
    protected $primaryKey       = 'IDPANNEAU';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'REFERENCE',
        'LATITUDE',
        'LONGITUDE',
        'IDCOMMUNE',
        'NOM',
        'DEPARTEMENT'
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


    public function findPanneaux()
    {
        return $this
            ->select('panneau.IDPANNEAU, panneau.REFERENCE, panneau.LATITUDE, panneau.LONGITUDE')
            ->findAll();
    }

    public function findJoinAll()
    {
        return $this
            ->select('panneau.IDPANNEAU, panneau.REFERENCE, panneau.LATITUDE, panneau.LONGITUDE, commune.IDCOMMUNE, commune.NOM, commune.DEPARTEMENT')
            ->join('commune', 'commune.IDCOMMUNE = panneau.IDCOMMUNE')
            ->findAll();
    }

    public function getAllPanneauByCommune($IDCOMMUNE)
    {
        return $this
            ->select('panneau.IDPANNEAU, panneau.REFERENCE, panneau.LATITUDE, panneau.LONGITUDE, commune.IDCOMMUNE, commune.NOM, commune.DEPARTEMENT')
            ->join('commune', 'commune.IDCOMMUNE = panneau.IDCOMMUNE')
            ->where('panneau.IDCOMMUNE = ', $IDCOMMUNE)
            ->find();
    }
    
    public function deletePanneau($IDCOMMUNE)
    {
        $this->where('panneau.IDCOMMUNE', $IDCOMMUNE)
            ->delete();
    }
}
