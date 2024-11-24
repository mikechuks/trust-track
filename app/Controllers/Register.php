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
                "rules" => 'required|valid_email|is_unique[shopreg.email]',
                "errors" => [
                    "required" => "*email type is required",
                    'valid_email' => '*The email is not valid',
                    'is_unique' => '*Email has already been taken'
                ]
                ],
            "password" => [
                "rules" => 'required|min_length[5]|max_length[12]|is_unique[shopreg.password]',
                "errors" => [
                    "required" => "*Password type is required",
                    "min_length" => "*Password must not be less than 5 characters long",
                    "max_length" => "*Password must not be more than 12 characters long",
                    'is_unique' => '*Password has already been taken'
                ]
                ],
            "con-pass" => [
                "rules" => 'required|min_length[5]|max_length[12]|matches[password]',
                "errors" => [
                    "required" => "*Password type is required",
                    "min_length" => "*Password must not be less than 5 characters long",
                    "max_length" => "*Password must not be more than 12 characters long",
                    "matches" => "*Confirm Password must match the password"
                ]
                ],
            "city" => [
                "rules" => "required|max_length[12]",
                "errors" => [
                    "required" => "*City type is required",
                    "max_length" => "*City must not be more than 12 characters long",
                ]
                ],
            "state" => [
                "rules" => "required|max_length[12]",
                "errors" => [
                    "required" => "*State type is required",
                    "max_length" => "*State must not be more than 12 characters long",
                ]
                ],
            "zip" => [
                "rules" => "required|max_length[12]",
                "errors" => [
                    "required" => "*Zip Code type is required",
                    "max_length" => "*Zip must not be more than 12 characters long",
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
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'address' => $this->request->getVar("address"),
                'city' => $this->request->getVar("city"),
                'state' => $this->request->getVar("state"),
                'zip_code' => $this->request->getVar("zip"),
                'Active' => 1
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