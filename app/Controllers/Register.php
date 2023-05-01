<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Libraries\Hash;

class Register extends BaseController
{
    public function __construct(){
        helper(['url', 'formchecker', 'form']);
    }

    public function index(){
        $data = [];

        if ($this->request->getPost('submitReg')){
        //validation
        $validation = $this->validate([
            "name" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*name type is required"
                ]
                ],
            "email" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*email type is required"
                ]
                ],
            "password" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*Password type is required"
                ]
                ],
            "city" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*City type is required"
                ]
                ],
            "state" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*State type is required"
                ]
                ],
            "zip" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*Zip Code type is required"
                ]
                ],
        ]);

      
        if (!$validation) {

              $data += [
            "validation" => $this->validator
        ];


            return view('dashboard/registration', $data);
        }
        else{
            $userModel = new UserModel();
            $password = $this->request->getVar('password');
            $dbdata = [
                'name' => $this->request->getVar("name"),
                'email' => $this->request->getVar('email'),
                'password' => Hash::passwordsanitize($password),
                'address' => $this->request->getVar("address"),
                'city' => $this->request->getVar("city"),
                'state' => $this->request->getVar("state"),
                'zip_code' => $this->request->getVar("zip")
            ];
        $query = $userModel->save($dbdata);

        if($query === true){

        return redirect()->to(base_url("login"));
      }
      else{
        $this->session->setFlashdata('errormessage', 'Error occured!');
         $data += ['dberrors' => $userModel->errors()];
         return view('dashboard/registration', $data);
        
      }
        }
    }else{
        $this->session->setFlashdata('errormessage', 'Error occured!');
        return view('dashboard/registration');
    }
 }
}