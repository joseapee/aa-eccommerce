<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\View\View;
use App\Models\CategoryModel;

class CategoryController extends ProductController
{

    public function __construct(){

        $this->image = \Config\Services::image();
        $this->categoryModel = new CategoryModel();
        helper('form');
    }

    public function index()
    {
        

        $categories = $this->categoryModel->findAll();

        $data = [
            'page_title'=> 'Categories',
            'site_title'=> 'Categories | Aisha Abubakar',
            'categories'=> $categories,
        ];

        return view("admin/category-view", $data);
        
    }


    public function new()
    {
        if (!$this->request->getPost()) {
            return redirect()->to("/admin/catalogue/categories");
        }

        $img_name = '';

        $file = $this->request->getFile('img');

        // check if image is uploaded
        if ($file->getSize('mb') > 0) {
            $img_name = time().".".$file->getExtension();

            if($file->isvalid() && !$file->hasMoved()){

                $file->move($this->cat_path, 'category_'.$img_name);

                $this->image->withFile($this->cat_path.'category_'.$img_name)
                    ->fit(480, 400, 'top')
                    ->save($this->cat_thumb_path.'thumb_'.$img_name);
            }
        }
        $parent_id = $this->request->getVar("parent");
        $parent = $this->categoryModel->find($parent_id);
        $parent_name = '';
        if (isset($parent['name'])) {
            $parent_name = $parent['name'];
        }

        $data = [
            'name' => $this->request->getVar("name"),
            'description' => $this->request->getVar("description"),
            'parent_id' => $this->request->getVar("parent"),
            'parent_name' => $parent_name,
            'image' => $img_name,
            'created_at' => time(),
        ];

        $this->categoryModel->save($data);
        $msg = "Category saved";
        $this->session->setFlashdata('success_message', $msg);
        // return view
        return redirect()->to("/admin/catalogue/categories");
    }



    public function edit($id='1')
    {
        if (!$this->request->getPost()) {
            return redirect()->to("/admin/catalogue/categories");
        }

        $img_name = '';

        $file = $this->request->getFile('img');
        echo "<pre>";
        print_r ($_FILES);
        echo "</pre>";
        die();
        
        // check if image is uploaded
        if ($file->getSize('mb') > 0) {
            $img_name = time().".".$file->getExtension();

            if($file->isvalid() && !$file->hasMoved()){

                $file->move($this->cat_path, 'category_'.$img_name);

                $this->image->withFile($this->cat_path.'category_'.$img_name)
                    ->fit(500, 500, 'top')
                    ->save($this->cat_thumb_path.'thumb_'.$img_name);
            }
        }
        $parent_id = $this->request->getVar("parent");
        $parent = $this->categoryModel->find($parent_id);

        $data = [
            'name' => $this->request->getVar("name"),
            'parent_id' => $this->request->getVar("parent"),
            'parent_name' => $parent['name'],
            'image' => $img_name,
            'created_at' => time(),
        ];

        $this->categoryModel->save($data);
        $msg = "Saved successfully";
        $this->session->setFlashdata('success_message', $msg);
        // return view
        return redirect()->to("/admin/catalogue/categories");
    }


}
