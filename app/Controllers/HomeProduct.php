<?php
namespace App\Controllers;
use App\Models\ProductModel;

class HomeProduct extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['cat_pro_records'] = $productModel->findAll();  
        return view('homePage/product', $data);
    }
    public function buyNow($id)
    {
        $productModel = new ProductModel();
        $data['cat_pro_records'] = $productModel->where('rand_pro', $id)->findAll();  
        return view('homePage/buy-now', $data);
    }
}