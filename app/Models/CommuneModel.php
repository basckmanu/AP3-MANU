<?php

namespace App\Models;

use CodeIgniter\Model;

class CommuneModel extends Model
{
    protected $table            = 'commune';
    protected $primaryKey       = 'IDCOMMUNE';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nom',
        'departement'
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

    public function deleteCommune($IDCOMMUNE){
        $this->where('commune.IDCOMMUNE ', $IDCOMMUNE)
        ->delete();
    }

    public function findCommune()
    {
        return $this
            ->select('commune.IDCOMMUNE, commune.NOM, commune.DEPARTEMENT')
            ->findAll();
    }

    public function findCommuneNomAndDepart($IDCOMMUNE)
    {
        return $this
            ->select('commune.NOM, commune.DEPARTEMENT')
            ->where('commune.IDCOMMUNE = ', $IDCOMMUNE)
            ->findAll();
    }
}
