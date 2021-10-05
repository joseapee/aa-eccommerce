<?php namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
    protected $table      = 'pj_countries';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['sortname', 'name', 'currency', 'shortCurrency', 'htmlCode'];

    protected $useTimestamps = true;
    // protected $dateFormat = 'int';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}