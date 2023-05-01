<?php

namespace App\Controllers;

class Testimonial extends BaseController
{
    public function index()
    {
        return view('homePage/testimonial');
    }
}