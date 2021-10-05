<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\View\View;
use App\Models\CurrencyModel;

class CurrencyController extends BaseController
{

    public function __construct(){

    	$this->session = \Config\Services::session();
        $this->currencyModel = new CurrencyModel();
    }


    public function setDefaultCurrency($currency_code=null){

    	if(is_null($currency_code) && isset($_SESSION['currency'])) {
            return;
        }
        
        
        $this->currencies = $this->currencyModel->select('name, rate, code, symbol, base')->findAll();

        $currency_data['currencies'] = $this->currencies;

        foreach ($this->currencies as $currency) {

            if (is_null($currency_code) && $currency['base'] == 1) {

                $currency_data['default'] = $currency;
                $this->default_currency = $currency;

            } // endif

            if (!is_null($currency_code) && $currency['code'] == $currency_code) {
                $currency_data['default'] = $currency;
                $this->default_currency = $currency;
            }

        } // end foreach

        // $this->default_currency = $_SESSION['currency']['default'];
        // $this->currencies = $_SESSION['currency']['currencies'];

      
        $this->session->set('currency', $currency_data);
   
    }


    public function defaultCurrency($amount=''){

        $currency = $_SESSION['currency']['default'];

        if ($currency['base'] !== 1) {
            $amount = $amount / $currency['rate'];
        }

        echo $currency['symbol']." ".number_format($amount,2);
        // die();
    }



    public function setCurrency($currency_code = null){
    	
    	if (is_null($currency_code) || strlen($currency_code) > 3){
    		// die("currency lenght is more than 3");
    		return redirect()->back();
    	}
    	
    	$this->setDefaultCurrency($currency_code);

    	return redirect()->back();

    }



    public function new(){

        if (!$this->request->getPost()) {
            return redirect()->back();
        }

    }


}
