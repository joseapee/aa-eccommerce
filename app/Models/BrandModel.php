<?php namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table      = 'pj_brands';
    protected $primaryKey = 'id';

//     protected $returnType     = 'array';
//     protected $useSoftDeletes = true;

    protected $allowedFields = ['brand_name', 'image', 'sort'];



}