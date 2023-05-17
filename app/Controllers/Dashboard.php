<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\IncomeModel;
use App\Libraries\Hash;

class Dashboard extends BaseController
{
    public function index($id)
    {
        $userModel = new UserModel();
        $categoryModel = new CategoryModel();
        $incomeModel = new IncomeModel();
        $data['user_records'] = $userModel->find($id); 
        $data['product_menus'] = $categoryModel->findAll();
        $data['trans_pend_list'] = $incomeModel->where('user_id', $id)->where('status', 0)->findAll();  
        $data['trans_com_list'] = $incomeModel->where('user_id', $id)->where('status', 1)->findAll();
        $data['income_list'] = $incomeModel->where('user_id', $id)->findAll(); 
        return view('dashboard/dashboard-profile', $data);
    }
    public function editSetting($id)
{
    $userModel = new UserModel();
    $categoryModel = new CategoryModel();
    $data['user_records'] = $userModel->find($id); 
    $data['product_menus'] = $categoryModel->findAll(); 
  //  $categoryModel = new CategoryModel();
   // $data['category_product_records'] = $categoryModel->findAll();  

    return view('dashboard/settings', $data);
}

    public function Settings()
    {
        $data = [];
        if ($this->request->getPost('upadte-user')){
        //validation
        $validation = $this->validate([
            "name" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*name type is required"
                ]
                ]
        ]);
        if (!$validation) {

              $data += [
            "validation" => $this->validator
        ];


            return view('dashboard/settings', $data);
        }
        else{
            $userModel = new UserModel();
            $password = $this->request->getVar('password');
            $userId = intval($this->request->getVar("user-id"));
            $dbdata = [
                'name' => $this->request->getVar("name"),
                'email' => $this->request->getVar('email'),
                'password' => Hash::passwordsanitize($password),
                'address' => $this->request->getVar("address"),
                'city' => $this->request->getVar("city"),
                'state' => $this->request->getVar("state"),
                'zip_code' => $this->request->getVar("zip"),
                'Active' => 1
            ];
        $query = $userModel->update($userId,$dbdata);
        $this->session->destroy();

        if($query === true){

        return redirect()->to(base_url("login"));
      }
      else{
        $this->session->setFlashdata('errormessage', 'Error occured!');
         $data += ['dberrors' => $userModel->errors()];
         return view('dashboard/settings', $data);
        
      }
        }
    }else{
        $this->session->setFlashdata('errormessage', 'Error occured!');
        return view('dashboard/settings', $data);
    }
}
}