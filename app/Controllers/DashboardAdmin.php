<?php

namespace App\Controllers;
use App\Models\UserModel;

class DashboardAdmin extends BaseController
{
    public function index($id)
    {
        $userModel = new UserModel();
        $data['user_records'] = $userModel->find($id); 

        return view('dashboard/dashboard-admin', $data);
    }
}