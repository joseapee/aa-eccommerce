<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'pj_categories';
    protected $primaryKey = 'id';

//     protected $returnType     = 'array';
//     protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'description', 'parent_id', 'parent_name', 'image', 'deleted', 'deleted_at', 'created_at', 'meta_tag_title', 'meta_tag_description', 'meta_tag_keywords'];



}