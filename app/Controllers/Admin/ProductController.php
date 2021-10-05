<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\View\View;
use App\Models\ProductModel;

class ProductController extends BaseController
{

    public function __construct(){
        $this->pager = \Config\Services::pager();
        $this->image = \Config\Services::image();
        $this->productModel = new ProductModel();
        $this->Category = new \App\Models\CategoryModel;
        $this->Brands = new \App\Models\BrandModel;
        helper('form');
    }


    public function index()
    {

        $products = $this->productModel->fetchProducts();
        // echo "<pre>";
        // print_r ($products);
        // echo "</pre>";

        $data = [
            'page_title'=> 'Products',
            'site_title'=> 'Products | Aisha Abubakar',
            'products'=> $products,
        ];

        return view("admin/products-view", $data);
    }

    public function renderView($page=''){

        $data = [
                'categories'=> $this->Category->findAll(),
                'brands'=> $this->Brands->findAll(),
                'page_title'=> 'New Product',
                'site_title'=> 'New Product | AA Admin',
                ];
            
            return view("admin/new-product", $data);
    }

    public function new()
    {

        if (!$this->request->getPost()) {
            return $this->renderView();
        }
        if (!$this->request->getfiles('imgs')) {
            $msg = "Please upload an image!";
            $this->session->setFlashdata('error_message', $msg);
            return $this->renderView();
        }
        // echo "<pre>";
        // print_r ($this->request->getVar());
        // echo "</pre>";
        // die();

        $data = [
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'quantity' => $this->request->getVar('quantity'),
            'description' => $this->request->getVar('description'),
            'gender' => $this->request->getVar('gender'),
            'stock_status' => $this->request->getVar('stock-status'),
            'discount' => $this->request->getVar('discount'),
            'weight' => $this->request->getVar('weight'),
            'brand_id' => $this->request->getVar('brand'),
            'category_id' => $this->request->getVar('category'),
            'product_type' => $this->request->getVar('product-type'),
            'meta_tag_title' => $this->request->getVar('meta-tag-title'),
            'meta_tag_keywords' => $this->request->getVar('meta-tag-keywords'),
            'meta_tag_description' => $this->request->getVar('meta-tag-description'),
            'created_at' => time(),
            // 'sku' => $this->request->getVar('sku'),
        ];

        $this->productModel->save($data);
        $id = $this->productModel->insertID();

        // Get product sizes if any and save
        if ($this->request->getVar('sizes')) {
            $size_data = array();
            $sizes = explode(',', $this->request->getVar('sizes'));

            foreach ($sizes as $size) {
                $data = [
                    'product_id' => $id,
                    'size' => $size,
                    ];
                $this->productModel->saveToTable('pj_product_size',$data);
            }

        }

        
        // Process and save images
        $files = $this->request->getfiles('imgs');
        $this->saveImages($files, $id);


        $msg = "Product added successfully";
        $this->session->setFlashdata('success_message', $msg);

        return $this->renderView();

    }



    public function edit($id)
    {
        if (!$this->request->getPost()) {

            $product = $this->productModel->fetchProductById($id);
            // echo "<pre>";
            // print_r ($product);
            // echo "</pre>";
            // die();
          
            $data = [
                'product'=> $product,
                'categories'=> $this->Category->findAll(),
                'brands'=> $this->Brands->findAll(),
                'page_title'=> 'Edit Product',
                'site_title'=> 'Edi Product | AA Admin',
                ];
            
            return view("admin/edit-product", $data);
        }
        // if (!$this->request->getfiles('imgs')) {
        //     $msg = "Please upload an image!";
        //     $this->session->setFlashdata('error_message', $msg);
        //     return $this->renderView();
        // }

        $data = [
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'quantity' => $this->request->getVar('quantity'),
            'description' => $this->request->getVar('description'),
            'gender' => $this->request->getVar('gender'),
            'stock_status' => $this->request->getVar('stock-status'),
            'discount' => $this->request->getVar('discount'),
            'weight' => $this->request->getVar('weight'),
            'brand_id' => $this->request->getVar('brand'),
            'category_id' => $this->request->getVar('category'),
            'product_type' => $this->request->getVar('product-type'),
            'meta_tag_title' => $this->request->getVar('meta-tag-title'),
            'meta_tag_keywords' => $this->request->getVar('meta-tag-keywords'),
            'meta_tag_description' => $this->request->getVar('meta-tag-description'),
            'created_at' => time(),
            // 'sku' => $this->request->getVar('sku'),
        ];

        $this->productModel->save($data);
        $id = $this->productModel->insertID();

        // Get product sizes if any and save
        if ($this->request->getVar('sizes')) {
            $size_data = array();
            $sizes = explode(',', $this->request->getVar('sizes'));

            foreach ($sizes as $size) {
                $data = [
                    'product_id' => $id,
                    'size' => $size,
                    ];
                $this->productModel->saveToTable('pj_product_size',$data);
            }

        }

        
        // Process and save images
        $files = $this->request->getfiles('imgs');
        $this->saveImages($files, $id);


        $msg = "Product added successfully";
        $this->session->setFlashdata('success_message', $msg);

        return $this->renderView();

    }


    public function saveImages($files,$id){

        $cnt = 1;
        $main = 0;

        foreach ($files['imgs'] as $file){

            if ($cnt == 1) {
                $main = 1;
            }else{
                $main = 0;
            }
            
            $img_name = time()."$cnt.".$file->getExtension();

            if($file->isvalid() && !$file->hasMoved()){

                $file->move($this->img_path,"product_".$img_name);

                // $this->image->withFile($this->img_path.'product_'.$img_name)
                //     ->fit(605, 545, 'top')
                //     ->save($this->img_path.$img_name);

                $this->image->withFile($this->img_path.'product_'.$img_name)
                    ->fit(270, 300, 'top')
                    ->save($this->thumb_path.'thumb_'.$img_name);
            }

            $data = [
                'product_id' => $id,
                'image' => $img_name,
                'main' => $main,
            ];  
            
            $this->productModel->saveToTable('pj_product_image',$data);
            $cnt++;
        }

        return;
    }

    // fetch Products
    public function fetchProducts($slug = '', $limit = null){

        // $pager = \Config\Services::pager();

        if (is_null($limit)) {
            $limit = $this->products_per_page;
        }

        $products = $this->productModel
            ->select('pj_products.*, pj_product_image.image')
            ->join('pj_product_image', 'pj_products.id = pj_product_image.product_id AND pj_product_image.main = 1', 'left')
            ->where('pj_products.status', 1)
            ->where('pj_products.deleted', 0);

        if ($slug == 'featured') {
            // return featured products
            $products = $products->where('pj_products.featured', 1);
            return $this->productModel->paginate($limit);

        }

        if ($slug == 'recent') {
            // return recently added products
            $products = $products->orderBy('pj_products.id', 'DESC');
            return $this->productModel->paginate($limit);

        }

        if ($slug == 'random') {
            // return recently added products
            $products = $products->orderBy('pj_products.id', 'RANDOM');
            return $this->productModel->paginate($limit);

        }

        if (is_numeric($slug)) {
            // return products based on category
            $products = $products->where('pj_products.category_id', $slug);
        }


        return array('products' => $this->productModel->paginate($limit,'group1',null,3),
                    'pager' => $this->pager
                     );


    }


}
