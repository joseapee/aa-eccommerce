<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\ShippingModel;
use App\Controllers\Admin\ProductController;

class Home extends BaseController
{
	public function __construct(){
		$this->productModel = new ProductModel();
		$this->productController = new ProductController();
	}

    public function index()
    {

    	$recent_products = $this->productController->fetchProducts('recent',8);
    	$featured_products = $this->productController->fetchProducts('featured',6);
    	$picked_products = $this->productController->fetchProducts('random',6);

    	$data = [
    		'page_title' => 'HOME',
            'featured_products' => $featured_products,
            'recent_products' => $recent_products,
            'picked_products' => $picked_products,
            'pager' => $this->productModel->pager
	       
	      ];

	    $this->view_data += $data;

        return view('frontend/index', $this->view_data);
    }



    public function productPage($slug=null){
    	// die($slug);
    	// $pager = \Config\Services::pager();
    	$products = $this->productController->fetchProducts($slug);
    	$pager = $products['pager'];
    	$page_title = "All Products";

    	if (is_numeric($slug)) {

    		$categoryModel = new \App\Models\CategoryModel();
        	$category = $categoryModel->select('name')->find($slug);
    		$page_title = $category['name'];
    	}
    	
    	$data = [
    		'page_title' => $page_title,
    		'best_selling' => $this->productController->fetchProducts('random',6),
			'products' => $products['products'],
			'pager' => $products['pager'],
	      ];

	    $this->view_data += $data;
    	return view('frontend/products', $this->view_data);
    }



    public function singleProduct($product_id){

    	if (is_null($product_id) || !is_numeric($product_id)) {
    		return redirect()->back();
    	}

        // echo "<pre>";
        // print_r ($_SESSION['cart']);
        // echo "</pre>";
        // die();

    	$product = $this->productModel->fetchProductById($product_id);
    	$similar_products = $this->productController->fetchProducts($product['category_id'], 6);
    	
    	$page_title = strtoupper($product['name']);

    	$data = [
    		'page_title' => $page_title,
			'product' => $product,
    		'similar_products' => $similar_products['products'],
	      ];

	    $this->view_data += $data;
    	return view('frontend/product-single', $this->view_data);
    }


}
