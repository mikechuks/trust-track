<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\IncomeModel;
use App\Models\UserModel;

class Product extends BaseController
{
    public function viewAllProduct($pId,$id)
    {
        $data = [];
        $categoryModel = new CategoryModel();
        $productModel = new ProductModel();
        $incomeModel = new IncomeModel();
        $userModel = new UserModel();
        $data['user_records'] = $userModel->find($pId); 
        $data['cat_pro_records'] = $productModel->where('category_id', $id)->where('count', 1)->findAll();  
        $data['product_menus'] = $categoryModel->findAll();
        if ($this->request->getPost('addToCart')){
            $products = $productModel->where('product_id',$this->request->getVar("income-id"))->findAll();
            $query = "";
            foreach($products as $product){ 
                $dbdata = [
                    'name_id' => $this->session->get("user-id"),
                    'price' => $product['product_id'],
                    'email_id' => $this->session->get("user-id"),
                    'state_id' => $this->session->get("user-id"),
                    'user_id' => $this->session->get("user-id"),
                    'product_name' => $product['product_id'],
                    'product_id' => $product['product_id'],
                ];
                $query = $incomeModel->save($dbdata);
            }
    
            if($query === true){
        $this->session->setFlashdata('sucmessage', 'You have Successfully added this product to Cart');   
            return redirect()->to(base_url("view-all-product/".$pId.'/'.$id));
          }
          else{
            $this->session->setFlashdata('errormessage', 'Error occured!');
             $data += ['dberrors' => $categoryModel->errors()];
             return view('dashboard/product/view-all-product', $data);      
          }
            }elseif($this->request->getPost('addToCart')){

            }else{   
        return view('dashboard/product/view-all-product', $data);
        }
    }

    public function viewSpecificProduct($pId,$rand)
    {
        $categoryModel = new CategoryModel();
        $productModel = new ProductModel();
        $userModel = new UserModel();
        $data['user_records'] = $userModel->find($pId); 
        $data['cat_pro_records'] = $productModel->where('rand_pro', $rand)->findAll();  
        $data['product_menus'] = $categoryModel->findAll();  
        return view('dashboard/product/view-specific-product', $data);
    }
}