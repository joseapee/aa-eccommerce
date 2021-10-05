<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Paystack extends BaseController
{

	private const SECRET_KEY = 'sk_test_ffeac3e421ec8bdd3b38863e6e8bf228c3c3e4d0';
	public const PUBLIC_KEY = 'pk_test_d7520487ebf2d01d98fba2779445b66e19b94f5d';
	public $callback_url = '';

	public function __construct()
	{
		$this->callback_url = base_url('verify-payment/paystack')."/";
		$this->session = \Config\Services::session();
	}

	public function verifyPayment($reference, $order_amount)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$reference,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
		  "Authorization: Bearer ".$this->secret_key_test,
		  "Cache-Control: no-cache",
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
		echo "cURL Error #:" . $err;
		die();
		} 

		$response = json_decode($response);
		$paid_amount = $response->data->amount/100;
		

		if ($response->data->status == 'success' && $paid_amount == $order_amount ) {
			return true;
		}else{
			return false;
		}
		

	}


	
}