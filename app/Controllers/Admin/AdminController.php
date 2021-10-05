<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use CodeIgniter\Cookie\Cookie;
use CodeIgniter\Cookie\CookieStore;
use Config\Services;
use DateTime;
use CodeIgniter\I18n\Time;


class AdminController extends BaseController
{

	public function __construct()
	{
		// Load Helpers
		helper('date');
		helper(['form','url']);
		
		// Load services
		// $this->$validation = \Config\Services::validation();
		$this->session = \Config\Services::session();
		$this->current_time = new Time('now');

		// Load variables

	
	}



	public function index()
	{

// 		$id = $authorize->createGroup('admins', 'Site Administrators with god-like powers.');
// echo "$id";
// die;

		$view_data["site_title"] = "Admin AA";
		$view_data["app_name"] = "Eccomerce";
		$view_data["page_title"] = "Main Dashboard";
        
		return view('admin/dashboard', $view_data);
	}


}
