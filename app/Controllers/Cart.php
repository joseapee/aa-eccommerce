<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\View\View;
use App\Models\ProductModel;
// use App\Models\ShippingModel;
// use App\Models\CountryModel;
// use App\Models\StateModel;
use App\Controllers\Admin\ProductController;

class Cart extends BaseController
{

    public function __construct(){
        helper(['form','url']);
        $this->productModel = new ProductModel();
    }


    public function viewCart()
    {
    	
    	$cart = array();
    	$cart_total = 0;
    	if (isset($_SESSION['cart']) && $_SESSION['cart'] > 0) {
        	$cart = $this->sortCartItems();
        	$cart_total = calculateCartTotal();
    	}

        $data = [
            'page_title' => 'Cart',
            'cart' => $cart,
            'cart_total' => $cart_total,
          ];
         
        $this->view_data += $data;

        return view('frontend/cart', $this->view_data);
    }



    private function sortCartItems()
    {

    	$sorted_cart = array();
    	$cart_check = array();

    	foreach ($_SESSION['cart'] as $key => $cart_item) {	//	foreach 1

    		foreach ($cart_item['options'] as $options) {	//	foreach 2
    			
    			$temp_cart_item = $cart_item;

    			$tmp_qty = $options['quantity'];
    			unset($options['quantity']);
    			unset($temp_cart_item['quantity']);
    			$temp_cart_item['options'] = $options;

    			if (in_array($temp_cart_item, $cart_check, true)) { //if 1
    				
    				$index = array_search($temp_cart_item, $cart_check, true);
    				$sorted_cart[$index]['quantity'] += $tmp_qty;

    			}else{

    				$temp_cart_item['quantity'] = $tmp_qty;
    				array_push($sorted_cart, $temp_cart_item);

    				unset($temp_cart_item['quantity']);
    				array_push($cart_check, $temp_cart_item);

    			}	//	endif 1
    		
    		}	//	endforeach 2
    		
    	}	//	endforeach 1

    	return $sorted_cart;
    }



    private function calculateCartTotal($cart)
    {
    	$cart_total = 0;
    	foreach ($cart as $cart_item) {
    		
    		$cart_total += $cart_item['quantity'] * $cart_item['price'];

    	}

    	return $cart_total;
    }



    public function addToCart()
    {

        $total_quantity = 0;
        $options = array();
        $new = 1;
       
        $product_id = $this->request->getVar('product_id');

        // fetch product details from database
        $product = $this->productModel->fetchProductById($product_id);

        // check for size
        if (!empty($product['sizes'])) {

            $rules['size'] = 'required';

            $options['size'] = $this->request->getVar('size');
            $options['quantity'] = $this->request->getVar('quantity');

        }

        // check for color
        if (!empty($product['colors'])) {

            $rules['color'] = 'required';

            $options['color'] = $this->request->getVar('color');
            $options['quantity'] = $this->request->getVar('quantity');
        }   

        // validate all required data
        $this->validateCartData($rules);

        // Get cart details to save
        $quantity = $this->request->getVar('quantity');
        $name = $this->request->getVar('name');
        $price = $product['price'];
        $image = $this->request->getVar('image');

        if (isset($_SESSION['cart'])) {

            if (array_key_exists($product_id, $_SESSION['cart'])) {

                // product exist
                $new = 0;
                foreach ($_SESSION['cart'][$product_id]['options'] as $data) {
                    
                    $total_quantity += $data['quantity'];
                    
                }

                $total_quantity += $quantity;

                array_push($_SESSION['cart'][$product_id]['options'], $options);
                $_SESSION['cart'][$product_id]['quantity'] = $total_quantity;

                //  if product exist
            }else{

                $total_quantity += $quantity;

                $cart_data = [
                    'product_id' => $product_id,
                    'name' => $name,
                    'quantity' => $total_quantity,
                    'price' => $price,
                    'image' => $image,
                    'options' => array($options),
                ];

                $_SESSION['cart'][$product_id] = $cart_data;

            }   //  endif

        }else{

            $total_quantity += $quantity;

            $cart_data = [
                'product_id' => $product_id,
                'name' => $name,
                'quantity' => $total_quantity,
                'price' => $price,
                'image' => $image,
                'options' => array($options),
            ];


            $_SESSION['cart'][$product_id] = $cart_data;

        }   //  endif

        echo json_encode(['status'=> true, 'total_quantity' => $total_quantity, 'quantity' => $quantity, 'new' => $new]);
        die();

    }   //  end addToCart



    public function removeFromCart($key)
    {

        if (array_key_exists($key, $_SESSION['cart'])) {
           unset($_SESSION['cart'][$key]);
        }

        echo json_encode(['status' => true]);
        die();

    }


    private function validateCartData($rules)
    {

        if (!$this->validate($rules)) {

            foreach ($rules as $key => $rule) {
            
                // Set ERROR message
                if($this->validator->getError($key))
                {
                    $error = $this->validator->getError($key);
                    $message = ['field'=> $key, 'status'=>false];
                    echo json_encode($message);
                    die();
                }
            }

        }

        return true;
    }

}                   