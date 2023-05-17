<?php

namespace App\Controllers;
use App\Models\ProductModel;

class IndexPage extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['cat_pro_records'] = $productModel->findAll();  
        return view('homePage/index', $data);
    }
}
