<?php

namespace App\Controllers;

class ContactUs extends BaseController
{
    public function index()
    {
        return view('homePage/contactUs');
    }
}