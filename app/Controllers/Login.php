<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Libraries\Hash;

class Login extends BaseController
{
    public function __construct(){
        helper(['url', 'formchecker', 'form']);
    } 

    public function index()
    {
        $data = [];

        if ($this->request->getPost('submitLog')){
        //validation
        $validation = $this->validate([
            "name" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*name type is required"
                ]
                ],
            "password" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*Password type is required"
                ]
                ],
        ]);

      
        if (!$validation) {

              $data += [
            "validation" => $this->validator
        ];


            return view('dashboard/login', $data);
        }
        else{
            $userModel = new UserModel();
                $name = $this->request->getVar("name");
                $password = $this->request->getVar('password');
            
        $userInfo = $userModel->where('name', $name)->first();
        $checkPassword = Hash::passwordcheck($password, $userInfo['password']);
              
        if (!$checkPassword)
        {
        $this->session->setFlashdata("errormessage", "Incorrect Password");
        return redirect()->to(base_url('login'))->withInput();
        }else
        {
        // Stroing session values
        $this->setUserSession($userInfo);

        // Redirecting to dashboard after login
        return redirect()->to(base_url('dashboard'));
        }

    }
    }else{
        return view('dashboard/login');
    }
}

            private function setUserSession($userInfo)
            {
            $data = [
                    'user-id' => $userInfo['user_id'],
                    'name' => $userInfo['name'],
                    'email' => $userInfo['email'],
                    'address' => $userInfo['address'],
                    'state' => $userInfo['state'],
                    'city' => $userInfo['city'],
                    'zip' => $userInfo['zip_code'],
                    'isLoggedIn' => true
            ];
            $this->session->set($data);
            return true;
            }

            public function logout()
            {
        
                 $this->session->destroy();
                 return redirect()->to(base_url());
            }
}