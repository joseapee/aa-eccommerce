<?php namespace App\Models;

use CodeIgniter\Model;

class ShippingModel extends Model
{
    protected $table      = 'shipping_address';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['user_id', 'firstname', 'lastname', 'email', 'phone', 'address_1', 'address_2', 'country_id', 'state_id', 'postcode','default_address', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;
    protected $dateFormat = 'int';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}