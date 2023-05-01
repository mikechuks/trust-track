<?php

namespace App\Controllers;

class IndexPage extends BaseController
{
    public function index()
    {
        return view('homePage/index');
    }
}
