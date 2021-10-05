<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'pj_products';
    protected $primaryKey = 'id';

    // protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $dateFormat  = 'int';

    protected $allowedFields = ['name', 'price', 'quantity', 'color', 'description', 'sku', 'gender', 'stock_status', 'status', 'discount', 'weight', 'brand_id', 'category_id', 'product_type', 'created_at', 'deleted', 'deleted_at', 'updated_at', 'meta_tag_title', 'meta_tag_keywords', 'meta_tag_description'];

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted';




    public function saveToTable($table, $data){
        $builder = $this->db->table($table);
        $builder->insert($data);
        $lastInsertId = $this->db->insertID();
        return $lastInsertId;
    }  


    public function fetchProducts()
    {

        $builder = $this->db->table('pj_products');
        $query = $builder->get();
        $results = $query->getResultArray();

        foreach ($results as $key => $result) {

            $builder = $this->db->table('pj_product_image');
            $builder->select('image,main');
            $builder->where('product_id', $result['id']);
            $query = $builder->get();
            $images = $query->getResultArray();

            $results[$key]['images'] = $images;
            $results[$key]['main_image'] = '';
            foreach ($images as $image) {
                if ($image['main'] == 1) {
                    $results[$key]['main_image'] = $image['image'];
                }
            }
            

        }

        foreach ($results as $key => $result) {

            $builder = $this->db->table('pj_product_size');
            $builder->select('size');
            $builder->where('product_id', $result['id']);
            $query = $builder->get();
            $size = $query->getResultArray();
            $results[$key]['sizes'] = $size;

        }

        return $results;
    } 


    public function fetchProductById($id)
    {
        // $sql = "SELECT p.*, GROUP_CONCAT(i.image ORDER BY i.image) AS images, GROUP_CONCAT(s.size ORDER BY s.size) AS sizes FROM pj_products p LEFT JOIN pj_product_image i ON p.id = i.product_id LEFT JOIN pj_product_size s ON p.id = s.product_id WHERE p.id = 2 GROUP BY p.id";
        
        $builder = $this->db->table('pj_products');
        $builder->where('id', $id);
        $query = $builder->get();
        $result = $query->getRowArray();

        $builder = $this->db->table('pj_product_image');
        $builder->select('id,image,main');
        $builder->where('product_id', $result['id']);
        $query = $builder->get();
        $images = $query->getResultArray();
        $result['images'] = $images;

        $builder = $this->db->table('pj_product_size');
        $builder->select('id,size');
        $builder->where('product_id', $result['id']);
        $query = $builder->get();
        $size = $query->getResultArray();
        $result['sizes'] = $size;

        $builder = $this->db->table('pj_product_color');
        $builder->select('id,color');
        $builder->where('product_id', $result['id']);
        $query = $builder->get();
        $colors = $query->getResultArray();
        $result['colors'] = $colors;

        return $result;

    }  //edit function end



    // public function featuredProducts(){
    //     $builder = $this->db->table('pj_products');
    //     $builder-
    // }

    // public function getSearchResults($data)
    // {

    // 	$builder = $this->db->table('houses');
    // 	$builder->select('*');
    // 	$builder->where('publishstatus',1);
    // 	if(empty($data['houseID']))
    // 	{
	//     	$builder->orLike($data);
	//     }
	//     else{
	//     	$builder->where('houseID', $data['houseID']);
	//     }
    // 	$query = $builder->get();
    //     $result = $query->getResultArray(); 

    //     if(!empty($result)) {
    // 		return $result;
    // 	}
    // 	else{
    // 		return null;
    // 	}
    // 	// exit();

    // }

}