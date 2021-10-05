<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\CategoryModel;
use App\Models\CurrencyModel;
use App\Controllers\CurrencyController;


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $img_path = "./uploads/products/";
    protected $thumb_path = "./uploads/products/thumbs/";
    protected $cat_path = "./uploads/category/";
    protected $cat_thumb_path = "./uploads/category/thumbs/";
    protected $products_per_page =2;
    protected $currencies = '';
    protected $default_currency = '';

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['auth'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->session = \Config\Services::session();

        // set default Currency
        $currencyController = new CurrencyController();
        $currencyController->setDefaultCurrency();

        // fetch Category for header
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->select('id,name,image,description')->findAll();

        $this->view_data = ['header_categories'=> $categories,
                            'controller' => $currencyController,
                            'currencies' => $_SESSION['currency']['currencies'],
                            'default_currency' => $_SESSION['currency']['default'],
                            ];
    }


}
