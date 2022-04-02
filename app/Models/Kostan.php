<?php

namespace App\Models;

use CodeIgniter\Model;

class Kostan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kostan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["nama","alamat","fitur","sisa_kamar","harga",'banyak_kamar'];

    // Dates
    protected $useTimestamps = true;
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

    public function search($keyword, $jumlah)
    {
        $builder = $this->table("kostan");
        $builder->orLike("nama", $keyword)->limit($jumlah, 0);
        $builder->orLike("alamat", $keyword)->limit($jumlah, 0);
        return $builder;
    }
}
