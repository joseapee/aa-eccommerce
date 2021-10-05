<?php namespace App\Models;

use CodeIgniter\Model;

class StateModel extends CountryModel
{
    protected $table      = 'pj_states';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name', 'country_id'];

    protected $useTimestamps = true;
    protected $dateFormat = 'int';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}