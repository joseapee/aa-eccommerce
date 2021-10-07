<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\View\View;
use App\Models\ProductModel;
use App\Models\ShippingModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Controllers\Admin\ProductController;

class Checkout extends BaseController
{

    public function __construct(){
        helper(['form','url']);
    	$this->session = \Config\Services::session();
        $this->productModel = new ProductModel();
    }




    public function checkout()
    {

        $Shipping = new ShippingModel();
        $Country = new CountryModel();
        $countries = $Country->findAll();
        $shipping_addresses = $Shipping
                                ->select('shipping_address.*, pj_countries.name as country_name, pj_states.name as state_name')
                                ->join('pj_countries','shipping_address.country_id = pj_countries.id')
                                ->join('pj_states','shipping_address.state_id = pj_states.id')
                                ->where('user_id',user_id())
                                ->find();


        $default_shipping = $Shipping
                                ->select('shipping_address.*, pj_countries.name as country_name, pj_states.name as state_name')
                                ->join('pj_countries','shipping_address.country_id = pj_countries.id')
                                ->join('pj_states','shipping_address.state_id = pj_states.id')
                                ->where('user_id',user_id());

        if (isset($_SESSION['order']['selected_shipping'])) {
            // fetch shipping address set in session
            $default_shipping = $default_shipping->where('shipping_address.id',$_SESSION['order']['selected_shipping'])->first();
        }else{
            // fetch default shipping address
            $default_shipping = $default_shipping->where('default_address',1)->first();

            if (!empty($default_shipping)) {
                $_SESSION['order']['selected_shipping'] = $default_shipping['id'];
                
            }
        }                 
        
        $data = [
            'page_title' => 'Checkout',
            'shipping_addresses' => $shipping_addresses,
            'default_shipping' => $default_shipping,
            'countries' => $countries,
          ];

        $this->view_data += $data;

        return view('frontend/checkout', $this->view_data);
    }


    public function fetchStates($country_id=null)
    {
        $State = new StateModel();
        if (is_null($country_id)) {
           $states = $State->findAll();
        }else{  
            $states = $State->where('country_id', $country_id)->findAll();
        }

        echo json_encode($states);
        die();
    }



    public function saveShippingAddress($shipping_id)
    {
        $_SESSION['order']['selected_shipping'] = $shipping_id;
        echo json_encode(['status' => true]);
    }

    public function saveShippingMethod($shipping_method)
    {
        $_SESSION['order']['shipping_method'] = $shipping_method;
        echo json_encode(['status' => true]);
    }


    public function newShipping()
    {

        if (!$this->request->getPost()) {
            return redirect()->back();
            die();
        }

        $Shipping = new ShippingModel();

        $shipping_addresses = $Shipping
                                ->where('default_address',1)
                                ->where('user_id',user_id())
                                ->find();

        // unset any default address if any
        if (!empty($shipping_address)) {

            $Shipping->whereIn('user_id',user_id())
                    ->set(['default_address',0])
                    ->update();
        }

        $data = [
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'address_1' => $this->request->getVar('address_1'),
            'address_2' => $this->request->getVar('address_2'),
            'country_id' => $this->request->getVar('country'),
            'state_id' => $this->request->getVar('state'),
            'postcode' => $this->request->getVar('postcode'),
            'default_address' => 1,
            'user_id' => user_id(),
        ];
        // save data
        $Shipping->save($data);

        // redirect
        return redirect()->back();
    }


    public function verifyOrder($payment_gateway, $payment_reference)
    {
        // Validate request 
        $referer = base_url('signup');

        if (!isset($_SERVER['HTTP_REFERER'])) {
            die("No direct access");

        }elseif ($_SERVER['HTTP_REFERER'] != $referer) {
            return view('errors/html/production');
            die("Access restricted");
        }

        // paystack verification
        if ($payment_gateway = 'paystack') {
        
            $Paystack = new Paystack();

            if(!$Paystack->verifyPayment($payment_reference, $order_amount)){
               
            }

        }

        // Flutterwave verification
        if ($payment_gateway = 'flutterwave') {
            # code...
        }

    }

}                   