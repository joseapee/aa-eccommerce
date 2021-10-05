<?php namespace App\Models;

use CodeIgniter\Model;

class CurrencyModel extends Model
{
    protected $table      = 'currency_table';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'rate', 'code', 'symbol', 'base', 'created_at', 'updated_at', 'deleted'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}